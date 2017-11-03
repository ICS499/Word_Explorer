<?php
header( 'Content-Type: text/html; charset=utf-8' );
require('db_configuration.php');
require('language_processor_functions.php');
calculate_lengths(DATABASE_HOST,DATABASE_USER,DATABASE_PASSWORD,DATABASE_DATABASE);

/* calculate lengths */
function calculate_lengths($host,$user,$pass,$name)
{
    $link = mysqli_connect($host, $user, $pass);
    mysqli_select_db($link, $name);

    $discrepancies = array();
    $sql = "SELECT word_id,length,telugu_word FROM words";
    $result = run_sql($sql);

    if ($result->num_rows > 0) {
        // output data of each
        foreach ($result as $row) {

            //var_dump($row);
            echo '<br>';
            $verifiedLength = count(getWordChars($row["telugu_word"]));
            if ($verifiedLength != $row['length']) {
                $sql = 'UPDATE words SET length=\'' . $verifiedLength . '\' WHERE word_id=' . $row['word_id'] . ';';
                run_sql($sql);
                array_push($discrepancies, $row['telugu_word']);
            }
        }
    } else {
        echo "0 results";
    }

    $result->close();
    /*
    echo '<h2><p>The following words were corrected:</p>';

    foreach ($discrepancies as $word){
        echo $word . '<br>';
    }

    echo '</h2>';
    */

}

?>