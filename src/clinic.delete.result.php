<?php
include_once 'includes/dbh.inc.php';
	
	if (isset($_POST['selectClinicButton'])){		
		$selectValueClinic = $_POST["selectClinic"];
		if (strcmp($selectValueClinic, "*") ==0 ){
			$sqlClinic = "select * from clinic;";			
		}else{
			
			$sqlClinic = "select * from clinic where clinic.CID = $selectValueClinic;";		
		}
		$resultClinic = mysqli_query($conn, $sqlClinic);
		$checkResultClinic = mysqli_num_rows($resultClinic);
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
		
		
	<form action="clinic.delete.result2.php" method="post">	
	<?php 
	
	if (isset($_POST['selectClinicButton'])&& $checkResultClinic >0){
		
				echo "<table class = 'queryTable'>";					
					echo "	<tr class = 'queryTable'>";		
					echo "<th class = 'queryTable'>CID</th>";
					echo "<th class = 'queryTable'>general Dentist</th>";
					echo "<th class = 'queryTable'>clinic Name</th>";
					echo "<th class = 'queryTable'>opening Hours</th>";
					echo "<th class = 'queryTable'>webpage</th>";
					echo "<th class = 'queryTable'>email</th>";
					echo "<th class = 'queryTable'>address</th>";
					echo "<th class = 'queryTable'>phone</th>";		
				echo "</tr>";
						
				while ( $row = mysqli_fetch_array($resultClinic)){
				
					
					$temp1 =  $row['CID'];
					$temp2 =  $row['generalDentist'];
					$temp3 =  $row['clinicName'];
					$temp4 =  $row['openingHours'];
					$temp5 =  $row['webpage'];
					$temp6 =  $row['email'];
					$temp7 =  $row['address'];
					$temp8 =  $row['phone'];
							
					echo "<tr class = 'queryTable'>";		
					echo "<td value='$temp1' class = 'queryTable'> $temp1  </td>" ;
					echo "<input hidden  name='CID' type='text' value='$temp1'>";
					echo "<td value='$temp2' class = 'queryTable'> $temp2  </td>" ;
					echo "<td value='$temp3' class = 'queryTable'> $temp3  </td>" ;
					echo "<input hidden  name='clinicName' type='text' value='$temp3'>";
					echo "<td value='$temp3' class = 'queryTable'> $temp4  </td>" ;
					echo "<td value='$temp5' class = 'queryTable'> $temp5  </td>" ;
					echo "<td value='$temp6' class = 'queryTable'> $temp6  </td>" ;
					echo "<td value='$temp7' class = 'queryTable'> $temp7  </td>" ;
					echo "<td value='$temp8' class = 'queryTable'> $temp8  </td>" ;


					echo "</tr>" ;
				
				}						 
			}
			echo "</table>";
		?>
		
		<input  name="deleteClinicButton" type="submit" value="delete clinic">
	</form>
	<?php
		include_once 'footer/footer6.php';
	?>
	

</body>
</html>