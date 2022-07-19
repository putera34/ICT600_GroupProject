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
  <meta charset="UTF-8">
      <title>Admin Approval</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
      <style type="text/css">
          .wrapper {
              width: 1200px;
              margin: 0 auto;
          }
      </style>
	<link rel="stylesheet" href="header.css">

  </head>

  <body>

	<div class="header">
	  <a href="#default" class="logo">Gym Membership System</a>
	  <div class="header-right">
		<a  href="adminhome.php">Home</a>
		<a  href="adminabout.php">About Us</a>
		<a class="active" href="adminapproval.php">Approval</a>
		<a href="adminaccount.php">Profile</a>
	</div>
	</div>

	<div style="padding-left:20px">
	  <h2>Membership Approval</h2>
	  <strong>Hi, <?php echo $_SESSION['type'] ?></strong> <br> <br>
	  <strong> Here is some request on Gym membership</strong>
	  
	</div>

    <main role="main">

      <section class="jumbotron text-center">
      <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">New Users</h2>
                        <a href="regnewmember.php" class="btn btn-success pull-right">Register new gym member</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";

                    // select all users
					$id = $_SESSION["id"];
                    $data = "SELECT * FROM requests";
                    if($requests = mysqli_query($conn, $data)){
                        if(mysqli_num_rows($requests) > 0){
                            echo "<table class='table table-bordered table-striped'>
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                      </tr>
                                   </thead>
                                    <tbody>";
                                while($user = mysqli_fetch_array($requests)) {
                                    echo "<tr>
                                            <td>" . $user['id'] . "</td>
                                            <td>" . $user['firstname'] . "</td>
                                            <td>" . $user['lastname'] . "</td>
                                            <td>" . $user['email'] . "</td>";
                                    echo '  <td>     
									
                                                <a href="accept.php?id=' . $user['id'] . '" class="btn btn-success"> Accept </a>' .
                                                 '<a href="reject.php?id=' . $user['id'] . '" class="btn btn-danger"> Reject  </a>' ;
                                    echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>
                                </table>";
                            mysqli_free_result($requests);
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
    </div>
          
      </section>

    </main>
 </body>
</html>
