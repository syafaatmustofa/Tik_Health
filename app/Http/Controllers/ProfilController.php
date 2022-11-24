<?php

namespace App\Http\Controllers;

use App\Models\profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = profil::all();
        return view('profil.profil', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('profil.tambahprofil');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //untuk menghitung bmi
        $a = new konsul($request->beratbadan, $request->tinggibadan);
        $b = new umur($request->tahunLahir);
        $c = new konsultasi($request->tahunLahir, $request->bmi);
        
        // $a->bmi();
        // $a->obes();
        $data = [
            'bmi' => $a->bmi(),
            'status' => $a->status(),
            'umur' => $b->hitungUmur(),
            'konsul' => $c->konsul()
        ];

        return view('profil.tambahprofil', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function show(profil $profil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function edit(profil $profil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, profil $profil)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function destroy(profil $profil)
    {
        //
    }
}

class umur
{
    public function __construct($tahun)
    {
        $this->tahunLahir = $tahun;
    }

    public function hitungUmur()
    {
        return 2022 - $this->tahunLahir;
    }
}

class konsultasi extends umur
{
    public function __construct($tahun, $bmi)
    {
        $this->bmi = $bmi;
    }

    public function hitung()
    {
        if ($this->hitungUmur() > 17) {
            return 'Dewasa';
        } else {
            return 'Belum Dewasa';
        }
    }

    public function konsul(){
        if($this->hitung() == 'Dewasa' && $this->bmi == 'Obesitas'){
            return 'Anda Bisa Mendapatkan Konsultasi Gratis';
        }else{
            return 'Anda Tidak Mendapatkan Konsultasi Gratis';
        }
    }
}

class hitungbmi
{
    public function __construct($beratbadan, $tinggibadan)
    {
        $this->berat = $beratbadan;
        $this->tinggi = $tinggibadan / 100;
    }

    public function bmi()
    {
        return $this->beratbadan / ($this->tinggibadan * $this->tinggibadan);
    }
}

class konsul extends hitungbmi
{
    public function status()
    {
        $dbmi = $this->bmi();

        if ($dbmi < 18) {
            return 'kurus';
        } elseif ($dbmi > 30) {
            return 'obesitas';
        } else {
            return 'tidak terdaftar';
        }
    }
}
