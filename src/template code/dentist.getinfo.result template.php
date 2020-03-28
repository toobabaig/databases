<?php
include_once 'includes/dbh.inc.php';
	
	if (isset($_POST['selectClinic1'])){
		$selectValueClinic = $_POST["selectClinic1"];
		if (strcmp($selectValueClinic, "*") ==0 ){
			$sqlClinic = "select * from clinic;";
			$resultClinic = mysqli_query($conn, $sqlClinic);
			$checkResultClinic = mysqli_num_rows($resultClinic);
			
		}else{
			$sqlClinic = "select * from clinic where clinic.CID = $selectValueClinic;";
			$resultClinic = mysqli_query($conn, $sqlClinic);
			$checkResultClinic = mysqli_num_rows($resultClinic);
			}
	}
	
	if (isset($_POST['selectDentist1'])){
		$selectValueDentist = $_POST["selectDentist1"];
		if (strcmp($selectValueDentist, "*") ==0){
		$sqlDentist = "select * from dentist;";
		$resultDentist = mysqli_query($conn, $sqlDentist);
		$checkResultDentist = mysqli_num_rows($resultDentist);
		}else{
			$sqlDentist = "select * from dentist where dentist.EID = $selectValueDentist;";
			
			$resultDentist = mysqli_query($conn, $sqlDentist);
			$checkResultDentist = mysqli_num_rows($resultDentist);
		}
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
		
		
		
	<?php
	if (isset($_POST['selectClinic1'])&& $checkResultClinic >0){
		
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
					echo "<td value='$temp2' class = 'queryTable'> $temp2  </td>" ;
					echo "<td value='$temp3' class = 'queryTable'> $temp3  </td>" ;
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
		
		
	<?php
	
	if (isset($_POST['selectDentist1'])&& $checkResultDentist >0){
		
		echo "<table class = 'queryTable'>";
				echo "	<tr class = 'queryTable'>";		
				echo "<th class = 'queryTable'>EID</th>";
				echo "<th class = 'queryTable'>clinicID</th>";
				echo "<th class = 'queryTable'>SIN</th>";
				echo "<th class = 'queryTable'>gender</th>";
				echo "<th class = 'queryTable'>address</th>";
				echo "<th class = 'queryTable'>name</th>";
				echo "<th class = 'queryTable'>lastName</th>";
				echo "<th class = 'queryTable'>phone</th>";
				echo "<th class = 'queryTable'>email</th>";		
				echo "<th class = 'queryTable'>availability</th>";						
				echo "</tr>";
						
				while ( $row = mysqli_fetch_array($resultDentist)){
				
					$temp1 =  $row['EID'];
					$temp2 =  $row['clinicID'];
					$temp3 =  $row['SIN'];
					$temp4 =  $row['gender'];
					$temp5 =  $row['address'];
					$temp6 =  $row['name'];
					$temp7 =  $row['lastName'];
					$temp8 =  $row['phone'];
					$temp9 =  $row['email'];
					$temp10 =  $row['ptftv'];
							
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