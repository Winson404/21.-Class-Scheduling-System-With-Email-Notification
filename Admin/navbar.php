<?php
    include '../config.php';
    if(isset($_SESSION['admin_Id'])) {
    $id = $_SESSION['admin_Id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Class Scheduling | Dashboard</title>
  <!---FAVICON ICON FOR WEBSITE--->
  <link rel="shortcut icon" type="image/png" href="../images/logo1.png">
  <!-- Select2 -->
  <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Font Awesome -->
  <!-- <script src="https://kit.fontawesome.com/ba6fe04144.js" crossorigin="anonymous"></script> -->
  <script src="../plugins/fontawesome-free/js/font-awesome-ni-erwin.js" crossorigin="anonymous"></script>
  
  <!-- Tempusdominus Bootstrap 4 -->
  <!-- <link rel="stylesheet" href="css/tempudsdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"> -->
  <!-- iCheck -->
  <!-- <link rel="stylesheet" href="css/icheck-bootstrap/icheck-bootstrap.min.css"> -->
  <!-- JQVMap -->
  <!-- <link rel="stylesheet" href="css/jqvmap/jqvmap.min.css"> -->
  <!-- overlayScrollbars -->
  <!-- <link rel="stylesheet" href="css/overlayScrollbars/css/OverlayScrollbars.min.css"> -->
  <!-- Daterange picker -->
  <!-- <link rel="stylesheet" href="css/daterangepicker/daterangepicker.css"> -->
  <!-- summernote -->
  <!-- <link rel="stylesheet" href="css/summernote/summernote-bs4.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<style>
  body {
    font-family: 'Roboto', sans-serif;
  }
  .modal-content{
    -webkit-box-shadow: 0 5px 15px rgba(0,0,0,0);
    -moz-box-shadow: 0 5px 15px rgba(0,0,0,0);
    -o-box-shadow: 0 5px 15px rgba(0,0,0,0);
    box-shadow: 0 5px 15px rgba(0,0,0,0);
  }
</style>
</head>
<!-- LIGHT MODE -->
<!-- <body class="hold-transition sidebar-mini layout-fixed"> -->
<!-- DARK MODE -->
<!-- <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">  -->
<body class="hold-transition sidebar-mini  layout-fixed layout-navbar-fixed layout-footer-fixed"> 
<div class="wrapper">


  <!-- Navbar -->
  <!-- LIGHT MODE -->
  <!-- <nav class="main-header navbar navbar-expand navbar-white navbar-light"> -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="dashboard.php" class="nav-link">Home</a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="contact-us.php" class="nav-link">Contact</a>
      </li> -->
    </ul>

<?php 
    $users = mysqli_query($conn, "SELECT * FROM users WHERE user_Id='$id'");
    $row = mysqli_fetch_array($users);
?>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- <li class="mt-1">
        <a class="mt-3">Today is <?php echo date("l"); ?> | <?php echo date("d, M Y"); ?></a>
      </li> -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa-solid fa-user"></i> <?php echo ' '.$row['firstname'].' '.$row['lastname'].' '; ?> <i class="fa-solid fa-caret-down"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <div class="media">
              <!-- <img src="../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle"> -->
              <img src="../images-users/<?php echo $row['image']; ?>" alt="User Image" class="mr-3 img-circle" height="50" width="50">
              <div class="media-body">
                  <h3 class="dropdown-item-title"><?php echo ' '.$row['firstname'].' '.$row['lastname'].' '.$row['middlename'].' '.$row['suffix'].' '; ?></h3>
                  <p class="text-sm text-muted"><?php echo $row['user_type']; ?></p>
              </div>
            </div>
          </a>
          <div class="dropdown-divider"></div>
            <a type="button" href="profile.php" class="dropdown-item">&nbsp;<i class="fa-solid fa-gear"></i>&nbsp;&nbsp; Profile settings</a>
          <div class="dropdown-divider"></div>
          <!-- DISPLAY LEFT SIDE - LOGOUT  -->
           <a href="#" class="d-flex justify-content-start dropdown-item dropdown-footer" onclick="logout()">&nbsp;<i class="fa-solid fa-power-off"></i>&nbsp;&nbsp; Logout</a>
          <!-- DISPLAY CENTER -->
          <!-- <a type="button" href="#" class="dropdown-item dropdown-footer" onclick="logout()"><i class="fa-solid fa-power-off"></i>&nbsp;&nbsp; Logout</a> -->
        </div>
      </li>

      <!-- FULL SCREEN -->
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li> -->
      <!-- END FULL SCREEN -->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      <img src="../images/logo1.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
      <span class="brand-text font-weight-light ml-1">Class Scheduling</span>
      <br>
      <span class="brand-text text-sm ml-5 font-weight-light">&nbsp;&nbsp;&nbsp;Mandaue City College</span>
    </a>


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-4 pb-2 pt-2 mb-3 d-flex">
        <div class="image">
          <?php if($row['image'] == ""): ?>
          <img src="../dist/img/avatar.png" alt="User Avatar" class="img-size-50 img-circle">
          <?php else: ?>
          <img src="../images-users/<?php echo $row['image']; ?>" alt="User Image" style="height: 34px; width: 34px; border-radius: 50%;">
          <?php endif; ?>
        </div>
        <div class="info">
          <a href="profile.php" class="d-block"><?php echo ' '.$row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix'].' '; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2 mb-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="dashboard.php" class="nav-link bg-gradient-primary active"><i class="nav-icon fas fa-tachometer-alt"></i><p>&nbsp;&nbsp; Dashboard</p></a>
          </li>

          <li class="nav-header text-secondary">SCHEDULING</li>
          <li class="nav-item">
            <a href="schedule.php" class="nav-link"><i class="fa-solid fa-calendar-days"></i><p>&nbsp;&nbsp; Schedule</p></a>
          </li>



          <li class="nav-header text-secondary">MANAGEMENT</li>
          <li class="nav-item">
            <a href="instructor.php" class="nav-link"><i class="fa-solid fa-chalkboard-user"></i><p>&nbsp;&nbsp; Instructor</p></a>
          </li>
          <li class="nav-item">
            <a href="course.php" class="nav-link"><i class="fa-solid fa-graduation-cap"></i><p>&nbsp;&nbsp; Course</p></a>
          </li>
          <li class="nav-item">
            <a href="room.php" class="nav-link"><i class="fa-sharp fa-solid fa-person-booth"></i><p>&nbsp;&nbsp; Room</p></a>
          </li>
          <!-- <li class="nav-item">
            <a href="day.php" class="nav-link"><i class="fa-solid fa-calendar-days"></i><p>&nbsp;&nbsp; Day</p></a>
          </li> -->
          <li class="nav-item">
            <a href="semester.php" class="nav-link"><i class="fa-solid fa-calendar-days"></i><p>&nbsp;&nbsp; Semester</p></a>
          </li>
          <li class="nav-item">
            <a href="schoolyear.php" class="nav-link"><i class="fa-solid fa-calendar-days"></i><p>&nbsp;&nbsp; School Year</p></a>
          </li>

          <li class="nav-header text-secondary">OFFICIALS</li>
          <li class="nav-item">
            <a href="official.php" class="nav-link"><i class="fa-solid fa-users-gear"></i><p>&nbsp;&nbsp; Manage Official</p></a>
          </li>

          <li class="nav-header text-secondary">REPORT</li>
          <li class="nav-item">
            <a href="report.php" class="nav-link"><i class="fa-solid fa-file"></i><p>&nbsp;&nbsp; Generate Report</p></a>
          </li>


          <li class="nav-header text-secondary">SYSTEM USERS</li>
          <li class="nav-item">
            <a href="users.php" class="nav-link"><i class="fa-solid fa-user-secret"></i><p>&nbsp;&nbsp; Administrators</p></a>
          </li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <script>
    function logout() {
        swal({
          title: 'Are you sure you want to logout?',
          text: "You won't be able to revert this!",
          icon: "warning",
          buttons: true,
          // dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            window.location = "../logout.php";
          } else {
          }
        });
    }
</script>

<script src="../sweetalert2.min.js"></script>
<!-- SUCCESS -->
<?php if(isset($_SESSION['message'])) { ?>

    <script>
      swal ({
        title: '<?php echo $_SESSION['message']; ?>',
        text: "<?php echo $_SESSION['text']; ?>",
        icon: "<?php echo $_SESSION['status']; ?>",
        confirmButtonColor: '#3085d6',
        confirmButtonText: "Okay",
        timer: 3000
      });

    </script>
<?php unset($_SESSION['message']); unset($_SESSION['text']); unset($_SESSION['status']); } ?>



<?php
// ------------------------------CLOSING THE SESSION OF THE LOGGED IN USER WITH else statement----------//
    } else {
     header('Location: ../login.php');
    }
?>
