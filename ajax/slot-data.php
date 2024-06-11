<?php

header('Content-Type:application/json');

include('../connect.php');
include('../customFunc.php');


$id = $_POST['id'];
// $id = 9;

$value = $_POST['value'];
// $value = 'saturday';

if (!empty($id) && !empty($value)) {

    $fetchSlot = fetchOtherdetails($con, 'service_slot', 'Id', $id);

    $wanted__data = '';

    while ($sh = mysqli_fetch_assoc($fetchSlot)) {
        $slot_data = json_decode($sh['slot_data'], true);
    }
    foreach ($slot_data as $day_data) {
        // Check if the "saturday" key exists in the current array
        if (isset($day_data[$value])) {
            // If it exists, add the "saturday" value to the result array
            $wanted__data = $day_data[$value];
            break; // Exit the loop since we found the "saturday" key
        }
    }
    
    if(!empty($wanted__data)){
        echo json_encode(array('slot_status' => 'success', 'message' => 'successfullt fetch data','data'=>$wanted__data));
    }else{
        echo json_encode(array('slot_status' => 'error', 'message' => 'unable to find data'));

    }
} else {
    echo json_encode(array('slot_status' => 'error', 'message' => 'provide complete data'));
}
