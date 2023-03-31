<?php
function searchTrips($busdepart, $busarrival, $begin_locationid, $end_locationid) {

require "connection.php";
// Prepare the SQL query with placeholders for the search criteria
$sql = "SELECT * FROM busschedule WHERE busdepart=? AND busarrival=? AND begin_locationid=? AND end_locationid=?";


$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ssdd", $busdepart, $busarrival, $begin_locationid, $end_locationid);

// Execute the query and get the results
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Check if any trips were found
if (mysqli_num_rows($result) == 0) {
    echo "No trips found.";
} else {
    // Loop through the results and display each trip
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Buss ID: " . $row["busscheid"] . "<br>";
        echo "Departure time: " . $row["busdepart"] . "<br>";
        echo "Arrival time: " . $row["busarrival"] . "<br>";
        echo "Departure location: " . $row["begin_locationid"] . "<br>";
        echo "Arrival Locartion: " . $row["end_locationid"] . "<br>";
    }
}

// Close the statement
//mysqli_stmt_close($stmt);

// Close the connection
// mysqli_close($conn);
}
