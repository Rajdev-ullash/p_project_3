<?php include './connection.php' ?>

<?php 
$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data,true);

$student1=$mydata['student1'];
$student2=$mydata['student2'];
$student3=$mydata['student3'];

// $sql = "SELECT * FROM projectDetails where student1 = '$student1' OR student2 = '$student1' OR student3 = '$student1' OR  student1 = '$student2' OR student2 = '$student2' OR student3 = '$student2' ";
$sql = "SELECT * FROM projectDetails where student1 = '$student1' OR student2 = '$student1' OR student3 = '$student1'";
$result =mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);

if($count>0){
  echo "<span style='color:red'>This Member is already exist.</span>"; 
}

else{
    echo "<span style='color:green'>This member is available.</span>";
}

?>