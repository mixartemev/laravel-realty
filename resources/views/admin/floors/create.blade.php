<form action="{{ route("admin.floors.store") }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('admin.floors.form', ['floor' => $floor])
</form>