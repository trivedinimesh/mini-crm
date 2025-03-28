<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Project Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Project Information -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <h3 class="text-lg font-medium text-gray-900">Project: {{ $project->title }}</h3>
                <p class="mt-2 text-sm text-gray-600">Description: {{ $project->description }}</p>
                <p class="mt-2 text-sm text-gray-600">Status: {{ $project->status }}</p>
                <p class="mt-2 text-sm text-gray-600">Deadline: {{ $project->deadline_at }}</p>
            </div>

            <!-- User Information (Project Owner) -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <h4 class="text-lg font-medium text-gray-900">Project Handled By:</h4>
                <p class="mt-2 text-sm text-gray-600">Name: {{ $project->user->first_name }} {{ $project->user->last_name }}</p>
                <p class="mt-2 text-sm text-gray-600">Email: {{ $project->user->email }}</p>
            </div>

            <!-- Client Information -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <h4 class="text-lg font-medium text-gray-900">Client:</h4>
                <p class="mt-2 text-sm text-gray-600">Name: {{ $project->client->contact_name }}</p>
                <p class="mt-2 text-sm text-gray-600">Email: {{ $project->client->contact_email }}</p>
                <p class="mt-2 text-sm text-gray-600">Phone Number: {{ $project->client->contact_phone_number }}</p>
                <p class="mt-2 text-sm text-gray-600">Company Name: {{ $project->client->company_name }}</p>
                <p class="mt-2 text-sm text-gray-600">Company Address: {{ $project->client->company_address }}</p>
                <p class="mt-2 text-sm text-gray-600">Company City: {{ $project->client->company_city }}</p>
                <p class="mt-2 text-sm text-gray-600">Company Zip: {{ $project->client->company_zip }}</p>
                <p class="mt-2 text-sm text-gray-600">Company VAT: {{ $project->client->company_vat }}</p>
            </div>

            <!-- Task of Project Information -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @if ($project->tasks->isEmpty())
                    <h3 class="text-lg font-medium text-gray-900">-- No Tasks Available for this project --</h3>
                @else
                    @foreach ($project->tasks as $task)
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
                    <a href="{{ route('projects.index') }}" class="text-gray-900 font-medium rounded-lg text-sm mr-2 mb-2 underline float-right">Back</a>
            </div>
        </div>
    </div>

</x-app-layout>
