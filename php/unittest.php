<?php
use PHPUnit\Framework\TestCase;

class SearchTripsTest extends TestCase
{
    public function testValidSearch()
    {
        $search_result = searchTrips("10:00:00", "12:00:00", 1, 2);
        $this->assertStringContainsString('Buss ID', $search_result);
    }

    public function testNoTripsFound()
    {
        $search_result = searchTrips("09:00:00", "11:00:00", 2, 3);
        $this->assertEquals('No trips found.', $search_result);
    }

    public function testInvalidLocationIds()
    {
        $this->expectWarning();
        searchTrips("09:00:00", "11:00:00", "invalid", "location");
    }

    public function testInvalidTimeFormat()
    {
        $this->expectWarning();
        searchTrips("9:00", "11:00", 1, 2);
    }

    public function testEmptyParameters()
    {
        $this->expectWarning();
        searchTrips("", "", "", "");
    }
}
