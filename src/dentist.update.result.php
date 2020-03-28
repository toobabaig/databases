<?php
	include_once 'includes/dbh.inc.php';
	$valueInput = $_POST['selectDentist1'];
	
	$sqlDentist = "select * from dentist where dentist.EID = $valueInput ;";
	$resultDentist = mysqli_query($conn, $sqlDentist);
	$checkresultDentist = mysqli_num_rows($resultDentist);
	
	$sqlClinic = "select * from clinic ";
	$resultClinic = mysqli_query($conn, $sqlClinic);
	$checkResultClinic = mysqli_num_rows($resultClinic);
	
	$sqlClinicofDentist = "select * from dentist,clinic where dentist.EID = $valueInput and dentist.clinicID = clinic.CID ";
	$resultClinicDentist = mysqli_query($conn, $sqlClinicofDentist);	
		while ( $row = mysqli_fetch_array($resultClinicDentist)){											
			$tempCIDofDentist =  $row['CID'];
			$tempCNameofDentist =  $row['clinicName'];													 				 											
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
		<form action="dentist.update.result2.php" method = "post">
			<table class = 'queryTable'>
				<tr class = 'queryTable'>
					<th class = 'queryTable'>EID</th>
					<th class = 'queryTable'>clinicID</th>
					<th class = 'queryTable'>SIN</th>
					<th class = 'queryTable'>gender</th>
					<th class = 'queryTable'>address</th>
					<th class = 'queryTable'>name</th>
					<th class = 'queryTable'>lastName</th>
					<th class = 'queryTable'>phone</th>
					<th class = 'queryTable'>email</th>"	
					<th class = 'queryTable'>availability</th>						
				</tr>
				
			<?php						
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
				echo "<td name='EID' value='$temp1' class = 'queryTable'> $temp1</td>";	
				echo "<input hidden type='text'  name='EID' value = '$temp1' >";		
				}
			?>
					<td value='clinicID' class = 'queryTable'>  
						<select name="clinicSelect">					  					  
			<?php					
							echo "<option value='$tempCIDofDentist' selected='selected'> $tempCIDofDentist - $tempCNameofDentist </option>";
							if ($checkResultClinic >0){
								
								while ( $row = mysqli_fetch_array($resultClinic)){											
									$tempCID =  $row['CID'];
									$tempCName =  $row['clinicName'];													 				 											
									
									if ($tempCID !=  $tempCIDofDentist){
										echo "<option value='$tempCID'> $tempCID - $tempCName </option>" ;
									}
								}																								 
							}
				?>						
						</select>			
					</td>
			
					<?php echo "<td  value='SIN' class = 'queryTable'>  <input type='text'  name='SIN' value = '$temp3' >  </td>"; ?>
					<td value='gender' class = 'queryTable'>  
					
						<select name="genderSelect">
						
							<?php echo "<option value='$temp4' selected='selected'> $temp4  </option>";
								if (strcmp("$temp4", "M")==0){ //to prevent duplicate values in option									
									echo "<option value='F'>F</option>";
								}else{
									echo "<option value='M'>M</option>";
								}														
							?>
						</select>
					</td>
					<?php echo "<td  value='address' class = 'queryTable'>  <input type='text'  name='address' value = '$temp5' >  </td>";?>
					<?php echo " <td value='name' class = 'queryTable'>  <input type='text' name='name' value = '$temp6'>  </td>";?>
					<?php echo " <td value='lastName' class = 'queryTable'>  <input type='text' name='lastName' value = '$temp7' >  </td>";?>
					<?php echo "<td value='phone' class = 'queryTable'>  <input type='text'  name='phone' value = '$temp8' >  </td>";?>
					<?php echo "<td value='email' class = 'queryTable'>  <input type='text' name='email' value = '$temp9' > </td>";?>
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
			<input name = "updateDentist" type="submit" value="update dentist">
			<input type="submit" value="cancel update">
		</form> 
		
		
	<?php
		include_once 'footer/footer4.php';
	?>
	

</body>
</html>