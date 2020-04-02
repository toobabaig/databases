<?php
	include_once 'includes/dbh.inc.php';
	$valueInput = $_POST['selectClinic'];
	
	$sqlDentist = "select * from dentist ;";
	$resultDentist = mysqli_query($conn, $sqlDentist);
	$checkresultDentist = mysqli_num_rows($resultDentist);
	
	$sqlClinic = "select * from clinic  where clinic.CID = $valueInput;";
	$resultClinic = mysqli_query($conn, $sqlClinic);
	$checkResultClinic = mysqli_num_rows($resultClinic);
	
	$sqlGeneralDentistofClinic = "select * from dentist,clinic where clinic.CID = $valueInput and dentist.EID = clinic.generalDentist ;";
	$resultGeneralDentistofClinic = mysqli_query($conn, $sqlGeneralDentistofClinic);	
		while ( $row = mysqli_fetch_array($resultGeneralDentistofClinic)){											
			$tempGeneralDentistofClinicID =  $row['EID'];
			$tempGeneralDentistofClinicName =  $row['name'];
			$tempGeneralDentistofClinicLName =  $row['lastName'];			
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
		<form action="clinic.update.result2.php" method = "post">
			<table class = 'queryTable'>
				<tr class = 'queryTable'>
					<tr class = 'queryTable'>	
				<th class = 'queryTable'>CID</th>
				<th class = 'queryTable'>general Dentist</th>
				<th class = 'queryTable'>clinic Name</th>
				<th class = 'queryTable'>opening Hours</th>
				<th class = 'queryTable'>webpage</th>
				<th class = 'queryTable'>email</th>
				<th class = 'queryTable'>address</th>
				<th class = 'queryTable'>phone</th>						
				</tr>
				
			<?php						
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
				echo "<td name='CID' value='$temp1' class = 'queryTable'> $temp1</td>";	
				echo "<input hidden type='text'  name='CID' value = '$temp1' >";		
				}
			?>
					<td value='generalDentist' class = 'queryTable'>  
						<select name="generalDentistSelect">					  					  
			<?php					
							echo "<option value='$tempGeneralDentistofClinicID' selected='selected'> $tempGeneralDentistofClinicID - $tempGeneralDentistofClinicName $tempGeneralDentistofClinicLName </option>";
							if ($checkresultDentist >0){
								
								while ( $row = mysqli_fetch_array($resultDentist)){											
									$tempEID =  $row['EID'];
									$tempDName =  $row['name'];
									$tempDLastName =  $row['lastName'];										
									
									if ($tempEID !=  $tempGeneralDentistofClinicID){
										echo "<option value='$tempEID'> $tempEID - $tempDName $tempDLastName </option>" ;
									}
								}																								 
							}
				?>						
						</select>			
					</td>
			
					<?php echo "<td  value='clinicName' class = 'queryTable'>  <input type='text'  name='clinicName' value = '$temp3' >  </td>"; ?>
					<?php echo "<td value='openingHours' class = 'queryTable'> <input type='text'  name='openingHours' value = '$temp4' > </td>";?>
					<?php echo "<td  value='webpage' class = 'queryTable'>  <input type='text'  name='webpage' value = '$temp5' >  </td>";?>
					<?php echo " <td value='email' class = 'queryTable'>  <input type='text' name='email' value = '$temp6'>  </td>";?>
					<?php echo " <td value='address' class = 'queryTable'>  <input type='text' name='address' value = '$temp7' >  </td>";?>
					<?php echo "<td value='phone' class = 'queryTable'>  <input type='text'  name='phone' value = '$temp8' >  </td>";?>
					
					<td value='availability' class = 'queryTable'>  

					<select name="availabilitySelect">
					
						<?php echo "<option value='$temp10' selected='selected'> $temp10  </option>";
							  if (strcmp("$temp10","full time") ==0 ){
									echo "<option value='part time'>part time</option>";
									echo "<option value='vacation'>vacation</option>";
							  }elseif(strcmp("$temp10","part time") ==0 ){
									echo "<option value='full time'>full time</option>";
									echo "<option value='vacation'>vacation</option>";
							  }else{
									echo "<option value='full time'>full time</option>";
									echo "<option value='part time'>part time</option>";
							  }												  
						?>
					   }							
						</select>
					</td>
				</tr>
			</table>
			<br>
			<input name = "updateClinic" type="submit" value="update clinic">
			<input type="submit" value="cancel update">
		</form> 
		
		
	<?php
		include_once 'footer/footer5.php';
	?>
	

</body>
</html>