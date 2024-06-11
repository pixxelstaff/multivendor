<?php

include('../connect.php');
include('../customFunc.php');

// $id = 5;
$id = $_POST['variation_id'];

$variation_name = json_decode($_POST['vari_name'], true);

if (!in_array('', $variation_name)) {

    $joined_var_name = remove__space(join('-', $variation_name));

    $array_index = '';

    $variation__data = fetchOtherdetails($con, 'product_variations', 'Id', $id);
    //variations
    $variation_json_data  = mysqli_fetch_assoc($variation__data)['variations'];
    //decoding variations
    $decoded_variation_data = json_decode($variation_json_data, true);

    foreach ($decoded_variation_data as $var_key => $variations__value) {
        if (remove__space($variations__value['variation_name']) == $joined_var_name) {
            $array_index = $var_key;
            $res_type = 'success';
            break;
        } else {
            $res_type = 'error';
        }
    }
    $resultArray[] =  $decoded_variation_data[$array_index];
    if ($res_type == 'success') {
        $response = array('status' => $res_type, 'data' => $resultArray);
    } else {
        $response = array('status' => $res_type, 'message'=>'we doesnot found any match');
    }
    header('Content-Type:application/json');
    echo json_encode($response);
} else {
    echo json_encode(array('status' => 'error', 'message'=>'select all the options'));
}

//[{"variation_name":"silver - orange","variation_price":"2100","variation_sale_price":"","variation_length":"40","variation_width":"40","variation_height":"80","variation_quantity":"30","variation_sku":"ght-90890","variation_stock":"1","variation_exercept":"T900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep MonitoringT900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep MonitoringT900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep Monitoring"},{"variation_name":"silver - grey","variation_price":"2200","variation_sale_price":"","variation_length":"40","variation_width":"160","variation_height":"80","variation_quantity":"50","variation_sku":"ght-90890","variation_stock":"1","variation_exercept":"T900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep MonitoringT900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep MonitoringT900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep Monitoring"},{"variation_name":"silver - light grey","variation_price":"2300","variation_sale_price":"1900","variation_length":"40","variation_width":"40","variation_height":"80","variation_quantity":"50","variation_sku":"wre-0987","variation_stock":"1","variation_exercept":"T900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep MonitoringT900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep MonitoringT900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep Monitoring"},{"variation_name":"silver - black","variation_price":"2900","variation_sale_price":"2600","variation_length":"40","variation_width":"40","variation_height":"80","variation_quantity":"123","variation_sku":"ght-90890","variation_stock":"1","variation_exercept":"T900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep MonitoringT900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep MonitoringT900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep Monitoring"},{"variation_name":"silver - white","variation_price":"2500","variation_sale_price":"","variation_length":"40","variation_width":"40","variation_height":"40","variation_quantity":"30","variation_sku":"ght-90890","variation_stock":"1","variation_exercept":"T900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep MonitoringT900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep MonitoringT900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep Monitoring"},{"variation_name":"black- orange","variation_price":"2500","variation_sale_price":"1700","variation_length":"40","variation_width":"160","variation_height":"80","variation_quantity":"123","variation_sku":"lenovo-4-100","variation_stock":"1","variation_exercept":"T900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep MonitoringT900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep MonitoringT900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep Monitoring"},{"variation_name":"black- grey","variation_price":"2500","variation_sale_price":"1900","variation_length":"40","variation_width":"40","variation_height":"40","variation_quantity":"50","variation_sku":"wre-0987","variation_stock":"1","variation_exercept":"T900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep MonitoringT900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep MonitoringT900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep Monitoring"},{"variation_name":"black- light grey","variation_price":"1700","variation_sale_price":"","variation_length":"40","variation_width":"40","variation_height":"80","variation_quantity":"50","variation_sku":"wre-0987","variation_stock":"1","variation_exercept":"T900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep MonitoringT900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep MonitoringT900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep Monitoring"},{"variation_name":"black- black","variation_price":"2500","variation_sale_price":"","variation_length":"40","variation_width":"40","variation_height":"40","variation_quantity":"50","variation_sku":"wre-0987","variation_stock":"1","variation_exercept":"T900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep MonitoringT900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep MonitoringT900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep Monitoring"},{"variation_name":"black- white","variation_price":"2100","variation_sale_price":"","variation_length":"40","variation_width":"50","variation_height":"40","variation_quantity":"30","variation_sku":"lenovo-4-100","variation_stock":"1","variation_exercept":"T900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep MonitoringT900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep MonitoringT900 Ultra Smart Watch Series 8 - Bluetooth Call Smartwatch with Heart Rate and Sleep Monitoring"}]