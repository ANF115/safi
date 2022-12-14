<x-guest-layout>
    
    <x-jet-authentication-card>
        <!--<x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>-->
        

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
                <div>
                    
                    <x-jet-input id="nombre_empresa" class="block mt-1 w-full" type="text" placeholder="Nombre de la Empresa" name="nombre_empresa" :value="old('nombre_empresa')"  wire:model="nombre_empresa" />
                   
                </div>
                <br>
                <div>
                    
                    <select name="rubro_id" id="rubro_id " class=" block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" wire:model="rubro_id">
                                    <option value="">Rubro de la empresa</option>
                                    @foreach (\App\Models\Rubro::all() as $rubro)
                                    <option value="{{ $rubro->id }}">
                                        {{ $rubro->name }}

                                    </option>
                                    @endforeach
                                
                                
                                    
                                
                    </select>
                  
                    
                </div>
            


            <div>
                <br>
                
                <x-jet-input id="name" class="block mt-1 w-full" type="text" placeholder="Nombre de Usuario" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
               
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" placeholder="Correo" :value="old('email')" required />
            </div>

            <div class="mt-4">
                
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" placeholder="Contrase??a" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" placeholder="Confirmar Contrase??a" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Ya estas registrado?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Registrar') }}
                </x-jet-button>
            </div>
            <br>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>

<style>


</style>
