@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="min-h-screen flex items-center justify-center relative">
        <div class="max-w-7xl mx-auto px-6 text-center relative z-10">
            <!-- Profile Image/Avatar -->
            <div class="mb-12 animate-float">
                <div
                    class="w-20 h-20 mx-auto rounded-2xl bg-gradient-to-br from-navy-500 to-blue-600 shadow-2xl shadow-navy-500/30 overflow-hidden">
                    <img src="/images/profile.jpg" alt="Alex Morgan" class="w-full h-full object-cover">
                </div>
            </div>

            <!-- Name & Tagline -->
            <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 animate-fade-up">
                {{ $userData['name'] }}
            </h1>
            <p class="text-xl md:text-2xl text-gray-300 mb-8 animate-fade-up animate-delay-100">
                {{ $userData['tagline'] }}
            </p>

            <!-- Bio -->
            <p class="text-lg text-gray-400 max-w-2xl mx-auto mb-12 animate-fade-up animate-delay-200">
                {{ $userData['bio'] }}
            </p>

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center animate-fade-up animate-delay-300">
                <a href="#projects"
                    class="px-8 py-3 bg-navy-600 text-white rounded-xl font-medium hover:bg-navy-700 transition-all duration-300 transform hover:-translate-y-1 shadow-lg shadow-navy-500/25 border border-navy-500/30">
                    Lihat Projek Saya
                </a>
                <a href="#contact"
                    class="px-8 py-3 border border-gray-700 text-gray-300 rounded-xl font-medium hover:border-gray-600 hover:text-white transition-all duration-300 transform hover:-translate-y-1">
                    Hubungi Saya
                </a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 relative">
        <div class="max-w-4xl mx-auto px-6 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Tentang Saya</h2>
                <div class="w-20 h-1 bg-navy-500 mx-auto rounded-full"></div>
            </div>

            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="space-y-6">
                    <p class="text-lg text-gray-300 leading-relaxed">
                        Saya seorang Frontend Developer dengan pengalaman 5+ tahun dalam membuat aplikasi web yang
                        user-friendly dan performan. Spesialis dalam JavaScript modern dan framework frontend.
                    </p>
                    <p class="text-lg text-gray-300 leading-relaxed">
                        Meski fokus pada frontend, saya juga memiliki pemahaman solid tentang backend development dengan
                        Laravel dan Node.js, memungkinkan saya untuk membangun solusi full-stack yang terintegrasi dengan
                        baik.
                    </p>
                    <div class="flex items-center space-x-4 pt-4">
                        <div class="flex items-center space-x-2 text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span>{{ $userData['location'] }}</span>
                        </div>
                        <div class="flex items-center space-x-2 text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span>{{ $userData['email'] }}</span>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <div class="bg-dark-tertiary rounded-2xl p-8 text-white space-y-4 shadow-xl border border-gray-800/50">
                        <div class="flex justify-between items-center">
                            <h3 class="text-xl font-semibold">Quick Facts</h3>
                            <div
                                class="w-8 h-8 bg-navy-500/20 rounded-full flex items-center justify-center border border-navy-500/30">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center pb-2 border-b border-gray-700">
                                <span>Projects Completed</span>
                                <span class="font-semibold">50+</span>
                            </div>
                            <div class="flex justify-between items-center pb-2 border-b border-gray-700">
                                <span>Years Experience</span>
                                <span class="font-semibold">8</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span>Happy Clients</span>
                                <span class="font-semibold">40+</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Projects Section (Featured Only) -->
    <!-- Projects Section (Featured Only) -->
