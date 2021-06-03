<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "register";

$error = "";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST["sb"])) {
	$name=$_POST["fname"];
	$email=$_POST['uid'];
	$phone=$_POST['phone'];
	$size=$_POST["size"];
	$sqft=$_POST["Sqft"];
	$area=$_POST["Area"];
	$password=$_POST['pass'];
	$Confirm=$_POST['pass1'];

    $sql = "INSERT INTO parshwa (Name, Email_Id, Contact_No, Prefer_Size, Square_Foot, Area, Password, ConfirmPassword) VALUES ('$name','$email','$phone',
	'$size','$sqft','$area','$password','$Confirm')";
	$sql1="SELECT Email_Id,Contact_No,Password from parshwa where Email_Id IN ('$email')";
	$sql2="SELECT Email_Id,Contact_No,Password from parshwa where Contact_No IN ('$phone')";
	$sql3="SELECT Email_Id,Contact_No,Password from parshwa where Password IN ('$password')";
	$result = mysqli_query($conn, $sql1);
	$result1 = mysqli_query($conn, $sql2);
	$result2 = mysqli_query($conn, $sql3);
    $count = mysqli_num_rows($result); 
    $count1 = mysqli_num_rows($result1); 
    $count2 = mysqli_num_rows($result2); 	

if($count==0 && $count1==0 && $count2==0 ){
	if($password==$Confirm){
          if ($conn->query($sql) === TRUE) {
		           echo '<script>alert("New registration successful")</script>';
	                header('Location: app.html');
        
                                           } 

          else {
                $error = "Error: " . $sql . "<br>" . $conn->error;
   
	            } 		

	  }
	  else{echo '<script>alert("Password & Confirm Password doesnot matches")</script>';}
}
else
{
	echo '<script>alert("Username/ContactNo/Password Already exists")</script>';
	
}
}


$conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reg</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="app.js?v=2"></script>
    <link rel="stylesheet" href="style.css?v=1.1" >
<script>

</script>
	
</head>
<body>
<center><p id= "h21">Real Estate Prediction System</hp></center>
<center><p id= "h21">(Bangalore & Ahmedabad)</p></center>
    <div class="warpper fl">

        <div class="main">
		
            <div class="head">
<p>
 Registration Form</p>
</div>
<div class="form fl">
    <form name="Register" action="" method="POST" >
                    <p class="name">
FIRST NAME* :</p>
<p>
<input type="text" name="fname" placeholder="First Name" class="name-inp" required></p>

                    <p class="name">
EMAIL* :</p>
<p>
<input type="email" name="uid" placeholder="....@gmail.com" class="name-inp" required></p>
<p class="name">
PHONE* :</P>
                    <p>
<input type="text" name="phone" placeholder="Phone" class="name-inp" required></p>

<p class="name">
Size you are Prefer to Buy* :</P>
                    <p>
<input type="text" name="size" placeholder="1 or 2 or 3 BHK" class="name-inp" required></p>

<p class="name">
Square Foot* :</P>
                    <p>
<input type="text" name="Sqft" placeholder="Sqft" class="name-inp" required></p>

<p class="name">
Area* :</P>
                    <p>
   <select class="name-inp" name="Area" id="uiLocations3" onload="onf2()" required>
  <option value="" disabled="disabled" selected="selected">Choose a Location</option>
  </select></p>

<p class="name">
PASSWORD* :</p>
<p>
<input type="password" name="pass" placeholder="Password" class="pass" id="l1" required>
                        <input type="password" name="pass1" placeholder="Confirm Password" class="pass" id="l2" required>
                    </p>

<p>
<input type="submit" name="sb" value="SUBMIT" class="sub"></p> 
<p class="name"> Already have an account ? <a href="login.php" style="color : red">Login</a></p>

</form>
</div>
</div>
</div>
</body>
</html>