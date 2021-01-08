<?php
include '../phpconfig.php';
extract($_POST);
if($button == 1){
    $sql = "update tbl_user set name = '$name', mobile = '$mob' where email_id = '$_SESSION[suser]'";
    $conn->query($sql);
}

if($button == 2){
    $sql1 = "select password from tbl_user where email_id = '$_SESSION[suser]'";
    $res=$conn->query($sql1);
    $row = $res->fetch_assoc();
    $oldencrypt = md5($old);
    $newencrypt = md5($new);
    if($oldencrypt == $row['password']){
        $sql2 = "update tbl_user set password = '$newencrypt' where email_id = '$_SESSION[suser]'";
        $conn->query($sql2);
    }
}
$conn->close();