<section id="projects" class="py-20 relative">
    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Projek Unggulan</h2>
            <p class="text-xl text-gray-300 max-w-2xl mx-auto">Beberapa projek terbaru yang menunjukkan pendekatan saya dalam development</p>
            <div class="w-20 h-1 bg-navy-500 mx-auto rounded-full mt-4"></div>
        </div>

        @if($featuredProjects->count() > 0)
        <div class="grid md:grid-cols-2 gap-8">
            @foreach($featuredProjects as $project)
            <a href="{{ route('projects.show', $project->slug) }}" class="group block">
                <div class="bg-dark-tertiary rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden border border-gray-800/50 hover:border-navy-500/50 transform hover:-translate-y-2 h-full flex flex-col">
                    <div class="h-48 relative overflow-hidden flex-shrink-0">
                        <img 
                            src="{{ $project->image ?? '/images/project-placeholder.jpg' }}" 
                            alt="{{ $project->title }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='block';"
                        >
                        <!-- Fallback gradient -->
                        <div class="absolute inset-0 bg-gradient-to-br from-navy-600 to-blue-700 hidden">
                            <div class="w-full h-full flex items-center justify-center">
                                <span class="text-white text-lg font-semibold">{{ $project->title }}</span>
                            </div>
                        </div>
                        
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-all duration-500"></div>
                        <div class="absolute top-4 right-4">
                            <div class="bg-black/40 backdrop-blur-sm rounded-full px-3 py-1 border border-white/10">
                                <span class="text-white text-sm font-medium">Unggulan</span>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 flex-grow flex flex-col">
                        <h3 class="text-xl font-semibold text-white mb-2 group-hover:text-navy-300 transition-colors">
                            {{ $project->title }}
                        </h3>
                        <p class="text-gray-400 mb-4 flex-grow">{{ $project->description }}</p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            @foreach($project->tags as $tag)
                            <span class="px-3 py-1 bg-gray-800 text-gray-300 rounded-full text-sm font-medium border border-gray-700">
                                {{ $tag }}
                            </span>
                            @endforeach
                        </div>
                        <div class="inline-flex items-center text-navy-400 font-medium group-hover:text-navy-300 transition-colors mt-auto">
                            Lihat Detail
                            <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        @else
        <div class="text-center py-12">
            <div class="text-gray-400 text-lg mb-4">Belum ada projek yang ditampilkan.</div>
            <div class="text-gray-500">Projek unggulan akan muncul di sini setelah ditambahkan melalui admin panel.</div>
        </div>
        @endif

        @if($featuredProjects->count() > 0)
        <div class="text-center mt-12">
            <a href="{{ route('projects') }}" class="inline-flex items-center px-6 py-3 border border-gray-700 text-gray-300 rounded-xl font-medium hover:border-navy-500 hover:text-white transition-all duration-300 transform hover:-translate-y-1">
                Lihat Semua Projek
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </a>
        </div>
        @endif
    </div>
