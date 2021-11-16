<?php
session_start();
$page = 'home';
include "connection.php";

if(!isset($_SESSION["email"])){
   header("location:login.php");
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
    <title>Document</title>
</head>
<body>
<div class = "animation-area-welcome">
<?php include "nav.php"?>
   <h1 class = "welcome"> <p class = "greet">Welcome</p><?php echo $_SESSION["first_name"]." ".$_SESSION["last_name"];?></h1>
    
</div>
</body>
</html>