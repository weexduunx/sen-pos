<x-app-layout>
    <x-slot name="header">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Account Information') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account") }}
        </p>
    </x-slot>
    <div >
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <livewire:profile.update-profile-information-form />
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <livewire:profile.update-password-form />
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <livewire:profile.delete-user-form />
                </div>
            </div>
        </div>
    </div>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</x-app-layout>
