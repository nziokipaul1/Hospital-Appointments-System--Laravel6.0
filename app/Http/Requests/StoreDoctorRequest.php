<?php

namespace App\Http\Requests;

use App\Doctor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreDoctorRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('doctor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'                 => [
                'required',
                'unique:doctors',
            ],
            'specialty'            => [
                'required',
            ],
            'services_offerings.*' => [
                'integer',
            ],
            'services_offerings'   => [
                'required',
                'array',
            ],
            'hospitals.*'          => [
                'integer',
            ],
            'hospitals'            => [
                'required',
                'array',
            ],
            'branches.*'           => [
                'integer',
            ],
            'branches'             => [
                'array',
            ],
            'user_profile_id'      => [
                'required',
                'integer',
            ],
            'is_available'         => [
                'required',
            ],
        ];
    }
}
