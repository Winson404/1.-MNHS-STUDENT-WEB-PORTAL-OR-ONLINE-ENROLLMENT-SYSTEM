<!DOCTYPE html>
<?php
    session_start();
    include '../config.php';
    if(isset($_SESSION['student_firstname']) && isset($_SESSION['student_lastname']) && isset($_SESSION['student_id'])) {
    $id = $_SESSION['student_id'];  //USED to FETCH INFORMATION OF THE SPECIFIC ADMIN WHO LOGGED IN
?>
<html>
<head>
    <title><?php echo $_SESSION['student_firstname']; ?> <?php echo $_SESSION['student_lastname']; ?> | MNHS Web Portal</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--CUSTOMIZED CSS-->
    
    <!---ICON FOR WEBSITE--->
    <link rel="shortcut icon" type="image/png" href="../images/MNHS LOGO.png">

    <!--BOOTSTRAP LAYOUT-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- BOOTSTRAP ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <!--POP UP MODAL--->
    <script src="../js/bootstrap.min.js"></script>

    <!-- <script>
          function preventBack(){window.history.forward()};
          setTimeout("preventBack()", 0);
          window.onunload= function(){null;}
    </script> -->
    
<style>
  * {
    font-family: Arial, Helvetica, sans-serif;
  }
body {
  margin: 0;
    font-family: Arial, Helvetica, sans-serif;
    overflow: auto;
    position: relative;
    overflow-x: auto;
    background-color: #F5F5F5;
    box-sizing: border-box;
}


@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {
  	float: left;
  }
  div.content {
  	margin-left: 0;
  }
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }

}

.navbar a {
  float: right;
}


  /* Extra small devices (phones, 600px and down) */
  @media only screen and (max-width: 600px) {
   
  }

  /* Small devices (portrait tablets and large phones, 600px and up) */
  @media only screen and (min-width: 600px) {
   
  }

  /* Medium devices (landscape tablets, 768px and up) */
  @media only screen and (min-width: 768px) {
   
  } 

  /* Large devices (laptops/desktops, 992px and up) */
  @media only screen and (min-width: 992px) {
   
  } 

  /* Extra large devices (large laptops and desktops, 1200px and up) */
  @media only screen and (min-width: 1200px) {
    
  }

</style>
</head>
<body>


<?php   
    // <!-- FETCHING ADMIN INFORMATION -->                
    $query ="SELECT * FROM registered_students WHERE stud_Id ='$id' ";
    $sql = mysqli_query($conn,$query);
    while($row = mysqli_fetch_array($sql)) {
?>

<nav class="navbar fixed-top navbar-dark bg-dark">
      <?php if($row['status'] == 'Pending'): ?>
      <a href="home-pending.php" class="nav-link "><i class="bi bi-house-fill"></i> Home</a>
      <?php else: ?>
      <a href="home-enrolled.php" class="nav-link "><i class="bi bi-house-fill"></i> Home</a>
      <?php endif; ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><i class="bi bi-person-circle"></i> <?php echo $row['student_firstname']; ?></a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="student_profile.php"><i class="bi bi-eye-fill"></i> View</a></li>
          <li><a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#logoutmodal"><i class="bi bi-box-arrow-left"></i> Logout </a></li>
        </ul>
      </li>
</nav>

<!--##########################################################################-->
<!-------------------------------LOGOUT MODAL------------------------------------>
<!-- The Modal -->
<div class="modal" id="logoutmodal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-info" style="color: #fff;">
        <h5 class="modal-title"><i class="bi bi-person-circle"></i> Student logout</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <?php if($row['gender'] === 'Male'):?>
            <h5>Mr. <?php echo $row['student_lastname'];?>, are you sure you want to logout?</h5>
        <?php else: ?>
            <h5>Ma'am <?php echo $row['student_lastname'];?>, are you sure you want to logout?</h5>
        <?php endif; ?>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <a class="btn btn-info" href="../logout.php" class="w3-bar-item w3-button" style="color: #fff;"><i class="bi bi-check-circle"></i> Confirm</a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Close</button>
      </div>

    </div>
  </div>
</div>
<!-------------------------------END LOGOUT MODAL-------------------------------->
<!--##########################################################################-->
<?php
    } 
?>


<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</body>
</html>


<?php
// ------------------------------CLOSING THE SESSION OF THE LOGGED IN USER WITH else statement----------//
    } else {
     header('Location: ../index.php');
    }
?>
