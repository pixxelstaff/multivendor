<?php


header('Content-Type:application/json');

$itemId = $_POST['id'];

$quantity = $_POST['quantity'];

$cookieData = isset($_COOKIE['cart__data']) ? json_decode($_COOKIE['cart__data'], true) : [];

if (count($cookieData) > 0) {
    $id__array = array_column($cookieData, 'id');
    if (in_array($itemId, $id__array)) {
        $itemIndex = array_search($itemId, $id__array);
        $up_item = $cookieData[$itemIndex];
        $up_item['quantity'] = $quantity;
        $cookieData[$itemIndex] = $up_item;
        $updateQuantity =  json_encode($cookieData);
        setcookie('cart__data', $updateQuantity, time() + 86400 * 30, '/');
        echo json_encode(array('status' => 'success', 'message' => 'successfully updated the quantity','data'=>$updateQuantity));
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'the item you are trying to update is not present'));
    }
} else {
    echo json_encode(array('status' => 'error', 'message' => 'unable to update the data'));
}
