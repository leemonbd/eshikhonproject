<?php
session_start();
if(!isset($_SESSION['id']) && $_SESSION['id']==""){
    header('Location:login.php');
}
require_once '../beckend/Validation.php';
$validation=new Validation();
$id=$_GET['id'];
$queryResult=$validation->showItemByID($id);
$showItemByID=mysqli_fetch_assoc($queryResult);

if (isset($_POST['update'])){
    $validation->editItemByID($_POST);
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Edit</title>
</head>

<body>
    <a href="">All Post</a>
    <form action="" method="post" enctype="multipart/form-data">
        <table border="1px solid">
            <tr>
                <th>
                    Blog Tittle
                </th>
                <td>
                    <input type="text" name="title" value="<?php echo $showItemByID['title']?>">
                    <input type="hidden" name="id" value="<?php echo $showItemByID['id']?>">
                </td>
            </tr>
            <tr>
                <th>
                    Blog Description
                </th>
                <td>
                    <textarea name="description"><?php echo $showItemByID['description']?></textarea>
                </td>
            </tr>
            <tr>
                <th>
                    Blog Image
                </th>
                <td>
                    <input type="file" accept="image/*" name="image">
                    <img src="<?php echo $showItemByID['image']?>" width="50px" height="50px">
                </td> 
            </tr>
            <tr>
                <th> </th>
                <td>
                    <input type="submit" name="update" value="Update">
                </td>
            </tr>
        </table>
    
    </form>


</body>

</html>