<?php 
	include '../config.php';

	// UPDATE SYSTEM USER - ADMIN_UPDATE_DELETE.PHP
	if(isset($_POST['update_system_user'])) {

		$user_Id    = $_POST['user_Id'];
		$user_type  = mysqli_real_escape_string($conn, $_POST['usertype']);
		$username   = mysqli_real_escape_string($conn, $_POST['username']);
		$firstname  = mysqli_real_escape_string($conn, $_POST['firstname']);
		$middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
		$lastname   = mysqli_real_escape_string($conn, $_POST['lastname']);
		$suffix     = mysqli_real_escape_string($conn, $_POST['suffix']);
		$contact    = mysqli_real_escape_string($conn, $_POST['contact']);
		$email      = mysqli_real_escape_string($conn, $_POST['email']);

		$fetch        = mysqli_query($conn, "SELECT * FROM users WHERE user_Id='$user_Id' ");
		$row          = mysqli_fetch_array($fetch);
		$get_email    = $row['email'];

		if($email == $get_email) {
			$save = mysqli_query($conn, "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', contact='$contact', email='$email', user_type='$user_type' WHERE user_Id='$user_Id'");
		    if($save) {
		      $_SESSION['message'] = "System user has been updated!";
		      $_SESSION['text'] = "Updated successfully!";
		      $_SESSION['status'] = "success";
			  header("Location: users.php");
		    } else {
		      $_SESSION['message'] = "Something went wrong while updating the information.";
		      $_SESSION['text'] = "Please try again.";
		      $_SESSION['status'] = "error";
			  header("Location: users.php");
		    }
	  } else {
			$exist = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' ");
		  	if(mysqli_num_rows($exist) > 0) {
	  			$_SESSION['message'] = "Email already exists.";
		      	$_SESSION['text'] = "Please try again.";
	  			$_SESSION['status'] = "error";
				header("Location: users.php");
		  	} else {
	  			$save = mysqli_query($conn, "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', contact='$contact', email='$email', user_type='$user_type' WHERE user_Id='$user_Id'");
			    if($save) {
			      $_SESSION['message'] = "System user has been updated!";
			      $_SESSION['text'] = "Updated successfully!";
			      $_SESSION['status'] = "success";
				  header("Location: users.php");
			    } else {
			      $_SESSION['message'] = "Something went wrong while updating the information.";
			      $_SESSION['text'] = "Please try again.";
			      $_SESSION['status'] = "error";
				  header("Location: users.php");
			    }
		  	}
	  }
	}






	// CHANGE SYSTEM USER PASSWORD - ADMIN_UPDATE_DELETE.PHP
	if(isset($_POST['password_system_user'])) {

    	$user_Id     = $_POST['user_Id'];
    	$OldPassword = md5($_POST['OldPassword']);
    	$password    = md5($_POST['password']);
    	$cpassword   = md5($_POST['cpassword']);

    	$check_old_password = mysqli_query($conn, "SELECT * FROM users WHERE password='$OldPassword' AND user_Id='$user_Id'");

    	// CHECK IF THERE IS MATCHED PASSWORD IN THE DATABASE COMPARED TO THE ENTERED OLD PASSWORD
    	if(mysqli_num_rows($check_old_password) === 1 ) {
			// COMPARE BOTH NEW AND CONFIRM PASSWORD
    		if($password != $cpassword) {
				$_SESSION['message']  = "Password does not matched. Please try again";
            	$_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: users.php");
    		} else {
    			$update_password = mysqli_query($conn, "UPDATE users SET password='$password' WHERE user_Id='$user_Id' ");
    			if($update_password) {
        			$_SESSION['message'] = "Password has been changed.";
	           	    $_SESSION['text'] = "Updated successfully!";
			        $_SESSION['status'] = "success";
					header("Location: users.php");
                } else {
          			$_SESSION['message'] = "Something went wrong while changing the password.";
            		$_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: users.php");
                }
    		}
    	} else {
			$_SESSION['message']  = "Old password is incorrect.";
            $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: users.php");
    	}

    }





     // UPDATE ADMIN INFORMATION - PROFILE.PHP
	if(isset($_POST['update_profile'])) {

		$user_Id    = $_POST['user_Id'];
		$firstname  = mysqli_real_escape_string($conn, $_POST['firstname']);
		$middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
		$lastname   = mysqli_real_escape_string($conn, $_POST['lastname']);
		$suffix     = mysqli_real_escape_string($conn, $_POST['suffix']);
		$contact    = mysqli_real_escape_string($conn, $_POST['contact']);
		$email      = mysqli_real_escape_string($conn, $_POST['email']);

		$save = mysqli_query($conn, "UPDATE users SET firstname='$firstname', middlename='$middlename', lastname='$lastname', suffix='$suffix', email='$email', contact='$contact' WHERE user_Id='$user_Id'");
	    if($save) {
	          $_SESSION['message']  = "Your information has been updated!";
	          $_SESSION['text'] = "Updated successfully!";
	          $_SESSION['status'] = "success";
			  header("Location: profile.php");                          
	    } else {
            $_SESSION['message'] = "Something went wrong while saving the information.";
            $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: profile.php");
	    }
	}


	// CHANGE ADMIN PASSWORD - PROFILE.PHP
	if(isset($_POST['update_password_admin'])) {

    	$user_Id    = $_POST['user_Id'];
    	$OldPassword = md5($_POST['OldPassword']);
    	$password    = md5($_POST['password']);
    	$cpassword   = md5($_POST['cpassword']);

    	$check_old_password = mysqli_query($conn, "SELECT * FROM users WHERE password='$OldPassword' AND user_Id='$user_Id'");

    	// CHECK IF THERE IS MATCHED PASSWORD IN THE DATABASE COMPARED TO THE ENTERED OLD PASSWORD
    	if(mysqli_num_rows($check_old_password) === 1 ) {
			// COMPARE BOTH NEW AND CONFIRM PASSWORD
    		if($password != $cpassword) {
				$_SESSION['message']  = "Password does not matched. Please try again";
            	$_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: profile.php");
    		} else {
    			$update_password = mysqli_query($conn, "UPDATE users SET password='$password' WHERE user_Id='$user_Id' ");
    			if($update_password) {
                	$_SESSION['message'] = "Password has been changed.";
		            $_SESSION['text'] = "Updated successfully!";
			        $_SESSION['status'] = "success";
					header("Location: profile.php");
                } else {
                    $_SESSION['message'] = "Something went wrong while changing the password.";
		            $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: profile.php");
                }
    		}
    	} else {
			$_SESSION['message']  = "Old password is incorrect.";
            $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: profile.php");
    	}

    }




  	// UPDATE ADMIN PROFILE - PROFILE.PHP
	if(isset($_POST['update_profile_admin'])) {

		$user_Id    = $_POST['user_Id'];
		$file       = basename($_FILES["fileToUpload"]["name"]);

		  // Check if image file is a actual image or fake image
	    $target_dir = "../images-users/";
	    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	    $uploadOk = 1;
	    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	    // Allow certain file formats
	    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
		    $_SESSION['message']  = "Only JPG, JPEG, PNG & GIF files are allowed.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: profile.php");
	    	$uploadOk = 0;
	    }

	    // Check if $uploadOk is set to 0 by an error
	    if ($uploadOk == 0) {
		    $_SESSION['message']  = "Your file was not uploaded.";
		    $_SESSION['text'] = "Please try again.";
		    $_SESSION['status'] = "error";
			header("Location: profile.php");

	    // if everything is ok, try to upload file
	    } else {

	        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	          	$save = mysqli_query($conn, "UPDATE users SET image='$file' WHERE user_Id='$user_Id'");
	     
	            if($save) {
	            	$_SESSION['message'] = "Profile picture has been updated!";
		            $_SESSION['text'] = "Updated successfully!";
			        $_SESSION['status'] = "success";
					header("Location: profile.php");
	            } else {
		            $_SESSION['message'] = "Something went wrong while updating the information.";
		            $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: profile.php");
	            }
	        } else {
	            $_SESSION['message'] = "There was an error uploading your file.";
	            $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: profile.php");
	        }

		}
	}






	// UPDATE INSTRUCTOR
	if(isset($_POST['update_instructor'])) {
		$InstructorID    = mysqli_real_escape_string($conn, $_POST['InstructorID']);
		$firstname       = mysqli_real_escape_string($conn, $_POST['firstname']);
		$middlename      = mysqli_real_escape_string($conn, $_POST['middlename']);
		$lastname        = mysqli_real_escape_string($conn, $_POST['lastname']);
		$department      = mysqli_real_escape_string($conn, $_POST['department']);
		$bachelorsDegree  = mysqli_real_escape_string($conn, $_POST['bachelorsDegree']);
		$gradStudy        = mysqli_real_escape_string($conn, $_POST['gradStudy']);
		$postGrad         = mysqli_real_escape_string($conn, $_POST['postGrad']);
		$PRC_No           = mysqli_real_escape_string($conn, $_POST['PRC_No']);
		$instructorStatus = mysqli_real_escape_string($conn, $_POST['instructorStatus']);

		  $update = mysqli_query($conn, "UPDATE instructor SET Firstname='$firstname', Middlename='$middlename', Lastname='$lastname', Department='$department', bachelorsDegree='$bachelorsDegree', gradStudy='$gradStudy', postGrad='$postGrad', PRC_No='$PRC_No', instructorStatus='$instructorStatus' WHERE InstructorID='$InstructorID'");

	      if($update) {
	      	$_SESSION['message'] = "Instructor has been updated!";
	        $_SESSION['text'] = "Updated successfully!";
	        $_SESSION['status'] = "success";
					header("Location: instructor.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while updating the information.";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
					header("Location: instructor.php");
	      }
	}





	// UPDATE OFFICIAL
	if(isset($_POST['update_official'])) {
		$official_Id = mysqli_real_escape_string($conn, $_POST['official_Id']);
		$firstname   = mysqli_real_escape_string($conn, $_POST['firstname']);
		$middlename  = mysqli_real_escape_string($conn, $_POST['middlename']);
		$lastname    = mysqli_real_escape_string($conn, $_POST['lastname']);
		$degree      = mysqli_real_escape_string($conn, $_POST['degree']);
		$description = mysqli_real_escape_string($conn, $_POST['description']);

		  $update = mysqli_query($conn, "UPDATE official SET firstname='$firstname', middlename='$middlename', lastname='$lastname', degree='$degree', description='$description' WHERE official_Id='$official_Id'");

	      if($update) {
	      	$_SESSION['message'] = "Official record has been updated!";
	        $_SESSION['text'] = "Updated successfully!";
	        $_SESSION['status'] = "success";
			header("Location: official.php");
	      } else {
	        $_SESSION['message'] = "Something went wrong while updating the information.";
	        $_SESSION['text'] = "Please try again.";
	        $_SESSION['status'] = "error";
			header("Location: official.php");
	      }
	}





	// UPDATE COURSE
	if(isset($_POST['update_course'])) {
		$CourseID    = mysqli_real_escape_string($conn, $_POST['CourseID']);
		$coursecode  = mysqli_real_escape_string($conn, $_POST['coursecode']);
		$description = mysqli_real_escape_string($conn, $_POST['description']);
		$hours       = mysqli_real_escape_string($conn, $_POST['hours']);
		$units       = mysqli_real_escape_string($conn, $_POST['units']);

		$check_course = mysqli_query($conn, "SELECT * FROM course WHERE CourseID='$CourseID'");
		$row = mysqli_fetch_array($check_course);
		if($row['CourseCode'] == $coursecode && $row['CourseDesc'] == $description) {
			  $update = mysqli_query($conn, "UPDATE course SET CourseCode='$coursecode', CourseDesc='$description', Hours='$hours', Units='$units' WHERE CourseID='$CourseID'");
		      if($update) {
			      	$_SESSION['message'] = "Course has been updated!";
			        $_SESSION['text'] = "Updated successfully!";
			        $_SESSION['status'] = "success";
					header("Location: course.php");
		      } else {
			        $_SESSION['message'] = "Something went wrong while saving the information.";
			        $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: course.php");
		      }
		} else {
			$check_course = mysqli_query($conn, "SELECT * FROM course WHERE CourseCode='$coursecode' AND CourseDesc='$description'");
			if(mysqli_num_rows($check_course) > 0) {
				$_SESSION['message'] = "Course already exists!";
		        $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: course.php");
			} else {
				$update = mysqli_query($conn, "UPDATE course SET CourseCode='$coursecode', CourseDesc='$description', Hours='$hours', Units='$units' WHERE CourseID='$CourseID'");
		       if($update) {
			      	$_SESSION['message'] = "Course has been updated!";
			        $_SESSION['text'] = "Updated successfully!";
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
	}






	// UPDATE ROOM
	if(isset($_POST['update_room'])) {
		$RoomID   = mysqli_real_escape_string($conn, $_POST['RoomID']);
		$roomname = mysqli_real_escape_string($conn, $_POST['roomname']);
		$roomcode = mysqli_real_escape_string($conn, $_POST['roomcode']);
		$capacity = mysqli_real_escape_string($conn, $_POST['capacity']);

		$check_room = mysqli_query($conn, "SELECT * FROM room WHERE RoomID='$RoomID'");
		$row = mysqli_fetch_array($check_room);
		if($row['RoomName'] == $roomname && $row['RoomCode'] == $roomcode) {
			  $update = mysqli_query($conn, "UPDATE room SET RoomName='$roomname', RoomCode='$roomcode', Capacity='$capacity' WHERE RoomID='$RoomID'");
		      if($update) {
			      	$_SESSION['message'] = "Room has been updated!";
			        $_SESSION['text'] = "Updated successfully!";
			        $_SESSION['status'] = "success";
					header("Location: room.php");
		      } else {
			        $_SESSION['message'] = "Something went wrong while saving the information.";
			        $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: room.php");
		      }
		} else {
			$check_room = mysqli_query($conn, "SELECT * FROM room WHERE RoomName='$roomname' AND RoomCode='$roomcode'");
			if(mysqli_num_rows($check_room) > 0) {
				$_SESSION['message'] = "Room already exists!";
		        $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: room.php");
			} else {
				  $update = mysqli_query($conn, "UPDATE room SET RoomName='$roomname', RoomCode='$roomcode', Capacity='$capacity' WHERE RoomID='$RoomID'");
			      if($update) {
				      	$_SESSION['message'] = "Room has been updated!";
				        $_SESSION['text'] = "Updated successfully!";
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
	}




	// UPDATE DAY
	if(isset($_POST['update_day'])) {
		$DayID   = mysqli_real_escape_string($conn, $_POST['DayID']);
		$dayname = mysqli_real_escape_string($conn, $_POST['dayname']);
		$daycode = mysqli_real_escape_string($conn, $_POST['daycode']);

		$check_day = mysqli_query($conn, "SELECT * FROM day WHERE DayID='$DayID'");
		$row = mysqli_fetch_array($check_day);
		if($row['DayName'] == $dayname && $row['DayCode'] == $daycode) {
			  $update = mysqli_query($conn, "UPDATE day SET DayName='$dayname', DayCode='$daycode' WHERE DayID='$DayID'");
		      if($update) {
			      	$_SESSION['message'] = "Day has been updated!";
			        $_SESSION['text'] = "Updated successfully!";
			        $_SESSION['status'] = "success";
					header("Location: day.php");
		      } else {
			        $_SESSION['message'] = "Something went wrong while saving the information.";
			        $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: day.php");
		      }
		} else {
			$check_room = mysqli_query($conn, "SELECT * FROM day WHERE DayName='$dayname' AND DayCode='$daycode'");
			if(mysqli_num_rows($check_room) > 0) {
				$_SESSION['message'] = "Day already exists!";
		        $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: day.php");
			} else {
				  $update = mysqli_query($conn, "UPDATE day SET DayName='$dayname', DayCode='$daycode' WHERE DayID='$DayID'");
			      if($update) {
				      	$_SESSION['message'] = "Day has been updated!";
				        $_SESSION['text'] = "Updated successfully!";
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
	}




	// UPDATE SEMESTER
	if(isset($_POST['update_semester'])) {
		$SemesterID   = mysqli_real_escape_string($conn, $_POST['SemesterID']);
		$semestername = mysqli_real_escape_string($conn, $_POST['semestername']);
		$semestercode = mysqli_real_escape_string($conn, $_POST['semestercode']);

		$check = mysqli_query($conn, "SELECT * FROM semester WHERE SemesterID='$SemesterID'");
		$row = mysqli_fetch_array($check);
		if($row['SemesterName'] == $semestername && $row['SemesterCode'] == $semestercode) {
			  $update = mysqli_query($conn, "UPDATE semester SET SemesterName='$semestername', SemesterCode='$semestercode' WHERE SemesterID='$SemesterID'");
		      if($update) {
			      	$_SESSION['message'] = "Semester has been updated!";
			        $_SESSION['text'] = "Updated successfully!";
			        $_SESSION['status'] = "success";
					header("Location: semester.php");
		      } else {
			        $_SESSION['message'] = "Something went wrong while saving the information.";
			        $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: semester.php");
		      }
		} else {
			$check = mysqli_query($conn, "SELECT * FROM semester WHERE SemesterName='$semestername' AND SemesterCode='$semestercode'");
			if(mysqli_num_rows($check) > 0) {
				$_SESSION['message'] = "Semester already exists!";
		        $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: semester.php");
			} else {
				  $update = mysqli_query($conn, "UPDATE semester SET SemesterName='$semestername', SemesterCode='$semestercode' WHERE SemesterID='$SemesterID'");
			      if($update) {
				      	$_SESSION['message'] = "Semester has been updated!";
				        $_SESSION['text'] = "Updated successfully!";
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
	}



	// UPDATE SCHOOL YEAR
	if(isset($_POST['update_sy'])) {
		$SyID   = mysqli_real_escape_string($conn, $_POST['SyID']);
		$syname = mysqli_real_escape_string($conn, $_POST['syname']);
		$sycode = mysqli_real_escape_string($conn, $_POST['sycode']);

		$check = mysqli_query($conn, "SELECT * FROM schoolyear WHERE SyID='$SyID'");
		$row = mysqli_fetch_array($check);
		if($row['SyName'] == $syname && $row['SyCode'] == $sycode) {
			  $update = mysqli_query($conn, "UPDATE schoolyear SET SyName='$syname', SyCode='$sycode' WHERE SyID='$SyID' ");
		      if($update) {
			      	$_SESSION['message'] = "School Year has been updated!";
			        $_SESSION['text'] = "Updated successfully!";
			        $_SESSION['status'] = "success";
					header("Location: schoolyear.php");
		      } else {
			        $_SESSION['message'] = "Something went wrong while saving the information.";
			        $_SESSION['text'] = "Please try again.";
			        $_SESSION['status'] = "error";
					header("Location: schoolyear.php");
		      }
		} else {
			$check = mysqli_query($conn, "SELECT * FROM schoolyear WHERE SyName='$syname' AND SyCode='$sycode' ");
			if(mysqli_num_rows($check) > 0) {
				$_SESSION['message'] = "School Year already exists!";
		        $_SESSION['text'] = "Please try again.";
		        $_SESSION['status'] = "error";
				header("Location: schoolyear.php");
			} else {
				  $update = mysqli_query($conn, "UPDATE schoolyear SET SyName='$syname', SyCode='$sycode' WHERE SyID='$SyID' ");
			      if($update) {
				      	$_SESSION['message'] = "School Year has been updated!";
				        $_SESSION['text'] = "Updated successfully!";
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
	}




	// UPDATE SCHEDULE
	if(isset($_POST['update_schedule'])) {
		$SchedID    = mysqli_real_escape_string($conn, $_POST['SchedID']);
		$instructor = mysqli_real_escape_string($conn, $_POST['instructor']);
		$course     = mysqli_real_escape_string($conn, $_POST['course']);
		$day        = mysqli_real_escape_string($conn, $_POST['day']);
		$timestart  = mysqli_real_escape_string($conn, $_POST['timestart']);
		$timeend    = mysqli_real_escape_string($conn, $_POST['timeend']);
		$room       = mysqli_real_escape_string($conn, $_POST['room']);
		$semester   = mysqli_real_escape_string($conn, $_POST['semester']);
		$schoolyear = mysqli_real_escape_string($conn, $_POST['schoolyear']);
		$department = mysqli_real_escape_string($conn, $_POST['department']);

		$exist = mysqli_query($conn, "SELECT * FROM schedule WHERE SchedID='$SchedID'");
		$row = mysqli_fetch_array($exist);
		if($row['InstructorID'] == $instructor) {
			$conflict = mysqli_query($conn, "SELECT * FROM schedule WHERE InstructorID='$instructor' AND DayID='$day' AND TimeStart='$timestart' AND TimeEnd='$timeend' AND RoomID='$room' ");
			if(mysqli_num_rows($conflict) > 0) {
				$_SESSION['message'] = "There is conflict in schedule with this instructor.";
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
				    $update = mysqli_query($conn, "UPDATE schedule SET InstructorID='$instructor', CourseID='$course', DayID='$day', TimeStart='$timestart', TimeEnd='$timeend', RoomID='$room', SemesterID='$semester', SchoolYearID='$schoolyear', Department='$department' WHERE SchedID='$SchedID' ");
			        if($update) {
				      	$_SESSION['message'] = "Class schedule has been updated!";
				        $_SESSION['text'] = "Updated successfully!";
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
		} else {
			$conflict2 = mysqli_query($conn, "SELECT * FROM schedule WHERE InstructorID='$instructor' AND CourseID='$course' AND DayID='$day' AND TimeStart='$timestart' AND TimeEnd='$timeend' AND RoomID='$room' AND SemesterID='$semester' AND SchoolYearID='$schoolyear' AND Department='$department' ");
			if(mysqli_num_rows($conflict2) > 0) {
				$_SESSION['message'] = "There is conflict in schedule with the selected instructor.";
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
				    $update = mysqli_query($conn, "UPDATE schedule SET InstructorID='$instructor', CourseID='$course', DayID='$day', TimeStart='$timestart', TimeEnd='$timeend', RoomID='$room', SemesterID='$semester', SchoolYearID='$schoolyear', Department='$department' WHERE SchedID='$SchedID' ");
			        if($update) {
				      	$_SESSION['message'] = "Class schedule has been updated!";
				        $_SESSION['text'] = "Updated successfully!";
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










?>







