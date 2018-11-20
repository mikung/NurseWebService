<?php
/**
 * Created by PhpStorm.
 * User: Mikung
 * Date: 08/11/2561
 * Time: 11:56
 */
session_start();
include "conn/pdomysql.php";

$mysql = new pdomysql();
$username = $_POST['username'];
$password = md5($_POST['password']);
//echo $password;
$sql = "select * from opduser where loginname = '$username' and passweb = '$password'";
$result = $mysql->selectOne($sql);

if($result){
    $_SESSION['opduser'] = $result;
    $_SESSION['loginFail'] = 1;
    echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=index.php' >";
}else{
    $_SESSION['loginFail'] = 2;
    echo "<META HTTP-EQUIV='Refresh' CONTENT='0;URL=login.php' >";
}

//print_r($_SESSION['data']);

