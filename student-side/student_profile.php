<!DOCTYPE html>
<?php include 'header.php'; ?>

<style>
	.jumbotron {
		padding: 50px; 
		margin: 20px auto;
	}
	.jumbotron .general-info {
		background-color: #ffffff; 
		padding: 30px;
		border-radius: 5px;
		overflow: hidden;
		box-shadow: 1px 1px 7px 1px #cccccc;
	}
	.jumbotron .general-info h5 {
		padding: 10px;
	}
	.jumbotron .general-info #exists, #success{
		position: absolute;
		color: #fff;
		right: 80px; 
		top: 80px; 
		box-shadow: 1px 1px 5px 1px #cccccc;
		background-color: #cc0000;
	}
	.jumbotron .general-info #success {
		background-color: #4BB543;
	}
	.jumbotron .general-info .row .profile-container {
		padding: 15px;
		overflow: hidden;
	}
	.jumbotron .general-info .row .profile-container .content{
		background-color:#fff; 
		width: auto; 
		display: block; 
		margin: auto;
		text-align: center;
		overflow: hidden;
		box-shadow: 1px 1px 5px 1px #cccccc;	
		border-radius: 2px;
	}
	.jumbotron .general-info .row .profile-container .contact label{
		width: 224px;
		text-align: left;
		overflow: hidden;
	}
	.jumbotron .general-info .row .profile-container img {
		height: 200px;
		width: 200px;
		margin: 15px auto;
	}
	.jumbotron .general-info .row .profile-container .row .button-edit-container {
		margin: auto;
	}
	.jumbotron .general-info .row .profile-container .row .button-edit-container button {
		width: 224px;
		display: block;
		margin: auto;
		background-color: #4285F4;
		color: #fff;
	}
	.jumbotron .general-info .row .personal-information-container {
		padding: 15px;
	}
	.jumbotron .general-info .row .personal-information-container .row h6{
		background-color: #4285F4; 
		padding: 10px; 
		color: #fff;
	}
	.jumbotron .general-info .row .personal-information-container .row label{
	 	margin: 5px;
	 }
	

	/*------------------FOR RESPONSIVE--------------------*/

		@media screen and (max-width: 400px) {
			.jumbotron {
				padding: 0;
				margin: 50px auto;
			}
			.jumbotron .general-info {
				padding: 15px;
			}
			.jumbotron .general-info h5 {
				margin-left: -10px;
				padding: 8px;
				font-size: 17px;
				margin-bottom: -15px;
			}
			.jumbotron .general-info #exists, #success {
				font-size: 13px;
				position: relative;
				color: #fff;
				left: auto;
				right: auto;
				top: 10px; 
				box-shadow: 1px 1px 5px 1px #cccccc;
				background-color: #cc0000;
				height: auto;
				width: auto;
				padding: 6px;
			}
			.jumbotron .general-info .row .profile-container {
				padding: 5px;
			}
			.jumbotron .general-info .row .profile-container img {
				height: 150px;
				width: 150px;
			}
			.jumbotron .general-info .row .profile-container .row h6 {
				margin-top: -5px;
				margin-bottom: 1px;
			}
			.jumbotron .general-info .row .profile-container .row p {
				font-size: 13px;
				margin-bottom: 2px;
			}
			.jumbotron .general-info .row .profile-container .row .button-edit-container button {
				width: 174px;
				margin-top: -1px;
			}
			.jumbotron .general-info .row .personal-information-container .row label{
				font-size: 15px;
				margin: 3px;
			}
			.jumbotron .general-info .row .personal-information-container .row h6{
				font-size: 13px;
				padding: 6px;
			}
		}

	/* Small devices (portrait tablets and large phones, 600px and up) */
		@media only screen and (min-width: 401px) and (max-width: 600px) {
			.jumbotron {
				padding: 10px; 
				margin: 55px auto;
			}
			.jumbotron .general-info h5 {
				margin-left: -10px;
				margin-bottom: -15px;
			}
			.jumbotron .general-info #exists, #success {
				font-size: 15px;
				position: relative;
				left: auto;
				right: auto;
				top: 10px; 
				height: auto;
				width: auto;
				padding: 6px;
			}
		}


		/* Medium devices (landscape tablets, 768px and up) */
		@media only screen and (min-width: 601px) and (max-width: 768px) {
			.jumbotron {
				padding: 10px; 
				margin: 55px auto;
			}
			.jumbotron .general-info h5 {
				margin-left: -10px;
				margin-bottom: -15px;
			}
			.jumbotron .general-info #exists, #success {
				font-size: 15px;
				position: relative;
				left: auto;
				right: auto;
				top: 10px; 
				height: auto;
				width: auto;
				padding: 6px;
			}
		} 

		/* Large devices (laptops/desktops, 992px and up) */
		@media only screen and (min-width: 769px) and (max-width: 991px) {
		    .jumbotron {
				padding: 30px; 
				margin: 40px auto;
			}
			.jumbotron .general-info {
				padding: 25px;
			}
			.jumbotron .general-info h5 {
				padding: 10px;
			}
			.jumbotron .general-info #exists, #success{
				right: 50px; 
				top: 60px; 
				font-size: 14px;
				height: auto;
				padding: 10px;
			}
			.jumbotron .general-info #success {
				background-color: #4BB543;
			}
			.jumbotron .general-info .row .profile-container {
				padding: 10px;
			}
			.jumbotron .general-info .row .profile-container .row .button-edit-container button {
				margin-top: -5px;
			}
		} 
		@media only screen and (min-width: 992px) and (max-width: 1115px) {
			.jumbotron .general-info .row .profile-container .row .button-edit-container button {
				margin-left: -10px;
			}
		}
		/* Extra large devices (large laptops and desktops, 1200px and up) */
		@media only screen and (min-width: 1200px) {

		}

		

	/*------------------END FOR RESPONSIVE--------------------*/

