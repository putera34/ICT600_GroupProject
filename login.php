<?php
    session_start(); //we need session for the log in thingy XD 
    include("functions.php");
?>
<!doctype html>
<html lang="en">
  <head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

	<link rel="stylesheet" href="login.css">
	<link rel="stylesheet" href="header.css">
    <title>Sign In</title>

 
  </head>

  <body class="text-center">
  <div class="header">
  <a href="guesshomepage.php" class="logo">Gym Membership System</a>
  <div class="header-right">
    <a  href="index.php">Home</a>
	<a href="about.php">About Us</a>
    <a class="active" href="login.php">Login</a>
	
	</div>
	</div>
      <?php
      
        if(isset($_POST['signin'])){
            $password = $_POST['password'];
            $email = $_POST['email'];
            $query = "SELECT * from `accounts`;";
            if(count(fetchAll($query)) > 0){ //this is to catch unknown error.
                  foreach(fetchAll($query) as $row){
                    if($row['email']==$email&&$row['password']==$password){
                        $_SESSION['login'] = true;
                        $_SESSION['type'] = $row['type'];
						$_SESSION['firstname'] = $row['firstname'];
						$_SESSION['id'] = $row['id'];
                        header('location:homepage.php');
                    }
					if($row['email']==$email&&$row['password']==$password&&$row['type']=="Gym Member"){
                        $_SESSION['login'] = true;
                        $_SESSION['type'] = $row['type'];
						$_SESSION['firstname'] = $row['firstname'];
                        header('location:homepage.php');
                    }
					else{
                        echo "<script>alert('Wrong login details.')</script>";
                    }
                }
            }else{
                echo "<script>alert('Error.')</script>";
            }

        }
      
      ?>
      <div class="container">
            <form method="post" class="form-signin">
			<div class="login-box">
              <h1 class="h3 mb-3 font-weight-normal">Sign In</h1>
                
              <div class="textbox">  
				  <label for="inputEmail" class="sr-only">Email address</label>
				  <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
              </div>
			  
			  <div class="textbox">  
				  <label for="inputPassword" class="sr-only">Password</label>
				  <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
				</div>
				
              <button name="signin" class="btn btn-primary" type="submit">Sign in</button>
              
              
			  <a href="accountstatus.php" class="btn btn-warning"> Account Status </a>
			  <br><br>
			  <a href="signup.php" class="mt-5 mb-3 text-muted">Create an account</a>
			 
			</div>           
		   </form>
          </div>
      
  </body>
</html>
