<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('tasks.store') }}">
                        @csrf
                
                        <!-- Title -->
                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <!-- Description -->
                        <div>
                            <x-input-label for="description" :value="__('Description')" />
                            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required autofocus />
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <!-- Deadline -->
                        <div>
                            <x-input-label for="deadline_at" :value="__('Deadline')" />
                            <x-text-input id="deadline_at" class="block mt-1 w-full" type="date" name="deadline_at" :value="old('deadline_at')" required autofocus />
                            <x-input-error :messages="$errors->get('deadline_at')" class="mt-2" />
                        </div>
                        
                        <!-- User -->
                        <div>
                            <x-input-label for="user_id" :value="__('User')" />
                            <select id="user_id" class="block mt-1 w-full font-medium text-sm text-gray-700 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="user_id" :value="old('user_id')" required autofocus>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}"
                                        @selected(old('user_id') == $user->id)>{{ $user->first_name.' '.$user->last_name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('user_id')" class="mt-2" />
                        </div>

                        <!-- Clinet -->
                        <div>
                            <x-input-label for="client_id" :value="__('Client')" />
                            <select id="client_id" class="block mt-1 w-full font-medium text-sm text-gray-700 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="client_id" :value="old('client_id')" required autofocus>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}"
                                        @selected(old('client_id') == $client->id)>{{ $client->company_name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('client_id')" class="mt-2" />
                        </div>

                        <!-- Project -->
                        <div>
                            <x-input-label for="project_id" :value="__('Project')" />
                            <select id="project_id" class="block mt-1 w-full font-medium text-sm text-gray-700 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="project_id" :value="old('project_id')" required autofocus>
                                @foreach ($projects as $project)
                                    <option value="{{ $project->id }}"
                                        @selected(old('project_id') == $project->id)>{{ $project->title }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('project_id')" class="mt-2" />
                        </div>

                        <!-- Status -->
                        <div>
                            <x-input-label for="status" :value="__('Status')" />
                            <select id="status" class="block mt-1 w-full font-medium text-sm text-gray-700 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="status" :value="old('status')" required autofocus>
                                @foreach (App\StatusEnum::cases() as $status)
                                    <option value="{{ $status->value }}"
                                        @selected(old('status') == $status->value)>{{ $status->value }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('status')" class="mt-2" />
                        </div>
                        
                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 " href="{{ route('tasks.index') }}">
                                {{ __('Back') }}
                            </a>

                            <x-primary-button class="ms-3">
                                {{ __('Create') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
