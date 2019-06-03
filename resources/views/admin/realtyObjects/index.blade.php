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
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.realtyObject.fields.user') }}
                        </th>
                        <th>
                            {{ trans('cruds.realtyObject.fields.building') }}
                        </th>
                        <th>
                            {{ trans('cruds.realtyObject.fields.cadastral_numb') }}
                        </th>
                        <th>
                            {{ trans('cruds.realtyObject.fields.area') }}
                        </th>
                        <th>
                            {{ trans('cruds.realtyObject.fields.floor') }}
                        </th>
                        <th>
                            {{ trans('cruds.realtyObject.fields.commission') }}
                        </th>
                        <th>
                            {{ trans('cruds.realtyObject.fields.cost') }}
                        </th>
                        <th>
                            {{ trans('cruds.realtyObject.fields.cost_m') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($realtyObjects as $key => $realtyObject)
                        <tr data-entry-id="{{ $realtyObject->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $realtyObject->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $realtyObject->building->address ?? '' }}
                            </td>
                            <td>
                                {{ $realtyObject->cadastral_numb ?? '' }}
                            </td>
                            <td>
                                {{ $realtyObject->area ?? '' }}
                            </td>
                            <td>
                                {{ $realtyObject->floor ?? '' }}
                            </td>
                            <td>
                                {{ $realtyObject->commission ?? '' }}
                            </td>
                            <td>
                                {{ $realtyObject->cost ?? '' }}
                            </td>
                            <td>
                                {{ $realtyObject->cost_m ?? '' }}
                            </td>
                            <td>
                                @can('realty_object_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.realty-objects.show', $realtyObject->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('realty_object_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.realty-objects.edit', $realtyObject->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('realty_object_delete')
                                    <form action="{{ route('admin.realty-objects.destroy', $realtyObject->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    url: "{{ route('admin.realty-objects.massDestroy') }}",
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
@can('realty_object_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection