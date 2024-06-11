<?php
include('../connect.php');
include('../customFunc.php');

header('Content-Type:application/json');

$id = $_POST['id'];

$opts = $_POST['opts'];

$itemType = 'service';

$options = $opts;

$quantity = 1;

$inValidIdMessage = array('status' => 'error', 'message' => 'invalid product id failed to add item in cart');

//cookieVariable

$cookieArray = isset($_COOKIE['cart__data']) ? json_decode($_COOKIE['cart__data'], true) : [];

$cookie_array_column = array_column($cookieArray, 'id');

$fetchServiceData = fetchOtherdetails($con, 'service', 'Id', $id);

if (mysqli_num_rows($fetchServiceData) > 0) {
    while ($data = mysqli_fetch_assoc($fetchServiceData)) {
        $ser__id = $data['Id'];
        $title = $data['name'];
        $price = $data['price'];
        $sale_price = $data['sale_price'];
        $vendor_id = $data['user_id'];
        $image = $data['featured_image'];
    }
} else {
    echo json_encode($inValidIdMessage);
    exit();
}


if (in_array($id, $cookie_array_column)) {
    $item_index = array_search($id, $cookie_array_column);
    $targetArr = $cookieArray[$item_index];
    $updateQuantity =  $quantity + intval($targetArr['quantity']);
    $targetArr['quantity'] = $updateQuantity;
    $cookieArray[$item_index] = $targetArr;
    $encoded_array = json_encode($cookieArray);
    setcookie('cart__data', $encoded_array, time() + 86400 * 30, '/');
    $successArr = array('status' => 'success', 'message' => 'the item is add successfully in cart', 'data' => $encoded_array);
    echo  json_encode($successArr);
} else {
    $cart_item_data =  array(
        'id' => $ser__id,
        'name' => $title,
        'price' => $price,
        'salePrice' => $sale_price,
        'quantity' => $quantity,
        'options' => $options,
        'image' => $image,
        'vendor_id' => $vendor_id,
        'itemType' => $itemType
    );
    $cookieArray[] = $cart_item_data;
    $encoded_array  = json_encode($cookieArray);
    setcookie('cart__data', $encoded_array, time() + 86400 * 30, '/');
    $successArr = array('status' => 'success', 'message' => 'the item is add successfully in cart', 'data' => $encoded_array);
    echo  json_encode($successArr);
}
