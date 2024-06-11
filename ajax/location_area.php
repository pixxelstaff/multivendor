<?php

include('../connect.php');
include('../customFunc.php');
header('Content-Type:application/json');
$id = $_POST['id'];
$data = [];
if ($_POST['id'] != '') {

    $area = fetchOtherdetails($con, 'area', 'Id', $id);
    if (mysqli_num_rows($area) > 0) {


        while ($sh = mysqli_fetch_assoc($area)) {
            $data[] = array('id' => $sh['Id'], 'name' => $sh['name'],'city_id'=>$sh['city_id']);
        }
        //fetching all city in order to 
        $city_json_data = [];

        $city = fetchAllData($con, 'city');

        while ($city_dt = mysqli_fetch_assoc($city)) {

            $city_json_data[] = array('Id' => $city_dt['Id'], 'name' => $city_dt['name']);

        }
        
        echo json_encode(array('status_define' => 'success', 'message' => 'successfully fetch area', 'data' => $data,'city_data'=>$city_json_data));

    } else {
        echo json_encode(array('status_define' => 'error', 'message' => 'data not found'));
    }
} else {
    echo json_encode(array('status_define' => 'error', 'message' => 'invalid id'));
}


