<?php
include '../phpconfig.php';
extract($_POST);
if($button == 1){
    $sql = "update tbl_user set name = '$name', mobile = '$mob' where email_id = 1";
    $conn->query($sql);
}

if($button == 2){
    $sql1 = "select password from tbl_user where email_id = 1";
    $res=$conn->query($sql1);
    $row = $res->fetch_assoc();
    if($old == $row['password']){
        $sql2 = "update tbl_user set password = '$new' where email_id = 1";
        $conn->query($sql2);
    }
}
$conn->close();