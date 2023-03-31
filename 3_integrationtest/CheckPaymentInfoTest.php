<?php
require "app/checkpaymentinfo.php"; // includes the code for the checkpaymentinfo function
require "app/connection.php"; // includes the code for the database connection

use PHPUnit\Framework\TestCase; // includes the necessary TestCase class for testing

class CheckPaymentInfoTest extends TestCase
{
    public function testValidUserId()
    {
        $expected_result = "Ticket ID: 1<br>first Name: victor<br>Seat Name: School bus<br>Begin Location: Belmopan<br>Begin depart: 09:00:00<br>Cost: 0<br>"; // expected output
        ob_start(); // starts output buffering
        paymentinfo(1); // calls the function with the user ID
        $actual_result = ob_get_clean(); // retrieves the output and cleans the output buffer
        var_dump($actual_result); // prints the actual result for debugging purposes
        $this->assertEquals($expected_result, $actual_result); // asserts that the expected and actual outputs are equal
    }

    public function testInvalidUserId()
    {
        $expected_result = "No Payment Info Found"; // expected output
        ob_start(); // starts output buffering
        paymentinfo(1000); // calls the function with a non-existent user ID
        $actual_result = ob_get_clean(); // retrieves the output and cleans the output buffer
        $this->assertEquals($expected_result, $actual_result); // asserts that the expected and actual outputs are equal
    }

    public function testNoPaymentForUser()
    {
        $expected_result = "No Payment Info Found"; // expected output
        ob_start(); // starts output buffering
        paymentinfo(2); // calls the function with a user ID with no payment info
        $actual_result = ob_get_clean(); // retrieves the output and cleans the output buffer
        $this->assertEquals($expected_result, $actual_result); // asserts that the expected and actual outputs are equal
    }

    public function testNullUserId()
    {
        $expected_result = "No Payment Info Found"; // expected output
        ob_start(); // starts output buffering
        paymentinfo(0); // calls the function with a null user ID
        $actual_result = ob_get_clean(); // retrieves the output and cleans the output buffer
        $this->assertEquals($expected_result, $actual_result); // asserts that the expected and actual outputs are equal
    }
}
?>