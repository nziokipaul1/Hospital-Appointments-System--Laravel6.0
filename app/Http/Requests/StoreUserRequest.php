<?php

namespace App\Http\Requests;

use App\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'        => [
                'required',
            ],
            'other_names' => [
                'required',
            ],
            'phone'       => [
                'min:7',
                'max:15',
                'required',
                'unique:users',
            ],
            'email'       => [
                'required',
                'unique:users',
            ],
            'roles.*'     => [
                'integer',
            ],
            'roles'       => [
                'required',
                'array',
            ],
            'password'    => [
                'required',
            ],
        ];
    }
}
