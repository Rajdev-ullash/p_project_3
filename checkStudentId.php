<?php include './connection.php' ?>

<?php 
$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data,true);

$student_id = $mydata['student_id'];

$sql = "SELECT * FROM studentRegistration where student_id = '$student_id'";
$result =mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);

if($count>0){
  echo "<span style='color:red'>Student Id already exist.</span>"; 
}

else{
    echo "<span style='color:green'>Student id available for registration.</span>";
}

?>