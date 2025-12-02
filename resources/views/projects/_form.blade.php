@csrf
<div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
    <div class="sm:col-span-2">
        <label class="block text-sm font-medium text-success">Name</label>
        <input type="text" name="name" value="{{ old('name', $project->name ?? '') }}" class="mt-1 w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
        @error('name')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="sm:col-span-2">
        <label class="block text-sm font-medium text-success">Description</label>
        <textarea name="description" rows="3" class="mt-1 w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>{{ old('description', $project->description ?? '') }}</textarea>
        @error('description')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-success">Repository URL</label>
        <input type="url" name="repository" value="{{ old('repository', $project->repository ?? '') }}" class="mt-1 w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
        @error('repository')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-success">Status</label>
        <select name="status" class="mt-1 w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
            <option  class="bg-dark-3" disabled value="" {{isset($project) ? 'selected' : ''}}>Select status</option>
            @foreach ($statuses as $status)
                <option class="bg-dark-4" value="{{ $status->name }}" @selected(old('status', $project->status?->name ?? '') === $status->name)>{{ ucwords(strtolower(str_replace('_', ' ', $status->name))) }}</option>
            @endforeach
        </select>
        @error('status')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-success">Start date</label>
        <input type="date" name="start_date" value="{{ isset($project, $project->start_date) ? $project->start_date->format('Y-m-d') : now()->toDateString() }}" class="mt-1 w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
        @error('start_date')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-success">Last updated</label>
        <input type="date" name="last_updated" value="{{ isset($project, $project->last_updated) ? $project->last_updated->format('Y-m-d') : now()->toDateString() }}" class="mt-1 w-full rounded border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
        @error('last_updated')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="mt-4 flex items-center justify-end space-x-2">
    <a href="{{ route('projects.index') }}" class="rounded border border-grey-0 px-3 py-2 text-sm bg-inverse hover:bg-dark-green hover:text-success">Cancel</a>
    <button type="submit" class="rounded bg-success px-3 py-2 text-sm font-medium text-dark-0 hover:bg-dark-green hover:text-success">Save</button>
</div>
