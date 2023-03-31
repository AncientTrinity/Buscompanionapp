<?php
// import the necessary files
require "app/updatetrip.php";
require "app/connection.php";

// import the PHPUnit testing framework
use PHPUnit\Framework\TestCase;

// create a class called UpdateTripTest that extends the TestCase class
class UpdateTripTest extends TestCase{

    // create a test method called testValidInput
    public function testValidInput()
    {
        // set the values for the ticketid and busscheduleid variables
        $ticketid = 1;
        $busscheduleid = 1;

        // call the updatetrip function with the ticketid and busscheduleid values and store the result in $actual_result
        $actual_result = updatetrip($ticketid, $busscheduleid);

        // output the result of the function call
        var_dump($actual_result);

        // set the expected result
        $expected_result = true;

        // assert that the expected result matches the actual result
        $this->assertEquals($expected_result, $actual_result);
    }

    // create a test method called testInvalidBusScheduleId
    public function testInvalidBusScheduleId()
    {
        // set the values for the ticketid and busscheduleid variables
        $ticketid = 1;
        $busscheduleid = '';

        // call the updatetrip function with the ticketid and busscheduleid values and store the result in $actual_result
        $actual_result = updatetrip($ticketid, $busscheduleid);

        // output the result of the function call
        var_dump($actual_result);

        // set the expected result
        $expected_result = false;

        // assert that the expected result matches the actual result
        $this->assertEquals($expected_result, $actual_result);
    }

    // create a test method called testInvalidId
    public function testInvalidId()
    {
        // set the values for the ticketid and busscheduleid variables
        $ticketid = '';
        $busscheduleid = 5;

        // call the updatetrip function with the ticketid and busscheduleid values and store the result in $actual_result
        $actual_result = updatetrip($ticketid, $busscheduleid);

        // output the result of the function call
        var_dump($actual_result);

        // set the expected result
        $expected_result = false;

        // assert that the expected result matches the actual result
        $this->assertEquals($expected_result, $actual_result);
    }

}

?>