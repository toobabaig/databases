<?php
	include_once 'includes/dbh.inc.php';
	

	$valueCID = $_POST['CID'];		
	$valueGeneralDentist = $_POST['generalDentistSelect'];
	$valueClinicName = $_POST['clinicName'];
	$valueOpeningHours = $_POST['openingHours'];
	$valueWebpage = $_POST['webpage'];
	$valueLastEmail = $_POST['email'];
	$valueAddress = $_POST['address'];
	$valuePhone = $_POST['phone'];
	
	
	$sqlUpdate = "
	update clinic
	set generalDentist = $valueGeneralDentist, clinicName = '$valueClinicName',  
		openingHours = '$valueOpeningHours ', webpage= '$valueWebpage', email = '$valueLastEmail',
		address = '$valueLastEmail', phone = '$valuePhone'
	where  clinic.CID = $valueCID;";
	mysqli_query($conn, $sqlUpdate);
		
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
					
					
					if (isset($_POST['updateClinic'])){
						echo "clinic $valueClinicName has been successfully updated";
					}else{
						echo "update canceled";
					}
				?>
			</div>
	<?php
		include_once 'footer/footer4.php';
	?>
	

</body>
</html>