<?php


header('Content-Type:application/json');

$itemId = $_POST['id'];

$cookieData = isset($_COOKIE['cart__data']) ? json_decode($_COOKIE['cart__data'], true) : [];

if (count($cookieData) > 0) {
    $id__array = array_column($cookieData, 'id');
    if (in_array($itemId, $id__array)) {
        $itemIndex = array_search($itemId, $id__array);
        unset($cookieData[$itemIndex]);
        if(count($cookieData) != 0){
            $updateArray  = json_encode([...$cookieData]);
            setcookie('cart__data', $updateArray, time() + 86400 * 30, '/');
            echo json_encode(array('status' => 'success', 'message' => 'the item is add successfully in cart', 'data' => $updateArray));
        }
        else{
            $updateArray  = json_encode([]);
            setcookie('cart__data', $updateArray, time() - 86400 * 30, '/');
            echo json_encode(array('status' => 'success', 'message' => 'the cart is empty now', 'data' => $updateArray));
        }
       
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'the item you are trying to update is not present'));
    }
} else {
    echo json_encode(array('status' => 'error', 'message' => 'unable to update the data'));
}
