<?PHP
session_start();
require_once('db_configuration.php');
require_once('create_puzzle.php');
require_once('add_words_process.php');
require('InsertUtil.php');
require('session_validation.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/main_style.css" type="text/css">
    <link rel="stylesheet" href="styles/cards.css" type="text/css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="styles/custom_nav.css" type="text/css">
    <link rel="stylesheet" href="styles/explorer.css" type="text/css">
</head>
<title>Word Explorer Edit Words</title>
<body>
<?PHP
echo getTopNav();

?>

<div class="footer">
    <p>@ School of India for Languages and Culture (SILC)</p>
</div>

<script type="text/javascript" src="js/explorerFunctions.js"></script>
</body>
</html>
