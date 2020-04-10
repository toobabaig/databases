<?php
include_once 'includes/dbh.inc.php';
	if (isset($_POST['insertNewAppointmentButton'])){	
		
		$temp2 =  $_POST['patientID'];
		$temp3 =  $_POST['dentistID'];
		$temp4 =  $_POST['dentalAssistantID'];
		$temp5 =  $_POST['receptionistID'];
		$temp6 =  $_POST['clinicID'];
		$temp7 =  $_POST['dateOfAppointmentScheduled'];
		$temp8 =  $_POST['dateOfAppointmentDone'];
		$temp9 =  $_POST['NUMmissedAppointment'];		
	}
	
	if (strcmp($temp8,"yyyy-mm-dd") || strcmp($temp8,"null") || strcmp($temp8,"none")  ){
		$temp8= 'null';
	}
	
	$mysqlInsertNew = " 
	INSERT INTO appointment( patientID, dentistID, dentalAssistantID,  receptionistID,clinicID, dateOfAppointmentScheduled,dateOfAppointmentDone, NUMmissedAppointment)
	VALUES ($temp2 ,$temp3,$temp4,$temp5,$temp6, '$temp7', $temp8, $temp9)

	;";
	
	mysqli_query($conn, $mysqlInsertNew);
		
	$sqlAppointment = "select * from appointment where AID = (SELECT MAX(AID)FROM appointment);";
	$resultAppointment = mysqli_query($conn, $sqlAppointment);
	$checkReturnAppointment = mysqli_num_rows($resultAppointment);
	
	
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
			if ($checkReturnAppointment==1){
				
				while ( $row = mysqli_fetch_array($resultAppointment)){								
					$tempAID =  $row['AID'];																																																				 
				}
				
				 echo "appointment successfully added, ID:  $tempAID";
				  if(!empty($_POST['TID'])){
			
					foreach($_POST['TID'] as $treatmentID){					
						$sqlTreamentList = "insert into treatmentList values ($tempAID,$treatmentID,null);";
						
						$resultTreamentList = mysqli_query($conn, $sqlTreamentList);
						
							}
						}
				
				
			}else{
				echo "error: appointment not added";
			}				
		?>
		</div>

  
		
	<?php
		include_once 'footer/footer4.php';
	?>
	

</body>
</html>