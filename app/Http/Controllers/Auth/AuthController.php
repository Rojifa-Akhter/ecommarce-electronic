<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //list users
    public function index()
    {

    }
    public function signup(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'name'     => 'required|string|min:3|max:12',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|max:12',
            'image'    => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'phone'    => 'nullable',
            'address'  => 'nullable',
        ]);
        if ($validatedData->fails()) {
            return redirect()->back()
                ->withErrors($validatedData)
                ->withInput();
        }
        $otp            = rand(100000, 999999);
        $otp_expires_at = now()->addMinutes(10);

        $user = User::create([
            'name'           => $request->name,
            'email'          => $request->email,
            'password'       => Hash::make($request->password),
            'otp'            => $otp,
            'otp_expires_at' => $otp_expires_at,
            'status'         => 'inactive',
        ]);

        try {
            Mail::to($user->email)->send(new SendMail($otp));
        } catch (Exception $e) {
            Log::error('Email sending failed:' . $e->getMessage());
        }

        // Flash email to session so blade can access it
        $request->session()->flash('email', $user->email);

        return redirect('/auth/otp')->with('success', 'Account created successfully!');
    }

    public function verifyOtp(Request $request)
    {
        // return $request;
        $validatedData = Validator::make($request->all(), [
            'email' => 'required|email',
            'otp'   => 'required|min:6|max:6',

        ]);

        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }
        $user = User::where('email', $request->email)->first();
        if (! $user) {
            return redirect()->back()->withErrors(['email' => 'Email Not Found'])->withInput();
        }
        if ($user->status == 'active') {
            return redirect('/home')->with('success', 'Your account is already active');
        }
        if ($user->otp !== $request->otp) {
            return redirect()->back()->withErrors(['otp' => 'Invalid otp'])->withInput();
        }
        if (! $user->otp_expires_at || now()->greaterThan($user->otp_expires_at)) {
            return redirect()->back()->withErrors(['otp' => 'OTP has expired'])->withInput();
        }

        $user->status         = 'active';
        $user->otp            = null;
        $user->otp_expires_at = null;
        $user->save();

        return redirect('/home')->with('success', 'Email verified successfully!');

    }
    public function resendOtp(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ]);
        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }

        $user = User::where('email', $request->email)->first();
        if (! $user) {
            return redirect()->back()->withErrors(['email' => 'User not found']);
        }
        $otp            = rand(100000, 999999);
        $otp_expires_at = now()->addMinutes(10);
        $user->update([
            'otp'            => $otp,
            'otp_expires_at' => $otp_expires_at,
        ]);
        try {
            Mail::to($user->email)->send(new SendMail($otp));
        } catch (Exception $e) {
            Log::error('Resend otp failed:' . $e->getMessage());

            // return redirect()->back()->withErrors('error', 'Failed to resend Otp. Please try again later.');
        }
        return redirect()->back()->with('success', 'Otp has been resend successfully');
    }
}
