<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        $data['title'] = 'Login';
        return view('pages.auth.login',$data);
    }
    public function loginPost(Request $request){
        $credentials = $request->only('credential', 'password');

        // Determine if the credential is an email or a username
        $field = filter_var($credentials['credential'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        // Validate input
        $request->validate([
            'credential' => 'required',
            'password' => 'required|min:6',
        ]);

        // Attempt authentication
        if (Auth::attempt([$field => $credentials['credential'], 'password' => $credentials['password']])) {
            // Authentication successful, redirect to dashboard
            return redirect()->route('admin.dashboard');
        } else {
            // Authentication failed, return error response
            return redirect()->back()->with('error','Invalid credentials');
        }
    }
    public function register(){
        $data['register'] = 'Register';
        view('pages.auth.register',$data);
    }
    public function registerPost(Request $request){
        $request->validate([
            'name'  => 'required|min:5',
            'email' => 'required|email',
            'username'  => 'required|min:5|unique:users',
            'password' => 'required|min:6',
            
        ]);
        DB::beginTransaction();
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->username = $request->username;
            $user->password = Hash::make($request->password);
            $user->save();
            DB::commit();

            Auth::login($user);
            //login with new registered;
            return redirect()->route('admin.dashboard');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error','Error: ' .$th->getMessage() );
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
