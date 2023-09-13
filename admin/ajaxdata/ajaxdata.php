	<?php
	$host = 'localhost';
	$username = 'root';
	$pass = '';
	$db = 'mnhs';

	$db = new mysqli($host,$username,$pass,$db);

	if ($db->connect_error) {
		 die("Connection Failed". $db->connect_error);
	}


/*##########################################################################*/
// ------------FETCHING ADVISER FOR CHOSEN SECTION ON CONFIRM ENROLLMENT.PHP
	if (isset($_POST['level_section'])) {
	$adviser = $_POST['level_section'];
	//$query = "SELECT * FROM faculty where level_section_id= ".$_POST['level_section']; //SQL CODE BEFORE
	$query = "SELECT * FROM faculty where level_section_id ='$adviser' ";			
	$result = $db->query($query);
	if ($result->num_rows > 0 ) {
		echo '<option value="">Select Adviser</option>'; //can be deleted
		while ($row = $result->fetch_assoc()) {
		 	echo '<option value="   '.$row['fac_Id'].'   " selected >  '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].'  </option>';
		}
	} elseif ($result->num_rows != 'Select Section') {
		echo '<option value="">Select Adviser</option>'; //can be deleted
	} else{
			echo '<option value="">No Adviser Found!</option>';	
		  }
	}
 
	// elseif (isset($_POST['state_id'])) {
	// 	$query = "SELECT * FROM city where s_id=".$_POST['state_id'];
	// 	$result = $db->query($query);
	// 	if ($result->num_rows > 0 ) {
	// 		 echo '<option value="">Select City</option>';
	// 		 while ($row = $result->fetch_assoc()) {
	// 		 	echo '<option value='.$row['id'].'>'.$row['city_name'].'</option>';
	// 		 }
	// 	} else {
	// 		echo '<option>No City Found!</option>';
	// 	}
	// } 

// ------------END FETCHING ADVISER FOR CHOSEN SECTION ON CONFIRM ENROLLMENT.PHP
/*##########################################################################*/






/*##########################################################################*/
// ------------ENROLLMENT CONVERSION TO CSV---------------------------------//

	//GETTING THE PASSED VALUE FROM VISIBLE DROPDOWN IN ENROLLED_STUDENTS.PHP FOR CSV
	if (isset($_POST['levelsection_filter'])) {
	$levelsection_filter = $_POST['levelsection_filter'];
	$query = "SELECT * FROM level_section WHERE section='$levelsection_filter' " ;
	$result = $db->query($query);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
		 	echo '<option value="   '.$row['lev_sec_Id'].'   " selected >  '.$row['level'].' '.$row['section'].'  </option>'; //passing same value from visible select option
		}
	} else{
			echo '<option value="">Something went wrong.</option>';
		  }
	}

// ------------END ENROLLMENT CONVERSION TO CSV-----------------------------//
/*##########################################################################*/ 






/*##########################################################################*/
// ------------FACULTY CONVERSION TO CSV---------------------------------//
	
	//GETTING THE PASSED VALUE FROM VISIBLE DROPDOWN IN FACULTY.PHP FOR CSV
	if (isset($_POST['level_filter'])) {
	$level = $_POST['level_filter'];
	//$query = "SELECT * FROM faculty where level_section_id= ".$_POST['level_section']; //SQL CODE BEFORE
	

	$query = "SELECT * FROM level_section WHERE level LIKE '%".$level."%' " ;	
	$result = $db->query($query);
	if ($result->num_rows > 0 ) {
		echo '<option value="">Select Adviser</option>'; //can be deleted
		while ($row = $result->fetch_assoc()) {
		 	echo '<option value="   '.$row['level'].'   " selected >  '.$row['level'].' </option>'; //passing same value from visible
		}
	} else{
			echo '<option value="">Something went wrong.</option>';
		  }
	}

// ------------END FACULTY CONVERSION TO CSV---------------------------------//
/*##########################################################################*/


?>












<!-- TO FILTER DATA TABLE  (UNDONE)		 -->
<?php
if(isset($_POST['request'])) {
$request = $_POST['request'];
$sql = mysqli_query($conn, "SELECT * FROM level_section WHERE level LIKE '%".$request."%' AND section  LIKE '%".$request."%' ");
$count = mysqli_num_rows($sql);
?>
		<table class="table">
				<?php
				if($count) {
				?>
				<thead>
						<tr>
							<th>Id</th>
							<th>Student name</th>    
							<!-- <th>Image</th>  -->
							<th>Level and Section</th>
							<th>Adviser</th>
							<th>Action</th>
						</tr>
						<?php
						} else {
						echo "No record found"; 
						}
						?>
				</thead>
				<tbody>
				<?php
				while($row = mysqli_fetch_array($sql)) {
				?>
						<tr>
							<td><?php echo $row["enrollment_id"];?></td>
							<td><?php echo $row["student_firstname"];?> <?php echo $row["student_middlename"];?> <?php echo $row["student_lastname"];?> <?php echo $row["student_extname"];?></td>
							<!-- <td>
							<img src="../images-students/<?php echo $row['image'];?>" style="width: 35px; height: 35px;" alt="image">
							</td> -->  
							<td><?php echo $row["level"];?> - <?php echo $row["section"];?></td>
							<td><?php echo $row["firstname"];?> <?php echo $row["middlename"];?> <?php echo $row["lastname"];?></td>
							<td>
							<a href="edit_enrollment.php?edit_enrollment=<?php echo $row['enrollment_id'];?>" class="btn btn-success"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
							<!-- <button class="btn btn-success" data-toggle="modal" type="button" data-target="#updatestudent_modal<?php echo $row['enrollment_id']?>" id="btn_no-outline"><i class="fa fa-edit" aria-hidden="true"></i> Edit</button> -->
							<button class="btn btn-info"  data-toggle="modal" type="button" data-target="#viewstudent<?php echo $row['enrollment_id']?>" id="btn_no-outline"><i class="fa fa-eye" aria-hidden="true"></i> Profile</button>
							<!--
							<a href="view_faculty.php?Id=<?php echo $row['Id']?>" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> View Profile</a> -->
							<button class="btn btn-warning"  data-toggle="modal" type="button" data-target="#deletestudent<?php echo $row['enrollment_id']?>" id="btn_no-outline">
							<i class="fa fa-trash" aria-hidden="true"></i> Delete</button>  
							</td>
						</tr>
				<?php
				}
				?>
				</tbody>
		</table>
<?php } ?>