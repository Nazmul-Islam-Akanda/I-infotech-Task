<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
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
        $students=Student::with('student_res')->paginate(10);
        // dd($student_results);
        return view('admin.pages.students-info',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects=Subject::all();
        return view('admin.pages.students-create',compact('subjects'));
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
            'image'=>'dimensions:width=100,height=100',
            'subject'=>'requied',
            'number'=>'required'
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

        $student=Student::where('name',$request->name)->first();

        $subject_id=$request->subject;
        $number=$request->number;

        $marks=array_combine($subject_id,$number);

        // dd($marks);

        foreach($marks as $key=>$mark){

            // dd($mark);
            Student_result::create([
                'student_id'=>$student->id,
                'subject_id'=>$key,
                'achieve_number'=>$mark
            ]);
        }
        

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
