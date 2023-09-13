<div class="container">
    <!-- Modal -->
    <div class="modal fade" id="coursephoto_update<?php echo $row['course_Id']?>" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog ">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" id="add_modalheader" >
                <button class="close" type="button"  data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="add_modallabel">Update Course Photo</h4>
                </div>
                    <form action="process_update.php" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="hidden" name="course_id" class="form-control" value="<?php echo $row['course_Id']?>">
                            <?php 
                                $id = $row['course_Id'];
                                $query = mysqli_query($conn, "SELECT * FROM courses WHERE course_Id='$id' ");
                                while($row = mysqli_fetch_array($query)) {
                            ?>
                            <img src="../images-course/<?php echo $row['course_image'];?>" alt="image"
                            style="width: 150px; height: 150px; display: block;margin-right: auto;margin-left: auto;box-shadow: 4px 4px 7px #b3b3b3;
                            border: 5px solid  #005ce6; margin-top:20px;" >

                          <?php } ?>
                          <br>
                          <input type="file" name="fileToUpload" class="form-control" style="width: 100%;" required="">
                          
                        </div>
                            
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="updatecourse_photo" id="btn_no-outline">
                                <i class="fa fa-save" aria-hidden="true"></i> Save
                            </button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal" id="btn_no-outline">
                                <i class="fa fa-times" aria-hidden="true"></i> Close
                            </button>
                        </div>
                    </form>
            </div>

        </div>
    </div>
</div>