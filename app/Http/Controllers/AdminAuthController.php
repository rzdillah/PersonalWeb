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
        $userData = [
            'name' => 'Rizky Fikry Fadillah',
            'tagline' => 'Frontend Developer',
            'bio' => 'Seorang front-end developer yang berfokus pada pembuatan antarmuka web modern, responsif, dan mudah digunakan.',
            'email' => 'rizkyfikryfadillah@gmail.com',
            'location' => 'Bogor, Indonesia',
            'social' => [
                'github' => 'https://github.com/yourusername',
                'linkedin' => 'https://linkedin.com/in/yourusername',
                'instagram' => 'https://instagram.com/yourusername',
                'tiktok' => 'https://tiktok.com/@yourusername',
            ],
        ];

        return view('admin.login', compact('userData'));
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
