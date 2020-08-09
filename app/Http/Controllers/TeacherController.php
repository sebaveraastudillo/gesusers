<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profesor;

class TeacherController extends Controller
{
    public function index(){
        
        return view('teachers.list');
    }
    
    public function getTeachers(){
        $teachers = Profesor::all();
       
        return response()->json(["teachers" => $teachers]);
    }
    
    public function deleteTeacher(Request $request){
        if (!Profesor::find($request->id)->delete()) {
            return response()->json(["status" => "Error"]);
        }
        
        return response()->json(["status" => "OK"]);
    }
}
