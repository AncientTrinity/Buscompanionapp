<?php

/**

Retrieves payment information for a given user ID
This function retrieves payment information for a given user ID from the database.
The user ID is passed as a parameter to the function. The function connects to the database
using the 'connection.php' file, and runs a SELECT query on the ticket, busschedule,
locationofstop, seat, and userinfo tables. It fetches data from these tables and displays it
on the web page. If no payment information is found for the user, the function displays a
message saying so.
@param int $userid The ID of the user for whom to retrieve payment information.
@return void
*/

function paymentinfo($userid){
    require ('connection.php');

// SQL query to retrieve payment information for the user
    $query = "SELECT T.ticketid, UI.fname,S.seattype,LS.location,BS.busdepart,BS.cost
    From ticket T 
    JOIN busschedule as BS 
    ON BS.busscheid = T.busscheid 
    JOIN locationofstop AS LS 
    ON BS.begin_locationid = LS.stoplocid 
    JOIN locationofstop AS L
    ON BS.end_locationid = L.stoplocid 
    JOIN seat AS S ON T.seatid = S.seatid 
    JOIN userinfo as UI 
    ON T.userid = UI.userid 
    WHERE UI.userid = ?";
    
    // prepare the SQL query
    $stmt = $conn->prepare($query);
    // bind the user ID parameter to the query
    $stmt->bind_param("i", $userid);
    // execute the query
    $stmt->execute();
    // get the result set
    $result = $stmt->get_result();
    // check if any payment information was found for the user
    if ($result->num_rows === 0) {
        echo "No Payment Info Found";
    } else {
         // display payment information for the user
        while ($row = $result->fetch_assoc()) {
            echo "Ticket ID: " . $row["ticketid"] . "<br>";
            echo "first Name: " . $row["fname"] . "<br>";
            echo "Seat Name: " . $row["seattype"] . "<br>";
            echo "Begin Location: " . $row["location"] . "<br>";
            echo "Begin depart: " . $row["busdepart"] . "<br>";;
            echo "Cost: " . $row["cost"] . "<br>";
        }
    }
}
?>