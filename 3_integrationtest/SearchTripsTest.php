<?php
require "app/searchtrip.php"; // include the file that contains the searchTrips function
require "app/connection.php"; // include the file that contains the database connection

use PHPUnit\Framework\TestCase; // import the TestCase class from PHPUnit

class SearchTripsTest extends TestCase // define a test class that extends the TestCase class
{
    public function testValidSearch() // define a test method for valid search
    {
        ob_start(); // start output buffering to capture the output of the function
        searchTrips("08:00:00", "08:55:00", 1, 2); // call the searchTrips function with valid parameters
        $search_result = ob_get_clean(); // get the output of the function and clean the output buffer
        var_dump($search_result); // add this line to print the value of $search_result (useful for debugging)
        $expected_output = "Buss ID: 1<br>Departure time: 08:00:00<br>Arrival time: 08:55:00<br>Departure location: 1<br>Arrival Locartion: 2<br>"; // define the expected output of the function
        $this->assertStringContainsString($expected_output, $search_result); // use PHPUnit's assertStringContainsString method to compare the expected output with the actual output
    }

    public function testNoTripsFound() // define a test method for no trips found
    {
        ob_start(); // start output buffering to capture the output of the function
        searchTrips("09:00:00", "11:00:00", 2, 3); // call the searchTrips function with invalid parameters
        $search_result = ob_get_clean(); // get the output of the function and clean the output buffer
        $this->assertEquals('No trips found.', $search_result); // use PHPUnit's assertEquals method to compare the expected output with the actual output
    }

    public function testInvalidLocationIds() // define a test method for invalid location IDs
    {
        ob_start(); // start output buffering to capture the output of the function
        searchTrips("09:00:00", "11:00:00", "invalid", "location"); // call the searchTrips function with invalid parameters
        $search_result = ob_get_clean(); // get the output of the function and clean the output buffer
        $this->assertEquals('No trips found.', $search_result); // use PHPUnit's assertEquals method to compare the expected output with the actual output
    }

    public function testInvalidTimeFormat() // define a test method for invalid time format
    {
        ob_start(); // start output buffering to capture the output of the function
        searchTrips("9:00", "11:00", 1, 2); // call the searchTrips function with invalid parameters
        $search_result = ob_get_clean(); // get the output of the function and clean the output buffer
        $this->assertEquals('No trips found.', $search_result); // use PHPUnit's assertEquals method to compare the expected output with the actual output
    }

    public function testEmptyParameters() // define a test method for empty parameters
    {
        ob_start(); // start output buffering to capture the output of the function
        searchTrips("", "", "", ""); // call the searchTrips function with empty parameters
        $search_result = ob_get_clean();
        $this->assertEquals('No trips found.', $search_result);
    }


}

?>