<?php
namespace App\Http\Controllers;

use App\Models\TemplateForm;
use App\Models\TemplateList;
use App\Models\QuestionList;
use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Mail\FeedbackFormMail;
use Illuminate\Support\Facades\Mail;

class TemplateFormController extends Controller
{
    public function save(Request $request)
    {
        if ($request->input('action') === 'save') {
            $formId = $request->input('form_id');
            $form = $request->input('form_id');
            $form_name = $request->input('form_name');
            $questionsJson = $request->input('questions');
            $questions = json_decode($questionsJson, true);

            $user = Auth::user();
            
            $formTemplate = new TemplateForm;
            $formTemplate->form_id = $formId;
            $formTemplate->user_id = $user->id;
            $formTemplate->form_name = $form_name;
            $formTemplate->question =  $questions;  

            $formTemplate->save();
            // dd($request->all());
            // $formData = [
            //     // dd($formData);
            //     'form_name' => $form_name,
            //     'questions' => $questions,
            //     'url' => route('feedback_form', ['form_id'=> $formId]),
            // ];
            // Mail::to('webdevelopersbc@gmail.com')->send(new FeedbackFormMail($formData));
            // return redirect()->back()->with('success', 'Form saved and email sent successfully!');
        }
        return redirect()->back()->with('error', 'Failed to save the form.');
    }

    public function showForm($formId)
    {

        $formTemplate = TemplateForm::where('form_id', $formId)->first();
        
        return view('emails\feedback_form', ['template' => $formTemplate]);
    }


    public function draft_form(Request $request,$id)
    {
        $templateForm = TemplateForm::where('id', $id)->firstOrFail();
        // dd($templateForm);
        // $from = TemplateList::where('id',$templateForm->id)->first();
  
            $Questions = QuestionList::all();
           
            $template = TemplateList::where('id',$templateForm->form_id)->first();
            // echo"<pre>";
            // print_r($template);
            // die;
            $department = Department::all();
            return view("survey.$template->form_name", compact('templateForm', 'Questions', 'template','department'));
        // $templateForm = TemplateForm::with('TemplateList')->where('id', $id)->first();
        // // dd($templateForm);
        // // echo"<pre>";
        // // print_r($templateForm);
        // // die;
        // // $from = TemplateList::where('id',$templateForm->id)->first();
        // // dd($from); 
        // // dd($templateForm);
        
        //     $Questions = QuestionList::all();

        //     $template = TemplateList::find($templateForm->form_id);


            

    // if ($template) {
    //     // If a TemplateList is found with the given form_id
    //     return view("survey.$template->form_name", compact('templateForm', 'Questions', 'template'));
    // } 



        //old
        // $templateForm = TemplateForm::with('TemplateList')->where('id', $id)->first();
        // // dd($templateForm);
        // $from = TemplateList::where('id',$templateForm->id)->first();
        // // dd($from); 
        // // dd($templateForm);
        
        //     $Questions = QuestionList::all();
 
        //     if($template = TemplateList::findOrFail(1)){

        //     return view("survey.$template->form_name", compact('templateForm', 'Questions', 'template'));
        //     }
        //     elseif($template = TemplateList::findOrFail(5)){
        //         return view("$template->form_name", compact('templateForm', 'Questions', 'template'));
        //     }
         
    }

    
    public function draft()
    { 
        $template = TemplateForm::with('user')->get();
        // dd($template);
        return view('survey.draft' , compact('template'));
    }

    public function deleteForm(Request $request, $id)
    {
        // dd($request->all());
        // dd($id);
        $template = TemplateForm::findOrFail($id);
        $template->delete();
        
        // Redirect back with a success message
        return back();
    }

    public function index()
    {
        return view('survey\form_draft');
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
    // public function show(TemplateForm $templateForm)
    // {
    //     //
    // }

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
    public function update(Request $request, $id)
    {
        // dd($request->all());
        // die;
        $templateForm = TemplateForm::findOrFail($id);
        $questionsJson = $request->input('questions');
        $questions = json_decode($questionsJson, true);

        $templateForm->question = $questions;
        // dd($templateForm);
        // die;
        $templateForm->update($request->all());
        
        return redirect()->back()->with('success', 'Form updated successfully!');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TemplateForm $templateForm)
    {
        //
    }

    
}
