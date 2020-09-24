<?php
/*session_start();
$sid=$_SESSION['id'];
if(!isset($_SESSION['id']) && $_SESSION['id']==null){
    header('Location:login.php');
}*/

require_once '../beckend/Validation.php';
$validation=new Validation();
$year=$_GET['yearId'];
$queryResult=$validation->showItemYearWise($year);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Home</title>

    <style>
        .left-section{
            height: auto;
            width:100%;
            float: left;
            background-color: #cccccc;
        }
        .post-section{
            height: 200px;
            width: 100%;
            border: 1px solid;
            float: left;
        }
        .post-image{
            height: 200px;
            width: 30%;
            border: 1px solid;
            float: left;
        }
        .post-title{
            height: 70px;
            width: 69%;
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
<h1>Year Wise Blog</h1>
<div class="left-section">
    <h2>Year Wise Post</h2>
    <?php  while ($showItem=mysqli_fetch_assoc($queryResult)) {?>
        <div class="post-section">
            <div class="post-image"><img src="<?php echo $showItem['image']?>" height="200px" width="100%"></div>
            <div class="post-title"><h3><?php echo $showItem['title']?></h3></div>
            <div><p><?php echo $showItem['created_at']?></p></div>
            <div class="post-description"><?php echo str_pad(substr($showItem['description'],0,505),508,".")?> <a href="blog-details.php?id=<?php echo $showItem['id']?>?>">Read More</a></div>
        </div>
    <?php }?>
</div>

</body>

</html>