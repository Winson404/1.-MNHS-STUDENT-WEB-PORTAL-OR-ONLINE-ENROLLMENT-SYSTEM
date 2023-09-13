<!DOCTYPE html>
<head>
    <title>Administrator | MNHS Enrollment System</title> 
    <link rel="stylesheet" href="CSS-Admin/admin_profile.css">
</head>
<?php include 'sidebar.php'; ?>

<div class="content">
  <div class="container-fluid bg-dark">
    	<!-- FETCHING ADMIN INFORMATION -->
		<?php 
			include 'config.php';
			if(isset($_GET['admin_id'])) {
			$id = $_GET['admin_id'];
			}
		    $query ="SELECT * FROM faculty WHERE fac_Id ='$id' ";
            $sql = mysqli_query($conn,$query);
            while($row = mysqli_fetch_array($sql)) {
		?>
		<div class="row p-4">
			<h3 class="bg-light p-2"><i class="bi bi-person-circle"></i> <b>Administrator</b></h3>
			<div class="col-md-3 bg-secondary p-4 profile">
				<div align="center">
					<img src="../images-faculty/<?php echo $row['image'];?>" alt="image">
						<button  type="button" class="btn btn-default" data-bs-toggle="modal" data-bs-target="#photo_update<?php echo $row['fac_Id']?>"><i class="bi bi-camera-fill"></i></button>
					<h5 class="form-control" align="left"><i class="bi bi-person-circle"></i> <b><?php echo $row['username']; ?></b></h5>
				</div>
					<div align="left">
					<h5 class="form-control"><i class="bi bi-telephone-plus-fill"></i> 0<?php echo $row['contact']; ?></h5>
					<h5 class="form-control" id="email"><i class="bi bi-envelope-fill"></i> <?php echo $row['email']; ?></h5>
				</div>
			</div>
			<div class="col-md-9 bg-light p-4">
			<div class="row">
<!-----------------------------------------SUCCESS SESSION ALERT MESSAGES---------------------------------------------------------------->
        <?php if(isset($_SESSION['success'])) { ?> 
            <h6 class="alert bg-success" role="alert"><strong>Success!</strong> <?php echo $_SESSION['success']; ?></h6> 
        <?php unset($_SESSION['success']); } ?>
<!-----------------------------------------EXISTS  SESSION ALERT MESSAGES---------------------------------------------------------------->
        <?php if(isset($_SESSION['invalid']) && isset($_SESSION['error'])) { ?>
            <h6 class="alert bg-danger" role="alert"><strong>Sorry,</strong> <?php echo $_SESSION['invalid']; ?>  <?php echo $_SESSION['error']; ?></h6>
        <?php unset($_SESSION['invalid']);  unset($_SESSION['error']);  } ?>

        <?php  if(isset($_SESSION['exists'])) { ?>
            <h6 class="alert bg-danger" role="alert"><strong>Sorry,</strong> <?php echo $_SESSION['exists']; ?></h6>
        <?php unset($_SESSION['exists']); } ?>
<!--###################################################################################################################################-->
            <div class="col-md-6">
                <h4><b>General information</b></h4>
            </div>                        
			</div>
			<div class="row">
				<div class="col-md-6">
					<label>First name</label>
					<input type="text" name="" class="form-control" value="<?php echo $row['firstname']; ?>" readonly>
				</div>
				<div class="col-md-6">
					<label>Middle name</label>
					<input type="text" name="" class="form-control" value="<?php echo $row['middlename']; ?>" readonly>
				</div>
		    </div>
		    <div class="row">
				<div class="col-md-6">
					<label>Last name</label>
					<input type="text" name="" class="form-control" value="<?php echo $row['lastname']; ?>" readonly>
				</div>
				<div class="col-md-6">
					<label>Gender</label>
					<input type="text" name="" class="form-control" value="<?php echo $row['gender']; ?>" readonly>
				</div>
		    </div>
		    <div class="row">
	    	<?php 
                //CONVERTING DATE FORMAT TO STRING
                $timestamp = $row['date_of_birth'];
    		?> 
				<div class="col-md-4">
					<label>Date of Birth</label>
					<input type="text" name="" class="form-control" value="<?php echo date("F d, Y", strtotime($timestamp)); ?>" readonly>
				</div>
				<div class="col-md-2">
					<label>Age</label>
					<input type="text" name="" class="form-control" value="<?php echo $row['age']; ?>" readonly>
				</div>
				<div class="col-md-6">
					<label>Address</label>
					<input type="text" name="" class="form-control" value="<?php echo $row['address']; ?>" readonly>
				</div>
		    </div>
		    <div class="row">						
				<div class="col-md-6">
					<label>Contact number</label>
					<input type="text" name="" class="form-control" value="<?php echo $row['contact']; ?>" readonly>
				</div>
				<div class="col-md-6">
					<label>Email Address</label>
					<input type="text" name="" class="form-control" value="<?php echo $row['email']; ?>" readonly>
				</div>
		    </div>
		    <div class="row">											
				<?php
					$id = $row['fac_Id'];
					$advisory = mysqli_query($conn, "SELECT faculty.*, level_section.level, level_section.section FROM faculty, level_section WHERE faculty.level_section_id=level_section.lev_sec_Id AND fac_Id='$id' ");
					$row = mysqli_fetch_array($advisory);
				?>
				<div class="col-md-6">
					<label>Advisory</label>
					<input type="text" name="" class="form-control" value="<?php echo $row['level']; ?> - <?php echo $row['section']; ?>" readonly>
				</div>
		    </div>
		    <br>
		    <hr>
		    <div class="row">
			    <div class="col-md-12" align="right">
					<a href="admin_edit_info.php?edit_info=<?php echo $row['fac_Id'];?>" class="btn btn-success"><i class="bi bi-pencil-square"></i> Update</a>
					<a href="dashboard.php" class="btn btn-secondary"><i class="bi bi-arrow-left-square"></i> Back</a>
				</div>
			</div>				
			</div>		
		</div>
		<!-- END FETCHING ADMIN INFORMATION -->
		<?php 
				include 'admin_edit_photo.php';
			} 
		?>
  </div>
</div>
</body>
</html>



