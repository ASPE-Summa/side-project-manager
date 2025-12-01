@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Projects</h1>
        <a href="{{ route('projects.create') }}" class="rounded bg-success px-3 py-2 text-sm font-medium text-dark-0 hover:bg-dark-green hover:text-success">Add project</a>
    </div>

    <div class="overflow-hidden rounded border border-grey-1 bg-dark-5">
        <table class="w-full text-left text-sm">
            <thead class="bg-dark-1 text-success">
                <tr>
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Start date</th>
                    <th class="px-4 py-3">Last updated</th>
                    <th class="px-4 py-3 w-32 text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($projects as $project)
                    <tr class="border-t border-grey-1">
                        <td class="px-4 py-3">{{ $project->name }}</td>
                        <td class="px-4 py-3">{{ $project->status?->name }}</td>
                        <td class="px-4 py-3">{{ $project->start_date->format('d-m-Y') }}</td>
                        <td class="px-4 py-3">{{ $project->last_updated->format('d-m-Y') }}</td>
                        <td class="px-4 py-3 text-right space-x">
                            <a href="{{ route('projects.show', $project) }}" class="button bg-dark-blue p-1 rounded text-primary hover:bg-primary hover:text-dark-blue"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('projects.edit', $project) }}" class="button bg-dark-yellow p-1 rounded text-warning hover:bg-warning hover:text-dark-yellow"><i class="fa fa-file-pen"></i> </a>
                            <form action="{{ route('projects.destroy', $project) }}" method="POST" class="inline p1 mx-1">
                                @csrf
                                @method('DELETE')
                                <a type="submit" class="button bg-dark-red p-1 rounded text-sm text-danger hover:bg-danger hover:text-dark-red" onclick="return confirm('Delete this project?')"><i class="fa fa-trash"></i></a>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-gray-500">No projects yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
