<?php

namespace App\Http\Requests;

use App\Hospital;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateHospitalRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('hospital_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'                     => [
                'required',
                'unique:hospitals,name,' . request()->route('hospital')->id,
            ],
            'address'                  => [
                'required',
            ],
            'phone'                    => [
                'required',
            ],
            'email'                    => [
                'required',
            ],
            'services_and_departments' => [
                'required',
            ],
        ];
    }
}
