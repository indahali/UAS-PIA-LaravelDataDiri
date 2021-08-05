<?php

namespace App\Http\Controllers\Api;

use App\Models\contacts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class contactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = contacts::orderBy('id', 'desc')->paginate(3);

        return response()->json([
            'success' => true,
            'message'    => 'Daftar kontak',
            'data'       => $contacts
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
            'no_tlp' => 'required|unique:contacts|max:255',
            'email' => 'required',
        ]);

        $contacts = contacts::create([
            'no_tlp' => $request->no_tlp,
            'email'=> $request->email,
            
        ]);
            if ($contacts) {
                return response()->json([
                    'success' => true,
                    'message'    => 'contact Berhasil di tambahkan',
                    'data'       => $contacts
                ], 200);
            }else {
                return response()->json([
                    'success' => false,
                    'message'    => 'contact Gagal Ditambahkan ',
                    'data'       => $contacts
                ], 409); 
            }
    }
    public function show ($id)
    {
        $contact = contacts::where('id',$id)->first();
        return response()-> json([
            'success' => true,
            'message'    => 'Detail Data contact ',
            'data'       => $contact
        ], 200); 
    }
        
        public function update(Request $request, $id)
        {
           
    
            $contact = contacts::find($id)->update([
                'no_tlp' => $request->no_tlp,
                'email' => $request->email
            ]);
    
            return response()->json([
                'success' => true,
                'message' => 'Data contact telah berhasil di rubah',
                'data'    => $contact
            ], 200);
        }
        public function destroy($id)
        {
            $contact = contacts::find($id)->delete();
            return response()->json([
                'success' => true,
                'message' => 'data contact berhasil di hapus',
                'data'    => $contact
            ], 200);
        }
        
    }