@extends('layouts.app')

@section('content')
    <div class="mb-4">
        <h1 class="text-2xl font-semibold">New Idea</h1>
    </div>

    <form action="{{ route('ideas.store') }}" method="POST" class="rounded border border-gray-200 bg-white p-4 shadow-sm">
        @include('ideas._form', ['idea' => new \App\Models\Idea()])
    </form>
@endsection
