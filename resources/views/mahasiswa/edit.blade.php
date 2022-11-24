@extends('layouts.index')

@section('content')
    <br/>
    <form method="POST" action="{{ url('mahasiswa/'.$model->id) }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PATCH">

        @include('mahasiswa._form')
    </form>
@endsection
