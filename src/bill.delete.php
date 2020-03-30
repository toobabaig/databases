

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
	
?>

<br>
<br>
<div class = "middle">

<form action="bill.delete.result.php" method="post">
	choose bill to delete
		<select name="selectBill">
		
		 
				
		<?php
			if ($checkResultBill >0){
					while ( $row = mysqli_fetch_array($resultBill)){
					
						$tempCID =  $row['BID'];
						
						
						echo "<option value='$tempCID'> $tempCID    </option>" ;					
					}				 				 
				}
		?>						
		<input  name="selectBillButton" type="submit" value="Search">
		</select>
</form> 
<br>
<br>


</div>
		
	<?php
		include_once 'footer/footer6.php';
	?>
	

</body>
</html>