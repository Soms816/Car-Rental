<?php

include "connection.php";
session_start();

if(isset($_POST['username']) && isset($_POST['password'])){

   $username_ency =  mysqli_real_escape_string ($conn, $_POST['username']); // for preventing SQL injection

   $password_ency =  mysqli_real_escape_string ($conn, $_POST['password']); // for preventing SQL injection

   $query_db_check = "SELECT * FROM `admin_user` WHERE `username` = '".$username_ency."'";

   $res_db_check = mysqli_query($conn,$query_db_check);

   $res_arry_db_check = mysqli_fetch_array($res_db_check);

   $checked_password = password_verify($password_ency, $res_arry_db_check['password']);

   if($res_arry_db_check['username'] == $username_ency && $checked_password == 1){

    $_SESSION['username'] = $res_arry_db_check['username']; // setting session
    
    $_SESSION['name'] = $res_arry_db_check['name']; // setting session

    $_SESSION['img'] = $res_arry_db_check['img']; // setting session

    header("Location: NiceAdmin/index.php");
    
   }

}

?>