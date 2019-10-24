<?php

namespace App\Http\Controllers\Admin;

use App\Appointment;
use App\Doctor;
use App\Hospital;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAppointmentRequest;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Service;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AppointmentsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('appointment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appointments = Appointment::all();

        return view('admin.appointments.index', compact('appointments'));
    }

    public function create()
    {
        abort_if(Gate::denies('appointment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hospitals = Hospital::all()->pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $departments = Service::all()->pluck('name_of_the_service', 'id')->prepend(trans('global.pleaseSelect'), '');

        $doctors = Doctor::all()->pluck('specialty', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clients = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.appointments.create', compact('hospitals', 'departments', 'doctors', 'clients'));
    }

    public function store(StoreAppointmentRequest $request)
    {
        $appointment = Appointment::create($request->all());

        return redirect()->route('admin.appointments.index');
    }

    public function edit(Appointment $appointment)
    {
        abort_if(Gate::denies('appointment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hospitals = Hospital::all()->pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $departments = Service::all()->pluck('name_of_the_service', 'id')->prepend(trans('global.pleaseSelect'), '');

        $doctors = Doctor::all()->pluck('specialty', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clients = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $appointment->load('hospital', 'department', 'doctor', 'client');

        return view('admin.appointments.edit', compact('hospitals', 'departments', 'doctors', 'clients', 'appointment'));
    }

    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        $appointment->update($request->all());

        return redirect()->route('admin.appointments.index');
    }

    public function show(Appointment $appointment)
    {
        abort_if(Gate::denies('appointment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appointment->load('hospital', 'department', 'doctor', 'client');

        return view('admin.appointments.show', compact('appointment'));
    }

    public function destroy(Appointment $appointment)
    {
        abort_if(Gate::denies('appointment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $appointment->delete();

        return back();
    }

    public function massDestroy(MassDestroyAppointmentRequest $request)
    {
        Appointment::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
