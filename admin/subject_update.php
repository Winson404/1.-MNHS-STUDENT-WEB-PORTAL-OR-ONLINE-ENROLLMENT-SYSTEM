<!-- The Modal -->
<div class="modal fade" id="updatesubject_modal<?php echo $row['sub_Id']; ?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-success">
        <h4 class="modal-title"><i class="bi bi-pencil-square"></i> Update Subject</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form action="process_update.php" method="POST">
          <!-- Modal body -->
          <div class="modal-body">
              <input type="hidden"  class="form-control" name="Id"      value="<?php echo $row['sub_Id']?>">
              <div class="form-group">
                <?php
                      $level  = mysqli_query($conn, "SELECT DISTINCT subject_level FROM subject");
                      $id = $row['sub_Id'];
                      $all_level = mysqli_query($conn, "SELECT * FROM subject  where sub_Id = '$id' ");
                      $row = mysqli_fetch_array($all_level);
                ?>
                  <label>Level</label>
                  <select class="form-control form-select" name="subject_level" autocomplete="off" required="">
                  <?php foreach($level as $rows):?>
                        <option value="<?php echo $rows['subject_level']; ?>"
                          <?php if($row['subject_level'] == $rows['subject_level']) echo 'selected="selected"'; ?>  >
                          <?php echo $rows['subject_level']; ?>
                        </option>
                 <?php endforeach;?>
               </select>
              </div>
              <div class="form-group">
                  <label>Subject name</label>
                  <input type="text"    class="form-control" name="subject_name"   value="<?php echo $row['subject_name']?>" autocomplete="off" required="">
             </div>
             <?php if($row['subject_level'] == "Grade 11" || $row['subject_level'] == "Grade 12"): ?>
             <div class="form-group">
                  <label>Strand</label>
                  <input type="text"    class="form-control" name="strand"   value="<?php echo $row['strand']?>" autocomplete="off" required="">
             </div>
             <?php endif; ?>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Close</button>
                <button type="submit" class="btn btn-success" name="update_subject"><i class="bi bi-pencil-square"></i> Update</button>
          </div>
      </form>
    </div>
  </div>
</div>