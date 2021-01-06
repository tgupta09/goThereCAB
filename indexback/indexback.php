<?php
class CedMicro{
    private $fix=50;
    function fare($dist){
        $fixch = $this->fix; 
        if($dist<=10){
            $fare = $dist*13.50;
        }
        elseif($dist>10 && $dist<=60){
            $fare = 10*13.50 + ($dist-10)*12;
        }
        elseif($dist>60 && $dist<=160){
            $fare = 10*13.50 + 50*12 + ($dist-60)* 10.20;
        }
        elseif($dist>160){
            $fare = 10*13.50 + 50*12 + 100*10.20 + ($dist-160) * 8.50;
        }
        return $fare+ $fixch;
    }
}

class CedMini{
    private $fix=150;
    function fare($dist){
        $fixch = $this->fix;
        if($dist<=10){
            $fare = $dist*14.50;
        }
        elseif($dist>10 && $dist<=60){
            $fare = 10*14.50+ ($dist-10)*13;
        }
        elseif($dist>60 && $dist<=160){
            $fare = 10*14.50 + 50*13 + ($dist-100)* 11.20;
        }
        elseif($dist>160){
            $fare = 10*14.50 + 50*13 + 100*11.20 +($dist-160) * 9.50;
        }
        return $fare+ $fixch;
    }
}

class CedRoyal{
    private $fix=200;
    function fare($dist){
        $fixch = $this->fix;
        if($dist<=10){
            $fare = $dist*15.50;
        }
        elseif($dist>10 && $dist<=60){
            $fare = 10*15.50+ ($dist-10)*14;
        }
        elseif($dist>60 && $dist<=160){
            $fare = 10*15.50 + 50*14 + ($dist-60)* 12.20;
        }
        elseif($dist>160){
            $fare = 10*15.50 + 50*14 + 100*12.20 + ($dist-160) * 10.50;
        }
        return $fare+ $fixch;
    }
}

class CedSUV{
    private $fix=250;
    function fare($dist){
        $fixch = $this->fix;
        if($dist<=10){
            $fare = $dist*16.50;
        }
        elseif($dist>10 && $dist<=60){
            $fare = 10*16.50 + ($dist-10)*15;
        }
        elseif($dist>60 && $dist<=160){
            $fare = 10*16.50 + 50*15 + ($dist-60)* 13.20;
        }
        elseif($dist>160){
            $fare = 10*16.50 + 50*15 + 100*13.20 +($dist-160) * 11.50;
        }
        return $fare+ $fixch;
    }
}

$locadistarr=array('Charbagh'=>0, 'Indira Nagar'=>10, 'BBD'=>30, 'Barabanki'=>60, 'Faizabad'=>100, 'Basti'=>150, 'Gorakhpur'=>210);

function luggcalc($w){
    if($w==0){
        $lugg_fare=0;
    }
    elseif($w>0 && $w<=10){
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


if(isset($_POST)){
    extract($_POST);
    $dist=abs($locadistarr[$pickup]-$locadistarr[$drop]);
    echo "<h3>Pickup Location: $pickup</h3>";
    echo "<h3>Drop Location: $drop</h3>";
    echo "<h3>Distance to Travel: $dist Km</h3>";
    if($ctype == "Ced Micro"){
        $micro = new CedMicro();
        echo "<h3>Total Fare : &#8377;".$micro->fare($dist)."</h3>";
    }
    elseif($ctype == "Ced Mini"){
        $mini = new CedMini();
        echo "<h3>Luggage :$lugg Kg</h3>";
        echo "<h3>Total Fare : &#8377;".($mini->fare($dist)+luggcalc($lugg))."</h3>";
    }
    elseif($ctype == "Ced Royal"){
        $royal = new CedRoyal();
        echo "<h3>Luggage :$lugg Kg</h3>";
        echo "<h3>Total Fare : &#8377;".($royal->fare($dist)+luggcalc($lugg))."</h3>";
    }
    elseif($ctype == "Ced SUV"){
        $suv = new CedSUV();
        echo "<h3>Luggage :$lugg Kg</h3>";
        echo "<h3>Total Fare : &#8377;".($suv->fare($dist)+2*luggcalc($lugg))."</h3>";
    }
}

?>