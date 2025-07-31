<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;

use App\Models\contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contact = contact::get();
        return view('contact.index',compact('contact'));
           
    }
    public function create()
    {
        return view('contact.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email',
            'mo_number',
        ]);
    
        contact::create($request->post());
     
        return redirect()->route('contact.index')
                        ->with('success','Product created successfully.');
    }

    public function show(contact $contact)
    {
        return view('contact.show',compact('contact'));
    } 

    public function edit(contact $contact)
    {
        return view('contact.edit',compact('contact'));
    }

    public function update(Request $request, contact $contact)
    {
            $request->validate([
            'email' => 'nullable|email', 
            'mo_number' => 'nullable|string', 
        ]);

        $contact->update($request->all());
            return redirect()->route('contact.index')->with('success','Product updated successfully');              
    }

    public function destroy(contact $contact)
    {
        $contact->delete();
    
        return redirect()->route('contact.index')
                        ->with('success','Product deleted successfully');
    }

    public function importpage()
    {
        return view('contact/import');
    }


    public function importfile(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls',
        ]);
        $file = $request->file;
        // dd($file);
        // die;
        Excel::import(new UsersImport, $request->file('file'));

        return back()->with('success', 'File imported successfully.');
    }

}
