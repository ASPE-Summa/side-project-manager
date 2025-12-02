@php use App\Models\Project; @endphp
@extends('layouts.app')

@section('content')
    <div class="mb-4">
        <h1 class="text-2xl font-semibold">New Project</h1>
    </div>

    <form action="{{ route('projects.store') }}" method="POST"
          class="rounded border border-grey-1 bg-dark-5 p-4 shadow-sm">
        @include('projects._form', ['project' => new Project()])
    </form>
@endsection
