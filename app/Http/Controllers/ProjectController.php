<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    // ==================== PUBLIC METHODS ====================

    public function index()
    {
        $userData = $this->getUserData();

        $projects = Project::where('is_featured', true)
            ->orderBy('order')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('projects', compact('projects', 'userData'));
    }

    public function show($slug)
    {
        $userData = $this->getUserData();
        $project = Project::where('slug', $slug)->firstOrFail();

        return view('projects.show', compact('project', 'userData'));
    }

    // ==================== ADMIN CRUD METHODS ====================

    public function adminIndex()
    {
        $userData = $this->getUserData();
        $projects = Project::ordered()->get();

        return view('admin.projects.index', compact('projects', 'userData'));
    }

    public function create()
    {
        $userData = $this->getUserData();
        $categories = ['web', 'mobile', 'tools', 'ai', 'design'];

        return view('admin.projects.create', compact('categories', 'userData'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateProject($request);
        $validated = $this->processArrayFields($validated);

        // Handle image upload - store in public/images/projects
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'project-'.time().'-'.uniqid().'.'.$image->getClientOriginalExtension();

            // Store in public/images/projects directory
            $imagePath = $image->move(public_path('images/projects'), $imageName);
            $validated['image'] = 'images/projects/'.$imageName;
        }

        // Auto-assign to the end
        $lastOrder = Project::max('order') ?? 0;
        $validated['order'] = $lastOrder + 1;

        $validated['slug'] = Str::slug($validated['title']);
        $validated['is_featured'] = $request->has('is_featured');

        Project::create($validated);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project created successfully!');
    }

    public function edit(Project $project)
    {
        $userData = $this->getUserData();
        $categories = ['web', 'mobile', 'tools', 'ai', 'design'];

        return view('admin.projects.edit', compact('project', 'categories', 'userData'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $this->validateProject($request, $project);
        $validated = $this->processArrayFields($validated);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($project->image && file_exists(public_path($project->image))) {
                unlink(public_path($project->image));
            }

            $image = $request->file('image');
            $imageName = 'project-'.time().'-'.uniqid().'.'.$image->getClientOriginalExtension();

            // Store in public/images/projects directory
            $imagePath = $image->move(public_path('images/projects'), $imageName);
            $validated['image'] = 'images/projects/'.$imageName;
        } else {
            // Keep the existing image
            $validated['image'] = $project->image;
        }

        // Update slug if title changed
        if ($project->title !== $validated['title']) {
            $validated['slug'] = Str::slug($validated['title']);
        } else {
            // Keep the existing slug
            $validated['slug'] = $project->slug;
        }

        $validated['is_featured'] = $request->has('is_featured');

        $project->update($validated);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project updated successfully!');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project deleted successfully!');
    }

    // ==================== PRIVATE HELPER METHODS ====================

    private function getUserData()
    {
        return [
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
    }

    private function validateProject(Request $request, ?Project $project = null)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'full_description' => 'required|string',
            'tags' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'category' => 'required|string|in:web,mobile,tools,ai,design',
            'client' => 'nullable|string|max:255',
            'year' => 'required|string|max:4',
            'duration' => 'nullable|string|max:50',
            'demo_link' => 'nullable|url',
            'github_link' => 'nullable|url',
            'challenges' => 'nullable|string',
            'solutions' => 'nullable|string',
            'is_featured' => 'boolean',
        ];

        return $request->validate($rules);
    }

    private function processArrayFields($data)
    {
        // Convert comma-separated strings to arrays
        $data['tags'] = array_map('trim', explode(',', $data['tags']));

        if (isset($data['challenges']) && ! empty($data['challenges'])) {
            $data['challenges'] = array_map('trim', explode(',', $data['challenges']));
        } else {
            $data['challenges'] = null;
        }

        if (isset($data['solutions']) && ! empty($data['solutions'])) {
            $data['solutions'] = array_map('trim', explode(',', $data['solutions']));
        } else {
            $data['solutions'] = null;
        }

        return $data;
    }

    public function reorder(Request $request)
    {
        try {
            $projectId = $request->input('project_id');
            $newOrder = $request->input('new_order');

            $project = Project::findOrFail($projectId);
            $oldOrder = $project->order;

            if ($newOrder < $oldOrder) {
                // Moving up - increment orders between new and old
                Project::where('order', '>=', $newOrder)
                    ->where('order', '<', $oldOrder)
                    ->increment('order');
            } else {
                // Moving down - decrement orders between old and new
                Project::where('order', '>', $oldOrder)
                    ->where('order', '<=', $newOrder)
                    ->decrement('order');
            }

            // Update the moved project
            $project->order = $newOrder;
            $project->save();

            return response()->json(['success' => true]);

        } catch (\Exception $e) {
            \Log::error('Project reorder failed', [
                'project_id' => $request->input('project_id'),
                'new_order' => $request->input('new_order'),
                'error' => $e->getMessage(),
            ]);

            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }
}
