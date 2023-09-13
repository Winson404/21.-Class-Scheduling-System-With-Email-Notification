<!-- UPDATE -->
<div class="modal fade" id="update<?php echo $row['SemesterID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-calendar-days"></i> Update Day</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_update.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" class="form-control" value="<?php echo $row['SemesterID']; ?>" name="SemesterID">
            <div class="form-group">
              <label>Semester name</label>
              <select class="form-control" name="semestername" required>
                <option value="" selected disabled>Select semester</option>
                <option value="1st Semester" <?php if($row['SemesterName'] == "1st Semester")   { echo 'selected'; } ?> >1st Semester</option>
                <option value="2nd Semester" <?php if($row['SemesterName'] == "2nd Semester")   { echo 'selected'; } ?> >2nd Semester</option>
                <option value="3rd Semester" <?php if($row['SemesterName'] == "3rd Semester")   { echo 'selected'; } ?> >3rd Semester</option>
              </select>
            </div>
            <div class="form-group">
              <label>Semester code</label>
              <input type="text" class="form-control"  placeholder="Semester code" name="semestercode" required value="<?php echo $row['SemesterCode']; ?>">
            </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-gradient-primary" name="update_semester"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>





<!-- DELETE -->
<div class="modal fade" id="delete<?php echo $row['SemesterID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-calendar-days"></i> Delete Semester</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_delete.php" method="POST">
          <input type="hidden" class="form-control" value="<?php echo $row['SemesterID']; ?>" name="SemesterID">
          <h6 class="text-center">Delete semester record?</h6>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-gradient-primary" name="delete_semester"><i class="fa-solid fa-trash-can"></i> Delete</button>
      </div>
        </form>
    </div>
  </div>
</div>
