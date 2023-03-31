<?php

/**

Update the bus schedule for a given ticket ID

@param int $ticketid The ID of the ticket to update

@param int $bussceduleid The ID of the new bus schedule to set for the ticket

@return bool Returns true if the update was successful, false otherwise
*/

function updatetrip($ticketid,$bussceduleid)

{
    require ('connection.php');
    if (!$conn) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit;
    }

        // Sanitize input values
        $ticketid = mysqli_real_escape_string($conn, $ticketid);
        $bussceduleid = mysqli_real_escape_string($conn, $bussceduleid);
        
if (empty($ticketid) or empty($bussceduleid)){
    return false;
}
$seltrip=" UPDATE ticket SET busscheid = $bussceduleid WHERE ticketid = '$ticketid'";

$seltrip=" UPDATE ticket SET busscheid = $bussceduleid WHERE ticketid = $ticketid IS NOT NULL;";
if (!$queryrun = mysqli_query($conn,$seltrip)) {
    echo "Error updating record: " . mysqli_error($conn);
    return false;
}
    // Check if any rows were affected by the update query
    if (mysqli_affected_rows($conn) > 0) {
        echo "true";
    return true;
} else {
    echo "false";
    return false;
}
}
?>