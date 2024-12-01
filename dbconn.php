<?php 
$servername ="localhost";
$username="root";
$password="";
$dbname="jobsafer";
$conn = new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error){
   // echo "Connection Failed";
    die ("Connection Failed;".$conn->connect_error);
}
else {
   // echo "Connection Successful";
}
?> 