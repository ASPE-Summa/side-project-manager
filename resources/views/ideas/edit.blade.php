@extends('layouts.app')

@section('content')
    <div class="mb-4 flex items-center justify-between">
        <h1 class="text-2xl font-semibold">Edit Idea</h1>
        <a href="{{ route('ideas.show', $idea) }}" class="text-sm text-blue-600 hover:underline">View</a>
    </div>

    <form action="{{ route('ideas.update', $idea) }}" method="POST" class="rounded border border-gray-200 bg-white p-4 shadow-sm">
        @method('PUT')
        @include('ideas._form', ['idea' => $idea])
    </form>
@endsection
