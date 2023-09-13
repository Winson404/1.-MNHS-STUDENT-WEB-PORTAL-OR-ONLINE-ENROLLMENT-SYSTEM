<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-primary">
        <h4 class="modal-title"><i class="bi bi-plus-square"></i> Create New Subject</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form action="process_save.php" method="POST">
          <!-- Modal body -->
          <div class="modal-body">
              <div class="form-group">
                <label>Year level</label>
                <select class="form-control form-select" name="subject_level" id="option" required="">
                <!-- <option value="" selected="" disabled="">Year level for subject</option> -->
                <option value="Grade 7">Grade 7</option>
                <option value="Grade 8">Grade 8</option>
                <option value="Grade 9">Grade 9</option>
                <option value="Grade 10">Grade 10</option>
                <option value="Grade 11">Grade 11</option>
                <option value="Grade 12">Grade 12</option>
                </select>
              </div>
              <div class="form-group">
                <label>Subject name</label>
                <input type="text" name="subject_name" class="form-control" placeholder="Subject name" autocomplete="off" required="">
              </div>
              <div class="form-group hidden" id="senior">
                <?php
                      $Strand  = mysqli_query($conn, "SELECT DISTINCT course_name FROM courses");
                ?>
                  <label>Strand</label>
                  <select class="form-control form-select" name="strand" autocomplete="off" required="">
                    <?php while($row = mysqli_fetch_array($Strand)) { ?>
                        <option value="<?php echo $row['course_name']; ?>" ><?php echo $row['course_name']; ?></option>
                      <?php } ?>
                  </select>
              </div>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Close</button>
                <button type="submit" class="btn btn-primary" name="save_subject"><i class="bi bi-save2"></i> Save</button>
          </div>
      </form>
    </div>
  </div>
</div>


<script>
    $('#option').change(function(){
    var responseID = $(this).val();
    if(responseID =="Grade 7" || responseID =="Grade 8" || responseID =="Grade 9" || responseID =="Grade 10") {
            document.getElementById("senior").style.display = "none";
    } else if(responseID =="Grade 11" || responseID =="Grade 12") {
            document.getElementById("senior").style.display = "block";
    } else {
            document.getElementById("senior").style.display = "none";
    }
    //console.log(responseID);
    });
</script>