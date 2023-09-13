<!-- CREATE NEW -->
<div class="modal fade" id="add_users" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-chalkboard-user"></i> Create Instructor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_save.php" method="POST" enctype="multipart/form-data">
          <div class="form-group"><a href="#" class="text-bold">BASIC INFORMATION</a></div>
          <div class="form-group">
            <label>First name</label>
            <input type="text" class="form-control"  placeholder="First name" name="firstname" required onkeyup="lettersOnly(this)">
          </div>
          <div class="form-group">
              <label>Middle name</label>
              <input type="text" class="form-control"  placeholder="Middle name" name="middlename" onkeyup="lettersOnly(this)">
          </div>
          <div class="form-group">
            <label>Last name</label>
            <input type="text" class="form-control"  placeholder="Last name" name="lastname" required onkeyup="lettersOnly(this)">
          </div>
          <div class="form-group">
            <label>Department</label>
            <input type="text" class="form-control"  placeholder="Department" name="department" required>
          </div>
          <div class="form-group"><hr><a href="#" class="text-bold">ACADEMIC QUALIFICATIONS</a></div>
          <div class="form-group">
              <label>Bachelor's Degree</label>
              <input type="text" class="form-control"  placeholder="Bachelor's Degree" name="bachelorsDegree" required>
            </div>
          <div class="form-group">
              <label>Grad Study</label>
              <input type="text" class="form-control"  placeholder="Grad Study" name="gradStudy">
          </div>
          <div class="form-group">
            <label>Post Grad:</label>
            <input type="text" class="form-control"  placeholder="Post Grad" name="postGrad" required>
          </div>
          <div class="form-group">
            <label>PRC License No</label>
            <input type="text" class="form-control"  placeholder="PRC License No" name="PRC_No" required>
          </div>
          <div class="form-group"><hr><a href="#" class="text-bold">INSTRUCTOR STATUS</a></div>
          <div class="form-group">
            <label>Status</label>
            <select class="form-control" name="instructorStatus" required>
              <option value="" selected disabled>Select status</option>
              <option value="Full Time">Full Time</option>
              <option value="Part Time">Part Time</option>
              <option value="New">New</option>
            </select>
          </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-gradient-primary" name="create_instructor"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
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