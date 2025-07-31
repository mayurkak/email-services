<?php
namespace App\Http\Controllers;

use App\Models\TemplateForm;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TemplateFormController extends Controller
{
    public function save(Request $request)
    {
        if ($request->input('action') === 'save') {
            $formId = $request->input('form_id');
            $questions = json_decode($request->input('questions'), true); 
            dd($request->all());
            if (is_array($questions)) {
                $user = Auth::user();
                
                foreach ($questions as $question) {
                    $formTemplate = new TemplateForm();
                    $formTemplate->form_id = $formId;
                    $formTemplate->user_id = $user->id; 
                    $formTemplate->question = $question;
                    $formTemplate->save();
                }

                return redirect()->back()->with('success', 'Questions saved successfully!');
            } 
        }
        return redirect()->back()->with('success', 'Form saved successfully!');
    }
    

    public function index()
    {
        //
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
    public function show(TemplateForm $templateForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TemplateForm $templateForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TemplateForm $templateForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TemplateForm $templateForm)
    {
        //
    }
}
