<?php

//Get Variables
$page = 1;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

function log_db($err){
    if ($err) {
        echo "<h2>Error code: $err</h2><br>";
        return false;
    }
}

function connect($host = 'localhost', $user = 'root', $password='', $dbname = 'travel')
{
    $link = mysql_connect($host, $user, $password) or die('Connection error');
    mysql_select_db($dbname) or die('Db open error');
}