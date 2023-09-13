<div class="container">
      <!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog ">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" id="add_modalheader">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" id="add_modallabel">Create New Course</h4>
            </div>
                <form action="process_save.php" method="POST" enctype="multipart/form-data">
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
                        <div class="modal-footer">
                              <button type="submit" class="btn btn-primary" name="savecourse" id="btn_no-outline"><i class="fa fa-save" aria-hidden="true"></i> Save</button>
                              <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn_no-outline"><i class="fa fa-times" aria-hidden="true"></i> Close</button>
                        </div>
                </form>
          </div>

        </div>
      </div>
</div>