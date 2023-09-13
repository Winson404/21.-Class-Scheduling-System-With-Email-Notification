<!-- CREATE NEW -->
<div class="modal fade" id="add_users" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-calendar-days"></i> Create Schedule</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_save.php" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-8 mb-3">
                <span><b>Instructor name</b></span>
                <select class="form-control" name="instructor" >
                  <option value="" selected disabled>Select instructor</option>
                  <?php 
                    $data = mysqli_query($conn, "SELECT * FROM instructor");
                    if(mysqli_num_rows($data) > 0) {
                      while ($ins = mysqli_fetch_array($data)) {
                  ?>
                  <option value="<?php echo $ins['InstructorID'] ?>"><?php echo ' '.$ins['Firstname'].' '.$ins['Middlename'].' '.$ins['Lastname'].' '; ?></option>
                  <?php } } else { ?>
                  <option value="" selected>There are no Instructor records saved in the database.</option>
                  <?php } ?>
                </select>
            </div>

            <div class="col-lg-4 mb-3">
                <span><b>Course name</b></span>
                <select class="form-control" name="course" required >
                  <option value="" selected disabled>Select course</option>
                  <?php 
                    $course = mysqli_query($conn, "SELECT * FROM course");
                    if(mysqli_num_rows($course) > 0) {
                      while ($c = mysqli_fetch_array($course)) {
                  ?>
                  <option value="<?php echo $c['CourseID'] ?>"><?php echo $c['CourseCode']; ?></option>
                  <?php } } else { ?>
                  <option value="" selected>There are no Course records saved in the database.</option>
                  <?php } ?>
                </select>
            </div>

            <div class="col-lg-6 mb-3">
                <!-- DAY OPTIONS BELOW IS DEPENDENT ON DAY ON NAVBAR WHICH IS HIDDEN -->
                <!-- <span><b>Day</b></span>
                <select class="form-control" name="day" required >
                  <option value="" selected disabled>Select day</option>
                  <?php 
                   // $day = mysqli_query($conn, "SELECT * FROM day");
                   // if(mysqli_num_rows($day) > 0) {
                   //   while ($d = mysqli_fetch_array($day)) {
                  ?>
                  <option value="<?php //echo $d['DayID'] ?>"><?php //echo ''.$d['DayName'].' - '.$d['DayCode'].''; ?></option>
                  <?php //} } else { ?>
                  <option value="" selected>There are no Day records saved in the database.</option>
                  <?php //} ?>
                </select> -->
                <span><b>Day</b></span>
                <input type="text" class="form-control" placeholder="Monday, Tuesday, Wednesday, Thursday, Friday" name="day" required>
            </div>

            <div class="col-lg-3 mb-3">
                <span><b>Time start</b></span>
                <input type="text" class="form-control" placeholder="01:00 AM - 02:00 AM" name="timestart" required>
            </div>

            <div class="col-lg-3 mb-3">
                <span><b>Time end</b></span>
                <input type="text" class="form-control" placeholder="01:00 PM - 02:00 PM" name="timeend" required>
            </div>

            <div class="col-lg-4 mb-3">
                <span><b>Room</b></span>
                <select class="form-control" name="room" required >
                  <option value="" selected disabled>Select room</option>
                  <?php 
                    $room = mysqli_query($conn, "SELECT * FROM room");
                    if(mysqli_num_rows($room) > 0) {
                      while ($r = mysqli_fetch_array($room)) {
                  ?>
                  <option value="<?php echo $r['RoomID'] ?>"><?php echo ''.$r['RoomName'].' - '.$r['RoomCode'].''; ?></option>
                  <?php } } else { ?>
                  <option value="" selected>There are no <b>Room</b> records saved in the database.</option>
                  <?php } ?>
                </select>
            </div>

            <div class="col-lg-4 mb-3">
                <span><b>Semester</b></span>
                <select class="form-control" name="semester" required >
                  <option value="" selected disabled>Select semester</option>
                  <?php 
                    $semester = mysqli_query($conn, "SELECT * FROM semester");
                    if(mysqli_num_rows($semester) > 0) {
                      while ($s = mysqli_fetch_array($semester)) {
                  ?>
                  <option value="<?php echo $s['SemesterID'] ?>"><?php echo ''.$s['SemesterName'].' - '.$s['SemesterCode'].''; ?></option>
                  <?php } } else { ?>
                  <option value="" selected>There are no Semester records saved in the database.</option>
                  <?php } ?>
                </select>
            </div>

            <div class="col-lg-4 mb-3">
                <span><b>School Year</b></span>
                <select class="form-control" name="schoolyear" required >
                  <option value="" selected disabled>Select school year</option>
                  <?php 
                    $schoolyear = mysqli_query($conn, "SELECT * FROM schoolyear");
                    if(mysqli_num_rows($schoolyear) > 0) {
                      while ($sy = mysqli_fetch_array($schoolyear)) {
                  ?>
                  <option value="<?php echo $sy['SyID'] ?>"><?php echo ''.$sy['SyName'].' - '.$sy['SyCode'].''; ?></option>
                  <?php } } else { ?>
                  <option value="" selected>There are no School Year records saved in the database.</option>
                  <?php } ?>
                </select>
            </div>

            <div class="col-lg-7 mb-3">
                <span><b>Department</b></span>
                <input type="text" class="form-control" placeholder="Department" name="department" required>
            </div>
             <div class="col-lg-5 mb-3">
                <span><b>EDP Code</b></span>
                <input type="text" class="form-control" placeholder="EDP Code" name="edp" required>
            </div>

        </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-gradient-primary" name="create_schedule" id="create_admin"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>




