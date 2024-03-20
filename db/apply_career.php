<?php
require_once "config.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$name=$_POST['name'];
$email=$_POST['email'];
$gender=$_POST['gender'];
$dob=$_POST['dob'];
$state=$_POST['state'];
$lga=$_POST['lga'];
$phone=$_POST['phone'];
$nin=$_POST['nin'];
$cac=$_POST['cac'];
$apply_grant=$_POST['apply_grant'];
$address=addslashes($_POST['address']);
$created_date=Date('Y-m-d h:i:s');

    //date
    $from = new DateTime($dob);
    $to   = new DateTime('today');
    $diff = date_diff(date_create($dob), date_create('today'))->y;

$response=array();

if (!isset($_POST['name']) || empty($_POST['name'])){
    $response['status']='empty';
    $response['message']='Please provide a Name';

} else if (!isset($_POST['email']) || empty($_POST['email'])){
    $response['status']='empty';
    $response['message']='Please provide a valid email address';

} else if (!isset($_POST['state']) || empty($_POST['state'])){
    $response['status']='empty';
    $response['message']='Please select a state';

} else if (!isset($_POST['lga']) || empty($_POST['lga'])){
    $response['status']='empty';
    $response['message']='Please select a lga or change the state';

} else if (!isset($_POST['phone']) || empty($_POST['phone'])){
    $response['status']='empty';
    $response['message']='Please provide your phone number';

} else if (!isset($_POST['gender']) || empty($_POST['gender'])){
    $response['status']='empty';
    $response['message']='Please select your gender';

} else if (!isset($_POST['dob']) || empty($_POST['dob'])){
    $response['status']='empty';
    $response['message']='Please select your date of birth';

} else if ($diff < 18){
    $response['status']='under age';
    $response['message']='Oops! You have to be 18+ to apply for a career with us.';

} else if (strlen($_POST['nin']) != 11){
    $response['status']='empty';
    $response['message']='Invalid NIN entered. Please enter correctly.';

} else{
    $check_q="SELECT * FROM employment WHERE email='$email' AND phone='$phone'";
    $q__=mysqli_query($con, $check_q);
    $n__=mysqli_num_rows($q__);


    if ($n__ > 0){
        $response['status']='duplicate';
        $response['message']='You have applied for employment before.';

    } else{
        $query="INSERT INTO employment(name, gender, dob, state, lga, phone, email, nin, cac, business_address, apply_for_grant, created_date) VALUES ('$name','$gender','$dob','$state','$lga','$phone','$email','$nin','$cac','$address','$apply_grant','$created_date')";
        $q=mysqli_query($con, $query);
        
        if ($q){
            $response['status']='success';
            $response['message']='Application sent successfully';

        }
        else{
            $response['status']='error';
            $response['message']='An error occured while sending your application';

        }
    }

}

echo json_encode($response);