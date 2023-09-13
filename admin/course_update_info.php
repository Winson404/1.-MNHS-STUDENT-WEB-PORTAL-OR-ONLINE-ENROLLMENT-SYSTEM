<!-- The Modal -->
<div class="modal fade" id="updatecourse_modal<?php echo $row['course_Id']; ?>">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-success">
        <h4 class="modal-title"><i class="bi bi-pencil-square"></i> Update Course</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form action="process_update.php" method="POST" enctype="multipart/form-data">
          <!-- Modal body -->
          <div class="modal-body">
              <input type="hidden" name="course_Id" class="form-control" placeholder="Course name" value="<?php echo $row['course_Id']; ?>">
              <div class="form-group">
                  <img src="../images-course/<?php echo $row['course_image'];?>" alt="image" class="course_photo">
                  <div>
                      <button  type="button" class="btn btn-success mt-2"  data-bs-toggle="modal" data-bs-target="#coursephoto_update<?php echo $row['course_Id']; ?>" id="btn-create"><i class="bi bi-pencil-square"></i> Change photo</button>
                  </div> 
              </div>
              <div class="form-group">
                  <label>Course name</label>
                  <input type="text" name="update_name" class="form-control" placeholder="Course name" value="<?php echo $row['course_name']; ?>" autocomplete="off" required="">
              </div>
              <div class="form-group">
                  <label>Course description</label>
                  <input type="text" name="update_description" class="form-control" placeholder="Course Description" value="<?php echo $row['course_description']; ?>" autocomplete="off" required="">
              </div>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Close</button>
                <button type="submit" class="btn btn-success" name="udpate_course"><i class="bi bi-pencil-square"></i> Update</button>
          </div>
      </form>
    </div>
  </div>
</div>