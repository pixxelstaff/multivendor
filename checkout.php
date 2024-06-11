<?php



session_start();







$cookie__data = isset($_COOKIE['cart__data']) ? json_decode($_COOKIE['cart__data'], true) : [];







if (isset($_GET['status']) && $_GET['status'] == 'success') {



    setcookie('cart__data', '', time() - 86400 * 30, '/');
}



?>







<!DOCTYPE html>



<html>







<head>



    <meta charset="utf-8" />



    <meta name="viewport" content="width=divice-width, initial-scale=1" />



    <title> Checkout</title>



    <?php include('include/links.php');



    require __DIR__ . '/vendor/autoload.php';







    // Recipient's email address







    use PHPMailer\PHPMailer\PHPMailer;







    $mail = new PHPMailer(true);







    $mail->isSMTP();



    $mail->Host = 'mail.sindhfurniture.com';



    $mail->SMTPAuth = true;



    $mail->Username = 'multivendor@sindhfurniture.com';



    $mail->Password = '@anus1925';



    $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, ssl also accepted



    $mail->Port = 465; // TCP port to connect to











    ?>



    <link rel="stylesheet" href="assets/css/single-product-page.css">



    <link rel="stylesheet" href="assets/css/cart.css">



    <style>
        .error {



            color: red !important;



        }
    </style>



</head>







