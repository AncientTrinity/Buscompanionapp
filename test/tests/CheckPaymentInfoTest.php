<?php
require "app/checkpaymentinfo.php";
require "app/connection.php";

use PHPUnit\Framework\TestCase;
class CheckPaymentInfoTest extends TestCase
{
    public function testValidUserId()
    {
        $expected_result = "Ticket ID: 1<br>first Name: victor<br>Seat Name: School bus<br>Begin Location: Belmopan<br>Begin depart: 09:00:00<br>Cost: 0<br>";
        ob_start();
        paymentinfo(1);
        $actual_result = ob_get_clean();
        var_dump($actual_result);
        $this->assertEquals($expected_result, $actual_result);
    }
    public function testInvalidUserId()
    {

        $expected_result = "No Payment Info Found";
        ob_start();
        paymentinfo(1000);
        $actual_result = ob_get_clean();

        $this->assertEquals($expected_result, $actual_result);
    }
    public function testNoPaymentForUser()
    {

        $expected_result = "No Payment Info Found";
        ob_start();
        paymentinfo(2);
        $actual_result = ob_get_clean();

        $this->assertEquals($expected_result, $actual_result);
    }
    public function testNullUserId(){
        $expected_result = "No Payment Info Found";
        ob_start();
        paymentinfo(0);
        $actual_result = ob_get_clean();

        $this->assertEquals($expected_result, $actual_result);

    }
    }
?>