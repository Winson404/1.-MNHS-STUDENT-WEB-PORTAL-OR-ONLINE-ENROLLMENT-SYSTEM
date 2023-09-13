<!-- The Modal -->
<div class="modal fade" id="updatefaculty_modal<?php echo $row['fac_Id']; ?>">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-success">
        <h4 class="modal-title"><i class="bi bi-pencil-square"></i> Update Faculty</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form action="process_update.php" method="POST" enctype="multipart/form-data">
        <!-- Modal body -->
        <div class="modal-body">
            <input type="hidden" name="faculty_id" class="form-control" placeholder="First name" value="<?php echo $row['fac_Id']?>">
            <div class="form-group col-md-12 update_photo">
                <img src="../images-faculty/<?php echo $row['image'];?>" alt="image" class="person">
                <div>
                  <button  type="button" class="btn btn-success mt-2 mb-3"  data-bs-toggle="modal" data-bs-target="#photo_update<?php echo $row['fac_Id']; ?>" id="btn-create"> <i class="bi bi-pencil-square"></i> Change photo</button>
                </div> 
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>First name</label>
                    <input type="text" name="firstname" class="form-control" placeholder="First name"  value="<?php echo $row['firstname']?>" autocomplete="off" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Middle name</label>
                    <input type="text" name="middlename" class="form-control" placeholder="Middle name" value="<?php echo $row['middlename']?>" autocomplete="off" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Last name</label>
                    <input type="text" name="lastname" class="form-control" placeholder="Last name" value="<?php echo $row['lastname']?>" autocomplete="off" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" placeholder="Address" value="<?php echo $row['address']?>" autocomplete="off" required>
                </div>
            </div>
            <div class="row">
                <?php 
                  //CONVERTING DATE FORMAT TO STRING
                  $timestamp = $row['date_of_birth']; //should not be used in updating faculty. input type is set to DATE
                ?>
                <div class="form-group col-md-4">                 
                    <label>Date of Birth</label>
                    <input type="Date" class="form-control"  name="dob"  autocomplete="off" id="updatetxtbirthdate" onchange="updategetAgeVal(0)" onblur="updategetAgeVal(0);" required value="<?php echo $row['date_of_birth']?>">
                </div>
                <div class="form-group col-md-2">                               
                    <label>Age</label>
                    <input type="text" class="form-control"  name="age"  placeholder="Age" autocomplete="off" id="updatetxtage" value="<?php echo $row['age']?>" required  readonly>
                    <span id="agestatus"><b>Age is to young to be a faculty.</b></span>
                </div> 
                <div class="form-group col-md-3">
                    <?php                           
                        $gender  = mysqli_query($conn, "SELECT DISTINCT gender FROM faculty");
                        $id = $row['fac_Id'];
                        $all_gender = mysqli_query($conn, "SELECT * FROM faculty  where fac_Id = '$id' ");
                        $row = mysqli_fetch_array($all_gender);
                    ?>
                        <label>Gender</label>
                         <select class="form-control form-select" name="gender" required="">
                          <?php foreach($gender as $rows):?>
                                <option value="<?php echo $rows['gender']; ?>"  
                                    <?php if($row['gender'] == $rows['gender']) echo 'selected="selected"'; ?> 
                                     > <!--/////   CLOSING OPTION TAG  -->
                                    <?php echo $rows['gender']; ?>                                           
                                </option>

                         <?php endforeach;?>
                       </select> 
                </div>  
                <div class="form-group col-md-3">
                    <label>Contact number</label>
                    <input type="number" name="contact" class="form-control" placeholder="Contact number" value="<?php echo $row['contact']?>" autocomplete="off" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Email Address</label>
                    <input type="email" name="email" class="form-control" placeholder="Example@gmail.com"  value="<?php echo $row['email']?>" autocomplete="off" required>
                </div>               
                <div class="form-group col-md-6">
                    <?php                           
                       $unused_advisory  = mysqli_query($conn, "SELECT faculty.level_section_id, level_section.* FROM level_section LEFT OUTER JOIN faculty ON level_section.lev_sec_Id=faculty.level_section_id");

                       $id = $row['fac_Id'];

                      $all_faculty = mysqli_query($conn, "SELECT * FROM faculty where fac_Id = '$id' ");
                      $row = mysqli_fetch_array($all_faculty);
                    ?>
                        <label>Advisory</label>
                         <select class="form-control form-select" name="advisory" required="">
                          <?php foreach($unused_advisory as $rows):?>
                                <option value="<?php echo $rows['lev_sec_Id']; ?>"  
                                    <?php if($row['level_section_id'] == $rows['lev_sec_Id']) echo 'selected="selected"'; ?> 
                                     > <!--/////   CLOSING OPTION TAG  -->
                                    <?php echo $rows['level']; ?> - <?php echo $rows['section']; ?>                                           
                                </option>

                         <?php endforeach;?>
                       </select>
                </div> 
            </div>
        </div>

          <!-- Modal footer -->
          <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Close</button>
                <button type="submit" class="btn btn-success" name="updatefaculty"><i class="bi bi-pencil-square"></i> Update</button>
          </div>
      </form>
    </div>
  </div>
</div>