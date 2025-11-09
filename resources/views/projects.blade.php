@extends('layouts.app')

@section('content')
<section class="pt-32 pb-20 relative">
    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Semua Projek</h1>
            <p class="text-xl text-gray-300 max-w-2xl mx-auto">Kumpulan lengkap karya saya dalam pengembangan web, mobile, dan produk digital</p>
            <div class="w-20 h-1 bg-navy-500 mx-auto rounded-full mt-4"></div>
        </div>

        @if($projects->count() > 0)
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($projects as $project)
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
                                <span class="text-white text-sm font-medium capitalize">{{ $project->category }}</span>
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
            <div class="text-gray-500">Projek akan muncul di sini setelah ditambahkan melalui admin panel.</div>
        </div>
        @endif
    </div>
</section>
@endsection