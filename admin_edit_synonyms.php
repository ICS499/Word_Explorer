<?PHP
session_start();
require('db_configuration.php');
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
    <style type="text/css">
        tr td:last-child{
            width:1%;
            white-space:nowrap;
        }
    </style>
</head>
<title>Edit Word</title>
    <body>
    <?PHP echo getTopNav();

        if (isset($_GET['id'])) {
            $word_id = $_GET['id'];
            if ($word_id != NULL) {
                $sqlcheck = 'SELECT * FROM words WHERE word_id = \'' . $word_id . '\';';
                $result = run_sql($sqlcheck);
                $row = $result->fetch_assoc();
                $topic = $row["Topic"];
                $level = $row["Level"];
                $telugu_word = $row["Telugu_Word"];
                $english_word = $row["English_Word"];
                $telugu_in_english = $row["Telugu_in_English"];
                $english_in_telugu = $row["English_in_Telugu"];
                $image_name = $row["Image_Name"];
                $audio_name = $row["Audio_Name"];
                $description = $row["Description"];
                $notes = $row["Notes"];
                $image_name = $row["Image_Name"];
            }
        }

    echo '<div>
        <br>
        <br>
        <table class="datatable table table-condensed table-bordered" id="word_table" style="margin-left:10px;width:95%">
            <thead>
            <tr>
                <th>Topic</th>
                <th>Level</th>
                <th>Telugu Word</th>
                <th>English Word</th>
                <th>Telugu In English</th>
                <th>English In Telugu</th>
                <th>Image Thumbnail</th>
                <th>Audio Name</th>
                <th>Description</th>
                <th>Notes</th>
                <th>Update</th>
            </tr>
            </thead>
            <tbody>
                <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
                    <tr>
                        <td><input class="textbox" type="textbox" name="topic" id="topic" value='.$topic.'></td>
                        <td><input class="textbox" type="textbox" name="level" id="level" value='.$level.'></td>
                        <td><input class="textbox" type="textbox" name="telugu_word" id="telugu_word" value='.$telugu_word.'></td>
                        <td><input class="textbox" type="textbox" name="english_word" id="english_word" value='.$english_word.'></td>
                        <td><input class="textbox" type="textbox" name="telugu_in_english" id="telugu_in_english" value='.$telugu_in_english.'></td>
                        <td><input class="textbox" type="textbox" name="english_in_telugu" id="english_in_telugu" value='.$english_in_telugu.'></td>
                        <td><img class="thumbnailSize" src="./Images/' . $image_name . '" alt ="' . $image_name . '"></td>
                        <td><audio controls>
                            <source src="./audio/' . $audio_name . '">
                        </audio></td>
                        <td><input class="textbox" type="textbox" name="description" id="description" value='.$description.'></td>
                        <td><input class="textbox" type="textbox" name="notes" id="notes" value='.$notes.'></td>
                        <td>
                            <input class="textbox upload" type="submit" value="Update Word" name="submit" onclick="success()"/>
                        </td>
                    </tr>
                </form>
            </tbody>
        </table>
        <br/>
        <form action="" method="post" enctype="multipart/form-data" >
            <div style="border: solid; border-width: 1px; padding: 5px; margin: 5px; display: inline-block">
                <h3>Upload a new image file.</h3>
                <input class="textbox" class="upload" type="file" name="image_to_upload" id="image_to_upload" />
                <br/>
                <input class="textbox" class="upload" type="submit" value="Upload Image" name="submit1" onclick="success()"/>
            </div>
        </form>
        <form action="" method="post" enctype="multipart/form-data" >
            <div style="border: solid; border-width: 1px; padding: 5px; margin: 5px; display: inline-block">
                <h3>Upload a new audio file.</h3>
                <input class="textbox" class="upload" type="file" name="audio_to_upload" id="audio_to_upload" />
                <br/>
                <input class="textbox" class="upload" type="submit" value="Upload Audio" name="submit2" onclick="success()"/>
            </div>
        </form>
        <br/>
    </div>';
        ?>

            <?php
            if (isset($_POST['submit'])) {
                if (isset($_POST['topic'])) {
                    $topic = $_POST['topic'];
                }
                if (isset($_POST['level'])) {
                    $level = $_POST['level'];
                }
                if (isset($_POST['telugu_word'])) {
                    $telugu_word = $_POST['telugu_word'];
                }
                if (isset($_POST['english_word'])) {
                    $english_word = $_POST['english_word'];
                }
                if (isset($_POST['telugu_in_english'])) {
                    $telugu_in_english = $_POST['telugu_in_english'];
                }
                if (isset($_POST['english_in_telugu'])) {
                    $english_in_telugu = $_POST['english_in_telugu'];
                }
                if (isset($_POST['description'])) {
                    $description = $_POST['description'];
                }
                if (isset($_POST['notes'])) {
                    $notes = $_POST['notes'];
                }

                //$deleteCharacters = 'DELETE FROM characters WHERE word_id = ' . $word_id . ' ; ';
                //run_sql($deleteCharacters);

                $sql = 'UPDATE words SET Topic=\''.$topic.
                    '\', Level=\''.$level.
                    '\', Telugu_Word=\''.$telugu_word.
                    '\', English_Word=\''.$english_word.
                    '\', Telugu_in_English=\''.$telugu_in_english.
                    '\', English_in_Telugu=\''.$english_in_telugu.
                    '\', Description=\''.$description.
                    '\', Notes=\''.$notes.
                    '\' WHERE word_id='.$word_id.';';
                $result = run_sql($sql);
                $uploadOk = 1;

                //update the characters table
                /*
                $logicalChars = getWordChars($word);

                for ($j = 0; $j < count($logicalChars); $j++) {
                    //update each letter into char table.
                    if($logicalChars[$j] != " ") {
                        $sqlAddLetters = 'INSERT INTO characters (word_id, character_index, character_value) VALUES (\'' . $word_id . '\', \'' . $j . '\', \'' . $logicalChars[$j] . '\');';
                        run_sql($sqlAddLetters);
                    }
                }
                */

                echo '<script>window.location.href = "list.php"</script>';
            }

            // upload image
            if(isset($_POST['submit1'])) {
                $inputImageFileName = $_FILES["image_to_upload"]["tmp_name"];
                $target_image_dir = "./images/";
                $target_image_file = $target_image_dir . basename($_FILES["image_to_upload"]["name"]);
                $imageFileType = pathinfo($target_image_file, PATHINFO_EXTENSION);
                $imageName = basename($_FILES["image_to_upload"]["name"]);
                if(!empty($imageName)) {
                    copy($inputImageFileName, $target_image_file);
                    $sqlimage = 'UPDATE words SET Image_Name=\''.$imageName.
                        '\' WHERE word_id='.$word_id.';';
                    run_sql($sqlimage);
                }
                echo '<script>window.location.href = "list.php"</script>';
            }

            // upload audio
            if(isset($_POST['submit2'])){
                $inputAudioFileName = $_FILES["audio_to_upload"]["tmp_name"];
                $target_audio_dir = "./audio/";
                $target_audio_file = $target_audio_dir . basename($_FILES["audio_to_upload"]["name"]);
                $audioFileType = pathinfo($target_audio_file, PATHINFO_EXTENSION);
                $audioName = basename($_FILES["audio_to_upload"]["name"]);
                if(!empty($audioName)) {
                    copy($inputAudioFileName, $target_audio_file);
                    $sqlaudio = 'UPDATE words SET Audio_Name=\''.$audioName.
                        '\' WHERE word_id='.$word_id.';';
                    run_sql($sqlaudio);
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
