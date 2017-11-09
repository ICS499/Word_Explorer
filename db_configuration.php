<?php
DEFINE('DATABASE_HOST', 'localhost');
DEFINE('DATABASE_DATABASE', 'metroics_words');

// To be used on the local host
//DEFINE('DATABASE_USER', 'root');
//DEFINE('DATABASE_PASSWORD', '');

// To be used on the remote host
DEFINE('DATABASE_USER', 'metroics_ics499');
DEFINE('DATABASE_PASSWORD', 'Metro_ics123');



$db = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_DATABASE);
$db->set_charset("utf8");
function run_sql($sql_script)
{
    global $db;
    // check connection
    if ($db->connect_error)
    {
        trigger_error(print_r(debug_backtrace()).'.Database connection failed: '  . $db->connect_error, E_USER_ERROR);
    }
    else
    {
        $result = $db->query($sql_script);
        if($result === false)
        {
            trigger_error('Stack Trace: '.print_r(debug_backtrace()).'Invalid SQL: ' . $sql_script . '; Error: ' . $db->error, E_USER_ERROR);
        }
        else if(strpos($sql_script, "INSERT")!== false)
        {
            return $db->insert_id;
        }
        else
        {
            return $result;
        }
    }
}
