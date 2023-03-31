<?php

function paymentinfo($userid){
    require ('connection.php');

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
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $userid);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo "No Payment Info Found";
    } else {
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