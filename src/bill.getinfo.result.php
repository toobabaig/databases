<?php
include_once 'includes/dbh.inc.php';
	
	if (isset($_POST['selectPatientButton1'])){	

		$selectValuePatient= $_POST["selectPatient1"];
		if (strcmp($selectValuePatient, "*") ==0 ){
			
			$sqlBill = "select * from bill;";	
		}else{
			
			$sqlBill = "select * from bill where BID  = $selectValuePatient ;";		
		}
		
		$resultBill = mysqli_query($conn, $sqlBill);
		$checkResultBill = mysqli_num_rows($resultBill);
		
	}

	
	if (isset($_POST['selectPatientButton2'])){		

		$selectValuePatient= $_POST["selectPatient1"];
		if (strcmp($selectValuePatient, "*") ==0 ){
			
			$sqlBill = "select * from bill where ;";	
		}else{
			
			$sqlBill = "select * from bill where BID  = $selectValuePatient ;";		
		}
		
		$resultBill = mysqli_query($conn, $sqlBill);
		$checkResultBill = mysqli_num_rows($resultBill);
	}
	echo $sqlBill;
	
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
	if (isset($_POST['selectPatientButton1'])& $checkResultBill >0){
		
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
					//$tempB=  $row['treatmentCharge'];
					$temp7 =  $row['amountPaid'];
					$temp8 =  $row['dateOfTreatment'];	
							
					echo "<tr class = 'queryTable'>";		
					echo "<td value='$temp1' class = 'queryTable'> $temp1  </td>" ;
					echo "<td value='$temp2' class = 'queryTable'> $temp2  </td>" ;
					echo "<td value='$temp3' class = 'queryTable'> $temp3  </td>" ;
					echo "<td value='$temp3' class = 'queryTable'> $temp4  </td>" ;
					echo "<td value='$temp5' class = 'queryTable'> $temp5  </td>" ;
					echo "<td value='$temp6' class = 'queryTable'> $temp6  </td>" ;
					echo "<td value='tempA' class = 'queryTable'> tempA  </td>" ;
					echo "<td value='tempB' class = 'queryTable'> tempB  </td>" ;
					echo "<td value='$temp7' class = 'queryTable'> $temp7  </td>" ;
					echo "<td value='$temp8' class = 'queryTable'> $temp8  </td>" ;
				
				


					echo "</tr>" ;
				
				}						 
			}
			echo "</table>";
			
			if (isset($_POST['selectPatientButton2'])& $checkResultBill >0){
		
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
				
					$temp1 =  $_POST['BID'];
					$temp2 =  $_POST['patientID'];
					$temp3 =  $_POST['appointmentID'];
					$temp4 =  $_POST['receptionistID'];
				
					$temp7 =  $_POST['dentistID'];
					
					$temp8 =  $_POST['clinicID'];
					
					//$temp7 =  $_POST['treatmentID'];
					//$temp8 =  $_POST['treatmentCharge'];
					$temp9 =  $_POST['amountPaid'];
					$temp10 =  $_POST['dateOfTreatment'];	
							
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
			}
			echo "</table>";
		?>


	<?php
		include_once 'footer/footer3.php';
	?>
	

</body>
</html>