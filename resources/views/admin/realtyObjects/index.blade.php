@extends('layouts.admin')
@section('content')
@can('realty_object_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.realty-objects.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.realtyObject.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.realtyObject.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.realtyObject.fields.type') }}
                    </th>
                    <th>
                        {{ trans('cruds.realtyObject.fields.profile') }}
                    </th>

{{--                    <th>--}}
{{--                        {{ trans('cruds.realtyObject.fields.planned_contact') }}--}}
{{--                    </th>--}}

                    <th>
                        {{ trans('cruds.realtyObject.fields.cost') }}
                    </th>
{{--                    <th>--}}
{{--                        {{ trans('cruds.realtyObject.fields.cost_m') }}--}}
{{--                    </th>--}}

                    <th>
                        {{ trans('cruds.realtyObject.fields.cadastral_numb') }}
                    </th>

                    <th>
                        {{ trans('cruds.realtyObject.fields.user') }}
                    </th>
                    <th>
                        {{ trans('cruds.realtyObject.fields.contact') }}
                    </th>
                    <th>
                        {{ trans('cruds.realtyObject.fields.building') }}
                    </th>

                    <th width="64">
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
    url: "{{ route('admin.realty-objects.massDestroy') }}",
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
@can('realty_object_delete')
  dtButtons.push(deleteButton);
@endcan

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.realty-objects.index') }}",
    columns: [
        { data: 'placeholder', name: 'placeholder' },

        { data: 'type', name: 'type' },
        { data: 'profile', name: 'profile' },

        // { data: 'planned_contact', name: 'planned_contact',},

        { data: 'cost', name: 'cost'/*, type: 'num-fmt'*/ },
        // { data: 'cost_m', name: 'cost_m' },

        { data: 'cadastral_numb', name: 'cadastral_numb' },

        { data: 'user.user', name: 'user.name' },
        { data: 'contact.contact', name: 'contact.name' },
        { data: 'building.building', name: 'building.name' },

        { data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
  };

  $('.datatable').DataTable(dtOverrideGlobals);

});

</script>
@endsection