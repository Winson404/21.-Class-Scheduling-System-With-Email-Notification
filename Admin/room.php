<title>Class Scheduling | Room</title>
<?php include 'navbar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1>Room</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Room</li>
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
                    <th>Room Name</th>
                    <th>Room Code</th>
                    <th>Capacity</th>
                    <th>Tools</th>
                  </tr>
                  </thead>
                  <tbody id="users_data">
                    <tr>
                      <?php 
                        $i = 1;
                        $sql = mysqli_query($conn, "SELECT * FROM room");
                        if(mysqli_num_rows($sql) > 0 ) {
                        while ($row = mysqli_fetch_array($sql)) {
                      ?>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row['RoomName']; ?></td>
                        <td><?php echo $row['RoomCode']; ?></td>
                        <td><?php echo $row['Capacity']; ?></td>
                        <td>
                          <button type="button" class="btn btn-sm bg-gradient-success" data-toggle="modal" data-target="#update<?php echo $row['RoomID']; ?>"><i class="fa-solid fa-pen-to-square"></i></button>
                          <button type="button" class="btn btn-sm bg-gradient-danger" data-toggle="modal" data-target="#delete<?php echo $row['RoomID']; ?>"><i class="fa-solid fa-trash-can"></i></button>
                        </td> 
                    </tr>
                    <?php include 'room_update_delete.php'; } } else { ?>
                        <td colspan="100%" class="text-center">No record found</td>
                      </tr>
                    <?php }?>
                  </tbody>
                  <tfoot>
                      <tr>
                        <th>#</th>
                        <th>Room Name</th>
                        <th>Room Code</th>
                        <th>Capacity</th>
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


<?php include 'room_add.php'; ?>
<?php include 'footer.php'; ?>
