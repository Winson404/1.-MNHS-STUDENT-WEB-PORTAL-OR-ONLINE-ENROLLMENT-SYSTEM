<div class="container">
    <!-- Modal -->
    <div class="modal fade" id="updatecourse_modal<?php echo $row["course_Id"];?>" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog ">

             <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" id="update_modalheader">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title" id="update_modallabel">Update Course</h4>
            </div>
                <form action="process_update.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                             <input type="hidden" name="course_Id" class="form-control" placeholder="Course name" value="<?php echo $row['course_Id']; ?>">
                        <div class="form-group col-md-12 update_photo">
                            <img src="../images-course/<?php echo $row['course_image'];?>" alt="image">
                            <div class="col-md-6"></div>
                            <div class="col-md-6" id="edit">
                                <button  type="file" class="btn btn-default" data-dismiss="modal" data-toggle="modal" data-target="#coursephoto_update<?php echo $row['course_Id']?>" id="btn-create">
                                     <i class="fa fa-edit" aria-hidden="true" id="icon"></i>
                                </button>                              
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
                        <div class="modal-footer">
                              <button type="submit" class="btn btn-success" name="udpate_course" id="btn_no-outline"><i class="fa fa-save" aria-hidden="true"></i> Save</button>
                              <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn_no-outline"><i class="fa fa-times" aria-hidden="true"></i> Close</button>
                        </div>
                </form>
          </div>

        </div>
    </div>
</div>