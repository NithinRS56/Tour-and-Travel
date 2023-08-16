<?php
$res="";
$nameErr = "";
$passErr = "";
$emailErr = "";
$uname = "";
$pass = "";
$email = "";
$phno = "";
$phnoErr = "";
$repass = "";
$repassErr = "";
$valid="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST["uname"];
    $pass = $_POST["pass"];
    $email = $_POST["email"];
    $phno = $_POST["phno"];
    $repass = $_POST["Repass"];

    if (empty($uname)) {
        $nameErr = "Name is Required";
    } else {
        if (!preg_match('/^[a-zA-Z ]*$/', $uname)) {
            $nameErr = "Only alphabets and white space allowed";
        }
    }
    if (empty($pass)) {
        $passErr = "Password is Required";
    } else {
        $re = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';
        if (!preg_match($re, $pass)) {
            $passErr = "Password should be alphanumeric with a special character";
        }
    }
    if (empty($repass)) {
        $repassErr = "Re-enter the password is required";
    } else {
        if ($pass != $repass) {
            $repassErr = "Enter correct password";
        }
    }

    if (empty($email)) {
        $emailErr = "Email is required";
    } else {
        $reg = "/^\w+([\.-]?\w+)@\w+([\.-]?\w+)(\.\w{2,3})+$/";
        if (!preg_match($reg, $email)) {
            $emailErr = "Email should be in the correct format";
        }
    }

    if (empty($phno)) {
        $phnoErr = "Phone number is required";
    } else {
        $reg1 = "/^\d{10}$/";
        if (!preg_match($reg1, $phno)) {
            $phnoErr = "10 digit number required";
        }
    }
    if (empty($nameErr) && empty($passErr) && empty($emailErr)&& empty($phnoErr) && empty($repassErr)) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $conn = mysqli_connect($servername, $username, $password,'mysql');
        $x=mysqli_query($conn,"select * from usersv where email='$email';");
        if($x->num_rows!=0){
             $valid="This email is already registerd";
        }
        else{
             $result=mysqli_query($conn,"insert into `usersv`(Name,Email,Password,Phone) values('$uname','$email','$pass','$phno');");
             $valid="Successfully registered";
         }
        }
}
?>
<html>
  <head><title>Registration Form</title>
  <link rel="stylesheet" type="text/css" href="signup.css">
</head>
  
<body>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
    <h2 style="color:black">Signup</h2>
        <span><?php echo $valid?></span><br><br>
        <b>Name: </b><input type="text" name="uname" value="<?php echo $uname ?>">
        <br><br><br><span style="color:black"><?php echo $nameErr; ?></span><br><br>
        <b>Email:</b> <input type="email" name="email" value="<?php echo $email ?>">
        <br><br><br><span style="color:black"><?php echo $emailErr; ?></span><br><br>
        <b>Password:</b> <input type="password" name="pass" value="<?php echo $pass ?>">
        <br><br><br><span style="color:black"><?php echo $passErr; ?></span><br><br>
        <b>Re-enter-password:</b> <input type="password" name="Repass" value="<?php echo $repass ?>">
        <br><br><br><span style="color:black"><?php echo $repassErr; ?></span><br><br>
        <b>Phone Number: </b><input type="text" name="phno" value="<?php echo $phno ?>">
        <br><br><br><span style="color:black"><?php echo $phnoErr; ?></span><br><br>
        <input type="submit" value="Submit">
        <p style="color:black">Already have an account? <a href="login.php">Login</a></p>
    </form>
</body>

</html>
