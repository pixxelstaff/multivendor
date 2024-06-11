<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('location:login.php');
}

$trash_status = '-1';




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        orders - Multivendor dashboard
    </title>
    <?php include('include/links.php') ?>

    <?php

    $orders = mysqli_query($con, "SELECT * FROM `order` WHERE `trash` != '$trash_status'");

    $count = mysqli_num_rows($orders);

    $limit = 10;

    $page = isset($_GET['page']) ? $_GET['page'] : 1;

    $offset = ($page -  1) * $limit;

    ?>
    <!-- cdn for datatables -->

</head>

<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300  position-absolute w-100 overlay-div"></div>
    <?php include('include/sidebar.php') ?>



    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <?php include('include/navbar.php') ?>
        <!-- End Navbar -->
        <div class="container-fluid p-4">
            <form action="" method="post" id="act-form">
                <div class="col-12 p-2 rounded bg-white">
                    <div class="col-12 d-flex justify-content-between p-2 brd__crumbs">
                        <h3 class="page-head">order - list</h3>
                        <h6 class="brd-crumbs "><a href="index.php" class="brd-crumbs-active">Dashboard</a>/<a href="orders.php" class="brd-crumbs-active">orders</a>/<a href="index.php">order list</a>/</h6>
                    </div>



                    <!-- filter options -->
                    <div class="col-12  p-2 justify-content-start align-items-end gap-2 d-flex mt-4 other-type-filter">
                        <div class="filter-inp-div">
                            <label for="">Action**</label>
                            <input type="hidden" name="sub_data" value="sub">
                            <select name="action_select" class="product-sort w-100" id='act-select'>
                                <option value="">Action</option>
                                <option value="-1">Move to trash</option>
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
                                    <th><input type="checkbox" name="" id="all_check"></th>
                                    <th>
                                        sno
                                    </th>
                                    <th>
                                        Order-id
                                    </th>
                                    <th>
                                        name
                                    </th>
                                    <th>
                                        phone
                                    </th>
                                    <th>
                                        email
                                    </th>
                                    <th>
                                        items
                                    </th>
                                    <th>
                                        items-quantity
                                    </th>
                                    <th>
                                        Vendors
                                    </th>
                                    <th>
                                        Order - Price
                                    </th>
                                    <th>
                                        address
                                    </th>

                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sno = 0 + $offset;
                                $order__data = mysqli_prepare($con, "SELECT * FROM `order` WHERE `trash` != ? ORDER BY `Id` DESC LIMIT $limit OFFSET $offset");
                                mysqli_stmt_bind_param($order__data, 's', $trash_status);
                                if (mysqli_stmt_execute($order__data))
                                    $order__result = mysqli_stmt_get_result($order__data);
                                while ($sh = mysqli_fetch_assoc($order__result)) {
                                    $sno++;
                                ?>
                                    <tr class="<?= $sh['viewed'] == '0' ? 'un-viewed' : '' ?>">
                                        <td><input type="checkbox" name="orderId[]" id="<?= $sh['Id'] ?>" class="mini-checkbox" value="<?= $sh['Id'] ?>"></td>
                                        <td><?= $sno  ?></td>
                                        <td><?= $sh['purchase_code']  ?></td>
                                        <td><?php echo $sh['name'] . ' ' . $sh['lastname']  ?></td>
                                        <td><?= $sh['phone'] ?></td>
                                        <td><?= $sh['email'] ?></td>
                                        <?php
                                        $fetch_order_items = fetchOtherdetails($con, 'order_items', 'order_id', $sh['Id']);

                                        $item_names = [];
                                        $item_quantity = [];
                                        while ($show = mysqli_fetch_assoc($fetch_order_items)) {
                                            $cut_title = substr($show['item_name'], 0, 30) . ' x ' . $show['item_quantity'];
                                            $item_quantity[] = $show['item_quantity'] . "<br>";
                                            $item_names[]  = ($cut_title) . "<br>";
                                        }

                                        ?>
                                        <td><?= join('* ', $item_names); ?></td>
                                        <td><?= join('* ', $item_quantity) ?></td>
                                        <td><?php
                                            $vendor_name = [];
                                            $vendor_ids = explode(',', $sh['vendor_ids']);
                                            foreach ($vendor_ids as  $vn) {
                                                if ($vn == '0') {
                                                    $vendor_name[] = 'admin<br>';
                                                } else {

                                                    $fetch_vendor_data = fetchOtherdetails($con, 'vendor', 'Id', $vn);
                                                    if (mysqli_num_rows($fetch_vendor_data) > 0) {
                                                        $vendor_name[] = mysqli_fetch_assoc($fetch_vendor_data)['name'] . "<br>";
                                                    } else {
                                                        $vendor_name[] = "vendor deleted";
                                                    }
                                                }
                                                # code...
                                            }
                                            echo join('* ', $vendor_name);
                                            ?></td>
                                        <td><?= $sh['orderprice'] ?></td>
                                        <td><?= $sh['address_01']  ?></td>
                                        <td><?php
                                            $states_arr = array(
                                                '0' => array('class' => 'pending', 'name' => 'processing'),
                                                '1' => array('class' => 'complete', 'name' => 'complete'),

                                            );
                                            $sts = intval($sh['status']);

                                            $statename = $states_arr[$sts]['name'];
                                            $state = $states_arr[$sts]['class'];

                                            ?>
                                            <a href="javascript:void(0)" class="order-success <?= $state  ?>"><?= $statename ?></a>
                                        </td>
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
                        <div class="col-lg-4 col-md-6 col-sm-12 cus-pagination d-flex">
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
            </form>


            <?php include('include/footer.php') ?>


            <!-- footer here -->
        </div>
    </main>

    <!--   Core JS Files   -->
    <?php include('include/script.php') ?>
    <script src="../assets/js/product.js"></script>
    <script src="../assets/js/action.js"></script>


</body>

</html>
<?php

//action code starts here

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['sub_data'])) {
        $error = '';
        if (!empty($_POST['action_select']) && !empty($_POST['orderId'])) {
            $order__ids = $_POST['orderId'];
            if (is_array($order__ids)) {

                foreach ($order__ids as $sng__order_id) {
                    $orderData = fetchOtherdetails($con, 'order', 'Id', $sng__order_id);
                    if (mysqli_num_rows($orderData) > 0) {
                        while ($ord = mysqli_fetch_assoc($orderData)) {
                            $order__sts = $ord['status'];
                        }

                        if ($order__sts == '1') {
                            //ten items
                            $itemsStatus = [];
                            $fetchOrderItems = fetchOtherdetails($con, 'order_items', 'order_id', $sng__order_id);
                            while ($oItems = mysqli_fetch_assoc($fetchOrderItems)) {
                                $itemsStatus[] = $oItems['status'];
                            }

                            $unqStatus = array_unique($itemsStatus);

                            if (count($unqStatus) == 1 && in_array('1', $unqStatus)) {
                                $trash_order = mysqli_prepare($con, "UPDATE `order` SET `trash` = ? WHERE `Id` = ? ");
                                mysqli_stmt_bind_param($trash_order, 'ss', $trash_status, $sng__order_id);
                                if (mysqli_stmt_execute($trash_order)) {
                                    $suc__msg .= 'successfully trash the orders';
                                    $update_order_itms = mysqli_prepare($con, "UPDATE `order_items` SET `admin_trash` = ? WHERE `order_id` = ? ");
                                    mysqli_stmt_bind_param($update_order_itms, 'ss', $trash_status, $sng__order_id);
                                    if (mysqli_stmt_execute($update_order_itms)) {
                                        $suc__msg .= 'and successfully trash order items';
                                    } else {
                                        $suc__msg = '';
                                        $error = 'something went wrong for updating order items';
                                    }
                                };
                            } else {
                                $suc__msg = '';
                                $error = 'some of the product cannot be trash until there completion';
                            }
                        } else {
                            $suc__msg = '';
                            $error = 'some of the product cannot be trash until there completion';
                        }
                    }
                }
            } else {
                alerting('something went wrong', 'orders.php?page='.$page);
            }
        } else {
            alerting('something is empty', 'orders.php?page='.$page);
        }
    } else {
        alerting('something went wrong', 'orders.php?page='.$page);
    }
}

if (!empty($suc__msg)) {
    alerting($suc__msg, 'orders.php?page='.$page);
} elseif (!empty($error)) {
    alerting($error, 'orders.php?page='.$page);
}
