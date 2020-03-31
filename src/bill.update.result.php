<?php
	include_once 'includes/dbh.inc.php';
	$inputBill = $_POST['selectBill'];
	
	$sqlPatient = "select * from patient;";
	$resultPatient = mysqli_query($conn, $sqlPatient);
	$checkResultPatient = mysqli_num_rows($resultPatient);

	$sqlDentist = "select * from dentist;";
	$resultDentist = mysqli_query($conn, $sqlDentist);
	$checkResultDentist = mysqli_num_rows($resultDentist);
	
	$sqlDentalAssistant= "select * from dentalAssistant;";
	$resultDentalAssistant = mysqli_query($conn, $sqlDentalAssistant);
	$checkResultDentalAssistant = mysqli_num_rows($resultDentalAssistant);
	
	$sqlReceptionist = "select * from receptionist;";
	$resultReceptionist = mysqli_query($conn, $sqlReceptionist);
	$checkResultReceptionist = mysqli_num_rows($resultReceptionist);
		
	$sqlClinic = "select * from clinic;";
	$resultClinic = mysqli_query($conn, $sqlClinic);
	$checkResultClinic = mysqli_num_rows($resultClinic);
	
	$sqlAppointment = "select * from appointment;";
	$resultAppointment = mysqli_query($conn, $sqlAppointment);
	$checkResultAppointment = mysqli_num_rows($resultAppointment);
	
	
	$sqlBill = "select * from bill where BID = $inputBill;";
	$resultBill = mysqli_query($conn, $sqlBill);
	$checkResultBill = mysqli_num_rows($resultBill);
	
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
		<form action="bill.update.result2.php" method = "post">
			<table class = 'queryTable'>
				<tr class = 'queryTable'>
					<th class = 'queryTable'>BID</th>
					<th class = 'queryTable'>patientID</th>
					<th class = 'queryTable'>appointmentID</th>
					<th class = 'queryTable'>receptionistID</th>					
					<th class = 'queryTable'>dentistID</th>
					
					<th class = 'queryTable'>clinicID</th>
					<th class = 'queryTable' >treatmentID_____</th>	
					<th class = 'queryTable'>treatmentCharge</th>	
					<th class = 'queryTable'>amountPaid</th>	
					<th class = 'queryTable'>dateOfTreatment</th>							
				</tr>
				
			<?php						
				while ( $row = mysqli_fetch_array($resultBill)){					
					$temp1 =  $row['BID'];
					
					$temp2 =  $row['patientID'];
					$temp3 =  $row['appointmentID'];
					$temp4 =  $row['receptionistID'];
				
					$temp5 =  $row['dentistID'];
					
					$temp6 =  $row['clinicID'];
					
					//$tempA =  $row['treatmentID'];
					//$tempB=  $row['treatmentCharge'];
					$temp7 =  $row['amountPaid'];
					$temp8 =  $row['dateOfTreatment'];					
				
				echo "<tr class = 'queryTable'>";
					echo "<td name='BID' value='$temp1' class = 'queryTable'> $temp1</td>";	
					echo "<input hidden type='text'  name='BID' value = '$temp1' >";		
				}
			?>
					<td value='patientID' class = 'queryTable'>  
						<select name="patientID">					  					  
			<?php												
							if ($checkResultPatient >0){
								
								while ( $row = mysqli_fetch_array($resultPatient)){											
									$tempCID =  $row['PID'];
									$tempCName =  $row['name'];
									$tempCLastName =  $row['lastName'];										
									
									if ($temp2 ==  $tempCID){
										echo "<option value='$tempCID' selected='selected'> $tempCID - $tempCName $tempCLastName</option>";
									}else{
										echo "<option value='$tempCID' > $tempCID - $tempCName $tempCLastName</option>";
									}
								}																								 
							}
				?>						
						</select>			
					</td>
			
					<td value='appointmentID' class = 'queryTable'>  
						<select name="appointmentID">					  					  
			<?php												
							if ($checkResultAppointment >0){
								
								while ( $row = mysqli_fetch_array($resultAppointment)){											
									$tempCID =  $row['AID'];
																
									
									if ($temp3 ==  $tempCID){
										echo "<option value='$temp3' selected='selected'> $tempCID </option>";
									}else{
										echo "<option value='$tempCID' > $tempCID </option>";
									}
								}																								 
							}
				?>						
						</select>			
					</td>
					<td value='receptionistID' class = 'queryTable'>  
						<select name="receptionistID">					  					  
			<?php												
							if ($checkResultReceptionist >0){
								
								while ( $row = mysqli_fetch_array($resultReceptionist)){											
									$tempCID =  $row['EID'];
									$tempCName =  $row['name'];
									$tempCLastName =  $row['lastName'];										
									
									if ($temp4 ==  $tempCID){
										echo "<option value='$temp3' selected='selected'> $tempCID - $tempCName $tempCLastName</option>";
									}else{
										echo "<option value='$tempCID' > $tempCID - $tempCName $tempCLastName</option>";
									}
								}																								 
							}
				?>						
						</select>			
					</td>
					<td value='dentistID' class = 'queryTable'>  
						<select name="dentistID">					  					  
			<?php												
							if ($checkResultDentist>0){
								
								while ( $row = mysqli_fetch_array($resultDentist)){											
									$tempCID =  $row['EID'];
									$tempCName =  $row['name'];
									$tempCLastName =  $row['lastName'];										
									
									if ($temp5 ==  $tempCID){
										echo "<option value='$temp5' selected='selected'> $tempCID - $tempCName $tempCLastName</option>";
									}else{
										echo "<option value='$tempCID' > $tempCID - $tempCName $tempCLastName</option>";
									}
								}																								 
							}
				?>						
						</select>			
					</td>
					<td value='clinicID' class = 'queryTable'>  
						<select name="clinicID">					  					  
			<?php												
							if ($checkResultClinic>0){
								
								while ( $row = mysqli_fetch_array($resultClinic)){											
									$tempCID =  $row['CID'];
									$tempCName =  $row['clinicName'];
																			
									
									if ($temp6 ==  $tempCID){
										echo "<option value='$temp6' selected='selected'> $tempCID - $tempCName </option>";
									}else{
										echo "<option value='$tempCID' > $tempCID - $tempCName </option>";
									}
								}																								 
							}
				?>						
						</select>			
					</td>
					<?php echo " <td value='treatmentID' class = 'queryTable'>  <input type='text' name='treatmentID' value = 'tempA' >  </td>";?>
					<?php echo "<td value='treatmentCharge' class = 'queryTable'>  <input type='text'  name='treatmentCharge' value = 'tempB' >  </td>";?>
					<?php echo "<td value='amountPaid' class = 'queryTable'>  <input type='text'  name='amountPaid' value = '$temp7' >  </td>";?>
					<?php echo "<td value='dateOfTreatment' class = 'queryTable'>  <input type='text'  name='dateOfTreatment' value = '$temp8' >  </td>";?>
					
					
				</tr>
			</table>
			<br>
			<input name = "updateBillButton" type="submit" value="update bill">
			<input name = "cancelButton" type="submit" value="cancel update">
		</form> 
		
		
	<?php
		include_once 'footer/footer4.php';
	?>
	

</body>
</html>