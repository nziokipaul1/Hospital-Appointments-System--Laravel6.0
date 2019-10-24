@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.hospital.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.hospital.fields.id') }}
                        </th>
                        <td>
                            {{ $hospital->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hospital.fields.name') }}
                        </th>
                        <td>
                            {{ $hospital->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hospital.fields.address') }}
                        </th>
                        <td>
                            {{ $hospital->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hospital.fields.phone') }}
                        </th>
                        <td>
                            {{ $hospital->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hospital.fields.email') }}
                        </th>
                        <td>
                            {{ $hospital->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hospital.fields.services_and_departments') }}
                        </th>
                        <td>
                            {{ $hospital->services_and_departments }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hospital.fields.level_or_rank_of_facility') }}
                        </th>
                        <td>
                            {{ App\Hospital::LEVEL_OR_RANK_OF_FACILITY_SELECT[$hospital->level_or_rank_of_facility] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hospital.fields.photo') }}
                        </th>
                        <td>
                            @if($hospital->photo)
                                <a href="{{ $hospital->photo->getUrl() }}" target="_blank">
                                    <img src="{{ $hospital->photo->getUrl('thumb') }}" width="50px" height="50px">
                                </a>
                            @endif
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