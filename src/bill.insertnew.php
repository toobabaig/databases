<?php
	include_once 'includes/dbh.inc.php';

	$inputAppointment = $_POST['selectAppointment'];

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
	
	$sqlAppointment = "select * from appointment where AID = $inputAppointment;";
	$resultAppointment = mysqli_query($conn, $sqlAppointment);
	$checkResultAppointment = mysqli_num_rows($resultAppointment);
	
	$sqlAppointment2 = "select * from appointment";
	$resultAppointment2 = mysqli_query($conn, $sqlAppointment2);
	$checkResultAppointment2 = mysqli_num_rows($resultAppointment2);
	
	$sqlTreatment = "select * from treatment;";
	$resultTreatment = mysqli_query($conn, $sqlTreatment);
	$checkResultTreatment = mysqli_num_rows($resultTreatment);

	$sqlBill = "select * from bill ;";
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
		<form action="bill.insertnew.result.php" method = "post">
			<table class = 'queryTable'>
				<tr class = 'queryTable' >
					<th class = 'queryTable'>BID</th>
					<th class = 'queryTable'>patientID</th>
					<th class = 'queryTable'>appointmentID</th>
					<th class = 'queryTable'>receptionistID</th>					
					<th class = 'queryTable'>dentistID</th>
					
					<th class = 'queryTable'>clinicID</th>
					<th class = 'queryTable' >treatmentID_to_charge___</th>	
					<th class = 'queryTable'>treatmentCharge</th>	
					<th class = 'queryTable'>amountPaid</th>	
					<th class = 'queryTable'>dateOfTreatment</th>	
											
				</tr>
				
				<?php						
				while ( $row = mysqli_fetch_array($resultAppointment)){					
					$temp1 =  $row['AID'];
					$temp2 =  $row['patientID'];
					$temp3 =  $row['dentistID'];
					$temp4 =  $row['dentalAssistantID'];
					$temp5 =  $row['receptionistID'];
					$temp6 =  $row['clinicID'];
					$temp7 =  $row['dateOfAppointmentScheduled'];
					$temp8 =  $row['dateOfAppointmentDone'];
					$temp9 =  $row['NUMmissedAppointment'];				
													
					if (is_Null($temp8)){
						$temp8 = "appointment not done";
					};					
				
					
				}
			?>
					<tr class = 'queryTable'>
					<td value='BID' class = 'queryTable'>auto generated</td>
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
					<?php 
						echo "<td  name = 'appointmentID' value='appointmentID' class = 'queryTable'>  $inputAppointment </td> ";
						echo "<input hidden type ='text' name = 'appointmentID' value = '$temp1'> ";
					?>
					<td value='receptionistID' class = 'queryTable'>  
						<select name="receptionistID">						  					  
							<?php												
							if ($checkResultReceptionist >0){
								
								while ( $row = mysqli_fetch_array($resultReceptionist)){											
									$tempCID =  $row['EID'];
									$tempCName =  $row['name'];
									$tempCLastName =  $row['lastName'];										
									
									if ($temp5 ==  $tempCID){
										echo "<option value='$tempCID' selected='selected'> $tempCID - $tempCName $tempCLastName</option>";
									}else{
										echo "<option value='$tempCID' > $tempCID - $tempCName $tempCLastName</option>";
									}
								}																								 
							}
						?>													 
						</select>
						
					</td>
					<td value='dentistID	' class = 'queryTable'>  
						<select name="dentistID">						  					  
							<?php												
							if ($checkResultDentist >0){
								
								while ( $row = mysqli_fetch_array($resultDentist)){											
									$tempCID =  $row['EID'];
									$tempCName =  $row['name'];
									$tempCLastName =  $row['lastName'];										
									
									if ($temp3 ==  $tempCID){
										echo "<option value='$tempCID' selected='selected'> $tempCID - $tempCName $tempCLastName</option>";
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
							if ($checkResultClinic >0){
								
								while ( $row = mysqli_fetch_array($resultClinic)){											
									$tempCID =  $row['CID'];
									$tempCName =  $row['clinicName'];							
									
									if ($temp6 ==  $tempCID){
										echo "<option value='$tempCID' selected='selected'> $tempCID - $tempCName</option>";
									}else{
										echo "<option value='$tempCID' > $tempCID - $tempCName</option>";
									}
								}																								 
							}
						?>													 
						</select>
											
					</td>
					<td value='treamentListID' class = 'queryTable' >  
							<?php
						
						$sqlTreatmentList = " select  * from  treatmentList where appointmentID = $temp1;";
						$resultTreatmentList = mysqli_query($conn, $sqlTreatmentList);
						$checkResultTreatmentList = mysqli_num_rows($resultTreatmentList);
						
					
							if ($checkResultTreatment >0){
								
									while ( $row = mysqli_fetch_array($resultTreatment)){								
										$TID =  $row['TID'];
										$name =  $row['name'];
										$cost =  $row['cost'];
										$inputed = "false";
										$resultTreatmentList = mysqli_query($conn, $sqlTreatmentList);
										
										while ( $row = mysqli_fetch_array($resultTreatmentList)){										
											$AIDlist =  $row['appointmentID'];
											$TIDL =  $row['treatmentID'];
											
											
											if ( strcmp($TID,$TIDL)==0) {
												$inputed = "true";
												echo "<input checked type='checkbox' id='$TID' name='TID[]' value='$TID' >$TID - $name $cost $</input> <br/>";																								
											
											}

										}
										if (false ){
												echo "<input type='checkbox' id='$TID' name='TID[]' value='$TID' >$TID - $name $cost $</input> <br/>";																								
										}
										
									}
							}
							
							?>		
					</td>
					
					<td value='treatmentCharge' class = 'queryTable'>  <input type="text" name="treatmentCharge" value ="0000.00" >  </td>
					<td value='amountPaid' class = 'queryTable'>  <input type="text"  name="amountPaid" value = "0000.00" >  </td>
					<?php 
					if (is_Null($temp8)){
						$temp8= 'appointment not yet done';
					}
					echo "<td  name = 'dateOfTreatment' value='dateOfTreatment' class = 'queryTable'>  $temp8 </td> ";
						echo "<input hidden type ='text' name = 'dateOfTreatment' value = '$temp8'> ";
					?>
				

					

					</td>
				</tr>
			</table>
			<br>
			<input type="reset" value="reset">
			<input name = "insertNewAppointmentButton" type="submit" value="add new bill">
		
		</form> 

	<?php
		include_once 'footer/footer4.php';
	?>
	

</body>
</html>