<body>



    <?php include('include/header.php'); ?>











    <?php



    if (true) {



        if (count($cookie__data) > 0) {



            $vendor_id_column = array_column($cookie__data, 'vendor_id');



            $vendor__ids = implode(',', array_unique($vendor_id_column));



    ?>



            <div class="container-fluid cart-breadcrumbs checkout-bg-div">



                <div class="container">



                    <div class="row">



                        <div class="col-12">



                            <h2 class="text-center cart-crumbs"><a href="index.php">home</a> > <a href="">checkout</a></h2>



                        </div>



                    </div>



                </div>



            </div>



            <div class="container-fluid cart-main-wrapper">



                <div class="container">



                    <form action="" method="post" class="row" id="shah">



                        <div class="col-lg-8">



                            <div class="checkout-form col-12">



                                <h2 class="checkout-head">



                                    BILLING DETAILS



                                </h2>



                                <div class="col-12 d-flex flex-wrap check-form-row gap-2">



                                    <div class="check-inp-mini-div d-flex flex-column">



                                        <label for="">First name</label>



                                        <input type="text" name="firstname" id="">



                                    </div>



                                    <div class="check-inp-mini-div d-flex flex-column">



                                        <label for="">Last name</label>



                                        <input type="text" name="lastname" id="">



                                    </div>



                                </div>



                                <div class="col-12 d-flex flex-column check-inp-div check-form-row">



                                    <label for="" class="optional">Company name (optional)</label>



                                    <input type="text" name="companyName" id="">



                                </div>



                                <div class="col-12 d-flex flex-column check-inp-div check-form-row">



                                    <label for="">Country / Region</label>



                                    <select name="country" id="">



                                        <option value="">select country</option>



                                        <?php



                                        $country__data = fetchAllData($con, 'country');



                                        while ($cn = mysqli_fetch_assoc($country__data)) {



                                        ?>



                                            <option value="<?= $cn['Id'] ?>"><?= $cn['country'] ?></option>



                                        <?php



                                        }



                                        ?>



                                    </select>



                                </div>



                                <div class="col-12 d-flex flex-column check-inp-div check-form-row">



                                    <label for="">Street address</label>



                                    <input type="text" name="street_add_01" id="">



                                    <input type="text" name="street_add_02" id="">



                                </div>



                                <div class="col-12 d-flex flex-column check-inp-div check-form-row">



                                    <label for="">Town / City</label>



                                    <input type="text" name="city" id="">



                                </div>



                                <div class="col-12 d-flex flex-column check-inp-div check-form-row">



                                    <label for="">Zipcode</label>



                                    <input type="text" name="zipcode" id="">



                                </div>



                                <div class="col-12 d-flex flex-wrap check-form-row gap-2">



                                    <div class="check-inp-mini-div d-flex flex-column">



                                        <label for="">Phone </label>



                                        <input type="text" name="user_phone" id="">



                                    </div>



                                    <div class="check-inp-mini-div d-flex flex-column">



                                        <label for="">Email address</label>



                                        <input type="text" name="user_email" id="">



                                    </div>







                                </div>



                                <div class="col-12 d-flex flex-column check-inp-div check-form-row">



                                    <label for="" class="optional">Order notes (optional)</label>



                                    <textarea name="ordernote" id="" rows="4" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>



                                </div>



                            </div>



                        </div>



                        <div class="col-lg-4 checkout-items-div  p-4">



                            <div class="checkout-items-box col-12">



                                <h2 class="checkout-head">CART TOTALS</h2>



                                <div class="col-12 d-flex justify-content-between align-items-center check-item-row">



                                    <span class="ck-label">Product</span>



                                    <span class="ck-label">Subtotal</span>



                                </div>



                                <?php



                                if (isset($_COOKIE['cart__data'])) {



                                    $ch_items = json_decode($_COOKIE['cart__data'], true);



                                    $p__price = 0;



                                    $p__sub__total = 0;



                                    foreach ($ch_items as $cookie_key => $cookie_value) {



                                        if ($cookie_value['salePrice'] != '') {



                                            $p__price = $cookie_value['salePrice'];
                                        } else {



                                            $p__price = $cookie_value['price'];
                                        }



                                        $p__sub__total +=  intval($cookie_value['quantity']) * intval($p__price);



                                ?>



                                        <div class="col-12 d-flex justify-content-between align-items-center check-item-row">



                                            <div class="col-6 check-product">



                                                <p class="prduct-item-title">



                                                    <?= $cookie_value['name'] ?>



                                                </p>



                                                x <span class="p_qn"><?= $cookie_value['quantity'] ?></span>



                                            </div>



                                            <span class="ck-label"><?= (intval($cookie_value['quantity']) * intval($p__price)) ?>pkr</span>



                                        </div>



                                <?php



                                    }
                                }



                                ?>



                                <div class="cart-item-row col-12 d-flex justify-content-between align-items-center">



                                    <span class="ck-label">Subtotal</span>



                                    <span class="ck-label"><?= $p__sub__total ?>pkr</span>



                                </div>



                                <div class="cart-item-row col-12 d-flex justify-content-between align-items-center">



                                    <span class="ck-label">Shipping</span>



                                    <span class="ck-label">-</span>



                                </div>



                                <div class="cart-item-row col-12 d-flex justify-content-between align-items-center">



                                    <span class="ck-label">Tax</span>



                                    <span class="ck-label">-</span>



                                </div>



                                <div class="cart-item-row col-12 d-flex justify-content-between align-items-center">



                                    <span class="ck-label">Total</span>



                                    <span class="ck-label"><?= $p__sub__total ?>pkr</span>



                                    <input type="hidden" name="order_price" value="<?= $p__sub__total ?>">







                                </div>



                                <div class="col-12 checkout-btn-div mt-2">



                                    <div class="payment-options-div col-12 d-flex align-items-center">



                                        <input type="radio" name="paymentOpt" class="payOpts" id="cash_on_del" data-msg-id='csh-msg' value="cash on delivery">



                                        <label for="cash_on_del">Cash on delivery</label>



                                    </div>



                                    <div id="csh-msg" class="msg-boxes">



                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum veniam, error ut fugit minus aperiam odit quo at. Quis saepe eum iure suscipit a, unde nihil at dignissimos accusantium sit.



                                    </div>



                                    <div class="payment-options-div col-12 d-flex align-items-center">



                                        <input type="radio" name="paymentOpt" id="bank_transfer" data-msg-id='bank-msg' value="bank transfer" class="payOpts">



                                        <label for="bank_transfer">Bank transfer</label>



                                    </div>



                                    <div id="bank-msg" class="msg-boxes">



                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum veniam, error ut fugit minus aperiam odit quo at. Quis saepe eum iure suscipit a, unde nihil at dignissimos accusantium sit.



                                    </div>



                                    <input type="submit" class="place-order" name="place_order" value="place order">



                                </div>



                            </div>



                        </div>



                    </form>



                </div>



            </div>



        <?php



        } else {



        ?>







            <div class="login-div col-12 d-flex flex-column gap-2 justify-content-center align-items-center my-4 py-4">



                <img src="images/dashboard-img/empty-box.png" alt="" class="checkout-images">



                <h2 class="chk-page-msg">please add items or service in order to checkout</h2>



                <div class="col-12 d-flex justify-content-center gap-2">



                    <a href="shop.php" class="login-btn">Product</a>



                    <a href="my-services.php" class="login-btn">services</a>







                </div>



            </div>



        <?php



        }
    } else {



        ?>



        <div class="login-div col-12 d-flex flex-column gap-2 justify-content-center align-items-center my-4 py-4">



            <img src="images/dashboard-img/login-first.png" alt="" class="checkout-images">



            <h2 class="chk-page-msg">login is required while checking out.it helps us alot</h2>



            <a href="sign-in.php" class="login-btn">Login</a>



        </div>



    <?php



    }



    ?>















    <?php include('include/footer.php'); ?>



    <?php include('include/cartsection.php'); ?>







    <?php include('include/script.php'); ?>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>







    <script src="assets/js/index.js"></script>



    <script src="assets/js/cart-checkout.js"></script>



    <script>
        $(document).ready(function() {



            $("#shah").validate({



                rules: {



                    firstname: "required",

                    lastname: "required",

                    country: "required",

                    street_add_01: "required",

                    city: "required",

                    zipcode: {

                        required: true,

                        minlength: 5,

                    },

                    user_phone: {

                        required: true,

                        minlength: 11,

                    },

                    user_email: "required",

                },

                messages: {



                    firstname: "put your first name",

                    lastname: "put your last name",

                    country: "put your country name",

                    street_add_01: "put your street address",

                    city: "put your city name",

                    zipcode: {

                        required: "put your area zip code",

                        minlength: "zip code must be 5 digit",

                    },

                    user_phone: {

                        required: "put your valid phone number",

                        minlength: "phone number must be 10 digits",

                    },

                    user_email: "put your valid email",

                }





            })



        });
    </script>


    <?php

    if (isset($_POST['place_order']) && count($cookie__data) > 0) {
        if (!empty($_POST['firstname'])  && !empty($_POST['country']) && !empty($_POST['street_add_01']) && !empty($_POST['city']) && !empty($_POST['zipcode']) && !empty($_POST['user_phone']) && !empty($_POST['user_email']) && !empty($_POST['order_price']) && !empty($_POST['paymentOpt'])) {
            //======================making variables here ===============//
            $firstname = mine_sanitize_string($_POST['firstname']);
            $lastname = mine_sanitize_string($_POST['lastname']);
            $companyname = mine_sanitize_string($_POST['companyName']);
            $country = mine_sanitize_string($_POST['country']);
            $street_address_01 = mine_sanitize_string($_POST['street_add_01']);
            $street_address_02 = mine_sanitize_string($_POST['street_add_02']);
            $city = mine_sanitize_string($_POST['city']);
            $zipcode = mine_sanitize_string($_POST['zipcode']);
            $phone = mine_sanitize_string($_POST['user_phone']);
            $email = mine_sanitize_string($_POST['user_email']);
            $note = mine_sanitize_string($_POST['ordernote']);
            $orderprice = mine_sanitize_string($_POST['order_price']);
            $paymentMethod = mine_sanitize_string($_POST['paymentOpt']);
            $userId = '0';
            $purchase_code = 'reg-' . rand(1, 10000000);
            $status = $viewed = '0';
            $date = date('d-m-Y');
            //======================making variables here ===============//
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $insert_order_data = "INSERT INTO `order`( `name`, `lastname`, `companyname`, `country`, `address_01`, `address_02`, `city`, `zipcode`, `phone`, `email`, `note`,`orderprice`, `payment_option`,`vendor_ids`,`user_id`, `purchase_code`,`viewed`,`status`, `date`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $prepare_insert_order_data = mysqli_prepare($con, $insert_order_data);
                mysqli_stmt_bind_param($prepare_insert_order_data, 'sssssssssssssssssss', $firstname, $lastname, $companyname, $country, $street_address_01, $street_address_02, $city, $zipcode, $phone, $email, $note, $orderprice, $paymentMethod, $vendor__ids, $userId, $purchase_code, $viewed, $status, $date);
                $confirmation = '';

                if (mysqli_stmt_execute($prepare_insert_order_data)) {
                    $last_id_inserted = mysqli_insert_id($con);
                    $cookie_items = json_decode($_COOKIE['cart__data'], true);
                    $status = '0';
                    $date = date('d-m-Y');
                    $order_item_price = '';
                    foreach ($cookie__data as $c_key => $c_value) {
                        if ($c_value['salePrice'] != '') {
                            $order_item_price = $c_value['salePrice'];
                        } else {
                            $order_item_price = $c_value['price'];
                        }
                        $order_item_name =  $c_value['name'];
                        $order_item_quantity =  $c_value['quantity'];
                        $or_quantity =  intval($order_item_quantity);
                        $order_item_id = $c_value['id'];
                        $order_item_vendor_id = $c_value['vendor_id'];
                        $order_price = (intval($order_item_price) * intval($order_item_quantity));
                        $order_item_option = '';
                        $order_item_type = $c_value['itemType'];
                        if (is_array($c_value['options'])) {
                            $string_holder = [];
                            foreach ($c_value['options'] as $option_key => $options_value) {
                                $option_data = join(' : ', array_values($options_value));
                                $string_holder[] = $option_data;
                                $order_item_option = implode(',', $string_holder);
                            }
                        } else {
                            $order_item_option = $c_value['options'];
                        }
                        $order_item_image = $c_value['image'];
                        $order_item_code = generateRandomAlphabets(3) . '-' . $last_id_inserted . '-' . rand(1, 10000000);
                        $order_id = $last_id_inserted;

                        $order_item_query = "INSERT INTO `order_items`(`item_name`, `item_id`, `item_vendor_id`, `item_quantity`, `item_price`, `item_options`,`item_type`, `image`, `order_code`, `order_id`, `status`,`admin_view`,`vendor_view`, `date`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                        $p_order_item_query = mysqli_prepare($con, $order_item_query);
                        mysqli_stmt_bind_param($p_order_item_query, 'ssssssssssssss', $order_item_name, $order_item_id, $order_item_vendor_id, $order_item_quantity, $order_price, $order_item_option, $order_item_type, $order_item_image, $order_item_code, $order_id, $status, $viewed, $viewed, $date);
                        if (mysqli_stmt_execute($p_order_item_query)) {
                            $confirmation = array('status' => 'success', 'message' => 'successfully submitted the data');
                        } else {
                            $confirmation = array('status' => 'error', 'message' => 'something went here');
                        }
                    }

                    //==================================email code ends here

                    if ($confirmation['status'] == 'success') {
                        $name = $firstname . ' ' . $lastname;
                        $mail->setFrom('multivendor@sindhfurniture.com', 'Multivendor');
                        $mail->addAddress($email, $name);
                        $mail->Subject = 'Thanks for Ordering';
                        $mail->isHTML(true);
                        //fetching data to send in email

                        $email_order_01 = fetchOtherdetails($con, 'order_items', 'order_id', $last_id_inserted);

                        $sub__total = 0;
                        $items_row = '';
                        //coyupon starts here
                        $coupon_block = '';
                        $coupon_block .= "
                    <tbody>
                    <td class='width:100%;padding:10px;'>
                    
                        <table style='max-width: 450px;margin:10px auto;'>
                            <tbody>
                                <tr>
                                    <td style='width: 100%;text-align:start;padding:10px;vertical-align:middle;font-size:18px;font-weight:400;font-family: Outfit, sans-serif;'>
                                        Your coupon code here
                                    </td>
                                </tr>
        
                            </tbody>
                        </table>
                    </td>
                   </tbody>
                    <tbody>";
                        $serial__no = 0;

                        while ($email_itms = mysqli_fetch_assoc($email_order_01)) {
                            $serial__no++;
                            $itm__name = $email_itms['item_name'];
                            $itm__quantity = $email_itms['item_quantity'];
                            $itm__options = $email_itms['item_options'];
                            $itm__type = $email_itms['item_type'];
                            $itm__price = $email_itms['item_price'];
                            $sub__total += intval($email_itms['item_price']);
                            $items_row .= "<tr>
                        <td style='border: 1px solid #eee;padding: 12px;font-size: 14px;font-weight: 400;font-family: Outfit, sans-serif;white-space:word-break;'> $serial__no</td>
                        <td style='padding: 12px;font-size: 14px;font-weight: 400;border: 1px solid #eee;font-family: Outfit, sans-serif;white-space:word-break;'>   $itm__name x $itm__quantity  </td>
                            <td style='padding: 12px; font-size: 14px;font-weight: 400;border: 1px solid #eee;font-family: Outfit, sans-serif;white-space:word-break;'> $itm__options </td>
                        <td style='padding: 12px; font-size: 14px;font-weight: 400;border: 1px solid #eee;font-family: Outfit, sans-serif;white-space:word-break;'> $itm__type </td>
                        <td style='border: 1px solid #eee;padding: 12px;font-size: 14px;font-weight: 400;font-family: Outfit, sans-serif;white-space:word-break;'>  $itm__price </td>
                    </tr>";
                        }
                        $items_row .= " <tr>
                    <td style='border: 1px solid #eee;padding: 12px;font-size: 14px;font-weight: 400;font-family: Outfit, sans-serif;white-space:word-break;text-align:right;' colspan='4'>subtotal</td>
                    <td style='border: 1px solid #eee;padding: 12px;font-size: 14px;font-weight: 400;font-family: Outfit, sans-serif;white-space:word-break;'>$sub__total</td>
                    </tr>";

                        //content of coupon code?

                        $coupon__code__01 = fetchOtherdetailsCol2($con, 'order_items', 'order_id', $last_id_inserted, 'item_type', 'service');

                        while ($cpn = mysqli_fetch_assoc($coupon__code__01)) {
                            $item__id = $cpn['item_id'];
                            $fetchservicedetails = fetchOtherdetails($con,'service','Id',$item__id);
                            while($vl =  mysqli_fetch_assoc($fetchservicedetails)){
                                $validity =$vl['validity'];

                            }
                            $modified_date = modify__date($validity);
                            $ser_name = $cpn['item_name'];
                            $ser_qty = $cpn['item_quantity'];
                            $ser_opt = $cpn['item_options'];
                            $ser_vendor = $cpn['item_vendor_id'];
                            if ($ser_vendor != '0') {
                                $vendor__d = fetchOtherdetails($con, 'vendor', 'Id', $ser_vendor);
                                $v__name = mysqli_fetch_assoc($vendor__d)['name'];
                            } else {
                                $v__name = 'anas';
                            }

                            $ser_price = $cpn['item_price'];
                            $ser__d = fetchOtherdetails($con, 'service', 'Id', $cpn['item_id']);
                            $location = mysqli_fetch_assoc($ser__d)['location'];
                            $coup__code = $cpn['order_code'];

                            $coupon_block .= " <tr>
                        <td style='width:100%;max-width:450px;min-height:250px;display:block;margin:10px auto;background:url(\"https://multivender.sindhexpress.com/coupon-bg.jpg\");background-size:cover;background-repeat:no-repeat;border-radius:16px;padding:10px;display:flex;align-items:center;'>

                            <table style='width:100%;padding:10px;'>
                                <tbody>
                                    <tr>
                                        <td style='width:100%;font-size:18px;color:#fff;padding:10px 0px;font-weight:500; font-family: Outfit, sans-serif;'>$ser_name - $ser_qty</td>
                                    </tr>
                                    <tr>
                                        <td style='width:100%;font-size:14px;color:#fff;padding:10px 0px;font-family: Outfit, sans-serif;'><span style='color:#FF9900;font-size:14px'>Vendor-name : </span> $v__name </td>
                                    </tr>
                                         <tr>
                                            <td style='width:30%;font-size:14px;color:#fff;padding:10px 0px;font-family: Outfit, sans-serif;'><span style='color:#FF9900;font-size:14px'>Price : </span> $ser_price </td>
                                            <td style='width:70%;font-size:14px;color:#fff;padding:10px 0px;font-family: Outfit, sans-serif;'><span style='color:#FF9900;font-size:14px'>valid till : </span> $modified_date </td>
                                        </tr>
                                        <tr>
                                            <td style='width:100%;font-size:14px;color:#fff;padding:10px 0px;font-family: Outfit, sans-serif;'><span style='color:#FF9900;font-size:14px'>Slot : </span> $ser_opt </td>
                                        </tr>
                                    <tr>
                                        <td style='width:100%;font-size:14px;color:#fff;padding:10px 0px;font-family: Outfit, sans-serif;'><span style='color:#FF9900;font-size:14px'>Location : </span> $location </td>
                                    </tr>
                                    <tr>
                                        <td style='width:100%;font-size:22px;color:#fff;padding:10px 0px;font-weight:700;font-family: Outfit, sans-serif;'>$coup__code</td>
                                    </tr>

                                </tbody>
                            </table>

                        </td>
                    </tr>";
                        }

                        $coupon_block .= '</tbody>';

                        if (mysqli_num_rows($coupon__code__01) > 0) {
                            $coupon__card__data =  $coupon_block;
                        } else {
                            $coupon__card__data = '';
                        }



                        //content for email template



                        $html_content = "<!DOCTYPE html>
                    <html lang='en'>
                    
                    <head>
                        <meta charset='UTF-8'>
                        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                        <link rel='preconnect' href='https://fonts.googleapis.com'>
                        <link rel='preconnect' href='https://fonts.gstatic.com' crossorigin>
                        <link href='https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap' rel='stylesheet'>
                    
                        <title>Document</title>
                    </head>
                    
                    <body>
                        <table style='width:100%;background:#fff;padding:10px;max-width:600px;border:1px solid #eee;margin:0px auto;border-radius:4px;' cellspacing='0'>
                            <tbody>
                                <tr>
                                    <td style='width: 100%;text-align:center;padding:10px;vertical-align:middle'><img src='https://multivender.sindhexpress.com/email-logo-1.png' alt=''></td>
                                </tr>
                            </tbody>
                            <tbody>
                                  <tr>
                                     <td class='width:100%;padding:10px;'>
                                      <table style='max-width: 450px;margin:10px auto;'>
                                        <tbody>
                                            <tr>
                                                <td style='width: 100%;text-align:left;padding:10px;vertical-align:middle;font-size:16px;font-weight:600;font-family: Outfit, sans-serif;color:#FF9600;'>
                                                    Dear  $name ,
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style='width: 100%;text-align:left;padding:10px;vertical-align:middle;font-size:12px;font-weight:400;font-family: Outfit, sans-serif;'>Thank you for choosing Multivendor for your recent purchase. </td>
                                            </tr>
                                            <tr>
                                                <td style='width: 100%;text-align:left;padding:10px;vertical-align:middle;font-size:12px;font-weight:400;font-family: Outfit, sans-serif;'> We're pleased to confirm that your order has been received and is now being processed. Here are the details of your order:</td>
                                            </tr>
                                        </tbody>
                                      </table>
                                     </td>
                                  </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td style='width:100%;padding:10px;'>
                                        <table style='width:100%;max-width: 450px;margin:10px auto;' cellspacing='0'>
                                            <thead style='border-collapse: collapse;color: #000000;background: #E1E1E1;'>
                                            
                                                <tr>
                                                    <th style='padding: 12px;font-size: 14px;font-weight: 400;font-family: Outfit, sans-serif;'>sno</th>
                                                    <th style='padding: 12px;font-size: 14px;font-weight: 400;border: 1px solid #eee;font-family: Outfit, sans-serif;'>name</th>
                                                    <th style='padding: 12px; font-size: 14px;font-weight: 400;border: 1px solid #eee;font-family: Outfit, sans-serif;'>options</th>
                                                    <th style='padding: 12px; font-size: 14px;font-weight: 400;border: 1px solid #eee;font-family: Outfit, sans-serif;'>item-type</th>
                                                    <th style='padding: 12px;font-size: 14px;font-weight: 400;font-family: Outfit, sans-serif;'>price</th>
                                                </tr>
                                            </thead>
                                            <tbody style='border-collapse: collapse;'>
                                                $items_row
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                            $coupon__card__data
                            <tbody>
                                <td class='width:100%;padding:0px;'>
                                    <table style='max-width: 450px;margin:10px auto;'>
                                        <tbody>
                                            <tr>
                          <td style='width: 100%;text-align:left;padding:10px 0px;vertical-align:middle;font-size:12px;font-weight:400;font-family: Outfit, sans-serif;'>
                              This coupon code serves as a token of our appreciation for choosing our service. You can redeem this code during your next purchase or service booking to enjoy exclusive benefits or discounts.
                          </td>
                                            </tr>
                                            <tr>
                          <td style='width: 100%;text-align:left;padding:10px 0px;vertical-align:middle;font-size:12px;font-weight:400;font-family: Outfit, sans-serif;'>
                              Once your service is successfully completed, please don't forget to share this coupon code with us. You can simply reply to this email with the code or provide it to our customer support team. Upon verification, we'll ensure that the benefits associated with this coupon are applied to your account.
                          </td>
                                            </tr>
                                            <tr>
                          <td style='width: 100%;text-align:left;padding:10px 0px;vertical-align:middle;font-size:12px;font-weight:400;font-family: Outfit, sans-serif;'>
                              Should you have any questions or require further assistance regarding your order or the coupon code, feel free to reach out to our customer support team at [Customer Support Email/Phone Number]. We're here to assist you every step of the way.
                          </td>
                                            </tr>
                                            <tr>
                          <td style='width: 100%;text-align:left;padding:10px 0px;vertical-align:middle;font-size:12px;font-weight:400;font-family: Outfit, sans-serif;'>
                              Thank you once again for choosing [Your Company Name]. We greatly value your business and look forward to serving you again soon.
                          </td>
                                            </tr>
                                            <tr>
                          <td style='width: 100%;text-align:left;padding:10px 0px;vertical-align:middle;font-size:12px;font-weight:400;font-family: Outfit, sans-serif;'>
                              Best regards,
                          </td>
                                            </tr>
                                            <tr>
                          <td style='width: 100%;text-align:left;padding:10px 0px;vertical-align:middle;font-size:12px;font-weight:400;font-family: Outfit, sans-serif;'>
                              [Your Name] [Your Position/Title] [Your Company Name] [Your Contact Information]
                          </td>
                                            </tr>
                    
                                        </tbody>
                                    </table>
                                </td>
                            </tbody>
                    
                        </table>
                    
                    </body>
                    
                    </html> ";

                        $mail->Body = $html_content;
                        $mail->AltBody = 'This is the plain text message body';

                        // Send email and check if it sends successfully
                        if ($mail->send()) {
    ?>
                            <script>
                                window.location = "checkout.php?status=success&order-id=<?= $order_id ?>";
                            </script>
        <?php
                        } else {
                            alerting('failed to send the email', "checkout.php?status=success&order-id=<?= $order_id ?>");
                        }
                    } else {
                        alerting('something went wrong', 'index.php');
                    }


                    // confirmation == success fails if block ends here
                } else {
                    // echo "<h1>query execute nhi horagi</h1>";

                    alerting('unfortunately the purchase has failed', 'index.php');
                }
            } else {
                // echo "<h1>email hi validate nhi kararha</h1>";
                alerting('invalid email', 'checkout.php');
            }
        } else {
            alerting('fill the full info', 'checkout.php');
        }
    }


    if (isset($_GET['status']) && $_GET['status'] == 'success') {
        ?>
        <div class="order-complete-popop-wrapper">
            <div class="order-box-overlay"></div>
            <div class="order-complete-box">
                <div class="order-animation col-12 d-flex justify-content-center">
                    <img src="images/dashboard-img/success.gif" alt="">
                </div>
                <h4 class="order-completion-title">Thank you for ordering</h4>
                <p class="order-completion-message">congratulations your purchase has done successfully we will redirecting you for further details</p>
            </div>
        </div>
        <script>
            setTimeout(() => {
                window.location.href = 'thanku.php?order-id=<?= $_GET['order-id']  ?>';
            }, 2000)
        </script>
    <?php
    }

    ?>















</body>







</html>