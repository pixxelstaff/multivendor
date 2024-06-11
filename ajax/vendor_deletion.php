<?php
header('Content-Type:application/json');
include('../connect.php');
include('../customFunc.php');


$id = $_POST['id'];

$data = [];

function errorMsg($msg)
{
    echo json_encode(array('detail_status' => 'error', 'message' => $msg));
}

if ($id != '') {
    $fetch__vendor__details = fetchOtherdetails($con, 'vendor', 'Id', $id);
    if (mysqli_num_rows($fetch__vendor__details) > 0) {

        $fulfilled = '1';
        $active_order = mysqli_prepare($con, "SELECT * FROM `order_items` WHERE `item_vendor_id` = ? AND `status` != ?");
        mysqli_stmt_bind_param($active_order, 'ss', $id, $fulfilled);

        if (mysqli_stmt_execute($active_order)) {
            $result = mysqli_stmt_get_result($active_order);
            if (mysqli_num_rows($result) == 0) {

                $fetch__service = fetchOtherdetails($con, 'service', 'user_id', $id);
                if (mysqli_num_rows($fetch__service) > 0) {
                    $delete_service = deleteData($con, 'service', 'user_id', $id);
                    if (!$delete_service > 0) {
                        errorMsg('failed to delete the service');
                        exit();
                    }
                }

                $fetch__product = fetchOtherdetails($con, 'product', 'vendor_id', $id);
                if (mysqli_num_rows($fetch__product) > 0) {
                    while ($prd = mysqli_fetch_assoc($fetch__product)) {
                        $productId = $prd['id'];
                        $productType = $prd['product_type'];

                        if ($productType == 'attribute' || $productType == 'variation') {
                            $del_attr = deleteData($con, 'product_attributes', 'product_id', $productId);
                            if ($del_attr == 0) {
                                errorMsg('failed to delete the product_attributes');
                                exit();
                            }
                            if ($productType == 'variation') {
                                $del_variation = deleteData($con, 'product_variations', 'product_id', $productId);
                                if ($del_variation == 0) {
                                    errorMsg('failed to delete the product_variations');
                                    exit();
                                }
                            }
                        }
                    }
                    $del_prd = deleteData($con, 'product', 'vendor_id', $id);
                    if ($del_variation == 0) {
                        errorMsg('failed to delete the products');
                        exit();
                    }
                }

                $delete_vendor = deleteData($con, 'vendor', 'Id', $id);
                if (!$delete_vendor > 0) {
                    errorMsg('failed to delete the vendor');
                    exit();
                }

                echo json_encode(array('detail_status' => 'success', 'message' => 'successfully deleted all the data'));
                
            } else {
                errorMsg('we cannot further proceed because vendor has un-complete orders');
                exit();
            }
        } else {
            errorMsg('query doesnot executed something went wrong');
            exit();
        }
    } else {
        errorMsg('data not found the id u provide is invalid');
        exit();
    }
} else {
    errorMsg('the id u provided empty');
}
