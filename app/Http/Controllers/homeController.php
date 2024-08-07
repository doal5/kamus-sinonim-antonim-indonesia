<?php

namespace App\Http\Controllers;

use App\Models\kamus;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use SynonymAntonym\Dictionary;

class homeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('home.index');
    }

    public function cari(Request $request)
    {
        $validate = $request->validate([
            'search' => 'required',
            'kategori' => 'required'
        ], [
            'search.required' => 'Kata Kunci Harus Di isi',
            'kategori.required' => 'Pilih Sinonim Atau Antonim'
        ]);
        $init = new Dictionary;
        // success
        $kata = $request->search;
        $data = $init->word($kata);
        $kategori = $request->kategori;
        if ($kategori == 'sinonim') {
            $tipe = $data->synonym();
        } else {
            $tipe = $data->antonym();
        }
        $semua = [
            'kata' => $kata,
            'tipe' => $tipe,
            'kategori' => $kategori,
        ];

        return view('home.index', $semua);
    }

    public function arti($kata)
    {
        $data = kamus::where('kata', $kata)->get();
        $no = [];
        $jadi = '';
        $jd2 = '';
        $ktg = '';
        if ($data ?? '') {
            foreach ($data as $item) {
                $pecah = $item->keterangan;
                $ktg = $item->kata;
            }
            if ($pecah ?? '') {
                $jadi = str_replace('&lt;b&gt;1&lt;/b&gt;', '<br>', $pecah);
                // $jadi1 = explode('', $jadi);
                $jd = str_replace('&lt;b&gt;2&lt;/b&gt;', '<br>', $jadi);
                $jd1 = str_replace('&lt;b&gt;3&lt;/b&gt;', '<br>', $jd);
                $jd2 = str_replace('&lt;b&gt;4&lt;/b&gt;', '<br>', $jd1);
            } else {
                $no = "Data Tidak Ada";
            }
        } else {
            $no = "Data Tidak Ada";
        }

        $all = [
            'data' => $data,
            'no' => $no,
            'jadi' => $jadi,
            'jd2' => $jd2,
            'ktg' => $ktg
        ];


        return view('home.kata', $all);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
    public function destroy(string $id)
    {
        //
    }
}
