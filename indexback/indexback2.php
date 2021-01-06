<?php
class CedMicro{
    protected $fix=50;
    protected $arr_disrate = array('10'=>13.50,'50'=>12,'100'=>10.20,'above'=>8.50);
}
class CedMini{
    protected $fix=150;
    protected $arr_disrate = array('10'=>14.50,'50'=>13,'100'=>11.20,'above'=>9.50);
}
class CedRoyal{
    protected $fix=200;
    protected $arr_disrate = array('10'=>15.50,'50'=>14,'100'=>12.20,'above'=>10.50);
}
class CedSUV{
    protected $fix=250;
    protected $arr_disrate = array('10'=>16.50,'50'=>15,'100'=>13.20,'above'=>11.50);
}

class common extends CedMicro{
    function fare($ctypep , $distp){
        switch ($ctypep){
            case "Ced Micro": $micro = new CedMicro();
            // echo "<h3>Total Fare : &#8377;".$micro->fare($dist)."</h3>";
            break;
            // case "Ced Mini": $mini = new CedMini();
            // echo "<h3>Total Fare : &#8377;".$micro->fare($dist)."</h3>";
            // break;
            // case "Ced Royal": $royal = new CedRoyal();
            // echo "<h3>Total Fare : &#8377;".$micro->fare($dist)."</h3>";
            // break;
            // case "Ced SUV": $suv = new CedSUV();
            // echo "<h3>Total Fare : &#8377;".$micro->fare($dist)."</h3>";
            // break;
        }
        if($distp<=10){
            $fare = $distp*$this->arr_disrate['10'];
        }
        elseif($distp>10 && $distp<=60){
            $fare = 10*$this->arr_disrate['10'] + ($distp-10)*$this->arr_disrate['50'];
        }
        elseif($distp>60 && $distp<=160){
            $fare = 10*$this->arr_disrate['10'] + 50*$this->arr_disrate['50'] + ($distp-60)* $this->arr_disrate['100'];
        }
        elseif($distp>160){
            $fare = 10*$this->arr_disrate['10'] + 50*$this->arr_disrate['50'] + 100*$this->arr_disrate['100'] +($distp-160) * $this->arr_disrate['above'];
        }
        return $fare + $this->fix;     
    }
    function lugg($w){
        if($w<=10){
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
}
$locadistarr=array('Charbagh'=>0, 'Indira Nagar'=>10, 'BBD'=>30, 'Barabanki'=>60, 'Faizabad'=>100, 'Basti'=>150, 'Gorakhpur'=>210);
if(isset($_POST)){
    extract($_POST);
    $dist=abs($locadistarr[$pickup]-$locadistarr[$drop]);
    echo "<h3>Pickup Location: $pickup</h3>";
    echo "<h3>Drop Location: $drop</h3>";
    echo "<h3>Distance to Travel: $dist Km</h3>";
    if($ctype != 'Ced Micro' && $lugg !=''){
        echo "<h3>Luggage :$lugg Kg</h3>";
    }
    $c = new common();
    echo "<h3>Total Fare : &#8377;".$c->fare($ctype,$dist)."</h3>";
}
?>