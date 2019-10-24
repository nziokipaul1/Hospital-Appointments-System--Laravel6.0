<?php

namespace App\Http\Controllers\Admin;

use App\Branch;
use App\Doctor;
use App\Hospital;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDoctorRequest;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Service;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DoctorsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('doctor_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $doctors = Doctor::all();

        return view('admin.doctors.index', compact('doctors'));
    }

    public function create()
    {
        abort_if(Gate::denies('doctor_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $services_offerings = Service::all()->pluck('name_of_the_service', 'id');

        $hospitals = Hospital::all()->pluck('name', 'id');

        $branches = Branch::all()->pluck('name', 'id');

        $user_profiles = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.doctors.create', compact('services_offerings', 'hospitals', 'branches', 'user_profiles'));
    }

    public function store(StoreDoctorRequest $request)
    {
        $doctor = Doctor::create($request->all());
        $doctor->services_offerings()->sync($request->input('services_offerings', []));
        $doctor->hospitals()->sync($request->input('hospitals', []));
        $doctor->branches()->sync($request->input('branches', []));

        return redirect()->route('admin.doctors.index');
    }

    public function edit(Doctor $doctor)
    {
        abort_if(Gate::denies('doctor_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $services_offerings = Service::all()->pluck('name_of_the_service', 'id');

        $hospitals = Hospital::all()->pluck('name', 'id');

        $branches = Branch::all()->pluck('name', 'id');

        $user_profiles = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $doctor->load('services_offerings', 'hospitals', 'branches', 'user_profile');

        return view('admin.doctors.edit', compact('services_offerings', 'hospitals', 'branches', 'user_profiles', 'doctor'));
    }

    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
        $doctor->update($request->all());
        $doctor->services_offerings()->sync($request->input('services_offerings', []));
        $doctor->hospitals()->sync($request->input('hospitals', []));
        $doctor->branches()->sync($request->input('branches', []));

        return redirect()->route('admin.doctors.index');
    }

    public function show(Doctor $doctor)
    {
        abort_if(Gate::denies('doctor_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $doctor->load('services_offerings', 'hospitals', 'branches', 'user_profile');

        return view('admin.doctors.show', compact('doctor'));
    }

    public function destroy(Doctor $doctor)
    {
        abort_if(Gate::denies('doctor_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $doctor->delete();

        return back();
    }

    public function massDestroy(MassDestroyDoctorRequest $request)
    {
        Doctor::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
