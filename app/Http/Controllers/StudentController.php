<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function create(){
        return view('create');
    }

    public function save(Request $request){
        try {
            // Attempt to create a new student record
            Student::create([
                'student_name' => $request->studentname,
                'student_email' => $request->studentemail,
                'student_dob' => $request->studentdob
            ]);
        
            // If successful, flash a success message
            return redirect()->back()->with('success', 'Student added successfully');
        } catch (\Throwable $th) {
            // If an exception occurs, flash an error message
            return redirect()->back()->with('error', 'Failed to add student');
        }
        
    }

    public function index()
    {
        $res['tasks'] = $this -> tasks ->all();
        return view('index') -> with($res);
    }

    protected $tasks;

    public function __construct(){
        $this -> tasks = new Student();
    }

    public function delete($id)
    {
        $tasks = $this->tasks->find($id);
        $tasks -> delete();
        return redirect() -> back();
    }

    public function update($id){
        $tasks = $this->tasks->find($id);
        return view('edit', ['tasks' => $tasks]);
    }

    public function edit(Request $request, string $id)
        {
            try {
                $tasks = Student::findOrFail($id);

                $request->validate([
                    'studentname' => 'required',
                    'studentemail' => 'required|email',
                    'studentdob' => 'required|date'
                ]);
                // Update each attribute individually
                $tasks->student_name = $request->input('studentname');
                $tasks->student_email = $request->input('studentemail');
                $tasks->student_dob = $request->input('studentdob');

                $tasks->save();

                return redirect()->route('index')->with('success', 'Student updated successfully');
            } catch (\Throwable $th) {
                return redirect()->back()->with('error', 'Failed to update student: ' . $th->getMessage());
            }
            
        }


}