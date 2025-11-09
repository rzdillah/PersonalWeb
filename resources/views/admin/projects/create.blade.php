@extends('layouts.app')

@section('content')
<div class="pt-32 pb-20">
    <div class="max-w-4xl mx-auto px-6">
        <!-- Admin Header -->
        @if(session('admin_logged_in'))
        <div class="flex justify-between items-center mb-6 p-4 bg-navy-500/10 rounded-xl border border-navy-500/20">
            <div class="flex items-center space-x-4">
                <div class="text-sm text-gray-400">
                    Admin: <span class="text-white">{{ session('admin_email') }}</span>
                </div>
                <span class="text-gray-600">•</span>
                <a href="{{ route('admin.projects.index') }}" class="text-sm text-gray-400 hover:text-white transition-colors">
                    ← Back to Projects
                </a>
            </div>
            <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" 
                        class="text-sm text-gray-400 hover:text-white transition-colors px-3 py-1 border border-gray-600 rounded-lg hover:border-gray-500"
                        onclick="return confirm('Logout from admin panel?')">
                    🚪 Logout
                </button>
            </form>
        </div>
        @endif

        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-white">Create New Project</h1>
            <p class="text-gray-400 mt-2">Add a new project to your portfolio</p>
        </div>

        <!-- Success/Error Messages -->
        @if($errors->any())
            <div class="bg-red-500/20 border border-red-500/50 text-red-300 px-4 py-3 rounded-xl mb-6">
                <ul class="list-disc list-inside space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Create Form -->
        <div class="bg-dark-tertiary rounded-2xl p-8 border border-gray-800/50">
            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <!-- Title -->
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-300 mb-2">Project Title *</label>
                            <input type="text" 
                                   id="title" 
                                   name="title" 
                                   value="{{ old('title') }}"
                                   required 
                                   class="w-full px-4 py-3 bg-dark-secondary border border-gray-700 rounded-xl focus:ring-2 focus:ring-navy-500 focus:border-navy-500 transition-all duration-300 text-white placeholder-gray-500"
                                   placeholder="e.g., E-commerce Platform">
                        </div>

                        <!-- Category -->
                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-300 mb-2">Category *</label>
                            <select id="category" 
                                    name="category" 
                                    required
                                    class="w-full px-4 py-3 bg-dark-secondary border border-gray-700 rounded-xl focus:ring-2 focus:ring-navy-500 focus:border-navy-500 transition-all duration-300 text-white">
                                <option value="">Select Category</option>
                                <option value="web" {{ old('category') == 'web' ? 'selected' : '' }}>Web Development</option>
                                <option value="mobile" {{ old('category') == 'mobile' ? 'selected' : '' }}>Mobile App</option>
                                <option value="tools" {{ old('category') == 'tools' ? 'selected' : '' }}>Tools & Systems</option>
                                <option value="ai" {{ old('category') == 'ai' ? 'selected' : '' }}>AI & Machine Learning</option>
                                <option value="design" {{ old('category') == 'design' ? 'selected' : '' }}>Design System</option>
                            </select>
                        </div>

                        <!-- Client -->
                        <div>
                            <label for="client" class="block text-sm font-medium text-gray-300 mb-2">Client</label>
                            <input type="text" 
                                   id="client" 
                                   name="client" 
                                   value="{{ old('client') }}"
                                   class="w-full px-4 py-3 bg-dark-secondary border border-gray-700 rounded-xl focus:ring-2 focus:ring-navy-500 focus:border-navy-500 transition-all duration-300 text-white placeholder-gray-500"
                                   placeholder="e.g., PT. Example Company">
                        </div>

                        <!-- Year -->
                        <div>
                            <label for="year" class="block text-sm font-medium text-gray-300 mb-2">Year *</label>
                            <input type="text" 
                                   id="year" 
                                   name="year" 
                                   value="{{ old('year') }}"
                                   required 
                                   class="w-full px-4 py-3 bg-dark-secondary border border-gray-700 rounded-xl focus:ring-2 focus:ring-navy-500 focus:border-navy-500 transition-all duration-300 text-white placeholder-gray-500"
                                   placeholder="e.g., 2024">
                        </div>

                        <!-- Duration -->
                        <div>
                            <label for="duration" class="block text-sm font-medium text-gray-300 mb-2">Duration</label>
                            <input type="text" 
                                   id="duration" 
                                   name="duration" 
                                   value="{{ old('duration') }}"
                                   class="w-full px-4 py-3 bg-dark-secondary border border-gray-700 rounded-xl focus:ring-2 focus:ring-navy-500 focus:border-navy-500 transition-all duration-300 text-white placeholder-gray-500"
                                   placeholder="e.g., 3 months">
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <!-- Image Upload Field - Dynamic Height -->
<div class="mb-6">
    <label class="block text-sm font-medium text-gray-300 mb-3">Project Image</label>
    
    <div class="flex flex-col sm:flex-row gap-6 items-stretch"> <!-- Changed to items-stretch -->
        <!-- Current Image (Edit Page Only) -->
        @if(isset($project) && $project->image)
            <div class="flex-shrink-0">
                <p class="text-sm text-gray-400 mb-2">Current Image</p>
                <div class="relative group">
                    <img src="{{ asset($project->image) }}" 
                         alt="{{ $project->title }}" 
                         class="w-24 h-24 object-cover rounded-lg border-2 border-gray-600">
                </div>
            </div>
        @endif

        <!-- File Upload Area - Dynamic Height -->
        <div class="flex-1 flex flex-col">
            <div class="border-2 border-dashed border-gray-600 rounded-lg p-4 transition-colors hover:border-gray-500 flex-1 flex items-center justify-center min-h-[96px]"> <!-- flex-1 and min-h -->
                <!-- File Input -->
                <input type="file" name="image" id="image" 
                       class="hidden"
                       accept="image/*">
                
                <label for="image" class="cursor-pointer block w-full text-center">
                    <div class="flex flex-col items-center justify-center">
                        <svg class="h-8 w-8 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <p class="text-sm text-gray-400">
                            <span class="font-medium text-blue-400">Click to upload</span>
                        </p>
                        <p class="text-xs text-gray-500 mt-1">or drag and drop</p>
                    </div>
                </label>
            </div>

            <!-- Preview Area (stays below) -->
            <div id="imagePreview" class="mt-3 hidden">
                <div class="flex items-center gap-3">
                    <p class="text-sm text-gray-400 flex-shrink-0">New Image:</p>
                    <div class="relative">
                        <img id="preview" class="w-16 h-16 object-cover rounded border border-gray-600">
                        <button type="button" onclick="clearImage()" class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs hover:bg-red-600">
                            ×
                        </button>
                    </div>
                </div>
            </div>

            @error('image')
                <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
            @enderror
        </div>
    </div>
