<?php
header('Content-Type:application/json');
include('../connect.php');
include('../customFunc.php');


$id = $_POST['id'];

$data = [];

function errorMsg($msg)
{
    echo json_encode(array('detail_status' => 'error', 'message' => $msg));
}

if ($id != '') {
    $fetch__vendor__details = fetchOtherdetails($con, 'vendor', 'Id', $id);
    if (mysqli_num_rows($fetch__vendor__details) > 0) {
        while($vendor__d = mysqli_fetch_assoc($fetch__vendor__details)){
            $vd__name = $vendor__d['name'];
        }

        $service__data = fetchOtherdetails($con,'service','user_id',$id);
        $service_number = mysqli_num_rows($service__data);
        //this is product number
        $product__data = fetchOtherdetails($con,'product','vendor_id',$id);
        $product__number = mysqli_num_rows($product__data);

        $custom__msg = "the vendor ".$vd__name." has following number of services ".$service_number." and products ".$product__number.". by confirming it delete all data of vendor including order details";


        echo json_encode(array('detail_status' => 'success', 'message' => $custom__msg));

    } else {
        errorMsg('data not found the id u provide is invalid');
        exit();
    }
} else {
    errorMsg('the id u provided empty');
}
