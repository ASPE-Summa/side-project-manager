@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Ideas</h1>
        <a href="{{ route('ideas.create') }}" class="rounded bg-blue-600 px-3 py-2 text-sm font-medium text-white hover:bg-blue-700">Add idea</a>
    </div>

    <div class="overflow-hidden rounded border border-gray-200 bg-bg-dim">
        <table class="w-full text-left text-sm">
            <thead class="bg-gray-100 text-gray-600">
                <tr>
                    <th class="px-4 py-3">Description</th>
                    <th class="px-4 py-3">Project</th>
                    <th class="px-4 py-3">Date added</th>
                    <th class="px-4 py-3 w-32 text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($ideas as $idea)
                    <tr class="border-t border-gray-100">
                        <td class="px-4 py-3">{{ $idea->description }}</td>
                        <td class="px-4 py-3">{{ $idea->project?->name ?? '—' }}</td>
                        <td class="px-4 py-3">{{ $idea->date_added }}</td>
                        <td class="px-4 py-3 text-right space-x-2">
                            <a href="{{ route('ideas.show', $idea) }}" class="text-blue-600 hover:underline">View</a>
                            <a href="{{ route('ideas.edit', $idea) }}" class="text-yellow-700 hover:underline">Edit</a>
                            <form action="{{ route('ideas.destroy', $idea) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-700 hover:underline" onclick="return confirm('Delete this idea?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-6 text-center text-gray-500">No ideas yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
