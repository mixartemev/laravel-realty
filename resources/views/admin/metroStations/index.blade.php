@extends('layouts.admin')
@section('content')
@can('metro_station_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.metro-stations.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.metroStation.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.metroStation.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.metroStation.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.metroStation.fields.line') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($metroStations as $key => $metroStation)
                        <tr data-entry-id="{{ $metroStation->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $metroStation->name ?? '' }}
                            </td>
                            <td>
                                {{ App\MetroStation::LINE_SELECT[$metroStation->line] ?? '' }}
                            </td>
                            <td>
                                @can('metro_station_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.metro-stations.show', $metroStation->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('metro_station_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.metro-stations.edit', $metroStation->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('metro_station_delete')
                                    <form action="{{ route('admin.metro-stations.destroy', $metroStation->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.metro-stations.massDestroy') }}",
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
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('metro_station_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection