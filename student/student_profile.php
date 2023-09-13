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

	div.content {
		margin-left: 200px;
		padding: 40px;
		margin-top: 25px;
		overflow: hidden;
	}

	.main {
		border: 1px solid #cccccc;
		padding: 20px 20px;
		border-radius: 5px;
		background-color: #f2f2f2;
	}

	.info {
		background-color: #fff;
		padding: 10px 20px;
		border-radius: 10px;
		border: 1px solid #e6e6e6;
		margin: 0 0 10px;
		box-shadow: 3px 3px 5px #cccccc;
		position: relative;
	}

	.info #sessions{
		position: absolute;
		top: 15px;
		right: 15px;
		z-index: 2;
	}

	.info .row #success, #exists {
		float: right;
		width: auto;
		text-align: center; 
		padding:7px 7px; 
		color: #fff; 
		box-shadow: 3px 3px 5px #cccccc;
	}

	#success {
		background-color: #00b300;
		margin: 0px 0 -5px 0;
	}

	#exists {
		background-color:  #FFCC00;
	}

	.info .col-md-3 img{
		height: 180px; 
		width: 180px;
		box-shadow: 3px 3px 5px #cccccc;
		margin-top: 65px;
		border: 5px solid #f2f2f2;
	}

	.info .col-md-3 img:hover{
		opacity: .9;
	}

	.info .col-md-3 button, a.edit{
		margin-top: 20px;
		outline: none;
		cursor: pointer;
		width: 180px;
	}
	.info .col-md-3 a.edit {
		margin-top: 5px;
	}

	.info .col-md-12 .row .status{
		margin: 18px 0 0 0px;
		padding-right: 0px;
		position: relative;
	}

	.info .col-md-12 .row .col-md-6 p .enrolled,.pending {
		background-color: #00b300; 
		color: #fff; 
		padding:1px 5px;
		width: 40%; 
		border-radius: 2px;
		text-align: center;
	    box-shadow: 3px 3px 3px #cccccc;
	}

	.info .col-md-12 .row .col-md-6 .pending{
		background-color: #ff0e0e;
	}

	.col-md-12 #labels {
		border-bottom: 1px solid #e6e6e6; 
	}

	/*------------------FOR RESPONSIVE--------------------*/

		@media screen and (max-width: 400px) {
		
		}

	/* Small devices (portrait tablets and large phones, 600px and up) */
		@media only screen and (min-width: 600px) {
		
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

		

	/*------------------END FOR RESPONSIVE--------------------*/

</style>



<div class="content">
	<?php 
		$query = mysqli_query($conn, "SELECT * FROM registered_students WHERE stud_Id = '$id' ");
		while($row = mysqli_fetch_array($query)){
	?>
	<div class="main">
  	<div class="col-sm-12 col-md-12 info">	
			<!-- <div class="col-sm-3 col-md-3 image">
					<img src="../images-students/<?php  echo $row['image'];?>" alt="image">
					<button class="btn btn-warning" data-toggle="modal" data-target="#student_photo_update<?php echo $row['stud_Id']?>">
							<i class="fa fa-edit" aria-hidden="true"></i> Change Photo
					</button>
			</div> -->
			<div class="col-sm-12 col-md-12">
					<div class="row" id="sessions">
							<div class="col-sm-12 col-md-12">						
	                        		<?php if(isset($_SESSION['success'])) { ?> 
			                            <h6 class="alert" id="success"> <strong>Success! </strong> <?php echo $_SESSION['success']; ?></h6>  
			                      	<?php unset($_SESSION['success']);  }	?>
							</div>
							<div class="col-sm-12 col-md-12">	
			                        <?php if(isset($_SESSION['exists'])) { ?> 
			                            <h6 class="alert" id="exists"> <strong>Sorry! </strong> <?php echo $_SESSION['exists']; ?> </strong> <?php echo $_SESSION['danger']; ?></h6>  
			                        <?php unset($_SESSION['exists']);  unset($_SESSION['danger']); }	?>
			                </div>
			        </div>
			        <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <h3><b>General information</b></h3> 

                        </div>
                        <div class="col-sm-6 col-md-6 status" align="center" >
                        	<?php if($row['status'] == 'Enrolled'):?>
                        	<p><b>Status: </b><span class="enrolled"><?php echo $row['status'];?></span></p>
                        	<?php else: ?>
                        	<p><b>Status: </b><span class="pending"><?php echo $row['status'];?></span></p>
                        	<?php endif; ?>	
                        </div>
                        <label>Roll number</label>
                       <!--  <p style="color: red;"><b><?php echo $row['rollnumber'];?></b></p> -->
                	</div>
                	<hr>
					<div class="row">
						<div class="col-sm-4 col-md-4">
							<p><b>First name</b></p>
							<p><?php echo $row['student_firstname']; ?><p>
						</div>
						<div class="col-sm-4 col-md-4">
							<p><b>Middle name</b></p>
							<p><?php echo $row['student_middlename']; ?><p>
						</div>
						<div class="col-sm-4 col-md-4">
							<p><b>Last name</b></p>
							<p><?php echo $row['student_lastname']; ?><p>
						</div>
				    </div>
				    <div class="row">
						<div class="col-sm-4 col-md-4">
							<p><b>Ext. name</b></p>
							<p><?php echo $row['student_extname']; ?><p>
						</div>
			    	<?php 
	                    //CONVERTING DATE FORMAT TO STRING
	                    $timestamp = $row['date_of_birth'];
            		?> 
						<div class="col-sm-4 col-md-4">
							<p><b>Date of Birth</b></p>
							<p><?php echo date("F d, Y", strtotime($timestamp)); ?><p>
						</div>
						<div class="col-sm-4 col-md-4">
							<p><b>Age</b></p>
							<p><?php echo $row['age']; ?><p>					
						</div>
				    </div>
				    <div class="row">		
						<div class="col-sm-4 col-md-4">
							<p><b>Gender</b></p>
							<p><?php echo $row['gender']; ?><p>
						</div>
						<div class="col-sm-4 col-md-4">
							<p><b>Contact number</b></p>
							<p><?php echo $row['contact_num']; ?><p>
						</div>
						<div class="col-sm-4 col-md-4">
							<p><b>Email Address</b></p>
							<p><?php echo $row['email']; ?><p>
						</div>
				    </div>
				    <div class="row">																
						<div class="col-sm-4 col-md-4">
							<p><b>Address</b></p>
							<p><?php echo $row['address']; ?><p>
				    	</div>							
						<div class="col-sm-4 col-md-4">
							<p><b>Zip code</b></p>
							<p><?php echo $row['zipcode']; ?><p>
						</div>
						<div class="col-sm-4 col-md-4">
							<p><b>Grade level</b></p>
							<p><?php echo $row['year_level_to_enroll']; ?><p>
						</div>
				    </div>
				    <?php if($row['year_level_to_enroll'] === 'Grade 11' || $row['year_level_to_enroll'] === 'Grade 12'): ?>
				    <div class="row">																
						<div class="col-sm-4 col-md-4">
							<p><b>Semester</b></p>
							<p><?php echo $row['semester']; ?><p>
				    	</div>							
						<div class="col-sm-4 col-md-4">
							<p><b>Track</b></p>
							<p><?php echo $row['track']; ?><p>
						</div>
						<div class="col-sm-4 col-md-4">
							<p><b>Strand</b></p>
							<p><?php echo $row['strand']; ?><p>
						</div>

				    </div>
					<?php endif; ?>
					<br>
				</div>
			</div>	
				<div class="col-sm-12 col-md-12 info">
					<div class="row">
				    	<div class="col-sm-12 col-md-12">
				    		<h4 id="labels"><b>Previous school</b></h4>
				    	</div>														
						<div class="col-sm-4 col-md-4">
							<p><b>Last school attended</b></p>
							<p><?php echo $row['last_school_name']; ?><p>
				    	</div>							
						<div class="col-sm-4 col-md-4">
							<p><b>Last school year</b></p>
							<p><?php echo $row['last_school_year']; ?><p>
						</div>
						<div class="col-sm-4 col-md-4">
							<p><b>Last grade level completed</b></p>
							<p><?php echo $row['last_grade_level']; ?><p>
						</div>
				    </div>
				    <div class="row">
				    	<div class="col-sm-12 col-md-12">
				    		<h4 id="labels"><b>Current school</b></h4>
				    	</div>
			    		<div class="col-sm-4 col-md-4">
							<p><b>Name of school</b></p>
							<p><?php echo $row['school_to_enroll']; ?><p>
						</div>															
						<div class="col-sm-4 col-md-4">
							<p><b>Address of school</b></p>
							<p><?php echo $row['schooladd_to_enroll']; ?><p>
				    	</div>							
						<div class="col-sm-4 col-md-4">
							<p><b>Year level to enroll</b></p>
							<p><?php echo $row['year_level_to_enroll']; ?><p>
						</div>
				    </div>
					<div class="row">
				    	<div class="col-sm-12 col-md-12">
				    		<h4 id="labels"><b>Parent's information</b></h4>
				    	</div>																
						<div class="col-sm-4 col-md-4">
							<p><b>Father's name</b></p>
							<p><?php echo $row['fathers_name']; ?><p>
				    	</div>							
						<div class="col-sm-4 col-md-4">
							<p><b>Mother's name</b></p>
							<p><?php echo $row['mothers_name']; ?><p>
						</div>
						<div class="col-sm-4 col-md-4">
							<p><b>Parent's contact</b></p>
							<p><?php echo $row['parents_contact']; ?><p>
						</div>
				    </div>
				</div>
	
<!--###################################################################################################################################--> 
<!-----------------------------------------------------UPDATE STUDENT INFORMATION MODAL------------------------------------------------------>
    <div class="container">
        <!-- Modal -->
        <div class="modal fade" id="student_photo_update<?php echo $row['stud_Id']?>" role="dialog" value="" data-backdrop="static" data-keyboard="false" >
            <div class="modal-dialog ">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" id="update_modalheader">
                    <button class="close" type="button"  data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="update_modallabel">Change Profile</h4>
                    </div>
                        <form action="student_change_photo_code.php" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                                <input type="hidden" name="stud_Id" class="form-control" value="<?php echo $row['stud_Id']?>">
                                <?php 
                                    $id = $row['stud_Id'];
                                    $query = mysqli_query($conn, "SELECT * FROM registered_students WHERE stud_Id='$id' ");
                                    while($row = mysqli_fetch_array($query)) {
                                ?>
                                <img src="../images-students/<?php echo $row['image'];?>" alt="image"
                                style="width: 130px; height: 130px; border-radius: 50%; display: block;margin-right: auto;margin-left: auto;box-shadow: 4px 4px 7px #b3b3b3;
                                border: 5px solid  #53c653; margin-top:20px;" >

                              <?php } ?>
                              <br>
                              <input type="file" name="fileToUpload" class="form-control" style="width: 50%;">
                              
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" name="update_student_profile" id="btn_no-outline">
                                    <i class="fa fa-save" aria-hidden="true"></i> Save changes
                                </button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn_no-outline">
                                    <i class="fa fa-times" aria-hidden="true"></i> Close
                                </button>
                            </div>
                        </form>
                </div>

            </div>
        </div>
    </div> 
   
<!-----------------------------------------------------END UPDATE STUDENT INFORMATION MODAL-------------------------------------------------->
<!--###################################################################################################################################--> 
 </div>
  <?php
  } 
  ?>
</div>

<script>
//-----------------------------ALERT TIMEOUT-------------------------//
$(document).ready(function() {
  setTimeout(function() {
      $('.alert').hide();
  } ,3000);
}
);
</script>

<?php
 }else {
  	header("Location: ../index.php");
  }
  ?>