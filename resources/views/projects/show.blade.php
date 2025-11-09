@extends('layouts.app')

@section('content')
<section class="pt-32 pb-20 relative">
    <div class="max-w-6xl mx-auto px-6 relative z-10">
        <!-- Back Button -->
        <div class="mb-8">
            <a href="{{ route('projects') }}" class="inline-flex items-center text-navy-400 hover:text-navy-300 transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke Semua Projek
            </a>
        </div>

        <!-- Project Header -->
        <div class="bg-dark-tertiary rounded-2xl p-8 border border-gray-800/50 mb-8">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Project Image -->
                <div class="lg:w-1/2">
                    <div class="h-80 rounded-2xl overflow-hidden">
                        <img 
                            src="{{ asset($project->image) }}" alt="{{ $project->title }}"
                            alt="{{ $project->title }}"
                            class="w-full h-full object-cover"
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                        >
                        <!-- Fallback -->
                        <div class="w-full h-full bg-gradient-to-br from-navy-600 to-blue-700 hidden items-center justify-center">
                            <span class="text-white text-lg font-semibold">{{ $project->title }}</span>
                        </div>
                    </div>
                </div>

                <!-- Project Info -->
                <div class="lg:w-1/2">
                    <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">{{ $project->title }}</h1>
                    <p class="text-gray-300 text-lg mb-6">{{ $project->full_description }}</p>
                    
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div>
                            <h3 class="text-gray-400 text-sm mb-1">Klien</h3>
                            <p class="text-white font-medium">{{ $project->client ?? 'Tidak disebutkan' }}</p>
                        </div>
                        <div>
                            <h3 class="text-gray-400 text-sm mb-1">Tahun</h3>
                            <p class="text-white font-medium">{{ $project->year }}</p>
                        </div>
                        <div>
                            <h3 class="text-gray-400 text-sm mb-1">Kategori</h3>
                            <p class="text-white font-medium capitalize">{{ $project->category }}</p>
                        </div>
                        <div>
                            <h3 class="text-gray-400 text-sm mb-1">Durasi</h3>
                            <p class="text-white font-medium">{{ $project->duration ?? 'Tidak disebutkan' }}</p>
                        </div>
                    </div>

                    <!-- Tags -->
                    <div class="mb-6">
                        <h3 class="text-gray-400 text-sm mb-3">Teknologi</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($project->tags as $tag)
                            <span class="px-3 py-1 bg-navy-500/20 text-navy-300 rounded-full text-sm font-medium border border-navy-500/30">
                                {{ $tag }}
                            </span>
                            @endforeach
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-4">
                        @if($project->demo_link)
                        <a href="{{ $project->demo_link }}" target="_blank" class="px-6 py-3 bg-navy-600 text-white rounded-xl font-medium hover:bg-navy-700 transition-all duration-300 transform hover:-translate-y-1 shadow-lg shadow-navy-500/25 border border-navy-500/30">
                            Lihat Demo
                        </a>
                        @endif
                        @if($project->github_link)
                        <a href="{{ $project->github_link }}" target="_blank" class="px-6 py-3 border border-gray-700 text-gray-300 rounded-xl font-medium hover:border-gray-600 hover:text-white transition-all duration-300 transform hover:-translate-y-1">
                            Kode Sumber
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Project Details -->
        @if(($project->challenges && count($project->challenges) > 0) || ($project->solutions && count($project->solutions) > 0))
        <div class="grid md:grid-cols-2 gap-8">
            <!-- Challenges -->
            @if($project->challenges && count($project->challenges) > 0)
            <div class="bg-dark-tertiary rounded-2xl p-6 border border-gray-800/50">
                <h2 class="text-xl font-semibold text-white mb-4">Tantangan</h2>
                <ul class="space-y-3">
                    @foreach($project->challenges as $challenge)
                    <li class="flex items-start text-gray-300">
                        <svg class="w-5 h-5 text-navy-400 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                        {{ $challenge }}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Solutions -->
            @if($project->solutions && count($project->solutions) > 0)
            <div class="bg-dark-tertiary rounded-2xl p-6 border border-gray-800/50">
                <h2 class="text-xl font-semibold text-white mb-4">Solusi</h2>
                <ul class="space-y-3">
                    @foreach($project->solutions as $solution)
                    <li class="flex items-start text-gray-300">
                        <svg class="w-5 h-5 text-green-400 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ $solution }}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        @endif
    </div>
</section>
@endsection