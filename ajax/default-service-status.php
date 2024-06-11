<?php
include('../connect.php');
include('../customFunc.php');

header('Content-Type:application/json');


$item_id = $_POST['id'];
$status = $_POST['item_status'];
$date = date('d-m-Y');

if(!empty($item_id)  && $status != ''){
    $order_item_check = fetchOtherdetails($con,'order_items','Id',$item_id);
    if(mysqli_num_rows($order_item_check) > 0){
       $upd_qry = mysqli_prepare($con,"UPDATE `order_items` SET `status`=?,`date`=? WHERE `Id` = ?");
       mysqli_stmt_bind_param($upd_qry,'sss',$status,$date,$item_id);
       if(mysqli_stmt_execute($upd_qry)){
        echo json_encode(array('i_status'=>'success','message'=>'sucessfully updated the status','status'=> $status));

       }else{
        echo json_encode(array('i_status'=>'error','message'=>'something went wrong'));
       }

    }
    else{
        echo json_encode(array('i_status'=>'error','message'=>'that data u enter is invalid'));
    }
}
else{
    echo json_encode(array('i_status'=>'error','message'=>'enetr complete data'));
}