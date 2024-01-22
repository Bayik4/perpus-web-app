<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $databukuaktif = Buku::all();
        $databukupasif = Buku::onlyTrashed()->get();
        return View('buku.index', compact('databukuaktif', 'databukupasif'));
    }

    public function create() {
        return View('buku.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasiData = $request->validate([
            'nomor_buku' => ['required',],
            'judul_buku' => ['required'],
            'jenis_buku' => ['required'],
            'nomor_rak' => ['required']
        ]);
        return $request->all();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
