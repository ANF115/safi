<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cargar Estados Financieros') }}
        </h2>
    </x-slot>
    @livewire('estados.cargar-estados')
</x-app-layout>