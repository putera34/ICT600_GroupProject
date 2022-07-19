<?php
    session_start(); //we need session for the log in thingy XD 
    include("functions.php");
    if($_SESSION['login']!==true){
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
      <title>Admin Profile</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
      <style type="text/css">
          .wrapper {
              width: 1200px;
              margin: 0 auto;
          }
      </style>
	  
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="header.css">
</head>
<body>

 <div class="header">
  <a href="#default" class="logo">Gym Membership System</a>
  <div class="header-right">
    <a href="adminhome.php">Home</a>
	<a href="adminabout.php">About Us</a>
    <a href="adminapproval.php">Approval</a>
    <a  class="active" href="adminaccount.php">Profile</a>
  </div>
</div>

<div style="padding-left:20px">
  <h1>Admin Profile</h1>
<strong>Hi, <?php echo $_SESSION['firstname'] ?></strong>
<div class="pull-right">
                <?php
                if(isset($_POST['logout'])){
                    session_destroy();
                    header('location:adminhome.php');
                }
    
                ?>
                <form method="post">
					<br>
                    <button name="logout" class="btn btn-danger my-2">Logout</button>
                </form>
            </div>
</div>
<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
              <h3 class="text-center">Profile Detail</h3>
                <div class="col-md-12">
                    <div class="page-header clearfix">
                    </div>
					
                    <?php
                    // Include config file
                    require_once "config.php";

                    // select all users
					$type = $_SESSION["type"];
                    $data = "SELECT * FROM accounts WHERE type = '$type'";
                    if($accounts = mysqli_query($conn, $data)){
                        if(mysqli_num_rows($accounts) > 0){
                            echo "
							
							
							<table class='table table-bordered table-striped'>
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>";
                                while($user = mysqli_fetch_array($accounts)) {
                                    echo "
									
									<tr>
                                            <td>" . $user['id'] . "</td>
                                            <td>" . $user['firstname'] . "</td>
                                            <td>" . $user['lastname'] . "</td>
                                            <td>" . $user['email'] . "</td>
                                            <td>" . $user['type'] . "</td>";
                                    echo '  <td>
												
                                                <a href="adminedit.php?id=' . $user['id'] . '"class="btn btn-warning">Edit Profile</a>';
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>
                                </table>";
                            mysqli_free_result($accounts);
                        } else{
                            echo "<p class='lead'><em>No records found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
                    }
					

                    // Close connection
                    mysqli_close($conn);
                    ?>
                </div>
            </div>
        </div>

</body>
</html>
