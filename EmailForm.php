<!DOCTYPE HTML> 
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 

<?php
// define variables and set to empty values
$regionErr = $agencyErr = "";
$region = $agency = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["region"])) {
     $regionErr = "Region is required";
   } else {
     $region = test_input($_POST["region"]);
     // check if region only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$region)) {
       $regionErr = "Only letters and white space allowed"; 
     }
   }
   
   if (empty($_POST["agency"])) {
     $agencyErr = "Agency is required";
   } else {
     $agency = test_input($_POST["agency"]);
     // check if e-mail address is well-formed
     if (!preg_match("/^[a-zA-Z ]*$/",$agency)) {
       $agencyErr = "Only letters and white space allowed"; 
     }
   }
     
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   Region: <input type="text" name="region" value="<?php echo $region;?>">
   <span class="error">* <?php echo $regionErr;?></span>
   <br><br>
   Agency: <input type="text" name="agency" value="<?php echo $agency;?>">
   <span class="error">* <?php echo $agencyErr;?></span>
   <br><br>
   <input type="submit" name="submit" value="Submit"> 
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $region;
echo "<br>";
echo $agency;
echo "<br>";
echo "MailTo:developer1@domain.com;developer2@domain.com&cc=developer3@domain.com&subject=$agency&body=$region":
?>

</body>
</html>