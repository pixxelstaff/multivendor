<?php

include('../connect.php');
include('../customFunc.php');
header('Content-Type:application/json');
$id = $_POST['id'];
$data = [];
if ($_POST['id'] != '') {

    $city = fetchOtherdetails($con, 'city', 'Id', $id);
    if (mysqli_num_rows($city) > 0) {


        while ($sh = mysqli_fetch_assoc($city)) {
            $data[] = array('id' => $sh['Id'], 'name' => $sh['name'],'country_id'=>$sh['country_id']);
        }
        //fetching all country in order to 
        $country_json_data = [];

        $country = fetchAllData($con, 'country');

        while ($country_dt = mysqli_fetch_assoc($country)) {

            $country_json_data[] = array('Id' => $country_dt['Id'], 'name' => $country_dt['country']);

        }
        
        echo json_encode(array('status_define' => 'success', 'message' => 'successfully fetch city', 'data' => $data,'country_data'=>$country_json_data));

    } else {
        echo json_encode(array('status_define' => 'error', 'message' => 'data not found'));
    }
} else {
    echo json_encode(array('status_define' => 'error', 'message' => 'invalid id'));
}


