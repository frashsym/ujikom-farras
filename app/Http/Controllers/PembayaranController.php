<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::paginate(5);
        $user = User::all();
        $siswa = Siswa::all();
        $spp = Spp::all();
        return view('pembayaran.index', compact('pembayaran', 'user', 'siswa', 'spp'));
    }
    public function create()
    {
        $siswa = Siswa::all();
        $spp = Spp::all();
        return view('pembayaran.create', compact( 'siswa', 'spp'));
    }
    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'nisn' => 'required|integer',
            'tanggal_bayar' => 'required|date',
            'bulan_bayar' => 'required|string',
            'tahun_bayar' => 'required|integer',
            'id_spp' => 'required|integer',
            'jumlah_bayar' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create the pembayaran
        $pembayaran = new Pembayaran();
        $pembayaran->id_user = Auth::id();;
        $pembayaran->nisn = $request->nisn;
        $pembayaran->tanggal_bayar = $request->tanggal_bayar;
        $pembayaran->bulan_bayar = $request->bulan_bayar;
        $pembayaran->tahun_bayar = $request->tahun_bayar;
        $pembayaran->id_spp = $request->id_spp;
        $pembayaran->jumlah_bayar = $request->jumlah_bayar;
        $pembayaran->save();

        // Redirect or return a response
        return redirect()->route('pembayaran.index')->with('success', 'pembayaran created successfully.');
    }
    public function show($id)
    {
        // Fetch and display a single pembayaran
        return view('pembayaran.show', compact('id'));
    }
    public function edit($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $siswa = Siswa::all();
        $spp = Spp::all();
        if (!$pembayaran) {
            return redirect()->route('pembayaran.index')->with('error', 'pembayaran not found.');
        }
        // Fetch the pembayaran for editing
        return view('pembayaran.edit', compact('pembayaran',  'siswa', 'spp'));
    }
    public function update(Request $request, $id)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'nisn' => 'required|integer',
            'tanggal_bayar' => 'required|date',
            'bulan_bayar' => 'required|string',
            'tahun_bayar' => 'required|integer',
            'id_spp' => 'required|integer',
            'jumlah_bayar' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update the pembayaran
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->id_user = Auth::id();
        $pembayaran->nisn = $request->nisn;
        $pembayaran->tanggal_bayar = $request->tanggal_bayar;
        $pembayaran->bulan_bayar = $request->bulan_bayar;
        $pembayaran->tahun_bayar = $request->tahun_bayar;
        $pembayaran->id_spp = $request->id_spp;
        $pembayaran->jumlah_bayar = $request->jumlah_bayar;
        $pembayaran->save();

        // Redirect or return a response
        return redirect()->route('pembayaran.index')->with('success', 'pembayaran updated successfully.');
    }
    public function destroy($id)
    {
        // Delete the pembayaran
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->delete();

        // Redirect or return a response
        return redirect()->route('pembayaran.index')->with('success', 'pembayaran deleted successfully.');
    }
}
