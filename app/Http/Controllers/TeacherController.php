<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
          $teachers = Teacher::paginate(8);

              $teachers->load('students');


        return view("teacher_list",['teachers'=>$teachers]);
        //     $teachers = Teacher::paginate(10);

    // return view('add_teacher', compact('teachers'));
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
     // $teacher = new Teacher;
        // $teacher->name=$request->name;
        // $teacher->email=$request->email;
        $request->validate([
            'name' => 'required|string|max:120',
            'email' => 'required|email|unique:teachers,email|unique:students,email',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ], [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'The email address is already in use.',
        ]);
        $teacher = new Teacher;
        $teacher->name = $request->input('name');
        $teacher->email = $request->input('email');
       
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move(public_path($destinationPath), $profileImage);
            $teacher->image = "$profileImage";
        }
          // $input = $request->all();  
          // Teacher::create($input);

        // $teacher->image=$path;
        // dd($request);
      if ($teacher->save()) {
            return redirect()->back()->with('success', 'Teacher created successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to create teacher.');
        }
}

    /**
     * Display the specified resource.
     */
       public function show($teacherId)
    {
        // Get the teacher by ID
        $teacher = Teacher::find($teacherId);

        // Check if the teacher exists
        if (!$teacher) {
            echo 'Teacher not found';
        }

        // Get all students related to this teacher
        $students = $teacher->students;

        return view('show', compact('students'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $edit_teacher= Teacher::find($id);
        return view('edit_teacher',compact('edit_teacher'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
        public function update(Request $update,$id)
        {
            //
        $update_teacher = Teacher::find($id);
        $update_teacher->name=$update->input('name');
        $update_teacher->email=$update->input('email');
        if($update->file('image') !=''){
       if ($image = $update->file('image')) {
                $destinationPath = 'images/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move(public_path($destinationPath), $profileImage);
                $update_teacher->image = "$profileImage";
        }
        }
        
         $update_teacher->update();
             if ($update_teacher->update()) {
            return back()->with('message', 'Teacher Detail is updated successfully.');
        } else {
            return back()->with('error', 'Failed to update teacher detail.');
        }
        // dd($update_teacher);
         // if(true){
         //    $msg = 'Image is updated Successfully';
         // }
          // return back()->with('message', 'Teacher Detail is updated Successfully');
    }

     public function destroy($id)
    {
    $teacher = Teacher::findOrFail($id);  
    $teacher->delete();

    return redirect('/allteacherlist')->with('success', 'Teacher deleted successfully.');
        //
    }
}
