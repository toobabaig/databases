
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
		
		<form action="/action_page.php">
		<table class = 'queryTable'>
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
													
				<tr class = 'queryTable'>
				<td value='$temp1' class = 'queryTable'> auto generated  </td>
				<td value='$temp2' class = 'queryTable'> <input type="text" id="generalDentist" name="generalDentist" >  </td>
				<td value='$temp3' class = 'queryTable'> <input type="text" id="clinicName" name="clinicName" >  </td>
				<td value='$temp3' class = 'queryTable'> <input type="text" id="openingHours" name="openingHours" >  </td>
				<td value='$temp5' class = 'queryTable'> <input type="text" id="webpage" name="webpage" >  </td>
				<td value='$temp6' class = 'queryTable'> <input type="text" id="email" name="email" >  </td>
				<td value='$temp7' class = 'queryTable'> <input type="text" id="address" name="address" >  </td>
				<td value='$temp8' class = 'queryTable'> <input type="text" id="phone" name="phone" >  </td>

				</tr>
				
								 
			</table>
			<br>
			<input type="submit" value="add new dentist">
		
		</form> 
		
	
	
		
		
		

  
		
	<?php
		include_once 'footer/footer3.php';
	?>
	

</body>
</html>