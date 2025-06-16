<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSantriRequest;
use App\Models\Santri;
use Illuminate\Http\Request;

class SantriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $santris = Santri::latest('id')->paginate(5);
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
        return redirect()->route('santri.index')->with('success','Tambah Santri Berhasil!');
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
