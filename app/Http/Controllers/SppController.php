<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spp;
use Illuminate\Support\Facades\Validator;

class SppController extends Controller
{
    public function index()
    {
        $spp = Spp::orderBy('tahun', 'desc')->paginate(5);
        return view('spp.index', compact('spp'));
    }
    public function create()
    {
        return view('spp.create');
    }
    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'tahun' => 'required|integer',
            'nominal' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create the spp
        $spp = new Spp();
        $spp->tahun = $request->tahun;
        $spp->nominal = $request->nominal;
        $spp->save();

        // Redirect or return a response
        return redirect()->route('spp.index')->with('success', 'spp created successfully.');
    }
    public function show($id)
    {
        // Fetch and display a single spp
        return view('spp.show', compact('id'));
    }
    public function edit($id)
    {
        $spp = Spp::findOrFail($id);
        if (!$spp) {
            return redirect()->route('spp.index')->with('error', 'spp not found.');
        }
        // Fetch the spp for editing
        return view('spp.edit', compact('spp'));
    }
    public function update(Request $request, $id)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'tahun' => 'required|integer',
            'nominal' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update the spp
        $spp = Spp::findOrFail($id);
        $spp->tahun = $request->tahun;
        $spp->nominal = $request->nominal;
        $spp->save();

        // Redirect or return a response
        return redirect()->route('spp.index')->with('success', 'spp updated successfully.');
    }
    public function destroy($id)
    {
        // Delete the spp
        $spp = Spp::findOrFail($id);
        $spp->delete();

        // Redirect or return a response
        return redirect()->route('spp.index')->with('success', 'spp deleted successfully.');
    }
}
