<?php

include "connection.php";
$err ="";
$emailErr = "";
if(isset($_POST["submit-btn"])){
    if(empty($_POST["first-name"]) || empty($_POST["last-name"]) || empty($_POST["email"]) || empty($_POST["password"])){
        $err = "*All fields required";
    }else{
        $sql1 = "SELECT * FROM users WHERE email = :email";
        $stmt = $conn -> prepare($sql1);
        $stmt->execute([
            "email" => $_POST["email"],
        ]);
        //**Checking if email is taken**
        $email = $stmt->fetchAll();
        $row = $stmt ->rowCount();
        if($row>0){
            $emailErr = "*Email taken";}
            else{
        $sql = "INSERT INTO users (first_name,last_name,email,password,gender) VALUES (:first_name,:last_name,:email,:password,:gender)";
        $stmt = $conn ->prepare($sql);
        $stmt->execute([':first_name' =>$_POST["first-name"],
         ':last_name' =>$_POST["last-name"],
          ':email' =>$_POST["email"], 
          ':password' =>$_POST["password"],
        ':gender' =>$_POST["gender"],
        
        ]
    );
    header("location:login.php");
    }}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Bebas+Neue&family=Permanent+Marker&family=Roboto:wght@300&family=Syncopate:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <title>Create User</title>
</head>
<body>
 
<div class = "login-page">
<div class = "input-form">
    <form method = "POST" action = "create-user.php">
    <h1>Register</h1>
    <div class ="form-section">
        <label for ="first-name">First Name:</label>
        <input type = "text" name = "first-name"  class = "form-control">
</div>
<div class ="form-section">
        <label for ="last-name">Last Name:</label>
        <input type = "text" name = "last-name"  class = "form-control">
</div>
<div class ="form-section">
        <label for ="email">Email:</label>  <p style ="color:red"><?php echo $emailErr;?></p>
        <input type = "email" name = "email"  class = "form-control">
       
</div>
<div class ="form-section">
        <label for ="password">Password:</label>
        <input type = "password" name = "password"  class = "form-control">
</div>
<div class ="form-section">
        <label for ="gender">Gender:</label>
        <input type = "radio" name = "gender" value ="M">Male</input>
        <input type = "radio" name = "gender" value ="F">Female</input>
</div>
<p style = "color:red"><?php echo $err?></p>
        <input type = "submit" name = "submit-btn" class = "submit-btn">
        <h3> <a href = "login.php">Login</a></h3>
</div>


</div>
</body>
</html>