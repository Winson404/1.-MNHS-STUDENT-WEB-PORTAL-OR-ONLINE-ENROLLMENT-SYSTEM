<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-primary">
        <h4 class="modal-title"><i class="bi bi-plus-square"></i> Create New Level and Section</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <form action="process_save.php" method="POST">
          <!-- Modal body -->
          <div class="modal-body">
              <div class="form-group">
                <label>Level</label>
                <select class="form-control form-select" name="level" required>
                    <option value="" selected="" disabled="">Select Year Level</option>
                    <option value="Grade 7">Grade 7</option>
                    <option value="Grade 8">Grade 8</option>
                    <option value="Grade 9">Grade 9</option>
                    <option value="Grade 10">Grade 10</option>  
                    <option value="Grade 11">Grade 11</option>
                    <option value="Grade 12">Grade 12</option>                     
                </select>
              </div>
              <div class="form-group">
                <label>Section</label>
                <input type="text" name="section" class="form-control" placeholder="Section" autocomplete="off" required="">
              </div>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Close</button>
                <button type="submit" class="btn btn-primary" name="savelevel_section"><i class="bi bi-save2"></i> Save</button>
          </div>
      </form>
    </div>
  </div>
</div>