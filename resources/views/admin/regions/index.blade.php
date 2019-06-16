@extends('layouts.admin')
@section('content')

<?php
use App\Region;
/** @var Region[] $regions */
?>

@can('region_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.regions.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.region.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.region.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.region.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.region.fields.is_moscow') }}
                        </th></th>
                        <th>
                            {{ trans('cruds.region.fields.adm_area') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($regions as $key => $region)
                        <tr data-entry-id="{{ $region->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $region->name }}
                            </td>
                            <td>
                                {{ $region->admArea->is_moscow ? trans('global.yes') : trans('global.no') }}
                            </td>
                            <td>
                                {{ $region->admArea->name ?? '' }}
                            </td>
                            <td width="52">
                                @can('region_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.regions.edit', $region->id) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                @endcan
                                @can('region_delete')
                                    <form action="{{ route('admin.regions.destroy', $region->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="fas fa-trash-alt"></i></button>
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
    url: "{{ route('admin.regions.massDestroy') }}",
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
  };
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons);
@can('region_delete')
  dtButtons.push(deleteButton);
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection