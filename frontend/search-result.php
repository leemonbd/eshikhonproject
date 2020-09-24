
<link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css"/>

<?php
/*session_start();
$sid=$_SESSION['id'];
if(!isset($_SESSION['id']) && $_SESSION['id']==null){
    header('Location:login.php');
}*/

require_once '../beckend/Validation.php';
$validation=new Validation();

if(isset($_POST['searchBtn'])){
    $queryResult=$validation->searchContent($_POST);
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

        <div class="left-section" id="table1">
              <h2>Search result of <?php echo $_POST['searchInput'];?></h2>
            <?php while ($showSearchItem=mysqli_fetch_assoc($queryResult)){?>
            <div class="post-section">
                <div class="post-image"><img src="<?php echo $showSearchItem['image']?>" height="200px" width="100%"></div>
                <div class="post-title">
                    <h3>
                        <?php
                        $title=$showSearchItem['title'];
                        echo str_replace($_POST['searchInput'],"<mark>".$_POST['searchInput']."</mark>",$title);
                        //echo $showSearchItem['title'];
                        ?>
                    </h3>
                </div>
                <div class="post-description"><?php echo $showSearchItem['description']?></div>
            </div>
            <?php }?>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

        <script>
            $(document).ready(function () {
                $('#table1').DataTable();
            });
        </script>

    </body>

</html>