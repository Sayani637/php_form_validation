<?php
$errname = $erraddress1 = $erraddress2 = $erremail = $errpassword = $errphone = "";
$name = $address1 = $address2= $email = $password = $phone ="";

if($_SERVER["REQUEST_METHOD"] =="POST"){
    if(empty($_POST["name"])){
       $errname = "<span style='color:red'>Name is Required. </span>";
    } else{
    $name =validate($_POST["name"]); 
    }

    if(empty($_POST["address1"])){
        $erraddress1 = "<span style='color:red'>Address1 is Required. </span>";
     } else{
    $address1 =validate($_POST["address1"]);
     }
     
     if(empty($_POST["address2"])){
        $erraddress2 = "<span style='color:red'>Address2 is Required. </span>";
     } else{
    $address2 =validate($_POST["address2"]); 
     }

     if(empty($_POST["email"])){
        $erremail = "<span style='color:red'>email is Required. </span>";
     } 
     elseif(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
        $erremail = "<span style='color:red'>Invalid Email format. </span>";
     }
     else{
    $email =validate($_POST["email"]);
     }
     
     if(empty($_POST["password"])){
        $errpassword = "<span style='color:red'>password is Required. </span>";
     } else{
    $password =validate($_POST["password"]);
     }

     if(empty($_POST["phone"])){
        $errphone = "<span style='color:red'>phone no is Required. </span>";
     } else{
    $phone =validate($_POST["phone"]);
     } 

    
    if(empty($name)|| empty($address1) || empty($email) || empty($password) ||  empty($phone)){
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Hi!</strong> ALL FIELDS REQUIRED
    </div>' ;
      
    }else{
        echo "YOU ARE IN";
    }
}
function validate($data){
    $trimdata = trim($data);
    $stripcsdata = stripcslashes($trimdata);
    $finaldata = htmlspecialchars($stripcsdata);
    return $finaldata;
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Form</title>
     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="form.css">
</head>
<body>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
	<h1>Registration Form</h1>

    <p style="color:red">* Required field</p>

	<div>
	<label>Enter Name:</label> 
    <input type="text" name="name">*<?php echo $errname; ?>
    </div>

    <div>
    <label>Enter Address1:</label> 
    <input type="text" name="address1">*<?php echo $erraddress1; ?>
    </div>

    <div>
    <label>Enter Address2:</label>
    <textarea name="address2"></textarea>
    </div>

    <div>
    <label>Enter Email:</label>
    <input type="email" name="email">*<?php echo $erremail; ?>
    </div>

    <div>
    <label>Enter Password:</label>
    <input type="password" name="password">*<?php echo $errpassword; ?>
    </div>

    <div>
    <label>Enter DOB:</label>
    <input type="date" name="dob">
    </div>

    <div>
    <label>Enter Phone No:</label>
    <input type="number" name="phone">*<?php echo $errphone; ?>
    </div>

    <div>
    <label>Enter Gender:</label>
                  <input type="radio" name="gender" value="male"> Male
	              <input type="radio" name="gender" value="female"> Female
	              <input type="radio" name="gender" value="others"> Others
	</div>

	<div>
	<label>Degree:</label> 
	        <select name="degree">
		            <option>Select</option>
		            <option value="B.Tech">B.Tech</option>
		            <option value="M.Tech">M.Tech</option>
		            <option value="B.Sc">B.Sc</option>
		            <option value="B.A">B.A</option>
		    </select> 
	</div>

    <div>
	<label>Language:</label>
	        <input type="checkbox" name="language[]" value="hindi">Hindi
	        <input type="checkbox" name="language[]" value="english">English
	        <input type="checkbox" name="language[]" value="bengali">Bengali	
	</div>

	<div>
	<label>Enter Image</label>   
	        <input type="file" name="uploadimage"> 
	</div>

    <div>
	<input type="submit" name="Submit">   
    <input type="reset" name="Reset"> 
    </div>                     

</form>
</body>
</html>