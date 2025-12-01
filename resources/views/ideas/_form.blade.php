@csrf
<div class="grid grid-cols-1 gap-4">
    <div>
        <label class="block text-sm font-medium text-gray-700">Description</label>
        <input type="text" name="description" value="{{ old('description', $idea->description ?? '') }}" class="mt-1 w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
        @error('description')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700">Project</label>
        <select name="project_id" class="mt-1 w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
            <option value="">Select a project</option>
            @foreach ($projects as $project)
                <option value="{{ $project->id }}" @selected(old('project_id', $idea->project_id ?? '') == $project->id)>{{ $project->name }}</option>
            @endforeach
        </select>
        @error('project_id')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700">Date added</label>
        <input type="date" name="date_added" value="{{ old('date_added', isset($idea) ? $idea->date_added : now()->toDateString()) }}" class="mt-1 w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
        @error('date_added')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="mt-4 flex items-center justify-end space-x-2">
    <a href="{{ route('ideas.index') }}" class="rounded border border-gray-300 px-3 py-2 text-sm text-gray-700 hover:bg-gray-50">Cancel</a>
    <button type="submit" class="rounded bg-blue-600 px-4 py-2 text-sm font-medium text-white hover:bg-blue-700">Save</button>
</div>
