<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <title>Word Explorer</title>
  <body>
    <?PHP
    session_start();
    require('session_validation.php');
    ?>
    <?PHP echo getTopNav(); ?>
    <div class="divTitle" align="center">
      <font class="font">Rebus Puzzle</font>
    </div>
    <br>
    <div align="center">
        <form id ="myform" action="explorer.php" method="post" onsubmit="process()">
            <input type="submit" value="Explorer">
        </form>
        <form id ="myform" action="list.php" method="post" onsubmit="process()">
            <input type="submit" value="List All Words">
        </form>
        <form id ="add_words" action="add_words.php" method="post" onsubmit="process()">
            <input type="submit" value="Add a Word">
        </form>
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
  </body>
</html>
