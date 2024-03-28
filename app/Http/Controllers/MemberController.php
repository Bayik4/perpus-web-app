<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Gender;
use Illuminate\Support\Facades\DB;


class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datamemberaktif = Member::with('gender')->get();
        return view('member.index', compact('datamemberaktif'));
    }

    public function index_pasif() {
        $datamemberpasif = Member::onlyTrashed()->get();
        return View('member.index_pasif', compact('datamemberpasif'));
    }

    public function detail(String $id) {
        $dtmember = Member::where('id', '=', $id)->get();

        return view('member.aksi.detail', compact('dtmember'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create() {
        $dtgender = Gender::all();

        return View('member.aksi.add', compact('dtgender'));
    }
    //     nama
    //     alamat
    //     umur
    //     jenis_kelamin
    //     email
    //     no_telp
    public function store(Request $request)
    {
        $validasidata = $request->validate([
            'nama' => 'required',
            'umur' => 'required',
            'email'=> 'required',
            'alamat' => 'required',
            'gender_id' => 'required',
            'no_telp' => 'required'
        ]);

        $gender_id = (int)$request->gender_id;

        DB::beginTransaction();
        try {
            Member::create([
                'nama' => $request->nama,
                'umur' => $request->umur,
                'email'=> $request->email,
                'alamat' => $request->alamat,
                'gender_id' => $gender_id,
                'no_telp' => $request->no_telp
            ]);

            DB::commit();

            return redirect('member')->with('pesansukses', 'Tambah Data Berhasil');
        } catch(\Exception $e) {
            DB::rollback();

            return redirect('member')->with('pesangagal', 'Tambah Data Gagal');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Db::beginTransaction();
        try {
            $id = $request->id;
            if($request->aksi == 'pasif') {
                Member::where('id', '=', $id)->delete();
                DB::commit();
                return redirect('member')->with('pesansukses', 'data berhasil di pasifkan');
            } else if($request->aksi == 'restore') {
                Member::where('id', '=', $id)->restore();
                DB::commit();
                return redirect('member')->with('pesansukses', 'data berhasil di dikembalikan');
            } else if($request->aksi == 'delete') {
                Member::where('id', '=', $id)->forceDelete();
                DB::commit();
                return redirect('member')->with('pesansukses', 'data berhasil di dihapus Permanen');
            }
        } catch(\Exception $e) {
            DB::rollback();
            return redirect('member_pasif')->with('pesangagal', 'data gagal dipasifkan');
        }
    }
}
