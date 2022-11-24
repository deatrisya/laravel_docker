<div class="row clearfix">
    <div class="col-md-6">NIM</div>

    <div class="col-md-6">
        <input class="form-control" type="text" name="nim" value="{{ $model->nim }}">
        @foreach($errors->get('nim') as $msg)
            <p class="text-danger">{{ $msg }}</p>
        @endforeach
    </div>
</div>
<div class="row clearfix">
    <div class="col-md-6">Nama Lengkap</div>

<div class="col-md-6">
        <input class="form-control" type="text" name="nama" value="{{ $model->nama }}">
        @foreach($errors->get('nama') as $msg)
            <p class="text-danger">{{ $msg }}</p>
        @endforeach
    </div>
</div>
<div class="row clearfix">
    <div class="col-md-6">Kelas</div>

    <div class="col-md-6">
        <input class="form-control" type="text" name="kelas" value="{{ $model->kelas }}">
        @foreach($errors->get('kelas') as $msg)
            <p class="text-danger">{{ $msg }}</p>
        @endforeach
    </div>
</div>

<div class="row clearfix">
    <div class="col-md-6">Tanggal Lahir</div>

    <div class="col-md-6">
        <input class="form-control"  type="date" name="tanggal_lahir" value="{{ $model->tanggal_lahir }}">
        @foreach($errors->get('tanggal_lahir') as $msg)
            <p class="text-danger">{{ $msg }}</p>
        @endforeach
    </div>
</div>


<div class="row clearfix">
    <div class="col-md-6">Alamat</div>

    <div class="col-md-6">
        <input class="form-control"  type="text" name="alamat"  value="{{ $model->alamat }}">
        @foreach($errors->get('alamat') as $msg)
            <p class="text-danger">{{ $msg }}</p>
        @endforeach
    </div>
</div>


{{-- <div class="row clearfix">
    <div class="col-md-6">Foto Profile</div>

    <div class="col-md-6">
        <input class="form-control"  type="file" name="foto_profile">
        @foreach($errors->get('foto_profile') as $msg)
            <p class="text-danger">{{ $msg }}</p>
        @endforeach
        @if(strlen($model->foto_profile)>0)
            <img src="{{ asset('foto/'.$model->foto_profile) }}">
        @endif
    </div>
</div> --}}

<button type="submit" class="btn btn-primary">SIMPAN</button>
<a href="{{route('mahasiswa.index')}}" class="btn btn-secondary">Kembali</a>
