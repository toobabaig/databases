

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
	include_once 'includes/dbh.inc.php';

	$sqlAppointment = "select * from appointment;";
	$resultAppointment = mysqli_query($conn, $sqlAppointment);
	$checkResultAppointment = mysqli_num_rows($resultAppointment);

?>

<br>
<br>
<div class = "middle">

<form action="appointment.update.result.php" method="post">
	choose appointment to update
		<select name="selectAppoitment">
		 
		 
				
		<?php
			if ($checkResultAppointment >0){
					while ( $row = mysqli_fetch_array($resultAppointment)){
					
						$tempCID =  $row['AID'];
						$tempCName =  $row['patientID'];
						
						echo "<option value='$tempCID'> id:  $tempCID    </option>" ;					
					}				 				 
				}
		?>						
		<input  name="selectAppoitmentButton" type="submit" value="Search">
		</select>
</form> 
<br>
<br>


</div>
		
	<?php
		include_once 'footer/footer5.php';
	?>
	

</body>
</html>