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

function testSearchTrips() {
    // Test case 1: Search for a valid trip
    $expected_output = "Buss ID: 1<br>Departure time: 08:00:00<br>Arrival time: 08:55:00<br>Departure location: 1<br>Arrival Locartion: 2<br>";
    ob_start();
    searchTrips("08:00:00", "08:55:00", 1, 2);
    $output = ob_get_clean();
    if ($output != $expected_output) {
        echo "Test case 1 failed. Expected: $expected_output, actual: $output.<br>";
    } else {
        echo "Test case 1 passed.<br>";
    }

   // ob_clean(); // Clear the output buffer before running the next test case

    // Test case 2: Search for a trip that does not exist
    $expected_output = "No trips found.";
    ob_start();
    searchTrips("09:00:00", "11:00:00", 2, 3);
    $output = ob_get_clean();
    if ($output != $expected_output) {
        echo "Test case 2 failed. Expected: $expected_output, actual: $output.<br>";
    } else {
        echo "Test case 2 passed.<br>";
    }

   // ob_clean(); // Clear the output buffer before running the next test case

    // Test case 3: Search using invalid location IDs
    $expected_output = "No trips found.";
    ob_start();
    searchTrips("09:00:00", "11:00:00", "invalid", "location");
    $output = ob_get_clean();
    if ($output != $expected_output) {
        echo "Test case 3 failed. Expected: $expected_output, actual: $output.<br>";
    } else {
        echo "Test case 3 passed.<br>";
    }

    echo "All test cases completed.";
}


echo testSearchTrips();
?>
