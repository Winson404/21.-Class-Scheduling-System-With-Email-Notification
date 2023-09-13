<?php 

    include 'navbar.php'; 
    date_default_timezone_set('Asia/Manila');
    $dateToday = date("F d, Y");

    if(isset($_GET['instructorID'])) {
    $instructorID = $_GET['instructorID'];
    $date        = $_GET['date'];

    $sql = mysqli_query($conn, "SELECT * FROM instructor WHERE instructorID='$instructorID'");
    $row = mysqli_fetch_array($sql);

    // ADD ALL UNITS UNDER SELECTED TEACHER
    $sum = mysqli_query($conn, "SELECT *, SUM(Units) as unit FROM course JOIN schedule ON course.CourseID=schedule.CourseID JOIN instructor ON schedule.InstructorID=instructor.instructorID WHERE schedule.InstructorID='$instructorID'");
    $row_sum = mysqli_fetch_array($sum);

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Barangay Construction Clearance</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Barangay Construction Clearance</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <!-- Main content -->
            <div class="invoice mb-3" id="printElement" style="border: none;">

                <div class="row invoice-info position-relative p-0 m-0" style="line-height: 18px;">
                  <div class="col-sm-2 invoice-col justify-content-center">
                    <img src="../images/logo3.png" alt="" class="d-block m-auto" width="74">
                  </div>
                  <div class="col-sm-8 invoice-col text-center">
                    <address>
                      <small>Republic of the Philippines</small><br>
                      <small>City of Mandaue</small> <br>
                      <strong>MANDAUE CITY COLLEGE</strong><br>
                      <small>Mandaue City Cultural and Sports Complex</small><br>
                      <small>Don Andres Soriano Avenue., Centro, Mandaue City, Cebu, Philippines, 6014</small> <br>
                      <small>Tel No. (032) 236-5520/E-mail: mc-college@hotmail.com</small> <br><br>
                      SCHOOL OF TECHNOLOGY <br>
                      TEACHERS LOAD <br>
                      1st sem 2022-2023
                    </address>
                  </div>
                  <div class="col-sm-2 invoice-col justify-content-center">
                    <img src="../images/logo1.png" alt="" class="d-block m-auto" width="74">
                  </div>
                  <div class="col-sm-12">
                    <div class="dropdown-divider"></div>
                  </div>
                </div>

                <div class="row p-3">
                  <div class="col-12" style="line-height: 18px;">
                    <!-- BACKGROUND LOGO -->
                      <img src="../images/logo1.png" alt="" width="80%" class="position-absolute" style="opacity: .15; top: 0px; left: 72px;">
                      <div class="row">
                        <div class="col-sm-9 invoice-col text-start">
                          <small>Faculty: <?php echo ' '.$row['Firstname'].' '.$row['Middlename'].' '.$row['Lastname'].' '; ?></small><br>
                          <small style="margin-left: 2px;">Status:&nbsp;(<?php if($row['instructorStatus'] == 'Full Time') { echo'✓'; } ?>) Full Time</small><br>
                          <small style="margin-left: 45px;">(<?php if($row['instructorStatus'] == 'Part Time')  { echo'✓'; } ?>) Part Time</small><br>
                          <small style="margin-left: 45px;">(<?php if($row['instructorStatus'] == 'New')  { echo'✓'; } ?>) New</small><br>
                        </div>
                        <div class="col-sm-3 invoice-col text-start" style="line-height: 15px;">
                          <small><b>Academic Qualification:</b></small><br>
                          <small>BS: <span style="text-transform: uppercase;"><?php echo $row['bachelorsDegree']; ?></span></small><br>
                          <small>Grad Study: <span style="text-transform: uppercase;"><?php echo $row['gradStudy']; ?></span></small><br>
                          <small>Post Grad: <span style="text-transform: uppercase;"><?php echo $row['postGrad']; ?></span></small><br>
                          <small>PRC License No: <span style="text-transform: uppercase;"><?php echo $row['PRC_No']; ?></span></small>
                        </div>
                      
                        <div class="col-12 table-responsive mt-4">
                          <table class="table table-striped table-xs text-xs table-bordered text-center p-0 m-0">
                            <thead>
                            <tr>
                              <th>EDP CODE</th>
                              <th>Course Code</th>
                              <th>Course Description</th>
                              <th>Days</th>
                              <th>Time</th>
                              <th>Units</th>
                              <th>Hours</th>
                              <th>Room#</th>
                              
                            </tr>
                            </thead>
                            <tbody>
                              <?php 
                                // WHEN DAY FEATURE IS APPLIED
                                // $sql2 = mysqli_query($conn, "SELECT * FROM schedule JOIN instructor ON schedule.InstructorID=instructor.instructorID JOIN course ON schedule.CourseID=course.CourseID JOIN day ON schedule.DayID=day.DayID JOIN room ON schedule.RoomID=room.RoomID JOIN semester ON schedule.SemesterID=semester.SemesterID JOIN schoolyear ON schedule.SchoolYearID=schoolyear.SyID WHERE schedule.InstructorID='$instructorID'");
                                $sql2 = mysqli_query($conn, "SELECT * FROM schedule JOIN instructor ON schedule.InstructorID=instructor.instructorID JOIN course ON schedule.CourseID=course.CourseID JOIN room ON schedule.RoomID=room.RoomID JOIN semester ON schedule.SemesterID=semester.SemesterID JOIN schoolyear ON schedule.SchoolYearID=schoolyear.SyID WHERE schedule.InstructorID='$instructorID'");
                                while($row2 = mysqli_fetch_array($sql2)) {
                              ?>
                              <tr>
                                <td><?php echo $row2['EDP']; ?></td>
                                <td><?php echo $row2['CourseCode']; ?></td>
                                <td><?php echo $row2['CourseDesc']; ?></td>
                                <td><?php echo $row2['DayID']; ?></td>
                                <td><?php echo ''.$row2['TimeStart'].'-'.$row2['TimeEnd'].''; ?></td>
                                <td><?php echo $row2['Units']; ?></td>
                                <td><?php echo $row2['Hours']; ?></td>
                                <td><?php echo $row2['RoomName']; ?></td>
                               
                              </tr>
                              <?php } ?>
                              <tr>
                                <td class="text-bold" colspan="5">Total Units</td>
                                <td class="text-bold"><?php echo $row_sum['unit']; ?></td>
                                <td colspan="4"></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>

                      <div class="row p-0 mt-3">
                        <div class="col-12 mb-3 text-center" >

                          <p class="text-sm">_________________________________ <br> <strong>conforme</strong></p>
                        </div>

                        <?php 
                          $fetch = mysqli_query($conn, "SELECT * FROM official WHERE description='BS INFO TECH PROGRAM CHAIR'");
                          $a = mysqli_fetch_array($fetch);
                        ?>
                        <div class="col-4">
                            <small>Prepared by:</small>
                            <div class="text-center mt-4 text-xs">
                              <p style="border-bottom: 1px solid grey; width: auto; text-transform: uppercase;"><strong><?php echo ''.$a['firstname'].' '.$a['middlename'].' '.$a['lastname'].', '.$a['degree'].'' ?></strong></p>
                              <p style="margin-top: -15px;">BS INFO TECH PROGRAM CHAIR</p>
                            </div>
                        </div>

                        <?php 
                          $fetch = mysqli_query($conn, "SELECT * FROM official WHERE description='DEAN SCHOOL OF TECHNOLOGY'");
                          $b = mysqli_fetch_array($fetch);
                        ?>
                        <div class="col-4">
                            <small>Recommending Approval:</small>
                            <div class="text-center mt-4 text-xs">
                              <p style="border-bottom: 1px solid grey; width: auto; text-transform: uppercase;"><strong><?php echo ''.$b['firstname'].' '.$b['middlename'].' '.$b['lastname'].', '.$b['degree'].'' ?></strong></p>
                              <p style="margin-top: -15px;">DEAN SCHOOL OF TECHNOLOGY</p>
                            </div>
                        </div>

                        <?php 
                          $fetch = mysqli_query($conn, "SELECT * FROM official WHERE description='OIC, College Administrator'");
                          $c = mysqli_fetch_array($fetch);
                        ?>
                        <div class="col-4">
                            <small>Approved by:</small>
                            <div class="text-center mt-4 text-xs">
                              <p style="border-bottom: 1px solid grey; width: auto; text-transform: uppercase;"><strong><?php echo ''.$c['firstname'].' '.$c['middlename'].' '.$c['lastname'].', '.$c['degree'].'' ?></strong></p>
                              <p style="margin-top: -15px;">OIC, College Administrator</p>
                            </div>
                        </div>
                      </div>

                      
                  </div>
                </div>

                

            </div>


              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <button id="printButton" type="button" class="btn btn-dark float-right mt-3"><i class="fas fa-print"></i> Print</button>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </section>
   
  </div>
 
<?phP } else { include '404.php'; } ?>
<script src="print.js"> </script>
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
 