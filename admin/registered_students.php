<!DOCTYPE html>
<head>
    <title>Registered Students | MNHS Enrollment System</title>
    <style>
      /* REGISTERED STUDENTS CREATE MODAL */
        .modal-body .row .form-group span {
            color: red; 
            display: none;
        }
        /*FOR PENDING STUDENTS*/
        .modal-body span.pending-status {
            color: red; 
        }
        .hidden{
        display: none;
        }
        .show{
        display: block;
        }
        label {
        font-weight: bold;
        }
        div input {
          margin-bottom: 10px;
        }
        #junior-save-btn, #senior-save-btn{
          position: absolute;
          right: 115px;
        }
        #junior-cancel-btn, #senior-cancel-btn {
          position: absolute;
          right: 23px;
        }
        
    </style>
</head>
<?php include 'sidebar.php'; ?>

<div class="content">
  <div class="container-fluid p-2 bg-dark">
    <h4 class="bg-light p-3" align="center"><strong>Manage Registered Students</strong></h4>  
    
    <div class="table-responsive p-4">
        <button type="button" class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#register_student"><i class="bi bi-plus-square"></i> Register student</button>
<!--###################################################################################################################################-->
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

      <table class="table table-bordered table-dark table-striped table-hover table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl table-responsive-xxl" id="example">
        <thead>
            <tr>
                <th>Id</th>
                <!-- <th>Image</th> -->
                <th>Student name</th>    
                <th>Year Level</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
                <?php
                include("config.php");
           //   $query ="SELECT * FROM registered_students"; //DISPLAY ALL STUDENTS INCLUDING ENROLLED STUDENTS
                $query ="SELECT * FROM registered_students WHERE status = 'Pending' "; //HIDE ENROLLED STUDENTS 
                $sql = mysqli_query($conn,$query);
                while($row = mysqli_fetch_array($sql)) {
               ?>

                <tr>
                    <td><?php echo $row["stud_Id"];?></td>
                    <!-- <td>
                      <img src="../images-students/<?php echo $row['image'];?>" style="width: 35px; height: 35px;border: 3px solid #e6f2ff;" alt="image">
                    </td>  -->
                    <td><?php echo $row["student_firstname"];?> <?php echo $row["student_middlename"];?> <?php echo $row["student_lastname"];?> <?php echo $row["student_extname"];?></td>
                    <td><?php echo $row["year_level_to_enroll"];?></td>
                    <td>
                        <span class="btn btn-secondary"><i class="bi bi-hourglass-split"></i> <?php echo $row['status']; ?></span>
                        <!-- 
                        <?php if($row['status'] == "Enrolled"): ?>
                        <p  class="btn btn-primary" href=" "><?php echo $row['status']; ?></p>
                        <?php else: ?>
                        <a  class="btn btn-danger" href="enroll_student/enroll_student.php?confirm_id=<?php echo $row['stud_Id']; ?>"><?php echo $row['status']; ?></a>
                        <?php endif; ?>
                        -->
                    </td> 
                <td>
                   <?php// if($row['status'] == "Enrolled"): ?>
                    <!-- <p  class="btn btn-primary" href=" "><?php echo $row['status']; ?></p> -->
                    <?php// else: ?>
                     <a  class="btn btn-primary" href="registered_students_confirm_enrollment.php?confirm_id=<?php echo $row['stud_Id']; ?>"><i class="bi bi-check-circle"></i> Confirm</a>  
                    <?php// endif; ?>
                    <!-- <button class="btn btn-primary" data-toggle="modal" type="button" data-target="#enrollstudent_modal<?php echo $row['stud_Id']?>" id="btn_no-outline"><i class="fa fa-edit" aria-hidden="true"></i> Confirm</button>  -->

                  <button class="btn btn-success" data-bs-toggle="modal" type="button" data-bs-target="#updatestudent_modal<?php echo $row['stud_Id']; ?>"><i class="bi bi-pencil-square"></i> Edit</button>
                  <button class="btn btn-info" id="view" data-bs-toggle="modal" type="button" data-bs-target="#viewstudent<?php echo $row['stud_Id']; ?>"><i class="bi bi-eye"></i> View</button>
                  <!--
                    <a href="view_faculty.php?Id=<?php echo $row['stud_Id']?>" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> View Profile</a> -->
                  <button class="btn btn-danger" data-bs-toggle="modal" type="button" data-bs-target="#deletestudent<?php echo $row['stud_Id']; ?>"><i class="bi bi-trash"></i> Delete</button>
                </td>               
          </tr>
            <?php  
                include 'registered_students_delete.php';
                include 'registered_students_view_profile.php';
                include 'registered_students_update_info.php';
                include 'registered_students_update_picture.php';                             
                 }    
            ?>
        </tbody>
    </table>
    </div>
    <?php include 'registered_students_create.php'; ?>
  </div>
</div>


</html>

