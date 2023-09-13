<!-- The Modal -->
<div class="modal fade" id="deletecourse_modal<?php echo $row['course_Id']; ?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-danger">
        <h4 class="modal-title"><i class="bi bi-trash"></i> Delete Course</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form action="process_delete.php" method="POST">
          <!-- Modal body -->
          <div class="modal-body">
              <input type="hidden" name="delete_course" class="form-control" value="<?php echo $row['course_Id']?>">
              <h5>Are you sure you want to delete?</h5>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Close</button>
                <button type="submit" class="btn btn-danger" name="deletecourse"><i class="bi bi-trash"></i> Delete</button>
          </div>
      </form>
    </div>
  </div>
</div>