<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $ideas = Idea::with('project')->orderBy('implemented')->orderByDesc('date_added')->get();

        return view('ideas.index', compact('ideas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $projects = Project::orderBy('name')->get();

        return view('ideas.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'description' => ['required', 'string', 'max:255'],
            'project_id' => ['nullable', 'exists:projects,id'],
            'date_added' => ['required', 'date'],
            'implemented' => ['nullable', 'boolean']
        ]);
        $validated['implemented'] = $request->has('implemented');
        Idea::create($validated);

        return redirect()->route('ideas.index')->with('status', 'Idea added.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Idea $idea): View
    {
        $idea->load('project');

        return view('ideas.show', compact('idea'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Idea $idea): View
    {
        $projects = Project::orderBy('name')->get();

        return view('ideas.edit', compact('idea', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Idea $idea): RedirectResponse
    {
        $validated = $request->validate([
            'description' => ['required', 'string', 'max:255'],
            'project_id' => ['nullable', 'exists:projects,id'],
            'date_added' => ['required', 'date'],
            'implemented' => ['nullable', 'boolean'],
        ]);
        $validated['implemented'] = $request->has('implemented');
        $idea->update($validated);

        return redirect()->route('ideas.index')->with('status', 'Idea updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idea $idea): RedirectResponse
    {
        $idea->delete();

        return redirect()->route('ideas.index')->with('status', 'Idea removed.');
    }
}
