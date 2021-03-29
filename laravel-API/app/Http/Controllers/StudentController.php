<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    // API-Controller
    function get()
    {
        $data = Student::all();
        return response()->json(
            [
                "message" => "Success",
                "data" => $data,
            ]
        );
    }

    function getById($id)
    {
        $data = Students::where('student_id', $id)->get();
        return response()->json(
            [
                "message" => "Success",
                "data" => $data,
            ]
        );
    }

    public function delete($id)
    {
        $student = Student::where('student_id', $id)->first();
        if($student){
            $student->delete();
            return response()->json(
                [
                    "message" => "DELETE Student with student_id " . $id . " Success",
                ]
            );
        }
        return response()->json(
            [
                "message" => "Student with student_id " . $id . " not found",
            ], 404
        );
    }

    public function post(Request $request){
        $student = new Student;
        $student->student_id = $request->student_id;
        $student->nim = $request->nim;
        $student->nama = $request->nama;
        $student->jurusan = $request->jurusan;
    
        $student->save();
    
        return response()->json(
                [
                    "message" => "Success",
                    "data" => $student,
                ]
            );
    }
    
     function put($id, Request $request)
    {
        $student = Student::where('student_id', $id)->first();
        if($student){
            $student->student_id = $request->student_id ? $request->student_id : $student->student_id;
            $student->nim = $request->nim ? $request->nim : $student->nim; 
            $student->nama = $request->nama ? $request->nama : $student->nama;
            $student->jurusan = $request->jurusan ? $request->jurusan : $student->jurusan;

            $student->save();
            return response()->json(
                [
                    "message" => "PUT Method Success",
                    "data" => $student,
                ]
            );
        }
        return response()->json(
            [
                "message" => "Student with student_id " . $id . " not found"
            ], 404
        );
    }
}
