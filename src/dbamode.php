

<!DOCTYPE html>
<html>
<head>
	<?php
		include_once 'head/head.php';
	?>
</head>
<body>
	
<?php

	
?>

<br>
<br>
<div class = "middle">


	<textarea id="w3mission" rows="15" cols="70">enter sql here</textarea>
	<br>
	<form   action  = "dbamode.result.php" method = "post" >
		please select table you are querying (only select all * info for now)  
		<select name = "table">
		
			<option value='appointment' selected='selected'> appointment</option>
			<option value='bill' selected='selected'> bill</option>
			<option value='clinic' selected='selected'> clinic</option>
			<option value='dentalAssistant' selected='selected'> dentalAssistant</option>
			<option value='dentalAssistant' selected='selected'> dentalAssistant</option>
			<option value='dentist' selected='selected'> dentist</option>
			<option value='patient' selected='selected'> patient</option>
			<option value='receptionist' selected='selected'> receptionist</option>
			<option value='treatment' selected='selected'> treatment</option>
									
		</select>
	<input name = "submitSqlButton"type= "submit">
	<br><br>



</div>
		
	<?php
		include_once 'footer/footer7.php';
	?>
	

</body>
</html>