@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.doctor.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.doctor.fields.id') }}
                        </th>
                        <td>
                            {{ $doctor->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.doctor.fields.name') }}
                        </th>
                        <td>
                            {{ $doctor->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.doctor.fields.specialty') }}
                        </th>
                        <td>
                            {{ $doctor->specialty }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Services Offering
                        </th>
                        <td>
                            @foreach($doctor->services_offerings as $id => $services_offering)
                                <span class="label label-info label-many">{{ $services_offering->name_of_the_service }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Hospital
                        </th>
                        <td>
                            @foreach($doctor->hospitals as $id => $hospital)
                                <span class="label label-info label-many">{{ $hospital->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Branches
                        </th>
                        <td>
                            @foreach($doctor->branches as $id => $branch)
                                <span class="label label-info label-many">{{ $branch->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.doctor.fields.user_profile') }}
                        </th>
                        <td>
                            {{ $doctor->user_profile->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.doctor.fields.is_available') }}
                        </th>
                        <td>
                            {{ App\Doctor::IS_AVAILABLE_RADIO[$doctor->is_available] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>

        <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
        <div class="tab-content">

        </div>
    </div>
</div>
@endsection