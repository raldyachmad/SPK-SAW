<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSantriRequest;
use App\Http\Requests\UpdateSantriRequest;
use App\Models\Criteria;
use App\Models\Santri;
use Illuminate\Http\Request;

class SantriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $santris = Santri::latest()->get();
        // $criterias = Criteria::latest()->get();
        return view('santri.index', ['title' => 'Daftar Santri', 'santris' => $santris]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('santri.create', ['title' => 'Tambah Santri']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSantriRequest $request)
    {
        Santri::create($request->validated());
        return redirect()->route('santri.index')->with('success', 'Tambah Santri Berhasil!');
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
        $santri = Santri::findOrFail($id);
        return view('santri.edit', ['title' => 'Edit Santri', 'santri' => $santri]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSantriRequest $request, string $id)
    {
        $santri = Santri::findOrFail($id);

        $santri->update($request->validated());

        return redirect()->route('santri.index')->with('success', 'Data Berhasil Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $santri = Santri::findOrFail($id);
        $santri->delete();

        return redirect()->route('santri.index')->with('success', 'Data berhasil dihapus.');
    }
}
