<?php

namespace App\Http\Requests;

use App\Doctor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateDoctorRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('doctor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'                 => [
                'required',
                'unique:doctors,name,' . request()->route('doctor')->id,
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
