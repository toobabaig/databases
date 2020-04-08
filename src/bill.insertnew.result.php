<?php
include_once 'includes/dbh.inc.php';
	if (isset($_POST['insertNewAppointmentButton'])){	
		
		
		$temp2 =  $_POST['patientID'];
		$temp3 =  $_POST['appointmentID'];
		$temp4 =  $_POST['receptionistID'];
	
		$temp6 =  $_POST['dentistID'];
		
		$temp8 =  $_POST['clinicID'];
		
		//$temp7 =  $_POST['treatmentID'];
		$tempB =  $_POST['treatmentCharge'];
		$temp10 =  $_POST['amountPaid'];
		$temp11 =  $_POST['dateOfTreatment'];


		 
		
		
	
	$mysqlInsertNew = " 
	INSERT INTO bill 	( patientID, appointmentID, receptionistID,dentistID, clinicID,amountPaid, dateOfTreatment , treatmentCharge)
	VALUES 				($temp2 ,	$temp3,			$temp4,					$temp6,	 $temp8, 	'$temp10', '$temp11', '$tempB')

	;";

	
	mysqli_query($conn, $mysqlInsertNew);
		
	$sqlAppointment = "select * from bill where BID = (SELECT MAX(BID)FROM bill);";
	$resultAppointment = mysqli_query($conn, $sqlAppointment);
	$checkReturnAppointment = mysqli_num_rows($resultAppointment);
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
			if ($checkReturnAppointment==1){
				
				while ( $row = mysqli_fetch_array($resultAppointment)){								
					$BID =  $row['BID'];				
				}												
				 echo "bill successfully added, ID:  $BID";
				 
				 
				 
				 
				 if(!empty($_POST['TID'])){
			
					foreach($_POST['TID'] as $treatmentID){
						
						$sqlTreamentList = "
						UPDATE treatmentList
						SET bill_ID = $BID
						WHERE appointmentID =$temp3 and treatmentID =  $treatmentID
						;";
													
						
						$resultTreamentList = mysqli_query($conn, $sqlTreamentList);
						
							}
						}
					
				
				
				
			}else{
				echo "error: bill not added";
			}				
		?>
		</div>

  
		
	<?php
		include_once 'footer/footer4.php';
	?>
	

</body>
</html>