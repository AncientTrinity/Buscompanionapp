<?php
require "app/edituserinfo.php"; // includes the code for the edithprofile function
require "app/connection.php"; // includes the code for the database connection

use PHPUnit\Framework\TestCase; // includes the necessary TestCase class for testing

class EditUserProfileTest extends TestCase
{
    public function testUpdateUserInfoWithValidInput()
    {
        $userid = 1; // sets the user ID to be updated
        $fname = 'Adaasddsfsfaadsdasdsd'; // sets the first name to be updated
        $lname = 'Adasdssadsfsdasddadasaadad'; // sets the last name to be updated
        $phone = '4443333844'; // sets the phone number to be updated
        $address = '12sas333add3 Mawdadain St.'; // sets the address to be updated
        $expected_result = true; // sets the expected result to be true, indicating that the update was successful
        
        $actual_result = edithprofile($userid, $fname, $lname, $phone, $address); // calls the function with the input parameters
        
        $this->assertEquals($expected_result, $actual_result); // asserts that the expected and actual outputs are equal
    }
  
    public function testUpdateUserInfoWithEmptyFirstName()
    {
        $userid = 1; // sets the user ID to be updated
        $fname = ''; // sets the first name to be empty
        $lname = 'Doe'; // sets the last name to be updated
        $phone = '1234567890'; // sets the phone number to be updated
        $address = '123 Main St.'; // sets the address to be updated
        $expected_result = false; // sets the expected result to be false, indicating that the update was not successful
        
        $actual_result = edithprofile($userid, $fname, $lname, $phone, $address); // calls the function with the input parameters
        
        $this->assertEquals($expected_result, $actual_result); // asserts that the expected and actual outputs are equal
    }
  
    public function testUpdateUserInfoWithInvalidUserId()
    {
        $userid = 'invalid'; // sets an invalid user ID
        $fname = 'John'; // sets the first name to be updated
        $lname = 'Doe'; // sets the last name to be updated
        $phone = '1234567890'; // sets the phone number to be updated
        $address = '123 Main St.'; // sets the address to be updated
        $expected_result = false; // sets the expected result to be false, indicating that the update was not successful
        
        $actual_result = edithprofile($userid, $fname, $lname, $phone, $address); // calls the function with the input parameters
        
        $this->assertEquals($expected_result, $actual_result); // asserts that the expected and actual outputs are equal
    }
  
    public function testUpdateUserInfoWithInvalidPhoneNumber()
    {
        $userid = null; // sets the user ID to be null
        $fname = 'John'; // sets the first name to be updated
        $lname = 'Doe'; // sets the last name to be updated
        $phone = 'invalid'; // sets an invalid phone number
        $address = '123 Main St.'; // sets the address to be updated
        $expected_result = false; // sets the expected result to be false, indicating that the update was not successful
        
        $actual_result = edithprofile($userid, $fname, $lname, $phone, $address); // calls the function with the input parameters
        
        $this->assertEquals($expected_result, $actual_result);
    }
}

?>