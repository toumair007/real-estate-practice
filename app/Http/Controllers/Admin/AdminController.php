<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Models\Admin;
use App\Mail\Websitemail;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard.index');
    }

    public function login()
    {
        return view('admin.auth.login');
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
        ];

        if(Auth::guard('admin')->attempt($data)) {
            return redirect()->route('admin.dashboard')->with('success', 'Login Successfully.');
        } else {
            return redirect()->back()->with('error', 'Invalid Credentials');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success', 'Logout Successfully.');
    }

    public function forgetPassword()
    {
        return view('admin.auth.forget-password');
    }

    public function forgetPasswordSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $admin = Admin::where('email', $request->email)->first();
        if(!$admin){
            return redirect()->back()->with('error', 'Email Not Found!');
        }

        $token = hash('sha256', time());
        $admin->token = $token;
        $admin->update();

        $link = route('admin.reset.password', [$token, $request->email]);
        $subject = 'Reset Password';
        $body = 'Click on the following link to reset your password. <br>';
        $body .= '<a href="'.$link.'">Reset Password</a>';

        \Mail::to($request->email)->send(new Websitemail($subject, $body));

        return redirect()->back()->with('success', 'Reset password link sent to your email');
    }

    public function resetPassword($token, $email)
    {
        $admin = Admin::where('email', $email)->where('token', $token)->first();
        if(!$admin){
            return redirect()->route('admin.login')->with('error', 'Invalid token or email  ');
        }

        return view('admin.auth.reset-password', compact('token', 'email'));
    }

    public function resetPasswordSubmit(Request $request, $token, $email)
    {
        $request->validate([
            'password' => 'required',
            'confirmPassword' => 'required|same:password',
        ]);

        $admin = Admin::where('email', $email)->where('token', $token)->first();
        $admin->password = Hash::make($request->password);
        $admin->token = '';
        $admin->update();

        return redirect()->route('admin.login')->with('success', 'Password Reset Successfully');
    }

    public function profile()
    {
        return view('admin.profile.index');
    }

    public function profileEdit()
    {
        return view('admin.profile.edit');
    }

    public function profileSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.Auth::guard('admin')->user()->id,
        ]);

        $admin = Admin::where('id', Auth::guard('admin')->user()->id)->first();

        if($request->photo){
            $request->validate([
                'photo' => 'image|mimes:jpeg,jpg,png|max:2048',
            ]);
            $filename = 'admin_'.time().'.'.$request->photo->extension();
            if($admin->photo != ''){
                unlink(public_path('uploads/'.$admin->photo));
            }
            $request->photo->move(public_path('uploads'), $filename);
            $admin->photo = $filename;
        }

        if($request->password){
            $request->validate([
                'password' => 'required',
                'confirmPassword' => 'required|same:password',
            ]);
            $admin->password = Hash::make($request->password);
        }

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->update();

        return redirect()->route('admin.profile')->with('success', 'Profile Updated Successfully.');
    }
}
