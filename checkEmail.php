<?php include './connection.php' ?>

<?php 
$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data,true);

$student_email = $mydata['student_email'];

$sql = "SELECT * FROM studentRegistration where student_email = '$student_email'";
$result =mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);

if($count>0){
  echo "<span style='color:red'>Email already exist.</span>"; 
}

else{
    echo "<span style='color:green'>Email available for registration.</span>";
}

?>