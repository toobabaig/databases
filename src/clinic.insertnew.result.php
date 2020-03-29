<?php
include_once 'includes/dbh.inc.php';
	if (isset($_POST['insertNewClinicButton'])){
		
		$generalDentistSelect = $_POST['generalDentistSelect'];	
		$clinicName = $_POST['clinicName'];
		$openingHours = $_POST['openingHours'];
		$webpage = $_POST['webpage'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$phone = $_POST['phone'];
	}
	
	$mysqlInsertNew = " INSERT INTO clinic( generalDentist, clinicName, openingHours, webpage, email, address, phone) VALUES ($generalDentistSelect, '$clinicName', '$openingHours', '$webpage','$email', '$address', '$phone');";
	mysqli_query($conn, $mysqlInsertNew);
	

	
	$sqlReturnCID = "select * from clinic where clinic.clinicName = '$clinicName' ;";
	$resultSqlReturnCID = mysqli_query($conn, $sqlReturnCID);
	$checkReturnCID = mysqli_num_rows($resultSqlReturnCID);
	
	
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
			if ($checkReturnCID==1){
				 echo "clinic  $clinicName successfully added, ID: ";
				
				while ( $row = mysqli_fetch_array($resultSqlReturnCID)){								
					$tempCID =  $row['CID'];																	
					echo "$tempCID" ;																															 
				}
			}else{
				echo "error: clinic not added";
			}				
		?>
		</div>

  
		
	<?php
		include_once 'footer/footer4.php';
	?>
	

</body>
</html>