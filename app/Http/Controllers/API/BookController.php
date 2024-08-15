<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Keranjang;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index()
    {
        $dataBuku = Buku::all();

        return response()->json($dataBuku);
    }

    public function detailBuku(Request $request)
    {
        $detailBuku = Buku::where("id", "=", $request->id)->get();
        return response()->json($detailBuku);
    }

    public function cart()
    {
        $data = Keranjang::all();

        return response()->json($data, 200);
    }

    public function badge()
    {
        $data = Keranjang::all();
        $jmlh = count($data);

        return response()->json([
            'jumlahCart' => $jmlh
        ], 200);
    }

    public function addtocart(Request $request)
    {
        $request->validate([
            'judul_buku' => ['required'],
            'sampul' => ['required'],
            'harga' => ['required', 'numeric'],
            'jumlah' => ['required', 'numeric']
        ]);

        // return response()->json($request->all(), 200);

        DB::beginTransaction();
        try {
            Keranjang::create([
                'sampul' => $request->sampul,
                'judul_buku' => $request->judul_buku,
                'harga' => $request->harga,
                'jumlah' => $request->jumlah
            ]);

            DB::commit();
            return response()->json([
                'message' => 'success add data to cart',
                'status' => 'success'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'failed add data to cart' . $e,
                'status' => 'failed'
            ], 400);
        }
    }

    public function hapusCart(Request $request)
    {
        DB::beginTransaction();
        try {
            Keranjang::where('id', $request->id)->forceDelete();

            DB::commit();
            return response()->json([
                'message' => 'success delete data from cart',
                'status' => 'success'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'failed delete data from cart',
                'status' => 'failed'
            ], 200);
        }
    }
}
