<?php   
   session_start();
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
	$email = $_POST['uid'];  
	$phone = $_POST['phone'];  
    $password = $_POST['pass'];  
	$Confirm=$_POST['pass1'];
	$sql1 = "select * from parshwa where Email_Id = '$email'"; 
    $sql2="SELECT Email_Id,Contact_No,Password from parshwa where Contact_No IN ('$phone')";
	$sql3="SELECT Email_Id,Contact_No,Password from parshwa where Password IN ('$password')";
	$result = mysqli_query($conn, $sql1);
	$result1 = mysqli_query($conn, $sql2);
	$result2 = mysqli_query($conn, $sql3);
    $count = mysqli_num_rows($result); 
    $count1 = mysqli_num_rows($result1); 
    $count2 = mysqli_num_rows($result2); 	
    $_SESSION['login']=$email;		
	if($count == 1 && $count1==1 && $count2==1){ 
if($password==$Confirm){	
            echo '<script>alert("Login successful")</script>'; 
	  header('Location: app.php');
}
else{ echo '<script>alert("Password & Confirm Password doesnot matches")</script>';}
        }
		
        else{  
            echo '<script>alert("Invalid Username or Password")</script>';  
        }     	

	}     
?>  


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style1.css" href="style.css?v=1.1">
	<script>
	

</script>
	
</head>
<body>
    <div class="warpper f1">
        <div class="main">
            <div class="head">
<p>
 Login Form</p>
</div>
<div action="" class="form fl" >
    <form method="POST"  name="Register">
                   
                    <p class="name">
EMAIL* :</p>
<p>
<input type="email" name="uid" placeholder="....@gmail.com" class="name-inp" required></p>
<p class="name">
PHONE* :</P>
                    <p>
<input type="text" name="phone" placeholder="Phone" class="name-inp" required></p>


<p class="name">
PASSWORD* :</p>
<p>
<input type="password" name="pass" placeholder="Password" class="pass" required>
                        <input type="password" name="pass1" placeholder="Confirm Password" class="pass" required>
                    </p>

<p>
<input type="submit" name="sb" value="SUBMIT" class="sub"></p> 
<p class="name"> New User ?<a href="Register1.php"style="color : red">Register</a></p>

</form>
</div>
</div>
</div>
</body>
</html>