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
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable">
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
                        {{ trans('cruds.building.fields.metro_station') }}
                    </th>
                    <th>
                        {{ trans('cruds.building.fields.floors') }}
                    </th>
                    <th>
                        {{ trans('cruds.building.fields.type') }}
                    </th>
                    <th>
                        {{ trans('cruds.building.fields.class') }}
                    </th>
                    <th>
                        {{ trans('cruds.building.fields.release_date') }}
                    </th>
{{--                    <th width="36">&nbsp;</th>--}}
                    <th width="64">&nbsp;</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
  $(function () {
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.buildings.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      let ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}');
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
  };

  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);
@can('building_delete')
  dtButtons.push(deleteButton);
@endcan

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.buildings.index') }}",
    columns: [
        { data: 'placeholder', name: 'placeholder' },
        { data: 'address', name: 'address' },
        { data: 'region.region', name: 'region.name' },
        { data: 'metroStation.metro_station', name: 'metro_station.name' },
        { data: 'floors', name: 'floors' },
        { data: 'type', name: 'type' },
        { data: 'class', name: 'class' },
        { data: 'release_date', name: 'release_date' },
        { data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
  //   columnDefs: [
  //       {
  //         render: function ( data, type, row ) {
  //             return '<a href="/buildings/'+row['id']+'">'+data +'</a>';
  //         },
  //         targets: 1
  //       },
  // ]
  };
  $('.datatable').DataTable(dtOverrideGlobals);
});

</script>
@endsection