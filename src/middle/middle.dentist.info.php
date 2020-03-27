

<?php
	include_once 'includes/dbh.inc.php';

	$sqlDentist = "select * from dentist;";
	$resultDentist = mysqli_query($conn, $sqlDentist);
	$checkResultDentist = mysqli_num_rows($resultDentist);
	
	$sqlClinic = "select * from clinic;";
	$resultClinic = mysqli_query($conn, $sqlClinic);
	$checkResultClinic = mysqli_num_rows($resultClinic);
	
?>

<br>
<br>
<div class = "middle">

<form action="dentist.getinfo.result.php" method="post">
	Get all dentist from 
		<select name="selectClinic1">
		  <option value="choose" selected="selected" >-- choose clinic --</option>
		  <option value="*">all clinic</option>
		
		
		<?php
			if ($checkResultClinic >0){
					while ( $row = mysqli_fetch_array($resultClinic)){
					
						$tempCID =  $row['CID'];
						$tempCName =  $row['clinicName'];
						
						echo "<option value='$tempCID'> $tempCID - $tempCName   </option>" ;
					
					}
				 
				 
				}
		?>
			
			
		<input  type="submit" value="Search">
		</select>
</form> 
<br>
<br>
<form action="dentist.getinfo.result.php" method="post">
	Get all info on dentist 
		<select  name="selectDentist1">
	  <option value="choose" selected="selected" >-- choose dentist --</option>
	  <option value="*">all dentist</option>
	  
	  
		<?php
			if ($checkResultDentist >0){
					while ( $row = mysqli_fetch_array($resultDentist)){
					
						$tempID =  $row['EID'];
						$tempName =  $row['name'];
						$templastName =  $row['lastName'];
						echo "<option value='$tempID'> $tempID - $tempName $templastName  </option>" ;
					
					}
				 
				 
				}
		?>
	  
	  <input type="submit" value="Search">
	</select>
</form> 

</div>