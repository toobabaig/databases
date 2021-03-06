<?php
	include_once 'includes/dbh.inc.php';

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
	
	$sqlTreatment = "select * from treatment;";
	$resultTreatment = mysqli_query($conn, $sqlTreatment);
	$checkResultTreatment = mysqli_num_rows($resultTreatment);
	
	if ($checkResultAppointment >0){
		while ( $row = mysqli_fetch_array($resultAppointment)){								
			$temp1 =  $row['AID'];
			$temp2 =  $row['patientID'];
			$temp3 =  $row['dentistID'];
			$temp4 =  $row['dentalAssistantID'];
			$temp5 =  $row['receptionistID'];
			$temp6 =  $row['clinicID'];
			$temp7 =  $row['dateOfAppointmentScheduled'];
			$temp8 =  $row['dateOfAppointmentDone'];
			$temp9 =  $row['NUMmissedAppointment'];																	}														 
	}
	
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
		<form action="appointment.insertnew.result.php" method = "post">
			<table class = 'queryTable'>
				<tr class = 'queryTable'>
					<th class = 'queryTable'>AID</th>
					<th class = 'queryTable'>patientID</th>
					<th class = 'queryTable'>dentistID</th>
					<th class = 'queryTable'>dentalAssistantID</th>
					<th class = 'queryTable'>receptionistID</th>
					<th class = 'queryTable'>clinicID</th>
						<th class = 'queryTable'>treatmentID______________</th>
					<th class = 'queryTable'>dateOfAppointmentScheduled</th>
					<th class = 'queryTable'>dateOfAppointmentDone</th>
					<th class = 'queryTable'>NUMmissedAppointment</th>						
				</tr>
					<tr class = 'queryTable'>
					<td value='AID' class = 'queryTable'>auto generated</td>
					<td value='patientID' class = 'queryTable'>  
						<select name="patientID">						  					  
							<?php
							if ($checkResultPatient >0){
									while ( $row = mysqli_fetch_array($resultPatient)){								
										$tempPID =  $row['PID'];
										$tempPName =  $row['name'];
										$tempPLName =  $row['lastName'];																	
										echo "<option value='$tempPID'> $tempPID - $tempPName $tempPLName  </option>" ;																									
									}
							}
							?>												 
						</select>
				
					</td>
					<td value='dentistID' class = 'queryTable'>  
						<select name="dentistID">						  					  
							<?php
							if ($checkResultDentist >0){
								echo "<option value='none'> none </option>" ;		
									while ( $row = mysqli_fetch_array($resultDentist)){								
										$tempEID =  $row['EID'];
										$tempPName =  $row['name'];
										$tempPLName =  $row['lastName'];
																		
										echo "<option value='$tempEID'> $tempEID - $tempPName $tempPLName  </option>" ;																									
									}
							}
							?>												 
						</select>				
					</td>
					<td value='dentalAssistantID' class = 'queryTable'>  
						<select name="dentalAssistantID">						  					  
							<?php
							if ($checkResultDentalAssistant >0){
								echo "<option value='none'> none </option>" ;		
									while ( $row = mysqli_fetch_array($resultDentalAssistant)){								
										$tempEID =  $row['EID'];
										$tempPName =  $row['name'];
										$tempPLName =  $row['lastName'];
																		
										echo "<option value='$tempEID'> $tempEID - $tempPName $tempPLName  </option>" ;																									
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
										$tempEID =  $row['EID'];
										$tempPName =  $row['name'];
										$tempPLName =  $row['lastName'];
																		
										echo "<option value='$tempEID'> $tempEID - $tempPName $tempPLName  </option>" ;																									
									}
							}
							?>												 
						</select>				
					</td>
					<td value='clinicID' class = 'queryTable'>  
						<select name="clinicID">						  					  
							<?php
							if ($checkResultClinic >0){
										
									while ( $row = mysqli_fetch_array($resultClinic)){								
										$tempEID =  $row['CID'];
										$tempPName =  $row['clinicName'];
										
																		
										echo "<option value='$tempEID'> $tempEID - $tempPName   </option>" ;																									
									}
							}
							?>												 
						</select>				
					</td>
					<td value='treamentListID' class = 'queryTable' >  
							<?php
							if ($checkResultTreatment >0){
								
									while ( $row = mysqli_fetch_array($resultTreatment)){								
										$TID =  $row['TID'];
										$name =  $row['name'];
										$cost =  $row['cost'];
																		
										echo "<input type='checkbox' id='$TID' name='TID[]' value='$TID' >$TID - $name $cost $</input> <br/>";																								
									}
							}
							
							?>	
					</td>	
					<?php
					$date =  date("Y/m/d") ;
					echo "<td value='dateOfAppointmentScheduled' class = 'queryTable'>  <input type='text' name='dateOfAppointmentScheduled' value ='$date' >  </td>";								
					?>
					<td value='dateOfAppointmentDone' class = 'queryTable'>  <input type='text'  name='dateOfAppointmentDone' value = 'yyyy-mm-dd' >  </td>					
					<td value='NUMmissedAppointment' class = 'queryTable'>  <input type="text" name="NUMmissedAppointment"  value = "0"> </td>
				

					

					</td>
				</tr>
			</table>
			<br>
			<input type="reset" value="reset">
			<input name = "insertNewAppointmentButton" type="submit" value="add new appointment">
		
		</form> 

	<?php
		include_once 'footer/footer4.php';
	?>
	

</body>
</html>