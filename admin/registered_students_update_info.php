<!-- The Modal -->
<div class="modal fade" id="updatestudent_modal<?php echo $row['stud_Id']; ?>">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-success">
        <h4 class="modal-title"><i class="bi bi-pencil-square"></i> Update Student</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

              <form action="process_update.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                  <div class="row">
                    <input type="hidden" name="student_id" class="form-control" placeholder="Student_Id" value="<?php echo $row['stud_Id']?>">
                    <div class="form-group col-md-12 update_photo">
                        <img src="../images-students/<?php echo $row['image'];?>" alt="image" class="person">
                        <div>
                          <button  type="button" class="btn btn-success mt-2 mb-3"  data-bs-toggle="modal" data-bs-target="#student_photo_update<?php echo $row['stud_Id']; ?>" id="btn-create"> <i class="bi bi-pencil-square"></i> Change photo</button>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Year level</label>
                        <input type="text" name="year_level_to_enroll" class="form-control"   value="<?php echo $row['year_level_to_enroll']?>" autocomplete="off" required readonly>     
                    </div>
                    <div class="form-group col-md-6">
                        <label>First name</label>
                        <input type="text" name="student_firstname" class="form-control" placeholder="First name"  value="<?php echo $row['student_firstname']?>" autocomplete="off" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Middle name</label>
                        <input type="text" name="student_middlename" class="form-control" placeholder="Middle name" value="<?php echo $row['student_middlename']?>" autocomplete="off" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Last name</label>
                        <input type="text" name="student_lastname" class="form-control" placeholder="Last name" value="<?php echo $row['student_lastname']?>" autocomplete="off" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Ext. name</label>
                        <input type="text" name="student_extname" class="form-control" placeholder="Ext. name" value="<?php echo $row['student_extname']?>">
                    </div autocomplete="off" required>
                    <div class="form-group col-md-3">
                      <?php
                          $gender  = mysqli_query($conn, "SELECT DISTINCT gender FROM registered_students");  

                          $id = $row['stud_Id'];

                          $all_gender = mysqli_query($conn, "SELECT * FROM registered_students where stud_Id = '$id' ");
                          $row = mysqli_fetch_array($all_gender);
                      ?>
                        <label>Gender</label>
                        <select class="form-control form-select" name="gender" required>
                     <?php foreach($gender as $rows):?>
                          <option value="<?php echo $rows['gender']; ?>"
                            <?php if($row['gender'] == $rows['gender']) echo 'selected="selected"'; ?>  >
                            <?php echo $rows['gender']; ?>                                                  
                          </option>                                                 
                     <?php endforeach;?>
                     <!---THE PROBLEM IS, IF ALL STATUS ARE INACTIVE, " ACTIVE " OPTION IS NOT AVAILABLE --->
                        </select>
                    </div>                      
                    <div class="form-group col-md-4">                              
                        <label>Date of Birth</label>
                       
                        <input type="Date" class="form-control"  name="dob"  value="<?php echo $row['date_of_birth']?>" autocomplete="off" id="seniorbirthdate" onchange="seniorgetAgeVal(0)" onblur="seniorgetAgeVal(0);" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Age</label>
                        <input type="text" class="form-control"  name="age"  placeholder="Age" value="<?php echo $row['age']?>" autocomplete="off" id="seniorage" required  readonly>
                        <span id="senioragestatus"><b>Age must be at least 12yrs old and above.</b></span>
                    </div> 
                    <div class="form-group col-md-6">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" placeholder="Address" value="<?php echo $row['address']?>" autocomplete="off" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Zipcode</label>
                        <input type="text" name="zipcode" class="form-control" placeholder="Zipcode" value="<?php echo $row['zipcode']?>" autocomplete="off" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Contact number</label>
                        <input type="number" name="contact" class="form-control" placeholder="9123456789" pattern="[7-9]{1}[0-9]{9}" value="<?php echo $row['contact_num']?>" autocomplete="off" required>
                    </div>                                             
                    <div class="form-group col-md-6">
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="Example@gmail.com"  value="<?php echo $row['email']?>" autocomplete="off" required>
                    </div> 
                    <div class="form-group col-md-6">
                        <label>Father's name</label>
                        <input type="text" name="fathers_name" class="form-control" placeholder="Father's name"  value="<?php echo $row['fathers_name']?>" autocomplete="off" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Mother's name</label>
                        <input type="text" name="mothers_name" class="form-control" placeholder="Mother's name" value="<?php echo $row['mothers_name']?>" autocomplete="off" required>
                    </div>                                             
                    <div class="form-group col-md-6">
                        <label>Parent's contact</label>
                        <input type="text" name="parents_contact" class="form-control" placeholder="9123456789" pattern="[7-9]{1}[0-9]{9}"  value="<?php echo $row['parents_contact']?>" autocomplete="off" required>
                    </div>
                    <!-- ########################################################################################################################## -->
                    <!-- SHOW THESE FIELDS IF STUDENT IS A SENIOR HIGH SCHOOL STUDENT -->
                    <?php if($row['year_level_to_enroll'] == 'Grade 11' || $row['year_level_to_enroll'] == 'Grade 12'): ?>
                    <div class="form-group col-md-6">
                        <?php
                            $semester  = mysqli_query($conn, "SELECT DISTINCT semester FROM registered_students");  
                            $id = $row['stud_Id'];
                            $all_semester = mysqli_query($conn, "SELECT * FROM registered_students where stud_Id = '$id' ");
                            $row = mysqli_fetch_array($all_semester);
                        ?>
                          <label>Semester</label>
                          <select class="form-control form-select" name="semester" required>
                              <option value="" disabled="">Select Semester</option>
                              <?php foreach($semester as $rows):?>
                              <option value="<?php echo $rows['semester']; ?>"
                                <?php if($row['semester'] == $rows['semester']) echo 'selected="selected"'; ?>  >
                                <?php echo $rows['semester']; ?>                                                  
                              </option>                                                 
                              <?php endforeach;?>
                              <!---THE PROBLEM IS, IF ALL STATUS ARE INACTIVE, " ACTIVE " OPTION IS NOT AVAILABLE --->
                          </select>
                    </div>
                    <!-- ########################################################################################################################## -->
                    <div class="form-group col-md-6">
                        <?php
                            $track  = mysqli_query($conn, "SELECT DISTINCT track FROM registered_students");  
                            $id = $row['stud_Id'];
                            $all_track = mysqli_query($conn, "SELECT * FROM registered_students where stud_Id = '$id' ");
                            $row = mysqli_fetch_array($all_track);
                        ?>
                            <label>Track</label>
                            <select class="form-control form-select" name="track" required>
                                <option value="" disabled="">Select Track</option>
                                <?php foreach($track as $rows):?>
                                <option value="<?php echo $rows['track']; ?>"
                                  <?php if($row['track'] == $rows['track']) echo 'selected="selected"'; ?>  >
                                  <?php echo $rows['track']; ?>                                                  
                                </option>                                                 
                               <?php endforeach;?>
                               <!---THE PROBLEM IS, IF ALL STATUS ARE INACTIVE, " ACTIVE " OPTION IS NOT AVAILABLE --->
                            </select>
                    </div>
                    <!-- ########################################################################################################################## -->
                    <div class="form-group col-md-6">
                        <?php
                            $strand  = mysqli_query($conn, "SELECT DISTINCT strand FROM registered_students");  
                            $id = $row['stud_Id'];
                            $all_strand = mysqli_query($conn, "SELECT * FROM registered_students where stud_Id = '$id' ");
                            $row = mysqli_fetch_array($all_strand);
                        ?>
                        <label>Strand</label>
                        <select class="form-control form-select" name="strand" required>
                            <option value="" disabled="">Select Strand</option>
                            <?php foreach($strand as $rows):?>
                            <option value="<?php echo $rows['strand']; ?>"
                              <?php if($row['strand'] == $rows['strand']) echo 'selected="selected"'; ?>  >
                              <?php echo $rows['strand']; ?>                                                  
                            </option>                                                 
                            <?php endforeach;?>
                            <!---THE PROBLEM IS, IF ALL STATUS ARE INACTIVE, " ACTIVE " OPTION IS NOT AVAILABLE --->
                        </select>
                    </div>
                    <?php endif; ?> 
                    <!-- ########################################################################################################################## -->
                </div> 
           </div>

          <!-- Modal footer -->
          <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-square"></i> Close</button>
                <button type="submit" class="btn btn-success" name="update_student"><i class="bi bi-pencil-square"></i> Update</button>
          </div>
      </form>
    </div>
  </div>
</div>