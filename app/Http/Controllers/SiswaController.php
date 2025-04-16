<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Spp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with('kelas', 'spp')->paginate(5);
        $kelas = Kelas::all();
        $spp = Spp::all();
        return view('siswa.index', compact('siswa', 'kelas', 'spp'));
    }
    public function create()
    {
        $kelas = Kelas::all();
        $spp = Spp::all();
        return view('siswa.create', compact('kelas', 'spp'));
    }
    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'nisn' => 'required|string|max:10|unique:siswa,nisn',
            'nis' => 'required|string|max:8|unique:siswa,nis',
            'nama' => 'required|string|max:255',
            'id_kelas' => 'required|integer',
            'alamat' => 'required|string|max:255',
            'no_telp' => 'required|string|max:15',
            'id_spp' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create the siswa
        $siswa = new Siswa();
        $siswa->nisn = $request->nisn;
        $siswa->nis = $request->nis;
        $siswa->nama = $request->nama;
        $siswa->id_kelas = $request->id_kelas;
        $siswa->alamat = $request->alamat;
        $siswa->no_telp = $request->no_telp;
        $siswa->id_spp = $request->id_spp;
        $siswa->save();

        // Redirect or return a response
        return redirect()->route('siswa.index')->with('success', 'siswa created successfully.');
    }
    public function show($id)
    {
        // Fetch and display a single siswa
        return view('siswa.show', compact('id'));
    }
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $kelas = Kelas::all();
        $spp = Spp::all();
        if (!$siswa) {
            return redirect()->route('siswa.index')->with('error', 'siswa not found.');
        }
        // Fetch the siswa for editing
        return view('siswa.edit', compact('siswa', 'kelas', 'spp'));
    }
    public function update(Request $request, $id)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'nis' => 'required|string|max:8|unique:siswa,nis,' . $id . ',nisn', 
            'nama' => 'required|string|max:255',
            'id_kelas' => 'required|integer',
            'alamat' => 'required|string|max:255',
            'no_telp' => 'required|string|max:15',
            'id_spp' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update the siswa
        $siswa = Siswa::findOrFail($id);
        $siswa->nis = $request->nis;
        $siswa->nama = $request->nama;
        $siswa->id_kelas = $request->id_kelas;
        $siswa->alamat = $request->alamat;
        $siswa->no_telp = $request->no_telp;
        $siswa->id_spp = $request->id_spp;
        $siswa->save();

        // Redirect or return a response
        return redirect()->route('siswa.index')->with('success', 'siswa updated successfully.');
    }
    public function destroy($id)
    {
        // Delete the siswa
        $siswa = siswa::findOrFail($id);
        $siswa->delete();

        // Redirect or return a response
        return redirect()->route('siswa.index')->with('success', 'siswa deleted successfully.');
    }
}
