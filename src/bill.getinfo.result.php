<?php
include_once 'includes/dbh.inc.php';
	
	if (isset($_POST['selectPatientButton1'])){	

		$selectValuePatient= $_POST["selectPatient1"];
		if (strcmp($selectValuePatient, "*") ==0 ){
			
			$sqlBill = "select * from bill;";
			$resultBill = mysqli_query($conn, $sqlBill);
			$checkResultBill = mysqli_num_rows($resultBill);	
			
			
			
		}else{
			
			$sqlBill = "select * from bill where patientID  = $selectValuePatient ;";	
			$resultBill = mysqli_query($conn, $sqlBill);
			$checkResultBill = mysqli_num_rows($resultBill);
					
		}
		
			
		
	}

	
	if (isset($_POST['selectPatientButton2'])){		

		$selectValuePatient= $_POST["selectPatient2"];
		if (strcmp($selectValuePatient, "*") ==0 ){
			
			$sqlBill = "select * from bill  where amountPaid < treatmentCharge  ;";	
		}else{
			
			$sqlBill = "select * from bill where patientID  = $selectValuePatient  and amountPaid < treatmentCharge;";		
		}
	
		$resultBill = mysqli_query($conn, $sqlBill);
		$checkResultBill = mysqli_num_rows($resultBill);
		
	}
	
	$sqlPatient = "select * from patient;";
	$resultPatient = mysqli_query($conn, $sqlPatient);
	$checkResultPatient = mysqli_num_rows($resultPatient);

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
	if (    ((isset($_POST['selectPatientButton1'])) || isset($_POST['selectPatientButton2']))       & $checkResultBill >0){
		
				echo "<table class = 'queryTable'>";					
					echo "<th class = 'queryTable'>BID</th>";
					echo "<th class = 'queryTable'>patientID</th>";
					echo "<th class = 'queryTable'>appointmentID</th>";
					echo "<th class = 'queryTable'>receptionistID</th>	";				
					echo "<th class = 'queryTable'>dentistID</th>";
				
					echo "<th class = 'queryTable'>clinicID</th>";
					echo "<th class = 'queryTable' >treatmentID_____</th>	";
					echo "<th class = 'queryTable'>treatmentCharge</th>	";
					echo "<th class = 'queryTable'>amountPaid</th>	";
					echo "<th class = 'queryTable'>dateOfTreatment</th>	";	
				echo "</tr>";
						
				while ( $row = mysqli_fetch_array($resultBill)){
				
					$temp1 =  $row['BID'];
					
					$temp2 =  $row['patientID'];
					$temp3 =  $row['appointmentID'];
					$temp4 =  $row['receptionistID'];
				
					$temp5 =  $row['dentistID'];
					
					$temp6 =  $row['clinicID'];
					
					//$tempA =  $row['treatmentID'];
					$tempB=  $row['treatmentCharge'];
					$temp7 =  $row['amountPaid'];
					$temp8 =  $row['dateOfTreatment'];	
					

?>					
					<tr class = 'queryTable'>
				<?php	echo "<td value='$temp1' class = 'queryTable'> $temp1  </td>";?>
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
					<?php echo "<td value='$temp3' class = 'queryTable'> $temp3  </td>"; ?>
					<td value='$temp3' class = 'queryTable'> 
				
				<?php

						$sqlTemp = "select * from receptionist  where EID = $temp4;";
						$resultTemp = mysqli_query($conn, $sqlTemp);
						$checkResultTemp = mysqli_num_rows($resultTemp);
						
							if ($checkResultTemp >0){							
									$row = mysqli_fetch_array($resultTemp);										
									$tempCID =  $row['EID'];
									$tempCName =  $row['name'];
									$tempCLastName =  $row['lastName'];																												
									echo " $temp4 - $tempCName $tempCLastName";																																									 
							}
				?>


					</td>
					<td value='temp3' class = 'queryTable'> 	

					<?php

						$sqlTemp = "select * from dentist  where EID = $temp5;";
						$resultTemp = mysqli_query($conn, $sqlTemp);
						$checkResultTemp = mysqli_num_rows($resultTemp);
						
							if ($checkResultTemp >0){							
									$row = mysqli_fetch_array($resultTemp);										
									$tempCID =  $row['EID'];
									$tempCName =  $row['name'];
									$tempCLastName =  $row['lastName'];																												
									echo " $temp5 - $tempCName $tempCLastName";																																									 
							}else{
									echo " $temp5 - [deletedDentist]";
							}
					?>


					</td>					
					<td value='temp6' class = 'queryTable'> 
					<?php

						$sqlTemp = "select * from clinic  where CID = $temp6;";
						$resultTemp = mysqli_query($conn, $sqlTemp);
						$checkResultTemp = mysqli_num_rows($resultTemp);
						
							if ($checkResultTemp >0){							
									$row = mysqli_fetch_array($resultTemp);										
									$tempCID =  $row['CID'];
									$tempCName =  $row['clinicName'];
																																				
									echo " $temp6 - $tempCName ";																																									 
							}
					?>



					</td>
					<td value='treatmentID' class = 'queryTable'> 
						<?php

						$sqlTemp = "select * from treatmentList  where bill_ID = $temp1;";
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
					<?php echo "<td value='$tempB' class = 'queryTable'> $tempB  </td> ";?>
					<?php echo "<td value='tempB' class = 'queryTable'> $temp7  </td> ";?>
					<?php echo "<td value='tempB' class = 'queryTable'> $temp8  </td> ";?>
				<?php				
				


					echo "</tr>" ;
				
				}						 
			}
			echo "</table>";
			
			if (isset($_POST['selectPatientButton3'])& $checkResultBill >0){
		
				echo "<table class = 'queryTable'>";					
					echo "<th class = 'queryTable'>BID</th>";
					echo "<th class = 'queryTable'>patientID</th>";
					echo "<th class = 'queryTable'>appointmentID</th>";
					echo "<th class = 'queryTable'>receptionistID</th>	";				
					echo "<th class = 'queryTable'>dentistID</th>";
				
					echo "<th class = 'queryTable'>clinicID</th>";
					echo "<th class = 'queryTable' >treatmentID_____</th>	";
					echo "<th class = 'queryTable'>treatmentCharge</th>	";
					echo "<th class = 'queryTable'>amountPaid</th>	";
					echo "<th class = 'queryTable'>dateOfTreatment</th>	";	
				echo "</tr>";
				
				while ( $row = mysqli_fetch_array($resultBill)){
				
				
					$temp1 =  $row['BID'];
					$temp2 =  $row['patientID'];
					$temp3 =  $row['appointmentID'];
					$temp4 =  $row['receptionistID'];
				
					$temp5 =  $row['dentistID'];
					
					$temp6 =  $row['clinicID'];
					
					//$temp7 =  $row['treatmentID'];
					$temp8 =  $row['treatmentCharge'];
					$temp9 =  $row['amountPaid'];
					$temp10 =  $row['dateOfTreatment'];	
							
					echo "<tr class = 'queryTable'>";		
					echo "<td value='$temp1' class = 'queryTable'> $temp1  </td>" ;
					echo "<td value='$temp2' class = 'queryTable'> $temp2  </td>" ;
					echo "<td value='$temp3' class = 'queryTable'> $temp3  </td>" ;
					echo "<td value='$temp3' class = 'queryTable'> $temp4  </td>" ;
					echo "<td value='$temp5' class = 'queryTable'> $temp5  </td>" ;
					echo "<td value='$temp6' class = 'queryTable'> $temp6  </td>" ;
					echo "<td value='temp7' class = 'queryTable'> temp7  </td>" ;
					echo "<td value='$temp8' class = 'queryTable'> $temp8  </td>" ;
					echo "<td value='$temp9' class = 'queryTable'> $temp9  </td>" ;
					echo "<td value='$temp10' class = 'queryTable'> $temp10  </td>" ;
			


					echo "</tr>" ;
				
				}						 
			}
			echo "</table>";
		?>


	<?php
		
		include_once 'footer/footer3.php';
	?>
	

</body>
</html>