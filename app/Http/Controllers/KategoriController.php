<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Dotenv\Validator;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $kategori = kategori::all();
        return response()->json($kategori);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama'=>'required',
            'dkr'=>'required',
        ]);
        $kategori = kategori::create($request->all());
        return response()->json([
            'msg'=>'data berhasil di simpan'
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(kategori $kategori)
    {
        //
        return response()->json($kategori);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, kategori $kategori)
    {
        //
        $request->validate([
            'nama'=>'required',
            'dkr'=>'required',
        ]);
        //jika validasi gagal maka kirim pesan error
        if($request->fails()){
            //mengembalikan pesan error dengan menggunakan json
            return response()->json( $request->errors() );
        }else{
            //melakukan update data berdasarkan $id
            // $kategori           = kategori::find($id);
            $kategori->nama    = $request->nama;
            $kategori->dkr      = $request->dkr;

            //jika berhasil maka simpan data dengan methode $post->save()
            if($kategori->save()){
                return response()->json( 'Kategori Berhasil Diupdate');
            }else{
                return response()->json('Kategori Gagal Diupdate');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kategori $kategori)
    {
        //
        $kategori->delete();
        return response()->json([
            'msg'=>'data berhasil dihapus'
        ]);
    }
}
