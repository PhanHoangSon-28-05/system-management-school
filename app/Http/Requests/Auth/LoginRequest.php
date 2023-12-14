<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\Factory as ValidationFactory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'username' => 'required',
            'password' => 'required'
        ];
    }

    public function getCredentials()
    {
        $username = $this->get('username');
        //dd($this->get('username'), $this->get('password'));

        if ($this->isUsername($username)) {
            return [
                'username' => $username,
                'password' => $this->get('password')
            ];
        }

        return $this->only('username', 'password');
    }

    public function isUsername($param)
    {
        $factory = $this->container->make(ValidationFactory::class);

        return !$factory->make(
            ['username' => $param],
            ['username' => 'required|min:3|max:255']
        )->fails();
    }
}
