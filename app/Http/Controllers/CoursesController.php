<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CoursesController extends Controller
{
    public function store(Request $request){
      
     $course = DB::table('courses')->where('course_id', '=', $request->input('course_id'))->first();
      if(is_null($course)){//Ensure the course does not already exist.
        DB::table('courses')->insert(
          ['course_id' => $request->input('course_id'), 'description' => $request->input('course_description'), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]
        );
      }
      return back();
    }
}
