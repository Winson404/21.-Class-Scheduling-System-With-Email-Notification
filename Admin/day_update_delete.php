<!-- UPDATE -->
<div class="modal fade" id="update<?php echo $row['DayID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <input type="hidden" class="form-control" value="<?php echo $row['DayID']; ?>" name="DayID">
            <div class="form-group">
              <label>Day Name</label>
              <select class="form-control" name="dayname" required>
                <option value="" selected disabled>Select day</option>
                <option value="Monday"   <?php if($row['DayName'] == "Monday")   { echo 'selected'; } ?> >Monday</option>
                <option value="Tuesday"  <?php if($row['DayName'] == "Tuesday")  { echo 'selected'; } ?> >Tuesday</option>
                <option value="Wednesday"<?php if($row['DayName'] == "Wednesday"){ echo 'selected'; } ?> >Wednesday</option>
                <option value="Thursday" <?php if($row['DayName'] == "Thursday") { echo 'selected'; } ?> >Thursday</option>
                <option value="Friday"   <?php if($row['DayName'] == "Friday")   { echo 'selected'; } ?> >Friday</option>
                <option value="Saturday" <?php if($row['DayName'] == "Saturday") { echo 'selected'; } ?> >Saturday</option>
                <option value="Sunday"   <?php if($row['DayName'] == "Sunday")   { echo 'selected'; } ?> >Sunday</option>
              </select>
            </div>
            <div class="form-group">
              <label>Day code</label>
              <input type="text" class="form-control"  placeholder="Room code" name="daycode" required value="<?php echo $row['DayCode']; ?>">
            </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-gradient-primary" name="update_day"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>





<!-- DELETE -->
<div class="modal fade" id="delete<?php echo $row['DayID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-calendar-days"></i> Delete Day</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_delete.php" method="POST">
          <input type="hidden" class="form-control" value="<?php echo $row['DayID']; ?>" name="DayID">
          <h6 class="text-center">Delete day record?</h6>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-gradient-primary" name="delete_day"><i class="fa-solid fa-trash-can"></i> Delete</button>
      </div>
        </form>
    </div>
  </div>
</div>
