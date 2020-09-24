<?php
session_start();
if(isset($_SESSION['id'])){
    header('Location:blog-form.php');
}
require_once '../beckend/Login.php';
$login=new Login();

if (isset($_POST['btn'])){
    $login->loginForm($_POST);
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Registration</title>
</head>

<body>

    <form action="" method="post">
        <table>
            <h2>Log in page</h2>
            <tr>
                <th>
                   Email
                </th>
                <td>
                    <input type="email" name="email">
                </td>
            </tr>
            <tr>
                <th>
                    Password
                </th>
                <td>
                    <input type="password" name="password">
                </td>
            </tr>
            <tr>
                <th> </th>
                <td>
                    <input type="submit" name="btn" value="Login">
                </td>
            </tr>
        </table>
    
    </form>


</body>

</html>