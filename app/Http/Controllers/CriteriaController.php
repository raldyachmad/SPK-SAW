<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCriteriaRequest;
use App\Http\Requests\UpdateCriteriaRequest;
use App\Models\Criteria;
use Illuminate\Http\Request;

class CriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $criterias = Criteria::latest()->get();

        return view('criteria.index', ['title' => 'Daftar Kriteria','criterias'=> $criterias]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('criteria.create', ['title' => 'Tambah Kriteria']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCriteriaRequest $request)
    {
        Criteria::create($request->validated());
        return redirect()->route('criteria.index')->with('success','Kriteria Berhasil Ditambahkan!');
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
        $criteria = Criteria::findOrFail($id);
        return view('criteria.edit', ['title'=> 'Edit Kriteria','criteria'=> $criteria]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCriteriaRequest $request, string $id)
    {
        $criteria = Criteria::findOrFail($id);

        $criteria->update($request->validated());

        return redirect()->route('criteria.index')->with('success','Data Berhasil Diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $criteria = Criteria::findOrFail($id);
        $criteria->delete();
        return redirect()->route('criteria.index')->with('success','Data Berhasil Dihapus!');
    }
}
