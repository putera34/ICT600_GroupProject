<?php
    session_start(); //we need session for the log in thingy XD 
    include("functions.php");
?>
<!DOCTYPE html>
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
      <style type="text/css">
          .wrapper {
              width: 1200px;
              margin: 0 auto;
          }
      </style>
	  <title>Account Status</title>
  </head>
  <body>
  
  <div class="header">
  <a href="#default" class="logo">Gym Membership System</a>
</div>

  
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
              <h1 class="text-center">Pending membership</h1><br><br><br>
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h5 class="pull-left">Please wait while the admin processing the request.</h5>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";

                    // select all users
                    $data = "SELECT * FROM requests";
                    if($accounts = mysqli_query($conn, $data)){
                        if(mysqli_num_rows($accounts) > 0){
                            echo "<table class='table table-bordered table-striped'>
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                      </tr>
                                    </thead>
                                    <tbody>";
                                while($user = mysqli_fetch_array($accounts)) {
                                    echo "<tr>
                                            <td>" . $user['id'] . "</td>
                                            <td>" . $user['firstname'] . "</td>
                                            <td>" . $user['lastname'] . "</td>
                                            <td>" . $user['email'] . "</td>";
                                  
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
					<a href="login.php" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>
