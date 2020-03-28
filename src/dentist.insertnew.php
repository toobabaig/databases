<?php
	include_once 'includes/dbh.inc.php';
	
	$sqlClinic = "select * from clinic;";
	$resultClinic = mysqli_query($conn, $sqlClinic);
	$checkResultClinic = mysqli_num_rows($resultClinic);
	
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
		<form action="dentist.insertnew.result.php" method = "post">
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
					<tr class = 'queryTable'>
					<td value='EID' class = 'queryTable'>auto generated</td>
					<td value='clinicID' class = 'queryTable'>  
						<select name="clinicSelect">
						  					  
							 <?php
							if ($checkResultClinic >0){
									while ( $row = mysqli_fetch_array($resultClinic)){								
										$tempCID =  $row['CID'];
										$tempCName =  $row['clinicName'];
										
										echo "<option value='$tempCID'> $tempCID - $tempCName   </option>" ;																	}														 
								}
							?>												 
						</select>
				
					</td>
					<td value='SIN' class = 'queryTable'>  <input type="text"  name="SIN" >  </td>
					<td value='gender' class = 'queryTable'>  
					
						<select name="genderSelect">
						  <option value="M">M</option>
						  <option value="F">F</option>
						</select>
					</td>
					<td value='address' class = 'queryTable'>  <input type="text"  name="address" >  </td>
					<td value='name' class = 'queryTable'>  <input type="text"name="name" >  </td>
					<td value='lastName' class = 'queryTable'>  <input type="text" name="lastName" >  </td>
					<td value='phone' class = 'queryTable'>  <input type="text"  name="phone" value = "555-555-5555" >  </td>
					<td value='email' class = 'queryTable'>  <input type="text" name="email" > </td>
					<td value='availability' class = 'queryTable'>  

					<select name="availabilitySelect">
						  <option value="full time">full time</option>
						  <option value="part time">part time</option>
						   <option value="vacation">vacation</option>
						</select>

					</td>
				</tr>
			</table>
			<br>
			<input type="submit" value="add new dentist">
		
		</form> 
		
	
	
		
		
		

  
		
	<?php
		include_once 'footer/footer4.php';
	?>
	

</body>
</html>