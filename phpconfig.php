<?php
session_start();
if(! ( isset($_SESSION['sadmin']) || isset($_SESSION['suser']) ))
{header("location:../index.php");}
$conn = new mysqli("localhost", "root", "", "cedcab") or die("Connection Unsucessful");
?>