</style>



<div class="jumbotron">
	<?php 
		$query = mysqli_query($conn, "SELECT * FROM registered_students WHERE stud_Id = '$id' ");
		while($row = mysqli_fetch_array($query)){
	?>
	<div class="col-md-12 general-info">
		<h5><b>GENERAL INFORMATION</b></h5>
		<?php if(isset($_SESSION['exists']) && isset($_SESSION['danger'])) { ?> 
            <h6 class="alert" id="exists"> <strong>Sorry! </strong> <?php echo $_SESSION['exists']; ?> </strong> <?php echo $_SESSION['danger']; ?></h6>
        <?php unset($_SESSION['exists']);  unset($_SESSION['danger']); }	?>
        <?php if(isset($_SESSION['success'])) { ?> 
            <h6 class="alert" id="success"> <strong>Success! </strong> <?php echo $_SESSION['success']; ?></h6>  
      	<?php unset($_SESSION['success']);  }	?>
		<hr>
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-3 profile-container">
				<div class="row">
					<div class="col-sm-12 col-md-6 col-lg-3 content">
						<img src="../images-students/<?php  echo $row['image'];?>" alt="image" class="img-responsive">
						<h6><b><?php echo $row['student_firstname']; ?> <?php //echo $row['student_middlename']; ?> <?php echo $row['student_lastname']; ?> <?php echo $row['student_extname']; ?></b></h6>
						<p><?php echo $row['year_level_to_enroll']; ?> student</p>
					</div>
				</div>
				<div class="row ">
					<div class="col-sm-7 col-md-6 col-lg-12 mt-2 button-edit-container">
						<button class="btn" data-bs-toggle="modal" data-bs-target="#student_photo_update<?php echo $row['stud_Id']?>"><i class="bi bi-pencil-square"></i> Edit profile</button>
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-9 personal-information-container">
				<div class="row">
					<h6><b><i class="bi bi-person-circle"></i> ABOUT ME</b></h6>
					<hr>
					<div class="col-6 col-sm-6 col-md-6 col-lg-3">
						<label><b>Full name</b></label>
					</div>
					<div class="col-6 col-sm-6 col-md-6 col-lg-3">
						<label><?php echo $row['student_firstname']; ?> <?php echo $row['student_middlename']; ?> <?php echo $row['student_lastname']; ?> <?php echo $row['student_extname']; ?></label>
					</div>
					<div class="col-6 col-sm-6 col-md-6 col-lg-3">
						<label><b>Gender</b></label>
					</div>
					<div class="col-6 col-sm-6 col-md-6 col-lg-3">
						<label><?php echo $row['gender']; ?></label>
					</div>
				</div>
				<div class="row">
					<div class="col-6 col-sm-6 col-md-6 col-lg-3">
						<?php 
		                    //CONVERTING DATE FORMAT TO STRING
		                    $timestamp = $row['date_of_birth'];
	            		?> 
						<label><b>Date of Birth</b></label>
					</div>
					<div class="col-6 col-sm-6 col-md-6 col-lg-3">
						<label><?php echo date("F d, Y", strtotime($timestamp)); ?></label>
					</div>
					<div class="col-6 col-sm-6 col-md-6 col-lg-3">
						<label><b>Age</b></label>
					</div>
					<div class="col-6 col-sm-6 col-md-6 col-lg-3">
						<label><?php echo $row['age']; ?></label>
					</div>
				</div>
				<div class="row">
					<div class="col-6 col-sm-6 col-md-6 col-lg-3">
						<label><b>Contact number</b></span></label>
					</div>
					<div class="col-6 col-sm-6 col-md-6 col-lg-3">
						<label><?php echo $row['contact_num']; ?></label>
					</div>
					<div class="col-6 col-sm-6 col-md-6 col-lg-3">
						<label><b>Email Address</b></label>
					</div>
					<div class="col-6 col-sm-6 col-md-6 col-lg-3">
						<label><?php echo $row['email']; ?></label>
					</div>
				</div>
				<div class="row">
					<div class="col-6 col-sm-6 col-md-6 col-lg-3">
						<label><b>Address</b></label>
					</div>
					<div class="col-6 col-sm-6 col-md-6 col-lg-3">
						<label><?php echo $row['address']; ?></label>
					</div>
					<div class="col-6 col-sm-6 col-md-6 col-lg-3">
						<label><b>Zip code</b></label>
					</div>
					<div class="col-6 col-sm-6 col-md-6 col-lg-3">
						<label><?php echo $row['zipcode']; ?></label>
					</div>
				</div>
				<div class="row">
					<div class="col-6 col-sm-6 col-md-6 col-lg-3">
						<label><b>Grade level</b></label>
					</div>
					<div class="col-6 col-sm-6 col-md-6 col-lg-3">
						<label><?php echo $row['year_level_to_enroll']; ?></label>
					</div>
					<?php if($row['year_level_to_enroll'] === 'Grade 11' || $row['year_level_to_enroll'] === 'Grade 12'): ?>
					<div class="col-6 col-sm-6 col-md-6 col-lg-3">
						<label><b>Semester</b></label>
					</div>
					<div class="col-6 col-sm-6 col-md-6 col-lg-3">
						<label><?php echo $row['semester']; ?></label>
					</div>
					<?php endif; ?>
				</div>
				<div class="row">
					<?php if($row['year_level_to_enroll'] === 'Grade 11' || $row['year_level_to_enroll'] === 'Grade 12'): ?>
					<div class="col-6 col-sm-6 col-md-6 col-lg-3">
						<label><b>Track</b></label>
					</div>
					<div class="col-6 col-sm-6 col-md-6 col-lg-3">
						<label><?php echo $row['track']; ?></label>
					</div>

				
					<div class="col-6 col-sm-6 col-md-6 col-lg-3">
						<label><b>Strand</b></label>
					</div>
					<div class="col-6 col-sm-6 col-md-6 col-lg-3">
						<label><?php echo $row['strand']; ?></label>
					</div>
					<?php endif; ?>
				</div>
				<br>
				<div class="row">
					<h6><b><i class="bi bi-people-fill"></i> PARENT'S INFORMATION</b></h6>
					<hr>
					<div class="col-6 col-sm-6 col-md-6 col-lg-3">
						<label><b>Father's name</b></label>
					</div>
					<div class="col-6 col-sm-6 col-md-6 col-lg-3">
						<label><?php echo $row['fathers_name']; ?></label>
					</div>
					<div class="col-6 col-sm-6 col-md-6 col-lg-3">
						<label><b>Mother's name</b></label>
					</div>
					<div class="col-6 col-sm-6 col-md-6 col-lg-3">
						<label><?php echo $row['mothers_name']; ?></label>
					</div>
				</div>
				<div class="row">
					<div class="col-6 col-sm-6 col-md-6 col-lg-3">
						<label><b>Parent's contact</b></label>
					</div>
					<div class="col-6 col-sm-6 col-md-6 col-lg-3">
						<label><?php echo $row['parents_contact']; ?></label>
					</div>
				</div>
				<br>
				<div class="row">
					<h6><b><i class="bi bi-mortarboard-fill"></i> SCHOOL INFORMATION TO ENROLL</b></h6>
					<hr>
					<div class="col-6 col-sm-6 col-md-6 col-lg-3">
						<label><b>Name of school</b></label>
					</div>
					<div class="col-6 col-sm-6 col-md-6 col-lg-3">
						<label><?php echo $row['school_to_enroll']; ?></label>
					</div>
					<div class="col-6 col-sm-6 col-md-6 col-lg-3">
						<label><b>School adress</b></label>
					</div>
					<div class="col-6 col-sm-6 col-md-6 col-lg-3">
						<label><?php echo $row['schooladd_to_enroll']; ?></label>
					</div>
				</div>
		   <!-- <div class="row">
					<div class="col-sm-6 col-md-6 col-lg-3">
						<label><b>Year level to enroll</b></label>
					</div>
					<div class="col-sm-6 col-md-6 col-lg-3">
						<label><?php echo $row['year_level_to_enroll']; ?></label>
					</div>
				</div> -->
				<br>
				<div class="row">
					<h6><b><i class="bi bi-mortarboard-fill"></i> PREVIOUS SCHOOL INFORMATION</b></h6>
					<hr>
					<div class="col-6 col-sm-6 col-md-6 col-lg-3">
						<label><b>School last attended</b></label>
					</div>
					<div class="col-6 col-sm-6 col-md-6 col-lg-3">
						<label><?php echo $row['last_school_name']; ?></label>
					</div>
					<div class="col-6 col-sm-6 col-md-6 col-lg-3">
						<label><b>Last school year</b></label>
					</div>
					<div class="col-6 col-sm-6 col-md-6 col-lg-3">
						<label><?php echo $row['last_school_year']; ?></label>
					</div>
				</div>
				<div class="row">
					<div class="col-6 col-sm-6 col-md-6 col-lg-3">
						<label><b>Last grade level completed</b></label>
					</div>
					<div class="col-6 col-sm-6 col-md-6 col-lg-3">
						<label><?php echo $row['last_grade_level']; ?></label>
					</div>
				</div>			
			</div>
		</div>
	</div>
<!--###################################################################################################################################--> 
<!-----------------------------------------------------UPDATE STUDENT INFORMATION MODAL------------------------------------------------------>
   <!-- Modal -->
	<div class="modal fade" id="student_photo_update<?php echo $row['stud_Id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header bg-success" style="color: #fff;">
	        <h5 class="modal-title" id="exampleModalLabel">Update profile picture</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <form action="student_change_photo_code.php" method="POST" enctype="multipart/form-data">
		      <div class="modal-body">
		          <input type="hidden" name="stud_Id" class="form-control" value="<?php echo $row['stud_Id']?>">
	              <img class="img-responsive" src="../images-students/<?php echo $row['image'];?>" alt="image"
	              style="width: 160px; height: 160px;  display: block;margin: auto;box-shadow: 4px 4px 7px #b3b3b3;
	              border: 5px solid  #009933; margin-top:20px;" >
		          <br>
		          <input type="file" name="fileToUpload" class="form-control">
		      </div>
		      <div class="modal-footer">
		         <button type="submit" class="btn btn-success" name="update_student_profile" id="btn_no-outline"><i class="fa fa-save" aria-hidden="true"></i> Save changes</button>
		         <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="btn_no-outline"><i class="fa fa-times" aria-hidden="true"></i> Close</button>
		      </div>
	      </form>
	    </div>
	  </div>
	</div>
<!-----------------------------------------------------END UPDATE STUDENT INFORMATION MODAL-------------------------------------------------->
<!--###################################################################################################################################--> 
 
  <?php
  } 
  ?>
</div>

<script>
//-----------------------------ALERT TIMEOUT-------------------------//
$(document).ready(function() {
  setTimeout(function() {
      $('.alert').hide();
  } ,6000);
}
);
</script>

