@extends('layouts.bootTemplate')

@section('title')
  Questions
@stop

@section('content')
<div class="col-sm-2 sidenav"> 
  <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#AddQuestion">+Question</button>
  <!-- Modal -->
  <div id="AddQuestion" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Question </h4>
        </div>
        <div class="modal-body">
          <form id="addQuestionForm" role="form" method="post" action="/questions/store">
            <div class="form-group">
              <label for="type_id">Type</label>
              <select name="type_id" id="type_id" class="form_control">
                @foreach($types as $type)
                <option>
                  {{$type->type_id}}  
                </option>
                @endforeach
              </select>
              
              <label for="difficulty">Difficulty</label>
              <select name="difficulty" id="difficulty" class="form_control">
                <option>
                   Beginner
                </option>
                <option>
                   Intermediate
                </option>
                <option>
                   Advance
                </option>
              </select>
            </div>
            <div class="form-group">
              <label for="series_id">Series</label>
              <select name="series_id" id="series_id" class="form_control">
                @foreach($series as $serie)
                <option>
                  {{$serie->series_id}}  
                </option>
                @endforeach
              </select>
              <label for="course_id">Course</label>
              <select name ="course_id" id="course_id" class="form_control">
                @foreach($courses as $course)
                <option>
                  {{$course->course_id}}  
                </option>
                @endforeach
              </select>
              
            </div>
            <div class="form-group">
              <label for="description">Description</label>
              <textarea name="description" class="form-control"></textarea>
            </div>
            
            <div class="form-group">
              <label for="generator">Generator</label>
              <input type="hidden" name="generator" value="No Code Entered">
            </div>
            <div id="editor"></div>
            
            <button type="submit" class="btn btn-default" onclick="update()"> 
                Add Question
            </button>
          </form>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


 <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#courses">+Course</button>
  <!-- Modal -->
  <div id="courses" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Courses</h4>
        </div>
        <div class="modal-body">
          <form role="form" method="POST" action="/courses">
            <div class="form-group">
              <label for="course_id">Course ID</label>
              <input type="text" name="course_id" class="form-control">
            </div>
            <div class="form-group">
              <label for="course_description">Course Description</label>
              <textarea name="course_description" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-default"> 
                Add Course
            </button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
 
  <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#types">+Types</button>
  <!-- Modal -->
  <div id="types" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Types</h4>
        </div>
        <div class="modal-body">
          <form role="form" method="POST" action="/types">
            <div class="form-group">
              <label for="type_id">Type ID</label>
              <input type="text" name="type_id" class="form-control">
            </div>
            <div class="form-group">
              <label for="type_description">Type Description</label>
              <textarea name="type_description" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-default"> 
                Add Type
            </button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#series">+Series</button>
  <!-- Modal -->
  <div id="series" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Series</h4>
        </div>
        <div class="modal-body">
           <form role="form" method="POST" action="/series">
            <div class="form-group">
              <label for="type_id">Series ID</label>
              <input type="text" name="series_id" class="form-control">
            </div>
            <div class="form-group">
              <label for="series_note">Note</label>
              <textarea name="series_note" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-default"> 
                Add Series
            </button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
</div>
<div class="col-sm-10 text-left">
  <div class="table-responsive">
    <table class="table table-hover">
      <thead>
        <th>
          ID
        </th>
        <th>
          Series
        </th>
        <th>
          Description
        </th>
        <th>
          Generator
        </th>
        <th>
          Course
        </th>
        <th>
          Type
        </th>
        <th>
          Difficulty
        </th>
        <th>
          Semester Last Used
        </th>
        <th>
          Delete
        </th>
      </thead>
    @foreach($questions as $question)
        <tr>
          <td>{{$question->id}}</td>
          <td>{{$question->series_id}}</td>
          <td>{{$question->description}}</td>
           <!-- Add bootstrap modal to display generator's text -->
          <!-- Trigger the modal with a button -->
          <td>
            <button type="button" style="margin:0px" class="btn btn-info btn-xs" data-toggle="modal" data-target="#{{$question->id}}">View Code</button>
            <!-- Modal -->
            <div id="{{$question->id}}" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Question {{$question->id}} </h4>
                  </div>
                  <div class="modal-body">
                  <form role="form" method="POST" action="/questions/generator">
                    <input type="hidden" name="id" value="{{$question->id}}"></input>
                    <div class="form-group">
                      <!-- Display code with prism -->
                      <pre style="overflow:scroll; max-height:300px;"><code  class="language-php">{{$question->generator}}</code></pre>
                      <!-- Code submitted is the same as the code displayed -->
                      <textarea style="display:none" class="form-control" name="generator" readonly>{{$question->generator}}</textarea>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-default" name="submit" value="pdf"> 
                        Generate PDF
                      </button> 
                      <button type="submit" class="btn btn-default" name="submit" value="view_update"> 
                        Update Question
                      </button> 
                    </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
          </td>

         
          <td>{{$question->course_id}}</td>
          <td>{{$question->type_id}}</td>
          <td>{{$question->difficulty_id}}</td>
          <td>
            <?php $month = date("m", strtotime($question->last_used )); 
                  $year = date("Y", strtotime($question->last_used ));
                  if($month <= 5){
                    $semester = "Spring " . $year;
                  }
                  else if($month < 8){
                    $semester = "Summer " . $year;
                  }
                  else{
                    $semester = "Fall " . $year;
                  }
            
            ?>
            <?php echo $semester ?></td>
          <!-- Delete Questions -->
          <td>
              <form role="form" method="POST" action="/questions/delete">
                    <input type="hidden" name="id" value="{{$question->id}}"></input>
                    <!-- <button type="submit" style="margin:0px" class="close center-block" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
                    <button type="submit" style="margin:0px" class="btn btn-info btn-xs">Delete</button> 
              </form>

          </td>
        </tr> 
    @endforeach
    </table>
  </div>
</div>
@stop




@section('end_content')
<script>

  var editor = ace.edit("editor");
  editor.setTheme("ace/theme/merbivore");
  editor.getSession().setMode("ace/mode/php");
  editor.setOptions({
      maxLines: 10,
      minLines: 10
  });
</script>
<script>
  function update(){
    var editor = ace.edit("editor");
    var code = editor.getValue();
    
    //Create post request/form
    var form = document.getElementById("addQuestionForm");
    form.elements['generator'].value = code;
    form.submit();
  }
  
</script>  
@stop