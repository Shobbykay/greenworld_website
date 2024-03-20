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
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $amount=$_POST['amount'];
    $reference=$_POST['reference'];
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
        
        } else if (!isset($_POST['phone']) || empty($_POST['phone'])){
            $response['status']='empty';
            $response['message']='One or more fields are empty';
        
        } else if (!isset($_POST['amount']) || empty($_POST['amount'])){
            $response['status']='empty';
            $response['message']='One or more fields are empty';
        
        } else if ($_POST['amount'] < 100){
            $response['status']='low_amount';
            $response['message']='You cannot donate less than 100 Naira';
        
        } else{
        
            $query="INSERT INTO donate(name, phone, email, amount, trans_ref, created_date) VALUES ('$name', '$phone','$email','$amount', '$reference','$created_date')";
        
            $q=mysqli_query($con, $query);
            
            if ($q){
                $response['status']='success';
                $response['message']='Donated successfully';
        
            } else{
                $response['status']='error';
                $response['message']='Unable to save donation details';
        
            }
        
        }
        // end of success

    }else{
        $response['status']='error';
        $response['message']='Transaction was unsuccessful. Please try again.';
    }
    
    
    
    echo json_encode($response);
    // end of else
}
