<?php
session_start();
$conn = new mysqli("localhost", "root", "", "cedcab") or die("Connection Unsucessful");

class CedMicro{
    public $fix=50;
    public $arr_disrate = array('10'=>13.50,'50'=>12,'100'=>10.20,'above'=>8.50);
}
class CedMini{
    public $fix=150;
    public $arr_disrate = array('10'=>14.50,'50'=>13,'100'=>11.20,'above'=>9.50);
}
class CedRoyal{
    public $fix=200;
    public $arr_disrate = array('10'=>15.50,'50'=>14,'100'=>12.20,'above'=>10.50);
}
class CedSUV{
    public $fix=250;
    public $arr_disrate = array('10'=>16.50,'50'=>15,'100'=>13.20,'above'=>11.50);
}

function fare($ctypep , $distp, $luggp){
    $l=0;
        switch ($ctypep){
            case "Ced Micro": $s = new CedMicro();
            break;
            case "Ced Mini": $s = new CedMini();
            echo "<h3>Luggage: $luggp Kg</h3>";
            $l = luggcalc($luggp);
            break;
            case "Ced Royal": $s = new CedRoyal();
            echo "<h3>Luggage: $luggp Kg</h3>";
            $l = luggcalc($luggp);
            break;
            case "Ced SUV": $s = new CedSUV();
            echo "<h3>Luggage: $luggp Kg</h3>";
            $l = 2*luggcalc($luggp);
            break;
        }
        if($distp<=10){
            $fare = $distp*$s->arr_disrate['10'];
        }
        elseif($distp>10 && $distp<=60){
            $fare = 10*$s->arr_disrate['10'] + ($distp-10)*$s->arr_disrate['50'];
        }
        elseif($distp>60 && $distp<=160){
            $fare = 10*$s->arr_disrate['10'] + 50*$s->arr_disrate['50'] + ($distp-60)* $s->arr_disrate['100'];
        }
        elseif($distp>160){
            $fare = 10*$s->arr_disrate['10'] + 50*$s->arr_disrate['50'] + 100*$s->arr_disrate['100'] +($distp-160) * $s->arr_disrate['above'];
        }
        return $fare + $s->fix + $l;     
    }
    function luggcalc($w){
        if($w==0){
            $lugg_fare = 0;
        }elseif($w<=10){
            $lugg_fare = 50;
        }
        elseif($w>10 && $w<=20){
            $lugg_fare = 100;
        }
        elseif($w>20){
            $lugg_fare = 200;
        }
        return $lugg_fare;
    }
// $locadistarr=array('Charbagh'=>0, 'Indira Nagar'=>10, 'BBD'=>30, 'Barabanki'=>60, 'Faizabad'=>100, 'Basti'=>150, 'Gorakhpur'=>210);
if(isset($_POST)){
    extract($_POST);
    if($button == 1)
    $sql1 = "select distance from tbl_location where name = '$pickup'";
    $sql2 = "select distance from tbl_location where name = '$drop'";
    $res1=$conn->query($sql1);
    $res2=$conn->query($sql2);
    $row1 = $res1->fetch_assoc();
    $row2 = $res2->fetch_assoc();
    
    $dist=abs($row1['distance']-$row2['distance']);
    echo "<h3>Pickup Location: $pickup</h3>";
    echo "<h3>Drop Location: $drop</h3>";
    echo "<h3>Distance to Travel: $dist Km</h3>";
    $faree = fare($ctype,$dist, $lugg);
    echo "<h3>Total Fare: &#8377;".$faree."</h3>";


    if($button == 2){
        if(isset($_SESSION['suser'])){
            $sql3 = "insert into tbl_ride values(ride_date, fromlocation, tolocation, total_distance, luggage, total_fare, cab_type, status) values(now(),'$pickup','$drop','$dist','$lugg','$faree','$ctype','1')";
            $conn->query($sql3);
        }
        else{
            header("location:signup.php");
        }
    }
}
?>