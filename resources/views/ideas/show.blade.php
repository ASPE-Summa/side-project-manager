@extends('layouts.app')

@section('content')
    <div class="mb-4 flex items-center justify-between">
        <div>
            <p class="text-sm text-grey-1">Idea for {{ $idea->project?->name ?? 'No project' }}</p>
            <h1 class="text-2xl font-semibold text-fg">{{ $idea->description }}</h1>
        </div>
        <div class="space-x-2">
            <a href="{{ route('ideas.edit', $idea) }}" class="rounded bg-dark-yellow px-3 py-2 text-sm text-warning hover:bg-warning hover:text-dark-yellow">Edit</a>
            <form action="{{ route('ideas.destroy', $idea) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="rounded bg-dark-red px-3 py-2 text-sm text-danger hover:bg-danger hover:text-dark-red" onclick="return confirm('Delete this idea?')">Delete</button>
            </form>
        </div>
    </div>

    <div class="rounded border border-grey-1 bg-dark-5 p-4 shadow-sm text-fg">
        <dl class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div>
                <dt class="text-sm text-grey-1">Date added</dt>
                <dd class="text-base font-medium">{{ $idea->date_added }}</dd>
            </div>
            <div>
                <dt class="text-sm text-grey-1">Project</dt>
                <dd class="text-base font-medium">{{ $idea->project?->name ?? '—' }}</dd>
            </div>
        </dl>
    </div>
@endsection
