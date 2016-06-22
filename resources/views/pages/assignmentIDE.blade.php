@extends('layouts.bootTemplate')

@section('title')
  Assignment Creator IDE
@stop

@section('links')
  <!-- Latest Sortable --><!-- {{ URL::asset('/assets/jquery-sortable-min.js') }} -->
  <script src="http://rubaxa.github.io/Sortable/Sortable.js" type="text/javascript" charset="utf-8"></script>

  <script src="{{ URL::asset('/assets/ckeditor/ckeditor.js') }}" type="text/javascript" charset="utf-8"></script>
@stop

@section('style')
  #queryOptions{
    width:90%;
    margin:0 auto;
  }
  .panel-body{
    height:130px;
    overflow-y:scroll;
  }
  
  .choice{
    background-color: #ACE1F2;
  }
  
 .unselected{
    background-color: #ACE1F2;
    height:20px;
    width:20px;
    float:left;
    margin-left:10px;
  }

  .selected{
    background-color: #286090;
    height:20px;
    width:20px;
    float:left;
  }

  .left{
    float:left;
    margin-left:3px;
    
  }
  .clear{
    clear:both;
  }

  .selectors{
    width:58%;
    margin: 10px auto 10px auto;
  }

  .list-group{
    margin-top:10px;
    overflow-y:scroll;
    max-height:350px
  }

  <!-- Sortable list css-->
  body.dragging, body.dragging * {
    cursor: move !important;
  }

  .dragged {
    position: absolute;
    opacity: 0.5;
    z-index: 2000;
  }





@stop

@section('content')
<div class="col-sm-7 sidenav">
     <div class="btn-group">
       <button class="btn btn-primary"  data-toggle="collapse"  data-target="#courses" data-parent="#queryOptions" >
          Course
       </button> 
       <button class="btn btn-primary" data-toggle="collapse"  data-target="#types" data-parent="#queryOptions">
          Type
       </button>
       <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#difficulty" data-parent="#queryOptions" >
          Difficulty
       </button> 
       <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#topics" data-parent="#queryOptions">
          Topic
       </button> 
       <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#series" data-parent="#queryOptions">
          Series
       </button> 
       <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#date" data-parent="#queryOptions">
          Date
       </button> 
     </div>
     
    <div class="panel-group" id="queryOptions">
      <div class="panel panel-default">
        <!-- Courses Panel -->
        <div id="courses" class="panel-collapse collapse">
          <div class="panel-body">
             <?php $counter = 1;?>
             @foreach($courses as $course)
             <div style="width:48%; float:left; margin:2px;" class="btn-group" data-toggle="buttons">
                <label  class="choice btn btn-primary btn-block">
                   <input  type="checkbox" onchange="change('course_<?php echo $counter ?>' ,'course_id', '{{$course->course_id}}')" autocomplete="off" id="course_<?php echo $counter ?>" name ="course_<?php echo $counter ?>"> {{$course->course_id}}
                </label>
              </div>
              <?php $counter++;?>
             @endforeach
            <div class="clear">
               
            </div>
            <div class="selectors">
              <div class="selected"></div> 
              <p class="left">
               Selected
              </p>
              <div class="unselected"></div> 
              <p class="left">
               Unselected
              </p>  
            </div>
          </div>
          
           
        </div>
        
        <!-- Types Panel -->
        <div id="types" class="panel-collapse collapse">
          <div class="panel-body">
             <?php $counter = 1;?>
             @foreach($types as $type)
             <div style="width:48%; float:left; margin:2px;" class="btn-group" data-toggle="buttons">
                <label  class="choice btn btn-primary btn-block">
                   <input  type="checkbox" autocomplete="off" onchange="change('type_<?php echo $counter ?>' ,'type_id', '{{$type->type_id}}')"  id="type_<?php echo $counter ?>" name ="type_<?php echo $counter ?>"> {{$type->type_id}}
                </label>
              </div>
              <?php $counter++;?>
             @endforeach
            <div class="clear">
               
            </div>
            <div class="selectors">
              <div class="selected"></div> 
              <p class="left">
               Selected
              </p>
              <div class="unselected"></div> 
              <p class="left">
               Unselected
              </p>  
            </div>
          </div>
        </div>
        
        <!-- Difficulty Panel -->
        <div id="difficulty" class="panel-collapse collapse">
          <div class="panel-body">
             <div style="width:48%; float:left; margin:2px;" class="btn-group" data-toggle="buttons">
                <label  class="choice btn btn-primary btn-block">
                   <input type="checkbox" name ="difficulty_1" id ="difficulty_1" onchange="change('difficulty_1' ,'difficulty_id', 'Beginner')" value="Beginner">Beginner 
                </label>
            </div>
            <div style="width:48%; float:left; margin:2px;" class="btn-group" data-toggle="buttons">
               <label  class="choice btn btn-primary btn-block">
                   <input type="checkbox" name ="difficulty_2" id ="difficulty_2" onchange="change('difficulty_2' ,'difficulty_id', 'Intermediate')" value="Intermediate">Intermediate
               </label>
            </div>
            <div style="width:48%; float:left; margin:2px;" class="btn-group" data-toggle="buttons">
               <label  class="choice btn btn-primary btn-block">
                   <input type="checkbox" name ="difficulty_3" id ="difficulty_3" onchange="change('difficulty_3' ,'difficulty_id', 'Advance')" value="Advance">Advance 
               </label>
            </div>
            <div class="clear">
               
            </div>
            <div class="selectors">
              <div class="selected"></div> 
              <p class="left">
               Selected
              </p>
              <div class="unselected"></div> 
              <p class="left">
               Unselected
              </p>  
            </div>
          </div>
        </div>
        
        <!-- Topic Panel -->
        <div id="topics" class="panel-collapse collapse">
          <div class="panel-body">
             <?php $counter = 1;?>
             @foreach($topics as $topic)
             <div style="width:48%; float:left; margin:2px;" class="btn-group" data-toggle="buttons">
                <label  class="choice btn btn-primary btn-block">
                   <input  type="checkbox" autocomplete="off" id="topic_<?php echo $counter ?>" onchange="change('topic_<?php echo $counter ?>' ,'{{$topic->topic_id}}', '1')"  name ="topic_<?php echo $counter ?>"> {{$topic->topic_id}}
                </label>
              </div>
              <?php $counter++;?>
             @endforeach
            <div class="clear">
               
            </div>
            <div class="selectors">
              <div class="selected"></div> 
              <p class="left">
               Selected
              </p>
              <div class="unselected"></div> 
              <p class="left">
               Unselected
              </p>  
            </div>
          </div>
        </div>
        
        <!-- Series Panel -->
        <div id="series" class="panel-collapse collapse">
          <div class="panel-body">
             <?php $counter = 1;?>
             @foreach($series as $serie)
             <div style="width:48%; float:left; margin:2px;" class="btn-group" data-toggle="buttons">
                <label  class="choice btn btn-primary btn-block">
                   <input  type="checkbox" autocomplete="off" id="serie_<?php echo $counter ?>" name ="serie_<?php echo $counter ?>"> {{$serie->series_id}}
                </label>
              </div>
              <?php $counter++;?>
             @endforeach
            <div class="clear">
               
            </div>
            <div class="selectors">
              <div class="selected"></div> 
              <p class="left">
               Selected
              </p>
              <div class="unselected"></div> 
              <p class="left">
               Unselected
              </p>  
            </div>
          </div>
        </div>
        
        <!-- Date Panel -->
        <div id="date" class="panel-collapse collapse">
          <div class="panel-body">
             <label> Last Date Used: </label><input type="date" name="last_used" id="last_used">
          </div>
        </div>
        
      </div>
    </div>
 
  
  
 <!-- Questions Gathered here -->
  <ol id="questionPool" class="list-group">
    
  </ol>
