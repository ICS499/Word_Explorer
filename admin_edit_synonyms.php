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
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="styles/custom_nav.css" type="text/css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/main_style.css" type="text/css">
</head>
<title>Rebus Edit Words</title>
    <body>
    <?PHP echo getTopNav();

        if (isset($_GET['id'])) {
            $word_id = $_GET['id'];
            if ($word_id != NULL) {
                $sqlcheck = 'SELECT * FROM words WHERE word_id = \'' . $word_id. '\';';
                $result = run_sql($sqlcheck);
                $row = $result->fetch_assoc();
                $topic = $row["Topic"];
                $telugu_word = $row["Telugu_Word"];
                $english_word = $row["English_Word"];
                $telugu_in_english = $row["Telugu_in_English"];
                $english_in_telugu = $row["English_in_Telugu"];
                $audio_name = $row["Audio_Name"];
                $description = $row["Description"];
                $notes = $row["Notes"];
                $image_name = $row["Image_Name"];
            }
        }

    echo '<div>
        <br>
        <br>
        <table class="table table-condensed main-tables" id="word_table" style="margin-left:11%;">
            <thead>
            <tr>
                <th>Topic</th>
                <th>Telugu Word</th>
                <th>English Word</th>
                <th>Telugu In English</th>
                <th>English In Telugu</th>
                <th>Image Thumbnail</th>
                <th>Audio Name</th>
                <th>Description</th>
                <th>Notes</th>
                <th>Update Thumbnail</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                    <tr>
                        <td><input type="textbox" name="topic" id="topic" value='.$topic.'></td>
                        <td><input type="textbox" name="telugu_word" id="telugu_word" value='.$telugu_word.'></td>
                        <td><input type="textbox" name="english_word" id="english_word" value='.$english_word.'></td>
                        <td><input type="textbox" name="telugu_in_english" id="telugu_in_english" value='.$telugu_in_english.'></td>
                        <td><input type="textbox" name="english_in_telugu" id="english_in_telugu" value='.$english_in_telugu.'></td>
                        <td><img class="thumbnailSize" src="./Images/' . $row['Image_Name'] . '" alt ="' . $row['Image_Name'] . '"></td>
                        <td><input type="textbox" name="audio_name" id="audio_name" value='.$audio_name.'></td>
                        <td><input type="textbox" name="description" id="description" value='.$description.'></td>
                        <td><input type="textbox" name="notes" id="notes" value='.$notes.'></td>
                        <td><input class="upload" type="file" name="fileToUpload" id="fileToUpload" /></td>
                        <td><input class="upload" type="submit" value="Update Word" name="submit" onclick="success()"/></td>
                    </tr>
                </form>
            </tbody>
        </table>
    </div>';
        ?>

            <?php
            if (isset($_POST['submit'])) {
                if (isset($_POST['topic'])) {
                    $word = $_POST['topic'];
                }
                if (isset($_POST['telugu_word'])) {
                    $word = $_POST['telugu_word'];
                }
                if (isset($_POST['english_word'])) {
                    $eng = $_POST['english_word'];
                }
                if (isset($_POST['telugu_in_english'])) {
                    $eng = $_POST['telugu_in_english'];
                }
                if (isset($_POST['english_in_telugu'])) {
                    $eng = $_POST['english_in_telugu'];
                }
                if (isset($_POST['audio_name'])) {
                    $eng = $_POST['audio_name'];
                }
                if (isset($_POST['description'])) {
                    $eng = $_POST['description'];
                }
                if (isset($_POST['notes'])) {
                    $eng = $_POST['notes'];
                }
                $inputFileName = $_FILES["fileToUpload"]["tmp_name"];
                $target_dir = "./Images/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                $imageName = basename($_FILES["fileToUpload"]["name"]);

                if(!empty($imageName)) {
                    copy($inputFileName, $target_file);
                }

                //$deleteCharacters = 'DELETE FROM characters WHERE word_id = ' . $word_id . ' ; ';
                //run_sql($deleteCharacters);

                $sql = 'UPDATE words SET Topic = \''.$topic.
                    '\', Telugu_Word = \''.$telugu_word.
                    '\', English_Word = \''.$english_word.
                    '\', Image_Name =\''.$image_name.
                    '\', Telugu_in_English =\''.$telugu_in_english.
                    '\', English_in_Telugu =\''.$english_in_telugu.
                    '\', Audio_Name =\''.$audio_name.
                    '\', Description =\''.$description.
                    '\', Notes =\''.$notes.
                    '\' WHERE word_id = '.$word_id.';';
                $result = run_sql($sql);
                $uploadOk = 1;

                //update the characters table
                $logicalChars = getWordChars($word);

                for ($j = 0; $j < count($logicalChars); $j++) {
                    //update each letter into char table.
                    if($logicalChars[$j] != " ") {
                        $sqlAddLetters = 'INSERT INTO characters (word_id, character_index, character_value) VALUES (\'' . $word_id . '\', \'' . $j . '\', \'' . $logicalChars[$j] . '\');';
                        run_sql($sqlAddLetters);
                    }
                }

                echo '<script>window.location.href = "list.php"</script>';
            }
            ?>
            <script>
                function validateForm() {
                    var eng = document.forms["importFrom"]["fileToUpload"].value;
                    if (eng == "") {

                        document.getElementById("error").style = "display:block;background-color: #ce4646;padding:5px;color:#fff;";
                        return false;
                    }
                }

                function AddTableRows() {
                    alert("add rows");
                    // Find a <table> element with id="myTable":
                    var table = document.getElementById("myTable");

                    // Create an empty <tr> element and add it to the 1st position of the table:
                    var row = table.insertRow(git);

                }

                function success() {
                    alert("The word has been updated. Please search for the word on the word list table.");
                }

            </script>
    </body>
</html>
