<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "vendor/autoload.php";
include 'credential.php';
// $conn = new mysqli("localhost", "root", "", "cedcab") or die("Connection Unsucessful");
extract($_POST);

if($button == 1){
    $mail = new PHPMailer(true); 
  
try { 
    $random  = mt_rand(1000,9999);
    $mail->SMTPDebug = 2;                                        
    $mail->isSMTP();                                             
    $mail->Host       = $host;                     
    $mail->SMTPAuth   = true;                              
    $mail->Username   = $uss;                  
    $mail->Password   = $pass;                         
    $mail->SMTPSecure = $ssecure;                               
    $mail->Port       = $port;   

    $mail->setFrom($uss, $ussname);            
    $mail->addAddress($email); 
    
    $message = file_get_contents('emailtemp.html');
    $message = str_replace('%otp%', $random, $message); 
    
    $mail->isHTML(true);                               
    $mail->Subject = 'Verification for Email'; 
    $mail->MsgHTML($message);
    $mail->AltBody = 'Body in plain text for non-HTML mail clients'; 
    $mail->send(); 
    $_SESSION['otp']= $random;
    if(isset($_SESSION['otp']))  {
        $_SESSION['login_time_stamp']=time();
    } 
} catch (Exception $e) { 
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; 
} 
}

if($button==3){
    if(time()-$_SESSION["login_time_stamp"] >60)   
    { 
        session_unset(); 
        session_destroy();
        echo "Session Destroyed"; 
    }
    else{
        if($otpc == $_SESSION['otp']){
            echo "OTP Verified";
        }
        else
        {
            echo "OTP Not Verified<br>Please Generate New OTP";
        }
    }   
}


if($button ==2 ){
    $random  = mt_rand(10000,99999);
    $_SESSION['otp']= $random;
    if(isset($_SESSION['otp']))  {
        $_SESSION['login_time_stamp']=time();
    echo $random; 
    // $fields = array(
    //     "sender_id" => "FSTSMS",
    //     "message" => "Your OTP is $random",
    //     "language" => "english",
    //     "route" => "p",
    //     "numbers" => "$email",
    // );
    
    // $curl = curl_init();
    
    // curl_setopt_array($curl, array(
    //   CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
    //   CURLOPT_RETURNTRANSFER => true,
    //   CURLOPT_ENCODING => "",
    //   CURLOPT_MAXREDIRS => 10,
    //   CURLOPT_TIMEOUT => 30,
    //   CURLOPT_SSL_VERIFYHOST => 0,
    //   CURLOPT_SSL_VERIFYPEER => 0,
    //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //   CURLOPT_CUSTOMREQUEST => "POST",
    //   CURLOPT_POSTFIELDS => json_encode($fields),
    //   CURLOPT_HTTPHEADER => array(
    //     "authorization: VMO6jPSFAZofqyp49ntwLKed8Hs02rYWgBEbiC5GkJvUQuIxXcwHKbzPIAVF0u2NrQcXpMG1985vBkDT",
    //     "accept: */*",
    //     "cache-control: no-cache",
    //     "content-type: application/json"
    //   ),
    // ));
    
    // $response = curl_exec($curl);
    // $err = curl_error($curl);
    
    // curl_close($curl);
    
    // if ($err) {
    //   echo "cURL Error #:" . $err;
    // } else {
    //   echo $response;
    // }
}}

if($button == 8){
        $pass = md5($passw);
        // if ($name != '' && $email != '' && $mob != '' && $pass != '') {
        $conn = new mysqli("localhost", "root", "", "cedcab") or die("Connection Unsucessful");
    
        $sql_query = "insert into tbl_user(email_id,name,dateofsignup,mobile,status,password,is_admin) values('$email','$name',now(),'$mob','0','$pass','0')";
    
        $result = $conn->query($sql_query);
        $_SESSION['suser'] = $email;
            }
?>