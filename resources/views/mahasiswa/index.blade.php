@extends('layouts.index')

@section('content')
    <br/>

    @if(Session::has('success'))
        <p class="alert alert-success">{{ Session::get('success') }}</p><br/>
    @endif

    <div class="row">
        <div class="col-md-6">
            <a class="btn btn-primary col-md-4" href="{{ url('mahasiswa/create') }}">Tambah Mahasiswa</a>
        </div>
        <div class="col-md-6">
            <div class="float-right">
                <form method="GET" action="{{ url('mahasiswa') }}" class="form-inline">
                    <input type="text" name="keyword" value="{{ $keyword }}" class="form-control mr-sm-2"/>
                    <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Search</button>
                </form>
            </div>
        </div>
    </div>
    <br/>
    <table class="table-bordered table">
        <tr class="text-center">
            {{-- <th>Foto</th> --}}
            <th>Nim</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>

            <th colspan="2">AKSI</th>
        </tr>
        @foreach($datas as $key=>$value)
            <tr>
                {{-- <td>
                    @if(strlen($value->foto_profile)>0)
                        <img src="{{ asset('foto/'.$value->foto_profile) }}" />
                    @endif
                </td> --}}
                <td>{{ $value->nim }}</td>
                <td>{{ $value->nama }}</td>
                <td>{{ $value->kelas }}</td>
                <td>{{ $value->tanggal_lahir }}</td>
                <td>{{ $value->alamat }}</td>
                <td class="text-center"><a class="btn btn-info" href="{{ url('mahasiswa/'.$value->id.'/edit') }}">Update</a></td>
                <td class="text-center">
                    <form action="{{ url('mahasiswa/'.$value->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger" type="submit">DELETE</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $datas->links() }}
@endsection
