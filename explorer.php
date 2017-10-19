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
        .flow {
            display: inline-block;
            vertical-align: top;
        }
        #topic-list {
            border: 1px solid #888;
        }
        #myCarousel {
            width:800px !important;
            margin-left: 10px !important;
            border: 1px solid #888;
            background-color: #bdbdbd;
        }
        .carousel-inner {
            vertical-align:middle;
            width: 500px;
            height: 500px;
            margin: auto;
        }
        #word_table {
            margin:0px auto !important;
            width: 500px !important;
            height: 500px !important;
        }
        .carousel-control {
            /* Want skinnier buttons somehow */
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

if (!(isset($_GET['topic']))) {
    $_GET['topic'] = 'Universe';
}

if (isset($_GET['topic'])) {
    $topic = $_GET['topic'];
    //$sqlcheck = 'SELECT * FROM words WHERE topic = \'' . $topic . '\';';
    // don't have enough data in db to test specific topics, so grabbing all (two) words
    $sqlcheck = 'SELECT * FROM words;';
    $result = run_sql($sqlcheck);
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
}

echo '
<div id="topic-list" class="flow">
    <ul>
';

$sqlQueryTopics = 'SELECT * FROM topics';
$result = run_sql($sqlQueryTopics);
foreach ( $result as $topicChoice) {
    echo '
        <li>' . $topicChoice["topic"] . '</li>
    ';
}

echo '
    </ul>
</div>
<div id="myCarousel" class="carousel flow" data-ride="carousel" data-interval="false" >
    <div class="carousel-inner" role="listbox" >
';

// The cards' content
$count = 0;
foreach ($cards as $card) {
    //var_dump($card);
    if ($count == 0){
        echo '<div class="item active">';
    } else {
        echo '<div class="item">';
    }
    echo '
                <table class="table table-condensed main-tables" id="word_table" style=" ">
                    <tbody >
                        <tr>
                            <td>' . $card->telugu_word . '</td>
                            <td></td>
                            <td>' . $card->english_word . '</td>
                        </tr>
                        <tr>
                             <td></td>
                             <td><img class="thumbnailSize" src="./Images/' . $card->image_name . '" alt ="' . $card->image_name . '" width="400" height="400"</td>                        
                             <td></td>                  
                        </tr>
                        <tr>
                            <td>' . $card->telugu_in_english . '</td>
                            <td><a href="./sound/' . $card->audio_name . '"><img src="./pic/play.png" alt="' . $card->audio_name . '"/></a></td>
                            <td>' . $card->english_in_telugu . '</td>
                        </tr>
                    </tbody>
                </table>
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