</div>
<div class="col-sm-5 text-left">
  <!-- Create Document Here -->
  <!--TODO: Convert this to be a form so it submits each of the options as a question -->
  <ol id="assignment" class="list-group">
    <li class="list-group-item" id="8"><span class="glyphicon glyphicon-move" aria-hidden="true"></span> Test 1 <i class="js-remove">✖</i></li>
    <li class="list-group-item" id="23"><span class="glyphicon glyphicon-move" aria-hidden="true"></span> Test 2 <i class="js-remove">✖</i></li>
  </ol>
  <button type="button" class="btn btn-primary btn-lg btn-block" onclick="createAssignment()">Create Assignment</button>
</div>
@stop

@section('end_content')

 <script>  
  
   /*
    Code to make lists sortable
   */
   var el = document.getElementById('questionPool');
   var sortableQuestions = Sortable.create(el, {group: {name: 'questions', put: false, pull: ['clone'] }, animation: 100 });
   
   var el = document.getElementById('assignment');
   var sortableQuestions = Sortable.create(el, {
       group: {name: 'questions' }, 
       handle: '.glyphicon-move', 
       filter: '.js-remove',
       animation: 100,
       onFilter: function (evt) {
        evt.item.parentNode.removeChild(evt.item);
       }
      });
   
   /*
    Code to submit/create assignment
   */
   
   function createAssignment(){
     /* Create a form for the post request (the jquery post method returns to the same page instead of redirecting
                                             to a new page!) 
      */
      var assignmentForm = jQuery('<form>', {
          'action': '/assignmentcreator/create',
          'method': 'post'
        });
     var assignmentList ="";
      $( "#assignment li" ).each(function( index ) {//Iterate the list in order to preserve the sorted order
         assignmentList += "," + $(this).attr('id');//Each list items id, refers to the question's primary key, id.
      });
     
      assignmentList = assignmentList.slice(1);//Remove the first comma

       assignmentForm.append(jQuery('<input>', {
            'name': 'questions',
            'value': assignmentList,
            'type': 'hidden'
        }));
     
      assignmentForm.submit();
   }
   
   /*
    Code to populate questions list
   */
   
   <?php $jsArray = json_encode($questions);
      echo "var question_array = ". $jsArray . ";\n";
   ?>
   var questionList =[];
   for(var i = 0; i < question_array.length; i++){
     $( "#questionPool" ).append('<li id="' + question_array[i]["id"]  + '"class="list-group-item"><span class="glyphicon glyphicon-move" aria-hidden="true"></span>  ' + question_array[i]["example"] + '</li>');
   }
   
   
   //Run when checkbox changes.  If clicked, add the values to the list, if unchecked remove the values.
   function change(id, key, value){
      if($("#" + id).is(":checked")){
        add(key, value);
      }
     else{
       remove(key, value);
     }
     $( "#questionPool" ).empty();
     for(var i = 0; i < questionList.length; i++){
         $( "#questionPool" ).append('<li id="' + question_array[i]["id"]  + '" class="list-group-item"><span class="glyphicon glyphicon-move" aria-hidden="true"></span>  ' + questionList[i]["example"] + '</li>');
     }
   }
   
   function add(key, value){
     for(var i = 0; i < question_array.length; i++){
       if(question_array[i][key] == value){
         questionList.push(question_array[i]);
       }       
     }
   }
   
   function remove(key, value){
    
     for(var i = 0; i < questionList.length; i++){
       if(questionList[i][key] == value){
         questionList.splice(i, 1);
       }       
     }
   }
   
    
 </script>
@stop