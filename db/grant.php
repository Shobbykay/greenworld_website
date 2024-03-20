<?php
require_once "config.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(!$_SERVER['REQUEST_METHOD'] == 'POST' || !isset($_POST['reference'])){  
    $response=array();
    $response['status']='error';
    $response['message']='Transaction reference not found';

} else{
    // start of else

    $name=$_POST['name'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $phone=$_POST['phone_number'];
    $dob=$_POST['dob'];
    $state=$_POST['state'];
    $lga=$_POST['lga'];
    $amount=$_POST['amount'];//grant request amount
    $bank_name=$_POST['bank_name'];
    $acc_num=$_POST['acc_num'];
    $account_name=$_POST['account_name'];
    $reference=$_POST['reference'];
    $purpose=addslashes($_POST['msg']);

    //date
    $from = new DateTime($dob);
    $to   = new DateTime('today');
    $diff = date_diff(date_create($dob), date_create('today'))->y;

    $response=array();
    
    $created_date=Date('Y-m-d h:i:s');

    //The parameter after verify/ is the transaction reference to be verified
    $url = 'https://api.paystack.co/transaction/verify/'.$reference;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt(
    $ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer sk_live_0a8f380e5208f5723a7383c5c7de54e81ca9ee4c']
    );

    //send request
    $request = curl_exec($ch);
    //close connection
    curl_close($ch);
    //declare an array that will contain the result 
    $result = array();

    if ($request) {
    $result = json_decode($request, true);
    }

    if (array_key_exists('data', $result) && array_key_exists('status', $result['data']) && ($result['data']['status'] === 'success')) {
        
        //success
        if (!isset($_POST['email']) || empty($_POST['email'])){
            $response['status']='empty';
            $response['message']='One or more fields are empty';
        
        } else if (!isset($_POST['name']) || empty($_POST['name'])){
            $response['status']='empty';
            $response['message']='One or more fields are empty';
        
        } else if (!isset($_POST['phone_number']) || empty($_POST['phone_number'])){
            $response['status']='empty';
            $response['message']='One or more fields are empty';
        
        } else if (!isset($_POST['dob']) || empty($_POST['dob'])){
            $response['status']='empty';
            $response['message']='One or more fields are empty';
        
        } else if (!isset($_POST['state']) || empty($_POST['state'])){
            $response['status']='empty';
            $response['message']='One or more fields are empty';
        
        } else if (!isset($_POST['lga']) || empty($_POST['lga'])){
            $response['status']='empty';
            $response['message']='One or more fields are empty';
        
        } else if (!isset($_POST['amount']) || empty($_POST['amount'])){
            $response['status']='empty';
            $response['message']='One or more fields are empty';
        
        } else if (!isset($_POST['bank_name']) || empty($_POST['bank_name'])){
            $response['status']='empty';
            $response['message']='One or more fields are empty';
        
        } else if (!isset($_POST['acc_num']) || empty($_POST['acc_num'])){
            $response['status']='empty';
            $response['message']='One or more fields are empty';
        
        } else if (!isset($_POST['phone_number']) || empty($_POST['phone_number'])){
            $response['status']='empty';
            $response['message']='One or more fields are empty';
        
        } else if (!isset($_POST['msg']) || empty($_POST['msg'])){
            $response['status']='empty';
            $response['message']='One or more fields are empty';
        
        } else if ($diff < 18){
            $response['status']='under age';
            $response['message']='Oops! You have to be 18+ to apply for a grant.';
        
        } else if ($_POST['amount'] < 10000){
            $response['status']='low_amount';
            $response['message']='You cannot request for a grant less than 10,000 Naira';
        
        } else if ($_POST['amount'] > 3000000){
            $response['status']='low_amount';
            $response['message']='You cannot request for a grant over 3M Naira';
        
        } else if ((strlen($_POST['acc_num']) > 10) || (strlen($_POST['acc_num']) < 10)){
            $response['status']='invalid';
            $response['message']='Invalid account number entered'.$diff;
        
        } else{

            $query="INSERT INTO grant_application(fullname, gender, dob, phone, state, lga, amount, purpose, bank_code, account_number, acc_name, reference, created_date) VALUES ('$name','$gender','$dob','$phone','$state','$lga','$amount','$purpose','$bank_name','$acc_num','$account_name','$reference','$created_date')";
        
            $q=mysqli_query($con, $query);
            
            if ($q){
                $response['status']='success';
                $response['message']='Grant application successfully';
        
            } else{
                $response['status']='error';
                $response['message']='Unable to apply for grant';
        
            }
        
        }
        // end of success

    } else{
        $response['status']='error';
        $response['message']='Transaction was unsuccessful. Please try again.';


        //attempt to post to database
        $query="INSERT INTO grant_application(fullname, gender, dob, phone, state, lga, amount, purpose, bank_code, account_number, acc_name, reference, created_date) VALUES ('$name','$gender','$dob','$phone','$state','$lga','$amount','$purpose','$bank_name','$acc_num','$account_name','$reference','$created_date')";
        
        $q=mysqli_query($con, $query);
        
        if ($q){
            $response['status']='success';
            $response['message']='Grant application successfully. Payment verification pending.';
    
        } else{
            $response['status']='error';
            $response['message']='Unable to apply for grant';
    
        }
    }
    
    
    
    echo json_encode($response);
    // end of else
}
