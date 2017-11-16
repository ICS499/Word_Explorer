<!DOCTYPE html>
<html>
<head>
    <?PHP
    require_once('db_configuration.php');
    require_once('create_puzzle.php');
    require_once('add_words_process.php');
    require('InsertUtil.php');
    session_start();
    require('session_validation.php');
    ?>
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
    <style>
        .selected {
            padding-left: 10px;
            background-color: #2bb0dc;
            width: 100%;
        }
        .topic-choice {
            width: 100%;
        }
        .list-header {
            margin: 10px;
        }
        .flow {
            display: inline-block;
            vertical-align: top;
        }
        .left-content {
            height: 500px;
            width: 300px;
        }
        #word-image {
            max-width: 600px;
            max-height: 600px;
        }
        #topic-list {
            background-color: #FFFFFF;
            margin: 10px;
            border: 2px solid #888;
            max-height: 300px;
            width: 100%;
            overflow-y: auto;
        }
        .topic-choice {
            border: 2px solid #888;
            font-size: 30px;
            padding: 2px;
            margin: 0px;
        }
        #mode-list {
            background-color: #FFFFFF;
            margin: 10px;
            border: 2px solid #888;
            max-height: 300px;
            width: 100%;
        }
        .mode-choice {
            border: 2px solid #888;
            font-size: 30px;
            padding: 2px;
            margin: 0px;
        }
        ul, li {
            list-style: none;
            padding: 0px;
            margin: 0px;
        }
        #myCarousel {
            width:auto;
            height: auto;
            margin: 20px;
            background-color: #FFFFFF;
        }
        .carousel-border {
            border: 3px solid #2bb0dc;
        }
        .center-block {
            vertical-align: middle;

            display: block;
            width: 400px;
            height: 400px;
            margin-top: 50px;

            margin-left: auto;
            margin-right: auto;
        }
        .carousel-inner {
            vertical-align: middle;
            width: 800px;
            height: 100%;
            margin: auto;
        }
        .carousel-control {
            width: 5% !important;
        }
    </style>
</head>
<title>Word Explorer Edit Words</title>
<body>
<?PHP
echo getTopNav();

// Card objects are used in the carousel
class Card {
    public $topic = "";
    public $telugu_word = "";
    public $english_word = "";
    public $telugu_in_english = "";
    public $english_in_telugu = "";
    public $audio_name = "";
    public $description = "";
    public $notes = "";
    public $image_name = "";
}

// Get the available topics
$sqlQueryTopics = 'SELECT DISTINCT topic FROM words';// switched to words table need to filter still
$resultTopics = run_sql($sqlQueryTopics);

// Set to first topic, if no topic is selected
if (!(isset($_GET['topic']))) {
    foreach ($resultTopics as $row) {
        $_GET['topic'] = $row['topic'];
        break;
    }
}

// Get the words related to the topic
function IsNullOrEmptyString($question){
    return (!isset($question) || trim($question)==='');
}
$topic = $_GET['topic'];
$sqlQueryWords = 'SELECT * FROM words WHERE topic = \'' . $topic . '\';';
$result = run_sql($sqlQueryWords);
$cards = array();
foreach( $result as $row){
    $newCard = new Card();
    $newCard->topic = $row["Topic"];
    $newCard->telugu_word = $row["Telugu_Word"];
    $newCard->english_word = $row["English_Word"];
    $newCard->telugu_in_english = $row["Telugu_in_English"];
    $newCard->english_in_telugu = $row["English_in_Telugu"];
    $newCard->audio_name = $row["Audio_Name"];
    $newCard->description = $row["Description"];
    $newCard->notes = $row["Notes"];
    // Display a default image if nothing was provided, or file didn't exist
    if (IsNullOrEmptyString($row["Image_Name"]) || !file_exists( ("./images/" . $row["Image_Name"]))){
        $newCard->image_name = "default.png";
    } else {
        $newCard->image_name = $row["Image_Name"];
    }
    array_push($cards, $newCard);
}

echo '
<div class="left-content flow">
    <h2 class="list-header" style="font-weight: bold !important;">Select a Topic</h2>
';
// Build the topic list
echo '
<div id="topic-list" class="flow">
    <ul>
';
foreach ( $resultTopics as $topicChoice) {
    if ($topicChoice["topic"] == $_GET['topic']){
        echo '
        <li class="topic-choice selected">
            <a href="explorer.php?topic=' . $topicChoice["topic"] . '">
                ' . $topicChoice["topic"] . '
            </a>
        </li>
        ';
    } else {
        echo '
        <li class="topic-choice">
            <a href="explorer.php?topic=' . $topicChoice["topic"] . '">
                ' . $topicChoice["topic"] . '
            </a>
        </li>
        ';
    }
}
echo '
    </ul>
</div>
';

// Build the explore mode list
//echo '
?>
<h2 class="list-header" style="font-weight: bold !important;">Change Mode</h2>
<div id="mode-list" class="flow">
    <ul>
        <li id="modeExplore" class="mode-choice">
            <a href="explorer.php" onClick="setMode('Explore');">
                Explore
            </a>
        </li>
        <li id="modeLevel" class="mode-choice">
            <a href="explorer.php" onClick="setMode('Level')">
                Level
            </a>
        </li>
        <li id="modeReading" class="mode-choice">
            <a href="explorer.php" onClick="setMode('Read');">
                Reading
            </a>
        </li>
        <li id="modeVocabulary" class="mode-choice">
            <a href="explorer.php" onClick="setMode('Vocabulary');">
                Vocabulary
            </a>
        </li>
    </ul>
