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
    if (isset($data['name'])  && isset($data['email']) && isset($data['phone'])  && isset($data['cnic']) && isset($data['business'])  && isset($data['country']) && isset($data['city']) && isset($data['zipcode']) && isset($data['address'])  && isset($data['countrycode']) && isset($data['password'])) {
        $name = mine_sanitize_string($data['name']);
        $surname = isset($data['surname']) ? mine_sanitize_string($data['surname']) : '';
        $email =  mine_sanitize_string($data['email']);
        $phone = mine_sanitize_string($data['phone']);
        $cnic = mine_sanitize_string($data['cnic']);
        $business = mine_sanitize_string($data['business']);
        $business_url = isset($data['businessurl']) ? mine_sanitize_string($data['businessurl']) : '';
        $country = mine_sanitize_string($data['country']);
        $city = mine_sanitize_string($data['city']);
        $zipcode = mine_sanitize_string($data['zipcode']);
        $address = mine_sanitize_string($data['address']);
        $countrycode = mine_sanitize_string($data['countrycode']);
        $promo = isset($data['promo']) ? $data['promo'] : '';
        $policy = isset($data['policy']) ? $data['policy'] : '';
        $gender = '';
        $approve = '0';
        $pass = $data['password'];
        $date = date('d-m-Y');

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $qData =   fetchOrdetailsCol3($con, 'vendor', 'email', "$email", 'phone', "$phone", 'cnic', "$cnic");

            if (mysqli_num_rows($qData) == 0) {
                $hash_pass = password_hash($pass, PASSWORD_DEFAULT);


                $insert_data = "INSERT INTO `vendor`( `name`, `surname`, `email`, `phone`, `cnic`, `business`, `business_url`, `country_code`, `zipcode`, `address`, `city`, `country`, `gender`, `password`, `policy`, `promo`, `approved`, `date`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

                $insert_data_p = mysqli_prepare($con, $insert_data);

                if ($insert_data_p) {
                    mysqli_stmt_bind_param($insert_data_p, 'ssssssssssssssssss', $name, $surname, $email, $phone, $cnic, $business, $business_url, $countrycode, $zipcode, $address, $city, $country, $gender, $hash_pass, $policy, $promo, $approve, $date);

                    if (mysqli_stmt_execute($insert_data_p)) {
                        // Query executed successfully
                        echo json_encode(array('status' => 'success', 'message' => 'the vendor data has been submitted we will email u after admin approval'));
                    } else {
                        // Query execution failed
                        echo json_encode(array('status' => 'error', 'message' => 'Failed to upload data' . mysqli_stmt_error($insert_data_p)));
                    }

                    mysqli_stmt_close($insert_data_p); // Close the prepared statement
                } else {
                    // Error in preparing the statement
                    echo json_encode(array('status' => 'error', 'message' => 'something went wrong'));
                }
            } else {
                echo json_encode(array('status' => 'error', 'message' => 'The email , phone OR cnic is already used'));
            }
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'please enter the valid email'));
        }
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'please enter complete data or undefined keys'));
    }
}
