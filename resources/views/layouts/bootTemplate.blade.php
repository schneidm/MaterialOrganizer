<!-- This template comes from w3Schools' bootstrap tutorial: http://www.w3schools.com/bootstrap/bootstrap_templates.asp
    Webpage Template
-->

<!DOCTYPE html>
<html lang="en">

<head>
  <title>@yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
  <!-- Ace text editor Site: https://ace.c9.io/#nav=embedding GitHub: https://github.com/ajaxorg/ace-builds --> 
  <script src="{{ URL::asset('/assets/src-min/ace.js') }}" type="text/javascript" charset="utf-8"></script>

  <!-- Prism CSS -->
  <link rel="stylesheet" href="{{ URL::asset('/assets/prism/prism.css') }}">
  <script src="{{ URL::asset('/assets/prism/prism.js') }}" type="text/javascript" charset="utf-8"></script>
  
  @yield('links')
  
  <style>
    .ace_editor{
      text-align:left;
    }
    
    /* Remove the navbar's default margin-bottom and rounded borders */
    button{
      margin-top:5px;
      margin-bottom:5px;
    }
    label{
      padding-left:5px;
    }
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    
    .row.content {
      height: 450px;
      
    }
    /* Set gray background color and 100% height */
    
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    /* Set black background color, white text and some padding */
    
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    /* On small screens, set height to 'auto' for sidenav and grid */
    
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {
        height: auto;
      }
    }
    
    .checkbox-inline,
    .checkbox-inline + .checkbox-inline,
    .checkbox-inline + .radio-inline,
    .radio-inline,
    .radio-inline + .radio-inline,
    .radio-inline + .checkbox-inline {
        margin-left: 0;
        margin-right: 10px;
    }

    .checkbox-inline:last-child,
    .radio-inline:last-child {
        margin-right: 0;
    }
    
    
   
    
    @yield('style')
  </style>
</head>

<body>

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
        <a class="navbar-brand" href="#">Logo</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="/">Home</a></li>
          <li><a href="/assignmentcreator">Assignment Creator</a></li>
          <li><a href="/questions">Questions</a></li>
          <li><a href="/tutorials">Tutorials</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid text-center">
    <div class="row content">
        @yield('content')
    </div>
  </div>

  <footer class="container-fluid text-center">
    <p>Copyright Michael J. Schneider</p>
  </footer>
  @yield('end_content')
</body>

</html>