<!-- The Modal -->
<div class="modal fade" id="viewstudent<?php echo $row['stud_Id']; ?>">
   <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-info">
        <h4 class="modal-title"><i class="bi bi-eye"></i> Student profile</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

          <!-- Modal body -->
          <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <img src="../images-students/<?php echo $row['image'];?>" alt="image" class="view_photo"><!-- TO LOAD IMAGE, DO NOT GIVE SPACE BETWEEN PATH AND PHP TAG -->
                    <div>
                      <button  type="button" class="btn btn-info mt-2"  data-bs-toggle="modal" data-bs-target="#student_photo_update<?php echo $row['stud_Id']; ?>" id="btn-create"> <i class="bi bi-pencil-square"></i> Change photo</button>
                    </div>  
                    <h5 class="mt-3" align="center"><strong><?php echo $row["student_firstname"];?> <?php echo $row["student_middlename"];?> <?php echo $row["student_lastname"];?> <?php echo $row["student_extname"];?></strong></h5>
                    <div class="mb-4" align="center">
                        <p><b><?php echo $row["year_level_to_enroll"];?></b> -
                        
                        <?php if($row['status'] == "Pending"): ?>
                            <span class="pending-status"><b><?php echo $row["status"];?></b></span>
                        <?php endif; ?>
                         </p>
                    </div>
                </div>
                <div><h4 class="p-1 bg-info">Basic info</h4></div>
                <div class="col-md-6">
                     <h5 class="form-control" ><strong>Gender:</strong>&nbsp; <?php echo $row['gender']; ?></h5>
                </div>
                 <div class="col-md-6">
                    <h5 class="form-control"><strong>Age:</strong>&nbsp; <?php echo $row['age']; ?> years old</h5>
                </div>
                 <div class="col-md-6">
                    <?php 
                        //CONVERTING DATE FORMAT TO STRING
                        $timestamp = $row['date_registered'];
                        $birthday = $row['date_of_birth'];
                    ?>
                    <h5 class="form-control"><strong>Birthday:</strong>&nbsp; <?php echo date("F d, Y", strtotime($row['date_of_birth']) ); ?></h5>
                </div>
                 <div class="col-md-6">
                    <h5 class="form-control"><strong>Contact #:</strong>&nbsp; <?php echo $row["contact_num"];?></h5>
                </div>
                <div class="col-md-6">
                    <h5 class="form-control"><strong>Email:</strong>&nbsp; <?php echo $row["email"];?></h5>
                </div>
                <div class="col-md-6">
                    <h5 class="form-control"><strong>Address:</strong>&nbsp; <?php echo $row['address']; ?></h5>  
                </div>
                <div class="col-md-6">
                    <h5 class="form-control"><strong>Zipcode:</strong>&nbsp; <?php echo $row['zipcode']; ?></h5>
                </div>
                <?php if($row['year_level_to_enroll'] == 'Grade 11' || $row['year_level_to_enroll'] == 'Grade 12'): ?>
                <div><h4 class="p-1 bg-info">SHS Info</h4></div>
                <div class="col-md-6">
                    <h5 class="form-control"><strong>Semester: </strong>&nbsp; <?php echo $row["semester"];?></h5>
                </div>
                <div class="col-md-6">
                    <h5 class="form-control"><strong>Track: </strong>&nbsp; <?php echo $row["track"];?></h5>
                </div>
                <div class="col-md-6">
                    <h5 class="form-control"><strong>Strand: </strong>&nbsp; <?php echo $row["strand"];?></h5> 
                </div>
                <?php endif; ?>
                <div><h4 class="p-1 bg-info">Parent's information</h4></div>
                
                <div class="col-md-6">
                    <h5 class="form-control"><strong>Father's name: </strong>&nbsp; <?php echo $row["fathers_name"];?></h5>
                </div>
                <div class="col-md-6">
                    <h5 class="form-control"><strong>Mother's name: </strong>&nbsp; <?php echo $row["mothers_name"];?></h5>
                </div>
                <div class="col-md-6">
                    <h5 class="form-control"><strong>Parent's contact #: </strong>&nbsp; <?php echo $row["parents_contact"];?></h5>
                </div>
                <div class="col-md-6">
                </div>
            </div>
         </div>
    
          <!-- Modal footer -->
          <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-square"></i> Close</button>
                <?php if($row['status'] == 'Pending'): ?>
                    <a  class="btn btn-info" href="registered_students_confirm_enrollment.php?confirm_id=<?php echo $row['stud_Id']; ?>"><i class="bi bi-check-circle"></i> Enroll</a>
                <?php endif; ?>
          </div>
          </div>
  </div>
</div>