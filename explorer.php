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

        }
        .object-fit-cover {
            max-height: 200px;
            width: 100%;
            object-fit: cover; /*magic*/
        }
        #topic-list {
            background-color: #bdbdbd;
            margin: 10px;
            border: 1px solid #888;
            max-height: 300px;
            min-height: 300px;
            width: 100%;
            overflow-y: auto;
        }
        #mode-list {
            background-color: #bdbdbd;
            margin: 10px;
            border: 1px solid #888;
            max-height: 300px;
            min-height: 300px;
            width: 100%;
        }
        ul, li {
            list-style: none;
            padding: 5px;
            margin: 0px;
        }
        #myCarousel {
            width:800px;
            height: auto;
            margin: 10px;
            border: 1px solid #888;
            background-color: #FFFFFF;
        }
        .carousel-inner {
            vertical-align:middle;
            width: 100%;
            height: 100%;
            margin: auto;
        }
        #word_table {
            margin: 1px auto !important;
            width: 100% !important;
            height: 100% !important;
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
$sqlQueryTopics = 'SELECT * FROM topics';
$resultTopics = run_sql($sqlQueryTopics);

// Set to first topic, if no topic is selected
if (!(isset($_GET['topic']))) {
    $_GET['topic'] = 'Animals';
}

// Get the words related to the topic
$topic = $_GET['topic'];
$sqlQueryWords = 'SELECT * FROM words WHERE topic = \'' . $topic . '\';';

// don't have enough data in db to test specific topics, so grabbing all (two) words
//$sqlQueryWords = 'SELECT * FROM words;';
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
    $newCard->image_name = $row["Image_Name"];
    array_push($cards, $newCard);
}

echo '
<div class="left-content flow">
    <h2 class="list-header">Choose Topic</h2>
';
// Build the topic list
echo '
<div id="topic-list" class="flow">
    <ul>
';
foreach ( $resultTopics as $topicChoice) {
    if ($topicChoice["topic"] == $_GET['topic']){
        echo '
        <li>
            <a class="topic-choice selected" href="explorer.php?topic=' . $topicChoice["topic"] . '">
                ' . $topicChoice["topic"] . '
            </a>
        </li>
        ';
    } else {
        echo '
        <li>
            <a class="topic-choice" href="explorer.php?topic=' . $topicChoice["topic"] . '">
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
echo '
<h2 class="list-header">Choose Mode</h2>
<div id="mode-list" class="flow">
    <ul>
        <li>
            <a class="mode-choice selected" href="explorer.php?mode=' . $topicChoice["topic"] . '">
                Explore
            </a>
        </li>
        <li>
            <a class="mode-choice" href="explorer.php?mode=' . $topicChoice["topic"] . '">
                Reading
            </a>
        </li>
        <li>
            <a class="mode-choice" href="explorer.php?mode=' . $topicChoice["topic"] . '">
                Vocabulary
            </a>
        </li>
        <li>
            <a class="mode-choice" href="explorer.php?mode=' . $topicChoice["topic"] . '">
                Quiz
            </a>
        </li>
    </ul>
</div>
';

echo '</div>';

// Build the carousel
echo '
<div id="myCarousel" class="carousel flow" data-ride="carousel" data-interval="false" >
    <div class="carousel-inner" role="listbox" >
';
$count = 0;
foreach ($cards as $card) {
    //var_dump($card);
    if ($count == 0){
        echo '<div class="item active">';
    } else {
        echo '<div class="item">';
    }
    echo '
                <div class="container" style="height: 100%; width: 100%; background-color: #FFF8DC; ">
                    <div class="row" style="height: auto;">
                        <div class="col-md-4 text-center" style="">' . $card->telugu_word . '</div>
                        <div class="col-md-4 text-center"></div>
                        <div class="col-md-4 text-center">' . $card->english_word . '</div>
                    </div>
                    <div class="row" style="height: 600px;">
                        <div class="col-md-4 text-center"></div>
                        <div class="col-md-4 text-center"><img id="word-image" class="thumbnailSize object-fit-cover" src="./Images/' . $card->image_name . '" alt ="' . $card->image_name . '" width="400" height="400" /></div>
                        <div class="col-md-4 text-center"></div>
                    </div>
                    <div class="row" style="height: auto">
                        <div class="col-md-4 text-center">' . $card->telugu_in_english . '</div>
                        <div class="col-md-4 text-center"></div>
                        <div class="col-md-4 text-center align-text-bottom">' . $card->english_in_telugu . '</div>
                    </div>
                </div>
            </div>
    ';
    $count++;
}

// Left and right arrows
echo '        
        </div>
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev" style="background:none !important;">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next" style="background:none !important;">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
';
?>

<!-- left this as reference for php carousel generation
    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="false">

        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>


        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="images/moon.jpg" alt="Test1" width="1200" height="700">
                <div class="carousel-caption">
                    <h3>Testing</h3>
                    <p>Testing</p>
                </div>
            </div>
    
            <div class="item">
                <img src="images/moon.jpg" alt="test2" width="1200" height="700">
                <div class="carousel-caption">
                    <h3>Testing</h3>
                    <p>Testing</p>
                </div>
            </div>
        </div>

        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    -->
</body>
</html>
