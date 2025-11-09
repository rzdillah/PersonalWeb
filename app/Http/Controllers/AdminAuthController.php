<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // Verify this is the admin email before attempting login
        $adminEmail = 'rizkyfikryfadillah@gmail.com';
        if ($credentials['email'] !== $adminEmail) {
            \Log::warning('Non-admin email attempted login', [
                'email' => $credentials['email'],
                'ip' => $request->ip()
            ]);
            return back()->withErrors(['email' => 'Invalid credentials.']);
        }

        // Use Laravel's proper authentication
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            
            \Log::info('Admin login successful', [
                'user_id' => Auth::id(),
                'email' => Auth::user()->email,
                'ip' => $request->ip()
            ]);

            return redirect()->route('admin.projects.index')
                ->with('success', 'Welcome back!');
        }

        \Log::warning('Failed admin login attempt', [
            'email' => $credentials['email'],
            'ip' => $request->ip()
        ]);

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function logout(Request $request)
    {
        $user = Auth::user();
        
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        \Log::info('Admin logout', [
            'user_id' => $user->id ?? null,
            'email' => $user->email ?? null
        ]);

        return redirect()->route('home')->with('success', 'Logged out successfully!');
    }

}
