<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     
    $name = $_POST['name'];
    $fatherName = $_POST['fatherName'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $tripDate = $_POST['dob'];
    $peopleCount = $_POST['howmanypeople'];
    $hostelOption = $_POST['hostel'];
    $contactMethod = $_POST['department'];
  
    if (empty($name) || empty($email) || empty($phoneNumber)) {
        die('Please fill in all required fields.');
    }

   
    $to = 'owner@example.com';
    $subject = 'New Booking Submission';
    $message = "Name: $name\nFather's Name: $fatherName\nPhone Number: $phoneNumber\nEmail: $email\nGender: $gender\nTrip Date: $tripDate\nPeople Count: $peopleCount\nHostel Option: $hostelOption\nContact Method: $contactMethod";
    
    $headers = "From: $email\r\n";
    if (mail($to, $subject, $message, $headers)) {
        header('Location: confirmation.html');
        exit;
    } else {
        die('An error occurred while processing your request.');
    }
}
?>
