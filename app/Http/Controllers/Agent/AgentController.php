<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\Agent;
use App\Models\Package;
use App\Mail\Websitemail;

class AgentController extends Controller
{
    public function dashboard()
    {
        return view('agent.dashboard');
    }

    public function registration()
    {
        return view('agent.auth.registration');
    }

    public function registrationSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|max:255|email|unique:users,email',
            'company' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'password' => 'required',
            'confirmPassword' => 'required|same:password',
        ]);

        $token = hash('sha256', time());

        $agent = new Agent();
        $agent->name = $request->name;
        $agent->email = $request->email;
        $agent->company = $request->company;
        $agent->designation = $request->designation;
        $agent->password = Hash::make($request->password);
        $agent->token = $token;
        $agent->save();

        $link = route('agent.registration.verify', [$token, $request->email]);
        $subject = 'Registration Verification';
        $body = 'Click on the following link to verify your registration. <br> <a href="'.$link.'">Click Here</a>';

        \Mail::to($request->email)->send(new Websitemail($subject, $body));
        return redirect()->back()->with('success', 'Registration Successfull. Please check your email to verify your account.');
    }

    public function registrationVerify($token, $email)
    {
        $agent = Agent::where('email', $email)->where('token', $token)->first();
        if(!$agent){
            return redirect()->route('agent.login')->with('error', 'Invalid token or email');
        }
        $agent->token = '';
        $agent->status = 1;
        $agent->update();

        return redirect()->route('agent.login')->with('success', 'Email verified successfully. You can login now.');
    }

    public function login()
    {
        return view('agent.auth.login');
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

        if(Auth::guard('agent')->attempt($data)) {
            return redirect()->route('agent.dashboard')->with('success', 'Login successfull.');
        } else {
            return redirect()->back()->with('error', 'Invalid Credentials');
        }
    }

    public function logout()
    {
        Auth::guard('agent')->logout();
        return redirect()->route('agent.login')->with('success', 'Logout Successfully.');
    }

    public function forgetPassword()
    {
        return view('agent.auth.forget-password');
    }

    public function forgetPasswordSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $agent = Agent::where('email', $request->email)->first();
        if(!$agent){
            return redirect()->back()->with('error', 'Email Not Found!');
        }

        $token = hash('sha256', time());
        $agent->token = $token;
        $agent->update();

        $link = route('agent.reset.password', [$token, $request->email]);
        $subject = 'Reset Password';
        $body = 'Click on the following link to reset your password. <br>';
        $body .= '<a href="'.$link.'">Reset Password</a>';

        \Mail::to($request->email)->send(new Websitemail($subject, $body));

        return redirect()->back()->with('success', 'Reset password link sent to your email');
    }

    public function resetPassword($token, $email)
    {
        $agent = Agent::where('email', $email)->where('token', $token)->first();
        if(!$agent){
            return redirect()->route('agent.login')->with('error', 'Invalid token or email  ');
        }

        return view('agent.auth.reset-password', compact('token', 'email'));
    }

    public function resetPasswordSubmit(Request $request, $token, $email)
    {
        $request->validate([
            'password' => 'required',
            'confirmPassword' => 'required|same:password',
        ]);

        $agent = Agent::where('email', $email)->where('token', $token)->first();
        $agent->password = Hash::make($request->password);
        $agent->token = '';
        $agent->update();

        return redirect()->route('agent.login')->with('success', 'Password Reset Successfully');
    }

    public function profile()
    {
        return view('agent.profile');
    }

    public function profileSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'company' => 'required|max:255',
            'designation' => 'required|max:255',
            // 'biography' => 'required|max:255',
            'email' => 'required|email|unique:agents,email,'.Auth::guard('agent')->user()->id,
            // 'phone' => 'required|max:255',
        ]);

        $agent = Agent::where('id', Auth::guard('agent')->user()->id)->first();

        // Profile Photo
        if($request->photo){
            $request->validate([
                'photo' => 'image|mimes:jpeg,jpg,png,webp|max:2048',
            ]);
            $filename = 'agent_'.time().'.'.$request->photo->extension();
            if($agent->photo != ''){
                unlink(public_path('uploads/'.$agent->photo));
            }
            $request->photo->move(public_path('uploads'), $filename);
            $agent->photo = $filename;
        }

        // Cover Photo
        if($request->cover_photo){
            $request->validate([
                'cover_photo' => 'image|mimes:jpeg,jpg,png,webp|max:2048',
            ]);
            $filename = 'agent_'.time().'.'.$request->cover_photo->extension();
            if($agent->cover_photo != ''){
                unlink(public_path('uploads/'.$agent->cover_photo));
            }
            $request->cover_photo->move(public_path('uploads'), $filename);
            $agent->cover_photo = $filename;
        }

        if($request->password){
            $request->validate([
                'password' => 'required',
                'confirmPassword' => 'required|same:password',
            ]);
            $agent->password = Hash::make($request->password);
        }

        $agent->name = $request->name;
        $agent->company = $request->company;
        $agent->designation = $request->designation;
        $agent->biography = $request->biography;
        $agent->email = $request->email;
        $agent->phone = $request->phone;
        $agent->address = $request->address;
        $agent->country = $request->country;
        $agent->city = $request->city;
        $agent->state = $request->state;
        $agent->zip = $request->zip;
        $agent->website = $request->website;
        $agent->facebook = $request->facebook;
        $agent->linkedin = $request->linkedin;
        $agent->instagram = $request->instagram;
        $agent->youtube = $request->youtube;
        $agent->update();

        return redirect()->back()->with('success', 'Profile Updated Successfully.');
    }

    public function payment()
    {
        $packages = Package::orderBy('id', 'asc')->get();
        return view('agent.payment', compact('packages'));
    }
}
