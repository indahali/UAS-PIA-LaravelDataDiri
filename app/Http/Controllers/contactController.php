<?php

namespace App\Http\Controllers;
use App\models\contacts;

use Illuminate\Http\Request;

class contactController extends controller
{
    
public function index()
{
    $contacts = contacts::OrderBy('id', 'desc')->paginate(3);

    return view('contacts.index', compact('contacts'));
}
public function create()
{
    return view('contacts.create');
}
public function store(Request $request )
{
    // validate the request...
    $request->validate([
        'no_tlp' => 'required|unique:contacts|max:255',
        'email' => 'required',

    ]);

    $contacts = new contacts;

    $contacts->no_tlp = $request->no_tlp; 
    $contacts->email = $request->email;

    $contacts->save();

        return redirect('/contacts');
    }

    public function show($id)
    {
        $contact = contacts::where('id', $id)->first();
        return view('contacts.show', ['contact' => $contact]);
    }

    public function edit($id)
    {
        $contact = contacts::where('id', $id)->first();
        return view('contacts.edit', ['contact' => $contact]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'no_tlp' => 'required|unique:contacts|max:255',
            'email' => 'required',
        ]);

        contacts::find($id)-> update([

            'no_tlp' => $request->no_tlp,
            'email' => $request->email
        ]);

        return redirect('/contacts');
    }
    public function destroy($id)
    {
        contacts::find($id)->delete();
        return redirect('/contacts');
    }
}