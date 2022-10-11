<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Configuración de Cuentas') }}
        </h2>
    </x-slot>
    @livewire('cuentas.configurar')
</x-app-layout>