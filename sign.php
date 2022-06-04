<?php
	session_start();
?>


<!DOCTYPE html>
<html>

<head>
	<title>SignUp and Login</title>
	<link rel="stylesheet" type="text/css" href="sign.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    
</head>

<body>

	<div class="container" id="container">
		<div class="form-container sign-up-container">

			<form action="" id="register">
				<h1>Create Account</h1>
				<span id="name"></span>
				<input type="text" name="name" id="name" placeholder="Name" required>
				<input type="text" name="student_id" id="student_id" placeholder="Student Id" onInput="checkStudentId()" required>
				<span id="checkStudentId"></span>
				<input type="email" name="email" id="email" placeholder="Email" onInput="checkEmail()" required>
				<span id="check_email"></span>
				<input type="password" name="pass" id="pass" placeholder="Password" required>
				
				<button type="submit" name="submit" id="signup" value="Submit">SignUp</button>
			</form>
		</div>
		<div class="form-container sign-in-container">
			<form action="" method="post" enctype="multipart/form-data">
				<h1>Sign In</h1>
				<input type="text" name="user_id" id="user_id" placeholder="Student Id / Teacher Id">
				<input type="password" name="user_pass" id="user_pass" placeholder="Password">
			    <button type="submit" name="login" id="login" value="login">Sign In</button>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h1>Welcome Back!</h1>
					<p>To keep connected with us please login with your personal info</p>
					<button class="ghost" id="signIn">Sign In</button>
				</div>
				<div class="overlay-panel overlay-right">
					<h1>Hello, Friend!</h1>
					<p>Enter your details and start journey with us</p>
					<button class="ghost" id="signUp">Sign Up</button>
				</div>
			</div>
		</div>
	</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/jquery.validate.min.js" integrity="sha512-FOhq9HThdn7ltbK8abmGn60A/EMtEzIzv1rvuh+DqzJtSGq8BRdEN0U+j0iKEIffiw/yEtVuladk6rsG4X6Uqg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="validator.js"></script>

	<script type="text/javascript">
		const signUpButton = document.getElementById('signUp');
		const signInButton = document.getElementById('signIn');
		const container = document.getElementById('container');

		signUpButton.addEventListener('click', () => {
			container.classList.add("right-panel-active");
		});
		signInButton.addEventListener('click', () => {
			container.classList.remove("right-panel-active");
		});
	</script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="./sign.js"></script>

</body>

</html>
<?php
include './connection.php'
?>
<?php
	if (ISSET($_POST["login"])){
	$user_password = $_POST["user_pass"];
	// echo "$user_pass";
$user_id = $_POST["user_id"];
if(!empty($user_id) && !empty($user_password)){
	$sql = "select teacher_id, teacher_pass from teacherRegistration where teacher_id='$user_id' and teacher_pass='$user_password'";
	$sql1 = "select student_id, student_pass from studentRegistration where student_id='$user_id' and student_pass='$user_password'";

	$r = mysqli_query($conn, $sql);
	$r1 = mysqli_query($conn, $sql1);

	if (mysqli_num_rows($r) > 0) {
		$_SESSION['user_id'] = $user_id;
		$_SESSION['teacher_login_status'] = "logged in";
		header('Location:./teacher/teacher.php');
		
	} else if (mysqli_num_rows($r1) > 0) {

		$_SESSION['user_id'] = $user_id;
		$_SESSION['student_login_status'] = "logged in";
		
		header("Location:./student.php");
	} else {
		echo "Incorrect id or password";
	}

  
}
else {
	echo "All fields are required";
}
}

?>

