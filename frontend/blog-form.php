<?php
session_start();
if(!isset($_SESSION['id']) && $_SESSION['id']==""){
    header('Location:login.php');
}
$sid=$_SESSION['id'];
require_once '../beckend/Validation.php';
$validation=new Validation();
$msg='';
if (isset($_POST['blogspot'])){
   $validation->formValidation($_POST);
}

$queryResult=$validation->showFormItem();

if (isset($_GET['delete'])){
    $id=$_GET['id'];
    $image=$_GET['image'];
    $validation->deleteItem($id,$image);
}

if(isset($_GET['logout']) && $_GET['logout']!=""){
    $validation->logout();
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Home</title>
</head>

<body>
    <a href="">All Post</a>
    <a href="?logout=<?php echo $sid ?>">Logout</a>
    <form action="" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <th>
                    Blog Tittle
                </th>
                <td>
                    <input type="text" name="title">
                </td>
            </tr>
            <tr>
                <th>
                    Blog Description
                </th>
                <td>
                    <textarea name="description"></textarea>
                </td>
            </tr>
            <tr>
                <th>
                    Blog Image
                </th>
                <td>
                    <input type="file" accept="image/*" name="image">
                </td> 
            </tr>
            <tr>
                <th> </th>
                <td>
                    <input type="submit" name="blogspot">
                </td>
            </tr>
        </table>
    
    </form>

    <table border="1px solid" width="100%">
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
        <?php  while ($showItem=mysqli_fetch_assoc($queryResult)) {?>
        <tr>
            <td><?php echo $showItem['title']?></td>
            <td><?php echo $showItem['description']?></td>
            <td><img src="<?php echo $showItem['image']?>" height="100px" width="150px"></td>
            <td><?php echo $showItem['created_at']?></td>
            <td>
                <a href="blog-edit.php?id=<?php echo $showItem['id']?>">Edit</a>
                <a href="?delete=true&id=<?php echo $showItem['id']?>&image=<?php echo $showItem['image']?>" onclick="return confirm('Aru you sure you want to delete this item!!')">Delete</a>
            </td>
        </tr>
        <?php }?>
    </table>





</body>

</html>