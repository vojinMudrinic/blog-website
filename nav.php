<?php  
?>

<header>
<nav>
<div class = "home">
                <h4 ><a style = "color: <?php if($page =='home'){echo "tomato";}?>" href ="index.php">Home</a></h4>
</div>
        <ul class = "nav-links">
        <li><a href = "logout.php">Logout</a></li>
       <li> <a style = "color: <?php if($page =='create-post'){echo "tomato";}?>"  href ="create-post.php">Write what's on your mind</a></li>
        <li><a style = "color: <?php if($page =='posts'){echo "tomato";}?>" href ="posts.php">View posts</a></li>
</ul>
</nav>
</header>
