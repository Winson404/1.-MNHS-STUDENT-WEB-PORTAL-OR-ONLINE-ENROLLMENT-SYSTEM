<!-- The Modal -->
<div class="modal fade" id="student_photo_update<?php echo $row['enrollment_id']; ?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-success">
        <h4 class="modal-title"><i class="bi bi-pencil-square"></i> Change Profile</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form action="process_update.php" method="POST" enctype="multipart/form-data">
          <!-- Modal body -->
          <div class="modal-body">
              <input type="hidden" name="stud_id" class="form-control" value="<?php echo $row['stud_Id']?>"> 
              <img src="../images-students/<?php echo $row['image'];?>" alt="image" class="person">
              <br>
              <input type="file" name="fileToUpload" class="form-control" required="">
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Close</button>
                <button type="submit" class="btn btn-success" name="update_enrolled_student_profile"><i class="bi bi-pencil-square"></i> Update</button>
          </div>
      </form>
    </div>
  </div>
</div>