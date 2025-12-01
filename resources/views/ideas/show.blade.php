@extends('layouts.app')

@section('content')
    <div class="mb-4 flex items-center justify-between">
        <div>
            <p class="text-sm text-gray-500">Idea for {{ $idea->project?->name ?? 'No project' }}</p>
            <h1 class="text-2xl font-semibold">{{ $idea->description }}</h1>
        </div>
        <div class="space-x-2">
            <a href="{{ route('ideas.edit', $idea) }}" class="rounded border border-gray-300 px-3 py-1.5 text-sm text-gray-700 hover:bg-gray-50">Edit</a>
            <form action="{{ route('ideas.destroy', $idea) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="rounded border border-red-200 px-3 py-1.5 text-sm text-red-700 hover:bg-red-50" onclick="return confirm('Delete this idea?')">Delete</button>
            </form>
        </div>
    </div>

    <div class="rounded border border-gray-200 bg-white p-4 shadow-sm">
        <dl class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div>
                <dt class="text-sm text-gray-500">Date added</dt>
                <dd class="text-base font-medium">{{ $idea->date_added }}</dd>
            </div>
            <div>
                <dt class="text-sm text-gray-500">Project</dt>
                <dd class="text-base font-medium">{{ $idea->project?->name ?? '—' }}</dd>
            </div>
        </dl>
    </div>
@endsection
