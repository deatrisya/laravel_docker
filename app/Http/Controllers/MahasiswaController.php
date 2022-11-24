<?php

namespace App\Http\Controllers;

use App\Http\Requests\MahasiswaRequest;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Http\Requests\PegawaiRequest;
use Illuminate\Support\Facades\File;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        // $datas = Pegawai::all();
        $datas = Mahasiswa::where('nama', 'LIKE', '%' . $keyword . '%')
            ->orWhere('alamat', 'LIKE', '%' . $keyword . '%')
            ->orWhere('nim', 'LIKE', '%' . $keyword . '%')
            ->orWhere('kelas', 'LIKE', '%' . $keyword . '%')
            ->paginate();
        $datas->withPath('mahasiswa');
        $datas->appends($request->all());
        return view('mahasiswa.index', compact(
            'datas',
            'keyword'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Mahasiswa;
        return view('mahasiswa.create', compact(
            'model'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $model = new Mahasiswa;
        $model->nama = $request->nama;
        $model->tanggal_lahir = $request->tanggal_lahir;
        $model->kelas = $request->kelas;
        $model->nim = $request->nim;
        $model->alamat = $request->alamat;
        // $model->foto_profile = $request->foto_profile;
        //kita akan membuat code untuk upload file
        // if ($request->file('foto_profile')) {
        //     $file = $request->file('foto_profile');
        //     $nama_file = time() . str_replace(" ", "", $file->getClientOriginalName());
        //     $file->move('foto', $nama_file);
        //     $model->foto_profile = $nama_file;
        // }
        $model->save();

        return redirect()->route('mahasiswa.index')->with('success', "Data berhasil disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Mahasiswa::find($id);
        return view('mahasiswa.edit', compact(
            'model'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = Mahasiswa::find($id);
        $model->nama = $request->nama;
        $model->tanggal_lahir = $request->tanggal_lahir;
        $model->kelas = $request->kelas;
        $model->nim = $request->nim;
        $model->alamat = $request->alamat;

        // if ($request->file('foto_profile')) {
        //     $file = $request->file('foto_profile');
        //     $nama_file = time() . str_replace(" ", "", $file->getClientOriginalName());
        //     $file->move('foto', $nama_file);

        //     File::delete('foto/' . $model->foto_profile);
        //     $model->foto_profile = $nama_file;
        // }

        $model->save();

        return redirect()->route('mahasiswa.index')->with('success', "Data berhasil diperbaharui");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Mahasiswa::find($id);
        $model->delete();
        return redirect('mahasiswa');
    }
}
