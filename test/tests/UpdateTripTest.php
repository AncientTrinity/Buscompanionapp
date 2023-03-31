<?php
require "app/updatetrip.php";
require "app/connection.php";

use PHPUnit\Framework\TestCase;
class UpdateTripTest extends TestCase{

public function testValidInput()
{
    $ticketid = 1;
    $busscheduleid = 1;
    $actual_result = updatetrip($ticketid, $busscheduleid);
    var_dump($actual_result);
    $expected_result = true;

    $this->assertEquals($expected_result, $actual_result);
}
public function testInvalidBusScheduleId()
{
    $ticketid = 1;
    $busscheduleid = '';
    $actual_result = updatetrip($ticketid, $busscheduleid);
    var_dump($actual_result);
    $expected_result = false;

    $this->assertEquals($expected_result, $actual_result);
}
public function testInvalidId()
{
    $ticketid = '';
    $busscheduleid = 5;
    $actual_result = updatetrip($ticketid, $busscheduleid);
    var_dump($actual_result);
    $expected_result = false;

    $this->assertEquals($expected_result, $actual_result);
}

}

?>