<!doctype html>
<html lang="en">
  <head>
  	<title>Admin Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="style1.css">

	</head>
	<body class="img js-fullheight" style="background-image: url(img/bg.jpg);">
		<section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-md-6 text-center mb-5">
						<h2 class="heading-section">Welcome Admin</h2>
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col-md-6 col-lg-4">
						<div class="login-wrap p-0">
							<h3 class="mb-4 text-center">Hi, Admin!</h3>
							<form action="#" class="signin-form" method="post">
								<div class="form-group">
									<input type="text" name="username" class="form-control" placeholder="Username" required>
								</div>
								<div class="form-group">
									<input id="password-field" type="password" name="password" class="form-control" placeholder="Password" required>
									<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
								</div>
								<div class="form-group">
									<button type="submit" name="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
								</div>
								
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php
session_start();

if(isset($_SESSION['admin_id'])){
    // If admin is already logged in, redirect to admin dashboard
    header("Location: admin_dashboard.php");
    exit();
}

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Database connection variables
    $db_host = "localhost";
    $db_name = "fyp";
    $db_user = "root";
    $db_pass = "";

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    // Check connection
    if (!$conn) 
    {
        die("Connection failed: " . mysqli_connect_error());
    }

    // SQL query to check whether the entered username and password are valid
    $sql = "SELECT * FROM admin WHERE admin_username='$username' AND admin_password='$password'";
    $result = mysqli_query($conn, $sql);

    // Check if there is a match for the entered username and password
    if (mysqli_num_rows($result) > 0) {
        // Set session variables to indicate that admin is logged in
        $row = mysqli_fetch_assoc($result);
        $_SESSION['admin_id'] = $row['admin_id'];
        $_SESSION['admin_username'] = $row['admin_username'];
        
        // Redirect to the admin dashboard
        header("Location: admin_dashboard.php");
        exit();
    } else {
        // Display error message
        echo '<div class="alert alert-danger">Invalid username or password</div>';
    }

    // Close database connection
    mysqli_close($conn);
}
?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Admin Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="style1.css">

	</head>

		
		
	<script src="js1/jquery1.min.js"></script>
  <script src="js1/popper1.js"></script>
  <script src="js1/bootstrap1.min.js"></script>
  <script src="js1/main1.js"></script>

	</body>
</html>