</section>

    <!-- Skills Section -->
    <section id="skills" class="py-20 relative">
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Skills & Teknologi</h2>
                <p class="text-xl text-gray-300 max-w-2xl mx-auto">Tools dan teknologi yang saya gunakan untuk mewujudkan
                    ide</p>
                <div class="w-20 h-1 bg-navy-500 mx-auto rounded-full mt-4"></div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @foreach($skills as $skill)
                    <div
                        class="group p-6 bg-dark-tertiary rounded-xl border border-gray-800/50 hover:border-navy-500/50 transition-all duration-300 transform hover:-translate-y-1 shadow-lg hover:shadow-xl">
                        <div class="text-center">
                            <div
                                class="w-12 h-12 mx-auto mb-3 rounded-lg bg-gray-800 flex items-center justify-center group-hover:scale-110 transition-transform duration-300 border border-gray-700">
                                <span class="text-lg font-semibold {{ $skill[1] }}">{{ substr($skill[0], 0, 2) }}</span>
                            </div>
                            <h3 class="font-medium text-white">{{ $skill[0] }}</h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 relative">
        <div class="max-w-4xl mx-auto px-6 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Hubungi Saya</h2>
                <p class="text-xl text-gray-300 max-w-2xl mx-auto">Punya project dalam pikiran? Mari diskusikan bagaimana
                    kita bisa bekerja sama.</p>
                <div class="w-20 h-1 bg-navy-500 mx-auto rounded-full mt-4"></div>
            </div>

            <div class="grid md:grid-cols-2 gap-12">
                <!-- Contact Info -->
                <div class="space-y-8">
                    <div>
                        <h3 class="text-xl font-semibold text-white mb-4">Mari Terhubung</h3>
                        <p class="text-gray-400 mb-6">Saya selalu tertarik dengan peluang dan kolaborasi baru. Jangan ragu
                            untuk menghubungi!</p>
                    </div>

                    <div class="space-y-4">
                        <div class="flex items-center space-x-4 p-4 bg-dark-tertiary rounded-xl border border-gray-800/50">
                            <div
                                class="w-12 h-12 bg-navy-500/20 rounded-lg flex items-center justify-center border border-navy-500/30">
                                <svg class="w-6 h-6 text-navy-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-400">Email</p>
                                <p class="text-white font-medium">{{ $userData['email'] }}</p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4 p-4 bg-dark-tertiary rounded-xl border border-gray-800/50">
                            <div
                                class="w-12 h-12 bg-navy-500/20 rounded-lg flex items-center justify-center border border-navy-500/30">
                                <svg class="w-6 h-6 text-navy-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm text-gray-400">Lokasi</p>
                                <p class="text-white font-medium">{{ $userData['location'] }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Social Links -->
                    <!-- Social Links -->
                    <div>
                        <h4 class="font-semibold text-white mb-4">Follow Saya</h4>
                        <div class="flex space-x-4">
                            <!-- GitHub -->
                            <a href="{{ $userData['social']['github'] }}"
                                class="w-10 h-10 bg-dark-tertiary border border-gray-700 rounded-lg flex items-center justify-center text-gray-400 hover:text-white hover:border-navy-500 transition-all duration-300 transform hover:-translate-y-1 hover:bg-gray-800/30">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                                </svg>
                            </a>

                            <!-- LinkedIn -->
                            <a href="{{ $userData['social']['linkedin'] }}"
                                class="w-10 h-10 bg-dark-tertiary border border-gray-700 rounded-lg flex items-center justify-center text-gray-400 hover:text-blue-400 hover:border-blue-400 transition-all duration-300 transform hover:-translate-y-1 hover:bg-gray-800/30">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z" />
                                    <circle cx="4" cy="4" r="2" stroke="none" fill="currentColor" />
                                </svg>
                            </a>

                            <!-- Instagram -->
                            <a href="https://instagram.com/yourusername"
                                class="w-10 h-10 bg-dark-tertiary border border-gray-700 rounded-lg flex items-center justify-center text-gray-400 hover:text-pink-500 hover:border-pink-500 transition-all duration-300 transform hover:-translate-y-1 hover:bg-gray-800/30">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5" />
                                    <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37z" />
                                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5" />
                                </svg>
                            </a>

                            <!-- TikTok -->
                            <a href="https://tiktok.com/yourusername"
                                class="w-10 h-10 bg-dark-tertiary border border-gray-700 rounded-lg flex items-center justify-center text-gray-400 hover:text-black hover:bg-white transition-all duration-300 transform hover:-translate-y-1">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="bg-dark-tertiary rounded-2xl p-8 border border-gray-800/50 shadow-xl">
                    <form id="contact-form" class="space-y-6">
                        @csrf
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Nama</label>
                            <input type="text" id="name" name="name" required
                                class="w-full px-4 py-3 bg-dark-secondary border border-gray-700 rounded-xl focus:ring-2 focus:ring-navy-500 focus:border-navy-500 transition-all duration-300 text-white placeholder-gray-500">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email</label>
                            <input type="email" id="email" name="email" required
                                class="w-full px-4 py-3 bg-dark-secondary border border-gray-700 rounded-xl focus:ring-2 focus:ring-navy-500 focus:border-navy-500 transition-all duration-300 text-white placeholder-gray-500">
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-300 mb-2">Pesan</label>
                            <textarea id="message" name="message" rows="5" required
                                class="w-full px-4 py-3 bg-dark-secondary border border-gray-700 rounded-xl focus:ring-2 focus:ring-navy-500 focus:border-navy-500 transition-all duration-300 text-white placeholder-gray-500"></textarea>
                        </div>
                        <button type="submit"
                            class="w-full px-8 py-4 bg-navy-600 text-white rounded-xl font-medium hover:bg-navy-700 transition-all duration-300 transform hover:-translate-y-1 shadow-lg shadow-navy-500/25 border border-navy-500/30 flex items-center justify-center">
                            <span>Kirim Pesan</span>
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection