<?php
session_start();
include "connection.php";
$err = "";
if(isset($_POST["submit-btn"])){
    if(empty($_POST["email"]) || empty($_POST["password"])){
        $err = "*All fields required";
    }else{
        $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
        $stmt = $conn -> prepare($sql);
        $stmt->execute([
            "email" => $_POST["email"],
            "password" => $_POST["password"],
        ]);
        $user = $stmt->fetch();
        $row = $stmt ->rowCount();

        if($row>0){
            $_SESSION["email"] = $_POST["email"];
            $_SESSION["first_name"] = $user["first_name"];
            $_SESSION["last_name"] = $user["last_name"];
            $_SESSION["id"] = $user["id"];
            $_SESSION["gender"] = $user["gender"];
            header("location:index.php");
        }else{
            $err = "*Wrong email or password";
        }
    }
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
    <title>Login</title>
</head>
<body>
    <div class = "login-page">
<div class = "input-form">
<form method = "POST" action = "login.php">
<h1>Login</h1>

    <div class ="form-section">
        <label for ="">Email:</label>
        <input type = "email" name = "email" class = "form-control">
    </div>
    <div class ="form-section">
        <label for ="">Password:</label>
        <input type = "password" name = "password"  class = "form-control">
    </div>
    <p style = "color:red"><?php echo $err?></p>
        <input type = "submit" name = "submit-btn" class = "submit-btn">
        
       <h3>Dont have an account? <a href = "create-user.php">Click here</a> to register!</h3>
</form>
<div>
</div>
</body>
</html>