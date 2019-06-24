 <form action="{{ route("admin.floors.destroy", [$floor->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('DELETE')
    @include('admin.floors.form', ['floor' => $floor])
</form>