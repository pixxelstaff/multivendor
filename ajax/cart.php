<?php
include('../connect.php');
include('../customFunc.php');

header('Content-Type:application/json');

//taking data for simple product

$id = $_POST['id'];

$itemType  = $_POST['itemType'];

$qn = $_POST['quantity'];

$quantity = intval($qn);

$product_opts = json_decode($_POST['productOptions'], true);

$cookieArray = isset($_COOKIE['cart__data']) ? json_decode($_COOKIE['cart__data'], true) : [];

$cookie_array_column = array_column($cookieArray, 'id');
//pre defind the quantity exceed method

$qauntity_exceed_message =  array('status' => 'error', 'message' => 'the order quantity has exceeded the available product quantity');


//fetching items based on type and id?
if ($itemType == 'product') {
    $fetchProductData = fetchOtherdetails($con, 'product', 'id', $id);
    while ($sh = mysqli_fetch_assoc($fetchProductData)) {
        $productId = $sh['id'];
        $title = $sh['name'];
        $product_type = $sh['product_type'];
        $item_quantity = $sh['quantity'];
        $price = $sh['price'];
        $sale_price = $sh['sale_price'];
        $vendor_id = $sh['vendor_id'];
        $image = !empty($sh['featured_image']) ? $sh['featured_image'] : 'down.webp';
    }
    if ($product_type == 'attribute' || $product_type == 'variation') {
        //attribute things start here
        $productActualOpts = fetchOtherdetails($con, 'product_attributes', 'product_id', $id);
        while ($show_attr = mysqli_fetch_assoc($productActualOpts)) {
            $p__attr_options = json_decode($show_attr['attribute_value'], true);
            foreach ($product_opts as $opt_key => $opts_value) {
                if (strpos($p__attr_options[$opt_key], $opts_value['optValue']) !== false) {
                } else {
                    $unmatched_opts =  array('status' => 'error', 'message' => 'the options doesnot match');
                    echo json_encode($unmatched_opts);
                    exit();
                }
            }
        }
        //variation things starts
        if ($product_type == 'variation') {
            $variation_index = '';
            $product_variable_data = fetchOtherdetails($con, 'product_variations', 'product_id', $id);
            while ($var = mysqli_fetch_assoc($product_variable_data)) {
                $variations = json_decode($var['variations'], true);
                $takingOpts = '';
                foreach ($product_opts as $key => $vl) {
                    $takingOpts .= $vl['optValue'] . '-';
                }
                $trimOpt = remove__space(trim($takingOpts, '-'));
                //checking variation for dynamic price
                foreach ($variations as $vari_key => $vari_value) {
                    if (remove__space($vari_value['variation_name']) == $trimOpt) {
                        $variation_index =  $vari_key;
                    }
                }
                $filterVariationArr = $variations[$variation_index];
                $price = $filterVariationArr['variation_price'];
                $sale_price = $filterVariationArr['variation_sale_price'];
            }
        }
    }
}

if (in_array($id, $cookie_array_column)) {
    $item_index = array_search($id, $cookie_array_column);
    $targetArr = $cookieArray[$item_index];
    $updateQuantity =  $quantity + intval($targetArr['quantity']);
    if ($updateQuantity <= $item_quantity) {
        $targetArr['quantity'] = $updateQuantity;
        $targetArr['options'] = $product_opts;
        if ($product_type == 'variation') {
            $targetArr['price'] = $price;
            $targetArr['salePrice'] = $sale_price;
        }
        $cookieArray[$item_index] = $targetArr;
        $encoded_array = json_encode($cookieArray);
        setcookie('cart__data', $encoded_array, time() + 86400 * 30, '/');
        $successArr = array('status' => 'success', 'message' => 'the item is add successfully in cart', 'data' => $encoded_array);
        echo json_encode($successArr);
    } else {
        echo json_encode($qauntity_exceed_message);
    }
} else {

    if ($quantity <= $item_quantity) {
        $cart_item_data = array(
            'id' => $productId,
            'name' => $title,
            'price' => $price,
            'salePrice' => $sale_price,
            'quantity' => $quantity,
            'options' => $product_opts,
            'image' => $image,
            'vendor_id' => $vendor_id,
            'itemType' => 'product'
        );
        $cookieArray[] = $cart_item_data;
        $encoded_array  = json_encode($cookieArray);
        setcookie('cart__data', $encoded_array, time() + 86400 * 30, '/');
        $successArr = array('status' => 'success', 'message' => 'the item is add successfully in cart', 'data' => $encoded_array);
        echo  json_encode($successArr);
    }
}
