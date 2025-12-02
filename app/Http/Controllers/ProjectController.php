<?php

namespace App\Http\Controllers;

use App\Enum\ProjectStatus;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\Rules\Enum;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(): View
    {
        $projects = Project::withCount('ideas')->orderBy('name')->get();

        return view('projects.index', compact('projects'));
    }

    public function create(): View
    {
        $statuses = ProjectStatus::cases();

        return view('projects.create', compact('statuses'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validatedData($request);

        Project::create($validated);

        return redirect()->route('projects.index')->with('status', 'Project created.');
    }

    public function show(Project $project): View
    {
        $project->load('ideas');

        return view('projects.show', compact('project'));
    }

    public function edit(Project $project): View
    {
        $statuses = ProjectStatus::cases();

        return view('projects.edit', compact('project', 'statuses'));
    }

    public function update(Request $request, Project $project): RedirectResponse
    {
        $validated = $this->validatedData($request);

        $project->update($validated);

        return redirect()->route('projects.index')->with('status', 'Project updated.');
    }

    public function destroy(Project $project): RedirectResponse
    {
        $project->delete();

        return redirect()->route('projects.index')->with('status', 'Project deleted.');
    }

    protected function validatedData(Request $request): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'repository' => ['required', 'url'],
            'start_date' => ['required', 'date'],
            'last_updated' => ['required', 'date'],
            'status' => ['required', new Enum(ProjectStatus::class)],
        ]);
    }
}
