<?php
include "../config/Database.php";
function valid($data){
    $valid=trim(strip_tags($data));
    return $valid;
}


class Login
{
    public function loginForm($data){
        $email=valid($data['email']);
        $password=valid($data['password']);
        $error=0;
        $msg='';

        if($email==''){
            $msg.='Email Required  ';
            $error++;
        }

        if($password==''){
            $msg.='Password Required  ';
            $error++;
        }

        if($error==0){
            $password=md5($password);
            $database=new Database();
            $sql="SELECT * FROM users WHERE email='$email' AND password='$password'";
            if(mysqli_query($database->link,$sql)){
                $queryResult=mysqli_query($database->link,$sql);
                $user=mysqli_fetch_assoc($queryResult);

                if($user && $user['role_id']==1){
                    $_SESSION['id']=$user['id'];
                    $_SESSION['email']=$user['email'];
                    $_SESSION['name']=$user['name'];
                    header('Location:blog-form.php');
                }elseif ($user && $user['role_id']==2){
                    $_SESSION['id']=$user['id'];
                    $_SESSION['email']=$user['email'];
                    $_SESSION['name']=$user['name'];
                    header('Location:admin.php');
                }
                else{
                    echo 'Please enter valid email and password';
                }

            }else{
                die('Query problem'.mysqli_error($database->link));
            }
        }else{
            echo $msg;
        }
    }


}