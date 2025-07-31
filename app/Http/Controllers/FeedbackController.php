<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\TemplateForm;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function showForm($formId)
    {
        echo"<pre>";
        print_r($formId);
        die;
        $formTemplate = TemplateForm::where('form_id', $formId)->first();
        return view('feedback_form', ['template' => $formTemplate]);
    }
    
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
