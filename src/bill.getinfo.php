

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

	$sqlPatient = "select * from patient;";
	$resultPatient = mysqli_query($conn, $sqlPatient);
	$checkResultPatient = mysqli_num_rows($resultPatient);;
	
?>

<br>
<br>
<div class = "middle">

<form action="bill.getinfo.result.php" method="post">
	Get bill of patient
		<select name="selectPatient1">
		
		  <option value="*" selected="selected" >all patient</option>
				
		<?php
			if ($checkResultPatient >0){
					while ( $row = mysqli_fetch_array($resultPatient)){
					
						$tempCID =  $row['PID'];
						$tempCName =  $row['name'];
						$tempCLName =  $row['lastName'];
						
						echo "<option value='$tempCID'> $tempCID - $tempCName $tempCLName   </option>" ;					
					}				 				 
				}
		?>						
		<input  name="selectPatientButton1" type="submit" value="Search">
		</select>
</form> 
<br>
<br>


</div>

<div class = "middle">

<form action="bill.getinfo.result.php" method="post">
	get detail of unpaid bills by patient:
		<select name="selectPatient2">
		  
		  <option value="*">all patient</option>
				
		<?php
		$resultPatient = mysqli_query($conn, $sqlPatient);
			if ($checkResultPatient >0){
					while ( $row = mysqli_fetch_array($resultPatient)){
					
						$tempCID =  $row['PID'];
						$tempCName =  $row['name'];
						$tempCLName =  $row['lastName'];
						
						echo "<option value='$tempCID'> $tempCID - $tempCName $tempCLName   </option>" ;					
					}				 				 
				}
		?>						
		<input  name="selectPatientButton2" type="submit" value="Search">
		</select>
</form> 
<br>
<br>


</div>
		
	<?php
		include_once 'footer/footer2.php';
	?>
	

</body>
</html>