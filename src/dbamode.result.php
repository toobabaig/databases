

<!DOCTYPE html>
<html>
<head>
	<?php
		include_once 'includes/dbh.inc.php';
		include_once 'head/head.php';
	
	?>
</head>
<body>
	
<?php

	
?>

<br>
<br>
<div class = "middle">
	
		<?php
		
			if (isset($_POST['submitSqlButton'])){	
				$table = $_POST['table'];	
				$sqlColumn = "SHOW COLUMNS FROM $table;";
				$resultColumn= mysqli_query($conn, $sqlColumn);
				$checkResultColumn= mysqli_num_rows($resultColumn);
				
				$sqlQuery = "select * from $table;";
				$resultQuery= mysqli_query($conn, $sqlQuery);
				$checkResultQuery = mysqli_num_rows($resultQuery);
		?>	
		<table class = 'queryTable'>
			<tr class = 'queryTable'>
			<?php					
				if ($checkResultColumn>0){
					while ( $row = mysqli_fetch_array($resultColumn)){
						$tempField = $row["Field"];
						echo "<th class = 'queryTable'>$tempField</th>";

					}
				}
			}
			?>					
			</tr>
			<tr>
				<?php 					
					while ( $row = mysqli_fetch_array($resultQuery)){			
						$resultColumn= mysqli_query($conn, $sqlColumn);
						$initialCol = mysqli_fetch_array($resultColumn);
						$tempValue = $row[$initialCol];
							if ($checkResultColumn>0){
								while ( $row = mysqli_fetch_array($resultColumn)){
									$tempCol = $row["field"];
									echo "<td class = 'queryTable'>$tempValue</td>";

								}
							}
							
					}
				
				
				?>
			</tr>
		</table>
	

		<br><br>
</div>
		
	<?php
		include_once 'footer/footer7.php';
	?>
	

</body>
</html>