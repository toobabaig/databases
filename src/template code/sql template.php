	
sql connect and results--------

	$sqlPatient = "select * from patient;";
	$resultPatient = mysqli_query($conn, $sqlPatient);
	$checkResultPatient = mysqli_num_rows($resultPatient);

	$sqlDentist = "select * from dentist;";
	$resultDentist = mysqli_query($conn, $sqlDentist);
	$checkResultDentist = mysqli_num_rows($resultDentist);
	
	$sqlDentalAssistant= "select * from dentalAssistant;";
	$resultDentalAssistant = mysqli_query($conn, $sqlDentalAssistant);
	$checkResultDentalAssistant = mysqli_num_rows($resultDentalAssistant);
	
	$sqlReceptionist = "select * from receptionist;";
	$resultReceptionist = mysqli_query($conn, $sqlReceptionist);
	$checkResultReceptionist = mysqli_num_rows($resultReceptionist);
		
	$sqlClinic = "select * from clinic;";
	$resultClinic = mysqli_query($conn, $sqlClinic);
	$checkResultClinic = mysqli_num_rows($resultClinic);
	
	$sqlAppointment = "select * from appointment where AID = $inputAppointment ;";
	$resultAppointment = mysqli_query($conn, $sqlAppointment);
	$checkResultAppointment = mysqli_num_rows($resultAppointment);

	$sqlBill = "select * from bill;";
	$resultBill = mysqli_query($conn, $sqlBill);
	$checkResultBill = mysqli_num_rows($resultBill);

	$sqlTemp = "select * from treatment  where TID = $temp7;";
	$resultTemp = mysqli_query($conn, $sqlTemp);
	$checkResultTemp = mysqli_num_rows($resultTemp);

	$sqlTemp = "select * from treatment  where TID = $temp7;";
	$resultTemp = mysqli_query($conn, $sqlTemp);
	$checkResultTemp = mysqli_num_rows($resultTemp);

sql output---

if ($checkResultDentist >0){
	while ( $row = mysqli_fetch_array($resultDentist)){
					
	$tempID =  $row['EID'];
	$tempName =  $row['name'];
	$templastName =  $row['lastName'];
	echo "<option value='$tempID'> $tempID - $tempName $templastName  </option>" ;					
	}				 				 
}