<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AssignmentCreatorController extends Controller
{
    public function home(){
      $questions = DB::table('questions')->get();
      $series = DB::table('series')->get();
      $courses = DB::table('courses')->get();
      $types = DB::table('types')->get();
      $topics = DB::table('topics')->get();
      //return view('pages.assignmentcreator', compact('numQuestions', 'series', 'courses', 'types', 'topics'));
      return view('pages.assignmentIDE', compact('questions', 'series', 'courses', 'types', 'topics'));
    }
  
    public function create(Request $request){
        $sql = 'SELECT * FROM questions ';
        $where = null;
        
        /* 
           Add any type restrictions to the where clause.  If the All
           Button has been selected (type_0) then don't bother adding
           any restrictions
        */
      
        if(!$request->has('type_0')){
          $where = $this->addWhereClause($request, $where, 'type', $request->input('numTypes'));
        }
       
      
        /* 
           Add any difficulty restrictions to the where clause.  If the All
           Button has been selected (difficulty_0) then don't bother adding
           any restrictions
        */
      
        if(!$request->has('difficulty_0')){
          $where = $this->addWhereClause($request, $where, 'difficulty', $request->input('numDifficulty'));
        }
      
        /* 
           Add any series restrictions to the where clause.  If the All
           Button has been selected (series_0) then don't bother adding
           any restrictions
        */
      
        if(!$request->has('series_0')){
          $where = $this->addWhereClause($request, $where, 'series', $request->input('numSeries'));
        }
      
        /* 
           Add any courses restrictions to the where clause.  If the All
           Button has been selected (course_0) then don't bother adding
           any restrictions
        */
      
        if(!$request->has('course_0')){
          $where = $this->addWhereClause($request, $where, 'course', $request->input('numCourses'));
        }
      
        /* 
           Add any topic restrictions to the where clause.  If the All
           Button has been selected (topics_0) then don't bother adding
           any restrictions
        */
      
        if(!$request->has('topic_0')){
          $where = $this->addWhereClauseTopic($request, $where, 'topic', $request->input('numTopics'));
        }
      
        if($request->has('last_used')){
          if(!is_null($where)){
            $where .= " AND ";
          }
          $where .= " last_used < '" . $request->input('last_used') . "'";
        }

        if(strlen($where) != 0){
          $sql .= " where " . $where;  
        }
        
        $questions = DB::select(DB::raw($sql));
      
        $style = '<style>
                .question{page-break-inside:avoid};
                </style';
        $questionHTML = '<div class="question"><p>Question'.  1 . '</p>' . '<h1>STuff</h1>' . '</div> <br><hr><br>'; 

        $content = $this->generatePDF($questions, $request->input('numQuestions') );
        $questions = $content[0];
        $answers = $content[1];
        $pdf = PDF::loadView('pages.test', compact('questions', 'answers'));
        return $pdf->stream();
      
        //return $this->generatePDF($questions, $request->input('numQuestions') );
       // $sql = $html;
       // return view('pages.test', compact('sql'));
      
    }
  
    private function addWhereClause(Request $request, $where, $column, $counter){
          $or = null;
          for($i = 1; $i <= $counter; $i++){
            if($request->has($column . '_' . $i)){
              $or .= $column . "_id = \"" . $request->input($column . '_' . $i) . "\" OR ";
            }
          }
          if(!is_null($or)){
            $or = substr($or, 0, -3);
            $or = "(" . $or . ")";
            if(!is_null($where)){
              $or = " AND " . $or;
            }
          }
          $where .= $or;
        return $where;
    }
  
    private function addWhereClauseTopic(Request $request, $where, $column, $counter){
          $or = null;
          for($i = 1; $i <= $counter; $i++){
            if($request->has($column . '_' . $i)){
              $or .=  $request->input($column . '_' . $i) . " = 1 OR ";
            }
          }
          if(!is_null($or)){
            $or = substr($or, 0, -3);
            $or = "(" . $or . ")";
            if(!is_null($where)){
              $or = " AND " . $or;
            }
          }
          $where .= $or;
        return $where;
    }
  
    private function generatePDF($questions, $numQuestions)
    {

        $questionIDs = DB::table('questions')->lists('id');
        
        $counter = 1;
        $choice = rand(0, count($questionIDs) - 1);
        $questionsUsed = array($choice);//Keep track of indexes used
        $question = DB::table('questions')->where('id', $questionIDs[$choice])->first();//Grab first question
      
        eval($question->generator);
        $questionHTML = '<div class="question"><p>'. $counter  . '. ' . $question . '</p></div> <br><br>'; 
        $answerHTML = '<div class="question"><p> Answer ' . $counter  . '</p>' . $answer .'<br><hr><br><p>Note' . $counter . '</p>' . $note  . '</div> <br><hr><br>';
        
        while($counter < $numQuestions){
          $choice = rand(0, count($questionIDs) - 1);
          if(!in_array($choice, $questionsUsed)){//Check if index has been used
            $questionsUsed[] = $choice; 
            $question = DB::table('questions')->where('id', $questionIDs[$choice])->first();
            $counter++;
            eval($question->generator);
            $questionHTML .= '<div class="question"><p> '. $counter  . '. ' . $question . '</p></div> <br><br>'; 
            $answerHTML .= '<div class="question"><p>Answer ' . $counter . '</p>' . $answer .'<br><hr><br><p>Note' . $counter . '</p>' . $note  . '</div> <br><hr><br>';
        
          }
        }
      
        $content = array($questionHTML, $answerHTML);
        
        return $content;
    }
  
   public function ide(Request $request){
     return $request->all();
   }
   
}
