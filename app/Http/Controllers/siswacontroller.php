<?php

namespace App\Http\Controllers;

use App\Models\Siswa; // Pastikan nama model sesuai dengan konvensi
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = Siswa::orderby('nama', 'asc')->get();
        return view('siswa.index', [
            'siswa' => $siswa
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required', // Perbaikan di sini
            'kelas' => 'required', // Perbaikan di sini
        ]);

        $data = [
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'kelas' => $request->kelas,
            'sekolah_asal' => $request->sekolah_asal,
            'alamat' => $request->alamat,
        ];

        Siswa::create($data);
        return redirect()->route('siswa.index')->with('success', 'BERHASIL MENAMBAHKAN DATA'); // Perbaikan di sini
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
        $siswa = Siswa::find($id);
        return view('siswa.edit', [
            'siswa' => $siswa,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $datasiswa = Siswa::find($id);
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required', // Perbaikan di sini
            'kelas' => 'required', // Perbaikan di sini
        ]);

        $data = [
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'kelas' => $request->kelas,
            'sekolah_asal' => $request->sekolah_asal,
            'alamat' => $request->alamat,
        ];

        $datasiswa->update($data); // Perbaikan di sini
        return redirect()->route('siswa.index')->with('success', 'BERHASIL UPDATE DATA'); // Perbaikan di sini
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $datasiswa = Siswa::find($id);
        $datasiswa->delete(); // Perbaikan di sini
        return redirect()->route('siswa.index')->with('success', 'BERHASIL HAPUS DATA'); // Perbaikan di sini
    }
}