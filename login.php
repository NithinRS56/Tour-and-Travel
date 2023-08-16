<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="login.css">
    <?php  
  $ival=$val=$cpass='';
  if(isset($_POST['submit'])){
    extract($_POST);
    $conn=new mysqli('localhost','root','','mysql');
    $orgpass=mysqli_query($conn,"select * from usersv where email='$email';");
    if($orgpass->num_rows==0){
      $val='email is not registered';
    }
    else{
      $cpass=$orgpass->fetch_assoc()['Password'];
      if($pass===$cpass){
        $val="login successfull";
        header("Location: index2.html");
      }
      else{
        $val="password or email is incorrect";
      }
    }
    
  }
?>
</head>
<body style="background-color:white;>
    <div class="container">
        <form class="login-form" method="post"?>
            <h2>Logins</h2>
            <span><?php echo $val?></span>
            <div class="form-group">
                <label for="email"><b>Email:</b></label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password"><b>Password:</b></label>
                <input type="password" id="password" name="pass" required>
            </div>
            <div class="form-buttons">
                <button type="submit" name="submit">Submit</button>
                <button type="reset">Reset</button>
            </div>
            <p style="color:black">Don't have an account? <a href="http://localhost/WEB/signup.php">signup</a></p>
        </form>
    </div>
</body>
</html>