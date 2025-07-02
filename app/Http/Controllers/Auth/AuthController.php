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
    public function profile()
    {
        $user = auth()->user();

        if (! $user) {
            return redirect('/auth/login')->withErrors(['auth' => 'You are not logged in.']);
        }

        return view('user.profile', compact('user'));
    }
    //login
    public function login(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return redirect()->back()->withErrors(['email' => 'Invalid credentials'])->withInput();
        }

        if ($user->status !== 'active') {
            return redirect()->back()->withErrors(['email' => 'Your email is not verified. Please verify OTP.']);
        }

        // Login the user
        auth()->login($user);

        return redirect('/')->with('success', 'Login successful!');
    }
    //logout
    public function logout(Request $request)
    {
        $request->session()->invalidate();      // Destroys the session
        $request->session()->regenerateToken(); // Regenerates CSRF token

        return redirect('/')->with('success', 'Logged out successfully!');
    }

    //signup
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

    //verify otp
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
            return redirect('/')->with('success', 'Your account is already active');
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

        return redirect('/')->with('success', 'Email verified successfully!');

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

        $otp            = rand(100000, 999999);
        $otp_expires_at = now()->addMinutes(10);

        $user->update([
            'otp'            => $otp,
            'otp_expires_at' => $otp_expires_at,
        ]);

        try {
            Mail::to($user->email)->send(new SendMail($otp));
        } catch (Exception $e) {
            Log::error('Resend OTP failed: ' . $e->getMessage());
        }

        $request->session()->flash('email', $user->email);

        return redirect()->back()->with('success', 'OTP has been resent successfully.');
    }
    public function changePass(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password'     => 'required|string|min:6|confirmed',
        ]);

        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }
        $user = auth()->user();

        // Check if current password matches
        if (! Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect'])->withInput();
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Password changed successfully!');
    }
    //forgot password
    public function forgotPass(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ]);

        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }

        $user           = User::where('email', $request->email)->first();
        $otp            = rand(100000, 999999);
        $otp_expires_at = now()->addMinutes(10);

        $user->update([
            'otp'            => $otp,
            'otp_expires_at' => $otp_expires_at,
        ]);

        try {
            Mail::to($user->email)->send(new SendMail($otp));
        } catch (Exception $e) {
            Log::error('Send OTP failed: ' . $e->getMessage());
        }

        $request->session()->flash('email', $user->email);

        return redirect('/auth/reset-pass')->with('success', 'OTP has been sent to your email.');

    }
    //reset password
    public function resetPass(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'email'    => 'required|email|exists:users,email',
            'otp'      => 'required|min:6|max:6',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }

        $user = User::where('email', $request->email)->first();

        if (! $user) {
            return redirect()->back()->withErrors(['email' => 'User not found']);
        }

        if ($user->otp !== $request->otp) {
            return redirect()->back()->withErrors(['otp' => 'Invalid OTP'])->withInput();
        }

        if (! $user->otp_expires_at || now()->greaterThan($user->otp_expires_at)) {
            return redirect()->back()->withErrors(['otp' => 'OTP has expired'])->withInput();
        }

        $user->password       = Hash::make($request->password);
        $user->otp            = null;
        $user->otp_expires_at = null;
        $user->save();

        return redirect('/auth/login')->with('success', 'Password reset successfully!');
    }

}
