<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <a href="{{ route('projects.create') }}" class="text-gray-900 font-medium rounded-lg text-sm px-5 py-5 mr-2 mb-2 underline">Add New Project</a>
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 mt-4">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Title
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        User
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Client
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Deadline
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Action</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($projects as $project)
                                    <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $project->title }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $project->user->first_name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $project->client->company_name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $project->deadline_at }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $project->status }}
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <a href="{{ route('projects.edit', $project) }}" class="font-medium text-blue-600 hover:underline">Edit</a>
                                            <span class="font-medium text-blue-600">/</span>
                                            <form method="POST" 
                                                action="{{ route('projects.destroy', $project) }}"
                                                class="inline"
                                                onsubmit="return confirm('Are you sure you want to delete this project?')">
                                                @method('DELETE')
                                                @csrf
                                                <button  class="font-medium text-blue-600 hover:underline" type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
        
                        <div class="px-3 py-3 pagination">
                            {{ $projects->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
