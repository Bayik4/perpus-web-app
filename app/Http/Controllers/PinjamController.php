<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Member;
use App\Models\Pinjam;
use Illuminate\Support\Facades\DB;

class PinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth()->user();
        return view('pinjam.index', ['user' => $user]);
    }

    public function search(Request $request) {
        if($request->ajax()) {
            $data = Buku::where('kode_buku', 'like', '%'.$request->search.'%')
                        ->orWhere('judul_buku', 'like', '%'.$request->search.'%')
                        ->get();
        }

        $output = '';
        if(count($data) > 0 ) {
            $output = '
                <table class="table table-sm table-bordered table-condensed table-striped">
                <thead>
                    <tr style="text-align: center;">
                        <th>Kode Buku</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>';
                    foreach($data as $row) {
                        $output .= '
                            <tr style="text-align: center;">
                                <td>'.$row->kode_buku.'</td>
                                <td style="text-align: left;">'.$row->judul_buku.'</td>
                                <td>'.$row->penulis.'</td>
                                <td>
                                    <button class="btn btn-sm btn-success" onclick="aksi('.$row->id.')"><i class="fa fa-plus"></i></button>
                                </td>
                            </tr>
                        ';
                    }
                $output .= ' 
                </tbody>
            </table>
            ';
        } else {
            $output = 'No Results';
        }

        return $output;
    }

    public function searchm(Request $request) {
        if($request->ajax()) {
            $data = Member::where('id', 'like', '%'.$request->searchm.'%')
                        ->orWhere('nama', 'like', '%'.$request->searchm.'%')
                        ->get();
        }

        $output = '';
        if(count($data) > 0) {
            $output = '
                <table class="table table-sm table-bordered table-condensed table-striped">
                <thead>
                    <tr style="text-align: center;">
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>';
                    foreach($data as $row) {
                        $output .= '
                            <tr style="text-align: center;">
                                <td>'.$row->id.'</td>
                                <td style="text-align: left;">'.$row->nama.'</td>
                                <td>
                                    <button class="btn btn-sm btn-success" onclick="aksim('.$row->id.')"><i class="fa fa-plus"></i></button>
                                </td>
                            </tr>
                        ';
                    }
                $output .= ' 
                </tbody>
            </table>
            ';
        } else {
            $output = 'No Results';
        }

        return $output;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'buku_id' => 'required',
            'member_id' => 'required',
            'user_id' => 'required',
            'tanggal_kembali' => 'required',
            'jumlah_buku' => 'required', 'min:1', 'max:10'
        ]);

        $buku_id = (int)$request->buku_id;
        $member_id = (int)$request->member_id;
        $user_id = $request->user_id;

        $stok_buku = DB::table('bukus')->select('jumlah_buku as jb')->where('id', '=', $buku_id)->get();

        foreach($stok_buku as $sb) {
            $jb = $sb->jb;
        }

        DB::beginTransaction();
        try {
            Pinjam::create([
                'buku_id' => $buku_id,
                'member_id' => $member_id,
                'user_id' => $user_id,
                'tanggal_pinjam' => now(),
                'tanggal_kembali' => $request->tanggal_kembali,
                'jumlah_dipinjam' => $request->jumlah_buku
            ]);

            if($request->jumlah_buku > (int)$jb) {
                if((int)$jb == 0) {
                    DB::rollback();
                    return redirect('pinjam')->with('pesangagal', 'stok habis!!');              
                } else {
                    DB::rollback();
                    return redirect('pinjam')->with('pesangagal', 'stok melebihi batas!!, sisa stok = '.$jb);                
                }
            } else {
                if((int)$jb > 0) {
                    DB::table('bukus')->where('id', '=', $buku_id)->decrement('jumlah_buku', $request->jumlah_buku);
                } else {
                    return redirect('pinjam')->with('pesangagal', 'stok habis');
                }
            }

            DB::commit();
            return redirect('pinjam')->with('pesansukses', 'Pinjam Buku Berhasil');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('pinjam')->with('pesangagal', 'pinjam Buku Gagal');
        }
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
    public function update(Request $request)
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
