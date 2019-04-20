<?php
include 'initialization.php';

$conn = OpenCon();

if (!$conn){ die("connection failed: ". $conn->connect_error); }
else { echo "connected successfully\n"; }

//insert basic data
$loadfile = fopen('../load.txt', 'r') or die('Unable to open file!');
echo "opened file" . "<br>";

$counter = 1;

while(!feof($loadfile)){
    $record = fgets($loadfile);
    $insertion = "INSERT INTO PROFILE (Email, Phone, Fname, Lname, Minit, Jdate, P_type, P_Password, Uname) VALUES ";
    $insertion .= "(" . $record . ");";

    if($conn->query($insertion) === TRUE) {
        echo $insertion . "<br>";
    }
    else {
        echo "error at record" . $counter . ":<br>" . $insertion . "<br>";
    }
    
    $counter++;
}
echo 'closed';

fclose($loadfile);
//close sql connection
CloseCon($conn);
?>