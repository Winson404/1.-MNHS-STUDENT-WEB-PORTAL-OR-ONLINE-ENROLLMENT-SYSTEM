<!-- The Modal -->
<div class="modal fade" id="updateschoolyear_modal<?php echo $row['year_Id']; ?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-success">
        <h4 class="modal-title"><i class="bi bi-pencil-square"></i> Update School Year</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form action="process_update.php" method="POST">
          <div class="modal-body">
                <input type="hidden" class="form-control" name="Id"         value="<?php echo $row['year_Id']?>">
                <div class="form-group">
                      <?php
                          $schoolyear  = mysqli_query($conn, "SELECT DISTINCT schoolyear FROM school_year");  
                          $id = $row['year_Id'];
                          $all_schoolyear = mysqli_query($conn, "SELECT * FROM school_year where year_Id = '$id' ");
                          $row = mysqli_fetch_array($all_schoolyear);
                      ?>
                        <label>School Year</label>
                        <select class="form-control form-select" name="schoolyear" required="">
                     <?php foreach($schoolyear as $rows):?>
                          <option value="<?php echo $rows['schoolyear']; ?>"
                            <?php if($row['schoolyear'] == $rows['schoolyear']) echo 'selected="selected"'; ?>  >
                            <?php echo $rows['schoolyear']; ?>                                                  
                          </option>                                                 
                     <?php endforeach;?>
                     <!---THE PROBLEM IS, IF ALL STATUS ARE INACTIVE, " ACTIVE " OPTION IS NOT AVAILABLE --->
                        </select>
                </div>
                <!--#########################################################################################-->
                <div class="form-group">
                      <?php
                          $status  = mysqli_query($conn, "SELECT DISTINCT status FROM school_year");  
                          $id = $row['year_Id'];
                          $all_status = mysqli_query($conn, "SELECT * FROM school_year where year_Id = '$id' ");
                          $row = mysqli_fetch_array($all_status);
                      ?>
                        <label>Status</label>
                        <select class="form-control form-select" name="status" required="">
                     <?php foreach($status as $rows):?>
                          <option value="<?php echo $rows['status']; ?>"
                            <?php if($row['status'] == $rows['status']) echo 'selected="selected"'; ?>  >
                            <?php echo $rows['status']; ?>                                                  
                          </option>                                                 
                     <?php endforeach;?>
                     <!---THE PROBLEM IS, IF ALL STATUS ARE INACTIVE, " ACTIVE " OPTION IS NOT AVAILABLE --->
                        </select>
                </div>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Close</button>
                <button type="submit" class="btn btn-success" name="update_schoolyear"><i class="bi bi-pencil-square"></i> Update</button>
          </div>
      </form>
    </div>
  </div>
</div>