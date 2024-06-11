<?php

session_start();
if (!isset($_SESSION['vendor_email'])) {
    header('location:login.php');
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        product orders - Multivendor dashboard
    </title>
    <?php include('include/links.php') ?>

    <?php

    // $orders = fetchAllData($con, 'order');
    //fetching data i want total no of orders of product


    ?>
    <!-- cdn for datatables -->

</head>

<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300  position-absolute w-100 overlay-div"></div>
    <?php include('include/sidebar.php') ?>



    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <?php include('include/navbar.php');

        $orders = fetchOtherdetailsCol2($con, 'order_items', 'item_type', 'product', 'item_vendor_id', $v__user__id);

        $count = mysqli_num_rows($orders);

        $limit = 10;

        $page = isset($_GET['page']) ? $_GET['page'] : 1;

        $offset = ($page -  1) * $limit;


        ?>
        <!-- End Navbar -->
        <div class="container-fluid p-4">
            <div class="col-12 p-2 rounded bg-white">
                <div class="col-12 d-flex justify-content-between p-2 brd__crumbs">
                    <h3 class="page-head">order - list</h3>
                    <h6 class="brd-crumbs "><a href="index.php" class="brd-crumbs-active">Dashboard</a>/<a href="orders.php" class="brd-crumbs-active">orders</a>/<a href="index.php">product list</a>/</h6>
                </div>



                <!-- filter options -->
                <div class="col-12  p-2 justify-content-start align-items-end gap-2 d-flex mt-4 other-type-filter">
                    <div class="filter-inp-div">
                        <label for="">Action**</label>
                        <select name="" id="" class="product-sort w-100">
                            <option value="">Action</option>
                            <option value="">Move to trash</option>
                            <option value="">Delete permenantly</option>
                            <option value="">Approve </option>
                        </select>
                    </div>

                    <div class="filter-inp-div">
                        <label for="">search**</label>
                        <input type="text" placeholder="search category" class="search-products w-100">
                    </div>

                </div>

                <div class="col-12 table-responsive product-wrapper">
                    <table class=" product-table w-100">
                        <thead>
                            <tr>
                                <th><input type="checkbox" name="all" id=""></th>
                                <th>
                                    <div class="d-flex gap-2 align-items-center">
                                        sno

                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex gap-2 align-items-center">
                                        name
                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex gap-2 align-items-center">
                                        quantity
                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex gap-2 align-items-center">
                                        order-price
                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex gap-2 align-items-center">
                                        options
                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex gap-2 align-items-center">
                                        item-code
                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex gap-2 align-items-center">
                                        Vendor
                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex gap-2 align-items-center">
                                        user name
                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex gap-2 align-items-center">
                                        order no
                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex gap-2 align-items-center">
                                        status
                                    </div>
                                </th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sno = 0 + $offset;
                            $order__data = mysqli_prepare($con, "SELECT * FROM `order_items` WHERE `item_type` = ? AND `item_vendor_id` = ?   ORDER BY `Id` DESC LIMIT $limit OFFSET $offset");
                            $type = 'product';
                            mysqli_stmt_bind_param($order__data, 'ss', $type, $v__user__id);
                            if (mysqli_stmt_execute($order__data))
                                $order__result = mysqli_stmt_get_result($order__data);
                            while ($sh = mysqli_fetch_assoc($order__result)) {
                                $sno++;
                            ?>
                                <tr>
                                    <td><input type="checkbox" name="productitem[]" value="<?= $sh['Id'] ?>"></td>
                                    <td><?= $sno  ?></td>
                                    <td><?= substr(dec_function($sh['item_name']), 0, 35)  ?></td>
                                    <td><?= $sh['item_quantity']  ?></td>
                                    <td>$<?= $sh['item_price'] ?></td>
                                    <td>
                                        <?php
                                        $opts = dec_function($sh['item_options']);
                                        if (!empty($opts)) {
                                            echo $opts;
                                        } else {
                                            echo "no options";
                                        }
                                        ?>
                                    </td>
                                    <td><?= $sh['order_code'] ?></td>
                                    <td>
                                        <?php
                                        $vendor_name = fetchOtherdetails($con, 'vendor', 'Id', $sh['item_vendor_id']);
                                        echo mysqli_fetch_assoc($vendor_name)['name'];
                                        ?>
                                    </td>
                                    <?php
                                    $order_details = fetchOtherdetails($con, 'order', 'Id', $sh['order_id']);
                                    while ($or = mysqli_fetch_assoc($order_details)) {
                                        $u__name = $or['name'];
                                        $u__lastname = $or['lastname'];
                                        $u__order_code = $or['purchase_code'];
                                    }
                                    ?>
                                    <td>
                                        <?= $u__name . '  ' . $u__lastname   ?>
                                    </td>
                                    <td>
                                        <?= $u__order_code   ?>
                                    </td>

                                    <td><?php
                                        $states_arr = array(
                                            '0' => array('class' => 'pending', 'name' => 'processing'),
                                            '1' => array('class' => 'complete', 'name' => 'complete'),
                                            '2' => array('class' => 'active-order', 'name' => 'delivered'),
                                            '3' => array('class' => 'shipping', 'name' => 'shipped'),
                                        );
                                        $sts = intval($sh['status']);

                                        $statename = $states_arr[$sts]['name'];
                                        $state = $states_arr[$sts]['class'];

                                        ?>
                                        <a href="javascript:void(0)" class="order-success <?= $state  ?>"><?= $statename ?></a>
                                    </td>
                                    <td>
                                        <div class="action-button-div">
                                            <a href="javascript:void(0)" class="eye-btn" data-item-id='<?= $sh['Id']  ?>'>
                                                <span class="material-symbols-outlined ">
                                                    visibility
                                                </span>
                                            </a>

                                        </div>
                                    </td>
                                </tr>

                            <?php
                            }
                            ?>




                        </tbody>

                    </table>
                </div>




                <!-- grid view column -->


                <!-- pagination and information -->
                <!-- pagination and information -->
                <?php
                $totalPage = ceil($count / $limit);
                $startNo = 1 + $offset;
                $rangeNo = min(($page * $limit), $count);
                ?>
                <div class="col-12 custom-pagination-wrapper d-flex justify-content-between my-2 px-4 align-items-center">
                    <div class="col-lg-4 col-md-6 col-sm-12 pagination-message">
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


            <!-- footer here -->
        </div>
    </main>

    <!--   Core JS Files   -->
    <?php include('include/script.php') ?>
    <script src="../assets/js/product.js"></script>

</body>

</html>