

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
	
	$sqlPatient = "select * from patient;";
	$resultPatient= mysqli_query($conn, $sqlPatient);
	$checkResultPatient = mysqli_num_rows($resultPatient);
	
?>

<br>
<br>
<table align="center" >
	<tr>
	<td>
		<form action="appointment.getinfo.result.php" method="post">
			Get appointment detail 
			<br/>
			on date: <input name= "inputDate1" type = "text" value  ="yyyy-mm-dd"> to <input name= "inputDate2" type = "text" value  ="yyyy-mm-dd"> 
			*(yyyy-mm-dd = any date)
			<br/>
			from clinic:
				<select name="inputClinic">
				 
				  <option value="*" selected="selected">all clinics</option>	
				<?php
					if ($checkResultClinic >0){
							while ( $row = mysqli_fetch_array($resultClinic)){							
								$tempCID =  $row['CID'];
								$tempCName =  $row['clinicName'];								
								echo "<option value='$tempCID'> $tempCID - $tempCName   </option>" ;							
							}												 
						}				
				?>
				</select>
				
				<br/>
			from patient:
				<select name="inputPatient">
				  <option value="*" selected="selected" >all patients</option>	
				<?php
					if ($checkResultPatient >0){
							while ( $row = mysqli_fetch_array($resultPatient)){							
								$tempCID =  $row['PID'];
								$tempCName =  $row['name'];	
								$tempLastName =  $row['lastName'];										
								echo "<option value='$tempCID'> $tempCID - $tempCName $tempLastName  </option>" ;							
							}						 						 
						}
				?>
								
			
				</select>
				<br/>	
				<input type="reset" value="reset">
				<input  name  = "submitButton1" type="submit" value="Search">
		</form> 
		<br>
		<br>
		
		<form action="appointment.getinfo.result.php" method="post">
			get number of missed appointment for patient : 
			<select  name="inputPatient2">
			  <option value="*"  selected="selected">all patients</option>			 			 
				<?php
				$resultPatient= mysqli_query($conn, $sqlPatient);
					if ($checkResultPatient >0){
							while ( $row = mysqli_fetch_array($resultPatient)){
							
								$tempID =  $row['PID'];
								$tempName =  $row['name'];
								$templastName =  $row['lastName'];
								echo "<option value='$tempID'> $tempID - $tempName $templastName  </option>" ;					
							}				 				 
						}
				?>			  			
			</select>
			
			  <input  name = "submitButton2" type="submit" value="Search">
		</form> 
	</td>
	</tr>
</table>
		
		
		
	<?php
		include_once 'footer/footer2.php';
	?>
	

</body>
</html>