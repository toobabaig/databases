<?php
include_once 'includes/dbh.inc.php';
	
	$clinicSelect = $_POST['clinicSelect'];
	$SIN = $_POST['SIN'];
	$gender = $_POST['genderSelect'];
	$address = $_POST['address'];
	$name = $_POST['name'];
	$lastName = $_POST['lastName'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$availability = $_POST['availabilitySelect'];

	
	
	$mysql = " INSERT INTO dentist( clinicID, SIN, gender, address, name, lastName, phone, email, ptftv) VALUES ($clinicSelect, $SIN, '$gender', '$address', '$name', '$lastName', '$phone', '$email', '$availability');";
	$resultClinic = mysqli_query($conn, $mysql);
	
	$sqlReturn = "select * from dentist where dentist.SIN = $SIN ;";
	$resultNewDentist = mysqli_query($conn, $sqlReturn);
	$checkResultClinic = mysqli_num_rows($resultNewDentist);
	
	
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
		
	
		
	<?php
	
	
		if ($checkResultClinic==1){
			 echo "dentist  $name $lastName successfully added, ID: ";
			
			while ( $row = mysqli_fetch_array($resultNewDentist)){								
				$tempEID =  $row['EID'];																	
				echo "$tempEID" ;																															 
			}
		}else{
			echo "error: dentist not added";
		}	
		
	
		?>
		

  
		
	<?php
		include_once 'footer/footer4.php';
	?>
	

</body>
</html>