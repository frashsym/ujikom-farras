<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::paginate(5);
        return view('kelas.index', compact('kelas'));
    }
    public function create()
    {
        return view('kelas.create');
    }
    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'nama_kelas' => 'required|string|max:255|unique:kelas',
            'kompetensi_keahlian' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create the kelas
        $kelas = new Kelas();
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->kompetensi_keahlian = $request->kompetensi_keahlian;
        $kelas->save();

        // Redirect or return a response
        return redirect()->route('kelas.index')->with('success', 'kelas created successfully.');
    }
    public function show($id)
    {
        // Fetch and display a single kelas
        return view('kelas.show', compact('id'));
    }
    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        if (!$kelas) {
            return redirect()->route('kelas.index')->with('error', 'kelas not found.');
        }
        // Fetch the kelas for editing
        return view('kelas.edit', compact('kelas'));
    }
    public function update(Request $request, $id)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'nama_kelas' => 'required|string|max:255',
            'kompetensi_keahlian' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update the kelas
        $kelas = Kelas::findOrFail($id);
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->kompetensi_keahlian = $request->kompetensi_keahlian;
        $kelas->save();

        // Redirect or return a response
        return redirect()->route('kelas.index')->with('success', 'kelas updated successfully.');
    }
    public function destroy($id)
    {
        // Delete the kelas
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        // Redirect or return a response
        return redirect()->route('kelas.index')->with('success', 'kelas deleted successfully.');
    }
}
