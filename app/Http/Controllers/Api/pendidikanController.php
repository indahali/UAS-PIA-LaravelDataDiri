<?php

namespace App\Http\Controllers\Api;

use App\Models\pendidikans;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class pendidikancontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendidikans = pendidikans::all();

        return response()->json([
            'success' => true,
            'message'    => 'Daftar data pendidikan',
            'data'       => $pendidikans 
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
            'sekolah' => 'required|unique:pendidikans|max:255',
            'ns' => 'required',
            'mulai_tahun' => 'required',
            'berakhir_tahun' => 'required',
        ]);

        $pendidikans = pendidikans::create([
            'sekolah' => $request->sekolah,
            'ns' => $request->ns,
            'mulai_tahun' => $request->mulai_tahun,
            'berakhir_tahun'=> $request->berakhir_tahun,
            
        ]);
            if ($pendidikans) {
                return response()->json([
                    'success' => true,
                    'message'    => 'pendidikan Berhasil di tambahkan',
                    'data'       => $pendidikans 
                ], 200);
            }else {
                return response()->json([
                    'success' => false,
                    'message'    => 'pendidikan Gagal Ditambahkan ',
                    'data'       => $pendidikans 
                ], 409); 
            }
    }
    public function show ($id)
    {
        $pendidikans = pendidikans::where('id',$id)->first();
        return response()-> json([
            'success' => true,
            'message'    => 'Detail Data pendidikan ',
            'data'       => $pendidikans
        ], 200); 
    }
        
        public function update(Request $request, $id)
        {
           
    
            $pendidikans = pendidikans::find($id)->update([
                'sekolah' => $request->sekolah,
                'ns' => $request->ns,
                'mulai_tahun' => $request->mulai_tahun,
                'berakhir_tahun' => $request->berakhir_tahun
            ]);
    
            return response()->json([
                'success' => true,
                'message' => 'Data pendidikan telah berhasil di rubah',
                'data'    => $pendidikans
            ], 200);
        }
        public function destroy($id)
        {
            $pendidikans = pendidikans::find($id)->delete();
            return response()->json([
                'success' => true,
                'message' => 'data pendidikan berhasil di hapus',
                'data'    => $pendidikans
            ], 200);
        }
        
    }