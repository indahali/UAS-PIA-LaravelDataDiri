<?php

namespace App\Http\Controllers;
use App\models\profils;

use Illuminate\Http\Request;

class profilController extends controller
{
    
public function index()
{
    $profils = profils::OrderBy('id', 'desc')->paginate(3);

    return view('profils.index', compact('profils'));
}


public function create()
{
    return view('profils.create');
}
public function store(Request $request )
{
    // validate the request...
    $request->validate([
        'nama' => 'required|unique:profils|max:255',
        'jk' => 'required',
        'ttl' => 'required',
        'agama' => 'required',
        'alamat' => 'required',

    ]);

    $profils = new profils;

    $profils->nama = $request->nama; 
    $profils->jk = $request->jk; 
    $profils->ttl = $request->ttl; 
    $profils->agama = $request->agama; 
    $profils->alamat = $request->alamat; 


    $profils->save();

        return redirect('/profils');
    }

    public function show($id)
    {
        $profil = profils::where('id', $id)->first();
        return view('profils.show', ['profil' => $profil]);
    }

    public function edit($id)
    {
        $profil = profils::where('id', $id)->first();
        return view('profils.edit', ['profil' => $profil]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|unique:profils|max:255',
            'jk' => 'required',
            'ttl' => 'required',
            'agama' => 'required',
            'alamat' => 'required',

        ]);

        profils::find($id)-> update([
            'nama' => $request->nama,
            'jk' => $request->jk,
            'ttl' => $request->ttl,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
        ]);

        return redirect('/profils');
    }
    public function destroy($id)
    {
        profils::find($id)->delete();
        return redirect('/profils');
    }
}