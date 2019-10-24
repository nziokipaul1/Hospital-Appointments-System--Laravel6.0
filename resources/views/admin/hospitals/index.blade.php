@extends('layouts.admin')
@section('content')
@can('hospital_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.hospitals.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.hospital.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.hospital.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Hospital">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.hospital.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.hospital.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.hospital.fields.address') }}
                        </th>
                        <th>
                            {{ trans('cruds.hospital.fields.phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.hospital.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.hospital.fields.services_and_departments') }}
                        </th>
                        <th>
                            {{ trans('cruds.hospital.fields.level_or_rank_of_facility') }}
                        </th>
                        <th>
                            {{ trans('cruds.hospital.fields.photo') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hospitals as $key => $hospital)
                        <tr data-entry-id="{{ $hospital->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $hospital->id ?? '' }}
                            </td>
                            <td>
                                {{ $hospital->name ?? '' }}
                            </td>
                            <td>
                                {{ $hospital->address ?? '' }}
                            </td>
                            <td>
                                {{ $hospital->phone ?? '' }}
                            </td>
                            <td>
                                {{ $hospital->email ?? '' }}
                            </td>
                            <td>
                                {{ $hospital->services_and_departments ?? '' }}
                            </td>
                            <td>
                                {{ App\Hospital::LEVEL_OR_RANK_OF_FACILITY_SELECT[$hospital->level_or_rank_of_facility] ?? '' }}
                            </td>
                            <td>
                                @if($hospital->photo)
                                    <a href="{{ $hospital->photo->getUrl() }}" target="_blank">
                                        <img src="{{ $hospital->photo->getUrl('thumb') }}" width="50px" height="50px">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can('hospital_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.hospitals.show', $hospital->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('hospital_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.hospitals.edit', $hospital->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('hospital_delete')
                                    <form action="{{ route('admin.hospitals.destroy', $hospital->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('hospital_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.hospitals.massDestroy') }}",
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
  $('.datatable-Hospital:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection