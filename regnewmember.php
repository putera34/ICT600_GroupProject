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
	
		<link rel="stylesheet" href="header.css">


    <title>New Member Register</title>

   

  </head>
    <?php
        if(isset($_POST['signup'])){
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $message = "$lastname $firstname would like to request an account.";
            $query = "INSERT INTO `requests` (`id`, `firstname`, `lastname`, `email`, `password`, `message`, `date`) VALUES (NULL, '$firstname', '$lastname', '$email', '$password', '$message', CURRENT_TIMESTAMP)";
            if(performQuery($query)){
                echo "<script>alert('Your account request is now pending for approval. Please wait for confirmation. Thank you.')</script>";
            }else{
                echo "<script>alert('Unknown error occured.')</script>";
            }
        }
    
    ?>
	
  <body>
  <div class="header">
  <a href="#default" class="logo">Gym Membership System</a>

	</div>
	
      <div class="container">
            <form method="post" class="form-signin">
			<div class="login-box">
			<br><br>
              <h1 class="h3 mb-3 font-weight-normal">New Member</h1>
             
			 <div class="textbox">
				 <label for="inputEmail" class="sr-only">Firstname</label>
				  <input name="firstname" type="text" id="inputEmail" class="form-control" placeholder="Firstname" required autofocus>
             </div>

			 <div class="textbox">
			  <label for="inputEmail" class="sr-only">Lastname</label>
              <input name="lastname" type="text" id="inputEmail" class="form-control" placeholder="Lastname" required autofocus>
             </div>

			<div class="textbox">
			  <label for="inputEmail" class="sr-only">Email address</label>
              <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
             </div>

			<div class="textbox">			  
			  <label for="inputPassword" class="sr-only">Password</label>
              <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
             </div>
              <br>
			  <button name="signup" class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
              <br><br>
			  <a href="adminapproval.php" class="mt-5 mb-3 text-muted">Go back</a>
             </div>
           
		   </form>
          </div>

  </body>
</html>
