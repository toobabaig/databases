

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

	$sqlAppointment = "select * from appointment ;";
	$resultAppointment = mysqli_query($conn, $sqlAppointment);
	$checkResultAppointment = mysqli_num_rows($resultAppointment);
	
?>

<br>
<br>
<div class = "middle">

<form action="appointment.delete.result.php" method="post">
	choose appointment to delete
		<select name="selectAppointment">
		  <option value="choose" selected="selected" >-- choose Appointment --</option>
		 
				
		<?php
			if ($checkResultAppointment >0){
					while ( $row = mysqli_fetch_array($resultAppointment)){
					
						$tempCID =  $row['AID'];
						
						
						echo "<option value='$tempCID'> $tempCID    </option>" ;					
					}				 				 
				}
		?>						
		<input  name="selectAppointmentButton" type="submit" value="Search">
		</select>
</form> 
<br>
<br>


</div>
		
	<?php
		include_once 'footer/footer6.php';
	?>
	

</body>
</html>