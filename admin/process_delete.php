<?php
    session_start();
    include 'config.php';
?>

<!--#########################################################################################################-->
<!-------------------------------------DELETE SCHOOL YEAR------------------------------------------------------>
	<?php

		if(isset($_POST['deleteschoolyear'])) {
			$id = $_POST['delete_year'];
			$status = $_POST['status'];
			if($status == "Active") {
				 $_SESSION['exists']  = "you can not delete an active year.";   
			     header("Location: schoolyear.php");
			} elseif($status == "Deactivated") {
				 $_SESSION['exists']  = "deactivated year can not be deleted due to previous enrollment records in it.";   
			     header("Location: schoolyear.php");
			} else {
				$school_year = "DELETE FROM school_year WHERE year_Id= '$id' ";
			    if (mysqli_query($conn, $school_year)) {
			        $_SESSION['success']  = "academic School Year has been deleted!";   
			        header("Location: schoolyear.php");
			    } else {
			        $_SESSION['exists']  = "opps, something went wrong. Please try again.";
			        header("Location: schoolyear.php");
			    }
			}
		}
	?>
<!-------------------------------------END DELETE SCHOOL YEAR-------------------------------------------------->
<!--#########################################################################################################-->



<!--#########################################################################################################-->
<!-------------------------------------DELETE LEVEL AND SECTION------------------------------------------------>
	<?php

		if(isset($_POST['deletelevel_section'])) {

		$id = $_POST['delete_level_section'];

		$sql = "DELETE FROM level_section WHERE lev_sec_Id= $id";
		    if (mysqli_query($conn,$sql)) {
		        $_SESSION['success']  = "Level and Section has been deleted!";   
		        header("Location: level_section.php");
		    } else {
		        $_SESSION['exists']  = "Opps, something went wrong. Please try again.";
		        header("Location: level_section.php");
		     }
		}
	?>
<!-------------------------------------END DELETE LEVEL AND SECTION-------------------------------------------->
<!--#########################################################################################################-->



<!--#########################################################################################################-->
<!-------------------------------------DELETE COURSE----------------------------------------------------------->
	<?php

		if(isset($_POST['deletecourse'])) {

			$id = $_POST['delete_course'];

			$sql = "DELETE FROM courses WHERE course_Id= $id";
			if (mysqli_query($conn,$sql)) {
			    $_SESSION['success'] = "Course has been deleted!";   
			    header("Location: course.php");
			} else {
			    $_SESSION['exists'] = "Opps, something went wrong. Please try again.";
			    header("Location: course.php");
			}
		}
	?>
<!-------------------------------------END DELETE COURSES------------------------------------------------------>
<!--#########################################################################################################-->



<!--#########################################################################################################-->
<!-------------------------------------DELETE FACULTY---------------------------------------------------------->
	<?php
		 if(isset($_POST['deletefaculty'])) {
		    $id = $_POST['delete_faculty'];
		    $sql = "DELETE FROM faculty WHERE fac_Id= $id";
		        if (mysqli_query($conn,$sql)) {
		            $_SESSION['success']  = "Faculty has been deleted!";   
		            header("Location: faculty.php");
		        } else {
		            $_SESSION['exists']  = "Opps, something went wrong. Please try again.";
		            header("Location: faculty.php");
		         }
		  }
	?>
<!-------------------------------------END DELETE FACULTY------------------------------------------------------>
<!--#########################################################################################################-->



<!--#########################################################################################################-->
<!-------------------------------------DELETE REGISTERED STUDENT----------------------------------------------->
	<?php

	 if(isset($_POST['delete_registered_student'])) {

	    $id = $_POST['delete_student'];

	    $sql = "DELETE FROM registered_students WHERE stud_Id= '$id'";
	        if (mysqli_query($conn,$sql)) {
	            $_SESSION['success']  = "Registered student has been deleted!";   
	            header("Location: registered_students.php");
	        } else {
	            $_SESSION['exists']  = "Opps, something went wrong. Please try again.";
	            header("Location: registered_students.php");
	         }
	  }
	?>
<!-------------------------------------ENDDELETE REGISTERED STUDENT-------------------------------------------->
<!--#########################################################################################################-->



<!--#########################################################################################################-->
<!-------------------------------------DELETE ENROLLED STUDENT----------------------------------------------->
	<?php

	 if(isset($_POST['delete_enrolled_student'])) {

	    $id = $_POST['delete_enrolled_student'];

	    $sql = "DELETE FROM enrollment WHERE enrollment_id= $id";
	        if (mysqli_query($conn,$sql)) {
	            $_SESSION['success']  = "Enrolled student has been deleted!";   
	            header("Location: enrolled_students.php");
	        } else {
	            $_SESSION['exists']  = "Opps, something went wrong. Please try again.";
	            header("Location: enrolled_students.php");
	        }
	  }
	?>
<!-------------------------------------END DELETE ENRoLLED STUDENT-------------------------------------------->
<!--#########################################################################################################-->



<!--#########################################################################################################-->
<!-------------------------------------DELETE ENROLLED STUDENT----------------------------------------------->
	<?php

	 if(isset($_POST['deletesubject'])) {

	    $id = $_POST['delete_subject'];

	    $subject = "DELETE FROM subject WHERE sub_Id= $id";
	        if (mysqli_query($conn,$subject)) {
	            $_SESSION['success']  = "Subject has been deleted!";   
	            header("Location: subject.php");
	        } else {
	            $_SESSION['exists']  = "Opps, something went wrong. Please try again.";
	            header("Location: subject.php");
	        }
	  }
	?>
<!-------------------------------------END DELETE ENRoLLED STUDENT-------------------------------------------->
<!--#########################################################################################################-->