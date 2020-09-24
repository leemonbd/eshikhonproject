<?php
session_start();
/*session_start();
$sid=$_SESSION['id'];
if(!isset($_SESSION['id']) && $_SESSION['id']==null){
    header('Location:login.php');
}*/

require_once '../beckend/Validation.php';
$validation=new Validation();
$id=$_GET['id'];
$queryResult=$validation->showItemDetails($id);
$showItem=mysqli_fetch_assoc($queryResult);

if(isset($_POST['comment_post'])){
    $validation->comments($_POST);
}




?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Home</title>

        <style>
            .left-section{
                  height: auto;
                  width: 100%;
                  float: left;
                  background-color: #cccccc;
              }
            .post-section{
                height: 200px;
                width: 100%;
                float: left;
            }
            .post-image{
                height: 200px;
                width: 30%;
                float: left;
            }
            .post-title{
                height: 70px;
                width: 68%;
                float: left;

            }
            .post-description{
                height: 150px;
                width: 68%;
                float: left;
            }
        </style>

    </head>

    <body>

        <div class="left-section">
            <h2>Post Details</h2>
            <div class="post-section">
                <div class="post-image"><img src="<?php echo $showItem['image']?>" height="200px" width="100%"></div>
                <div class="post-title"><h3><?php echo $showItem['title']?></h3></div>
                <div class="post-description"><?php echo $showItem['description']?></div>
            </div>
        </div>

        <?php

        if(!isset($_SESSION['id'])){
            echo 'Please login before comment';
        }else{ ?>
            <h3>Comments</h3>
            <form action="" method="post">
                <textarea name="comments"></textarea><br>
                <input type="hidden" name="blog_id" value="<?php echo $showItem['id']?>">
                <input type="submit" name="comment_post" value="Comment">
            </form>
        <?php }
        $id=$showItem['id'];
        $sql="SELECT * FROM comments WHERE blog_id='$id'";
        $database=new Database();
        $commentShowResult=mysqli_query($database->link,$sql);
        while ($commentShow=mysqli_fetch_assoc($commentShowResult)){?>
    <p><?php
        echo 'This comment posted by '.$commentShow['user_name']."<br>";
        echo $commentShow['comments'];
        ?>
    </p>
    <?php }?>



    </body>

</html>