<!-- UPDATE -->
<div class="modal fade" id="update<?php echo $row['CourseID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-graduation-cap"></i> Update Course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_update.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" class="form-control" value="<?php echo $row['CourseID']; ?>" name="CourseID"> 
          <div class="form-group">
              <label>Course Code</label>
              <input type="text" class="form-control"  placeholder="Course Code" name="coursecode" required value="<?php echo $row['CourseCode']; ?>">
            </div>
          <div class="form-group">
              <label>Course Description</label>
              <textarea class="form-control" id="" cols="30" rows="2" name="description"><?php echo $row['CourseDesc']; ?></textarea>
          </div>
            <div class="form-group">
              <label>Hours</label>
              <input type="number" class="form-control"  placeholder="Hours" name="hours" required value="<?php echo $row['Hours']; ?>">
            </div>
            <div class="form-group">
              <label>Units</label>
              <input type="number" class="form-control"  placeholder="Units" name="units" required value="<?php echo $row['Units']; ?>">
            </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-gradient-primary" name="update_course"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>




<!-- DELETE -->
<div class="modal fade" id="delete<?php echo $row['CourseID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-graduation-cap"></i> Delete course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_delete.php" method="POST">
          <input type="hidden" class="form-control" value="<?php echo $row['CourseID']; ?>" name="CourseID">
          <h6 class="text-center">Delete course record?</h6>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-gradient-primary" name="delete_course"><i class="fa-solid fa-trash-can"></i> Delete</button>
      </div>
        </form>
    </div>
  </div>
</div>
