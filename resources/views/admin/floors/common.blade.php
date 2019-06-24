<div class="card">
    <div class="card-header">
        {{ trans('cruds.floor.title') }}
    </div>

    <div class="card-body">
        <form></form>{{--dirty hack--}}
        @foreach ($realtyObject->floors as $id => $floor)
            @include('admin.floors.edit', ['floor' => $floor])
        @endforeach

        @include('admin.floors.create', ['floor' => new \App\Floor(['realty_object_id' => $realtyObject->id])])
    </div>
</div>