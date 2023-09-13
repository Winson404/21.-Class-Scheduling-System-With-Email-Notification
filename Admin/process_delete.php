<?php 
	include '../config.php';

	// DELETE USER - ADMIN_UPDATE_DELETE.PHP
	if(isset($_POST['delete_system_user'])) {
		$user_Id = $_POST['user_Id'];

		$delete = mysqli_query($conn, "DELETE FROM users WHERE user_Id='$user_Id'");
		if($delete) {
	      	$_SESSION['message'] = "System User has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: users.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: users.php");
	      }
	}


	// DELETE INSTRUCTOR - INSTRUCTOR_UPDATE_DELETE.PHP
	if(isset($_POST['delete_instructor'])) {
		$InstructorID = $_POST['InstructorID'];

		$delete = mysqli_query($conn, "DELETE FROM instructor WHERE InstructorID='$InstructorID'");
		 if($delete) {
	      	$_SESSION['message'] = "Instructor information has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: instructor.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: instructor.php");
	      }
	}


	// DELETE COURSE - COURSE_UPDATE_DELETE.PHP
	if(isset($_POST['delete_course'])) {
		$CourseID = $_POST['CourseID'];

		$delete = mysqli_query($conn, "DELETE FROM course WHERE CourseID='$CourseID'");
		 if($delete) {
	      	$_SESSION['message'] = "Course has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: course.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: course.php");
	      }
	}



	// DELETE ROOM - ROOM_UPDATE_DELETE.PHP
	if(isset($_POST['delete_room'])) {
		$RoomID = $_POST['RoomID'];

		$delete = mysqli_query($conn, "DELETE FROM room WHERE RoomID='$RoomID'");
		 if($delete) {
	      	$_SESSION['message'] = "Room has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: room.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: room.php");
	      }
	}



	// DELETE DAY - DAY_UPDATE_DELETE.PHP
	if(isset($_POST['delete_day'])) {
		$DayID = $_POST['DayID'];

		$delete = mysqli_query($conn, "DELETE FROM day WHERE DayID='$DayID'");
		 if($delete) {
	      	$_SESSION['message'] = "Day has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: day.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: day.php");
	      }
	}



	// DELETE SEMESTER - SEMESTER_UPDATE_DELETE.PHP
	if(isset($_POST['delete_semester'])) {
		$SemesterID = $_POST['SemesterID'];

		$delete = mysqli_query($conn, "DELETE FROM semester WHERE SemesterID='$SemesterID'");
		 if($delete) {
	      	$_SESSION['message'] = "Semester has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: semester.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: semester.php");
	      }
	}



	// DELETE SCHOOLYEAR - SCHOOLYEAR_UPDATE_DELETE.PHP
	if(isset($_POST['delete_sy'])) {
		$SyID = $_POST['SyID'];

		$delete = mysqli_query($conn, "DELETE FROM schoolyear WHERE SyID='$SyID'");
		 if($delete) {
	      	$_SESSION['message'] = "School Year has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: schoolyear.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: schoolyear.php");
	      }
	}


	// DELETE SCHEDULE - SCHEDULE_UPDATE_DELETE.PHP
	if(isset($_POST['delete_schedule'])) {
		$SchedID = $_POST['SchedID'];

		$delete = mysqli_query($conn, "DELETE FROM schedule WHERE SchedID='$SchedID'");
		 if($delete) {
	      	$_SESSION['message'] = "Schedule has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: schedule.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: schedule.php");
	      }
	}




	// DELETE SCHEDULE - SCHEDULE_UPDATE_DELETE.PHP
	if(isset($_POST['delete_official'])) {
		$official_Id = $_POST['official_Id'];

		$delete = mysqli_query($conn, "DELETE FROM official WHERE official_Id='$official_Id'");
		 if($delete) {
	      	$_SESSION['message'] = "Official record has been deleted!";
	        $_SESSION['text'] = "Deleted successfully!";
	        $_SESSION['status'] = "success";
			header("Location: official.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while deleting the record";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: official.php");
	      }
	}

?>






