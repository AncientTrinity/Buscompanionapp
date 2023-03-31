<?php
require "app/edituserinfo.php";
require "app/connection.php";

use PHPUnit\Framework\TestCase;
class EditUserProfileTest extends TestCase
{
    public function testUpdateUserInfoWithValidInput()
    {
        $userid = 1;
        $fname = 'Adaasddsfsfaadsdasdsd';
        $lname = 'Adasdssadsfsdasddadasaadad';
        $phone = '4443333844';
        $address = '12sas333add3 Mawdadain St.';
        $expected_result = true;
        
        $actual_result = edithprofile($userid, $fname, $lname, $phone, $address);
        
        $this->assertEquals($expected_result, $actual_result);
    }
  
    public function testUpdateUserInfoWithEmptyFirstName()
    {
        $userid = 1;
        $fname = '';
        $lname = 'Doe';
        $phone = '1234567890';
        $address = '123 Main St.';
        $expected_result = false;
        
        $actual_result = edithprofile($userid, $fname, $lname, $phone, $address);
        
        $this->assertEquals($expected_result, $actual_result);
    }
  
    public function testUpdateUserInfoWithInvalidUserId()
    {
        $userid = 'invalid';
        $fname = 'John';
        $lname = 'Doe';
        $phone = '1234567890';
        $address = '123 Main St.';
        $expected_result = false;
        
        $actual_result = edithprofile($userid, $fname, $lname, $phone, $address);
        
        $this->assertEquals($expected_result, $actual_result);
    }
  
    public function testUpdateUserInfoWithInvalidPhoneNumber()
    {
        $userid = null;
        $fname = 'John';
        $lname = 'Doe';
        $phone = 'invalid';
        $address = '123 Main St.';
        $expected_result = false;
        
        $actual_result = edithprofile($userid, $fname, $lname, $phone, $address);
        
        $this->assertEquals($expected_result, $actual_result);
    }
}

?>