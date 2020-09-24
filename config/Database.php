<?php


class Database
{
    public $link;
    public function __construct()
    {
        $hostName='localhost';
        $userName='root';
        $password='';
        $dbName='limon_eshikhon';
        $this->link=mysqli_connect($hostName,$userName,$password,$dbName);
    }


}