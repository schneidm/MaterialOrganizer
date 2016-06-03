<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Assignment</title>
        <style>
          .question{page-break-inside:avoid;}
          .page-break {page-break-after: always;}
        </style>
    </head>
    <body>
      
        <?php 
         echo $questions;
      ?>
      <div class="page-break"></div>
      <h1 style="text-align:center;">
        Answers
      </h1>
      <?php
         echo $answers;
        ?>
    </body>
</html>