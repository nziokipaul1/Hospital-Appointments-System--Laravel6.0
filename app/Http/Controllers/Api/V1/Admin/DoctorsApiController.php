<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Doctor;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Http\Resources\Admin\DoctorResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DoctorsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('doctor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DoctorResource(Doctor::with(['services_offerings', 'hospitals', 'branches', 'user_profile'])->get());
    }

    public function store(StoreDoctorRequest $request)
    {
        $doctor = Doctor::create($request->all());
        $doctor->services_offerings()->sync($request->input('services_offerings', []));
        $doctor->hospitals()->sync($request->input('hospitals', []));
        $doctor->branches()->sync($request->input('branches', []));

        return (new DoctorResource($doctor))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Doctor $doctor)
    {
        abort_if(Gate::denies('doctor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DoctorResource($doctor->load(['services_offerings', 'hospitals', 'branches', 'user_profile']));
    }

    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
        $doctor->update($request->all());
        $doctor->services_offerings()->sync($request->input('services_offerings', []));
        $doctor->hospitals()->sync($request->input('hospitals', []));
        $doctor->branches()->sync($request->input('branches', []));

        return (new DoctorResource($doctor))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Doctor $doctor)
    {
        abort_if(Gate::denies('doctor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $doctor->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
