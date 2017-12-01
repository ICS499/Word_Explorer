
<?PHP
session_start();
require('session_validation.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/main_style.css" type="text/css">
    <link rel="stylesheet" href="styles/custom_nav.css" type="text/css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <script src="javascript/typeahead.min.js"></script>
    <title>Word Explorer Add Word</title>
    <style>
        .table {
            width: 90% !important;
        }
    </style>
</head>

<body>
<?php
require('db_configuration.php');
require('InsertUtil.php');
?>
<?PHP echo getTopNav(); ?>
<div id="pop_up_fail" class="container pop_up" style="display:none">
    <div class="pop_up_background">
        <img class="pop_up_img_fail" src="pic/info_circle.png">
        <div class="pop_up_text">Incorrect! <br>Try Again!</div>
        <button class="pop_up_button" onclick="toggle_display('pop_up_fail')">OK</button>
    </div>
</div>
<div>
    <br><br>
    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
        <div class="col-xs-5">
        <div class="btn-group mr-2" role="group" aria-label="Second group">
            <button class="main-buttons" onClick="addTableRows('word_table')">Add Rows</button>
        </div>
        </div>
        <div class="btn-group mr-2" role="group" aria-label="Third group">
            <button type="submit" form="theForm" class="main-buttons" name="submit">Add Words</button>
        </div>
    </div>
    <br><br>
    <form action="" id="theForm"  method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
        <table class="table table-condensed " id="word_table" style="margin-left: 5%">
            <thead>
                <tr>
                    <th>Topic</th>
                    <th>Level</th>
                    <th>Telugu Word</th>
                    <th>English Word</th>
                    <th>Telugu in English</th>
                    <th>English in Telugu</th>
                    <th>Image Thumbnail</th>
                    <th>Audio File</th>
                    <th>Description</th>
                    <th>Notes</th>
                </tr>
            </thead>
            <tbody id="formRows">
                <script>
                    var entry = 0;
                    function validateForm() {
                        var eng = document.forms["importFrom"]["fileToUpload"].value;
                        if (eng == "") {
                            document.getElementById("error").style = "display: block; background-color: #ce4646; padding:5px;color: #fff;";
                            return false;
                        }
                    }

                    function addTableRows() {
                        // No more than 10 words
                        if (entry > 9) { return };
                        var rows = document.getElementById("formRows");
                        // Create the entry row
                        var newEntryRow = document.createElement("tr");

                        // Topic
                        var newEntryCell8 = document.createElement("td");
                        var newEntryField8 = document.createElement("input");
                        newEntryField8.setAttribute("style", "width:100px;");
                        newEntryField8.setAttribute("type", "textbox");
                        newEntryField8.setAttribute("name", "topic" + entry);
                        newEntryField8.setAttribute("id", "topic" + entry);
                        newEntryCell8.appendChild(newEntryField8);

                        // Telugu Word
                        var newEntryCell9 = document.createElement("td");
                        var newEntryField9 = document.createElement("input");
                        newEntryField9.setAttribute("style", "width:100px;");
                        newEntryField9.setAttribute("type", "number");
                        newEntryField9.setAttribute("name", "level" + entry);
                        newEntryField9.setAttribute("id", "level" + entry);
                        newEntryCell9.appendChild(newEntryField9);

                        // Telugu Word
                        var newEntryCell0 = document.createElement("td");
                        var newEntryField0 = document.createElement("input");
                        newEntryField0.setAttribute("style", "width:100px;");
                        newEntryField0.setAttribute("type", "textbox");
                        newEntryField0.setAttribute("name", "telugu_word" + entry);
                        newEntryField0.setAttribute("id", "telugu_word" + entry);
                        newEntryCell0.appendChild(newEntryField0);

                        // English word
                        var newEntryCell1 = document.createElement("td");
                        var newEntryField1 = document.createElement("input");
                        newEntryField1.setAttribute("style", "width:100px;");
                        newEntryField1.setAttribute("type", "textbox");
                        newEntryField1.setAttribute("name", "english_word" + entry);
                        newEntryField1.setAttribute("id", "english_word" + entry);
                        newEntryCell1.appendChild(newEntryField1);

                        // Telugu in English
                        var newEntryCell2 = document.createElement("td");
                        var newEntryField2 = document.createElement("input");
                        newEntryField2.setAttribute("style", "width:100px;");
                        newEntryField2.setAttribute("type", "textbox");
                        newEntryField2.setAttribute("name", "telugu_in_english" + entry);
                        newEntryField2.setAttribute("id", "telugu_in_english" + entry);
                        newEntryCell2.appendChild(newEntryField2);

                        // English in Telugu
                        var newEntryCell3 = document.createElement("td");
                        var newEntryField3 = document.createElement("input");
                        newEntryField3.setAttribute("style", "width:100px;");
                        newEntryField3.setAttribute("type", "textbox");
                        newEntryField3.setAttribute("name", "english_in_telugu" + entry);
                        newEntryField3.setAttribute("id", "english_in_telugu" + entry);
                        newEntryCell3.appendChild(newEntryField3);

                        // Image Name
                        var newEntryCell4 = document.createElement("td");
                        var newEntryField4 = document.createElement("input");
                        newEntryField4.setAttribute("style", "width:90px;");
                        newEntryField4.setAttribute("class", "upload");
                        newEntryField4.setAttribute("type", "file");
                        newEntryField4.setAttribute("name", "fileToUpload" + entry);
                        newEntryField4.setAttribute("id", "fileToUpload" + entry);
                        newEntryCell4.appendChild(newEntryField4);

                        // Audio Name
                        var newEntryCell5 = document.createElement("td");
                        var newEntryField5 = document.createElement("input");
                        newEntryField5.setAttribute("style", "width:90px;");
                        newEntryField5.setAttribute("class", "upload");
                        newEntryField5.setAttribute("type", "file");
                        newEntryField5.setAttribute("name", "fileAudioToUpload" + entry);
                        newEntryField5.setAttribute("id", "fileAudioToUpload" + entry);
                        newEntryCell5.appendChild(newEntryField5);

                        // Description
                        var newEntryCell6 = document.createElement("td");
                        var newEntryField6 = document.createElement("input");
                        newEntryField6.setAttribute("style", "width:100px;");
                        newEntryField6.setAttribute("type", "textbox");
                        newEntryField6.setAttribute("name", "description" + entry);
                        newEntryField6.setAttribute("id", "description" + entry);
                        newEntryCell6.appendChild(newEntryField6);

                        // Notes
                        var newEntryCell7 = document.createElement("td");
                        var newEntryField7 = document.createElement("input");
                        newEntryField7.setAttribute("style", "width:100px;");
                        newEntryField7.setAttribute("type", "textbox");
                        newEntryField7.setAttribute("name", "notes" + entry);
                        newEntryField7.setAttribute("id", "notes" + entry);
                        newEntryCell7.appendChild(newEntryField7);

                        // Build the entry/row
                        newEntryRow.appendChild(newEntryCell8);
                        newEntryRow.appendChild(newEntryCell9);
                        newEntryRow.appendChild(newEntryCell0);
                        newEntryRow.appendChild(newEntryCell1);
                        newEntryRow.appendChild(newEntryCell2);
                        newEntryRow.appendChild(newEntryCell3);
                        newEntryRow.appendChild(newEntryCell4);
                        newEntryRow.appendChild(newEntryCell5);
                        newEntryRow.appendChild(newEntryCell6);
                        newEntryRow.appendChild(newEntryCell7);
                        rows.appendChild(newEntryRow);

                        entry++;
                    }
                    // Add the first row upon reading of the javascript / page load
                    addTableRows();
                </script>
                <?php
                if (isset($_POST['submit'])) {
                    // Add all the submitted elements to three arrays, representing fields of each entry
                    $arrayTopic = array();
                    $arrayLength = array();
                    $arrayLevel = array();
                    $arrayTelugu = array();
                    $arrayEnglish = array();
                    $arrayTeluguInEnglish = array();
                    $arrayEnglishInTelugu = array();
                    $arrayImageName = array();
                    $arrayAudioName = array();
                    $arrayDescription = array();
                    $arrayNotes = array();

                    $counter = 0;
                    while ($counter < 9) { // Not adding more than 10 words
                        if ( isset($_POST['telugu_word'.$counter]) && isset($_POST['english_word'.$counter]) ) {
                            // Topic
                            if ( isset($_POST['topic'.$counter]) ) {
                                array_push($arrayTopic, $_POST['topic'.$counter]);
                            } else {
                                array_push($arrayTopic, null);
                            }
                            // Length - auto calculated
                            array_push($arrayLength, count(getWordChars($_POST['telugu_word'.$counter])));
                            // Level
                            if ( isset($_POST['level'.$counter])) {
                                array_push($arrayLevel, $_POST['level'.$counter]);
                            } else {
                                array_push($arrayLevel, 0);
                            }
                            // Telugu words
                            array_push($arrayTelugu, $_POST['telugu_word'.$counter]);
                            // English words
                            array_push($arrayEnglish, $_POST['english_word'.$counter]);

                            // Telugu in english
                            if ( isset($_POST['telugu_in_english'.$counter]) ) {
                                array_push($arrayTeluguInEnglish, $_POST['telugu_in_english'.$counter]);
                            } else {
                                array_push($arrayTeluguInEnglish, null);
                            }

                            // English in telugu
                            if ( isset($_POST['english_in_telugu'.$counter]) ) {
                                array_push($arrayEnglishInTelugu, $_POST['english_in_telugu'.$counter]);
                            } else {
                                array_push($arrayEnglishInTelugu, null);
                            }

                            // Image
                            if ( isset($_FILES["fileToUpload".$counter]['name'])){
                                $inputFileName = $_FILES["fileToUpload".$counter]["tmp_name"];
                                $target_File = "./Images/".basename($_FILES["fileToUpload".$counter]['name']);
                                $imageFileType = pathinfo($target_File,PATHINFO_EXTENSION);
                                $imageName = basename($_FILES["fileToUpload".$counter]["name"]);
                                if (!empty($imageName)) {
                                    copy($inputFileName, $target_File);
                                }
                                // Push empty string for no image, or push the name of the image to use
                                array_push($arrayImageName, $imageName);
                            }

                            // Audio
                            if ( isset($_POST['fileAudioToUpload'.$counter]) ) {
                                array_push($arrayAudioName, $_POST['fileAudioToUpload'.$counter]);
                            } else {
                                array_push($arrayAudioName, null);
                            }

                            // Description
                            if ( isset($_POST['description'.$counter]) ) {
                                array_push($arrayDescription, $_POST['description'.$counter]);
                            } else {
                                array_push($arrayDescription, null);
                            }

                            // Notes
                            if ( isset($_POST['notes'.$counter]) ) {
                                array_push($arrayNotes, $_POST['notes'.$counter]);
                            } else {
                                array_push($arrayNotes, null);
                            }

                        } else {
                            break; // The goal being to break the loop when there are no more entries
                        }

                        $counter++;
                    }

                    // Add each row
                    for ($i = 0; $i < count($arrayTelugu); $i++) {
                        insertIntoWordsTable(
                                $arrayTopic[$i],
                                $arrayLength[$i],
                                $arrayLevel[$i],
                                $arrayTelugu[$i],
                                $arrayEnglish[$i],
                                $arrayTeluguInEnglish[$i],
                                $arrayEnglishInTelugu[$i],
                                $arrayImageName[$i],
                                $arrayAudioName[$i],
                                $arrayDescription[$i],
                                $arrayNotes[$i]
                        );
                    }
                }
                ?>
            </tbody>
        </table>
    </form>
</div>
</body>
</html>
