<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Rak;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $databukuaktif = Buku::with('rak')->get();
        return View('buku.index', compact('databukuaktif'));
    }

    public function index_pasif()
    {
        $databukupasif = Buku::onlyTrashed()->get();
        return View('buku.index_pasif', compact('databukupasif'));
    }

    public function detail(String $id)
    {
        $detailBuku = Buku::where('id', '=', $id)->get();

        return view('buku.aksi.detail', compact('detailBuku'));
    }

    public function create()
    {
        $dtrak = Rak::all();

        return View('buku.aksi.add', compact('dtrak'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasiData = $request->validate([
            'kode_buku' => 'required', 'max:10',
            // 'sampul' => 'image', 'mimes:png,jpg,jpeg,svg', 'max:2048',
            'judul_buku' => 'required',
            'jenis_buku' => 'required',
            'penulis' => 'required', 'max:100',
            'penerbit' => 'required', 'max:100',
            'isbn' => 'required', 'max:100',
            'rak_id' => 'required',
            'jumlah_buku' => 'required'
        ]);

        if ($request->hasFile('sampul')) {

            $sampulName = time() . '.' . $request->sampul->extension();
            // return $sampulName;

            $request->sampul->move(public_path('storage/buku_img'), $sampulName);
        } else {
            $sampulName = 'nosampul.png';
        }


        $id_rak = (int)$request->rak_id;

        DB::beginTransaction();
        try {
            Buku::create([
                'kode_buku' => $request->kode_buku,
                'sampul' => $sampulName,
                'judul_buku' => $request->judul_buku,
                'jenis_buku' => $request->jenis_buku,
                'sinopsis' => $request->sinopsis,
                'penulis' => $request->penulis,
                'penerbit' => $request->penerbit,
                'cetakan' => $request->cetakan,
                'tebal_buku' => $request->tebal_buku,
                'dimensi_buku' => $request->dimensi_buku,
                'isbn' => $request->isbn,
                'sinopsis' => $request->sinopsis,
                'rak_id' => $id_rak,
                'jumlah_buku' => (int)$request->jumlah_buku
            ]);
            DB::commit();
            return redirect('/buku')->with('pesansukses', 'Data Sukses Disimpan');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('/buku')->with('pesangagal', 'Data Gagal Disimpan' . $e);
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
    public function update(Request $request, string $id)
    {
        $validasiData = $request->validate([
            'kode_buku' => 'required', 'max:10',
            'sampul' => 'image', 'mimes:png,jpg,jpeg,svg', 'max:2048',
            'judul_buku' => 'required',
            'jenis_buku' => 'required',
            'penulis' => 'required', 'max:100',
            'penerbit' => 'required', 'max:100',
            'isbn' => 'required', 'max:100',
            'rak_id' => 'required',
            'jumlah_buku' => 'required'
        ]);

        $id_rak = (int)$request->rak_id;

        if ($request->hasFile('sampul')) {
            $sampulName = time() . '.' . $request->sampul->extension();

            $request->sampul->move(public_path('storage/buku_img'), $sampulName);
        } else {
            $sampulName = $request->sampulLama;
        }

        DB::beginTransaction();
        try {
            Buku::where('id', '=', $id)->update([
                'kode_buku' => $request->kode_buku,
                'sampul' => $sampulName,
                'judul_buku' => $request->judul_buku,
                'jenis_buku' => $request->jenis_buku,
                'sinopsis' => $request->sinopsis,
                'penulis' => $request->penulis,
                'penerbit' => $request->penerbit,
                'cetakan' => $request->cetakan,
                'tebal_buku' => $request->tebal_buku,
                'dimensi_buku' => $request->dimensi_buku,
                'isbn' => $request->isbn,
                'sinopsis' => $request->sinopsis,
                'rak_id' => $id_rak,
                'jumlah_buku' => (int)$request->jumlah_buku
            ]);
            DB::commit();
            return redirect('buku')->with('pesansukses', 'data berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('buku')->with('pesangagal', 'data gagal disimpan');
        }
    }

    public function edit(string $id)
    {
        $dtedit = Buku::with('rak')->where('id', '=', $id)->get();
        $dtrak = Rak::all();
        return View('buku.aksi.edit', compact('dtedit', 'dtrak'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Db::beginTransaction();
        try {
            $id = $request->id;
            if ($request->aksi == 'pasif') {
                Buku::where('id', '=', $id)->delete();
                DB::commit();
                return redirect('buku')->with('pesansukses', 'data berhasil di pasifkan');
            } else if ($request->aksi == 'restore') {
                Buku::where('id', '=', $id)->restore();
                DB::commit();
                return redirect('buku')->with('pesansukses', 'data berhasil di dikembalikan');
            } else if ($request->aksi == 'delete') {
                Buku::where('id', '=', $id)->forceDelete();
                DB::commit();
                return redirect('buku')->with('pesansukses', 'data berhasil di dihapus Permanen');
            }
        } catch (\Exception $e) {
            DB::rollback();
            return redirect('buku_pasif')->with('pesangagal', 'data gagal dipasifkan');
        }
    }
}
