<?php

namespace App\Http\Controllers;

use App\Models\{QuestionList,Department};
use Illuminate\Http\Request;


class QuestionListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
   
    public function getQuestion(Request $request) {
        $question = QuestionList::find($request->id);
        return response()->json(['question' => $question->Questions]);
    } 

    public function index()
    {
        $question = QuestionList::all();
        $department = Department::all();
        return view('Question\Question', compact('question','department'));
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
    public function show(QuestionList $questionList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(QuestionList $questionList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, QuestionList $questionList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QuestionList $questionList)
    {
        //
    }
}
