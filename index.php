<?php
$insert = false;
if(isset($_POST['name'])){

    $server = "localhost";
    $username = "root";
    $password = "";
    $db="single booking"

    
    $con = mysqli_connect($server, $username, $password,$db);

    
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }

$Name=$_POST[`Name`];
$mobilenumber=$_POST[`Mobile Number`];
$Email=$_POST[ `E Mail`];
$Gender=$_POST[`Gender`]; 
$Date=$_POST[`Date`];
$Hostel=$_POST[ `Hostel options`];
$paymentthrough=$_POST[`payment details through`];

    $sql="INSERT INTO table single booking ( 'Name', 'MobileNumber','EMail','Gender','Date', 'Hosteloptions','paymentdetailsthrough')  VALUES  ($Name, $mobilenumber,$Email, $Gender, $Date,$Hostel, $paymentthrough);"
    if($con->query($sql) == true){
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }
    $con->close();
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Booking as Single</title>
  <style>
    body {
      background-color: #f0f8ff;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    form {
      background-color: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
      width: 400px;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    label {
      font-weight: bold;
    }

    input[type="text"],
    input[type="tel"],
    input[type="email"],
    select,
    input[type="file"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }

    input[type="radio"] {
      margin-right: 5px;
    }

    input[type="submit"],
    input[type="reset"] {
      background-color: #007bff;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
    }

    input[type="submit"]:hover,
    input[type="reset"]:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <form action="index.php" method="post" id="bookingForm">
    <!DOCTYPE html>
<html>
<head>
  <title>Booking as Single</title>
  
</head>
<body>
  <form>
    <h2>Booking as Single Person</h2>
    <label for="name">Name:</label>
    <input type="text" id="Name" name="name" placeholder="Enter full name" required>

    

    <label for="phoneNumber">Phone Number:</label>
    <input type="tel" id="mobilenumber" name="phoneNumber" pattern="[0-9]{11}" placeholder="+91 xxxxxxxxxxx" required><br>

    <label for="email">Email:</label>
    <input type="email" id="Email" name="email" placeholder="sample@example.com" required><br>

    <label>Gender:</label>
    <input type="radio" id="Gender" name="gender" value="male">
    <label for="male">Male</label>
    <input type="radio" id="Gender" name="gender" value="female">
    <label for="female">Female</label>
    <input type="radio" id="Gender" name="gender" value="other">
    <label for="other">Other</label><br><br>

    <label for="stay">Select the trip date when you want to start</label>
<input type="date" id="Date" name="dob" required><br><br>

    <label for="bloodGroup">Hostel Options</label>
    <select id="Hostel" name="hostel" required>
      <option value="" disabled selected>Select</option>
      <option value="ac">Ac</option>
      <option value="nac">Non Ac</option>
      <option value="no">Dont want hotel</option> 
    </select><br><br>

    <label>Regarding Payment Our Contact team should contact you with</label><br>
    <input type="radio" id="paymentthrough" name="department" value="Phone">
    <label for="cse">Phone</label>
    <input type="radio" id="paymentthrough" name="department" value="Email">
    <label for="eee">Whatsapp</label>
    <input type="radio" id="paymentthrough" name="department" value="Whatsapp">
    <label for="bba">Email</label><br><br>

    <label for="photo">Photo:</label>
    <input type="file" id="photo" name="photo">

    
      <input type="submit" value="Submit">
    <input type="reset" value="Reset">
  </form>

  <script>
    
    const form = document.getElementById('bookingForm');

   
    form.addEventListener('submit', function(event) {
     
      event.preventDefault();

      window.location.href = 'sucess.html';
    });
  </script>
</body>
</html>



