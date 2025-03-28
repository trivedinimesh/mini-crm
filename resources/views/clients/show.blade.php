<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Client Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Company Information -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <h4 class="text-lg font-medium text-gray-900">Company Details:</h4>
                <p class="mt-2 text-sm text-gray-600">Company Name: {{ $client->company_name }}</p>
                <p class="mt-2 text-sm text-gray-600">Company Address: {{ $client->company_address }}</p>
                <p class="mt-2 text-sm text-gray-600">Company City: {{ $client->company_city }}</p>
                <p class="mt-2 text-sm text-gray-600">Company Zip: {{ $client->company_zip }}</p>
                <p class="mt-2 text-sm text-gray-600">Company VAT: {{ $client->company_vat }}</p>
            </div>

            <!-- Contact Information -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <h4 class="text-lg font-medium text-gray-900">Contact Details:</h4>
                <h3 class="text-lg font-medium text-gray-900">Contact Name: {{ $client->contact_name }}</h3>
                <p class="mt-2 text-sm text-gray-600">Contact Email: {{ $client->contact_email }}</p>
                <p class="mt-2 text-sm text-gray-600">Contact Phone: {{ $client->contact_phone_number }}</p>
            </div>

            <!-- Client's Project Information -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @if ($client->projects->isEmpty())
                    <h3 class="text-lg font-medium text-gray-900">-- No Projects Available for this client --</h3>
                @else
                    @foreach ($client->projects as $project)
                        <div class="mb-4">
                            <h3 class="text-lg font-medium text-gray-900">Project: {{ $project->title }}</h3>
                            <p class="mt-2 text-sm text-gray-600">Description: {{ $project->description }}</p>
                            <p class="mt-2 text-sm text-gray-600">Status: {{ $project->status }}</p>
                            <p class="mt-2 text-sm text-gray-600">Handled By: {{ $project->user->first_name }} {{ $project->user->last_name }}</p>
                            <p class="mt-2 text-sm text-gray-600">Deadline: {{ $project->deadline_at }}</p>
                        </div>
                    @endforeach
                @endif
            </div>

            <!-- Task with Client Information -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @if ($client->tasks->isEmpty())
                    <h3 class="text-lg font-medium text-gray-900">-- No Tasks Available for this client --</h3>
                @else
                    @foreach ($client->tasks as $task)
                        <div class="mb-4">
                            <h3 class="text-lg font-medium text-gray-900">Task: {{ $task->title }}</h3>
                            <p class="mt-2 text-sm text-gray-600">Description: {{ $task->description }}</p>
                            <p class="mt-2 text-sm text-gray-600">Status: {{ $task->status }}</p>
                            <p class="mt-2 text-sm text-gray-600">Handled by: {{ $task->user->first_name }} {{ $task->user->last_name }}</p>
                            <p class="mt-2 text-sm text-gray-600">Deadline: {{ $task->deadline_at }}</p>
                        </div>
                    @endforeach
                @endif
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <a href="{{ route('clients.index') }}" class="text-gray-900 font-medium rounded-lg text-sm mr-2 mb-2 underline float-right">Back</a>
            </div>
        </div>
    </div>

</x-app-layout>
