@extends('layouts.index')

@section('content')
    <br/>
    <form method="POST" action="{{ url('mahasiswa') }}" enctype="multipart/form-data">
        @csrf
        @include('mahasiswa._form')
    </form>
@endsection
