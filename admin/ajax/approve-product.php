<?php
include('../../connect.php');
include('../../customFunc.php');
$id = $_POST['id'];
$status = $_POST['status'];

$data = [];

$qry = fetchOtherdetails($con,'product','id',$id);
if(mysqli_num_rows($qry) > 0){
    $upd_Qry = "UPDATE `product` SET `approve` = ? WHERE `id` = ?";
    $upd_Qry_p = mysqli_prepare($con,$upd_Qry);
    mysqli_stmt_bind_param($upd_Qry_p,'ss',$status,$id);
    if(mysqli_stmt_execute($upd_Qry_p)){
        $data = array('status'=>'success','message'=>'the product is approved successfully');
    }
    else{
        $data = array('status'=>'error','message'=>'the failed to approved the product');
    }

}
else{
    $data = array('status'=>'error','message'=>'the product is not available');
}

header('Content-type:application/json');

echo json_encode($data);