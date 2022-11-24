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
        $hobi = array($request->hobi1, $request->hobi2 , $request->hobi3);
        $a = new konsultasi($request->beratbadan, $request->tinggibadan, $request->tahunLahir);
        
        $data = profil::create([
            'nama' =>$request->nama,
            'tinggibadan' =>$request->tinggibadan,
            'beratbadan' =>$request->beratbadan,
            'bmi' => round($a->bmi(), 2),
            'status' => $a->status(),
            'umur' => $a->hitungumur(),
            'konsul'=>$a->konsult(),
            'hobi'=>$hobi[0]
            // 'umur' => $b->hitungUmur(),
            // 'konsul' => $c->konsul()
        ]);
        return redirect('profil');
        // dd($data);

        // return view('profil.profil', compact('data'));
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
    public function __construct($beratbadan, $tinggibadan, $tahunLahir)
    {
        $this->beratbadan = $beratbadan;
        $this->tinggibadan = $tinggibadan / 100;
        $this->tahunLahir = $tahunLahir;
    }

    public function bmi()
    {
        return $this->beratbadan / ($this->tinggibadan * $this->tinggibadan);
        // return 2022 - $this->tahunLahir;
    }

    public function hitungumur()
    {
        return 2022 - $this->tahunLahir;
    }
}

class konsultasi extends umur
{
    public function status()
    {
        // $this->bmi = $bmi;
        $dbmi = $this->bmi();

        if ($dbmi < 18.5) {
            return 'kurus';
        } elseif ($dbmi <= 22.9) {
            return 'Normal';
        } elseif ($dbmi <= 29.9) {
            return 'Gemuk';
        } elseif ($dbmi > 30) {
            return 'Obesitas';
        } else {
            return 'tidak ditemukan';
        }
    }

    public function konsult()
    {
        $umur = $this->hitungumur();
        $status = $this->status();

        if ($umur >= '17' && $status == 'Obesitas') {
            return 'Anda Bisa Mendapatkan Konsultasi Gratis';
        } else {
            return 'Anda Tidak Mendapatkan Konsultasi Gratis';
        }
    }
}
