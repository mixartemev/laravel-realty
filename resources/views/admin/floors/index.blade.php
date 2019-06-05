@extends('layouts.admin')
@section('content')
@can('floor_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.floors.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.floor.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.floor.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.floor.fields.number') }}
                    </th>
                    <th>
                        {{ trans('cruds.floor.fields.area') }}
                    </th>
                    <th>
                        {{ trans('cruds.floor.fields.ceiling') }}
                    </th>
                    <th>
                        {{ trans('cruds.floor.fields.building') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
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
    url: "{{ route('admin.floors.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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
@can('floor_delete')
  dtButtons.push(deleteButton)
@endcan

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.floors.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
      { data: 'number', name: 'number' },
{ data: 'area', name: 'area' },
{ data: 'ceiling', name: 'ceiling' },
{ data: 'building.building', name: 'building.address' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
  };

  $('.datatable').DataTable(dtOverrideGlobals);

});

</script>
@endsection