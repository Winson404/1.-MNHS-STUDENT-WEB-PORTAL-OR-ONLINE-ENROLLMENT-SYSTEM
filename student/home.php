<?php
	session_start();
	include '../config.php';
	include 'header.php';
?>

<?php
	if(isset($_SESSION['student_firstname']) && isset($_SESSION['student_id']) ) {
	$id = $_SESSION['student_id'];
?>
<style>

	.content {
		margin-left: 200px;
		padding: 20px;
		margin-top: 50px;
		position: relative;
	}

	.content .profile-container {
		border: 1px solid #cccccc;
		box-shadow: 3px 3px 5px #cccccc;
		position: relative; 
	
		border-radius: 10px;
		overflow: hidden;
		
	}

	.content .profile-container .row {
		top: 0; 
		left: 0;
	}

	.profile-container .row .col-md-12 {
		border: 3px solid #fff;
		background-color: #f2f2f2; 
		padding: 20px 20px;
		border-radius: 10px;
	}

	.profile-container .row .col-md-12 img {
		height: 170px; 
		width: 170px; 
		display: block; 
		margin-left: auto;
		margin-right: auto; 
		border-radius: 50%;
		box-shadow: 3px 3px 5px #cccccc; 
		border: 5px solid #36486b;
		position:relative; 
	}

	.profile-container .row .col-md-12 h2 {
		margin-bottom: 40px; 
		color: #36486b;
	}

	.profile-container .row .col-md-12 .flex {
		display: flex;
		margin: 10px;
	}

	.flex .col-md-4 {
		background-color: #36486b;
		color: #fff; 
		padding: 20px; 
		margin: 10px; 
		border-radius: 10px;
	}
	
	/* Extra small devices (phones, 600px and down) */
	@media only screen and (max-width: 600px) {

		.content .profile-container {
			border: 2px solid #cccccc;
			box-shadow: 2px 2px 4px #cccccc;
			padding:5px 20px; 
		}

		.profile-container .row .col-md-12 {
			padding: 15px 5px;
		}

		.profile-container .row .col-md-12 img {
			height: 130px; 
			width: 130px; 
		}

		.profile-container .row .col-md-12  h2{
			font-size: 20px;
		}

		.profile-container .row .col-md-12 .flex .col-md-4 {
			padding: 5px;

			width: 100%;
		}

		.profile-container .row .col-md-12 .flex .col-md-4 h3{
			font-size: 17px;
		}
		.profile-container .row .col-md-12 .flex .col-md-4 h4{
			font-size: 15px;
		}
	}

	/* Small devices (portrait tablets and large phones, 600px and up) */
	@media only screen and (min-width: 600px) {
	  .example {background: green;}
	}

	/* Medium devices (landscape tablets, 768px and up) */
	@media only screen and (min-width: 768px) {
	  .example {background: blue;}
	} 

	/* Large devices (laptops/desktops, 992px and up) */
	@media only screen and (min-width: 992px) {
	  
		
	  
	} 

	/* Extra large devices (large laptops and desktops, 1200px and up) */
	@media only screen and (min-width: 1200px) {
	  .example {background: pink;}
	}
</style>


<?php 
	$pending = mysqli_query($conn, "SELECT enrollment.*, level_section.*, faculty.*, registered_students.*  FROM enrollment, registered_students, level_section, faculty WHERE enrollment.student_id=registered_students.stud_Id AND enrollment.level_section_id=level_section.lev_sec_Id AND enrollment.faculty_id=faculty.fac_Id AND registered_students.stud_Id='$id' ");
	$row = mysqli_fetch_array($pending);
	if($row['status']== 'Enrolled') {
?>

<div class="content">
		<div class="profile-container">
			<div class="row">
				<div class="col-md-12">
					<img src="../images-students/<?php  echo $row['image'];?>" alt="image">
					<h2 align="center"><b><?php echo $row['student_firstname'];?> <?php echo $row['student_middlename'];?> <?php echo $row['student_lastname'];?> <?php echo $row['student_extname'];?></b></h2>
						<div class="flex">
							<div class="col-md-4" align="center">
								<h3><b>My Status</b></h3>
								<hr>
								<h4><?php echo $row['status'];?></h4>
							</div>
							<div class="col-md-4" align="center">
								<h3><b>My Section</b></h3>
								<hr>
								<h4><?php echo $row['year_level_to_enroll'];?>  <?php echo $row['section'];?></h4>
							</div>
							<div class="col-md-4" align="center">
								<h3><b>My Adviser</b></h3>
								<hr>
								<h4><?php echo $row['firstname'];?>  <?php echo $row['middlename'];?>  <?php echo $row['lastname'];?></h4>
							</div>
						</div>
				</div>
			</div>
		</div>
</div>

<?php } else { 

	$sql_query = mysqli_query($conn, "SELECT * FROM registered_students WHERE stud_Id='$id' ");
	while($row = mysqli_fetch_array($sql_query)) {
	?>
	<div class="content" style="margin-top: auto;">
		<div class="profile-container">
			<div class="row">
				<div class="col-md-12">
					<img src="../images-students/<?php echo $row['image'];?>" alt="">
					<h2 align="center"><b><?php echo $row['student_firstname'];?> <?php echo $row['student_middlename'];?> <?php echo $row['student_lastname'];?> <?php echo $row['student_extname'];?></b></h2>
						<div class="flex">
							<div class="col-md-4" align="center">
								<h3><b>My Status</b></h3>
								<hr>
								<h4><?php echo $row['status'];?></h4>
							</div>
							<div class="col-md-4" align="center">
								<h3><b>My Section</b></h3>
								<hr>
								<h4>Section is not applicable due to unconfirmed enrollment</h4>
							</div>
							<div class="col-md-4" align="center">
								<h3><b>My Adviser</b></h3>
								<hr>
								<h4>Adviser is not applicable due to unconfirmed enrollment</h4>
							</div>
						</div>
				</div>
			</div>
		</div>	
	</div>
	<?php } ?>


 <?php } ?>

<?php 
	} else {
		header("Location: ../index.php");
	}
?>