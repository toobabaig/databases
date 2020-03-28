<?php
	include_once 'includes/dbh.inc.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php
	$sql = "select * from dentist;";
	$result = mysqli_query($conn, $sql);
	$checkResult = mysqli_num_rows($result);

	if ($checkResult >0){
		while ( $row = mysqli_fetch_assoc($result)){
			echo "employee ID: " . $row['EID'] . " " ;
			echo "clinic ID: " . $row['clinicID'] . " " ;
			echo "SIN: " . $row['SIN'] . "<br>";
		}
	}
?>

</body>
</html>