<title>Online Entrance Examination | Questions</title>
<?php include 'navbar.php'; ?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Questions</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Questions</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">

               <form action="process_save.php" method="POST">
                  <div class="row bg-light">
                    <div class="col-6">
                      <div class="form-group">
                          <span><b>Filter Questions by category:</b></span>
                          <select class="select2" data-placeholder="Shelf location" id="instructor" style="width: 100%;" onchange="myFunctionCategory(this.value)" required>
                              <option selected disabled value="">Select category</option>
                              <?php  
                                  $fetch = mysqli_query($conn, "SELECT * FROM instructor");
                                  while($row = mysqli_fetch_array($fetch)) {
                              ?>
                              <option value="<?php echo $row['InstructorID']; ?>"><?php echo ' '.$row['Firstname'].' '.$row['Middlename'].' '.$row['Lastname'].' '; ?></option>
                              <?php } ?>
                          </select>
                          <!-- PASSING VALUE ON CHANGE -->
                          <input type="hidden" class="form-control" id="as_is_instructorID" name="instructorID" required>
                          <!-- END PASSING VALUE ON CHANGE -->
                      </div>
                  </div>
                  <div class="col-2 mt-4">
                    <div class="form-group">
                      <button type="submit" class="btn btn-dark" name="printReport"><i class="fa-solid fa-print"></i> Print</button>
                    </div>
                  </div>
                  </div>
                </form>

                 <table id="example12" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Course</th>
                    <th>Schedule day</th>
                    <th>Room</th>
                    <th>Semester</th>
                    <th>School Year</th>
                    <th>Department</th>
                  </tr>
                  </thead>
                    <tbody id="users_data">
                      <tr>
                        <?php 
                          $sql = mysqli_query($conn, "SELECT * FROM schedule JOIN instructor ON schedule.InstructorID=instructor.instructorID JOIN course ON schedule.CourseID=course.CourseID JOIN day ON schedule.DayID=day.DayID JOIN room ON schedule.RoomID=room.RoomID JOIN semester ON schedule.SemesterID=semester.SemesterID JOIN schoolyear ON schedule.SchoolYearID=schoolyear.SyID");
                          if(mysqli_num_rows($sql) > 0) {
                          while ($row = mysqli_fetch_array($sql)) {
                        ?>
                          <td><?php echo $row['CourseCode']; ?></td>
                          <td><?php echo ''.$row['DayName'].' = '.$row['TimeStart'].'-'.$row['TimeEnd'].''; ?></td>
                          <td><?php echo ' '.$row['RoomName'].' - '.$row['RoomCode'].' '; ?></td>
                          <td><?php echo ' '.$row['SemesterName'].' - '.$row['SemesterCode'].' '; ?></td>
                          <td><?php echo ' '.$row['SyName'].' - '.$row['SyCode'].' '; ?></td>
                          <td><?php echo $row['Department']; ?></td>
                      </tr>

                      <?php } } else { ?>
                        <td colspan="100%" class="text-center">No record found</td>
                        <tr/>
                      <?php } ?>
                    </tbody>
                  <tfoot>
                      <tr>
                        <th>Course</th>
                        <th>Schedule day</th>
                        <th>Room</th>
                        <th>Semester</th>
                        <th>School Year</th>
                        <th>Department</th>
                      </tr>
                  </tfoot>
                </table>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>



<?php include 'footer.php';  ?>


<script>
    function myFunctionCategory(cat_Id){ 

      var x = document.getElementById("instructor").value;
      document.getElementById("as_is_instructorID").value = x;
      
      $.ajax({
      type:'post',
      url: 'ajax.php',
      data : 'request=' + x, 
      success : function(data){
      $('#users_data').html(data);
      }
      })
    }
</script>