<?php
	include_once 'includes/dbh.inc.php';
	

	$valueEID = $_POST['EID'];		
	$valueClinicID = $_POST['clinicSelect'];
	$valueSIN = $_POST['SIN'];
	$valueGender = $_POST['genderSelect'];
	$valueAddress = $_POST['address'];
	$valueName = $_POST['name'];
	$valueLastName = $_POST['lastName'];
	$valuePhone = $_POST['phone'];
	$valueEmail = $_POST['email'];
	$valuePtftv = $_POST['availabilitySelect'];
	
	$sqlUpdate = 
	"UPDATE dentist 
	SET clinicID='$valueClinicID', SIN =$valueSIN, gender= '$valueGender', address = '$valueAddress', name= '$valueName',
		lastName= '$valueLastName', phone = '$valuePhone', email ='$valueEmail', ptftv = '$valuePtftv'
	WHERE dentist.EID = $valueEID ;" ;
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
					
					
					if (isset($_POST['updateDentist'])){
						echo "dentist $valueName has been successfully updated";
					}else{
						echo "update canceled";
					}
				?>
			</div>
	<?php
		include_once 'footer/footer5.php';
	?>
	

</body>
</html>