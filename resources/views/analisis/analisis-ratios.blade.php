<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Análisis Financiero') }}
        </h2>
    </x-slot>
    @livewire('analisis.analisis-ratios')
</x-app-layout>