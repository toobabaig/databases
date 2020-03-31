<?php
	include_once 'includes/dbh.inc.php';
	
if (isset($_POST['updateBillButton'])){	
		$temp1 =  $_POST['BID'];					
		$temp2 =  $_POST['patientID'];
		$temp3 =  $_POST['appointmentID'];
		$temp4 =  $_POST['receptionistID'];	
		$temp5 =  $_POST['dentistID'];		
		$temp6 =  $_POST['clinicID'];		
		//$tempA =  $_POST['treatmentID'];
		//$tempB=  $_POST['treatmentCharge'];
		$temp7 =  $_POST['amountPaid'];
		$temp8 =  $_POST['dateOfTreatment'];

$sqlUpdate = "

	update bill
	set  patientID= $temp2, appointmentID= $temp3, receptionistID= $temp4, 
		dentistID= $temp5,clinicID= $temp6, amountPaid= '$temp7',
		dateOfTreatment= '$temp8'
	where BID = $temp1
	;";
	mysqli_query($conn, $sqlUpdate);		
	}
	
	echo $sqlUpdate;
	
		
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
					}else{
						echo "bill not updated";
					}
				?>
			</div>
	<?php
		include_once 'footer/footer4.php';
	?>
	

</body>
</html>