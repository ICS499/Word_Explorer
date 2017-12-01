<?PHP
session_start();
require('session_validation.php');
header("Location: explorer.php");
?>
<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="styles/main_style.css" type="text/css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="styles/custom_nav.css" type="text/css">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <title>Word Explorer</title>
  <body>
    <?PHP
    echo getTopNav();
    ?>
     <div class="divTitle" align="center">
<!--        <h1>Select An Option</h1>-->
    </div>
    <br>
    <div align="center">
    <div class="container">
        <div class="container">
            <img src="./images/WordExplorerSpace.jpg " class="img-rounded img-responsive" alt="Cinque Terre" width=auto height=auto onclick="location.href='explorer.php';" >
        </div>
<!--        <h1>Click Image to Explore!</h1>-->
        <p><a href="explorer.php">  <h1>Click Image to Explore!</h1></a></p>

<!--        <div class="btn-group-vertical">-->
<!--            <button type="button" class="btn btn-primary btn-lg" onclick="location.href='explorer.php';">Word Explorer </button>-->
<!--            <button type="button" class="btn btn-primary btn-lg" onclick="location.href='list.php';">List All Words</button>-->
<!--            <button type="button" class="btn btn-primary btn-lg" onclick="location.href='add_words.php';">Add a Word</button>-->
<!--        </div>-->
    </div>
    </div>
    <script>
        function process() {
            var form = document.getElementById('myform');
            var elements = form.elements;
            var values = [];
            values.push(encodeURIComponent(elements[0].name) + '=' + encodeURIComponent(elements[0].value));
            form.action += '?' + values.join('&');
        }
    </script>

    <div class="footer">
        <p>@ School of India for Languages and Culture (SILC)</p>
    </div>
  </body>
</html>
