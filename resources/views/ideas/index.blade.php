@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Ideas</h1>
        <a href="{{ route('ideas.create') }}" class="rounded bg-success px-3 py-2 text-sm font-medium text-dark-0 hover:bg-dark-green hover:text-success">Add idea</a>
    </div>

    <div class="overflow-hidden rounded border border-grey-1 bg-dark-5">
        <table class="w-full text-left text-sm text-fg">
            <thead class="bg-dark-1 text-success">
                <tr>
                    <th class="px-4 py-3">Description</th>
                    <th class="px-4 py-3">Project</th>
                    <th class="px-4 py-3">Date added</th>
                    <th class="px-4 py-3 w-32 text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($ideas as $idea)
                    <tr class="border-t border-grey-1">
                        <td class="px-4 py-3">{{ $idea->description }}</td>
                        <td class="px-4 py-3">{{ $idea->project?->name ?? '—' }}</td>
                        <td class="px-4 py-3">{{ $idea->date_added->format('d-m-Y') }}</td>
                        <td class="px-4 py-3 text-right space-x">
                            <a href="{{ route('ideas.show', $idea) }}" class="button bg-dark-blue p-1 rounded text-primary hover:bg-primary hover:text-dark-blue"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('ideas.edit', $idea) }}" class="button bg-dark-yellow p-1 rounded text-warning hover:bg-warning hover:text-dark-yellow"><i class="fa fa-file-pen"></i></a>
                            <form action="{{ route('ideas.destroy', $idea) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button bg-dark-red p-1 rounded text-sm text-danger hover:bg-danger hover:text-dark-red" onclick="return confirm('Delete this idea?')"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-6 text-center text-grey-1">No ideas yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
