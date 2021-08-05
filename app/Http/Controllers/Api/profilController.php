<?php

namespace App\Http\Controllers\Api;

use App\Models\profils;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class profilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profils = profils::all();

        return response()->json([
            'success' => true,
            'message'    => 'Daftar data profil',
            'data'       => $profils 
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store (Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:profils|max:255',
            'jk' => 'required',
            'ttl' => 'required',
            'agama' =>'required',
            'alamat' => 'required',
        ]);

        $profils = profils::create([
            'nama' => $request->nama,
            'jk' => $request->jk,
            'ttl'=> $request->ttl,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            
        ]);
            if ($profils) {
                return response()->json([
                    'success' => true,
                    'message'    => 'profil Berhasil di tambahkan',
                    'data'       => $profils 
                ], 200);
            }else {
                return response()->json([
                    'success' => false,
                    'message'    => 'profil Gagal Ditambahkan ',
                    'data'       => $profils 
                ], 409); 
            }
    }
    public function show ($id)
    {
        $profil = profils::where('id',$id)->first();
        return response()-> json([
            'success' => true,
            'message'    => 'Detail Data profil ',
            'data'       => $profils
        ], 200); 
    }
        
        public function update(Request $request, $id)
        {
           
    
            $profils = profils::find($id)->update([
                'nama' => $request->nama,
                'jk' => $request->jk,
                'ttl' => $request->ttl,
                'agama' => $request->agama,
                'alamat' => $request->alamat
            ]);
    
            return response()->json([
                'success' => true,
                'message' => 'Data profil telah berhasil di rubah',
                'data'    => $profils
            ], 200);
        }
        public function destroy($id)
        {
            $profils = profils::find($id)->delete();
            return response()->json([
                'success' => true,
                'message' => 'data profil berhasil di hapus',
                'data'    => $profils
            ], 200);
        }
        
    }