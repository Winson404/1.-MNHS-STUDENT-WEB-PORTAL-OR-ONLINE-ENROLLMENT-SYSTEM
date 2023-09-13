<!-- The Modal -->
<div class="modal fade" id="deleteschoolyear_modal<?php echo $row['year_Id']; ?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-danger">
        <h4 class="modal-title"><i class="bi bi-trash"></i> Delete Academic School Year</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form action="process_delete.php" method="POST">
          <!-- Modal body -->
          <div class="modal-body">
              <input type="hidden" name="delete_year" class="form-control" value="<?php echo $row['year_Id']?>">
              <input type="hidden" name="status" class="form-control" value="<?php echo $row['status']?>">
              <h5>Are you sure you want to delete?</h5>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Close</button>
                <button type="submit" class="btn btn-danger" name="deleteschoolyear"><i class="bi bi-trash"></i> Delete</button>
          </div>
      </form>
    </div>
  </div>
</div>