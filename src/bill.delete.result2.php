<?php
	include_once 'includes/dbh.inc.php';
	
	if (isset($_POST['deleteBilltButton'])){		
		$valueBID= $_POST['BID'];					
		$sqlDelete = "DELETE FROM bill WHERE BID = $valueBID " ;
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
					
					
					if (isset($_POST['deleteBilltButton'])){
						echo "appointment:  $valueBID has been successfully deleted";
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