<?php
/*session_start();
$sid=$_SESSION['id'];
if(!isset($_SESSION['id']) && $_SESSION['id']==null){
    header('Location:login.php');
}*/

require_once '../beckend/Validation.php';
$validation=new Validation();
$queryResult=$validation->showrecentItem();
$queryResult2=$validation->archiveItem();
$menuQueryResult=$validation->menuSql();
$subMenuQueryResult=$validation->subMenuSql();




?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Home</title>

        <style>
            .left-section{
                  height: auto;
                  width:49%;
                  float: left;
                  background-color: #cccccc;
              }
            .post-section{
                 height: 200px;
                 width: 100%;
                 border: 1px solid;
                 float: left;
             }
            .arc-section{
                height: 40px;
                width: 100%;
                border: 1px solid;
                float: left;
                margin: 2%;
                background-color: red;

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
            .right-section{
                height: 600px;
                width: 50%;
                float: right;
                background-color: white;
                border: 1px solid;
            }
        </style>

        <link href="../assets/css/bootstrap.css" rel="stylesheet">

    </head>

    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">
            <?php while ($menuResult=mysqli_fetch_assoc($menuQueryResult)){?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="details.php?menuid=<?php echo $menuResult['id']?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo $menuResult['menu']?>
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php
                    $id=$menuResult['id'];
                    $database=new Database();
                    $sql="SELECT * FROM sub_menu WHERE menu_id=$id";
                    $subMenuQueryResult=mysqli_query($database->link,$sql);
                    while ($subMenuResult=mysqli_fetch_assoc($subMenuQueryResult)){?>
                    <a class="dropdown-item" href="details.php?submenuid=<?php echo $subMenuResult['id']?>"><?php echo $subMenuResult['sub_menu']?></a>
                    <?php }?>
                </div>
            </li>
            <?php }?>
        </ul>
    </div>
    </nav>
    <hr>
   <!-- <?php /*while ($menuResult=mysqli_fetch_assoc($menuQueryResult)){*/?>
    <ul>
        <li><a href="details.php?menuid=<?php /*echo $menuResult['id']*/?>"><?php /*echo $menuResult['menu']*/?></a></li>
        <?php
/*        $id=$menuResult['id'];
        $database=new Database();
        $sql="SELECT * FROM sub_menu WHERE menu_id=$id";
        $subMenuQueryResult=mysqli_query($database->link,$sql);
        while ($subMenuResult=mysqli_fetch_assoc($subMenuQueryResult)){*/?>
        <ul>
            <li><a href="details.php?submenuid=<?php /*echo $subMenuResult['id']*/?>"><?php /*echo $subMenuResult['sub_menu']*/?></a></li>
        </ul>
        <?php /*}*/?>
    </ul>-->



    <form action="search-result.php " method="post">
        <input type="text" name="searchInput" placeholder="Search here">
        <input type="submit" name="searchBtn" value="Search">
    </form>

        <h1>Welcome to front end</h1>

        <div class="left-section">

            <h2>Recent Post</h2>
            <?php  while ($showItem=mysqli_fetch_assoc($queryResult)) {?>
            <div class="post-section">
                <div class="post-image"><img src="<?php echo $showItem['image']?>" height="200px" width="100%"></div>
                <div class="post-title"><h3><?php echo $showItem['title']?></h3></div>
                <div><p><?php echo $showItem['created_at']?></p></div>
                <div class="post-description"><?php echo str_pad(substr($showItem['description'],0,505),508,".")?> <a href="blog-details.php?id=<?php echo $showItem['id']?>">Read More</a></div>
            </div>
            <?php }?>
        </div>

        <div class="right-section">
            <h2>Archive Post</h2>
            <?php
            while ($showItem2=mysqli_fetch_assoc($queryResult2)) {
                $yearList = [];
                $yearList[] = date("Y",strtotime($showItem2['created_at']));

            }
            $uniqueYearList=array_unique($yearList);
            ?>
            <?php for ($i=0; $i<count($uniqueYearList); $i++) {?>
                <a href="blog-year-wise.php?yearId=<?php echo $uniqueYearList[$i];?>">
                    <div class="arc-section">
                        <?php echo $uniqueYearList[$i];?>
                    </div>
                </a>
            <?php }?>
        </div>
    <script src="../assets/js/jquery-3.4.1.js"></script>
    <script src="../assets/js/popper.js"></script>
    <script src="../assets/js/bootstrap.js"></script>


    </body>

</html>