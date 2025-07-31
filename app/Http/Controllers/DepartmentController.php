<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $department = Department::get();
        return view('Department\department', compact('department'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Department\CreateDepart');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Department'=> 'required'
        ]);
        Department::create($request->post());
        return redirect()->back()->with('success','department has been created success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        return view('show',compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department,$id)
    {
        // dd($id);
        $department = Department::find($id);
        return view('Department\editDepart',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department,$id)
    {
        // dd($id);
        $department = Department::find($id);
        $request->validate([
            'Department'=> 'required'
        ]);
        $department->fill($request->all())->save();
        
        return redirect()->back()->with('success','department has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department,$id)
    {
        $department = Department::findorFail($id);
        $department->delete();

        return redirect()->back()->with('success','department has been deleted successfully');
    }
}

   

