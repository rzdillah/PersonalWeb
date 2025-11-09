@extends('layouts.app')

@section('content')
    <div class="pt-32 pb-20">
        <div class="max-w-7xl mx-auto px-6">
            <!-- Header -->
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-white">Manage Projects</h1>
                    <p class="text-gray-400 mt-2">Add, edit, or remove portfolio projects</p>
                </div>
                <a href="{{ route('admin.projects.create') }}"
                    class="bg-navy-600 text-white px-6 py-3 rounded-xl font-medium hover:bg-navy-700 transition-all duration-300 transform hover:-translate-y-1 shadow-lg shadow-navy-500/25 disabled:opacity-50 disabled:cursor-not-allowed">
                    + Add New Project
                </a>
            </div>

            <!-- Success/Error Messages -->
            @if(session('success'))
                <div class="bg-green-500/20 border border-green-500/50 text-green-300 px-4 py-3 rounded-xl mb-6">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-500/20 border border-red-500/50 text-red-300 px-4 py-3 rounded-xl mb-6">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Drag & Drop Info -->
            <div class="bg-blue-500/10 border border-blue-500/30 text-blue-300 px-4 py-3 rounded-xl mb-6 flex items-center">
                <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16"></path>
                </svg>
                <span>Drag and drop projects to reorder them. Changes are saved automatically.</span>
            </div>

            <!-- Projects Table -->
            <div class="bg-dark-tertiary rounded-2xl border border-gray-800/50 overflow-hidden mb-8">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-800/50">
                            <tr>
                                <th
                                    class="px-6 py-4 text-left text-sm font-medium text-gray-400 uppercase tracking-wider w-20">
                                    Order
                                </th>
                                <th class="px-6 py-4 text-left text-sm font-medium text-gray-400 uppercase tracking-wider">
                                    Project</th>
                                <th class="px-6 py-4 text-left text-sm font-medium text-gray-400 uppercase tracking-wider">
                                    Category</th>
                                <th class="px-6 py-4 text-left text-sm font-medium text-gray-400 uppercase tracking-wider">
                                    Status</th>
                                <th class="px-6 py-4 text-left text-sm font-medium text-gray-400 uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-700 sortable" id="sortable-table">
                            @forelse($projects as $project)
                                <tr class="hover:bg-gray-800/30 transition-colors" data-id="{{ $project->id }}">
                                    <td class="px-6 py-4 cursor-move handle">
                                        <div class="flex items-center text-gray-400">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 8h16M4 16h16"></path>
                                            </svg>
                                            <span class="text-gray-300 font-mono text-sm">{{ $project->order }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-10 h-10 bg-gradient-to-br from-navy-600 to-blue-700 rounded-lg flex items-center justify-center flex-shrink-0">
                                            @if($project->image)
                                                <img src="{{ asset($project->image) }}" alt="{{ $project->title }}" 
                                                     class="w-full h-full object-cover rounded-lg"> {{-- Add this class --}}
                                            @else
                                                <div class="w-full h-full flex items-center justify-center"> {{-- Remove fixed height --}}
                                                    <span class="text-white text-xs font-bold">{{ substr($project->title, 0, 2) }}</span> {{-- Use initials like your original code --}}
                                                </div>
                                            @endif
                                            </div>  
                                            <div class="min-w-0 flex-1">
                                                <div class="text-white font-medium truncate" title="{{ $project->title }}">
                                                    {{ $project->title }}
                                                </div>
                                                <div class="text-gray-400 text-sm truncate" title="{{ $project->description }}">
                                                    {{ Str::limit($project->description, 60) }}
                                                </div>
                                                <div class="text-gray-500 text-xs mt-1">
                                                    Created: {{ $project->created_at->format('M j, Y') }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-navy-500/20 text-navy-300 capitalize">
                                            {{ $project->category }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($project->is_featured)
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-500/20 text-green-300">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7" />
                                                </svg>
                                                Featured
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-500/20 text-gray-300">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                                Hidden
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center space-x-2">
                                            <a href="{{ route('projects.show', $project->slug) }}" target="_blank"
                                                class="p-2 text-blue-400 hover:text-blue-300 transition-colors bg-blue-500/10 rounded-lg hover:bg-blue-500/20"
                                                title="View Live">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </a>
                                            <a href="{{ route('admin.projects.edit', $project) }}"
                                                class="p-2 text-yellow-400 hover:text-yellow-300 transition-colors bg-yellow-500/10 rounded-lg hover:bg-yellow-500/20"
                                                title="Edit">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>
                                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST"
                                                class="inline" onsubmit="return confirmDelete(this)">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="p-2 text-red-400 hover:text-red-300 transition-colors bg-red-500/10 rounded-lg hover:bg-red-500/20"
                                                    title="Delete">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center space-y-4 text-gray-400">
                                            <svg class="w-16 h-16 text-gray-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <div class="text-lg">No projects found</div>
                                            <p class="text-gray-500 max-w-md">Get started by creating your first portfolio
                                                project to showcase your work.</p>
                                            <a href="{{ route('admin.projects.create') }}"
                                                class="inline-flex items-center px-4 py-2 bg-navy-600 text-white rounded-lg hover:bg-navy-700 transition-colors">
                                                Create Your First Project
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Stats & Quick Actions -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="bg-dark-tertiary rounded-xl p-6 border border-gray-800/50">
                    <div class="text-2xl font-bold text-white">{{ $projects->count() }}</div>
                    <div class="text-gray-400 text-sm">Total Projects</div>
                </div>
                <div class="bg-dark-tertiary rounded-xl p-6 border border-gray-800/50">
                    <div class="text-2xl font-bold text-white">{{ $projects->where('is_featured', true)->count() }}</div>
                    <div class="text-gray-400 text-sm">Featured</div>
                </div>
                <div class="bg-dark-tertiary rounded-xl p-6 border border-gray-800/50">
                    <div class="text-2xl font-bold text-white">{{ $projects->unique('category')->count() }}</div>
                    <div class="text-gray-400 text-sm">Categories</div>
                </div>
                <div class="bg-dark-tertiary rounded-xl p-6 border border-gray-800/50">
                    <div class="text-2xl font-bold text-white">
                        {{ $projects->where('created_at', '>=', now()->subDays(30))->count() }}
                    </div>
                    <div class="text-gray-400 text-sm">Last 30 Days</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include SortableJS -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>

    <script>
        function confirmDelete(form) {
            const projectTitle = form.closest('tr').querySelector('.text-white').textContent.trim();
            return confirm(`Are you sure you want to delete "${projectTitle}"? This action cannot be undone.`);
        }

        // Drag & Drop functionality
        document.addEventListener('DOMContentLoaded', function () {
            const sortableTable = document.getElementById('sortable-table');

            if (sortableTable) {
                const sortable = new Sortable(sortableTable, {
                    handle: '.handle',
                    animation: 150,
                    ghostClass: 'sortable-ghost',
                    chosenClass: 'sortable-chosen',
                    dragClass: 'sortable-drag',

                    onEnd: function (evt) {
                        const itemEl = evt.item;
                        const projectId = itemEl.getAttribute('data-id');
                        const newOrder = evt.newIndex + 1; // +1 because order starts from 1

                        // Show saving indicator
                        showFlashMessage('Saving new order...', 'info');

                        // Send AJAX request to update order
                        fetch('{{ route("admin.projects.reorder") }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                project_id: projectId,
                                new_order: newOrder
                            })
                        })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    // Update the order numbers visually
                                    updateOrderNumbers();

                                    // Show success message
                                    showFlashMessage('Project order updated successfully!', 'success');
                                } else {
                                    showFlashMessage('Failed to update order. Please try again.', 'error');
                                    // Revert the sort if failed
                                    sortable.sort(sortable.toArray());
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                showFlashMessage('Error updating order. Please try again.', 'error');
                                sortable.sort(sortable.toArray());
                            });
                    }
                });

                function updateOrderNumbers() {
                    const rows = sortableTable.querySelectorAll('tr[data-id]');
                    rows.forEach((row, index) => {
                        const orderCell = row.querySelector('.handle span:last-child');
                        if (orderCell) {
                            orderCell.textContent = index + 1;
                        }
                    });
                }
            }

            function showFlashMessage(message, type) {
                // Remove existing flash messages
                const existingFlash = document.querySelector('.auto-flash-message');
                if (existingFlash) {
                    existingFlash.remove();
                }

                // Create flash message
                const flashDiv = document.createElement('div');
                flashDiv.className = `auto-flash-message mb-6 px-4 py-3 rounded-xl border ${type === 'success'
                        ? 'bg-green-500/20 border-green-500/50 text-green-300'
                        : type === 'error'
                            ? 'bg-red-500/20 border-red-500/50 text-red-300'
                            : 'bg-blue-500/20 border-blue-500/50 text-blue-300'
                    }`;
                flashDiv.textContent = message;

                // Insert after the header
                const header = document.querySelector('.max-w-7xl .flex.justify-between');
                header.parentNode.insertBefore(flashDiv, header.nextSibling);

                // Remove after 3 seconds (only for success/info)
                if (type !== 'error') {
                    setTimeout(() => {
                        flashDiv.remove();
                    }, 3000);
                }
            }

            // Original interactivity
            const rows = document.querySelectorAll('tbody tr');
            rows.forEach(row => {
                row.addEventListener('click', (e) => {
                    // Don't trigger on action buttons or drag handle
                    if (!e.target.closest('a') && !e.target.closest('button') &&
                        !e.target.closest('form') && !e.target.closest('.handle')) {
                        const editLink = row.querySelector('a[title="Edit"]');
                        if (editLink) editLink.click();
                    }
                });
            });
        });
    </script>

    <style>
        tbody tr {
            cursor: pointer;
        }

        tbody tr:hover {
            background-color: rgba(55, 65, 81, 0.3);
        }

        .sortable-ghost {
            opacity: 0.4;
            background-color: rgba(59, 130, 246, 0.1) !important;
        }

        .sortable-chosen {
            background-color: rgba(59, 130, 246, 0.2) !important;
        }

        .sortable-drag {
            opacity: 1 !important;
            transform: rotate(5deg);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }

        .handle {
            cursor: grab;
        }

        .handle:active {
            cursor: grabbing;
        }
    </style>
@endsection