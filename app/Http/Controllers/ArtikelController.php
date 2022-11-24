<?php

namespace App\Http\Controllers;

use App\Models\artikel;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // tampilkan data
        $data = artikel::all();
        return view('artikel.artikel' , compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // pindah halaman create
        $kategori = Kategori::all();
        return view('artikel.tambahartikel' , compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // proses tambah data
        $data = $request->all();
        $data['foto'] = Storage::put('artikel/foto', $request->file('foto'));
        artikel::create($data);
        return redirect('artikel');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show(artikel $artikel)
    {
        // return view('layouts.artikel.showartikel',compact('artikel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit(artikel $artikel)
    {
        // pindah halaman edit
        $kategori = kategori::all();
        return view('artikel.editartikel', compact('artikel','kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, artikel $artikel)
    {
        // proses edit data
        $data = $request->all();
        try {
            $data['foto'] = Storage::put('artikel/foto', $request->foto);
            $artikel->update($data);
        } catch (\Throwable $th) {
            $data['foto'] = $artikel->foto;
            $artikel->update($data);
        }

        return redirect('artikel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy(artikel $artikel)
    {
        // menghapus data
        $artikel->delete();
        return redirect('artikel');
    }

    public function depan(){

        // tampilkan ke beranda
        $data = artikel::all();
        return view('beranda' , compact('data'));
    }
}
