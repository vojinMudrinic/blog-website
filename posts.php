<?php
session_start();
$page = 'posts';
include "connection.php";


if(!isset($_SESSION["email"])){
    header("location:login.php");
 }else{
    $query = $conn->query("SELECT p.title,p.content,p.created_at,p.id,u.first_name,u.last_name,u.gender FROM posts AS p INNER JOIN users AS u ON p.user_id = u.id ORDER BY created_at DESC");
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
    <?php foreach($query as $post){ ?>
        <div class = "date"><?php echo $post["created_at"];?></div>
        <h2><a href ="single-post.php?post_id=<?php echo $post["id"];?>"><?php echo $post["title"];?></a></h2>
        <p class = "paragraph">By:<?php echo $post["first_name"]." ".$post["last_name"];?></p>
        <p ><?php echo $post["content"];?></p>
        <hr>
        <?php } ?>
    </div>
    </div>

</body>
</html>