

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

	$sqlDentist = "select * from dentist;";
	$resultDentist = mysqli_query($conn, $sqlDentist);
	$checkResultDentist = mysqli_num_rows($resultDentist);
	
	$sqlClinic = "select * from clinic;";
	$resultClinic = mysqli_query($conn, $sqlClinic);
	$checkResultClinic = mysqli_num_rows($resultClinic);
	
?>

<br>
<br>
<div class = "middle">

<form action="clinic.update.result.php" method="post">
	choose clinic to update
		<select name="selectClinic">
		 
		  <option selected="selected" value="choose">-- choose clinic --</option>
				
		<?php
			if ($checkResultClinic >0){
					while ( $row = mysqli_fetch_array($resultClinic)){
					
						$tempCID =  $row['CID'];
						$tempCName =  $row['clinicName'];
						
						echo "<option value='$tempCID'> $tempCID - $tempCName   </option>" ;					
					}				 				 
				}
		?>						
		<input  name="selectClinicButton" type="submit" value="Search">
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