<?php 
function bookinghistory($userid) {
    require ('connection.php');

    $seltrip="SELECT T.ticketid, UI.fname,S.seattype,LS.location,BS.busdepart,BS.cost
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

    $queryrun=mysqli_prepare($conn,$seltrip);
    $queryrun->bind_param('s', $userid);
    $queryrun->execute();
    $result=$queryrun->get_result();

    if(mysqli_num_rows($result)==0){
        echo "No Book History With This User Found";    //test cases query runs

    }else{

        while($row = mysqli_fetch_assoc($result)){
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