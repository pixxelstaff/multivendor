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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($data['id'])) {
        $id = mine_sanitize_string($data['id']);
        $vendor__data = fetchOtherdetails($con, 'vendor', 'Id', $id);
        if (mysqli_num_rows($vendor__data) > 0) {
            $status = '';
            $info = '';
            while ($vd = mysqli_fetch_assoc($vendor__data)) {
                $status = $vd['approved'];
                $info = array(
                    'Id ' => $vd['Id'],
                    'name' => dec_function($vd['name']),
                    'surname' => dec_function($vd['surname']),
                    'email' => dec_function($vd['email']),
                    'phone' => dec_function($vd['phone']),
                    'cnic' => dec_function($vd['cnic']),
                    'business' => dec_function($vd['business']),
                    'business_url' => dec_function($vd['business_url']),
                    'country_code' => dec_function($vd['country_code']),
                    'zipcode' => dec_function($vd['zipcode']),
                    'address' => dec_function($vd['address']),
                    'city' =>'',
                    'country' => '',
                    'policy' => $vd['policy'],
                    'promo' => $vd['promo'],
                    'date' => $vd['date']
                );

                //fetching country name
                $country_name = fetchOtherdetails($con, 'country', 'Id', $vd['country']);
                $cn_name = mysqli_fetch_assoc($country_name)['country'];
                //fetching city name
                $city_name = fetchOtherdetails($con, 'city', 'Id', $vd['city']);
                $ct_name = mysqli_fetch_assoc($city_name)['name'];
                //updating data
                $info['city'] = $ct_name;
                $info['country'] = $cn_name;
            }
            if ($status == '1') {
                echo json_encode(array('status' => 'success', 'message' => 'successfully fetched data', 'data' => $info));
            } else {
                echo json_encode(array('status' => 'error', 'message' => 'he account you are trying to access is not approved yet'));
            }
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'no data found, invalid id'));
        }
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'please enter complete data or undefined keys'));
    }
}
