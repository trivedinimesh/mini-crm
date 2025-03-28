<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Task Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Task Information -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <h3 class="text-lg font-medium text-gray-900">Task: {{ $task->title }}</h3>
                <p class="mt-2 text-sm text-gray-600">Description: {{ $task->description }}</p>
                <p class="mt-2 text-sm text-gray-600">Status: {{ $task->status }}</p>
                <p class="mt-2 text-sm text-gray-600">Handled by: {{ $task->user->first_name }} {{ $task->user->last_name }}</p>
                <p class="mt-2 text-sm text-gray-600">Deadline: {{ $task->deadline_at }}</p>
            </div>

            <!-- Company Information -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <h4 class="text-lg font-medium text-gray-900">Company Details:</h4>
                <p class="mt-2 text-sm text-gray-600">Company Name: {{ $task->client->company_name }}</p>
                <p class="mt-2 text-sm text-gray-600">Company Address: {{ $task->client->company_address }}</p>
                <p class="mt-2 text-sm text-gray-600">Company City: {{ $task->client->company_city }}</p>
                <p class="mt-2 text-sm text-gray-600">Company Zip: {{ $task->client->company_zip }}</p>
                <p class="mt-2 text-sm text-gray-600">Company VAT: {{ $task->client->company_vat }}</p>
                <h4 class="text-lg font-medium text-gray-900 mt-4">Contact Details:</h4>
                <h3 class="mt-2 text-sm text-gray-600">Contact Name: {{ $task->client->contact_name }}</h3>
                <p class="mt-2 text-sm text-gray-600">Contact Email: {{ $task->client->contact_email }}</p>
                <p class="mt-2 text-sm text-gray-600">Contact Phone: {{ $task->client->contact_phone_number }}</p>
            </div>

            <!-- Tasks's Project Information -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                @if (!$task->project)
                    <h3 class="text-lg font-medium text-gray-900">-- No Projects Available for this task --</h3>
                @else
                    <div class="mb-4">
                        <h3 class="text-lg font-medium text-gray-900">Project: {{ $task->project->title }}</h3>
                        <p class="mt-2 text-sm text-gray-600">Description: {{ $task->project->description }}</p>
                        <p class="mt-2 text-sm text-gray-600">Status: {{ $task->project->status }}</p>
                        <p class="mt-2 text-sm text-gray-600">Handled By: {{ $task->project->user->first_name }} {{ $task->project->user->last_name }}</p>
                        <p class="mt-2 text-sm text-gray-600">Deadline: {{ $task->project->deadline_at }}</p>
                    </div>
                @endif
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <a href="{{ route('tasks.index') }}" class="text-gray-900 font-medium rounded-lg text-sm mr-2 mb-2 underline float-right">Back</a>
            </div>
        </div>
    </div>

</x-app-layout>
