@extends('layouts.app')

@section('content')
    <div class="mb-4 flex items-center justify-between">
        <div>
            <p class="text-sm text-gray-500">Project status: {{ $project->status?->name }}</p>
            <h1 class="text-2xl font-semibold">{{ $project->name }}</h1>
        </div>
        <div class="space-x-2">
            <a href="{{ route('projects.edit', $project) }}" class="rounded border border-gray-300 px-3 py-1.5 text-sm text-gray-700 hover:bg-gray-50">Edit</a>
            <form action="{{ route('projects.destroy', $project) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="rounded border border-red-200 px-3 py-1.5 text-sm text-red-700 hover:bg-red-50" onclick="return confirm('Delete this project?')">Delete</button>
            </form>
        </div>
    </div>

    <div class="rounded border border-gray-200 bg-white p-4 shadow-sm">
        <dl class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div>
                <dt class="text-sm text-gray-500">Description</dt>
                <dd class="text-base font-medium">{{ $project->description }}</dd>
            </div>
            <div>
                <dt class="text-sm text-gray-500">Repository</dt>
                <dd class="text-base font-medium">
                    <a href="{{ $project->repository }}" class="text-blue-600 hover:underline" target="_blank" rel="noopener">
                        {{ $project->repository }}
                    </a>
                </dd>
            </div>
            <div>
                <dt class="text-sm text-gray-500">Start date</dt>
                <dd class="text-base font-medium">{{ $project->start_date }}</dd>
            </div>
            <div>
                <dt class="text-sm text-gray-500">Last updated</dt>
                <dd class="text-base font-medium">{{ $project->last_updated }}</dd>
            </div>
        </dl>
    </div>

    <div class="mt-6">
        <h2 class="text-lg font-semibold mb-2">Ideas</h2>
        @if ($project->ideas->isEmpty())
            <p class="text-sm text-gray-500">No ideas yet.</p>
        @else
            <ul class="space-y-2">
                @foreach ($project->ideas as $idea)
                    <li class="rounded border border-gray-200 bg-white px-4 py-3 shadow-sm flex items-center justify-between">
                        <div>
                            <p class="font-medium">{{ $idea->description }}</p>
                            <p class="text-sm text-gray-500">Added on {{ $idea->date_added }}</p>
                        </div>
                        <a href="{{ route('ideas.show', $idea) }}" class="text-blue-600 hover:underline">View</a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
