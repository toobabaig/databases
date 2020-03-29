<?php
	include_once 'includes/dbh.inc.php';
	
	$sqlClinic = "select * from clinic;";
	$resultClinic = mysqli_query($conn, $sqlClinic);
	$checkResultClinic = mysqli_num_rows($resultClinic);
	
	$sqlDentist = "select * from dentist;";
	$resultDentist = mysqli_query($conn, $sqlDentist);
	$checkResultDentist = mysqli_num_rows($resultDentist);
	
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
		<form action="clinic.insertnew.result.php" method = "post">
			<table class = 'queryTable'>
				<tr class = 'queryTable'>					
					<th class = 'queryTable'>CID</th>";
					<th class = 'queryTable'>general Dentist</th>
					<th class = 'queryTable'>clinic Name</th>
					<th class = 'queryTable'>opening Hours</th>
					<th class = 'queryTable'>webpage</th>
					<th class = 'queryTable'>email</th>
					<th class = 'queryTable'>address</th>
					<th class = 'queryTable'>phone</th>						
				</tr>
				<tr class = 'queryTable'>
					<td value='CID' class = 'queryTable'>auto generated</td>
					<td value='generalDentist' class = 'queryTable'>  
						<select name="generalDentistSelect">						  					  
							 <?php
							if ($checkResultDentist >0){
									while ( $row = mysqli_fetch_array($resultDentist)){								
										$tempID =  $row['EID'];
										$tempDName =  $row['name'];										
										echo "<option value='$tempID'> $tempID - $tempDName   </option>" ;																	}														 
								}
							?>												 
						</select>			
					</td>
					<td value='clinicName' class = 'queryTable'> <input name = "clinicName" type="text" ></td>
					<td value='openingHours' class = 'queryTable'>  					
						<input type="text"  name="openingHours" value ="mon 8:00-6:00, tue 8:00-6:00, wed 8:00-6:00, thu 8:00-9:00, fri 8:00-9:00, sat 8:00-5:00, sun CLOSED" >
					</td>
					<td value='webpage' class = 'queryTable'>  <input name = "webpage" type="text" >  </td>
					<td value='email' class = 'queryTable'>  <input type="text"name="email" >  </td>
					<td value='address' class = 'queryTable'>  <input type="text" name="address" >  </td>
					<td value='phone' class = 'queryTable'>  <input type="text"  name="phone" value = "555-555-5555" >  </td>				
				</tr>
			</table>
			<br>
			<input  name ="insertNewClinicButton" type="submit" value="add new clinic">
		
		</form> 
		
	
	
		
		
		

  
		
	<?php
		include_once 'footer/footer4.php';
	?>
	

</body>
</html>