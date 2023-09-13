<!-- The Modal -->
<div class="modal fade" id="deactivateschoolyear_modal<?php echo $row['year_Id']; ?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-danger">
        <h4 class="modal-title"><i class="bi bi-pencil-square"></i> Deactivate School Year</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form action="schoolyear_deactivate_code.php" method="POST">
          <div class="modal-body">
                <input type="hidden" class="form-control" name="Id"         value="<?php echo $row['year_Id']?>">
                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control form-select" name="status" required="">
                      <option value="<?php echo $row['status']; ?>" selected> <?php echo $row['status']; ?> </option>
                      <option value="Deactivated">Deactivate</option>                                                 
                    <!---THE PROBLEM IS, IF ALL STATUS ARE INACTIVE, " ACTIVE " OPTION IS NOT AVAILABLE --->
                    </select>
                </div>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Close</button>
                <button type="submit" class="btn btn-danger" name="deactivate_schoolyear"><i class="bi bi-pencil-square"></i> Deactivate</button>
          </div>
      </form>
    </div>
  </div>
</div>