</div>
                        <!-- Demo Link -->
                        <div>
                            <label for="demo_link" class="block text-sm font-medium text-gray-300 mb-2">Demo Link</label>
                            <input type="url" 
                                   id="demo_link" 
                                   name="demo_link" 
                                   value="{{ old('demo_link') }}"
                                   class="w-full px-4 py-3 bg-dark-secondary border border-gray-700 rounded-xl focus:ring-2 focus:ring-navy-500 focus:border-navy-500 transition-all duration-300 text-white placeholder-gray-500"
                                   placeholder="https://demo.example.com">
                        </div>

                        <!-- GitHub Link -->
                        <div>
                            <label for="github_link" class="block text-sm font-medium text-gray-300 mb-2">GitHub Link</label>
                            <input type="url" 
                                   id="github_link" 
                                   name="github_link" 
                                   value="{{ old('github_link') }}"
                                   class="w-full px-4 py-3 bg-dark-secondary border border-gray-700 rounded-xl focus:ring-2 focus:ring-navy-500 focus:border-navy-500 transition-all duration-300 text-white placeholder-gray-500"
                                   placeholder="https://github.com/username/repo">
                        </div>

                        <!-- Tags -->
                        <div>
                            <label for="tags" class="block text-sm font-medium text-gray-300 mb-2">Technologies *</label>
                            <input type="text" 
                                   id="tags" 
                                   name="tags" 
                                   value="{{ old('tags') }}"
                                   required 
                                   class="w-full px-4 py-3 bg-dark-secondary border border-gray-700 rounded-xl focus:ring-2 focus:ring-navy-500 focus:border-navy-500 transition-all duration-300 text-white placeholder-gray-500"
                                   placeholder="Laravel, Vue.js, Tailwind CSS (comma separated)">
                            <p class="text-gray-500 text-xs mt-1">Separate technologies with commas</p>
                        </div>

                        <!-- Checkboxes -->
                        <div class="space-y-3">
                            <label class="flex items-center">
                                <input type="checkbox" 
                                       name="is_featured" 
                                       value="1"
                                       {{ old('is_featured') ? 'checked' : '' }}
                                       class="rounded bg-dark-secondary border-gray-700 text-navy-500 focus:ring-navy-500">
                                <span class="ml-2 text-gray-300">Featured Project</span>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Full Width Fields -->
                <div class="mt-6 space-y-6">
                    <!-- Short Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-300 mb-2">Short Description *</label>
                        <textarea id="description" 
                                  name="description" 
                                  required 
                                  rows="3"
                                  class="w-full px-4 py-3 bg-dark-secondary border border-gray-700 rounded-xl focus:ring-2 focus:ring-navy-500 focus:border-navy-500 transition-all duration-300 text-white placeholder-gray-500"
                                  placeholder="Brief project description (max 500 characters)">{{ old('description') }}</textarea>
                    </div>

                    <!-- Full Description -->
                    <div>
                        <label for="full_description" class="block text-sm font-medium text-gray-300 mb-2">Full Description *</label>
                        <textarea id="full_description" 
                                  name="full_description" 
                                  required 
                                  rows="6"
                                  class="w-full px-4 py-3 bg-dark-secondary border border-gray-700 rounded-xl focus:ring-2 focus:ring-navy-500 focus:border-navy-500 transition-all duration-300 text-white placeholder-gray-500"
                                  placeholder="Detailed project description...">{{ old('full_description') }}</textarea>
                    </div>

                    <!-- Challenges -->
                    <div>
                        <label for="challenges" class="block text-sm font-medium text-gray-300 mb-2">Challenges</label>
                        <textarea id="challenges" 
                                  name="challenges" 
                                  rows="3"
                                  class="w-full px-4 py-3 bg-dark-secondary border border-gray-700 rounded-xl focus:ring-2 focus:ring-navy-500 focus:border-navy-500 transition-all duration-300 text-white placeholder-gray-500"
                                  placeholder="Key challenges faced (comma separated)">{{ old('challenges') }}</textarea>
                    </div>

                    <!-- Solutions -->
                    <div>
                        <label for="solutions" class="block text-sm font-medium text-gray-300 mb-2">Solutions</label>
                        <textarea id="solutions" 
                                  name="solutions" 
                                  rows="3"
                                  class="w-full px-4 py-3 bg-dark-secondary border border-gray-700 rounded-xl focus:ring-2 focus:ring-navy-500 focus:border-navy-500 transition-all duration-300 text-white placeholder-gray-500"
                                  placeholder="Solutions implemented (comma separated)">{{ old('solutions') }}</textarea>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex justify-end space-x-4 mt-8 pt-6 border-t border-gray-700">
                    <a href="{{ route('admin.projects.index') }}" 
                       class="px-6 py-3 border border-gray-700 text-gray-300 rounded-xl font-medium hover:border-gray-600 hover:text-white transition-all duration-300">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="px-6 py-3 bg-navy-600 text-white rounded-xl font-medium hover:bg-navy-700 transition-all duration-300 transform hover:-translate-y-1 shadow-lg shadow-navy-500/25">
                        Create Project
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('image').addEventListener('change', function(e) {
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('imagePreview');
    const previewImg = document.getElementById('preview');
    const dropArea = document.querySelector('[for="image"]').parentElement;

    // File input change handler
    imageInput.addEventListener('change', function(e) {
        handleFileSelection(this.files[0]);
    });

    // Drag and drop functionality
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    ['dragenter', 'dragover'].forEach(eventName => {
        dropArea.addEventListener(eventName, () => {
            dropArea.classList.add('border-blue-400', 'bg-gray-700');
        }, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, () => {
            dropArea.classList.remove('border-blue-400', 'bg-gray-700');
        }, false);
    });

    dropArea.addEventListener('drop', function(e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        if (files.length > 0) {
            handleFileSelection(files[0]);
            imageInput.files = files;
        }
    }, false);

    function handleFileSelection(file) {
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImg.src = e.target.result;
                imagePreview.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }
    }
});

// Clear image selection
function clearImage() {
    const imageInput = document.getElementById('image');
    const imagePreview = document.getElementById('imagePreview');
    
    imageInput.value = '';
    imagePreview.classList.add('hidden');
}
// Character counter for description
const description = document.getElementById('description');
const charCount = document.createElement('div');
charCount.className = 'text-gray-500 text-xs mt-1 text-right';
description.parentNode.appendChild(charCount);

description.addEventListener('input', function() {
    const length = this.value.length;
    charCount.textContent = `${length}/500 characters`;
    if (length > 500) {
        charCount.classList.add('text-red-400');
    } else {
        charCount.classList.remove('text-red-400');
    }
});

// Trigger initial count
description.dispatchEvent(new Event('input'));
</script>
@endsection