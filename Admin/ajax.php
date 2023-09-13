<?php 
	
	include '../config.php';

	// DISPLAY SCHEDULE BY SPECIFIC INSTRUCTOR - REPORT.PHP
	if(isset($_POST['request'])) {
		$instructorID = $_POST['request'];
		$sql = mysqli_query($conn, "SELECT * FROM schedule JOIN instructor ON schedule.InstructorID=instructor.instructorID JOIN course ON schedule.CourseID=course.CourseID JOIN day ON schedule.DayID=day.DayID JOIN room ON schedule.RoomID=room.RoomID JOIN semester ON schedule.SemesterID=semester.SemesterID JOIN schoolyear ON schedule.SchoolYearID=schoolyear.SyID WHERE schedule.InstructorID='$instructorID'");
		if(mysqli_num_rows($sql) > 0) {
?>
		  <tr>
        <?php while ($row = mysqli_fetch_array($sql)) { ?>
          <td><?php echo $row['CourseCode']; ?></td>
          <td><?php echo ''.$row['DayName'].' = '.$row['TimeStart'].'-'.$row['TimeEnd'].''; ?></td>
          <td><?php echo ' '.$row['RoomName'].' - '.$row['RoomCode'].' '; ?></td>
          <td><?php echo ' '.$row['SemesterName'].' - '.$row['SemesterCode'].' '; ?></td>
          <td><?php echo ' '.$row['SyName'].' - '.$row['SyCode'].' '; ?></td>
          <td><?php echo $row['Department']; ?></td>
      </tr>

<?php } } else { ?>	
    <tr>
		<td colspan="100%" class="text-center">No record found</td>
    <tr/>
    
<?php } } ?>