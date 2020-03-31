<?php
include_once 'includes/dbh.inc.php';
	
	if (isset($_POST['selectAppointmentButton'])){		
		$valueAppointment = $_POST["selectAppointment"];					
		$sqlAppointment = "select * from appointment where AID = $valueAppointment ;";
		$resultAppointment = mysqli_query($conn, $sqlAppointment);
		$checkResultAppointment = mysqli_num_rows($resultAppointment);
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
		
		
	<form action="appointment.delete.result2.php" method="post">	
	<?php 
	
	if (isset($_POST['selectAppointmentButton'])&& $checkResultAppointment >0){
		
				echo "<table class = 'queryTable'>";
					
				echo "<th class = 'queryTable'>AID</th>";
				echo "<th class = 'queryTable'>patientID</th>";
				echo "<th class = 'queryTable'>dentistID</th>";
				echo "<th class = 'queryTable'>dentalAssistantID</th>";
				echo "<th class = 'queryTable'>receptionistID</th>";
				echo "<th class = 'queryTable'>clinicID</th>";
				echo "<th class = 'queryTable'>dateOfAppointmentScheduled</th>";
				echo "<th class = 'queryTable'>dateOfAppointmentDone</th>";
				echo "<th class = 'queryTable'>NUMmissedAppointment</th>";							
				echo "</tr>";
						
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
							
					echo "<tr class = 'queryTable'>";		
					echo "<td value='$temp1' class = 'queryTable'> $temp1  </td>" ;
					echo "<input hidden name = 'AID' type = 'text' value = '$temp1'>";
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
		
		<input  name="deleteAppointmentButton" type="submit" value="delete appointment">
	</form>
	<?php
		include_once 'footer/footer6.php';
	?>
	

</body>
</html>