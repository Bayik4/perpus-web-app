<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pinjam;
use App\Models\Buku;
use Illuminate\Support\Facades\DB;

class DatapinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pinjam::with('buku', 'member', 'user')->get();

        return view('datapinjam.index', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function destroy(Request $request)
    {
        DB::beginTransaction();
        try {
            Pinjam::where('id', '=', $request->id)->delete();

            $buku_dipinjam = (int)$request->jumlah_buku;
            DB::table('bukus')->where('id', '=', $request->buku_id)->increment('jumlah_buku', $buku_dipinjam);

            DB::commit();
            return redirect('datapinjam')->with('pesansukses', 'Buku Dikembalikan');
        } catch(\Exception $e) {
            DB::rollback();
            return redirect('datapinjam')->with('pesangagal', 'Buku Belum Dikembalikan');
        }
    }
}
