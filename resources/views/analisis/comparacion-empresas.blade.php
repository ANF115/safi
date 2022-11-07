<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Comparación de Empresas') }}
        </h2>
    </x-slot>
    @livewire('analisis.comparacion-empresas')
</x-app-layout>