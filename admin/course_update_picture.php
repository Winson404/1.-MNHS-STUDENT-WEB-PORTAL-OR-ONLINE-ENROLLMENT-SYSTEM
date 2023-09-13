<!-- The Modal -->
<div class="modal fade" id="coursephoto_update<?php echo $row['course_Id']; ?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-success">
        <h4 class="modal-title">Update Course Photo</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form action="process_update.php" method="POST" enctype="multipart/form-data">
          <!-- Modal body -->
          <div class="modal-body">
              <input type="hidden" name="course_id" class="form-control" value="<?php echo $row['course_Id']?>">
              <img src="../images-course/<?php echo $row['course_image'];?>" alt="image" class="course_photo">
              <br>
              <br>
              <input type="file" name="fileToUpload" class="form-control" required="">
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Close</button>
                <button type="submit" class="btn btn-success" name="updatecourse_photo"><i class="bi bi-pencil-square"></i> Update</button>
          </div>
      </form>
    </div>
  </div>
</div>