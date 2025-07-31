<?php

namespace App\Http\Controllers;

use App\Models\SelectTemplate;
use Illuminate\Http\Request;

class SelectTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('templates.email.showtemplate');
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
    public function show(SelectTemplate $selectTemplate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SelectTemplate $selectTemplate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SelectTemplate $selectTemplate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SelectTemplate $selectTemplate)
    {
        //
    }
}
