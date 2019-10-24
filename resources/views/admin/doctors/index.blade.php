@extends('layouts.admin')
@section('content')
@can('doctor_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.doctors.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.doctor.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.doctor.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Doctor">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.doctor.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.doctor.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.doctor.fields.specialty') }}
                        </th>
                        <th>
                            {{ trans('cruds.doctor.fields.services_offering') }}
                        </th>
                        <th>
                            {{ trans('cruds.doctor.fields.hospital') }}
                        </th>
                        <th>
                            {{ trans('cruds.doctor.fields.branch') }}
                        </th>
                        <th>
                            {{ trans('cruds.doctor.fields.user_profile') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.other_names') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.doctor.fields.is_available') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($doctors as $key => $doctor)
                        <tr data-entry-id="{{ $doctor->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $doctor->id ?? '' }}
                            </td>
                            <td>
                                {{ $doctor->name ?? '' }}
                            </td>
                            <td>
                                {{ $doctor->specialty ?? '' }}
                            </td>
                            <td>
                                @foreach($doctor->services_offerings as $key => $item)
                                    <span class="badge badge-info">{{ $item->name_of_the_service }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($doctor->hospitals as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($doctor->branches as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $doctor->user_profile->name ?? '' }}
                            </td>
                            <td>
                                {{ $doctor->user_profile->email ?? '' }}
                            </td>
                            <td>
                                {{ $doctor->user_profile->other_names ?? '' }}
                            </td>
                            <td>
                                {{ $doctor->user_profile->phone ?? '' }}
                            </td>
                            <td>
                                {{ App\Doctor::IS_AVAILABLE_RADIO[$doctor->is_available] ?? '' }}
                            </td>
                            <td>
                                @can('doctor_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.doctors.show', $doctor->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('doctor_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.doctors.edit', $doctor->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('doctor_delete')
                                    <form action="{{ route('admin.doctors.destroy', $doctor->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('doctor_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.doctors.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Doctor:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection