<?php

namespace App\Actions\Fortify;

use App\Models\User;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{

    
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     * 
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'nombre_empresa' => ['required', 'string', 'max:255'],
            'rubro_id' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'nombre_empresa' => $input['nombre_empresa'],
            'rubro_id' => $input['rubro_id'],
            'name' => $input['name'],
            
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

       
    }

   
}
