<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Helper method to get all projects
    private function getAllProjects()
    {
        return [
            [
                'id' => 1,
                'slug' => 'platform-ecommerce-modern',
                'title' => 'Platform E-commerce Modern',
                'description' => 'Solusi e-commerce lengkap dengan dashboard admin, sistem pembayaran, dan UX yang optimal. Dibangun dengan focus pada performance dan user experience.',
                'full_description' => 'Platform e-commerce yang dikembangkan menggunakan Vue.js untuk frontend dan Laravel untuk backend. Fitur termasuk sistem inventory real-time, multiple payment gateway, dashboard analytics, dan responsive design untuk semua device. Project ini membantu client meningkatkan conversion rate sebesar 40% dan mengurangi loading time hingga 60%.',
                'tags' => ['Vue.js', 'Laravel', 'Tailwind', 'MySQL', 'Redis', 'Docker'],
                'image' => '/images/project-1.jpg',
                'category' => 'web',
                'client' => 'PT. Retail Indonesia',
                'year' => '2024',
                'duration' => '4 bulan',
                'demo_link' => '#',
                'github_link' => '#',
                'challenges' => [
                    'Mengintegrasikan multiple payment gateway',
                    'Optimasi performance untuk high traffic',
                    'Real-time inventory management'
                ],
                'solutions' => [
                    'Implementasi caching dengan Redis',
                    'Microservices architecture',
                    'CDN integration untuk static assets'
                ]
            ],
            [
                'id' => 2,
                'slug' => 'dashboard-analytics-kesehatan',
                'title' => 'Dashboard Analytics Kesehatan',
                'description' => 'Aplikasi dashboard untuk memantau data kesehatan pasien secara real-time dengan visualisasi data yang interaktif dan mudah dipahami.',
                'full_description' => 'Dashboard kesehatan dengan React dan D3.js untuk visualisasi data pasien. Menampilkan trends kesehatan, predictive analytics, dan reporting system untuk rumah sakit dan klinik. Sistem ini membantu tenaga medis membuat keputusan data-driven dengan akurasi 95%.',
                'tags' => ['React', 'D3.js', 'Node.js', 'MongoDB', 'Express', 'Chart.js'],
                'image' => '/images/project-1.jpg',
                'category' => 'web',
                'client' => 'Rumah Sakit Sehat',
                'year' => '2023',
                'duration' => '3 bulan',
                'demo_link' => '#',
                'github_link' => '#',
                'challenges' => [
                    'Visualisasi data kesehatan yang kompleks',
                    'Keamanan data pasien yang sensitif',
                    'Real-time data processing'
                ],
                'solutions' => [
                    'Custom D3.js charts untuk visualisasi medis',
                    'Encryption end-to-end untuk data pasien',
                    'WebSocket untuk update real-time'
                ]
            ],
            [
                'id' => 3,
                'slug' => 'aplikasi-mobile-banking',
                'title' => 'Aplikasi Mobile Banking',
                'description' => 'Manajemen keuangan yang aman dengan autentikasi biometrik.',
                'full_description' => 'Aplikasi perbankan mobile dengan React Native yang mendukung transaksi keuangan yang aman, transfer real-time, dan autentikasi biometrik. Dilengkapi dengan push notification untuk alert transaksi dan fitur budgeting yang intelligent.',
                'tags' => ['React Native', 'Firebase', 'Stripe', 'Node.js', 'MongoDB'],
                'image' => '/images/project-1.jpg',
                'category' => 'mobile',
                'client' => 'Bank Digital Indonesia',
                'year' => '2023',
                'duration' => '5 bulan',
                'demo_link' => '#',
                'github_link' => '#',
                'challenges' => [
                    'Keamanan transaksi finansial',
                    'Kompatibilitas cross-platform',
                    'Integrasi dengan legacy systems'
                ],
                'solutions' => [
                    'Biometric authentication dengan Face ID/Touch ID',
                    'Code sharing 90% antara iOS dan Android',
                    'RESTful API middleware untuk legacy integration'
                ]
            ],
            [
                'id' => 4,
                'slug' => 'design-system-component-library',
                'title' => 'Design System & Component Library',
                'description' => 'Library komponen komprehensif untuk pengembangan UI yang konsisten.',
                'full_description' => 'Membangun design system yang scalable dengan Storybook documentation, termasuk 50+ reusable components, design tokens, dan accessibility guidelines. Mempercepat development time hingga 60% untuk project-team.',
                'tags' => ['Figma', 'Storybook', 'React', 'TypeScript', 'Styled Components'],
                'image' => '/images/project-1.jpg',
                'category' => 'tools',
                'client' => 'Tech Startup XYZ',
                'year' => '2024',
                'duration' => '2 bulan',
                'demo_link' => '#',
                'github_link' => '#',
                'challenges' => [
                    'Konsistensi design across multiple products',
                    'Documentation yang komprehensif',
                    'Developer adoption'
                ],
                'solutions' => [
                    'Design tokens untuk konsistensi theme',
                    'Automated visual testing dengan Chromatic',
                    'Workshop dan training untuk development team'
                ]
            ]
        ];
    }

    // Helper method to find project by slug
    private function findProjectBySlug($slug)
    {
        $projects = $this->getAllProjects();
        
        foreach ($projects as $project) {
            if ($project['slug'] === $slug) {
                return $project;
            }
        }
        
        return null;
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

        $projects = $this->getAllProjects();

        return view('projects', compact('projects', 'userData'));
    }

    public function show($slug)
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

        $project = $this->findProjectBySlug($slug);

        if (!$project) {
            abort(404, 'Project tidak ditemukan');
        }

        return view('projects.show', compact('project', 'userData'));
    }
}