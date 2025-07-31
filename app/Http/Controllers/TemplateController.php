<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User,Department,QuestionList,TemplateList};


class TemplateController extends Controller
{
    
    public function temp_new()
    {
        $template = TemplateList::where('id', 1)->first();
        $Questions = QuestionList::all();
        $department = Department::all();
        return view('templates.temp_list.create_new_template',compact('Questions', 'template','department'));
    }

    public function temp_all()
    {
        $template = TemplateList::where('id', 5)->first();
        $Questions = QuestionList::all();
        $department = Department::all();
        return view('templates.temp_list.show_all_template',compact('Questions','template','department'));
    }

    public function temp_draft()
    {
        $template = TemplateList::where('id', 3)->first();
        $Questions = QuestionList::all();
        $department = Department::all();
        return view('templates.temp_list.draft',compact('Questions','template','department','department'));
    }

    public function temp_sms_new()
    {
        $template = TemplateList::where('id', 4)->first();
        $Questions = QuestionList::all();
        $department = Department::all();
        return view('templates\temp_list\create_new_sms_template',compact('Questions','template','department','department'));
    }

    public function temp_sms_all()
    {
        $template = TemplateList::where('id', 2)->first();
        $Questions = QuestionList::all();
        $department = Department::all();
        return view('templates.temp_list.show_all_sms_template',compact('Questions','template','department','department'));
    }

    public function temp_sms_draft()
    {   
        $Questions = QuestionList::all();
        $template = TemplateList::where('id', 6)->first();
        $department = Department::all();
        return view('templates.temp_list.sms_draft',compact('Questions','template','department','department'));
    }

    
    public function create_ques_list()
    {
        $Questions = QuestionList::all();
        return view('templates\email\create_ques_list',compact('Questions'));
    }

    public function FormOne()
    {
        return view('form\form_1');
    }
    public function FormTwo()
    {
        return view('form\form_2');
    }
    public function FormFive()
    {
        return view('form\form_5');
    }
    public function FormThree()
    {
        return view('form\form_3');
    }
    public function FormFour()
    {
        return view('form\form_4');
    }
    public function FormSix()
    {
        return view('form\form_6');
    }

    
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
    public function fetchQuestion(string $id)
    {

        $Questions = QuestionList::where('dept_id',$id);
    }
}
