<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Client') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('clients.store') }}">
                        @csrf
                
                        <!-- Contact Name -->
                        <div>
                            <x-input-label for="contact_name" :value="__('Contact Name')" />
                            <x-text-input id="contact_name" class="block mt-1 w-full" type="text" name="contact_name" :value="old('contact_name')" required autofocus autocomplete="contact_name" />
                            <x-input-error :messages="$errors->get('contact_name')" class="mt-2" />
                        </div>
                        
                        <!-- Contact Email Address -->
                        <div class="mt-4">
                            <x-input-label for="contact_email" :value="__('Contact Email')" />
                            <x-text-input id="contact_email" class="block mt-1 w-full" type="email" name="contact_email" :value="old('contact_email')" required autofocus autocomplete="contact_email" />
                            <x-input-error :messages="$errors->get('contact_email')" class="mt-2" />
                        </div>

                        <!-- Contact Phone Numer -->
                        <div>
                            <x-input-label for="contact_phone_number" :value="__('Contact Phone Number')" />
                            <x-text-input id="contact_phone_number" class="block mt-1 w-full" type="text" name="contact_phone_number" :value="old('contact_phone_number')" required autofocus autocomplete="contact_phone_number" />
                            <x-input-error :messages="$errors->get('contact_phone_number')" class="mt-2" />
                        </div>
                        
                        <!-- Company Name -->
                        <div>
                            <x-input-label for="company_name" :value="__('Company Name')" />
                            <x-text-input id="company_name" class="block mt-1 w-full" type="text" name="company_name" :value="old('company_name')" required autofocus autocomplete="company_name" />
                            <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
                        </div>
                        
                        <!-- Company Address -->
                        <div>
                            <x-input-label for="company_address" :value="__('Conpany Address')" />
                            <x-text-input id="company_address" class="block mt-1 w-full" type="text" name="company_address" :value="old('company_address')" required autofocus autocomplete="company_address" />
                            <x-input-error :messages="$errors->get('company_address')" class="mt-2" />
                        </div>
                        
                        <!-- Company City -->
                        <div>
                            <x-input-label for="company_city" :value="__('Conpany City')" />
                            <x-text-input id="company_city" class="block mt-1 w-full" type="text" name="company_city" :value="old('company_city')" required autofocus autocomplete="company_city" />
                            <x-input-error :messages="$errors->get('company_city')" class="mt-2" />
                        </div>
                        
                        <!-- Company ZIP -->
                        <div>
                            <x-input-label for="company_zip" :value="__('Conpany ZIP')" />
                            <x-text-input id="company_zip" class="block mt-1 w-full" type="text" name="company_zip" :value="old('company_zip')" required autofocus autocomplete="company_zip" />
                            <x-input-error :messages="$errors->get('company_zip')" class="mt-2" />
                        </div>
                        
                        <!-- Company VAT -->
                        <div>
                            <x-input-label for="company_vat" :value="__('Conpany VAT')" />
                            <x-text-input id="company_vat" class="block mt-1 w-full" type="text" name="company_vat" :value="old('company_vat')" required autofocus autocomplete="company_vat" />
                            <x-input-error :messages="$errors->get('company_vat')" class="mt-2" />
                        </div>
                        
                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 " href="{{ route('clients.index') }}">
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
