<?php

namespace App\Http\Controllers;
use App\models\pengalamans;

use Illuminate\Http\Request;

class PengalamanController extends controller
{
    
public function index()
{
    $pengalamans = pengalamans::OrderBy('id', 'desc')->paginate(2);

    return view('pengalamans.index', compact('pengalamans'));
}
public function create()
{
    return view('pengalamans.create');
}
public function store(Request $request )
{
    // validate the request...
    $request->validate([
        'type' => 'required|unique:pengalamans|max:255',
        'keterangan' => 'required',

    ]);

    $pengalamans = new pengalamans;

    $pengalamans->type = $request->type; 
    $pengalamans->keterangan = $request->keterangan; 

    $pengalamans->save();

            return redirect('/pengalamans');
    }

    public function show($id)
    {
        $pengalaman = pengalamans::where('id', $id)->first();
        return view('pengalamans.show', ['pengalaman' => $pengalaman]);
    }

    public function edit($id)
    {
        $pengalaman = pengalamans::where('id', $id)->first();
        return view('pengalamans.edit', ['pengalaman' => $pengalaman]);
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'type' => 'required|unique:pengalamans|max:255',
            'keterangan' => 'required',
    
        ]);
        pengalamans::find($id)-> update([

            'type' => $request->type,
            'keterangan' => $request->keterangan
        ]);

        return redirect('/pengalamans');
    }
    public function destroy($id)
    {
        pengalamans::find($id)->delete();
        return redirect('/pengalamans');
    }
    public function print($pengalamans)
    {
        pengalamans::find($pengalamans)->print();
        return redirect('/pengalamans');
    }
}