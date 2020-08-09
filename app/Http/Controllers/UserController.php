<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;
use App\Profesor;

class UserController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('users.list');
    }
    
    public function getUsers(Request $request) {
        
        $users = [];
        for($i = 1; $i <= 2; $i++){
            $response = Http::get('https://reqres.in/api/users?page=' . $i);
            foreach ($response->json()["data"] as $user){
                $users[$user["id"]] = $user;
            }
        }
        if ($request->id != null && $request->id != "") {
            if (in_array($request->id, array_keys($users))) {
                $users = [$request->id => $users[$request->id]];
            }
            else{
                $users = false;
            }
        }
        
        return response()->json(["users" => $users]);
    }
    
    public function registerUser(Request $request){
        
        $teacher = new Profesor();
        $teacher->nombre = $request->first_name;
        $teacher->apellido = $request->last_name;
        $teacher->email = $request->email;
        
        if (!$teacher->save()) {
            return response()->json(["state" => 'Error']);
        }
        
        return response()->json(["state" => "OK"]);
    }

}
