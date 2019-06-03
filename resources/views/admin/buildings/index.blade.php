@extends('layouts.admin')
@section('content')
@can('building_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.buildings.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.building.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.building.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.building.fields.address') }}
                        </th>
                        <th>
                            {{ trans('cruds.building.fields.region') }}
                        </th>
                        <th>
                            {{ trans('cruds.region.fields.is_moscow') }}
                        </th>
                        <th>
                            {{ trans('cruds.building.fields.metro_station') }}
                        </th>
                        <th>
                            {{ trans('cruds.building.fields.type') }}
                        </th>
                        <th>
                            {{ trans('cruds.building.fields.profile') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($buildings as $key => $building)
                        <tr data-entry-id="{{ $building->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $building->address ?? '' }}
                            </td>
                            <td>
                                {{ $building->region->name ?? '' }}
                            </td>
                            <td>
                                {{ $building->region->is_moscow ? trans('global.yes') : trans('global.no') }}
                            </td>
                            <td>
                                {{ $building->metro_station->name ?? '' }}
                            </td>
                            <td>
                                {{ App\Building::TYPE_SELECT[$building->type] ?? '' }}
                            </td>
                            <td>
                                {{ App\Building::PROFILE_SELECT[$building->profile] ?? '' }}
                            </td>
                            <td>
                                @can('building_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.buildings.show', $building->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('building_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.buildings.edit', $building->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('building_delete')
                                    <form action="{{ route('admin.buildings.destroy', $building->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.buildings.massDestroy') }}",
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
@can('building_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection