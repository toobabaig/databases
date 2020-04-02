<?php
include_once 'includes/dbh.inc.php';
	
	if (isset($_POST['selectDentist2'])){
		
		$selectValueDentist2 = $_POST["selectDentist2"];
		if (strcmp($selectValueDentist2, "*") ==0 ){
			$sqlDentist2 = "select * from dentist;";
			$resultDentist2 = mysqli_query($conn, $sqlDentist2);
			$checkResultDentist2 = mysqli_num_rows($resultDentist2);
			
		}else{
			
			$sqlDentist2 = "select * from dentist where dentist.clinicID = $selectValueDentist2;";
			$resultDentist2 = mysqli_query($conn, $sqlDentist2);
			$checkResultDentist2 = mysqli_num_rows($resultDentist2);
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
	if (isset($_POST['selectDentist2'])&& $checkResultDentist2 >0){
		?>
		<table class = 'queryTable'>
		
		<th class = 'queryTable'>EID</th>
		<th class = 'queryTable'>clinicID</th>
		<th class = 'queryTable'>SIN</th>
		<th class = 'queryTable'>gender</th>
		<th class = 'queryTable'>address</th>
		<th class = 'queryTable'>name</th>
		<th class = 'queryTable'>lastName</th>
		<th class = 'queryTable'>phone</th>
		<th class = 'queryTable'>email</th>		
		<th class = 'queryTable'>availability</th>						
		</tr>
		<?php 				
				while ( $row = mysqli_fetch_array($resultDentist2)){
				
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
			?>
			
					<tr class = 'queryTable'>
					
					<?php echo "<td value='$temp1' class = 'queryTable'> $temp1  </td>" ;?>
					<td value='$temp2' class = 'queryTable'> 
<?php					
						$sqlClinic = "select * from clinic where clinicID = $temp2;";
						$resultClinic = mysqli_query($conn, $sqlClinic);
						$checkResultClinic = mysqli_num_rows($resultClinic);
						
						if ($checkResultClinic>0){														
							while ( $row = mysqli_fetch_array($resultDentist)){
									
							
							
								echo "<td value='$temp3' class = 'queryTable'> $temp3  </td>" ;
						}
?>
					</td>
				<?php	
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