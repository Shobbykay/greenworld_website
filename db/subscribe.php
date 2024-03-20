<?php
require_once "config.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$email=$_POST['email'];
$response=array();

$browser_info=$_SERVER['HTTP_USER_AGENT'];
$created_date=Date('Y-m-d h:i:s');
$ip = getIPAddress();

if (!isset($_POST['email']) || empty($_POST['email'])){
    $response['status']='empty';

}else{
    $check_q="SELECT * FROM subscriptions WHERE email='$email'";
    $q__=mysqli_query($con, $check_q);
    $n__=mysqli_num_rows($q__);


    if ($n__ > 0){
        $response['status']='duplicate';
    } else{
        $query="INSERT INTO subscriptions(email, browser_info, ip_address, created_date) VALUES ('$email','$browser_info','$ip','$created_date')";

        $q=mysqli_query($con, $query);
        
        if ($q){
            $response['status']='success';
        }
        else{
            $response['status']='error';
        }
    }

}

echo json_encode($response);


function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  