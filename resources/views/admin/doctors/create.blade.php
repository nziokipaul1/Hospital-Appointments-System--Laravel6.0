@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.doctor.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.doctors.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.doctor.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($doctor) ? $doctor->name : '') }}" required>
                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.doctor.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('specialty') ? 'has-error' : '' }}">
                <label for="specialty">{{ trans('cruds.doctor.fields.specialty') }}*</label>
                <input type="text" id="specialty" name="specialty" class="form-control" value="{{ old('specialty', isset($doctor) ? $doctor->specialty : '') }}" required>
                @if($errors->has('specialty'))
                    <p class="help-block">
                        {{ $errors->first('specialty') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.doctor.fields.specialty_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('services_offerings') ? 'has-error' : '' }}">
                <label for="services_offering">{{ trans('cruds.doctor.fields.services_offering') }}*
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                <select name="services_offerings[]" id="services_offerings" class="form-control select2" multiple="multiple" required>
                    @foreach($services_offerings as $id => $services_offering)
                        <option value="{{ $id }}" {{ (in_array($id, old('services_offerings', [])) || isset($doctor) && $doctor->services_offerings->contains($id)) ? 'selected' : '' }}>{{ $services_offering }}</option>
                    @endforeach
                </select>
                @if($errors->has('services_offerings'))
                    <p class="help-block">
                        {{ $errors->first('services_offerings') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.doctor.fields.services_offering_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('hospitals') ? 'has-error' : '' }}">
                <label for="hospital">{{ trans('cruds.doctor.fields.hospital') }}*
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                <select name="hospitals[]" id="hospitals" class="form-control select2" multiple="multiple" required>
                    @foreach($hospitals as $id => $hospital)
                        <option value="{{ $id }}" {{ (in_array($id, old('hospitals', [])) || isset($doctor) && $doctor->hospitals->contains($id)) ? 'selected' : '' }}>{{ $hospital }}</option>
                    @endforeach
                </select>
                @if($errors->has('hospitals'))
                    <p class="help-block">
                        {{ $errors->first('hospitals') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.doctor.fields.hospital_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('branches') ? 'has-error' : '' }}">
                <label for="branch">{{ trans('cruds.doctor.fields.branch') }}
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                <select name="branches[]" id="branches" class="form-control select2" multiple="multiple">
                    @foreach($branches as $id => $branch)
                        <option value="{{ $id }}" {{ (in_array($id, old('branches', [])) || isset($doctor) && $doctor->branches->contains($id)) ? 'selected' : '' }}>{{ $branch }}</option>
                    @endforeach
                </select>
                @if($errors->has('branches'))
                    <p class="help-block">
                        {{ $errors->first('branches') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.doctor.fields.branch_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('user_profile_id') ? 'has-error' : '' }}">
                <label for="user_profile">{{ trans('cruds.doctor.fields.user_profile') }}*</label>
                <select name="user_profile_id" id="user_profile" class="form-control select2" required>
                    @foreach($user_profiles as $id => $user_profile)
                        <option value="{{ $id }}" {{ (isset($doctor) && $doctor->user_profile ? $doctor->user_profile->id : old('user_profile_id')) == $id ? 'selected' : '' }}>{{ $user_profile }}</option>
                    @endforeach
                </select>
                @if($errors->has('user_profile_id'))
                    <p class="help-block">
                        {{ $errors->first('user_profile_id') }}
                    </p>
                @endif
            </div>
            <div class="form-group {{ $errors->has('is_available') ? 'has-error' : '' }}">
                <label>{{ trans('cruds.doctor.fields.is_available') }}*</label>
                @foreach(App\Doctor::IS_AVAILABLE_RADIO as $key => $label)
                    <div>
                        <input id="is_available_{{ $key }}" name="is_available" type="radio" value="{{ $key }}" {{ old('is_available', 'Yes') === (string)$key ? 'checked' : '' }} required>
                        <label for="is_available_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('is_available'))
                    <p class="help-block">
                        {{ $errors->first('is_available') }}
                    </p>
                @endif
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection