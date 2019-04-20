<?php
//used to close connection
function OpenCon()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = ""; //change password to meet your requirements
    $db = "animal";
    $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn->error);

    return $conn;
}

//used to close connection
function CloseCon($conn)
{
    $conn->close();
}
?>