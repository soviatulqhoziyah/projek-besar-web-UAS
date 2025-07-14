@extends('layouts.tamplate')
@section('content')
<div class="container">
    <h4>Tambah Beasiswa</h4>
    <form action="{{ route('data_beasiswa.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.beasiswa._form')
    </form>
</div>
@endsection
