<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;




class AuthController extends Controller
{
    public function login()
    {
        //dd(Hash::make(123456));
        if(!empty(Auth::check()))
        {
            if(Auth::user()->user_type == 1)
            {
                return redirect('admin/dashboard'); 
            }
            else if(Auth::user()->user_type == 2)
            {
                return redirect('student/competitions/list'); 
            } 
            else if(Auth::user()->user_type == 3)
            {
                return redirect('teacher/dashboard'); 
            } 
        }

        return view('auth.login');
    }

    public function Authlogin(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember))
        {
            if(Auth::user()->user_type == 1)
            {
                return redirect('admin/dashboard'); 
            }
            else if(Auth::user()->user_type == 2)
            { 
                return redirect('student/competitions/list'); 
            }
            else if(Auth::user()->user_type == 3)
            { 
                return redirect('teacher/dashboard'); 
            }
             
        }
        else{
            return redirect ()->back()->with('error','Please enter correct username and password');
        }
    }


    public function register()
    {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:3|confirmed',
            'user_type' => 'required|in:1,2', // Ensure the user_type is either 1 or 2
        ]);
    
        // Create the user
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
    
        // Assign the selected user_type to the user
        $user->user_type = $validatedData['user_type'];
      
    
        $user->save();
    
        // You can customize the redirection after registration as per your requirement
        return redirect('register')->with('succes', 'Registration successful. You can now log in.');
    }
    
    

    public function forgotpassword()
    {
        return view('auth.forgot');
    }

    public function PostForgotPassword(Request $request)
    {
       $user = User::getEmailSingle($request->email);
       if(!empty($user))
       {
            $user->remember_token = Str::random(30);
            $user->save();

            Mail::to($user->email)->send(new ForgotPasswordMail($user));

            return redirect()->back()->with('Succes',"Please check you Email");
       }
       else
       {
            return redirect()->back()->with('error',"Email not Found");
       }
    }


    public function reset($remember_token)
    {
        $user = User::getTokenSingle($remember_token);
        if(!empty($user))
        {
            $data['user'] = $user;
            return view('auth.reset', $data);
        }
        else
        {
            abort(404);
        }
    }

    public function PostReset($token, Request $request )
    {
        if($request->password == $request->cpassword)
        {
            $user = User::getTokenSingle($token);
            $user->password = Hash::make($request->password);
            $user->remember_token = Str::random(30);
            $user->save();

            return redirect(url(''))->with('succes', "Password Succesfully Reset");
        }
        else
        {
            return redirect()->back()->with('error',"Password does not match");
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(url('/'));
    }
}
