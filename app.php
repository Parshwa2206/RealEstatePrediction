<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if($_SESSION['login'])
{
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <title>Banglore Home Price Prediction</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="app.js?v=2"></script>
	
	<link rel="stylesheet" href="app.css?v=1.1">
	
	
	<script>  
            function f1(){  
                  document.getElementById("form1").reset();  
				  document.getElementByName("uiEsti").reset();  
				   
                         }   
</script>  
</head>
<body>
<div class="emoji1" style="float:left">
<h2 id="h21"><center> WELCOME </center><br>
       <center>TO</center><br>
	   <center>REAL ESTATE PREDICTION</center>
<center>&#128508;</center></h2>
</div>
<div class="emoji2">
<h2 id="h21"><center> Predict </center><br>
       <center>The</center><br>
	   <center>Price for</center><br>
	   <center>Bangalore & Ahmedabad</center>
<center>&#128508;</center></h2>
</div>
<div class="img"></div>

<div class="img1"></div>
<div class="img3"></div>
<div class="content">
<p><center><a>Welcome : <?php echo $_SESSION['login'];?> || </a><a href="logout.php" style="color : red">Logout</a></center></p>




<form class="form" id="form1">
	<center><h2>Area (Square Feet)</h2>
    <input class="area"  type="text" id="uiSqft" class="floatLabel" placeholder="Eg. 1000" name="Squareft" value=""></center>
	<center><h2>BHK</h2></center>
	<div class="switch-field">
		<center><input type="radio" id="radio-bhk-1" name="uiBHK" value="1"/>
		<label for="radio-bhk-1">1</label>
		<input type="radio" id="radio-bhk-2" name="uiBHK" value="2" checked/>
		<label for="radio-bhk-2">2</label>
		<input type="radio" id="radio-bhk-3" name="uiBHK" value="3"/>
		<label for="radio-bhk-3">3</label>
		<input type="radio" id="radio-bhk-4" name="uiBHK" value="4"/>
		<label for="radio-bhk-4">4</label>
		<input type="radio" id="radio-bhk-5" name="uiBHK" value="5"/>
		<label for="radio-bhk-5">5</label></center>
	</div>
	
	</form>
<form class="form" id="form1">
	<center><h2>Bath</h2></center>
	<div class="switch-field">
		<center><input type="radio" id="radio-bath-1" name="uiBathrooms" value="1"/>
		<label for="radio-bath-1">1</label>
		<input type="radio" id="radio-bath-2" name="uiBathrooms" value="2" checked/>
		<label for="radio-bath-2">2</label>
		<input type="radio" id="radio-bath-3" name="uiBathrooms" value="3"/>
		<label for="radio-bath-3">3</label>
		<input type="radio" id="radio-bath-4" name="uiBathrooms" value="4"/>
		<label for="radio-bath-4">4</label>
		<input type="radio" id="radio-bath-5" name="uiBathrooms" value="5"/>
		<label for="radio-bath-5">5</label></center>
	</div>
		<center><h2>Location</h2></center>
		<div class="li">
	<center><div class="Bangalore">
		<h3>Bangalore</h3>
  <select class="location" name="" id="uiLocations" onload="onPageLoad()">
  <option value="" disabled="disabled" selected="selected">Choose a Location</option>
  </select>

<button class="submit" onclick="onClickedEstimatePrice()" type="button">Estimate Price</button>

	<div id="uiEstimatedPrice" name="a" class="result">	<h2></h2> </div>
	</div></center>
	<center><div class="Ahmedabad">
	<h3>Ahmedabad</h3>
    <select class="location" name="" id="uiLocations1" onload="onf1()">
  <option value="" disabled="disabled" selected="selected">Choose a Location</option>
  </select>
    
	<button class="submit" onclick="onClickedEstimatePrice1()" type="button">Estimate Price</button>

	<div id="uiEstimatedPrice1" name="a" class="result">	<h2></h2> </div>
</div></center>
</div>
	<center><input type="reset" class="reset" onclick="f1()" value="Reset"/></center>
	</form>
	</div>
</body>
</html>
<?php
} else{
header('Location:logout.php');
}
?>