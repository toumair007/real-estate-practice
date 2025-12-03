<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\User;
use App\Mail\Websitemail;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function registration()
    {
        return view('user.auth.registration');
    }

    public function registrationSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|max:255|email|unique:users,email',
            'password' => 'required',
            'confirmPassword' => 'required|same:password',
        ]);

        $token = hash('sha256', time());

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->token = $token;
        $user->save();

        $link = route('registration.verify', [$token, $request->email]);
        $subject = 'Registration Verification';
        $body = 'Click on the following link to verify your registration. <br> <a href="'.$link.'">Click Here</a>';

        \Mail::to($request->email)->send(new Websitemail($subject, $body));
        return redirect()->route('login')->with('success', 'Registration Successfull. Please check your email to verify your account.');
    }

    public function registrationVerify($token, $email)
    {
        $user = User::where('email', $email)->where('token', $token)->first();
        if(!$user){
            return redirect()->route('login')->with('error', 'Invalid token or email');
        }
        $user->token = '';
        $user->status = 1;
        $user->update();

        return redirect()->route('login')->with('success', 'Email verified successfully. You can login now.');
    }

    public function login()
    {
        return view('user.auth.login');
    }

    public function loginSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Mentor Arefin
        $check = $request->all();
        $data = [
            'email' => $check['email'],
            'password' => $check['password'],
            'status' => 1,
        ];

        if(Auth::guard('web')->attempt($data)) {
            return redirect()->route('dashboard')->with('success', 'Login successfull.');
        } else {
            return redirect()->back()->with('error', 'Invalid Credentials');
        }
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('login')->with('success', 'Logout Successfully.');
    }

    public function forgetPassword()
    {
        return view('user.auth.forget-password');
    }

    public function forgetPasswordSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();
        if(!$user){
            return redirect()->back()->with('error', 'Email Not Found!');
        }

        $token = hash('sha256', time());
        $user->token = $token;
        $user->update();

        $link = route('reset.password', [$token, $request->email]);
        $subject = 'Reset Password';
        $body = 'Click on the following link to reset your password. <br>';
        $body .= '<a href="'.$link.'">Reset Password</a>';

        \Mail::to($request->email)->send(new Websitemail($subject, $body));

        return redirect()->back()->with('success', 'Reset password link sent to your email');
    }

    public function resetPassword($token, $email)
    {
        $user = User::where('email', $email)->where('token', $token)->first();
        if(!$user){
            return redirect()->route('login')->with('error', 'Invalid token or email  ');
        }

        return view('user.auth.reset-password', compact('token', 'email'));
    }

    public function resetPasswordSubmit(Request $request, $token, $email)
    {
        $request->validate([
            'password' => 'required',
            'confirmPassword' => 'required|same:password',
        ]);

        $user = User::where('email', $email)->where('token', $token)->first();
        $user->password = Hash::make($request->password);
        $user->token = '';
        $user->update();

        return redirect()->route('login')->with('success', 'Password Reset Successfully');
    }

    public function profile()
    {
        return view('user.profile');
    }

    public function profileSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.Auth::guard('web')->user()->id,
        ]);

        $user = User::where('id', Auth::guard('web')->user()->id)->first();

        if($request->photo){
            $request->validate([
                'photo' => 'image|mimes:jpeg,jpg,png|max:2048',
            ]);
            $filename = 'user_'.time().'.'.$request->photo->extension();
            if($user->photo != ''){
                unlink(public_path('uploads/'.$user->photo));
            }
            $request->photo->move(public_path('uploads'), $filename);
            $user->photo = $filename;
        }

        if($request->password){
            $request->validate([
                'password' => 'required',
                'confirmPassword' => 'required|same:password',
            ]);
            $user->password = Hash::make($request->password);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->update();

        return redirect()->back()->with('success', 'Profile Updated Successfully.');
    }
}
