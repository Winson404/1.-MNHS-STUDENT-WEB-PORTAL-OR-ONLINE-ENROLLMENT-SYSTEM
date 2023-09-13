<div class="container">
    <!-- Modal -->
    <div class="modal fade" id="deletecourse_modal<?php echo $row["course_Id"];?>" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog ">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" id="delete_modalheader">
                <button class="close" type="button"  data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="delete_modallabel">Delete Course</h4>
                </div>
                    <form action="process_delete.php" method="POST">
                        <div class="modal-body">
                            <input type="hidden" name="delete_course" class="form-control" value="<?php echo $row['course_Id']?>">
                            <h4>Are you sure you want to delete?</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-warning" name="deletecourse" id="btn_no-outline">
                                <i class="fa fa-trash" aria-hidden="true"></i> Delete
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