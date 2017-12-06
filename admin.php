<?PHP
session_start();
require('session_validation.php');
require('language_processor_functions.php');
//require('import.php');
/*
if ((!isset($_SESSION['valid_admin'])){
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=login.php\">";
}
else{
}
*/
?>
<!--FIXME: random user can get to page by putting admin.php into the url need to change so that only an admin can load the page-->
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
    <title>Word Explorer Admin</title>
</head>

<body>

<?PHP
echo getTopNav();
?>
<!--<div id="export">
    <br><br>
    <h2 class="upload">[3]Import the word list (Source: Excel File; Target: Database)</h2>
    <div id="import">
        <p id="error" style="display: none;">Error: You must select a file to import</p>
        <?php
require('import.php');
if ($error) {
    ?>
            <p id="error" style="display:block;background-color: #ce4646;padding:5px;color:#fff;">
                <?php echo 'error'.$result; ?>
            </p>
        <?php } ?>
        <form class="upload" method="post" name="importFrom" enctype="multipart/form-data"
              onsubmit="return validateForm()">
            <label class="upload"><input class="upload" type="file" name="fileToUpload" id="fileToUpload"></label>
            <input class="upload" type="submit" value="Submit File" name="submit">
        </form>
    </div> -->
<!-- <div class="backUpSuccess">The database backup has been saved in the Sql_Scripts Folder.</div>
 <p id="demo"></p> -->
<br><br>
<table align="center" class="adminTable">
    <tr>
        <td align="center">
            <a href="add_words.php"><img src="./pic/addAWord.png" class="adminThumbnailSize"></a>
        </td>
        <td align="center">
            <a href="list.php"><img src="./pic/wordList.png" class="adminThumbnailSize">
        </td>
        <td align="center">
            <a href="admin_manage_users.php"><img src="./pic/users.png" class="adminThumbnailSize"></a>
        </td>
        <td align="center">
            <a href="export_db.php"><img src="./pic/export.png" class="adminThumbnailSize"></a>
        </td>
        <td align="center">
            <a href="uploadPage.php"><img src="./pic/import.png" class="adminThumbnailSize">
        </td>
        <td align="center">
            <a href="#"><img src="./pic/configure.png" class="adminThumbnailSize"></a>
        </td>
    </tr>
    <tr>
        <td align="center"><a href="add_words.php">Add Word</a></td>
        <td align="center"><a href="list.php">Word List</a></td>
        <td align="center"><a href="admin_manage_users.php">Users</a></td>
        <td align="center"><a href="export_db.php">Export</a></td>
        <td align="center"><a href="uploadPage.php">Import</a></td>
        <td align="center"><a href="#">Configure</a></td>
    </tr>
    <tr class="separator">
        <td></td>
    </tr>
    <tr>
        <td align="center">
            <a href="backup.php" onclick="backUpMessage()"><img src="./pic/backUp.png" class="adminThumbnailSize"></a>
        </td>
        <td align="center">
            <a href="report.php"><img src="./pic/report.png" class="adminThumbnailSize">
        </td>
        <td align="center">
            <a target="_blank" href="compile.php"><img src="./pic/compile.png" class="adminThumbnailSize"></a>
        </td>
        <td align="center">
            <a target="_blank" href="topic_management.php"><img src="./pic/topic_management.png" class="adminThumbnailSize"></a>
        </td>
        <td align="center">
            <a target="_blank" href="kiosk.php"><img src="./pic/kiosk.png" class="adminThumbnailSize">
        </td>
        <td align="center">
            <a href="lengths.php" onclick="lengthMessage()"><img src="./pic/lengths.png" class="adminThumbnailSize"></a>
        </td>
    </tr>
    <tr>
        <td align="center"><a href="backup.php" onclick="backUpMessage()">Backup</a></td>
        <td align="center"><a href="report.php">Report</a></td>
        <td align="center"><a href="compile.php">Compile</a></td>
        <td align="center"><a href="topic_management.php">Topic <br> Management</a></td>
        <td align="center"><a href="kiosk.php">Kiosk</a></td>
        <td align="center"><a href="lengths.php">Calculate <br> Lengths</a></td>
    </tr>
</table>
</div>
<div class="footer">
    <p>@ School of India for Languages and Culture (SILC)</p>
</div>
<script>

    function backUpMessage() {
        //document.getElementById("demo").innerHTML = "The database backup has been saved in the Sql_Scripts Folder.";
        alert('The database backup has been saved in the htdocs Folder.');
    }

    function lengthMessage() {
        alert('The word lengths have been calculated.');
    }

</script>
</body>

</html>
