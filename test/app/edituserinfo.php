<?php 

function edithprofile($userid,$fname,$lname,$phone,$address)
{
    require ('connection.php');

    // Check if connection to database is successful
    if (!$conn) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit;
    }

    // Sanitize input values
    $userid = mysqli_real_escape_string($conn, $userid);
    $fname = mysqli_real_escape_string($conn, $fname);
    $lname = mysqli_real_escape_string($conn, $lname);
    $phone = mysqli_real_escape_string($conn, $phone);
    $address = mysqli_real_escape_string($conn, $address);
	if (empty($userid) or empty($fname) or empty($lname) or empty($phone) or empty($address)){
    return false;
}

    // Prepare and execute update query
    $updatequery = "UPDATE userinfo SET fname='$fname',lname='$lname',address='$address',phonenumber='$phone' WHERE userid='$userid'";
	
	$udatequery="UPDATE userinfo SET fname='$fname',lname='$lname',address='$address',phone='$phone' WHERE userid='$userid' IS NOT NULL;";
    if (!$queryrun = mysqli_query($conn,$updatequery)) {
        echo "Error updating record: " . mysqli_error($conn);
        return false;
    }

    // Check if any rows were affected by the update query
    if (mysqli_affected_rows($conn) > 0) {
			echo "true";
        return true;
    } else {
		echo "fasle";
        return false;
    }
}



?>