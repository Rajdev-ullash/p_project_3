<?php include '../connection.php'; ?>

<?php 
session_start();
    $data = stripslashes(file_get_contents("php://input"));
    $mydata = json_decode($data,true);

    $id= $mydata['sid'];
    $status="Reject";

        $sql ="UPDATE projectdetails SET status_approval='$status' WHERE id={$id} ";
        if($conn->query($sql)==TRUE){
            echo 1;
        }
        else{
            echo "failed to delete error!" . mysqli_error($conn);
        }
    
   

?>