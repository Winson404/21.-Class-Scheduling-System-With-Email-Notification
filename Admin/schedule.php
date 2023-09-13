<title>Class Scheduling | Class schedules</title>
<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1>Class schedules</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Class schedules</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <button type="button" class="ml-2 btn bg-gradient-primary" data-toggle="modal" data-target="#add_users"><i class="bi bi-plus-circle"></i> Add</button>
              </div>
              <div class="card-body p-3">

                 <table id="example1" class="table table-bordered table-striped text-sm">
                  <thead>
                  <tr>
                    <th>Instructor name</th>
                    <th>Course</th>
                    <th>Schedule day</th>
                    <th>Room</th>
                    <th>Semester</th>
                    <th>School Year</th>
                    <th>Department</th>
                    <th>Tools</th>
                  </tr>
                  </thead>
                  <tbody id="users_data">
                    <tr>
                      <?php 
                        // WHEN DAY FEATURE IS APPLIED
                        // $sql = mysqli_query($conn, "SELECT * FROM schedule JOIN instructor ON schedule.InstructorID=instructor.instructorID JOIN course ON schedule.CourseID=course.CourseID JOIN day ON schedule.DayID=day.DayID JOIN room ON schedule.RoomID=room.RoomID JOIN semester ON schedule.SemesterID=semester.SemesterID JOIN schoolyear ON schedule.SchoolYearID=schoolyear.SyID");
                        $sql = mysqli_query($conn, "SELECT * FROM schedule JOIN instructor ON schedule.InstructorID=instructor.instructorID JOIN course ON schedule.CourseID=course.CourseID JOIN room ON schedule.RoomID=room.RoomID JOIN semester ON schedule.SemesterID=semester.SemesterID JOIN schoolyear ON schedule.SchoolYearID=schoolyear.SyID");
                        if(mysqli_num_rows($sql) > 0 ) {
                        while ($row = mysqli_fetch_array($sql)) {
                      ?>
                        <td><?php echo ' '.$row['Firstname'].' '.$row['Middlename'].' '.$row['Lastname'].' '; ?></td>
                        <td><?php echo $row['CourseCode']; ?></td>
                        <td><?php echo ''.$row['DayID'].' = '.$row['TimeStart'].'-'.$row['TimeEnd'].''; //''.$row['DayName'].' = '.$row['TimeStart'].'-'.$row['TimeEnd'].''; ?></td>
                        <td><?php echo ' '.$row['RoomName'].' - '.$row['RoomCode'].' '; ?></td>
                        <td><?php echo ' '.$row['SemesterName'].' - '.$row['SemesterCode'].' '; ?></td>
                        <td><?php echo ' '.$row['SyName'].' - '.$row['SyCode'].' '; ?></td>
                        <td><?php echo $row['Department']; ?></td>
                        <td>
                          <button type="button" class="btn btn-sm bg-gradient-success" data-toggle="modal" data-target="#update<?php echo $row['SchedID']; ?>"><i class="fa-solid fa-pen-to-square"></i></button>
                          <button type="button" class="btn btn-sm bg-gradient-danger" data-toggle="modal" data-target="#delete<?php echo $row['SchedID']; ?>"><i class="fa-solid fa-trash-can"></i></button>
                        </td> 
                    </tr>
                    <?php include 'schedule_update_delete.php'; } } else { ?>
                        <td colspan="100%" class="text-center">No record found</td>
                      </tr>
                    <?php }?>
                  </tbody>
                  <tfoot>
                      <tr>
                        <th>Instructor name</th>
                        <th>Course</th>
                        <th>Schedule day</th>
                        <th>Room</th>
                        <th>Semester</th>
                        <th>School Year</th>
                        <th>Department</th>
                        <th>Tools</th>
                      </tr>
                  </tfoot>
                </table>

              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<?php include 'schedule_add.php'; ?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php include 'footer.php'; ?>
