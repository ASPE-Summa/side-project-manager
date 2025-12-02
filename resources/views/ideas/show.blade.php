@extends('layouts.app')

@section('content')
    <div class="mb-4 flex items-center justify-between">
        <div>
            <p class="text-xs font-semibold uppercase tracking-wide text-success">Idea</p>
            <h1 class="text-2xl font-semibold text-fg">{{ $idea->description }}</h1>
            <p class="text-sm text-grey-1">For {{ $idea->project?->name ?? 'No project' }}</p>
        </div>
        <div class="space-x-2">
            <a href="{{ route('ideas.index') }}" class="button bg-grey-3 p-1 rounded text-purple hover:bg-purple hover:text-dark-purple"><i class="fa fa-arrow-left"></i></a>
            <a href="{{ route('ideas.edit', $idea) }}" class="button bg-dark-yellow p-1 rounded text-warning hover:bg-warning hover:text-dark-yellow"><i class="fa fa-file-pen"></i></a>
            <form action="{{ route('ideas.destroy', $idea) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="button bg-dark-red p-1 rounded text-sm text-danger hover:bg-danger hover:text-dark-red" onclick="return confirm('Delete this idea?')">
                    <i class="fa fa-trash"></i>
                </button>
            </form>
        </div>
    </div>

    <div class="rounded border border-grey-1 bg-dark-5 p-4 shadow-sm text-fg">
        <dl class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div>
                <dt class="text-sm text-success">Date added</dt>
                <dd class="text-base font-medium">{{ $idea->date_added->format('d-m-Y') }}</dd>
            </div>
            <div>
                <dt class="text-sm text-success">Project</dt>
                <dd class="text-base font-medium">{{ $idea->project?->name ?? '—' }}</dd>
            </div>
        </dl>
    </div>
@endsection
