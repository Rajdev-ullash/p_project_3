<?php
$username="root";
$password="";
$hostname="localhost";
$db="Student-Project-Lab";

$conn = mysqli_connect($hostname,$username,$password,$db);

if(!$conn){
    
    die("Could not connect: " . mysqli_connect_error());

}


?>