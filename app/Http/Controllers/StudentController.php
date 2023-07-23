<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;

class StudentController extends Controller
{
    //
    
    public function index()
    {
        //
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
     $student = new Student;
             $request->validate([
            'name' => 'required|string|max:120',
            'email' => 'required|email|unique:students,email',
            'mobile' => 'required|numeric|digits:10',
            'age' => 'required|integer|min:1',
            'gender' => 'required|in:male,female,other',
            'address_info' => 'required|string|max:500',
        ], [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'The email address is already in use.',
            'mobile.required' => 'The contact number field is required.',
            'mobile.numeric' => 'The contact number must be a numeric value.',
            'mobile.digits' => 'The contact number must have exactly 10 digits.',
            'age.required' => 'The age field is required.',
            'age.integer' => 'The age must be an integer value.',
            'age.min' => 'The age must be at least :min.',
            'gender.required' => 'Please select a gender.',
            'gender.in' => 'Invalid gender selection.',
            'address_info.required' => 'The address field is required.',
            'address_info.string' => 'Invalid address format.',
            'address_info.max' => 'The address must not exceed :max characters.',
        ]);
             $student->teacher_id = $request->input('teacher_id');
            $input = $request->all();  
            Student::create($input);      
            // $student->save();

        // $teacher->image=$path;
        // dd($student);
         return redirect()->route('addstudent')->with('success', 'Student data added successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
        $students = Student::paginate(10);

        return view("student_list",['students'=>$students]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $edit_student= Student::find($id);
        return view('edit_student',compact('edit_student'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
        public function update(Request $update,$id)
        {
            //
        $update_student = Student::find($id);
         $update->validate([
            'name' => 'required|string|max:120',
            'email' => 'required|email|unique:students,email,' . $id,
            'mobile' => 'required|numeric|digits:10',
            'age' => 'required|integer|min:1',
            'gender' => 'required|in:male,female,other',
            'address_info' => 'required|string|max:500',
        ], [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'The email address is already in use.',
            'mobile.required' => 'The contact number field is required.',
            'mobile.numeric' => 'The contact number must be a numeric value.',
            'mobile.digits' => 'The contact number must have exactly 10 digits.',
            'age.required' => 'The age field is required.',
            'age.integer' => 'The age must be an integer value.',
            'age.min' => 'The age must be at least :min.',
            'gender.required' => 'Please select a gender.',
            'gender.in' => 'Invalid gender selection.',
            'address_info.required' => 'The address field is required.',
            'address_info.string' => 'Invalid address format.',
            'address_info.max' => 'The address must not exceed :max characters.',
        ]);
        $update_student->name=$update->input('name');
        $update_student->email=$update->input('email');
        $update_student->mobile=$update->input('mobile');
        $update_student->gender=$update->input('gender');
        $update_student->age=$update->input('age');
         $update_student->teacher_id=$update->input('teacher_id');
        $update_student->address_info=$update->input('address_info');

         // $update_student->update();
        // dd($update_teacher);
         // if(true){
         //    $msg = 'Image is updated Successfully';
         // }
         if ($update_student->update()) {
            return back()->with('message', 'Student Detail is updated successfully.');
        } else {
            return back()->with('error', 'Failed to update student detail.');
        }
    }

     public function destroy($id)
    {
    $student = Student::findOrFail($id);  
    $student->delete();

    return redirect('/studentlist')->with('success', 'Student deleted successfully.');
        //
    }
   public function dropdown($id) {
    $teachers = Teacher::all();

    return view("addstudent", ['teachers' => $teachers]);
}
    public function selectededit($studentId)
    {
        // Find the student by ID
        $student = Student::find($studentId);

        // Check if the student exists
        if (!$student) {
            abort(404, 'Student not found');
        }

        return view('edit_selectedstudent', compact('student'));
    }

    public function selectedupdate(Request $request, $studentId)
    {
        // Find the student by ID
        $student = Student::find($studentId);

        // Check if the student exists
        if (!$student) {
            abort(404, 'Student not found');
        }

        // Validate the form data (you can customize the validation rules based on your needs)
        $validatedData = $request->validate([
            'name' => 'required|string|max:120',
            'email' => 'required|email|unique:students,email,' . $studentId,
            'mobile' => 'required|numeric|digits:10',
            'age' => 'required|integer|min:1',
            'gender' => 'required|in:male,female,other',
            'address_info' => 'required|string|max:500',
        ], [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'The email address is already in use.',
            'mobile.required' => 'The contact number field is required.',
            'mobile.numeric' => 'The contact number must be a numeric value.',
            'mobile.digits' => 'The contact number must have exactly 10 digits.',
            'age.required' => 'The age field is required.',
            'age.integer' => 'The age must be an integer value.',
            'age.min' => 'The age must be at least :min.',
            'gender.required' => 'Please select a gender.',
            'gender.in' => 'Invalid gender selection.',
            'address_info.required' => 'The address field is required.',
            'address_info.string' => 'Invalid address format.',
            'address_info.max' => 'The address must not exceed :max characters.',
        ]);

        // Update the student's information
        $student->update($validatedData);

        return redirect()->route('students.edit', ['studentId' => $studentId])
            ->with('success', 'Student updated successfully!');
    }
       public function selecteddestroy($id)
    {
    $student = Student::findOrFail($id);  
    $student->delete();

    return redirect('teacher.students')->with('success', 'Student deleted successfully.');
        //
    }
}
