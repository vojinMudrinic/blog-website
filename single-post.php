<?php
session_start();
$page = '';
include "connection.php";


if(!isset($_SESSION["email"])){
    header("location:login.php");
 }else if(isset($_GET["post_id"])){
  $sql = "SELECT p.created_at,p.id,p.title,p.content,p.user_id,u.id,u.first_name,u.last_name FROM posts AS p INNER JOIN users AS u ON p.user_id = u.id 
  WHERE p.id = {$_GET["post_id"]}";
  $stmt = $conn ->prepare($sql);
  $stmt ->execute();
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $singlePost = $stmt->fetch();


 }else{
     header("location:posts.php");
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
    <title>Posts</title>
</head>
<body>
<?php include "nav.php"?>
<div class = "body-blog">
    <div class = "blog">
        <div class = "date"><?php echo $singlePost["created_at"];?></div>
        <h2><?php echo  $singlePost["title"];?></h2>
        <p class = "paragraph">By:<?php echo  $singlePost["first_name"]." ". $singlePost["last_name"];?></p>
        <p ><?php echo  $singlePost["content"];?></p>
        <hr>
        </div>
    </div>


</body>
</html>