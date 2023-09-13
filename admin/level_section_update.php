<!-- The Modal -->
<div class="modal fade" id="updatelevel_section_modal<?php echo $row['lev_sec_Id']; ?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-success">
        <h4 class="modal-title"><i class="bi bi-pencil-square"></i> Update level and section</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form action="process_update.php" method="POST">
          <!-- Modal body -->
          <div class="modal-body">
              <input type="hidden"  class="form-control" name="Id"      value="<?php echo $row['lev_sec_Id']?>">
              <div class="form-group">
                <?php
                      $level  = mysqli_query($conn, "SELECT DISTINCT level FROM level_section");
                      $id = $row['lev_sec_Id'];
                      $all_level = mysqli_query($conn, "SELECT * FROM level_section  where lev_sec_Id = '$id' ");
                      $row = mysqli_fetch_array($all_level);
                ?>
                  <label>Level</label>
                  <select class="form-control form-select" name="level" autocomplete="off" required="">
                  <?php foreach($level as $rows):?>
                        <option value="<?php echo $rows['level']; ?>"
                          <?php if($row['level'] == $rows['level']) echo 'selected="selected"'; ?>  >
                          <?php echo $rows['level']; ?>
                        </option>
                 <?php endforeach;?>
               </select>
              </div>
              <div class="form-group">
                  <label>Section</label>
                  <input type="text"    class="form-control" name="section"   value="<?php echo $row['section']?>" autocomplete="off" required="">
             </div>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Close</button>
                <button type="submit" class="btn btn-success" name="updatelevel_section"><i class="bi bi-pencil-square"></i> Update</button>
          </div>
      </form>
    </div>
  </div>
</div>