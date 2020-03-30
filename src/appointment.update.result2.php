<?php
	include_once 'includes/dbh.inc.php';
	
if (isset($_POST['updateAppointmentButton'])){	
		$temp1 =  $_POST['AID'];
		$temp2 =  $_POST['patientID'];
		$temp3 =  $_POST['dentistID'];
		$temp4 =  $_POST['dentalAssistantID'];
		$temp5 =  $_POST['receptionistID'];
		$temp6 =  $_POST['clinicID'];
		$temp7 =  $_POST['dateOfAppointmentScheduled'];
		$temp8 =  $_POST['dateOfAppointmentDone'];
		$temp9 =  $_POST['NUMmissedAppointment'];	

$sqlUpdate = "
	
	update appointment
	set  patientID= $temp2, dentistID= $temp3, dentalAssistantID= $temp4, 
		receptionistID= $temp5,clinicID= $temp6, dateOfAppointmentScheduled= '$temp7',
		dateOfAppointmentDone= '$temp8', NUMmissedAppointment= $temp9
	where AID = $temp1
	
	;";
	mysqli_query($conn, $sqlUpdate);		
	}
	
	
	
		
?>



<!DOCTYPE html>
<html>
<head>
	<?php
		include_once 'head/head.php';
	?>
</head>
<body>

	<?php
		include_once 'header/header1.php';
	?>
		
			<div class = "middle">
				<?php						
					
					
					if (isset($_POST['updateAppointmentButton'])){
						echo "appointment number $temp1 has been successfully updated";
					}else{
						echo "appointment not updated";
					}
				?>
			</div>
	<?php
		include_once 'footer/footer4.php';
	?>
	

</body>
</html>