@extends('layouts.bootTemplate')

@section('title')
  Assignment Creator
@stop

@section('links')
  <link href='https://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>
@stop

@section('style')
  
  #title{
    text-align:center;
    border-radius:15px;
    border: 3px solid grey;
    padding:5px;
    font-family: 'Ubuntu', sans-serif;
    font-size:2em;
    margin-top:5px;
    margin-bottom:10px;
  }

   label.checkbox-inline{
      width:175px;
    }
  
    .questionBox{
      height:300px;
      overflow-y: scroll;
      overflow-x: hidden;
    }

  .vcenter {
    display: flex;
    align-items: center;
  }
@stop

@section('content')
<div class="col-sm-2 sidenav">
</div>
<div class="col-sm-8 text-left">
  
  <div id="title">
    Create an Assignment
  </div>
  <div class="questionBox">
    <div class="row">
      <div class="col-sm-2 text-left">
      </div>
      <div class="col-sm-8 text-left">
          <form role="form"  method="post" action="/assignmentcreator/create">
            <div class="form-group row">
              <label class="col-sm-3">Type</label>
              <div class="col-sm-9">
                <label class="checkbox-inline"><input type="checkbox" name ="type_0" id="type_0" value="All" onchange="allButtonClicked('type')">All</label>
                <?php $counter = 1;?>
                @foreach($types as $type)
                  <label class="checkbox-inline" id="label_type_<?php echo $counter ?>"><input type="checkbox" name ="type_<?php echo $counter ?>" id ="type_<?php echo $counter ?>" value="{{$type->type_id}}">{{$type->type_id}}</label>
                  <?php $counter++;?>
                @endforeach
                <input type="hidden" name="numTypes" value= "<?php echo $counter ?>">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3">Difficulty</label>
              <div class="col-sm-9">
                <label class="checkbox-inline" id ="label_difficulty_0"><input type="checkbox" name ="difficulty_0" id ="difficulty_0" value="All" onchange="allButtonClicked('difficulty')">All</label>
                <label class="checkbox-inline" id ="label_difficulty_1"><input type="checkbox" name ="difficulty_1" id ="difficulty_1" value="Beginner">Beginner</label>
                <label class="checkbox-inline" id ="label_difficulty_2"><input type="checkbox" name ="difficulty_2" id ="difficulty_2" value="Intermediate">Intermediate</label>
                <label class="checkbox-inline" id ="label_difficulty_3"><input type="checkbox" name ="difficulty_3" id ="difficulty_3" value="Advance">Advance</label>
                <input type="hidden" name="numDifficulty" value= "3">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3">Series</label>
              <div class="col-sm-9">
                <label class="checkbox-inline"><input type="checkbox" name ="series_0" id="series_0" value="All" onchange="allButtonClicked('series')">All</label>
                <?php $counter = 1;?>
                @foreach($series as $serie)
                  <label  class="checkbox-inline" id ="label_series_<?php echo $counter ?>"><input type="checkbox" name ="series_<?php echo $counter ?>" id ="series_<?php echo $counter ?>" value="{{$serie->series_id}}">{{$serie->series_id}} </label>
                  <?php $counter++;?>
                @endforeach
                  <input type="hidden" name="numSeries" value= "<?php echo $counter ?>">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3">Course</label>
              <div class="col-sm-9">
                <label class="checkbox-inline"><input type="checkbox" name ="course_0" id="course_0" value="All" onchange="allButtonClicked('course')">All</label>
                <?php $counter = 1;?>
                @foreach($courses as $course)
                  <label class="checkbox-inline" id ="label_course_<?php echo $counter ?>"><input type="checkbox"  id ="course_<?php echo $counter ?>" name ="course_<?php echo $counter ?>" value="{{$course->course_id}}">{{$course->course_id}} </label>
                  <?php $counter++;?>
                @endforeach
                <input type="hidden" name="numCourses" value= "<?php echo $counter ?>">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3">Topics</label>
              <div class="col-sm-9">
                <label class="checkbox-inline"><input type="checkbox" name ="topic_0" id="topic_0" value="All" onchange="allButtonClicked('topic')">All</label>
                <?php $counter = 1;?>
                @foreach($topics as $topic)
                  <label class="checkbox-inline" id ="label_topic_<?php echo $counter ?>"><input type="checkbox"  id ="topic_<?php echo $counter ?>" name ="topic_<?php echo $counter ?>" value="{{$topic->topic_id}}">{{$topic->topic_id}} </label>
                  <?php $counter++;?>
                @endforeach
                <input type="hidden" name="numTopics" value= "<?php echo $counter ?>">
              </div>
            </div>
            <div class="form-group row vcenter">
              <label class="col-sm-3">Last Used</label>
              <div  class="col-sm-9 ">
                <input class="form-control" type="date" name="last_used" >
              </div>
            </div>
            <div class="form-group row vcenter">
              <label class="col-sm-3">Number of Questions</label>
              <div  class="col-sm-9 ">
                <input class="form-control" type="number" name="numQuestions" value="1" min="1" max="{{$numQuestions}}">
              </div>
            </div>
            <button  type="submit" class="btn btn-primary btn-block">Create Assignment</button>
        </form>
      </div>
      <div class="col-sm-2 text-left">
      </div>
    </div>
  </div>
</div>
<div class="col-sm-2 sidenav">
     
</div>
@stop

@section('end_content')
<script>
  function allButtonClicked(name){
    /* Disable Other Types */
    if(document.getElementById(name +'_0').checked){
      var counter = 1;
      while(document.getElementById(name + '_' + counter)){
        document.getElementById(name + '_' + counter).disabled = true;
        document.getElementById(name + '_' + counter).checked = false;
        document.getElementById('label_'+ name + '_' + counter).className = "checkbox-inline disabled";
        counter++;
      }
    }
    /* Enable Other Types */
    else{
      var counter = 1;
      while(document.getElementById(name +'_' + counter)){
        document.getElementById(name +'_' + counter).disabled = false;
        document.getElementById('label_' + name + '_' + counter).className = "checkbox-inline";
        counter++;
      }
    }
  }
  
 $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
})
</script>
@stop