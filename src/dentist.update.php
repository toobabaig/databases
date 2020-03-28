<?php
	include_once 'includes/dbh.inc.php';

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
		
		
		
	
		
	<div class = "middle">
		<form action="dentist.update.result.php" method="post">
			select dentist to update:
			<select name="selectDentist1">
			  <option value="choose" selected="selected" >-- choose dentist --</option>	
	<?php	
		
			if ($checkResultDentist >0){
					while ( $row = mysqli_fetch_array($resultDentist)){
					
						$temp1 =  $row['EID'];
						$temp2 =  $row['name'];
						
						echo "<option value='$temp1'> $temp1 - $temp2   </option>" ;					
					}				 				 
				}	
	?>				
				<input  type="submit" value="Search">
			</select>
		</form>
	</div>
		
	
		
		
		
		
	<?php
		include_once 'footer/footer5.php';
	?>
	

</body>
</html>