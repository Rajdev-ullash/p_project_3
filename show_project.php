<?php
include('connection.php');
 //Retrieve section Information
 session_start();
 $user_id=$_SESSION['user_id'];
 $sql = "SELECT * FROM projectDetails where student4='$user_id'";
//  $v = mysqli_query($conn, $sqp)
 $result = $conn -> query($sql);
 if($result->num_rows>0){
     $data = array();
     while($row= $result->fetch_assoc()){
         $data[] = $row;
     }
}

 echo json_encode($data);
?>