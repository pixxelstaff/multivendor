<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Origin,Access-Control-Allow-Methods');

// Error Reporting (helpful for debugging)
ini_set('display_errors', 1);
error_reporting(E_ALL);

$data = json_decode(file_get_contents('php://input'), true);


include('../connect.php');
include('../customFunc.php');

$vendor_data = [];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($data['vendor_id'] != '') {
        $vendor_id = $data['vendor_id'];

        $fetch_service = fetchOtherdetails($con, 'service', 'user_id', $vendor_id);



        if (mysqli_num_rows($fetch_service) > 0) {

            //featured image code here
            while ($vd = mysqli_fetch_assoc($fetch_service)) {
                $service_data = array(
                    'name' => $vd['name'],
                    'description' => $vd['description'],
                    'price' => $vd['price'],
                    'sale_price' => $vd['sale_price'],
                    'type' => $vd['service_type'],
                    'available' => $vd['available'],
                    'start_date' => $vd['start_date'],
                    'end_date' => $vd['end_date'],
                    'start_time' => $vd['start_time'],
                    'end_time' => $vd['end_time'],
                    'city' => $vd['city'],
                    'area' => $vd['area'],
                    'category' => $vd['category'],
                    'location' => $vd['location'],
                    'services_data' => $vd['services_data'],
                    'exercept' => $vd['excerpt'],
                    'featured_image' => $vd['featured_image'],
                    'gallery_images' => $vd['gallery_images'],
                    'tags' => $vd['tags'],
                    'vendor_id' => $vd['user_id'],
                    'status' => $vd['status'],
                    'date' => $vd['date']
                );
                $vendor_data[] = $service_data;
            }
            $encoded_data = json_encode($vendor_data);
            echo json_encode(array('status' => 'success', 'message' => 'successfully fetch data','data'=>$encoded_data));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'data not found invalid id'));
        }
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'complete the details'));
    }
}
