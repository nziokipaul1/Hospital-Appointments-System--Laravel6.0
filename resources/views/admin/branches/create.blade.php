@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.branch.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.branches.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.branch.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($branch) ? $branch->name : '') }}" required>
                @if($errors->has('name'))
                    <p class="help-block">
                        {{ $errors->first('name') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.branch.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                <label for="address">{{ trans('cruds.branch.fields.address') }}*</label>
                <input type="text" id="address" name="address" class="form-control" value="{{ old('address', isset($branch) ? $branch->address : '') }}" required>
                @if($errors->has('address'))
                    <p class="help-block">
                        {{ $errors->first('address') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.branch.fields.address_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                <label for="phone">{{ trans('cruds.branch.fields.phone') }}*</label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', isset($branch) ? $branch->phone : '') }}" required>
                @if($errors->has('phone'))
                    <p class="help-block">
                        {{ $errors->first('phone') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.branch.fields.phone_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('services_and_departments') ? 'has-error' : '' }}">
                <label for="services_and_departments">{{ trans('cruds.branch.fields.services_and_departments') }}*</label>
                <input type="text" id="services_and_departments" name="services_and_departments" class="form-control" value="{{ old('services_and_departments', isset($branch) ? $branch->services_and_departments : '') }}" required>
                @if($errors->has('services_and_departments'))
                    <p class="help-block">
                        {{ $errors->first('services_and_departments') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.branch.fields.services_and_departments_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('level_or_rank_of_facility') ? 'has-error' : '' }}">
                <label for="level_or_rank_of_facility">{{ trans('cruds.branch.fields.level_or_rank_of_facility') }}</label>
                <input type="text" id="level_or_rank_of_facility" name="level_or_rank_of_facility" class="form-control" value="{{ old('level_or_rank_of_facility', isset($branch) ? $branch->level_or_rank_of_facility : '') }}">
                @if($errors->has('level_or_rank_of_facility'))
                    <p class="help-block">
                        {{ $errors->first('level_or_rank_of_facility') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.branch.fields.level_or_rank_of_facility_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('main_hospitals') ? 'has-error' : '' }}">
                <label for="main_hospital">{{ trans('cruds.branch.fields.main_hospital') }}*
                    <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                <select name="main_hospitals[]" id="main_hospitals" class="form-control select2" multiple="multiple" required>
                    @foreach($main_hospitals as $id => $main_hospital)
                        <option value="{{ $id }}" {{ (in_array($id, old('main_hospitals', [])) || isset($branch) && $branch->main_hospitals->contains($id)) ? 'selected' : '' }}>{{ $main_hospital }}</option>
                    @endforeach
                </select>
                @if($errors->has('main_hospitals'))
                    <p class="help-block">
                        {{ $errors->first('main_hospitals') }}
                    </p>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.branch.fields.main_hospital_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>
@endsection