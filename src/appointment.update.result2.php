<?php
	include_once 'includes/dbh.inc.php';
	
if (isset($_POST['updateAppointmentButton'])){	
		$temp1 =  $_POST['AID'];
		$temp2 =  $_POST['patientID'];
		$temp3 =  $_POST['dentistID'];
		$temp4 =  $_POST['dentalAssistantID'];
		$temp5 =  $_POST['receptionistID'];
		$temp6 =  $_POST['clinicID'];
		if(!empty($_POST['TID'])){		
			$tempA =  $_POST['TID'];
		}
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
										
						$sqlCurrentBill = "select * from treatmentList  where appointmentID  = $temp1;";
						$resultCurrentBill = mysqli_query($conn, $sqlCurrentBill);
						$checkResultCurrentBill = mysqli_num_rows($resultCurrentBill);
						
						if ($checkResultCurrentBill >0){
							$row = mysqli_fetch_array($resultCurrentBill);							
							$currentBill =  $row['bill_ID'];
							
							if (strcmp($currentBill,'')==0 || is_null($currentBill)==0 ){
								$currentBill = 'null';								
							}							
						}else {
							$currentBill = 'null';						
						}					
																	
						$sqlDeleteTupples = " delete from treatmentList where  appointmentID = $temp1;";
						$resultDeleteTupples = mysqli_query($conn, $sqlDeleteTupples);
						
						if(!empty($_POST['TID'])){	
							foreach($_POST['TID'] as $treatmentID){					

								$sqlTreamentList = "insert into treatmentList values ($temp1,$treatmentID,$currentBill);";
								
								$resultTreamentList = mysqli_query($conn, $sqlTreamentList);
								
									}
						}
						
						
						
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