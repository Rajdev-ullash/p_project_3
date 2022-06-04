<?php include './connection.php' ?>

<?php 
$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data,true);

$project_name = $mydata['project_name'];

$sql = "SELECT * FROM projectDetails where project_name = '$project_name'";
$result =mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);

if($count>0){
  echo "<span style='color:red'>This name already exist.</span>"; 
}

else{
    echo "<span style='color:green'>Name is available.</span>";
}

?>