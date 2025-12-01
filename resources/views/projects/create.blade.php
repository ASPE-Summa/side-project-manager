@extends('layouts.app')

@section('content')
    <div class="mb-4">
        <h1 class="text-2xl font-semibold">New Project</h1>
    </div>

    <form action="{{ route('projects.store') }}" method="POST" class="rounded border border-gray-200 bg-white p-4 shadow-sm">
        @include('projects._form', ['project' => new \App\Models\Project()])
    </form>
@endsection
