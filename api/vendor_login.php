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

    if (isset($data['email']) && isset($data['password'])) {
        $email = mine_sanitize_string($data['email']);
        $password = $data['password'];

        $response = fetchOtherdetails($con, 'vendor', 'email', $email);

        if (mysqli_num_rows($response) > 0) {
            while ($rs = mysqli_fetch_assoc($response)) {
                $user_id = $rs['Id'];
                $hash_pass = $rs['password'];
                $status = $rs['approved'];
            }
            if (password_verify($password, $hash_pass)) {
                if ($status == '1') {
                    echo json_encode(array('status' => 'success', 'message' => 'the login is successful', 'data' => array('id' => $user_id, 'email' => $email)));
                } else {
                    echo json_encode(array('status' => 'error', 'message' => 'the account you are trying to access is not approved yet'));
                }
            } else {
                echo json_encode(array('status' => 'error', 'message' => 'Invalid password'));
            }
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Invalid email sign up for further actions'));
        }
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'please enter complete data or undefined keys'));
    }
}
