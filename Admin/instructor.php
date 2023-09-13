<title>Class Scheduling | Instructors</title>
<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1>Instructors</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Instructors</li>
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
                    <th>#</th>
                    <th>Status</th>
                    <th>Full name</th>
                    <th>Department</th>
                    <th>BS</th>
                    <th>Grad Study</th>
                    <th>Post Grad</th>
                    <th>PRC No</th>
                    <th>Tools</th>
                  </tr>
                  </thead>
                  <tbody id="users_data">
                    <tr>
                      <?php 
                        $i = 1;
                        $sql = mysqli_query($conn, "SELECT * FROM instructor");
                        if(mysqli_num_rows($sql) > 0 ) {
                        while ($row = mysqli_fetch_array($sql)) {
                      ?>
                        <td><?php echo $i++; ?></td>
                        <td>
                          <?php if($row['instructorStatus'] == 'Full Time'): ?>
                            <span class="text-success"><i class="fa-solid fa-circle"></i> <?php echo $row['instructorStatus']; ?></span>
                          <?php elseif($row['instructorStatus'] == 'Part Time'): ?>
                            <span class="text-warning"><i class="fa-solid fa-circle"></i> <?php echo $row['instructorStatus']; ?></span>
                          <?php else: ?>
                            <span class="text-info"><i class="fa-solid fa-circle"></i> <?php echo $row['instructorStatus']; ?></span>
                          <?php endif; ?>
                        </td>
                        <td><?php echo ' '.$row['Firstname'].' '.$row['Middlename'].' '.$row['Lastname'].' '; ?></td>
                        <td><?php echo $row['Department']; ?></td>
                        <td><?php echo $row['bachelorsDegree']; ?></td>
                        <td><?php echo $row['gradStudy']; ?></td>
                        <td><?php echo $row['postGrad']; ?></td>
                        <td><?php echo $row['PRC_No']; ?></td>
                        <td>
                          <button type="button" class="btn btn-sm bg-gradient-success" data-toggle="modal" data-target="#update<?php echo $row['InstructorID']; ?>"><i class="fa-solid fa-pen-to-square"></i></button>
                          <button type="button" class="btn btn-sm bg-gradient-danger" data-toggle="modal" data-target="#delete<?php echo $row['InstructorID']; ?>"><i class="fa-solid fa-trash-can"></i></button>
                        </td> 
                    </tr>
                    <?php include 'instructor_update_delete.php'; } } else { ?>
                        <td colspan="100%" class="text-center">No record found</td>
                      </tr>
                    <?php }?>
                  </tbody>
                  <tfoot>
                      <tr>
                        <th>#</th>
                        <th>Status</th>
                        <th>Full name</th>
                        <th>Department</th>
                        <th>BS</th>
                        <th>Grad Study</th>
                        <th>Post Grad</th>
                        <th>PRC No</th>
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


<?php include 'instructor_add.php'; ?>
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
