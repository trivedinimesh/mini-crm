<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <a href="{{ route('clients.create') }}" class="text-gray-900 font-medium rounded-lg text-sm px-5 py-5 mr-2 mb-2 underline">Add New Client</a>
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 mt-4">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Company Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Company Address
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        VAT
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Action</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients as $client)
                                    <tr class="bg-white border-b border-gray-200 hover:bg-gray-50">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $client->company_name }}
                                        </th>
                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $client->company_address }}, {{ $client->company_city }}, {{ $client->company_zip }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $client->company_vat }}
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <a href="{{ route('clients.show', $client) }}" class="font-medium text-blue-600 hover:underline">View</a>
                                            <span class="font-medium text-blue-600">/</span>
                                            <a href="{{ route('clients.edit', $client) }}" class="font-medium text-blue-600 hover:underline">Edit</a>
                                            @can(App\PermissionEnum::DELETE_CLIENTS)
                                            <span class="font-medium text-blue-600">/</span>
                                            <form method="POST" 
                                                action="{{ route('clients.destroy', $client) }}"
                                                class="inline"
                                                onsubmit="return confirm('Are you sure you want to delete this client?')">
                                                @method('DELETE')
                                                @csrf
                                                <button  class="font-medium text-blue-600 hover:underline" type="submit">Delete</button>
                                            </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
        
                        <div class="px-3 py-3 pagination">
                            {{ $clients->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
