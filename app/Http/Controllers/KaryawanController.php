<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Karyawan::orderBy('id', 'asc')->get();

        foreach ($data as $karyawan) {
            $karyawan->tgl_mulai = Carbon::parse($karyawan->tgl_mulai)->format('d-m-Y');
            $karyawan->tgl_akhir = $karyawan->tgl_akhir ? Carbon::parse($karyawan->tgl_akhir)->format('d-m-Y') : null;
        }

        return view('list_karyawan', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nama' => 'required|string|max:255',
            'gender' => 'required|string',
            'telp' => 'required|string | max:15',
            'email' => 'required|email',
            'alamat' => 'required|string',
            'divisi' => 'required|string',
            'tgl_mulai' => 'required|date',
            'tgl_akhir' => 'nullable|date',
            'status' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

       

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoPath = $foto->store('foto_karyawan', 'public');
        } else {
            $fotoPath = null;
        }

        $data = [
            'nama' => $request->input('nama'),
            'gender' => $request->input('gender'),
            'telp' => $request->input('telp'),
            'email' => $request->input('email'),
            'alamat' => $request->input('alamat'),
            'divisi' => $request->input('divisi'),
            'tgl_mulai' => $request->input('tgl_mulai'),
            'tgl_akhir' => $request->input('tgl_akhir'),
            'status_aktif' => $request->input('status'),
            'foto' => $fotoPath
        ];

        Karyawan::create($data);
        return redirect('/list')->with('success', 'Data karyawan berhasil disimpan!');
    }




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
