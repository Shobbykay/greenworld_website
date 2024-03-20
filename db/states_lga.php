<?php
require_once "config.php";

$state=$_GET['st'];
//$fetch
$q=mysqli_query($con,"SELECT * FROM states_lga WHERE seq=2 AND parent='".$state."'");
$n=mysqli_num_rows($q);
$response=array();

if ($n>0){
    //contains output
    $response['status']='success';
    $response['data'] = array();
    while($f=mysqli_fetch_assoc($q)){
        // array_push($response['data'],$f);
        echo '<option value="'.$f['code'].'">'.$f['descrip'].'</option>';
    }
}
else{
    $response['status']='error';
    $response['data']='no data found';
    echo '';
}

// echo json_encode($response);