<?php
    session_start(); //we need session for the log in thingy XD 
    include("functions.php");
    if($_SESSION['login']!==true){
        header('location:login.php');
    }
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


    <title>Update Profile</title>

   

  </head>
<?php
require_once "config.php";

$firstname = $lastname = $email = $password = "";
$first_name_error = $last_name_error = $email_error = $password_error = "";

if (isset($_POST["id"]) && !empty($_POST["id"])) {

    $id = $_POST["id"];

        $firstName = trim($_POST["firstname"]);
        if (empty($firstName)) {
            $first_name_error = "First Name is required.";
        } elseif (!filter_var($firstName, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))) {
            $first_name_error = "First Name is invalid.";
        } else {
            $firstName = $firstName;
        }

        $lastName = trim($_POST["lastname"]);

        if (empty($lastName)) {
            $last_name_error = "Last Name is required.";
        } elseif (!filter_var($firstName, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))) {
            $last_name_error = "Last Name is invalid.";
        } else {
            $lastName = $lastName;
        }

        $email = trim($_POST["email"]);
        if (empty($email)) {
            $email_error = "Email is required.";
        } elseif (!filter_var($firstName, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))) {
            $email_error = "Please enter a valid email.";
        } else {
            $email = $email;
        }

        

        $password = trim($_POST["password"]);
        if (empty($password)) {
            $password = "Password is required.";
        } else {
            $password = $password;
        }

    if (empty($first_name_error_err) && empty($last_name_error) &&
        empty($email_error) && empty($address_error) ) {

          $sql = "UPDATE `accounts` SET `firstname`= '$firstName', `lastname`= '$lastName', `email`= '$email', `password`= '$password' WHERE id='$id'";

          if (mysqli_query($conn, $sql)) {
              header("location: useraccount.php");
          } else {
              echo "Something went wrong. Please try again later.";
          }

    }

    mysqli_close($conn);
} else {
    if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
        $id = trim($_GET["id"]);
        $query = mysqli_query($conn, "SELECT * FROM accounts WHERE ID = '$id'");

        if ($user = mysqli_fetch_assoc($query)) {
            $firstName   = $user["firstname"];
            $lastName    = $user["lastname"];
            $email       = $user["email"];
            $password     = $user["password"];
        } else {
            echo "Something went wrong. Please try again later.";
            header("location: useredit.php");
            exit();
        }
        mysqli_close($conn);
    }  else {
        echo "Something went wrong. Please try again later.";
        header("location: useredit.php");
        exit();
    }
}
?>
	
  <body>
  <div class="header">
  <a href="#default" class="logo">Gym Membership System</a>
	</div>
	
	<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update User Profile</h2>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                      <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <div class="form-group <?php echo (!empty($first_name_error)) ? 'has-error' : ''; ?>">
                            <label>First Name</label>
                            <input type="text" name="firstname" class="form-control" value="<?php echo $firstName; ?>">
                            <span class="help-block"><?php echo $first_name_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($last_name_error)) ? 'has-error' : ''; ?>">
                            <label>Last Name</label>
                            <input type="text" name="lastname" class="form-control" value="<?php echo $lastName; ?>">
                            <span class="help-block"><?php echo $last_name_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($email_error)) ? 'has-error' : ''; ?>">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                            <span class="help-block"><?php echo $email_error;?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($password_error)) ? 'has-error' : ''; ?>">
                            <label>Password</label>
                            <textarea name="password" class="form-control"><?php echo $password; ?></textarea>
                            <span class="help-block"><?php echo $password_error;?></span>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="useraccount.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

  </body>
</html>
