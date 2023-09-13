<!--###################################################################################################################################-->
<!-----------------------------------------------------ENROLL STUDENT MODAL-------------------------------------------------------------->
    <div class="container">
        <!-- Modal -->
        <div class="modal fade" id="updatestudent_modal<?php echo $row['enrollment_id']?>" role="dialog" value="" data-backdrop="static" data-keyboard="false" >
            <div class="modal-dialog ">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" id="delete_modalheader">
                    <button class="close" type="button"  data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" id="delete_modallabel">Enroll Student</h4>
                    </div>

                        <form action="process_delete.php" method="POST">
                        <div class="modal-body">
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////- -->
                              <?php
                                  $id =  $row['stud_Id'];
                                  
                                  $query ="SELECT * FROM registered_students WHERE stud_Id ='$id' ";
                                  $sql = mysqli_query($conn,$query);
                                  while($row = mysqli_fetch_array($sql)) {
                                  $level = $row['year_level_to_enroll']; 
                              ?>
                              <img src="../images-students/<?php echo $row['image'];?>" style="height: 150px; display: block;margin-right: auto;margin-left: auto;">
                              <br>
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////- -->
                              <!-------sAVING ID OF THE STUDENT------->                       
                              <input class="form-control" type="hidden" name="student_id"  value="<?php echo $row['stud_Id']; ?>" >

                              <div class="row">
                                    <div class="col-md-9">
                                        <label for="studentname">Name</label>
                                        <input class="form-control" type="text" name="studentname" value="<?php echo $row['student_firstname'];?> <?php echo $row['student_middlename'];?> <?php echo $row['student_lastname'];?> <?php echo $row['student_extname'];?>" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="level">Year level</label>
                                        <input class="form-control" type="text" name="level" value="<?php echo $row['year_level_to_enroll']; ?>" readonly>
                                    </div>
                              </div>
                              <?php 
                                    } 
                              ?>
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////- -->
                            <div class="row">
                                    <div class="col-md-6">
                                          <label for="level_section">Enroll to:</label>
                                          <select class="form-control" name="level_section" id="" onchange="FetchAdviser(this.value)"  required>
                                          <option value="">Select Section</option>
                                          <?php
                                              include_once 'config.php';
                                              $query = "SELECT * FROM level_section WHERE level ='$level' Order by level";
                                              $result = mysqli_query($conn, $query);
                                              while($row = mysqli_fetch_assoc($result)) {
                                          ?>
                                          <option value=" <?php echo $row['lev_sec_Id']; ?>" > <?php echo $row['level']; ?> <?php echo $row['section']; ?> </option>;
                                          <?php
                                              }
                                          ?>
                                          </select>
                                    </div>
                                    <div class="col-md-6">
                                         <label for="adviser">Adviser</label>
                                        <select name="adviser" id="adviser" class="form-control" required>
                                            <option value="">Select Adviser</option>
                                        </select>
                                    </div>
                            </div>           
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////- -->             
                            <div class="row">
                                <div class="col-md-6">
                                    <?php
                                        $query ="SELECT * FROM school_year WHERE status='Active' ";
                                        $sql = mysqli_query($conn,$query);
                                        while($row = mysqli_fetch_array($sql)) {    
                                    ?>
                                    <label for="schoolyear">Academic School Year</label>
                                    <select class="form-control" name="schoolyear"  required >
                                        <option value="" disabled> Select active school year </option>
                                        <option value="<?php echo $row['year_Id']; ?>" selected> <?php echo $row['schoolyear']; ?> </option>;
                                    </select>
                                    <?php 
                                        } 
                                    ?>   
                                </div>
                            </div>  
    <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////- -->

                        </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" name="enroll" id="btn_no-outline">
                                    <i class="fa fa-save" aria-hidden="true"></i> Enroll
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
<!-----------------------------------------------------END ENROLL STUDENT MODAL---------------------------------------------------------->   
<!--###################################################################################################################################--> 


<script>
    function FetchAdviser(fac_Id){ //Id refers to the Id of the adviser
    $('#adviser').html('');
    $.ajax({
    type:'post',
    url: 'ajaxdata/ajaxdata.php',
    data : { level_section : fac_Id}, //Id refers to the Id of the adviser
    success : function(data){
    $('#adviser').html(data);
    }
    })
    }
</script>