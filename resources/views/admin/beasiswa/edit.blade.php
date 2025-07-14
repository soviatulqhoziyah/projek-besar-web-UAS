@extends('layouts.tamplate')
@section('content')
<div class="container">
    <h4>Edit Beasiswa</h4>
    <form action="{{ route('data_beasiswa.update', $beasiswa->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.beasiswa._form', ['beasiswa' => $beasiswa])
    </form>
</div>
@endsection
