<?php
	include_once 'includes/dbh.inc.php';
	
	if (isset($_POST['deleteAppointmentButton'])){		
		$valueAID = $_POST['AID'];					
		$sqlDelete = "DELETE FROM appointment WHERE AID = $valueAID " ;
		mysqli_query($conn, $sqlDelete);	
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
		
			<div class = "middle">
				<?php						
					
					
					if (isset($_POST['deleteAppointmentButton'])){
						echo "appointment:  $valueAID has been successfully deleted";
					}else{
						echo "error: delete canceled";
					}
				?>
			</div>
	<?php
		include_once 'footer/footer4.php';
	?>
	

</body>
</html>