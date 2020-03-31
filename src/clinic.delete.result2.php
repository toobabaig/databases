<?php
	include_once 'includes/dbh.inc.php';
	
	if (isset($_POST['deleteClinicButton'])){		
		$valueCID = $_POST['CID'];
		$valueCName = $_POST['clinicName'];						
		$sqlDelete = "DELETE FROM clinic WHERE clinic.CID = $valueCID " ;
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
					
					
					if (isset($_POST['deleteClinicButton'])){
						echo "clinic:  $valueCID - $valueCName has been successfully deleted";
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