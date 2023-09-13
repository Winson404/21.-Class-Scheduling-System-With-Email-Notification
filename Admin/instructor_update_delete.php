<!-- UPDATE -->
<div class="modal fade" id="update<?php echo $row['InstructorID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-chalkboard-user"></i> Update Instructor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_update.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" class="form-control" value="<?php echo $row['InstructorID']; ?>" name="InstructorID">
          <div class="form-group"><a href="#" class="text-bold">BASIC INFORMATION</a></div>
          <div class="form-group">  
              <label>First name</label>
              <input type="text" class="form-control"  placeholder="First name" name="firstname" required onkeyup="lettersOnly(this)" value="<?php echo $row['Firstname']; ?>">
            </div>
          <div class="form-group">
              <label>Middle name</label>
              <input type="text" class="form-control"  placeholder="Middle name" name="middlename" onkeyup="lettersOnly(this)" value="<?php echo $row['Middlename']; ?>">
          </div>
          <div class="form-group">
            <label>Last name</label>
            <input type="text" class="form-control"  placeholder="Last name" name="lastname" required onkeyup="lettersOnly(this)" value="<?php echo $row['Lastname']; ?>">
          </div>
          <div class="form-group">
            <label>Department</label>
            <input type="text" class="form-control"  placeholder="Department" name="department" required value="<?php echo $row['Department']; ?>">
          </div>
          <div class="form-group"><hr><a href="#" class="text-bold">ACADEMIC QUALIFICATIONS</a></div>
          <div class="form-group">
              <label>Bachelor's Degree</label>
              <input type="text" class="form-control"  placeholder="Bachelor's Degree" name="bachelorsDegree" required value="<?php echo $row['bachelorsDegree']; ?>">
            </div>
          <div class="form-group">
              <label>Grad Study</label>
              <input type="text" class="form-control"  placeholder="Grad Study" name="gradStudy" value="<?php echo $row['gradStudy']; ?>">
          </div>
          <div class="form-group">
            <label>Post Grad:</label>
            <input type="text" class="form-control"  placeholder="Post Grad" name="postGrad" required value="<?php echo $row['postGrad']; ?>">
          </div>
          <div class="form-group">
            <label>PRC License No</label>
            <input type="text" class="form-control"  placeholder="PRC License No" name="PRC_No" required value="<?php echo $row['PRC_No']; ?>">
          </div>
          <div class="form-group"><hr><a href="#" class="text-bold">INSTRUCTOR STATUS</a></div>
          <div class="form-group">
            <label>Status</label>
            <select class="form-control" name="instructorStatus" required>
              <option value="" selected disabled>Select status</option>
              <option value="Full Time" <?php if($row['instructorStatus'] == 'Full Time') { echo 'selected'; } ?>>Full Time</option>
              <option value="Part Time" <?php if($row['instructorStatus'] == 'Part Time') { echo 'selected'; } ?>>Part Time</option>
              <option value="New" <?php if($row['instructorStatus'] == 'New') { echo 'selected'; } ?>>New</option>
            </select>
          </div>

      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-gradient-primary" name="update_instructor"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
   function lettersOnly(input) {
      var regex = /[^a-z ]/gi;
      input.value = input.value.replace(regex, "");
    }
</script>



<!-- DELETE -->
<div class="modal fade" id="delete<?php echo $row['InstructorID']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-chalkboard-user"></i> Delete Instructor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_delete.php" method="POST">
          <input type="hidden" class="form-control" value="<?php echo $row['InstructorID']; ?>" name="InstructorID">
          <h6 class="text-center">Delete instructor record?</h6>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-gradient-primary" name="delete_instructor"><i class="fa-solid fa-trash-can"></i> Delete</button>
      </div>
        </form>
    </div>
  </div>
</div>
