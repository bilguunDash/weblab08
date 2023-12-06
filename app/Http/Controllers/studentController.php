<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function showForm(){
    return view('studentlist');}
    // Define the students array
    public $students = array(
        array("se21d25", "John", 23),
        array("se21d23", "Jane", 18),
        array("se21d21", "Doe", 2),
    );

    // Display the list of students
    public function list()
    {
        $a = "hello";
        $student = $this->students;
        return view('studentlist', ['a' => $a, 'students' => $student]);
    }

    // Get a student by ID
    public function getById(Request $request)
    {
        $aStudent = null;

        foreach ($this->students as $student) {
            if ($student[0] == $request->id) {
                $aStudent = $student;
                break;
            }
        }

        return view('studentdetail', compact('aStudent'));
    }




}
