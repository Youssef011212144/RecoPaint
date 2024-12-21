<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;    
class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login logic
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            // Get the authenticated user
            $user = Auth::user();
            
            // Check the usertype and redirect accordingly
            if ($user->usertype == 'admin') {
                return redirect('/ViewAdmin'); // Redirect to the admin view
            }
    
            // If the usertype is 'user' or other, redirect to home
            return redirect()->intended('home'); // Redirect to homepage or any protected page
        }
    
        // Authentication failed
        return back()->withErrors([
            'email' => 'Invalid credentials.',
        ]);
    }
    

    // Show registration form
    public function showRegistrationForm()
    {
        return view('auth.register');
    }


    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password
        ]);

        // Log the user in directly
        Auth::login($user);

        // Redirect to the intended page or homepage
        return redirect()->intended('home');
    }
public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
}

}
