<?php
session_start();
  $id= $_SESSION['user_id'];

if ($_SESSION['teacher_login_status'] != "logged in" and !isset($_SESSION['user_id']))
    header('Location:./sign.php');



if (isset($_GET['sign']) and $_GET['sign'] == "out") {
    $_SESSION['teacher_login_status'] = "logged out";
    unset($_SESSION['user_id']);
    header('Location:../sign.php');
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <title>Document</title>
</head>
<body>
    <?php include './navbar.php' ?>
<div class="container">
    <table class="table">
        <thead>
            <tr>
               <th scope="col">Id</th>
               <th scope="col">Project Title</th>
               <th scope="col">Project Description</th>
               <th scope="col">Group Name</th>
               <th scope="col">Member one Id</th>
               <th scope="col">Member two Id</th>
               <th scope="col">Member three Id</th>
               <th scope="col">Group Leader Id</th>
               <th scope="col">Approval</th>
               <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody id="tbody"></tbody>
    </table>
</div>


          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="./admin_project.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

</body>
</html>