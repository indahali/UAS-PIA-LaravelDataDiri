<?php

namespace App\Http\Controllers;
use App\models\pendidikans;

use Illuminate\Http\Request;

class pendidikanController extends controller
{
    
public function index()
{
    $pendidikans = pendidikans::OrderBy('id', 'desc')->paginate(3);

    return view('pendidikans.index', compact('pendidikans'));
}
public function create()
{
    return view('pendidikans.create');
}
public function store(Request $request )
{
    // validate the request...
    $request->validate([
        'sekolah' => 'required|unique:pendidikans|max:255',
        'ns' => 'required',
        'mulai_tahun' => 'required',
        'berakhir_tahun' => 'required',

    ]);

    $pendidikans = new pendidikans;

    $pendidikans->sekolah = $request->sekolah; 
    $pendidikans->ns = $request->ns; 
    $pendidikans->mulai_tahun = $request->mulai_tahun;
    $pendidikans->berakhir_tahun = $request->berakhir_tahun;
    $pendidikans->save();

        return redirect('/pendidikans');
    }

    public function show($id)
    {
        $pendidikan = pendidikans::where('id', $id)->first();
        return view('pendidikans.show', ['pendidikan' => $pendidikan]);
    }

    public function edit($id)
    {
        $pendidikan = pendidikans::where('id', $id)->first();
        return view('pendidikans.edit', ['pendidikan' => $pendidikan]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'sekolah' => 'required|unique:pendidikans|max:255',
            'ns' => 'required',
            'mulai_tahun' => 'required',
            'berakhir_tahun' => 'required'
        ]);

        pendidikans::find($id)-> update([
            'sekolah' => $request->sekolah,
            'ns' => $request->ns,
            'mulai_tahun' => $request->mulai_tahun,
            'berakhir_tahun' => $request->berakhir_tahun
        ]);

        return redirect('/pendidikans');
    }
    public function destroy($id)
    {
        pendidikans::find($id)->delete();
        return redirect('/pendidikans');
    }
}