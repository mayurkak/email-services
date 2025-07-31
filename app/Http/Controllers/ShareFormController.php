<?php

namespace App\Http\Controllers;
use App\Models\TemplateForm;
use App\Models\TemplateList;
use App\Models\QuestionList;
use App\Models\User;
use App\Models\Department;
use App\Models\StoreResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\contact;
use App\Mail\FormSubmissionNotification;

class ShareFormController extends Controller
{
    public function share_form(Request $request,$id){

        $questionsJson = $request->input('questions');
        $questions = json_decode($questionsJson, true);
        
        $templateForm = TemplateForm::where('id', $id)->firstOrFail();
        $Questions = QuestionList::all();
        $template = TemplateList::where('id',$templateForm->form_id)->first();
        $department = Department::all();
        $contact = contact::all();

        $template = TemplateForm::with('user')->get();
        $formUrl = route('view_form', ['id' => $templateForm->id]);
        $emails = $request->input('emails', []);

        foreach ($emails as $email) {
            Mail::to($email)->send(new FormSubmissionNotification($formUrl));
        }
 
        $templateForm->status = 'shared';
        $templateForm->email_Id = json_encode($emails);
        $templateForm->save();

        return redirect()->back()->with('success', 'Form submitted successfully.');
     
    }

    public function ViewForm(Request $request,$id){

        $questionsJson = $request->input('questions');
        $questions = json_decode($questionsJson, true);
        
        $templateForm = TemplateForm::where('id', $id)->firstOrFail();
        $Questions = QuestionList::all();
        $template = TemplateList::where('id',$templateForm->form_id)->first();
        $department = Department::all();
        $contact = contact::all();

        return view("ShareForm.$template->form_name", compact('templateForm', 'Questions', 'template','department','contact'));
    }

    public function share(Request $request)
    { 
        $template = TemplateForm::with('user')->get();
        return view('ShareForm\SaveList' , compact('template'));
    }

    public function storeResponse(Request $request)
    {
       
        if ($request->input('action') === 'save') {
            $formId = $request->input('form_id');
            $questionsJson = $request->input('questions');
            $responseJson = $request->input('response');
            $email = $request->input('email');

            $questions = json_decode($questionsJson, true);
            $responses = json_decode($responseJson, true);
            $responseArray = [];

            foreach ($questions as $index => $question) {
                $responseArray[$question] = $responses[$index] ?? null;
            }
            // dd($responseArray);
            // die;
            StoreResponse::create([
                'form_id' => $formId,
                'question' => $questionsJson, 
                'response' => json_encode($responseArray),
                'email' => $email

            ]);

            return redirect()->back();
        }
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
