<?php
include "../config/Database.php";
function valid($data){
    $valid=trim(strip_tags($data));
    return $valid;
}

class Registration
{
    public function registrationForm($data){
        $name=valid($data['name']);
        $email=valid($data['email']);
        $phone=valid($data['phone']);
        $password=valid($data['password']);
        $reTypePassword=valid($data['reTypePassword']);
        $error=0;
        $msg='';

        if($name==''){
            $msg.='Name Required  ';
            $error++;
        }

        if($email==''){
            $msg.='Email Required  ';
            $error++;
        }

        if($phone==''){
            $msg.='Phone Required  ';
            $error++;
        }

        if($password==''){
            $msg.='Name Required  ';
            $error++;
        }

        if($reTypePassword==''){
            $msg.='Re-type Password Required  ';
            $error++;
        }

        if($password!=$reTypePassword){
            $msg.='Password does not match  ';
            $error++;
        }

        if($error==0){
            $password=md5($password);
            $reTypePassword=md5($reTypePassword);
            $database=new Database();
            $sql="INSERT INTO users VALUES ('','$name','$email','$phone','$password','$reTypePassword','1')";
            if(mysqli_query($database->link,$sql)){
                echo 'Insert successfully';
            }else{
                die('Query Problem'.mysqli_error($database->link));
            }
        }else{
            echo $msg;
        }





    }


}