@csrf
<div class="grid grid-cols-1 gap-4">
    <div>
        <label class="block text-sm font-medium text-grey-1">Description</label>
        <input type="text" name="description" value="{{ old('description', $idea->description ?? '') }}" class="mt-1 w-full rounded border border-grey-1 bg-dark-2 text-fg shadow-sm focus:border-success focus:ring-success" required>
        @error('description')
            <p class="mt-1 text-sm text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label class="block text-sm font-medium text-grey-1">Project</label>
        <select name="project_id" class="mt-1 w-full rounded border border-grey-1 bg-dark-2 text-fg shadow-sm focus:border-success focus:ring-success" required>
            <option value="">Select a project</option>
            @foreach ($projects as $project)
                <option value="{{ $project->id }}" @selected(old('project_id', $idea->project_id ?? '') == $project->id)>{{ $project->name }}</option>
            @endforeach
        </select>
        @error('project_id')
            <p class="mt-1 text-sm text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label class="block text-sm font-medium text-grey-1">Date added</label>
        <input type="date" name="date_added" value="{{ old('date_added', isset($idea) ? $idea->date_added : now()->toDateString()) }}" class="mt-1 w-full rounded border border-grey-1 bg-dark-2 text-fg shadow-sm focus:border-success focus:ring-success" required>
        @error('date_added')
            <p class="mt-1 text-sm text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="mt-4 flex items-center justify-end space-x-2">
    <a href="{{ route('ideas.index') }}" class="rounded border border-grey-1 px-3 py-2 text-sm text-fg hover:bg-dark-2">Cancel</a>
    <button type="submit" class="rounded bg-success px-4 py-2 text-sm font-medium text-dark-0 hover:bg-dark-green hover:text-success">Save</button>
</div>
