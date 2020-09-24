<?php
session_start();
require_once '../beckend/Registration.php';
$registration=new Registration();

if (isset($_POST['btn'])){
    $registration->registrationForm($_POST);

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
            <h2>Registration page</h2>
            <tr>
                <th>
                   Name
                </th>
                <td>
                    <input type="text" name="name">
                </td>
            </tr>
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
                    Phone
                </th>
                <td>
                    <input type="number" name="phone">
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
                <th>
                    Re-type Password
                </th>
                <td>
                    <input type="password" name="reTypePassword">
                </td>
            </tr>
            <tr>
                <th> </th>
                <td>
                    <input type="submit" name="btn" value="Register">
                </td>
            </tr>
        </table>
    
    </form>


</body>

</html>