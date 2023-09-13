<?php 
	include '../config.php';

	// SAVE SYSTEM USER - USERS_ADD.PHP
	if(isset($_POST['create_system_user'])) {
	
		$user_type			 = mysqli_real_escape_string($conn, $_POST['usertype']);
		$firstname       = mysqli_real_escape_string($conn, $_POST['firstname']);
		$middlename      = mysqli_real_escape_string($conn, $_POST['middlename']);
		$lastname        = mysqli_real_escape_string($conn, $_POST['lastname']);
		$suffix          = mysqli_real_escape_string($conn, $_POST['suffix']);
		$contact         = mysqli_real_escape_string($conn, $_POST['contact']);
		$email           = mysqli_real_escape_string($conn, $_POST['email']);
		$password        = mysqli_real_escape_string($conn, md5($_POST['password']));
		$date_registered = date('Y-m-d');

		$check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
		if(mysqli_num_rows($check)>0) {
      $_SESSION['message'] = "Username already exists.";
      $_SESSION['text'] = "Please try again.";
      $_SESSION['status'] = "error";
			header("Location: users.php");
		} else {
				$save = mysqli_query($conn, "INSERT INTO users (firstname, middlename, lastname, suffix, contact, email, password, user_type, date_registered) VALUES ('$firstname', '$middlename', '$lastname', '$suffix', '$contact', '$email', '$password', '$user_type', '$date_registered')");
	      if($save) {
	      	$_SESSION['message'] = "System user has been saved!";
	        $_SESSION['text'] = "Saved successfully!";
	        $_SESSION['status'] = "success";
					header("Location: users.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while saving the information.";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
					header("Location: users.php");
	      }
		}

	}





	// SAVE INSTRUCTOR
	if(isset($_POST['create_instructor'])) {
		$firstname        = mysqli_real_escape_string($conn, $_POST['firstname']);
		$middlename       = mysqli_real_escape_string($conn, $_POST['middlename']);
		$lastname         = mysqli_real_escape_string($conn, $_POST['lastname']);
		$department       = mysqli_real_escape_string($conn, $_POST['department']);
		$bachelorsDegree  = mysqli_real_escape_string($conn, $_POST['bachelorsDegree']);
		$gradStudy        = mysqli_real_escape_string($conn, $_POST['gradStudy']);
		$postGrad         = mysqli_real_escape_string($conn, $_POST['postGrad']);
		$PRC_No           = mysqli_real_escape_string($conn, $_POST['PRC_No']);
		$instructorStatus = mysqli_real_escape_string($conn, $_POST['instructorStatus']);
		$date_registered  = date('Y-m-d');

		$check = mysqli_query($conn, "SELECT * FROM instructor WHERE Firstname='$firstname' AND Middlename='$middlename' AND Lastname='$lastname' AND Department='$department'");
		if(mysqli_num_rows($check)>0) {
      $_SESSION['message'] = "This instructor already exists!";
      $_SESSION['text'] = "Please try again.";
      $_SESSION['status'] = "error";
			header("Location: instructor.php");
		} else {

			$save = mysqli_query($conn, "INSERT INTO instructor (Firstname, Middlename, Lastname, Department, bachelorsDegree, gradStudy, postGrad, PRC_No, instructorStatus, date_registered) VALUES ('$firstname', '$middlename', '$lastname', '$department', '$bachelorsDegree', '$gradStudy', '$postGrad', '$PRC_No', '$instructorStatus', '$date_registered')");

      if($save) {
      	$_SESSION['message'] = "Instructor has been saved!";
        $_SESSION['text'] = "Saved successfully!";
        $_SESSION['status'] = "success";
				header("Location: instructor.php");
      } else {
        $_SESSION['message'] = "Something went wrong while saving the information.";
        $_SESSION['text'] = "Please try again.";
        $_SESSION['status'] = "error";
				header("Location: instructor.php");
      }

		}

	}




	// SAVE OFFICIAL
	if(isset($_POST['create_official'])) {
		$firstname        = mysqli_real_escape_string($conn, $_POST['firstname']);
		$middlename       = mysqli_real_escape_string($conn, $_POST['middlename']);
		$lastname         = mysqli_real_escape_string($conn, $_POST['lastname']);
		$degree           = mysqli_real_escape_string($conn, $_POST['degree']);
		$description      = mysqli_real_escape_string($conn, $_POST['description']);
		$date_registered  = date('Y-m-d');

		$check = mysqli_query($conn, "SELECT * FROM official WHERE firstname='$firstname' AND middlename='$middlename' AND lastname='$lastname' AND degree='$degree' AND description='$description'");
		if(mysqli_num_rows($check)>0) {
      $_SESSION['message'] = "This official already exists!";
      $_SESSION['text'] = "Please try again.";
      $_SESSION['status'] = "error";
			header("Location: official.php");
		} else {

				$check = mysqli_query($conn, "SELECT * FROM official WHERE description='$description'");
				if(mysqli_num_rows($check)>0) {
		      $_SESSION['message'] = "Someone has already owned this description";
		      $_SESSION['text'] = "Please try again.";
		      $_SESSION['status'] = "error";
					header("Location: official.php");
				} else {

					$save = mysqli_query($conn, "INSERT INTO official (firstname, middlename, lastname, degree, description, date_registered) VALUES ('$firstname', '$middlename', '$lastname', '$degree', '$description', '$date_registered')");

		      if($save) {
		      	$_SESSION['message'] = "Official has been saved!";
		        $_SESSION['text'] = "Saved successfully!";
		        $_SESSION['status'] = "success";
						header("Location: official.php");
		      } else {
		        $_SESSION['message'] = "Something went wrong while saving the information.";
		        $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
						header("Location: official.php");
		      }

				}
		}

	}





	// SAVE COURSE
	if(isset($_POST['create_course'])) {
		$coursecode  = mysqli_real_escape_string($conn, $_POST['coursecode']);
		$description = mysqli_real_escape_string($conn, $_POST['description']);
		$hours       = mysqli_real_escape_string($conn, $_POST['hours']);
		$units       = mysqli_real_escape_string($conn, $_POST['units']);

		$check = mysqli_query($conn, "SELECT * FROM course WHERE CourseCode='$coursecode' AND CourseDesc='$description'");
		if(mysqli_num_rows($check)>0) {
      $_SESSION['message'] = "Course already exists!";
      $_SESSION['text'] = "Please try again.";
      $_SESSION['status'] = "error";
			header("Location: course.php");
		} else {
			$save = mysqli_query($conn, "INSERT INTO course (CourseCode, CourseDesc, Hours, Units) VALUES ('$coursecode', '$description', '$hours', '$units')");
      if($save) {
      	$_SESSION['message'] = "Course has been saved!";
        $_SESSION['text'] = "Saved successfully!";
        $_SESSION['status'] = "success";
				header("Location: course.php");
      } else {
        $_SESSION['message'] = "Something went wrong while saving the information.";
        $_SESSION['text'] = "Please try again.";
        $_SESSION['status'] = "error";
				header("Location: course.php");
      }
		}
	}




	// SAVE ROOM
	if(isset($_POST['create_room'])) {
		$roomname = mysqli_real_escape_string($conn, $_POST['roomname']);
		$roomcode = mysqli_real_escape_string($conn, $_POST['roomcode']);
		$capacity = mysqli_real_escape_string($conn, $_POST['capacity']);

		$check = mysqli_query($conn, "SELECT * FROM room WHERE RoomName='$roomname' AND RoomCode='$roomcode'");
		if(mysqli_num_rows($check)>0) {
      $_SESSION['message'] = "Room already exists!";
      $_SESSION['text'] = "Please try again.";
      $_SESSION['status'] = "error";
			header("Location: room.php");
		} else {
			$save = mysqli_query($conn, "INSERT INTO room (RoomName, RoomCode, Capacity) VALUES ('$roomname', '$roomcode', '$capacity')");
      if($save) {
      	$_SESSION['message'] = "Room has been saved!";
        $_SESSION['text'] = "Saved successfully!";
        $_SESSION['status'] = "success";
				header("Location: room.php");
      } else {
        $_SESSION['message'] = "Something went wrong while saving the information.";
        $_SESSION['text'] = "Please try again.";
        $_SESSION['status'] = "error";
				header("Location: room.php");
      }
		}
	}


	// SAVE DAY
	if(isset($_POST['create_day'])) {
		$dayname = mysqli_real_escape_string($conn, $_POST['dayname']);
		$daycode = mysqli_real_escape_string($conn, $_POST['daycode']);

		$check = mysqli_query($conn, "SELECT * FROM day WHERE DayName='$dayname' AND DayCode='$daycode'");
		if(mysqli_num_rows($check)>0) {
      $_SESSION['message'] = "Day already exists!";
      $_SESSION['text'] = "Please try again.";
      $_SESSION['status'] = "error";
			header("Location: day.php");
		} else {
			$save = mysqli_query($conn, "INSERT INTO day (DayName, DayCode) VALUES ('$dayname', '$daycode')");
      if($save) {
      	$_SESSION['message'] = "Day has been saved!";
        $_SESSION['text'] = "Saved successfully!";
        $_SESSION['status'] = "success";
				header("Location: day.php");
      } else {
        $_SESSION['message'] = "Something went wrong while saving the information.";
        $_SESSION['text'] = "Please try again.";
        $_SESSION['status'] = "error";
				header("Location: day.php");
      }
		}
	}



	// SAVE SEMESTER
	if(isset($_POST['create_semester'])) {
		$semestername = mysqli_real_escape_string($conn, $_POST['semestername']);
		$semestercode = mysqli_real_escape_string($conn, $_POST['semestercode']);

		$check = mysqli_query($conn, "SELECT * FROM semester WHERE SemesterName='$semestername' AND SemesterCode='$semestercode'");
		if(mysqli_num_rows($check)>0) {
      $_SESSION['message'] = "Semester already exists!";
      $_SESSION['text'] = "Please try again.";
      $_SESSION['status'] = "error";
			header("Location: semester.php");
		} else {
			$save = mysqli_query($conn, "INSERT INTO semester (SemesterName, SemesterCode) VALUES ('$semestername', '$semestercode')");
      if($save) {
      	$_SESSION['message'] = "Semester has been saved!";
        $_SESSION['text'] = "Saved successfully!";
        $_SESSION['status'] = "success";
				header("Location: semester.php");
      } else {
        $_SESSION['message'] = "Something went wrong while saving the information.";
        $_SESSION['text'] = "Please try again.";
        $_SESSION['status'] = "error";
				header("Location: semester.php");
      }
		}
	}




	// SAVE SCHOOL YEAR
	if(isset($_POST['create_sy'])) {
		$syname = mysqli_real_escape_string($conn, $_POST['syname']);
		$sycode = mysqli_real_escape_string($conn, $_POST['sycode']);

		$check = mysqli_query($conn, "SELECT * FROM schoolyear WHERE SyName='$syname' AND SyCode='$sycode'");
		if(mysqli_num_rows($check)>0) {
      $_SESSION['message'] = "School Year already exists!";
      $_SESSION['text'] = "Please try again.";
      $_SESSION['status'] = "error";
			header("Location: schoolyear.php");
		} else {
			$save = mysqli_query($conn, "INSERT INTO schoolyear (SyName, SyCode) VALUES ('$syname', '$sycode')");
      if($save) {
      	$_SESSION['message'] = "School Year has been saved!";
        $_SESSION['text'] = "Saved successfully!";
        $_SESSION['status'] = "success";
				header("Location: schoolyear.php");
      } else {
        $_SESSION['message'] = "Something went wrong while saving the information.";
        $_SESSION['text'] = "Please try again.";
        $_SESSION['status'] = "error";
				header("Location: schoolyear.php");
      }
		}
	}



	// SAVE SCHEDULE
	if(isset($_POST['create_schedule'])) {
		$instructor = mysqli_real_escape_string($conn, $_POST['instructor']);
		$course     = mysqli_real_escape_string($conn, $_POST['course']);
		$day        = mysqli_real_escape_string($conn, $_POST['day']);
		$timestart  = mysqli_real_escape_string($conn, $_POST['timestart']);
		$timeend    = mysqli_real_escape_string($conn, $_POST['timeend']);
		$room       = mysqli_real_escape_string($conn, $_POST['room']);
		$semester   = mysqli_real_escape_string($conn, $_POST['semester']);
		$schoolyear = mysqli_real_escape_string($conn, $_POST['schoolyear']);
		$department = mysqli_real_escape_string($conn, $_POST['department']);
		$edp        = mysqli_real_escape_string($conn, $_POST['edp']);


		$conflict = mysqli_query($conn, "SELECT * FROM schedule WHERE InstructorID='$instructor' AND CourseID='$course' AND DayID='$day' AND TimeStart='$timestart' AND TimeEnd='$timeend' AND RoomID='$room' AND SemesterID='$semester' AND SchoolYearID='$schoolyear' AND Department='$department' ");

		if(mysqli_num_rows($conflict) > 0) {
				$_SESSION['message'] = "You have already assigned the selected instructor with the same schedule.";
        $_SESSION['text'] = "Please try again.";
        $_SESSION['status'] = "error";
				header("Location: schedule.php");
		} else {

			$conflict2 = mysqli_query($conn, "SELECT * FROM schedule WHERE InstructorID !='$instructor' AND CourseID='$course' AND DayID='$day' AND TimeStart='$timestart' AND TimeEnd='$timeend' AND RoomID='$room' AND SemesterID='$semester' AND SchoolYearID='$schoolyear' AND Department='$department' ");

			if(mysqli_num_rows($conflict2) > 0) {
				$_SESSION['message'] = "This schedule is already assigned with the other instructor.";
        $_SESSION['text'] = "Please try again.";
        $_SESSION['status'] = "error";
				header("Location: schedule.php");
			} else {

				$conflict2 = mysqli_query($conn, "SELECT * FROM schedule WHERE InstructorID !='$instructor' AND CourseID !='$course' AND TimeStart='$timestart' AND TimeEnd='$timeend' AND RoomID='$room' AND SemesterID='$semester' AND SchoolYearID='$schoolyear' ");

				if(mysqli_num_rows($conflict2) > 0) {
					$_SESSION['message'] = "There is a conflict with the schedule happened.";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
					header("Location: schedule.php");
				} else {

				$conflict2 = mysqli_query($conn, "SELECT * FROM schedule WHERE InstructorID='$instructor' AND DayID='$day' AND TimeStart='$timestart' AND TimeEnd='$timeend' AND RoomID='$room' ");
				if(mysqli_num_rows($conflict2) > 0) {
						$_SESSION['message'] = "There is a conflict with the instructors schedule.";
		        $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
						header("Location: schedule.php");
				} else {
						
						if($timestart > $timeend) {
								$_SESSION['message'] = "Time Start should be earlier than the Time End.";
				        $_SESSION['text'] = "Please try again.";
				        $_SESSION['status'] = "error";
								header("Location: schedule.php");
						} elseif($timestart == $timeend) {
								$_SESSION['message'] = "Time Start should should not be equal to Time End.";
				        $_SESSION['text'] = "Please try again.";
				        $_SESSION['status'] = "error";
								header("Location: schedule.php");
						} else {
								$save = mysqli_query($conn, "INSERT INTO schedule (InstructorID, CourseID, DayID, TimeStart, TimeEnd, RoomID, SemesterID, SchoolYearID, Department, EDP) VALUES ('$instructor', '$course', '$day', '$timestart', '$timeend', '$room', '$semester', '$schoolyear', '$department', '$edp')");
					      if($save) {
					      	$_SESSION['message'] = "Schedule has been saved!";
					        $_SESSION['text'] = "Saved successfully!";
					        $_SESSION['status'] = "success";
									header("Location: schedule.php");
					      } else {
					        $_SESSION['message'] = "Something went wrong while saving the information.";
					        $_SESSION['text'] = "Please try again.";
					        $_SESSION['status'] = "error";
									header("Location: schedule.php");
					      }
						}

				}

			}

			}
		}

	}





	// REPORT - REPORT.PHP
	if(isset($_POST['printReport'])) {
		$instructorID = $_POST['instructorID'];

		$fetch = mysqli_query($conn, "SELECT * FROM schedule WHERE InstructorID='$instructorID'");
		if(mysqli_num_rows($fetch) > 0) {
			header("Location: generateReport.php?instructorID=".$instructorID);
		} else {
			$_SESSION['message'] = "Selected teacher do not have any schedule yet.";
      $_SESSION['text'] = "Please try again.";
      $_SESSION['status'] = "error";
			header("Location: report.php");
		}

	}



?>



















