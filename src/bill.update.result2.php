<?php
	include_once 'includes/dbh.inc.php';
	
if (isset($_POST['updateBillButton'])){	
		$temp1 =  $_POST['BID'];					
		$temp2 =  $_POST['patientID'];
		$temp3 =  $_POST['appointmentID'];
		$temp4 =  $_POST['receptionistID'];	
		$temp5 =  $_POST['dentistID'];		
		$temp6 =  $_POST['clinicID'];
	if(!empty($_POST['TID'])){		
		$tempA =  $_POST['TID'];
	}
		$tempB=  $_POST['treatmentCharge'];
		$temp7 =  $_POST['amountPaid'];
		$temp8 =  $_POST['dateOfTreatment'];

$sqlUpdate = "

	update bill
	set  patientID= $temp2, appointmentID= $temp3, receptionistID= $temp4, 
		dentistID= $temp5,clinicID= $temp6, amountPaid= '$temp7',
		dateOfTreatment= '$temp8', dateOfTreatment= '$temp8' ,treatmentCharge = '$tempB'
	where BID = $temp1
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
					
					
					if (isset($_POST['updateBillButton'])){
						echo "bill id: $temp1 has been successfully updated";
	
						$sqlDeleteTupples = " delete from treatmentList where bill_ID = $temp1;";
						$resultDeleteTupples = mysqli_query($conn, $sqlDeleteTupples);
						
						if(!empty($_POST['TID'])){	
							foreach($_POST['TID'] as $treatmentID){					

								$sqlTreamentList = "insert into treatmentList values ($temp3,$treatmentID,$temp1);";
								
								$resultTreamentList = mysqli_query($conn, $sqlTreamentList);
								
									}
						}
				
					}else{
						echo "bill not updated";
					}
				?>
			</div>
	<?php
		include_once 'footer/footer5.php';
	?>
	

</body>
</html>