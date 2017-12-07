<?php
require_once('db_configuration.php');
require_once('language_processor_functions.php');
require_once('utility_functions.php');
require_once('common_sql_functions.php');
//header('Content-Type: text/html; charset=utf-8');

/**
 * @param $topic
 * @param $length
 * @param $level
 * @param $telugu_word
 * @param $english_word
 * @param $telugu_in_english
 * @param $english_in_telugu
 * @param $image_name
 * @param $audio_name
 * @param $description
 * @param $notes
 */
function insertIntoWordsTable($topic, $length, $level, $telugu_word, $english_word, $telugu_in_english, $english_in_telugu,
                              $image_name, $audio_name, $description, $notes)
{
    //Check to see if entered words exists in the DB.
    $sqlCheck = 'SELECT * FROM words WHERE telugu_word = \'' . $telugu_word . '\';';
    $result = run_sql($sqlCheck);
    $num_rows = $result->num_rows;

    if ($num_rows == 0) {
        //insert each new word into words table.
        insertIntoTopicsTable($topic);
        $sqlAddWord = 'INSERT INTO words (topic, length, level, telugu_word, english_word, telugu_in_english, english_in_telugu,
				image_name, audio_name, description, notes) VALUES (\'' . $topic . '\', \'' . $length . '\', \'' . $level . '\', \'' . $telugu_word . '\',
				 \'' . $english_word . '\', \'' . $telugu_in_english . '\', 
				\'' . $english_in_telugu . '\', \'' . $image_name . '\', \'' . $audio_name . '\',
				 \'' . $description . '\' ,\'' . $notes . '\');';

        run_sql($sqlAddWord);

        echo '<h2 style="color:	green;" class="upload">Success: Word is added.</h2>';
    } else {
        //The words already exists in the database.
        echo '<h2 style="color:	red;" class="upload">Word already exists in the database.</h2>';
        //Do Nothing if the words already exists in the DB.
    }
}

/**
 * Inserts a new topic into the Topics table
 * @param $topic
 */
function insertIntoTopicsTable($topic){
    $sqlAddTopic = 'REPLACE INTO topics SET topic = (\'' . $topic . '\');';
    run_sql($sqlAddTopic);
}

?>
