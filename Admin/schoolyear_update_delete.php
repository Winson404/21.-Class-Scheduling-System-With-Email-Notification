<!-- UPDATE -->
<div class="modal fade" id="update<?php echo $row['SyID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-calendar-days"></i> Update School Year</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_update.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" class="form-control" value="<?php echo $row['SyID']; ?>" name="SyID">
            <div class="form-group">
              <label>School Year name</label>
              <select class="form-control" name="syname" required>
                <option value="" selected disabled>Select school year</option>
                <option value="2021-2022" <?php if($row['SyName'] == "2021-2022") { echo 'selected'; } ?> >2021-2022</option>
                <option value="2022-2023" <?php if($row['SyName'] == "2022-2023") { echo 'selected'; } ?> >2022-2023</option>
                <option value="2023-2024" <?php if($row['SyName'] == "2023-2024") { echo 'selected'; } ?> >2023-2024</option>
                <option value="2024-2025" <?php if($row['SyName'] == "2024-2025") { echo 'selected'; } ?> >2024-2025</option>
                <option value="2025-2026" <?php if($row['SyName'] == "2025-2026") { echo 'selected'; } ?> >2025-2026</option>
                <option value="2026-2027" <?php if($row['SyName'] == "2026-2027") { echo 'selected'; } ?> >2026-2027</option>
                <option value="2027-2028" <?php if($row['SyName'] == "2027-2028") { echo 'selected'; } ?> >2027-2028</option>
                <option value="2028-2029" <?php if($row['SyName'] == "2028-2029") { echo 'selected'; } ?> >2028-2029</option>
                <option value="2029-2030" <?php if($row['SyName'] == "2029-2030") { echo 'selected'; } ?> >2029-2030</option>
                <option value="2030-2031" <?php if($row['SyName'] == "2030-2031") { echo 'selected'; } ?> >2030-2031</option>
                <option value="2031-2032" <?php if($row['SyName'] == "2031-2032") { echo 'selected'; } ?> >2031-2032</option>
                <option value="2032-2033" <?php if($row['SyName'] == "2032-2033") { echo 'selected'; } ?> >2032-2033</option>
              </select>
            </div>
            <div class="form-group">
              <label>School Year code</label>
              <input type="text" class="form-control"  placeholder="School Year code" name="sycode" required value="<?php echo $row['SyCode']; ?>">
            </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-gradient-primary" name="update_sy"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>





<!-- DELETE -->
<div class="modal fade" id="delete<?php echo $row['SyID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-calendar-days"></i> Delete School Year</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_delete.php" method="POST">
          <input type="hidden" class="form-control" value="<?php echo $row['SyID']; ?>" name="SyID">
          <h6 class="text-center">Delete school year record?</h6>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-gradient-primary" name="delete_sy"><i class="fa-solid fa-trash-can"></i> Delete</button>
      </div>
        </form>
    </div>
  </div>
</div>
