@extends('layouts.bootTemplate')

@section('title')
  Edit Question {{$id}}
@stop

@section('sidenavleft')

@stop

@section('content')
<h1>
  Edit Question {{$id}}
</h1>
<div id="editor">{{$generator}}</div>
<form role="form" id="updateGenerator" method="POST" action="/questions/generator">
  <input type="hidden" name="id" value="{{$id}}"></input>
  <div class="form-group">
    <input type="hidden"  name="generator" value="default">
  </div>
  <div class="form-group">
    <button type="submit" class="btn btn-default" name="submit" value="update" onclick="update()"> 
      Update Question
    </button> 
  </div>
</form>

@stop



@section('end_content')
<script>

  var editor = ace.edit("editor");
  editor.setTheme("ace/theme/merbivore");
  editor.getSession().setMode("ace/mode/javascript");
  editor.setOptions({
      maxLines: 25
  });
</script>
<script>
  function update(){
    var editor = ace.edit("editor");
    var code = editor.getValue();
    
    //Create post request/form
    var form = document.getElementById("updateGenerator");
    form.elements['generator'].value = code;
    form.submit();
  }
  
</script>  
@stop
