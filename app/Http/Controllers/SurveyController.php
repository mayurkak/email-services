<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\{TemplateForm,QuestionList,TemplateList,Department};

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('survey\SurveyLIst');
    }
    public function show(Request $request,$id)
    {
        // dd($id);
                // $template = TemplateList::where('id',$templateForm->form_id)->first();
        return view("survey.shared");
        // dd($request->all());
        // $templateForm = TemplateForm::where('id', $id)->firstOrFail();
        // dd($templateForm);
        // $Questions = QuestionList::all();
        
        // $template = TemplateList::where('id',$templateForm->form_id)->first();
            
        // $department = Department::all();
        // return view("survey.shared", compact('templateForm', 'Questions', 'template','department'));
       
    }

    public function draft($formId)
    {
        $form = TemplateForm::where('form_id')->latest()->first();
        $save = TemplateForm::latest()->first();
        $questions = $save->question;
        $questions = json_encode($questions, true);
        return view('survey.draft' , compact('questions','form'));
    }
    
    // 

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
