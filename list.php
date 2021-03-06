<?php
session_start();
require('session_validation.php');
require('language_processor_functions.php');
// Start session to store variables

// Allows user to return 'back' to this page
ini_set('session.cache_limiter', 'public');
session_cache_limiter(false);
?>
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
    <link rel="stylesheet" href="styles/main_style.css" type="text/css">
    <link rel="stylesheet" href="styles/custom_nav.css" type="text/css">
    <title>Word Explorer Word List</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
    <style>
        .container{
            margin-left: 20px;
        }
    </style>
    <?PHP echo getTopNav(); ?>
</head>

<body class="body_background">
<div id="wrap">
    <div class="container">
        <h3>Word List</h3>
        <table id="info" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered"
               width="95%">
            <thead>
            <tr>
                <th>Word ID</th>
                <th>Topic</th>
                <th>Length</th>
                <th>Level</th>
                <th>Telugu Word</th>
                <th>English Word</th>
                <th>Telugu In English</th>
                <th>English In Telugu</th>
                <th>Image</th>
                <th>Audio</th>
                <th>Description</th>
                <th>Notes</th>
                <th>Created Date</th>
                <th>Last Updated</th>
                <th>Interactions</th>
            </tr>
            </thead>
            <tbody>

            <?php
            require 'db_configuration.php';
            $sql = "SELECT * FROM words";
            $result = run_sql($sql);

            if ($result->num_rows > 0) {
                // output data of each
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>
                        <td>' . $row["word_id"] . "</td>  
                        <td>" . $row["Topic"] . "</td> 
                        <td>" . $row["Length"] . "</td> 
                        <td>" . $row["Level"] . "</td>
                        <td>" . $row["Telugu_Word"] . "</td>
                        <td>" . $row["English_Word"] . "</td>
                        <td>" . $row["Telugu_in_English"] . "</td>
                        <td>" . $row["English_in_Telugu"] . "</td>
                        <td><img class=\"thumbnailSize\" src=\"images/" . $row["Image_Name"] . "\" alt =\"" . $row["Image_Name"] . "\" ></td>
                        <td><audio controls>
                            <source src=\"./audio/" . $row["Audio_Name"] . "\" alt=\"" . $row["Audio_Name"] . "\">
                        </audio></td>
                        <td>" . $row["Description"] . "</td>
                        <td>" . $row["Notes"] . "</td> 
                        <td>" . $row["Created_Date"] . "</td>
                        <td>" . $row["Last_Updated"] . "</td>
                        <td>
                            <a href='word_card.php?id=" . $row["word_id"] . "&button=edit'>
                                <img class=\"table_image\" src=\"pic/play.png\" alt=\"Investigate " . $row["word_id"] . " word\">
                            </a>
                            <a href='admin_edit_synonyms.php?id=" . $row["word_id"] . "&button=edit'>
                                <img class=\"table_image\" src=\"pic/edit.jpg\" alt=\"Edit " . $row["word_id"] . " word\">
                            </a>
                            <a href='list.php?id=" . $row["word_id"] . "&button=delete'>
                                <img class=\"table_image\" src=\"pic/delete.png\" alt=\"deleteWord\">
                            </a>
                            <form class=\"upload\" method=\"post\" name=\"importFrom\" enctype=\"multipart/form-data\" onsubmit=\"return validateForm()\">
                                  <label class=\"upload\"><input class=\"upload\" type=\"file\" name=\"fileToUpload\" id=\"fileToUpload\"></label>
                                  <input class=\"upload\" type=\"hidden\" name=\"word_id\" value=\"" . $row["word_id"] . "\" />
                                  <input class=\"upload\" type=\"submit\" value=\"Upload/Replace Image\" name=\"submit\">
                            </form> 
                        </td>
                        </tr>";
                }
            } else {
                echo "0 results";
            }

            $result->close();
            // *** delete button functionality ***
            if (isset($_GET['id'])) {
                if ($_GET['button'] == 'delete') {
                    $id = $_GET['id'];

                    $sql = 'DELETE FROM characters WHERE word_id=' . $id . ';';
                    $result = $db->query($sql);

                    $sql = 'DELETE FROM words WHERE word_id=' . $id . ';';
                    $result = $db->query($sql);

                    echo ' <script> alert(\'Record has been successfully deleted!!\'); window.location.replace("list.php"); </script>';
                }
            }

            if (isset($_POST['submit'])) {
                $inputFileName = $_FILES["fileToUpload"]["tmp_name"];
                // Check for no image selection
                if($inputFileName != "") {
                    $target_dir = "./images/";
                    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                    $imageName = basename($_FILES["fileToUpload"]["name"]);
                    copy($inputFileName, $target_file);
                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                    if ($check !== false) {
                        $sql = 'UPDATE words SET image_name=\'' . $imageName . '\' WHERE word_id=' . $_POST['word_id'] . ';';
                        $result = run_sql($sql);
                        echo ' <script> alert(\'Image Upload Successful!!\'); window.location.replace("list.php"); </script>';
                    } else {
                        echo ' <script> alert(\'Image is not valid!\');</script>';
                    }
                }
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
            </script>

            </tbody>
            <tfoot>
            <tr>
                <th>Word ID</th>
                <th>Topic</th>
                <th>Length</th>
                <th>Level</th>
                <th>Telugu Word</th>
                <th>English Word</th>
                <th>Telugu In English</th>
                <th>English In Telugu</th>
                <th>Image Name</th>
                <th>Audio</th>
                <th>Description</th>
                <th>Notes</th>
                <th>Created Date</th>
                <th>Last Updated</th>
                <th>Interactions</th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>
<div class="footer">
    <p>@ School of India for Languages and Culture (SILC)</p>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#info').DataTable();
    });

</script>
</body>
</html>

