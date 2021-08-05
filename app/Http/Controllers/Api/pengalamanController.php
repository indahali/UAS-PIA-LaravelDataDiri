<?php

namespace App\Http\Controllers\Api;

use App\Models\pengalamans;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class pengalamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengalamans = pengalamans::orderBy('id', 'desc')->paginate(3);

        return response()->json([
            'success' => true,
            'message'    => 'Daftar pengalaman',
            'data'       => $pengalamans
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
            'type' => 'required|unique:pengalamans|max:255',
            'keterangan' => 'required',
        ]);

        $pengalamans = pengalamans::create([
            'type' => $request->type,
            'keterangan'=> $request->keterangan,
            
        ]);
            if ($pengalamans) {
                return response()->json([
                    'success' => true,
                    'message'    => 'pengalaman Berhasil di tambahkan',
                    'data'       => $pengalamans
                ], 200);
            }else {
                return response()->json([
                    'success' => false,
                    'message'    => 'pengalaman Gagal Ditambahkan ',
                    'data'       => $pengalamans
                ], 409); 
            }
    }
    public function show ($id)
    {
        $pengalaman = pengalamans::where('id',$id)->first();
        return response()-> json([
            'success' => true,
            'message'    => 'Detail Data pengalaman ',
            'data'       => $pengalaman
        ], 200); 
    }
        
        public function update(Request $request, $id)
        {
           
    
            $pengalaman = pengalamans::find($id)->update([
                'type' => $request->type,
                'keterangan' => $request->keterangan
            ]);
    
            return response()->json([
                'success' => true,
                'message' => 'Data pengalaman telah berhasil di rubah',
                'data'    => $pengalaman
            ], 200);
        }
        public function destroy($id)
        {
            $pengalaman = pengalamans::find($id)->delete();
            return response()->json([
                'success' => true,
                'message' => 'data pengalaman berhasil di hapus',
                'data'    => $pengalaman
            ], 200);
        }
        
    }