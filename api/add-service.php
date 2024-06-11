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

// including htmlpurifier;
require('../htmlpurifier/HTMLPurifier.kses.php');

$config = HTMLPurifier_Config::createDefault();

// Optional: customize configuration

$purifier = new HTMLPurifier($config);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($data['title']) && !empty($data['service_description']) && !empty($data['regular_price']) && !empty($data['service-category']) && !empty($data['service_data'])) {
        $title = mine_sanitize_string($data['title']);
        $des = $purifier->purify($data['service_description']);
        $sanitize_description = mine_sanitize_string($data['service_description'], true);
        $price = mine_sanitize_string($data['regular_price']);
        $sale_price = mine_sanitize_string($data['sale_price']);
        $service_type = mine_sanitize_string($data['service-type']);
        $available = mine_sanitize_string($data['available']);
        $startDate = mine_sanitize_string($data['service-start']);
        $endDate = mine_sanitize_string($data['service-end']);
        $start_time = mine_sanitize_string($data['service-time-start']);
        $end_time = mine_sanitize_string($data['service-time-end']);
        $city = mine_sanitize_string($data['service-city']);
        $area = mine_sanitize_string($data['service-area']);
        $category = mine_sanitize_string($data['service-category']);
        $location = mine_sanitize_string($data['location']);
        $serviceData = [];
        // $serviceDes = '';
        $excerpt = mine_sanitize_string($data['excerpt']);
        $tags = mine_sanitize_string($data['tags']);
        $uploadPath = '../images/uploadimg/';
        $service = $data['service_data'];
        $userId = $data['vendor_id'];
        $status = '1';
        $date = date('d-m-Y');

        if ($price > $sale_price) {

            //featured image code here


            $img = $data['featured_image'];
            //gallery image code here

            $galImg = $data['gallery_images'];

            $qry = "INSERT INTO `service`( `name`, `description`, `price`, `sale_price`, `service_type`, `available`,`start_date`,`end_date`,`start_time`, `end_time`, `city`, `area`, `category`,`location`, `services_data`, `excerpt`, `featured_image`, `gallery_images`,`tags`,`user_id`,`status`,`date`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $prepare_qry = mysqli_prepare($con, $qry);
            mysqli_stmt_bind_param($prepare_qry, 'ssssssssssssssssssssss', $title, $sanitize_description, $price, $sale_price, $service_type, $available, $startDate, $endDate, $start_time, $end_time, $city, $area, $category, $location, $service, $excerpt, $img, $galImg, $tags, $userId, $status, $date);
            if (mysqli_stmt_execute($prepare_qry)) {
                echo json_encode(array('status'=>'success','message'=>'the service is added successfully now it is ready to sell and buy'));
            } else {
                echo json_encode(array('status'=>'error','message'=>'something went wrong'));

            }
        } else {
            echo json_encode(array('status'=>'error','message'=>'sale price should less than actaul price'));

        }
    } else {
        echo json_encode(array('status'=>'error','message'=>'complete the details'));

    }
}


       