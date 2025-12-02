@extends('layouts.app')

@section('content')
    <div class="mb-4 flex items-center justify-between">
        <h1 class="text-2xl font-semibold">Edit Idea</h1>
        <a href="{{ route('ideas.show', $idea) }}" class="button rounded text-sm bg-primary hover:bg-dark-blue hover:text-primary text-dark-0 p-1">View</a>
    </div>

    <form action="{{ route('ideas.update', $idea) }}" method="POST" class="rounded border border-grey-1 bg-dark-5 p-4 shadow-sm">
        @method('PUT')
        @include('ideas._form', ['idea' => $idea])
    </form>
@endsection
