<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-primary">
        <h4 class="modal-title"><i class="bi bi-plus-square"></i> Create New Course</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form action="process_save.php" method="POST" enctype="multipart/form-data">
          <!-- Modal body -->
          <div class="modal-body">
              <div class="form-group">
                  <label>Course name</label>
                  <input type="text" name="coursename" class="form-control" placeholder="Course name" autocomplete="off" required="">
              </div>
              <div class="form-group">
                  <label>Course description</label>
                  <input type="text" name="coursedescription" class="form-control" placeholder="Course Description" autocomplete="off" required="">
              </div>
              <div class="form-group">
                  <label>Upload Image</label>
                  <input type="file" name="fileToUpload" class="form-control" required="">
              </div>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Close</button>
                <button type="submit" class="btn btn-primary" name="savecourse"><i class="bi bi-save2"></i> Save</button>
          </div>
      </form>
    </div>
  </div>
</div>