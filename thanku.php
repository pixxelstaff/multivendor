<?php
session_start();

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=divice-width, initial-scale=1" />
  <title>Thanku</title>
  <?php include('include/links.php'); ?>
  <link rel="stylesheet" href="assets/css/thanks.css">
  <?php

  if (isset($_GET['order-id'])) {
    $order_id = $_GET['order-id'];
    $order__details = fetchOtherdetails($con, 'order', 'Id', $order_id);
    while ($data = mysqli_fetch_assoc($order__details)) {
      $firstname = $data['name'];
      $lastname = $data['lastname'];
      $companyname = $data['companyname'];
      $country_id = $data['country'];
      $address_01 = $data['address_01'];
      $address_02 = $data['address_02'];
      $city = $data['city'];
      $zipcode = $data['zipcode'];
      $userphone = $data['phone'];
      $useremail = $data['email'];
      $note_msg = $data['note'];
      $order_price = $data['orderprice'];
      $payment_opt = $data['payment_option'];
      $vendor_ids = $data['vendor_ids'];
      $user_id = $data['user_id'];
      $order_code = $data['purchase_code'];
      $data = $data['date'];
    }

    $subtotal = 0;
  }

  ?>

</head>

<body>
  <?php include('include/header.php'); ?>

  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col-12 thanku-msg-div">
          <div class="icon-div d-flex col-12 aligns-item-center justify-content-center">
            <i class="fa-regular fa-circle-check"></i>
          </div>
          <p class="thk-message"><span class="highlighted-msg">Thanku You <?= $firstname  ?> <?= $lastname ?>!</span>Your order has being processed</p>
        </div>
        <div class="row">
          <div class="col-lg-9 col-md-12 col-sm-12">
            <div class="order-info col-12 d-flex flex-column gap-2">
              <h4>Order-id: #<?= $order_code ?></h4>
              <p>We have recieved your order and currently it is being processed. A confirmation email is has been sent to <?= $useremail ?></p>
            </div>
            <div class="order-details col-12">
              <h2 class="">customer information</h2>
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="d-flex col-12 flex-column order-data">
                    <h6>Contact information</h6>
                    <p><?= $useremail ?></p>
                  </div>
                  <div class="d-flex col-12 flex-column order-data">
                    <h6>Shipping address</h6>
                    <p><?= $address_01 ?></p>
                  </div>
                  <div class="d-flex col-12 flex-column order-data">
                    <h6>Shipping</h6>
                    <p>-</p>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                  <div class="d-flex col-12 flex-column order-data">
                    <h6>Phonenumber</h6>
                    <p><?= $userphone ?></p>
                  </div>
                  <div class="d-flex col-12 flex-column order-data">
                    <h6>Payment method</h6>
                    <p><?= $payment_opt ?></p>
                  </div>
                  <div class="d-flex col-12 flex-column order-data">
                    <h6>Order-id</h6>
                    <p><?= $order_code ?></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 table-responsive order-items-table">
              <h2>Order-items</h2>
              <table class="w-100">
                <thead>
                  <tr>
                    <th>sno</th>
                    <th>Item</th>
                    <th>option</th>
                    <th>Type</th>
                    <th>price</th>
                  </tr>
                </thead>
                <?php
                $items = fetchOtherdetails($con, 'order_items', 'order_id', $order_id);
                $sno = 0;

                ?>
                <tbody>
                  <?php
                  while ($sh = mysqli_fetch_assoc($items)) {
                    $sno++;
                    $i_name = $sh['item_name'];
                    $i_price = $sh['item_price'];
                    $i_opts = $sh['item_options'];
                    $i_quantity = $sh['item_quantity'];
                    $i_type = $sh['item_type'];
                    $i_total_price = intval($i_price);
                    $subtotal += $i_total_price;
                  ?>
                    <tr>
                      <td><?= $sno ?></td>
                      <td><?= $i_name ?> x <?= $i_quantity ?></td>
                      <td><?= $i_opts ?></td>
                      <td><?= $i_type ?></td>
                      <td>$<?= $i_total_price ?></td>
                    </tr>
                  <?php
                  }

                  ?>

                  <tr>
                    <td colspan="4" class="subt">subtotal</td>
                    <td>$<?= $subtotal ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="col-12 d-flex flex-wrap coupon-parent">
              <?php
              $services = fetchOtherdetailsCol2($con, 'order_items', 'item_type', 'service', 'order_id', $order_id);
              while ($ser = mysqli_fetch_assoc($services)) {
                $item__id = $ser['item_id'];
                            $fetchservicedetails = fetchOtherdetails($con,'service','Id',$item__id);
                            while($vl =  mysqli_fetch_assoc($fetchservicedetails)){
                                $validity =$vl['validity'];

                            }
                            $modified_date = modify__date($validity);
                $ser_price = intval($ser['item_price']);
                $ser_quantity = intval($ser['item_quantity']);
                $ser_slot =($ser['item_options']);
                //fetching vendor data
                if ($ser['item_vendor_id'] != '0') {
                  $fetch_vendor_data = fetchOtherdetails($con, 'vendor', 'Id', $ser['item_vendor_id']);
                  $vendor__name = mysqli_fetch_assoc($fetch_vendor_data)['name'];
                } else {
                  $vendor__name = 'admin';
                }

                //fetch service location
                $fetch_service_data = fetchOtherdetails($con, 'service', 'Id', $ser['item_id']);
                $service__location = mysqli_fetch_assoc($fetch_service_data)['location'];
              ?>
                <div class="col-lg-6 col-md-12 col-sm-12 my-2 coupon_card">
                  <div class="col-12 coupon-div">
                    <img src="https://i.ibb.co/PYss3yv/map.png" alt="">
                    <div class="coupon-content-div d-flex flex-column w-100">
                      <h6 class="coupon-service-title">
                        <?= $ser['item_name'] ?> - <?= $ser_quantity ?>
                      </h6>
                      <p class="coupon-service-p"><span class="lbl">vendor-name :</span> <?= $vendor__name ?></p>
                      <p class="coupon-service-p"><span class="lbl">slot :</span> <?= $ser_slot ?> </p>
                      
                      <div class="w-100 d-flex gap-1">
                        <p class="coupon-service-p"><span class="lbl">price :</span> <?= $ser_price ?> </p>
                       <p class="coupon-service-p"><span class="lbl">valid till :</span> <?= $modified_date ?>  </p>
                      </div>
                      <p class="coupon-service-p"><span class="lbl">location : </span><?= $service__location ?></p>
                      <p class="coupon-code"><?= $ser['order_code'] ?></p>
                    </div>


                  </div>
                </div>
              <?php
              }
              ?>

            </div>
          </div>
          <div class="col-lg-3 col-md-12 col-sm-12">
            <div class="custom-summary-box col-12">
              <div class="order-expensive-div d-flex align-items-center justify-content-between">
                <span class="summary-label">Subtotal</span>
                <span class="summary-price">$<?= $subtotal ?></span>
              </div>
              <div class="order-expensive-div d-flex align-items-center justify-content-between">
                <span class="summary-label">shipping</span>
                <span class="summary-price"> -</span>
              </div>
              <div class="order-expensive-div d-flex align-items-center justify-content-between">
                <span class="summary-label">Tax</span>
                <span class="summary-price">-</span>
              </div>
              <div class="order-expensive-div d-flex align-items-center justify-content-between">
                <span class="summary-label">Total</span>
                <span class="summary-price">$<?= $subtotal ?></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <?php include('include/footer.php'); ?>


  <!-- /*this is code for cart*/ -->



  <?php include('include/script.php'); ?>


  <script src="assets/js/index.js"></script>





</body>

</html>