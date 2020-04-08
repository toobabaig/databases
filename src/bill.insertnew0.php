

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
	include_once 'includes/dbh.inc.php';

	$sqlBill = "select * from bill;";
	$resultBill = mysqli_query($conn, $sqlBill);
	$checkResultBill = mysqli_num_rows($resultBill);
	
	$sqlAppointment = "select * from appointment  ;";
	$resultAppointment = mysqli_query($conn, $sqlAppointment);
	$checkResultAppointment = mysqli_num_rows($resultAppointment);

?>

<br>
<br>
<div class = "middle">

<form action="bill.insertnew.php" method="post">
	choose an appointment to bill
		<select name="selectAppointment">
		 
		  
				
		<?php
			if ($resultAppointment >0){
					while ( $row = mysqli_fetch_array($resultAppointment)){
					
						$tempCID =  $row['AID'];
					
						
						echo "<option value='$tempCID'> appointment ID: $tempCID  </option>" ;					
					}				 				 
				}
		?>						
		<input  name="selectAppointmentButton" type="submit" value="Search">
		</select>
</form> 
<br>
<br>


</div>
		
	<?php
		include_once 'footer/footer4.php';
	?>
	

</body>
</html>