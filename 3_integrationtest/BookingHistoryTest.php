<?php
require "app/bookinghistory.php";  // includes the code for the bookinghistoryfunction
require "app/connection.php";      // includes the code for the database connection

use PHPUnit\Framework\TestCase;    // includes the necessary TestCase class for testing

class BookingHistoryTest extends TestCase {

    public function testValidUserIdWithHistory() {
        $userid = "1";                          // sets the user ID
        ob_start();                             // starts output buffering
        bookinghistory($userid);                // calls the function with the user ID
        $actual_result = ob_get_clean();        // retrieves the output and cleans the output buffer
        $expected_result = "Ticket ID: 1<br>first Name: victor<br>Seat Name: School bus<br>Begin Location: Belmopan<br>Begin depart: 09:00:00<br>Cost: 0<br>"; // expected output
        $this->assertEquals($expected_result, $actual_result);  // asserts that the expected and actual outputs are equal
    }

    
    public function testInvalidUserIdNonExistent() {
        $userid = "5678";                       // sets a non-existent user ID
        ob_start();                             // starts output buffering
        bookinghistory($userid);                // calls the function with the user ID
        $actual_result = ob_get_clean();        // retrieves the output and cleans the output buffer
        $expected_result = "No Book History With This User Found"; // expected output
        $this->assertEquals($expected_result, $actual_result);  // asserts that the expected and actual outputs are equal
    }
    
    public function testInvalidUserIdEmptyString() {
        $userid = "";                           // sets an empty string user ID
        ob_start();                             // starts output buffering
        bookinghistory($userid);                // calls the function with the user ID
        $actual_result = ob_get_clean();        // retrieves the output and cleans the output buffer
        $expected_result = "No Book History With This User Found"; // expected output
        $this->assertEquals($expected_result, $actual_result);  // asserts that the expected and actual outputs are equal
    }
}

?>