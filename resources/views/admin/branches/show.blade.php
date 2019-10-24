@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.branch.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.id') }}
                        </th>
                        <td>
                            {{ $branch->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.name') }}
                        </th>
                        <td>
                            {{ $branch->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.address') }}
                        </th>
                        <td>
                            {{ $branch->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.phone') }}
                        </th>
                        <td>
                            {{ $branch->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.services_and_departments') }}
                        </th>
                        <td>
                            {{ $branch->services_and_departments }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.branch.fields.level_or_rank_of_facility') }}
                        </th>
                        <td>
                            {{ $branch->level_or_rank_of_facility }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Main Hospital
                        </th>
                        <td>
                            @foreach($branch->main_hospitals as $id => $main_hospital)
                                <span class="label label-info label-many">{{ $main_hospital->name }}</span>
                            @endforeach
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