</div>
<?php
//';

echo '</div>';

// Build the carousel

if (count($cards) > 0) {
    $count = 0;
    echo '
    <div id="myCarousel" class="carousel flow" data-ride="carousel" data-interval="false" >
    ';

    echo '
        <div class="carousel-inner img-responsive" role="listbox" >
    ';
    foreach ($cards as $card) {
        if ($count == 0){
            echo '<div class="item active">
        <div style="font-size: 30px; background-color: white;">';
        } else {
            echo '<div class="item">
        <div style="font-size: 30px; background-color: white;">';
        }

        if (sessionExists()){
            echo '
            Welcome ' . $_SESSION['valid_user'] . '! You are now exploring ' . (array_search($card, $cards) + 1) . '/' . count($cards) . ' 
            in <div class="flow" style="color: #2bb0dc;">' . $_GET['topic'] . '</div>';
        } else if (adminSessionExists()){
            echo '
            Welcome ' . $_SESSION['valid_admin'] . '! You are now exploring ' . (array_search($card, $cards) + 1) . '/' . count($cards) . ' 
            in <div class="flow" style="color: #2bb0dc;">' . $_GET['topic'] . '</div>';

        } else {
            echo '
            You are now exploring ' . (array_search($card, $cards) + 1) . '/' . count($cards) . ' 
            in <div class="flow" style="color: #2bb0dc;">' . $_GET['topic'] . '</div>';
        }


        echo '
            </div>
                <div class="container carousel-border img-responsive" style="height: 100%; width: 100%; background-color: white; ">
                    <div class="row" style="height: auto;">
                        <div class="col-md-4 text-center" style="font-size: 30px">' . $card->telugu_word . '</div>
                        <div class="col-md-4 text-center"></div>
                        <div class="col-md-4 text-center" style="font-size: 30px">' . $card->english_word . '</div>
                    </div>
                    <div class="row" style="height: 600px;">
                        <div class="col-md-12 img-responsive"><img id="word-image" class="center-block img-responsive" src="./images/' . $card->image_name . '" /></div>
                    </div>
                    <div class="row" style="height: auto">
                        <div class="col-md-4 text-center img-responsive" style="font-size: 30px">' . $card->telugu_in_english . '</div>
                        <div class="col-md-4 text-center img-responsive"><audio controls>
                            <source src="./audio/' . $card->audio_name . '" alt="' . $card->audio_name . '">
                        </audio></div>
                        <div class="col-md-4 text-center img-responsive" style="font-size: 30px">' . $card->english_in_telugu . '</div>
                    </div>
                </div>
            </div>
    ';
        $count++;
    }

    // Left and right arrows
    echo '        
            </div>
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev" style="background:none !important; color: #000;">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true">
                    <!--<img src="./pic/arrow_left.jpg" />-->
                </span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next" style="background:none !important; color: #000;">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true">
                    <!--<img src="./pic/arrow_right.png" />-->
                </span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    ';
} else {
    echo 'No words in this category';
}
?>

<script type="text/javascript">
    window.onload=setMode(getCookie("mode"));

    function getCookie(name) {
        var value = "; " + document.cookie;
        var parts = value.split("; " + name + "=");
        if (parts.length == 2) {
            document.write("true");
            return (parts.pop().split(";").shift());
        } else {
            document.write("false");
            return "";
        }

    }
    function setMode(mode){
        document.write("Mode=" + mode);
        document.getElementById("modeExplore").setAttribute("class", "mode-choice selected");
        switch (mode) {
            case "Explore":
                document.write("Explore chosen");
                document.getElementById('modeExplore').setAttribute("class", "mode-choice selected");
                document.getElementById("modeLevel").setAttribute("class", "mode-choice");
                document.getElementById("modeReading").setAttribute("class", "mode-choice");
                document.getElementById("modeVocabulary").setAttribute("class", "mode-choice");
                break;
            case "Level":
                document.write("Level chosen");
                document.getElementById("modeExplore").setAttribute("class", "mode-choice");
                document.getElementById("modeLevel").setAttribute("class", "mode-choice selected");
                document.getElementById("modeReading").setAttribute("class", "mode-choice");
                document.getElementById("modeVocabulary").setAttribute("class", "mode-choice");
                break;
            case "Reading":
                document.write("Reading chosen");
                document.getElementById("modeExplore").setAttribute("class", "mode-choice");
                document.getElementById("modeLevel").setAttribute("class", "mode-choice");
                document.getElementById("modeReading").setAttribute("class", "mode-choice selected");
                document.getElementById("modeVocabulary").setAttribute("class", "mode-choice");
                break;
            case "Vocabulary":
                document.write("Vocabulary chosen");
                document.getElementById("modeExplore").setAttribute("class", "mode-choice");
                document.getElementById("modeLevel").setAttribute("class", "mode-choice");
                document.getElementById("modeReading").setAttribute("class", "mode-choice");
                document.getElementById("modeVocabulary").setAttribute("class", "mode-choice selected");
                break;
            case "":
                mode = "Explore";
                document.write("Empty chosen");
                document.getElementById("modeExplore").setAttribute("class", "mode-choice selected");
                document.getElementById("modeLevel").setAttribute("class", "mode-choice");
                document.getElementById("modeReading").setAttribute("class", "mode-choice");
                document.getElementById("modeVocabulary").setAttribute("class", "mode-choice");
                break;
        }
        document.cookie = "mode=" + mode;
        document.write(mode);
    }
</script>
<div class="footer">
    <p>@ School of India for Languages and Culture (SILC)</p>
</div>

</body>
</html>
