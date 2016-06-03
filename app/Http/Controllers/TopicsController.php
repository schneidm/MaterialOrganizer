<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Schema;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TopicsController extends Controller
{
    public function store(Request $request){
             
     $topic = DB::table('topics')->where('topic_id', '=', $request->input('topic_id'))->first();
      if(is_null($topic)){//Ensure the type does not already exist.
        DB::table('topics')->insert(
          ['topic_id' => $request->input('topic_id'), 'description' => $request->input('topic_description'), 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]
        );
        
        
        $update = 'ALTER TABLE questions ADD COLUMN ' . $request->input('topic_id') . ' bool default 0;';
        //Add new topic to the questions table
        DB::statement( $update);
        /*Schema::table('questions', function($table){
            $table->boolean($request->input('topic_id'))->default(false);
        });*/
      }
      return redirect('\questions');
    }
}
