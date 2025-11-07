<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Use the same projects data as ProjectController
    private function getFeaturedProjects()
    {
        return [
            [
                'id' => 1,
                'slug' => 'platform-ecommerce-modern',
                'title' => 'Platform E-commerce Modern',
                'description' => 'Solusi e-commerce lengkap dengan dashboard admin, sistem pembayaran, dan UX yang optimal. Dibangun dengan focus pada performance dan user experience.',
                'tags' => ['Vue.js', 'Laravel', 'Tailwind', 'MySQL'],
                'image' => '/images/project-1.jpg',
                'category' => 'web'
            ],
            [
                'id' => 2,
                'slug' => 'dashboard-analytics-kesehatan',
                'title' => 'Dashboard Analytics Kesehatan',
                'description' => 'Aplikasi dashboard untuk memantau data kesehatan pasien secara real-time dengan visualisasi data yang interaktif dan mudah dipahami.',
                'tags' => ['React', 'D3.js', 'Node.js', 'MongoDB'],
                'image' => '/images/project-1.jpg',
                'category' => 'web'
            ],
            [
                'id' => 3,
                'slug' => 'aplikasi-mobile-banking',
                'title' => 'Aplikasi Mobile Banking',
                'description' => 'Manajemen keuangan yang aman dengan autentikasi biometrik.',
                'tags' => ['React Native', 'Firebase', 'Stripe', 'Node.js'],
                'image' => '/images/project-1.jpg',
                'category' => 'mobile'
            ],
            [
                'id' => 4,
                'slug' => 'design-system-component-library',
                'title' => 'Design System & Component Library',
                'description' => 'Library komponen komprehensif untuk pengembangan UI yang konsisten.',
                'tags' => ['Figma', 'Storybook', 'React', 'TypeScript'],
                'image' => '/images/project-1.jpg',
                'category' => 'tools'
            ]
        ];
    }

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

        // Use featured projects with slugs
        $featuredProjects = $this->getFeaturedProjects();

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