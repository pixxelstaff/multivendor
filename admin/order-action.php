<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('location:login.php');
}
$comp__ser = '1';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Order action - Multivendor dashboard
    </title>
    <?php include('include/links.php') ?>
    <link rel="stylesheet" href="../assets/css/order-action.css">
    <!-- cdn for datatables -->

</head>

<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300  position-absolute w-100 overlay-div"></div>
    <?php include('include/sidebar.php') ?>



    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <?php include('include/navbar.php') ?>
        <?php

        $admin__id = '0';

        $act_item = mysqli_prepare($con, "SELECT * FROM `order_items` WHERE `item_vendor_id` = ? AND `status` != ? ");

        mysqli_stmt_bind_param($act_item, 'ss', $admin__id, $comp__ser);

        if (mysqli_stmt_execute($act_item)) {
            $count_qry = mysqli_stmt_get_result($act_item);
        }


        $count = mysqli_num_rows($count_qry);

        $limit = 10;

        $page = isset($_GET['page']) ? $_GET['page'] : 1;

        $offset = ($page -  1) * $limit;

        ?>
        <!-- End Navbar -->
        <div class="container-fluid p-4">
            <div class="col-12 p-2 rounded bg-white">
                <div class="col-12 d-flex justify-content-between p-2 brd__crumbs">
                    <h3 class="page-head">Orders</h3>
                    <h6 class="brd-crumbs brd-crumbs-active"><a href="index.php">Dashboard</a>/<a href="">orders </a></h6>
                </div>



                <!-- filter options -->
                <div class="col-12  p-2 justify-content-start align-items-end gap-2 d-flex mt-4 other-type-filter">

                    <div class="filter-inp-div">
                        <label for="">search**</label>
                        <input type="text" placeholder="search category" class="search-products w-100">
                    </div>

                </div>

                <div class="col-12 table-responsive product-wrapper">
                    <table class=" product-table w-100">
                        <thead>
                            <tr>
                                <th>sno</th>
                                <th> Order-id</th>
                                <th> user name </th>
                                <th> item name</th>
                                <th>item type </th>
                                <th> vendor</th>
                                <th> quantity </th>
                                <th> item Price </th>
                                <th> shipping address </th>
                                <th> order date </th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $sno = 0;


                            $order_items = mysqli_prepare($con, "SELECT * FROM `order_items` WHERE `item_vendor_id` = ? AND `status` != ? ORDER BY `Id` DESC LIMIT $limit OFFSET $offset");

                            mysqli_stmt_bind_param($order_items, 'ss', $admin__id, $comp__ser);

                            if (mysqli_stmt_execute($order_items)) {

                                $order_res = mysqli_stmt_get_result($order_items);

                                $sno = 0;

                                while ($sh_order_items =  mysqli_fetch_assoc($order_res)) {
                                    $order_qry = fetchOtherdetails($con, 'order', 'Id', $sh_order_items['order_id']);
                                    while ($ord = mysqli_fetch_assoc($order_qry)) {
                                        $sno++;

                            ?>
                                        <tr>
                                            <td><?= $sno ?></td>
                                            <td><?= $ord['purchase_code']  ?></td>
                                            <td><?= $ord['name']  ?></td>
                                            <td><?= substr($sh_order_items['item_name'], 0, 30) ?></td>
                                            <td><?= $sh_order_items['item_type']  ?></td>
                                            <td>
                                                <?= 'admin' ?>
                                            </td>
                                            <td><?= $sh_order_items['item_quantity'] ?></td>
                                            <td><?= $sh_order_items['item_price']  ?></td>
                                            <td><?= $ord['address_01'] ?></td>
                                            <td><?= $ord['date'] ?></td>
                                            <td> <select name="" id="item_status" data-i-type='<?= $sh_order_items['item_type'] ?>' data-item_id='<?= $sh_order_items['Id'] ?>' class="product-sort w-120 items_state_pointer">

                                                    <?php
                                                    if ($sh_order_items['item_type'] == 'service') {
                                                        if ($sh_order_items['status'] == '0') {
                                                    ?>
                                                            <option value="0" <?= $sh_order_items['status'] == '0' ? 'selected' : ''  ?>>processing</option>
                                                        <?php
                                                        }
                                                        if ($sh_order_items['status'] == '2' || $sh_order_items['status'] == '0') {
                                                        ?>
                                                            <option value="2" <?= $sh_order_items['status'] == '2' ? 'selected' : ''  ?>>Active </option>
                                                        <?php
                                                        }
                                                        ?>
                                                        <option value="1" <?= $sh_order_items['status'] == '1' ? 'selected' : ''  ?>>complete </option>
                                                    <?php
                                                    } elseif ($sh_order_items['item_type'] == 'product') {
                                                    ?>
                                                        <option value="0">processing</option>
                                                        <option value="2">shipped </option>
                                                        <option value="3">delivered </option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select></td>
                                            <td>
                                                <div class="action-button-div">
                                                    <a href="javascript:void(0)" class="eye-btn">
                                                        <span class="material-symbols-outlined ">
                                                            visibility
                                                        </span>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                            <?php
                                    }
                                }
                            }
                            ?>



                        </tbody>
                    </table>
                </div>




                <!-- grid view column -->


                <!-- pagination and information -->
                <?php
                $totalPage = ceil($count / $limit);
                $startNo = 1 + $offset;
                $rangeNo = min(($page * $limit), $count);
                ?>
                <div class="col-12 custom-pagination-wrapper d-flex justify-content-between my-2 px-4 align-items-center">
                    <div class="col-lg-4 col-md-6 col-sm-12  pagination-message">
                        showing ( <span class="show-product-num"><?= $startNo ?></span> to <span class="total-product-num"><?= $rangeNo; ?></span> products )
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 cus-pagination d-flex ">
                        <div class="page-num-wrapper d-flex gap-2">
                            <?php
                            if ($page > 1) {
                            ?>
                                <a href="?page=<?= $page - 1 ?>" class="page-btn page-prev">
                                    <span class="material-symbols-outlined">
                                        arrow_back
                                    </span>
                                </a>
                            <?php
                            }
                            if ($page > 2) {
                            ?> <a href="?page=1" class="page-btn">1</a> <?php
                                                                        if ($page > 3) {   ?>
                                    <a href="javascript:void(0)" class="page-btn page-dots">
                                        <span class="material-symbols-outlined">
                                            page_control
                                        </span>
                                    </a>
                                <?php
                                                                        }
                                                                    }

                                                                    for ($i = $page - 1; $i <= $page + 1; $i++) {
                                                                        if ($i < 1) {
                                                                            continue;
                                                                        }
                                                                        if ($i > $totalPage) {
                                                                            continue;
                                                                        }
                                ?> <a href="?page=<?= $i ?>
                                " class="page-btn <?php echo $page == $i ?  'active-page' : '' ?> "><?= $i ?></a> <?php

                                                                                                                }
                                                                                                                    ?>


                            <?php
                            if ($page < $totalPage - 1) {
                                if ($page < $totalPage - 2) {
                            ?>
                                    <a href="javascript:void(0)" class="page-btn page-dots">
                                        <span class="material-symbols-outlined">
                                            page_control
                                        </span>
                                    </a>
                                <?Php
                                }
                                ?> <a href="?page=<?= $totalPage ?>" class="page-btn"><?= $totalPage ?></a> <?php
                                                                                                        }


                                                                                                        if ($page < $totalPage) {
                                                                                                            ?>
                                <a href="?page=<?= $page + 1 ?>" class="page-btn page-next">
                                    <span class="material-symbols-outlined">
                                        arrow_forward
                                    </span>
                                </a>
                            <?php
                                                                                                        }
                            ?>

                        </div>
                    </div>
                </div>
            </div>



            <?php include('include/footer.php') ?>

            <div class="verfication-div">
                <div class="order-overlay-div"></div>
                <div class="verfication-box">
                    <form action="" id="service-verfied">
                        <h4>service-verification</h4>
                        <p>Enter the coupon code in order to <span class="ser-status"></span> the service</p>
                        <input type="hidden" name="item_id" value="" id="order_item_id">
                        <input type="hidden" name="item_state" value="" id="item_state">
                        <input type="text" class="search-products" name="coupon_no" id="coupon_no" placeholder="lxx-xxxxxxxx">
                        <input type="submit" value="verify" class="verify-btn">

                    </form>
                    <!-- <div class="loader-div"><div class="loader"></div></div> -->
                </div>

            </div>


            <!-- footer here -->
        </div>
    </main>

    <!--   Core JS Files   -->
    <?php include('include/script.php') ?>

    <script src="../assets/js/product.js"></script>
    <script src="../assets/js/order-act.js"></script>
    <script src="../assets/js/service-verify.js"></script>

</body>

</html>