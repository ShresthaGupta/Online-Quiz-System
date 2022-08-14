<?php
	include("database.php");
	session_start();
	
	if(isset($_POST['submit']))
	{	
		$email = $_POST['email'];
	
		$pass=md5($_POST['cupassword']);

		$pass1 = md5($_POST['npassword']);
		$pass2= md5($_POST['copassword']);
		
		$str="SELECT * from admin WHERE email='$email'";
		$result=mysqli_query($con,$str);
		
		if((mysqli_num_rows($result))>0)	
		{
			if(($pass1==$pass2)&&($pass1!=$pass)){
				$str="UPDATE `admin` SET `password`='$pass1' where email='$email'";
				$res=mysqli_query($con,$str);
            echo "<center><h3><script>alert('Password is changed !!');</script></h3></center>";
            header("refresh:0;url=admin.php");
			}
        }
		/*else
		{
			echo "<center><h3><script>alert('Register yourself 1st !!');</script></h3></center>";
			header('location: register.php?q=1');
		}*/
    }
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Change Password</title>
		<link rel="stylesheet" href="scripts/bootstrap/bootstrap.min.css">
		<link rel="stylesheet" href="scripts/ionicons/css/ionicons.min.css">
		<link rel="stylesheet" href="css/form.css">
        <style type="text/css">
            body{
                  width: 100%;
                  background: url(image/book.png) ;
                  background-position: center center;
                  background-repeat: no-repeat;
                  background-attachment: fixed;
                  background-size: cover;
                }
          </style>
	</head>

	<body>
		<section class="login first grey">
			<div class="container">
				<div class="box-wrapper">				
					<div class="box box-border">
						<div class="box-body">
							<center> <h2 style="font-family: Noto Sans;">Change Password</h2> 
							<form method="post" action="" enctype="multipart/form-data">
                                <div class="form-group">
									<label>Enter Your Email:</label>
									<input type="email" name="email" class="form-control" required />
								</div>
								<div class="form-group">
									<label>Current Pasword:</label>
									<input type="password" name="cupassword" class="form-control" required />
								</div>
								<div class="form-group">
									<label>New Password:</label>
									<input type="password" name="npassword" class="form-control" required />
                                </div>
								<div class="form-group">
									<label>Confirm Password:</label>
									<input type="password" name="copassword" class="form-control" required />
								</div>
                                
								<div class="form-group text-right">
									<button class="btn btn-primary btn-block" name="submit">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>

		<script src="js/jquery.js"></script>
		<script src="scripts/bootstrap/bootstrap.min.js"></script>
	</body>
</html>

