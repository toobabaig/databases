<?php
	include_once 'includes/dbh.inc.php';
	
	if (isset($_POST['deleteButton'])){		
		$valueEID = $_POST['EID'];
		$valueName = $_POST['name'];	
		$valueLastName = $_POST['lastName'];					
		$sqlDelete = "DELETE FROM dentist WHERE dentist.EID = $valueEID " ;
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
					
					
					if (isset($_POST['deleteButton'])){
						echo "dentist $valueEID - $valueName $valueLastName has been successfully deleted";
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