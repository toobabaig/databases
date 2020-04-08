<?php
include_once 'includes/dbh.inc.php';
	
	if (isset($_POST['submitButton1'])){
		
		$inputDate1 = $_POST['inputDate1'];

		$inputDate2 = $_POST['inputDate2'];
	
		$inputClinic = $_POST['inputClinic'];

		$inputPatient = $_POST['inputPatient'];
	
		$sqlQuery = "select * from appointment ";
	
		
	//this part is where i combine the search values VVV
		$varDateInputed = "false";
		$varClinicInputed ="false";
		if(strcmp($inputDate1,'yyyy-mm-dd') != 0 || strcmp($inputDate2,'yyyy-mm-dd') != 0){
			
			$varDateInputed = "true";
			if (strcmp($inputDate1,'yyyy-mm-dd') != 0){
				$sqlQuery = "select * from appointment where dateOfAppointmentScheduled >= '$inputDate1' ";			
				if (strcmp($inputDate2,'yyyy-mm-dd') != 0){
				$sqlQuery = "select * from appointment where dateOfAppointmentScheduled BETWEEN '$inputDate1' AND '$inputDate2' ";
				}			
			}else if (strcmp($inputDate2,'yyyy-mm-dd') != 0){
			$sqlQuery = "select * from appointment  where dateOfAppointmentScheduled <= '$inputDate2' ";
			}
		}
	
		if (strcmp($inputClinic,'*') != 0){
			$varClinicInputed = "true";
			if (strcmp($varDateInputed,'true') == 0){
				$sqlQuery = $sqlQuery ." AND clinicID = $inputClinic ";
			}else{
				$sqlQuery = $sqlQuery ." where clinicID = $inputClinic ";
			}			
		}
	
		
		if(strcmp($inputPatient,'*') != 0){
			if (strcmp($varDateInputed,'true') == 0 || strcmp($varClinicInputed,'true') == 0){
				$sqlQuery = $sqlQuery. " and patientID = $inputPatient ";
			}else{
				$sqlQuery =  $sqlQuery." where patientID = $inputPatient ";
			}
		}
	
		$sqlQuery =  $sqlQuery." ; ";
	
		
		//$sqlQuery = "
		//				select * 
		//				from appointment 
		//				where 	dateOfAppointmentScheduled  BETWEEN '$inputDate1' AND '$inputDate2' AND
		//						clinicID = '$inputClinic' AND
		//						patientID = '$inputPatient'
		//			;";
		
	//this part is where i combine the search values ^^^	
		
			$resultQuery = mysqli_query($conn, $sqlQuery);
	$checkResultQuery = mysqli_num_rows($resultQuery);
	}

	
	//second query 
	
		if (isset($_POST['submitButton2'])){
			
			$inputPatient2 = $_POST['inputPatient2'];
			
			if (strcmp ($inputPatient2 , "*")==0){
				$sqlQuery2 =" select * from appointment where NUMmissedAppointment  > 0;";	
			}else{
				$sqlQuery2 =" select * from appointment where NUMmissedAppointment  > 0 and patientID = $inputPatient2;";	
			}					
			echo $sqlQuery2;		
		$resultQuery2 = mysqli_query($conn, $sqlQuery2);
		$checkResultQuery2 = mysqli_num_rows($resultQuery2);
		}
	//
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
		
		
		
	<?php 
	if (isset($_POST['submitButton1'])&& $checkResultQuery >0){
	
				echo "<table class = 'queryTable'>";
					
				echo "<th class = 'queryTable'>AID</th>";
				echo "<th class = 'queryTable'>patientID</th>";
				echo "<th class = 'queryTable'>dentistID</th>";
				echo "<th class = 'queryTable'>dentalAssistantID</th>";
				echo "<th class = 'queryTable'>receptionistID</th>";
				echo "<th class = 'queryTable'>clinicID</th>";
				echo "<th class = 'queryTable'>treamentID_________</th>";
				echo "<th class = 'queryTable'>dateOfAppointmentScheduled</th>";
				echo "<th class = 'queryTable'>dateOfAppointmentDone</th>";
				echo "<th class = 'queryTable'>NUMmissedAppointment</th>";							
				echo "</tr>";
						
				while ( $row = mysqli_fetch_array($resultQuery)){
				
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
							
					echo "<tr class = 'queryTable'>";		
					echo "<td value='$temp1' class = 'queryTable'> $temp1  </td>" ;
				?>
				
					<td value='$temp2' class = 'queryTable'>
				<?php
						$sqlTemp = "select * from patient where PID = $temp2;";
						$resultTemp = mysqli_query($conn, $sqlTemp);
						$checkResultTemp = mysqli_num_rows($resultTemp);
						
							if ($checkResultTemp >0){							
									$row = mysqli_fetch_array($resultTemp);										
									$tempCID =  $row['PID'];
									$tempCName =  $row['name'];
									$tempCLastName =  $row['lastName'];																												
									echo " $tempCID - $tempCName $tempCLastName";																																									 
							}
				?>
					</td>
				
					<td value='$temp3' class = 'queryTable'> 
				<?php

						$sqlTemp = "select * from dentist  where EID = $temp3;";
						$resultTemp = mysqli_query($conn, $sqlTemp);
						$checkResultTemp = mysqli_num_rows($resultTemp);
						
							if ($checkResultTemp >0){							
									$row = mysqli_fetch_array($resultTemp);										
									$tempCID =  $row['EID'];
									$tempCName =  $row['name'];
									$tempCLastName =  $row['lastName'];																												
									echo " $temp3 - $tempCName $tempCLastName";																																									 
							}else{
									echo " $temp3 - [deletedDentist]";
							}
					?>
					</td>				
					<td value='$temp3' class = 'queryTable'> 
					<?php

						$sqlTemp = "select * from dentalAssistant  where EID = $temp4;";
						$resultTemp = mysqli_query($conn, $sqlTemp);
						$checkResultTemp = mysqli_num_rows($resultTemp);
						
							if ($checkResultTemp >0){							
									$row = mysqli_fetch_array($resultTemp);										
									$tempCID =  $row['EID'];
									$tempCName =  $row['name'];
									$tempCLastName =  $row['lastName'];																												
									echo " $temp4 - $tempCName $tempCLastName";																																									 
							}else{
									echo " $temp4 - [deletedAssistant]";
							}
					?>


					</td>
				
					<td value='$temp5' class = 'queryTable'>   
					<?php

						$sqlTemp = "select * from receptionist  where EID = $temp5;";
						$resultTemp = mysqli_query($conn, $sqlTemp);
						$checkResultTemp = mysqli_num_rows($resultTemp);
						
							if ($checkResultTemp >0){							
									$row = mysqli_fetch_array($resultTemp);										
									$tempCID =  $row['EID'];
									$tempCName =  $row['name'];
									$tempCLastName =  $row['lastName'];																												
									echo " $temp5 - $tempCName $tempCLastName";																																									 
							}else{
									echo " $temp5 - [deletedReceptionist]";
							}
					?>
					
					
					</td>
				
					<td value='$temp6' class = 'queryTable'> 
					
					<?php

						$sqlTemp = "select * from clinic  where CID = $temp6;";
						$resultTemp = mysqli_query($conn, $sqlTemp);
						$checkResultTemp = mysqli_num_rows($resultTemp);
						
							if ($checkResultTemp >0){							
									$row = mysqli_fetch_array($resultTemp);										
									$tempCID =  $row['CID'];
									$tempCName =  $row['clinicName'];
																																				
									echo " $temp6 - $tempCName";																																									 
							}else{
									echo " $temp6 - [deletedClinic]";
							}
					?>
					
					

					</td>
				
					
					<td value='treatmentID' class = 'queryTable'> 
				<?php

						$sqlTemp = "select * from treatmentList  where 	appointmentID = $temp1;";
						$resultTemp = mysqli_query($conn, $sqlTemp);
						$checkResultTemp = mysqli_num_rows($resultTemp);
						
							if ($checkResultTemp >0){							
									while ( $row = mysqli_fetch_array($resultTemp)){
																		
										$tempTID =  $row['treatmentID'];
										
										$sqlTreament = "select * from treatment  where TID = $tempTID;";
										$resultTreament = mysqli_query($conn, $sqlTreament);
										$checkResultTreament = mysqli_num_rows($resultTreament);
										
										if ($checkResultTreament >0){
											while ( $row = mysqli_fetch_array($resultTreament)){
												$TID = $row['TID'];
												$name = $row['name'];
												echo "<input disabled checked type='checkbox' id='$TID' name='TID[]' value='$TID' >$TID - $name</input> <br/>";
										
											}
										}
									
									
									}																										
																																																		 
							}else{
								echo "no treatment";
							}
					?>



					</td>
					
				<?php
					echo "<td value='$temp7' class = 'queryTable'> $temp7  </td>" ;
					echo "<td value='$temp8' class = 'queryTable'> $temp8  </td>" ;
					echo "<td value='$temp9' class = 'queryTable'> $temp9  </td>" ;
					

					echo "</tr>" ;
				
				}						 
			}
			echo "</table>";
			if (isset($_POST['submitButton1'])&& $checkResultQuery ==0){
				echo "<div class ='middle'>";
				echo "no appointments found";
				echo "</div>";
			}
		?>
		
		
	<?php
	
	if (isset($_POST['submitButton2'])&& $checkResultQuery2 >0){
	
				echo "<table class = 'queryTable'>";
					
				echo "<th class = 'queryTable'>AID</th>";
				echo "<th class = 'queryTable'>patientID</th>";
				echo "<th class = 'queryTable'>dentistID</th>";
				echo "<th class = 'queryTable'>dentalAssistantID</th>";
				echo "<th class = 'queryTable'>receptionistID</th>";
				echo "<th class = 'queryTable'>clinicID</th>";
				echo "<th class = 'queryTable'>treamentID</th>";
				echo "<th class = 'queryTable'>dateOfAppointmentScheduled</th>";
				echo "<th class = 'queryTable'>dateOfAppointmentDone</th>";
				echo "<th class = 'queryTable'>NUMmissedAppointment</th>";							
				echo "</tr>";
						
				while ( $row = mysqli_fetch_array($resultQuery2)){
				
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
							
							
					echo "<tr class = 'queryTable'>";		
					echo "<td value='$temp1' class = 'queryTable'> $temp1  </td>" ;
					echo "<td value='$temp2' class = 'queryTable'> $temp2  </td>" ;
					echo "<td value='$temp3' class = 'queryTable'> $temp3  </td>" ;
					echo "<td value='$temp3' class = 'queryTable'> $temp4  </td>" ;
					echo "<td value='$temp5' class = 'queryTable'> $temp5  </td>" ;
					echo "<td value='$temp6' class = 'queryTable'> $temp6  </td>" ;
					echo "<td value='$temp7' class = 'queryTable'> $temp7  </td>" ;
					echo "<td value='$temp8' class = 'queryTable'> $temp8  </td>" ;
					echo "<td value='$temp9' class = 'queryTable'> $temp9  </td>" ;
					

					echo "</tr>" ;				
				}
				echo "</table>";					
			}
			if (isset($_POST['submitButton2'])&& $checkResultQuery2 ==0){
				echo "<div class ='middle'>";
				echo "no appointments found";
				echo "</div>";
			}
		?>
		
		
		

  
		
	<?php
		include_once 'footer/footer3.php';
	?>
	

</body>
</html>