<?php
require "app/searchtrip.php";
require "app/connection.php";

use PHPUnit\Framework\TestCase;

class SearchTripsTest extends TestCase
{
    public function testValidSearch()
    {
        ob_start();
        searchTrips("08:00:00", "08:55:00", 1, 2);
        $search_result = ob_get_clean();
        var_dump($search_result); // add this line to print the value of $search_result
        $expected_output = "Buss ID: 1<br>Departure time: 08:00:00<br>Arrival time: 08:55:00<br>Departure location: 1<br>Arrival Locartion: 2<br>";
        $this->assertStringContainsString($expected_output, $search_result);
    }

  public function testNoTripsFound()
    {
        ob_start();
        searchTrips("09:00:00", "11:00:00", 2, 3);
        $search_result = ob_get_clean();
        $this->assertEquals('No trips found.', $search_result);
    }

    
    public function testInvalidLocationIds()
    {
        
        ob_start();
        searchTrips("09:00:00", "11:00:00", "invalid", "location");
        $search_result = ob_get_clean();
        $this->assertEquals('No trips found.', $search_result);
    }

    public function testInvalidTimeFormat()
    {
        ob_start();
        searchTrips("9:00", "11:00", 1, 2);
        $search_result = ob_get_clean();
        $this->assertEquals('No trips found.', $search_result);
    }

    public function testEmptyParameters()
    {
        ob_start();
        searchTrips("", "", "", "");
        $search_result = ob_get_clean();
        $this->assertEquals('No trips found.', $search_result);
    }


}

?>