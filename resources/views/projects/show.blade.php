@extends('layouts.app')

@section('content')
    <div class="mb-4 flex items-center justify-between">
        <div>
            <x-status-badge :status="$project->status"/>
            <h1 class="text-2xl font-semibold">{{ $project->name }}</h1>
        </div>
        <div class="space-x-2">
            <a href="{{route('projects.index', $project)}}" class="button bg-grey-3 p-1 rounded text-purple hover:bg-purple hover:text-dark-purple"><i class="fa fa-arrow-left"></i></a>
            <a href="{{ route('projects.edit', $project) }}" class="button bg-dark-yellow p-1 rounded text-warning hover:bg-warning hover:text-dark-yellow"><i class="fa fa-file-pen"></i> </a>
            <form action="{{ route('projects.destroy', $project) }}" method="POST" class="inline p1 mx-1">
                @csrf
                @method('DELETE')
                <a type="submit" class="button bg-dark-red p-1 rounded text-sm text-danger hover:bg-danger hover:text-dark-red" onclick="return confirm('Delete this project?')"><i class="fa fa-trash"></i></a>
            </form>
        </div>
    </div>

    <div class="rounded border border-grey-1 bg-dark-5 p-4 shadow-sm">
        <dl class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div>
                <dt class="text-sm text-success">Description</dt>
                <dd class="text-base font-medium">{{ $project->description }}</dd>
            </div>
            <div>
                <dt class="text-sm text-success">Repository</dt>
                <dd class="text-base font-medium">
                    <a href="{{ $project->repository }}" class="text-primary hover:underline" target="_blank" rel="noopener">
                        {{ $project->repository }}
                    </a>
                </dd>
            </div>
            <div>
                <dt class="text-sm text-success">Start date</dt>
                <dd class="text-base font-medium">{{ $project->start_date->format('d-m-Y') }}</dd>
            </div>
            <div>
                <dt class="text-sm text-success">Last updated</dt>
                <dd class="text-base font-medium">{{ $project->last_updated->format('d-m-Y') }}</dd>
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
                    <li class="rounded border border-grey-1 {{$idea->implemented? 'bg-dark-green' : 'bg-dark-4' }} text-fg px-4 py-3 shadow-sm flex items-center justify-between">
                        <div>
                            <p class="font-medium text-success">{{ $idea->description }}</p>
                            <p class="text-sm text-grey-0">Added on {{ $idea->date_added }}</p>
                        </div>
                        <a href="{{ route('ideas.show', $idea) }}" class="button bg-dark-blue p-1 rounded text-primary hover:bg-primary hover:text-dark-blue"><i class="fa fa-eye"></i></a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
