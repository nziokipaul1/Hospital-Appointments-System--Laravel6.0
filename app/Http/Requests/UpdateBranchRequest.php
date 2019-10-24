<?php

namespace App\Http\Requests;

use App\Branch;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateBranchRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('branch_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'                     => [
                'required',
                'unique:branches,name,' . request()->route('branch')->id,
            ],
            'address'                  => [
                'required',
            ],
            'phone'                    => [
                'required',
            ],
            'services_and_departments' => [
                'required',
            ],
            'main_hospitals.*'         => [
                'integer',
            ],
            'main_hospitals'           => [
                'required',
                'array',
            ],
        ];
    }
}
