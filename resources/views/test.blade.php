@extends('layouts.bootTemplate')

@section('title')
  Test
@stop

@section('sidenavleft')
 
@stop

@section('style')

.page-break {
    page-break-after: always;
}
.question{page-break-inside:avoid};

@stop

@section('content')
 
   {{ $questions }}
   <div class="page-break"></div>
    {{ $answers }}
  
@stop

@section('end_content')
 
@stop