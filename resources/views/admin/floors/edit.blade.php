 <form action="{{ route("admin.floors.update", [$floor->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('admin.floors.form', ['floor' => $floor])
</form>