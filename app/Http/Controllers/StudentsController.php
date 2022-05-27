<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Student_result;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students=Student::paginate(10);
        return view('admin.pages.students-info',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.students-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->all());

        $request->validate([
            'name'=>'required|unique:students',
            'image'=>'dimensions:width=100,height=100'
        ]);

        $filename='';
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $filename=date('Ymdhms').'.'.$file->getClientOriginalExtension();
            $file->storeAs('/uploads',$filename);
        }

        Student::create([
            'name'=>$request->name,
            'image'=>$filename
        ]);

        // $student=Student::where('name',$request->name)->first();

        // Student_result::create([
        //     'student_id'=>$student->id,
        //     'subject_id'=>1,
        //     'achieve_number'=>'120'
        // ]);

        return redirect()->route('students.index')->with('msg','Student record added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
