<?php
include('../connect.php');
include('../customFunc.php');
header('Content-Type:application/json');
$id = $_POST['id'];
$data = [];
if ($_POST['id'] != '') {

    $country = fetchOtherdetails($con, 'country', 'Id', $id);

    if (mysqli_num_rows($country) > 0) {
        while ($sh = mysqli_fetch_assoc($country)) {
            $data[] = array('id' => $sh['Id'], 'name' => $sh['country'], 'code' => $sh['country_code']);
        }
        echo json_encode(array('status_define' => 'success', 'message' => 'successfully fetch countrys', 'data' => $data));
    } else {
        echo json_encode(array('status_define' => 'error', 'message' => 'data not found'));
    }
} else {
    echo json_encode(array('status_define' => 'error', 'message' => 'invalid id'));
}
