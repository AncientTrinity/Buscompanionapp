<?php 

// Please Refer to the Booking History Section in the PDF.
/**

This function retrieves the booking history for a given user by querying the database.

It displays the ticket ID, user's first name, seat type, begin location, begin depart time, and cost for each booking.

@param int $userid The ID of the user for whom the booking history will be retrieved.

@return void The function does not return anything, but it displays the booking history information for the user.
*/
function bookinghistory($userid) {
    require ('connection.php');
    // Select the relevant information from the ticket, busschedule, locationofstop, seat, and userinfo tables
// based on the user's ID

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

    // Prepare and execute the SQL query with the user ID as a parameter
    $queryrun=mysqli_prepare($conn,$seltrip);
    $queryrun->bind_param('s', $userid);
    $queryrun->execute();
    // Get the results of the query
    $result=$queryrun->get_result();

    // If no booking history is found for the user, display an error message
    if(mysqli_num_rows($result)==0){
        echo "No Book History With This User Found";    //test cases query runs

    }else{
        // Otherwise, display the booking history information for the user

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