<?php
require "app/bookinghistory.php";
require "app/connection.php";

use PHPUnit\Framework\TestCase;

class BookingHistoryTest extends TestCase {

    public function testValidUserIdWithHistory() {
        $userid = "1";
        ob_start();
        bookinghistory($userid);
        $actual_result = ob_get_clean();
        $expected_result = "Ticket ID: 1<br>first Name: victor<br>Seat Name: School bus<br>Begin Location: Belmopan<br>Begin depart: 09:00:00<br>Cost: 0<br>";
        $this->assertEquals($expected_result, $actual_result);
    }
    public function testInvalidUserIdNonExistent() {
        $userid = "5678";
        ob_start();
        bookinghistory($userid);
        $actual_result = ob_get_clean();
        $expected_result = "No Book History With This User Found";
        $this->assertEquals($expected_result, $actual_result);
    }
    public function testInvalidUserIdEmptyString() {
        $userid = "";
        ob_start();
        bookinghistory($userid);
        $actual_result = ob_get_clean();
        $expected_result = "No Book History With This User Found";
        $this->assertEquals($expected_result, $actual_result);
    }
}

?>