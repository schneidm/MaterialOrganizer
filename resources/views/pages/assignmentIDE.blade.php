@extends('layouts.bootTemplate')

@section('title')
  Assignment Creator IDE
@stop

@section('links')
  <!-- Latest Sortable -->
  <script src="{{ URL::asset('/assets/jquery-sortable-min.js') }}" type="text/javascript" charset="utf-8"></script>

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
@stop

@section('content')
<div class="col-sm-4 sidenav">
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
       <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#topics" data-parent="#queryOptions">
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
                <label  class="btn btn-primary btn-block">
                   <input  type="checkbox" autocomplete="off" id="course_<?php echo $counter ?>" name ="course_<?php echo $counter ?>"> {{$course->course_id}}
                </label>
              </div>
              <?php $counter++;?>
             @endforeach
          </div>
        </div>
        
        <!-- Types Panel -->
        <div id="types" class="panel-collapse collapse">
          <div class="panel-body">
             <?php $counter = 1;?>
             @foreach($types as $type)
             <div style="width:48%; float:left; margin:2px;" class="btn-group" data-toggle="buttons">
                <label  class="btn btn-primary btn-block">
                   <input  type="checkbox" autocomplete="off" id="type_<?php echo $counter ?>" name ="type_<?php echo $counter ?>"> {{$type->type_id}}
                </label>
              </div>
              <?php $counter++;?>
             @endforeach
          </div>
        </div>
        
        <!-- Difficulty Panel -->
        <div id="difficulty" class="panel-collapse collapse">
          <div class="panel-body">
             <div style="width:48%; float:left; margin:2px;" class="btn-group" data-toggle="buttons">
                <label  class="btn btn-primary btn-block">
                   <input type="checkbox" name ="difficulty_1" id ="difficulty_1" value="Beginner">Beginner 
                </label>
            </div>
            <div style="width:48%; float:left; margin:2px;" class="btn-group" data-toggle="buttons">
               <label  class="btn btn-primary btn-block">
                   <input type="checkbox" name ="difficulty_2" id ="difficulty_2" value="Intermediate">Intermediate
               </label>
            </div>
            <div style="width:48%; float:left; margin:2px;" class="btn-group" data-toggle="buttons">
               <label  class="btn btn-primary btn-block">
                   <input type="checkbox" name ="difficulty_3" id ="difficulty_3" value="Advance">Advance 
               </label>
            </div>
          </div>
        </div>
        
        
      </div>
    </div>
 
  
  
 <!-- Questions Gathered here -->
  <ul id="questions">
    <li>One</li>
  </ul>
</div>
<div class="col-sm-8 text-left">
  <!-- Create Document Here -->
 
</div>
@stop

@section('end_content')
 <script>
    $( "#questions" ).empty();
 </script>
@stop