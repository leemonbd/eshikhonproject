<?php
session_start();
$sid=$_SESSION['id'];
if(!isset($_SESSION['id']) && $_SESSION['id']==null){
    header('Location:login.php');
}

require_once '../beckend/Validation.php';
$validation=new Validation();
$msg='';

if (isset($_POST['status_delete_btn'])){
    $validation->deleteAdminItem($_POST);
}
if (isset($_POST['status_update_btn'])){
   $validation->statusUpdate($_POST);

}

$queryResult=$validation->showAllFormItem();




if(isset($_GET['logout'])){
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
    <h2>All Posts</h2>
    <a href="?logout=<?php echo $sid ?>">Logout</a>
    <table border="1px solid" width="100%">
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>Created At</th>
            <th>Current Status</th>
            <th colspan="2">Action</th>
        </tr>
        <?php  while ($showItem=mysqli_fetch_assoc($queryResult)) {?>
        <tr>
            <td><?php echo $showItem['title']?></td>
            <td><?php echo $showItem['description']?></td>
            <td><img src="<?php echo $showItem['image']?>" height="100px" width="150px"></td>
            <td><?php echo $showItem['created_at']?></td>
            <td><?php echo $showItem['status']?></td>
            <form action="" method="post">
                <td>
                    <select name="status">
                        <option value="Hold">Select Status</option>
                        <option value="Accept">Accept</option>
                        <option value="Cancel">Cancel</option>
                    </select>
                </td>
                <td>
                    <input type="hidden" name="id" value="<?php echo $showItem['id']?>">
                    <input type="submit" name="status_update_btn" value="Update Status">
                    <input type="submit" name="status_delete_btn" value="Delete Status" onclick="return confirm('Aru you sure you want to delete this item!!')">
                </td>
            </form>
        </tr>
        <?php }?>
    </table>





</body>

</html>