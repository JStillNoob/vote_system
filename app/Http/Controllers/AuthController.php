<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {

        return view('auth.login');
    }

    public function showSignup()
    {


        return view('auth.signup');
    }

    public function showindex()
    {
        return view('admin.index');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            
            $welcomeMessage = "Welcome , " . $user->FirstName . "!"; 
            
            if($user->userType_id == 1) {
                return redirect()->route('showElections')->with('success', $welcomeMessage);
            } elseif($user->userType_id == 2) {
                return redirect()->route('departments.index')->with('success', $welcomeMessage);
            } elseif($user->userType_id == 3) {
                return redirect()->route('view-election')->with('success', $welcomeMessage);
            }
        }
        
    
        throw ValidationException::withMessages([
            'email' => ['The provided credentials do not match our records.'],
        ]);
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->session()->forget('user');
        return redirect('/')->with('success', 'Logout successful');
    }
}
