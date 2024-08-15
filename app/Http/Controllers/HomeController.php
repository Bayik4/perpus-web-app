<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pinjam;
use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $date = Carbon::now()->format('Y-m-d');

        $datapinjam = count(Pinjam::all());
        $databukuk = Pinjam::onlyTrashed()->where('tanggal_kembali', '=', $date)->get();
        $databukukembali = count($databukuk);


        $jumlahmember = count(Member::all());
        $datap = DB::table('pinjams')->where('tanggal_pinjam', $date)->get();
        $datapinjamnow = count($datap);

        $bukukembali = Pinjam::with('buku', 'member')->where('tanggal_kembali', '=', $date)->get();
        $bukukembalih = count($bukukembali);

        // return view('home');
        return view('home', [
            'datapinjam' => $datapinjam,
            'jumlahmember' => $jumlahmember,
            'datapinjamnow' => $datapinjamnow,
            'bukukembali' => $databukukembali,
            'bukukembalih' => $bukukembalih,
            'dropbuku' => $bukukembali
        ]);
    }
}
