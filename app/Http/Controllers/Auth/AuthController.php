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
    public function index(){

    }
    public function signup(Request $request){
        $validatedData = Validator::make($request->all(),[
            'name'=>'required|string|min:3|max:12',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|string|min:6|max:12',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'phone'=>'nullable',
            'address'=>'nullable',
        ]);
        if ($validatedData->fails()) {
            return redirect()->back()
                ->withErrors($validatedData)
                ->withInput();
        }
        $otp= rand(100000,999999);
        $otp_expires_at = now()->addMinutes(10);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'otp'                  => $otp,
            'otp_expires_at'       => $otp_expires_at,
            'status'               => 'inactive',
        ]);
        try {
            //code...
            Mail::to($user->email)->send(new SendMail($otp));
        } catch (Exception $e) {
            Log::error('Email sending failed:'.$e->getMessage());
        }

        return redirect('/home')->with('success', 'Account created successfully!');
    }
}
