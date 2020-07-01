<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
//use Faker\Provider\File;
use Faker\Provider\Image;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('student/index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,gif,jpg',
            'gender' => 'required',
            'dob' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'zipcode' => 'required',
        ]);
        $input = $request->except('image');
        $input['full_name'] = $input['first_name'] . " " . $input['last_name'];
        $imageName = time() . '.' . request()->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $imageName);
        $input['image'] = $imageName;
        Student::create($input);
        return back()->with('success', 'Records created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $student = Student::find($id);
//        return view('student/show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return view('student/update', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    // update student

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,gif,jpg',
            'gender' => 'required',
            'dob' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'zipcode' => 'required',
        ]);
        if ($request->hasFile('image')){
           $studentImage = public_path('images/'.$student->image);
           if (File::exists($studentImage)){
               unlink($studentImage);
           }
        }
        $input = $request->except('image');
        $imageName = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('images/'), $imageName);
        $input['image'] = $imageName;
        $student['full_name'] = $student['first_name'] . " " . $student['last_name'];
//        $student->update($input);
        $student->update($input);
        return redirect()->route('student.index')->with('success','Record updated successfully');
//        Student::where('id', $id)->update($student);

//        return back()->with('success', 'Record updated successfully');
//                     ->with('image',$imageName);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        if(file_exists('images/'.$student->image)){
            unlink('images/'.$student->image);
        }

        $student->delete();
        return redirect('student')->with('success', 'Student deleted successfully');
    }



}
