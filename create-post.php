<?php
session_start();
$page = 'create-post';
include "connection.php";
$err ="";
if(!isset($_SESSION["email"])){
    header("location:login.php");
 }else{
    if(isset($_POST["submit-btn"])){
        if(empty($_POST["title"]) || empty($_POST["content"])){
            $err = "*All fields required";
        }else{
            $postMessage = "Post published!";
            $sql = "INSERT INTO posts (title,content,user_id) VALUES (:title,:content,:user_id)";
            $stmt = $conn ->prepare($sql);
            $stmt->execute([
             ':title' =>$_POST["title"],
             ':content' =>$_POST["content"],
              ':user_id' =>$_SESSION["id"], 
            
            ]
        );
        header("location:posts.php");
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
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Bebas+Neue&family=Permanent+Marker&family=Roboto:wght@300&family=Syncopate:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <title>Add post</title>
</head>
<body>
<div class = "animation-area"> 
<?php include "nav.php"?>
<div class = "input-form">
    <form method = "POST" action = "create-post.php">
    <h1>Post</h1>
    <div class ="form-section">
        <label for ="title">Title:</label>
        <input type = "text" name = "title"  class = "form-control">
</div>
<div class ="form-section">
        <textarea name = "content" placeholder = "Your text please! ✉"></textarea>
</div>
<p style = "color:red"><?php echo $err?></p>
        <input type = "hidden" name = "created_at" value ='".date('Y-m-d')."'>
        <input type = "hidden" name = "id">
        <input type = "submit" name = "submit-btn" class = "submit-btn" value="publish">
      

</div>
</div>
</body>
</html>