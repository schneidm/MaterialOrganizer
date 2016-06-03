<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class QuestionsController extends Controller
{
    public function home(){
      $questions = DB::table('questions')->get();
      $series = DB::table('series')->get();
      $courses = DB::table('courses')->get();
      $types = DB::table('types')->get();
      $columns = DB::getSchemaBuilder()->getColumnListing('questions');
      return view('pages.questions', compact('questions', 'series', 'courses', 'types', 'columns'));
      
    }
  
    public function store(Request $request){
             
       DB::table('questions')->insertGetId(
          [ 'series_id' => $request->input('series_id'), 
           'generator' => $request->input('generator'), 
           'description' => $request->input('description'), 
           'course_id' => $request->input('course_id') , 
           //'topics' => strtoupper($request->input('topics')), 
           'difficulty' => $request->input('difficulty') ,
           'type_id' => $request->input('type_id'),
           'last_used' => date('Y-m-d H:i:s'), 
           'created_at' => date('Y-m-d H:i:s'), 
           'updated_at' => date('Y-m-d H:i:s')]);
        
      return redirect('/questions');
    }
  
    public function generator(Request $request){
      if($request->input('submit') == 'pdf'){
        eval($request->input('generator'));
        $html = '<h1>Question</h1>' . $question . '<br><hr><br><h1>Answer</h1>' . $answer .'<br><hr><br><h1>Notes</h1>' . $note;
        $pdf = PDF::loadHTML($html);
        return $pdf->stream();
      }
      else if($request->input('submit') == 'view_update'){
       /* DB::table('questions')->
          where('id', $request->input('id'))->
          update(['generator' => $request->input('generator')]);*/
        $id = $request->input('id');
        $generator = $request->input('generator');
        
        return view('pages.question_editor', compact('id', 'generator'));
      }
      else if($request->input('submit') == 'update'){
        DB::table('questions')->
          where('id', $request->input('id'))->
          update(['generator' => $request->input('generator')]);
        return $this->home();
      }
      else{
        return view('pages.assignmentcreator');
      }
       
      
    }
  
    public function delete(Request $request){
      DB::table('questions')
        ->where('id', '=', $request->input('id'))
        ->delete();
      return redirect('/questions');
    }
  
}
