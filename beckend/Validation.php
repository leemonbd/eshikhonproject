<?php
include ('../config/Database.php');
function valid($data){
    $valid=trim(strip_tags($data));
    return $valid;
}


class Validation
{
    public function formValidation($data){
        $title=valid($data['title']);
        $description=valid($data['description']);
        $image_inc_name=rand(0,99999).$_FILES['image']['name'];
        $imageDirectory='../images/';
        $imageUrl=$imageDirectory.$image_inc_name;
        $imageTempSource=$_FILES['image']['tmp_name'];
        $error=0;
        $msg='';

        if ($title==''){
            $error++;
            $msg.='Title Required  ';
        }

        if($description==''){
            $error++;
            $msg.='Description Required ';
        }

        if($imageUrl==''){
            $error++;
            $msg.='Image Required';
        }

        if($_FILES['image']['type'] != 'image/jpeg'){
            $error++;
            $msg.='Image not valid';
        }


        if($error==0){
            $user_id=$_SESSION['id'];
            move_uploaded_file($imageTempSource,$imageUrl);
            $sql="INSERT INTO blog_post VALUES ('','$title','$description','$imageUrl','','Hold','$user_id')";
            $database=new Database();
            if(mysqli_query($database->link,$sql)){
                echo "Saved Successfully";
            }else{
                die('Query Problem'.mysqli_error($database->link));
            }
        }else{
                echo $msg;
        }

    }

    public function showFormItem(){
        $id=$_SESSION['id'];
        $sql="SELECT * FROM blog_post WHERE user_id='$id' && status='Accept'";
        $database=new Database();
        if(mysqli_query($database->link,$sql)){
            $queryResult=mysqli_query($database->link,$sql);
            return $queryResult;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }

    }

    public function showItemByID($id){
        $sql="SELECT * FROM blog_post WHERE id='$id'";
        $database=new Database();
        if(mysqli_query($database->link,$sql)){
            $queryResult=mysqli_query($database->link,$sql);
            return $queryResult;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }

    }

    public function editItemByID($data){

        $title=valid($data['title']);
        $description=valid($data['description']);
        $imageDirectory='../images/';
        $imageUrl=$imageDirectory.$_FILES['image']['name'];
        $imageTempSource=$_FILES['image']['tmp_name'];
        $error=0;
        $msg='';

        if ($title==''){
            $error++;
            $msg.='Title Required  ';
        }

        if($description==''){
            $error++;
            $msg.='Description Required ';
        }

        if($error==0){
            $database=new Database();
            if($_FILES['image']['name'] != ""){
                move_uploaded_file($imageTempSource,$imageUrl);
                $sql="UPDATE blog_post SET title='$data[title]', description='$data[description]', image='$imageUrl' WHERE id='$data[id]'";
                if(mysqli_query($database->link,$sql)){
                    header('Location:blog-form.php');
                }else{
                    die('Query Problem'.mysqli_error($database->link));
                }

            }else{
                $sql="UPDATE blog_post SET title='$data[title]', description='$data[description]' WHERE id='$data[id]'";
                if(mysqli_query($database->link,$sql)){
                    header('Location:blog-form.php');
                }else{
                    die('Query Problem'.mysqli_error($database->link));
                }

            }


        }else{
            echo $msg;
        }

    }

    public function deleteItem($id,$image){
        $database=new Database();
        $sql = "DELETE FROM blog_post WHERE id='$id' AND image='$image'";
        unlink('../images/'.$image);
        if(mysqli_query($database->link,$sql)){
            header('Location:blog-form.php');
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }

    public function statusUpdate($data){
        $status=$data['status'];
        $id=$data['id'];
        $database=new Database();
        $sql="UPDATE blog_post SET status='$status' WHERE id='$id'";

        if(mysqli_query($database->link,$sql)){
            header('Location:admin.php');
        }else{
            die('Query problem'.mysqli_error($database->link));
        }

    }

    public function showAllFormItem(){
        $sql="SELECT * FROM blog_post WHERE status!='Cancel' ";
        $database=new Database();
        if(mysqli_query($database->link,$sql)){
            $queryResult=mysqli_query($database->link,$sql);
            return $queryResult;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }

    }

    public function deleteAdminItem($data){
        $id=$data['id'];
        $database=new Database();
        $sql = "DELETE FROM blog_post WHERE id='$id'";
        if(mysqli_query($database->link,$sql)){
            header('Location:admin.php');
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }

    public function showItemDetails($id){
        $sql="SELECT * FROM blog_post WHERE id='$id' ";
        $database=new Database();
        if(mysqli_query($database->link,$sql)){
            $queryResult=mysqli_query($database->link,$sql);
            return $queryResult;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }

    }

    public function showrecentItem(){
        $sql="SELECT * FROM blog_post ORDER BY id DESC LIMIT 3";
        $database=new Database();
        if(mysqli_query($database->link,$sql)){
            $queryResult=mysqli_query($database->link,$sql);
            return $queryResult;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }

    }

    public function archiveItem(){
        $sql="SELECT created_at FROM blog_post";
        $database=new Database();
        if(mysqli_query($database->link,$sql)){
            $queryResult=mysqli_query($database->link,$sql);
            return $queryResult;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }

    }

    public function showItemYearWise($year){
        $sql="SELECT * FROM blog_post WHERE Year(created_at)='$year'";
        $database=new Database();
        if(mysqli_query($database->link,$sql)){
            $queryResult=mysqli_query($database->link,$sql);
            return $queryResult;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }

    }

    public function searchContent($data){
        $searchInput=$data['searchInput'];
        $sql="SELECT * FROM blog_post WHERE title LIKE '%$searchInput%'";
        $database=new Database();
        if(mysqli_query($database->link,$sql)){
            $queryResult=mysqli_query($database->link,$sql);
            return $queryResult;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }

    }

    public function menuSql(){
        $sql="SELECT * FROM menu";
        $database=new Database();
        if(mysqli_query($database->link,$sql)){
            $menuQueryResult=mysqli_query($database->link,$sql);
            return $menuQueryResult;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }

    }

    public function subMenuSql(){
        $database=new Database();
        $sql="SELECT m.id,s.sub_menu FROM menu as m,sub_menu as s WHERE s.menu_id=m.id";
        if(mysqli_query($database->link,$sql)){
            $subMenuQueryResult=mysqli_query($database->link,$sql);
            return $subMenuQueryResult;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }

    }


    public function showmenurecentItem($subMenuResult){
        $sql="SELECT * FROM blog_post WHERE id='$subMenuResult'";
        $database=new Database();
        if(mysqli_query($database->link,$sql)){
            $queryResult=mysqli_query($database->link,$sql);
            return $queryResult;
        }else{
            die('Query Problem'.mysqli_error($database->link));
        }

    }

    public function comments($data){
        $comment=$data['comments'];
        $blog_id=$data['blog_id'];
        $user_id=$_SESSION['id'];
        $user_name=$_SESSION['name'];
        $sql="INSERT INTO comments VALUES ('','$user_id','$user_name','$blog_id','$comment')";
        $database=new Database();
        if(mysqli_query($database->link,$sql)){

        }else{
            die('Query Problem'.mysqli_error($database->link));
        }
    }



    public function logout(){
        unset($_SESSION['id']);
        header('Location:login.php');

    }



}

