@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.appointment.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.appointments.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('hospital_id') ? 'has-error' : '' }}">
                <label for="hospital">{{ trans('cruds.appointment.fields.hospital') }}*</label>
                <select name="hospital_id" id="hospital" class="form-control select2" required>
                    @foreach($hospitals as $id => $hospital)
                        <option value="{{ $id }}" {{ (isset($appointment) && $appointment->hospital ? $appointment->hospital->id : old('hospital_id')) == $id ? 'selected' : '' }}>{{ $hospital }}</option>
                    @endforeach
                </select>
                @if($errors->has('hospital_id'))
                    <p class="help-block">
                        {{ $errors->first('hospital_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('department_id') ? 'has-error' : '' }}">
                <label for="department">{{ trans('cruds.appointment.fields.department') }}*</label>
                <select name="department_id" id="department" class="form-control select2" required>
                    @foreach($departments as $id => $department)
                        <option value="{{ $id }}" {{ (isset($appointment) && $appointment->department ? $appointment->department->id : old('department_id')) == $id ? 'selected' : '' }}>{{ $department }}</option>
                    @endforeach
                </select>
                @if($errors->has('department_id'))
                    <p class="help-block">
                        {{ $errors->first('department_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('doctor_id') ? 'has-error' : '' }}">
                <label for="doctor">{{ trans('cruds.appointment.fields.doctor') }}*</label>
                <select name="doctor_id" id="doctor" class="form-control select2" required>
                    @foreach($doctors as $id => $doctor)
                        <option value="{{ $id }}" {{ (isset($appointment) && $appointment->doctor ? $appointment->doctor->id : old('doctor_id')) == $id ? 'selected' : '' }}>{{ $doctor }}</option>
                    @endforeach
                </select>
                @if($errors->has('doctor_id'))
                    <p class="help-block">
                        {{ $errors->first('doctor_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('client_id') ? 'has-error' : '' }}">
                <label for="client">{{ trans('cruds.appointment.fields.client') }}*</label>
                <select name="client_id" id="client" class="form-control select2" required>
                    @foreach($clients as $id => $client)
                        <option value="{{ $id }}" {{ (isset($appointment) && $appointment->client ? $appointment->client->id : old('client_id')) == $id ? 'selected' : '' }}>{{ $client }}</option>
                    @endforeach
                </select>
                @if($errors->has('client_id'))
                    <p class="help-block">
                        {{ $errors->first('client_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('scheduled_time') ? 'has-error' : '' }}">
                <label for="scheduled_time">{{ trans('cruds.appointment.fields.scheduled_time') }}*</label>
                <input type="text" id="scheduled_time" name="scheduled_time" class="form-control datetime" value="{{ old('scheduled_time', isset($appointment) ? $appointment->scheduled_time : '') }}" required>
                @if($errors->has('scheduled_time'))
                    <p class="help-block">
                        {{ $errors->first('scheduled_time') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.appointment.fields.scheduled_time_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection