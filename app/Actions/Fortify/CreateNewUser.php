<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;
    
    protected function Validate(array $input) {
        return Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', "string", "max:255"],
            "patronymic" => ["string", "max:255"],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();
    }

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {

        $this->Validate($input);

        return User::create([
            'name' => $input['name'],
            "surname" => $input['surname'],
            "role_id" => 3,
            "patronymic" => $input['patronymic'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
