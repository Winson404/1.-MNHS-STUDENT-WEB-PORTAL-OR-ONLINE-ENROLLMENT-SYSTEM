<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-primary">
        <h4 class="modal-title"><i class="bi bi-plus-square"></i> Create New Faculty</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form action="process_save.php" method="POST" enctype="multipart/form-data">
        <!-- Modal body -->
        <div class="modal-body">
            <div class="row">
                <div class="form-group col-md-6">
                    <label>First name</label>
                    <input type="text" name="firstname" class="form-control" placeholder="First name" autocomplete="off" required="">
                </div>
                <div class="form-group col-md-6">
                    <label>Middle name</label>
                    <input type="text" name="middlename" class="form-control" placeholder="Middle name" autocomplete="off" required="">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Last name</label>
                    <input type="text" name="lastname" class="form-control" placeholder="Last name" autocomplete="off" required="">
                </div>
                <div class="form-group col-md-6">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" placeholder="Address" autocomplete="off" required="">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">                 
                    <label>Date of Birth</label>
                    <input type="Date" class="form-control"  name="dob"  autocomplete="off" id="txtbirthdate" onchange="getAgeVal(0)" onblur="getAgeVal(0);" required>
                </div>
                <div class="form-group col-md-2">                               
                    <label>Age</label>
                    <input type="text" class="form-control"  name="age"  placeholder="Age" autocomplete="off" id="txtage" required  readonly>
                    <span id="agestatus"><b>Age is to young to be a faculty.</b></span>
                </div> 
                <div class="form-group col-md-3">
                    <label>Gender</label>
                    <select name="gender" class="form-control form-select" required="">
                        <option value="" selected="" disabled="">Select gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>  
                <div class="form-group col-md-3">
                    <label>Contact number</label>
                    <input type="text" name="contact" class="form-control" placeholder="9123456789" pattern="[7-9]{1}[0-9]{9}" autocomplete="off" required="">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Email Address</label>
                    <input type="email" name="email" class="form-control" placeholder="Example@gmail.com" autocomplete="off" required="">
                </div>               
                <div class="form-group col-md-6">
                    <label>Advisory</label>
                    <select class="form-control form-select" name="advisory" required="">
                        <?php
                            include 'config.php';
                            $fetch = mysqli_query($conn, "SELECT level_section.* FROM level_section LEFT OUTER JOIN faculty ON level_section.lev_sec_Id=faculty.level_section_id WHERE faculty.level_section_id is NULL");
                            while ($row=mysqli_fetch_array($fetch)) {
                        ?>
                        <option value="<?php echo $row['lev_sec_Id']; ?>"><?php echo $row['level']; ?> - <?php echo $row['section']; ?></option>
                        <?php } ?>
                    </select>
                </div> 
            </div>
            <div class="row">                           
            <div class="form-group col-md-6">
                <label>Upload image</label>
                <input type="file" name="fileToUpload" class="form-control" required="">
            </div>
            </div> 
        </div>

          <!-- Modal footer -->
          <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Close</button>
                <button type="submit" class="btn btn-primary" name="savefaculty"><i class="bi bi-save2"></i> Save</button>
          </div>
      </form>
    </div>
  </div>
</div>
