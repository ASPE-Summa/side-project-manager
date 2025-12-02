@csrf
<div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
    <div class="sm:col-span-2">
        <label class="block text-sm font-medium text-success">Description</label>
        <input type="text" name="description" value="{{ old('description', $idea->description ?? '') }}" class="mt-1 w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
        @error('description')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label class="block text-sm font-medium text-success">Project</label>
        <select name="project_id" class="mt-1 w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            <option class="bg-dark-3" value="">No Project</option>
            @foreach ($projects as $project)
                <option class="bg-dark-4" value="{{ $project->id }}" @selected(old('project_id', $idea->project_id ?? '') == $project->id)>{{ $project->name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label class="block text-sm font-medium text-success">Date added</label>
        <input type="date" name="date_added" value="{{ old('date_added', optional($idea->date_added)->format('Y-m-d') ?? now()->toDateString()) }}" class="mt-1 w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
        @error('date_added')
            <p class="mt-1 text-sm text-danger">{{ $message }}</p>
        @enderror
    </div>
    <div class="flex items-center">
        <label for="implemented" class=" select-none block text-sm font-medium text-success">Implemented</label>
        <input type="checkbox" name="implemented"   value="1"
               {{ $idea->implemented ? 'checked="checked"' : '' }} class="ml-5 accent-success w-4 h-4 rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">

        @error('date_added')
        <p class="mt-1 text-sm text-danger">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="mt-4 flex items-center justify-end space-x-2">
    <a href="{{ route('ideas.index') }}" class="rounded border border-grey-0 px-3 py-2 text-sm bg-inverse hover:bg-dark-green hover:text-success">Cancel</a>
    <button type="submit" class="rounded bg-success px-3 py-2 text-sm font-medium text-dark-0 hover:bg-dark-green hover:text-success">Save</button>
</div>
