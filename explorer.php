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
    <link rel="stylesheet" href="styles/explorer.css" type="text/css">
</head>
<title>Word Explorer Edit Words</title>
<body>
<?PHP
echo getTopNav();

// Card objects are used in the carousel
class Card {
    public $topic = "";
    public $level = "";
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
if (!(isset($_COOKIE['level']))){
    $sqlQueryWords = 'SELECT * FROM words WHERE topic = \'' . $topic . '\';';
} else {
    switch ($_COOKIE['level']) {
        case "":
            $sqlQueryWords = 'SELECT * FROM words WHERE topic = \'' . $topic . '\';';
            break;
        case "levelall":
            $sqlQueryWords = 'SELECT * FROM words WHERE topic = \'' . $topic . '\';';
            break;
        case "level0":
            $sqlQueryWords = 'SELECT * FROM words WHERE topic = \'' . $topic . '\' AND level = 0;';
            break;
        case "level1":
            $sqlQueryWords = 'SELECT * FROM words WHERE topic = \'' . $topic . '\' AND level = 1;';
            break;
        case "level2":
            $sqlQueryWords = 'SELECT * FROM words WHERE topic = \'' . $topic . '\' AND level = 2;';
            break;
        case "level3":
            $sqlQueryWords = 'SELECT * FROM words WHERE topic = \'' . $topic . '\' AND level = 3;';
            break;
        case "level4":
            $sqlQueryWords = 'SELECT * FROM words WHERE topic = \'' . $topic . '\' AND level = 4;';
            break;
    }
}
$result = run_sql($sqlQueryWords);
$cards = array();
foreach( $result as $row){
    $newCard = new Card();
    $newCard->topic = $row["Topic"];
    $newCard->level = $row["Level"];
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
?>

<h2 class="list-header" style="font-weight: bold !important;">Options</h2>
<div id="mode-list" class="flow">
    <ul>
        <li id="modeExplore" class="mode-choice <?PHP if($_COOKIE['mode'] == "Explore") { echo 'selected'; }; ?>">
            <a href="explorer.php" onClick="setMode('Explore');">
                Explore
            </a>
        </li>
        <li id="modeLevel" class="mode-choice <?PHP if($_COOKIE['mode'] == "Label") { echo 'selected'; }; ?>">
            <a href="explorer.php" onClick="setMode('Label')">
                Label
            </a>
        </li>
        <li id="modeReading" class="mode-choice <?PHP if($_COOKIE['mode'] == "Reading") { echo 'selected'; }; ?>">
            <a href="explorer.php" onClick="setMode('Reading');">
                Reading
            </a>
        </li>
        <li id="modeVocabulary" class="mode-choice <?PHP if($_COOKIE['mode'] == "Vocabulary") { echo 'selected'; }; ?>">
            <a href="explorer.php" onClick="setMode('Vocabulary');">
                Vocabulary
            </a>
        </li>
    </ul>
</div>

<h2 class="list-header" style="font-weight: bold !important;">Level</h2>
<div style="margin: 10px; padding: 5px" class="flow">
    <a class="mode-choice <?PHP if($_COOKIE['level'] == "levelall") { echo 'selected'; }; ?>" style="width: 50px; display:inline-block; color: black; text-align: center" href="explorer.php" onClick="filterLevel('levelall');">
        All
    </a>
    <a class="mode-choice <?PHP if($_COOKIE['level'] == "level0") { echo 'selected'; }; ?>" style="width: 50px; display:inline-block; color: black; text-align: center" href="explorer.php" onClick="filterLevel('level0');">
        0
    </a>
    <a class="mode-choice <?PHP if($_COOKIE['level'] == "level1") { echo 'selected'; }; ?>" style="width: 50px; display:inline-block; color: black; text-align: center" href="explorer.php" onClick="filterLevel('level1')">
        1
    </a>
    <a class="mode-choice <?PHP if($_COOKIE['level'] == "level2") { echo 'selected'; }; ?>" style="width: 50px; display:inline-block; color: black; text-align: center" href="explorer.php" onClick="filterLevel('level2');">
        2
    </a>
    <a class="mode-choice <?PHP if($_COOKIE['level'] == "level3") { echo 'selected'; }; ?>" style="width: 50px; display:inline-block; color: black; text-align: center" href="explorer.php" onClick="filterLevel('level3');">
        3
    </a>
    <a class="mode-choice <?PHP if($_COOKIE['level'] == "level4") { echo 'selected'; }; ?>" style="width: 50px; display:inline-block; color: black; text-align: center" href="explorer.php" onClick="filterLevel('level4');">
        4
    </a>
</div>

<?php

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
            </div name="level' . $card->level . '">
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
    echo '<div style="min-height: 250px"></div>';
}
?>

<div class="footer">
    <p>@ School of India for Languages and Culture (SILC)</p>
</div>

<script type="text/javascript" src="js/explorerFunctions.js"></script>
</body>
</html>
