<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class HomeController extends Controller
{
    public function index()
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
            ]
        ];

        $featuredProjects = Project::featured()
                                  ->ordered()
                                  ->limit(4)
                                  ->get();

        $skills = [
            ['Vue.js', 'text-green-400', 'bg-green-500/10'],
            ['React', 'text-blue-400', 'bg-blue-500/10'],
            ['JavaScript', 'text-yellow-400', 'bg-yellow-500/10'],
            ['TypeScript', 'text-blue-300', 'bg-blue-500/10'],
            ['Tailwind CSS', 'text-cyan-400', 'bg-cyan-500/10'],
            ['Next.js', 'text-gray-300', 'bg-gray-500/10'],
            ['Laravel', 'text-red-400', 'bg-red-500/10'],
            ['Node.js', 'text-green-300', 'bg-green-500/10'],
            ['Git', 'text-gray-300', 'bg-gray-500/10'],
            ['MySQL', 'text-orange-400', 'bg-orange-500/10'],
            ['REST API', 'text-purple-400', 'bg-purple-500/10'],
            ['Docker', 'text-blue-400', 'bg-blue-500/10'],
        ];

        return view('home', compact('userData', 'featuredProjects', 'skills'));
    }
}