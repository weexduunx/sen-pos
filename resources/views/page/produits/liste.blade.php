<x-app-layout>
    <x-slot name="header">
        <h4>{{ __('Product List') }}</h4>
        <h6>{{ __("Manage your products") }}</h6>
    </x-slot>
    <livewire:produits.liste-produits />
</x-app-layout>  