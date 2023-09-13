<?php
    include 'config.php';
    if(isset($_SESSION['faculty_username']) && isset($_SESSION['faculty_id'])) {
    	header("Location: admin/dashboard.php");
    } elseif(isset($_SESSION['student_firstname']) && isset($_SESSION['student_lastname']) && isset($_SESSION['student_id']) ) {
    	$check_status = mysqli_query($conn, "SELECT * FROM registered_students");
    	$row = mysqli_fetch_array($check_status);
    	if($row['status'] == "Pending") {
    		header("Location: student-side/home-pending.php");
    	} else {
    		header("Location: student-side/home-enrolled.php");
    	}
    } 
    else {
?>

<!DOCTYPE html>
<html>
	<head>
		<title>MNHS Web Portal</title>
		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	 	<!---ICON FOR WEBSITE--->

		<link rel="shortcut icon" type="image/png" href="images/MNHS LOGO.png">
		<!-- CUSTOMIZED CSS -->
		<link rel="stylesheet" href="custom - css/style.css">

		<!-- BOOTSTRAP LINK / BOOTSTRAP LAYOUT -->
	    <link href="css/bootstrap.min.css" rel="stylesheet">
	    <script src="js/bootstrap.bundle.min.js"></script>

	    <!-- JAVASCRIPT TO POP UP MODAL BACK WHEN LOGIN FAILS-->
	    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>

		<!-- BOOTSTRAP ICONS -->
  		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

	    <!--GOOGLE FONTS FOR WORD - MNHS  -->
	    <link href='https://fonts.googleapis.com/css?family=Alfa Slab One' rel='stylesheet'>

	    <style>
	    	body {
	    		padding: 0;
	    		margin: 0;
	    		box-sizing: border-box;
	    	}
	    	.navbar {
	    		box-shadow: 1px 1px 5px #cccccc;
	    		width: 100vw;
	    	}
	    	#container-fluid {
	    		width: 100vw;
	    	}
	    	#MNHS {
	    		font-family: 'Alfa Slab One', cursive;
	    		font-size: 25px;
	    		padding: 0;
	    		color: #fff;
	    	}
	    	#MNHS:hover {
	    		opacity: .8;
	    	}
	    	#navbarTogglerDemo01 ul li a {
	    		text-decoration: none;
	    		
	    		margin-right: 20px;
	    	}
	    </style>
	</head>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container-fluid" id="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation" >
      <span class="navbar-toggler-icon" id="toggler"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand me-auto" href="index.php" id="MNHS"><img src="images/MNHS LOGO.png" alt="" width="30" height="34" class="d-inline-block align-text-top"> M N H S</a>
    <ul class="navbar-nav  mb-2 mb-lg-0 d-flex">
        <li class="nav-item">
         <a href="shs_courses.php" class="shs-link">SHS COURSES</a>
        </li>
        <li class="nav-item">
          <a href="aboutus.php">ABOUT US</a>
        </li>
        <li class="nav-item">
          <a href="" data-bs-toggle="modal" data-bs-target="#loginmodal">LOGIN</a>
        </li>
    </ul>
    </div>
  </div>
</nav>

<body>

<?php
  include 'login.php'; 
  }// CLOSING THE SESSION SET ABOVE 
?>
