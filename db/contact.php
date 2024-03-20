<?php
require_once "config.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$name=$_POST['name'];
$email=$_POST['email'];
$msg=addslashes($_POST['msg']);
$created_date=Date('Y-m-d h:i:s');

$response=array();

if (!isset($_POST['name']) || empty($_POST['name'])){
    $response['status']='empty';
    $response['message']='Please provide a Name';

}else if (!isset($_POST['email']) || empty($_POST['email'])){
    $response['status']='empty';
    $response['message']='Please provide a valid email address';

}else if (!isset($_POST['msg']) || empty($_POST['msg'])){
    $response['status']='empty';
    $response['message']='Please provide a message';

}else{
    $check_q="SELECT * FROM contact WHERE email='$email' AND message='$msg'";
    $q__=mysqli_query($con, $check_q);
    $n__=mysqli_num_rows($q__);


    if ($n__ > 0){
        $response['status']='duplicate';
        $response['message']='This Message had already ben sent';

    } else{
        $query="INSERT INTO contact(name, email, message, created_date) VALUES ('$name','$email','$msg','$created_date')";
        $q=mysqli_query($con, $query);
        
        if ($q){
            $response['status']='success';
            $response['message']='Message sent successfully';

        }
        else{
            $response['status']='error';
            $response['message']='An error occured while sending your message';

        }
    }

}

echo json_encode($response);