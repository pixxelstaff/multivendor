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
        ordders - Multivendor dashboard
    </title>
    <?php include('include/links.php') ?>

    <?php


    ?>
    <!-- cdn for datatables -->

</head>

<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300  position-absolute w-100 overlay-div"></div>
    <?php include('include/sidebar.php') ?>



    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <?php include('include/navbar.php');


        $order_qry_01  = mysqli_prepare($con, "SELECT * FROM `order` WHERE FIND_IN_SET(?,`vendor_ids`)");
        mysqli_stmt_bind_param($order_qry_01, 's', $v__user__id);
        mysqli_stmt_execute($order_qry_01);
        $orders = mysqli_stmt_get_result($order_qry_01);
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
                    <h6 class="brd-crumbs "><a href="index.php" class="brd-crumbs-active">Dashboard <?= $count ?></a>/<a href="orders.php" class="brd-crumbs-active">orders</a>/<a href="index.php">order list</a>/</h6>
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
                                <th><input type="checkbox" name="" id=""></th>
                                <th>
                                    <div class="d-flex gap-2 align-items-center">
                                        sno

                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex gap-2 align-items-center">
                                        Order-id
                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex gap-2 align-items-center">
                                        name
                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex gap-2 align-items-center">
                                        phone
                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex gap-2 align-items-center">
                                        email
                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex gap-2 align-items-center">
                                        items
                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex gap-2 align-items-center">
                                        items-quantity
                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex gap-2 align-items-center">
                                        Vendors
                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex gap-2 align-items-center">
                                        Order - Price
                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex gap-2 align-items-center">
                                        address
                                    </div>
                                </th>

                                <th>status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sno = 0 + $offset;
                            $order__data = mysqli_prepare($con, "SELECT * FROM `order` WHERE FIND_IN_SET(?, `vendor_ids`) ORDER BY `Id` DESC LIMIT ? OFFSET ?");
                            mysqli_stmt_bind_param($order__data, 'sii', $v__user__id, $limit, $offset);

                            if (mysqli_stmt_execute($order__data))
                                $order__result = mysqli_stmt_get_result($order__data);
                            while ($sh = mysqli_fetch_assoc($order__result)) {
                                $sno++;
                            ?>
                                <tr>
                                    <td><input type="checkbox" name="" id="<?= $sh['Id'] ?>"></td>
                                    <td><?= $sno  ?></td>
                                    <td><?= $sh['purchase_code']  ?></td>
                                    <td><?php echo $sh['name'] . ' ' . $sh['lastname']  ?></td>
                                    <td><?= $sh['phone'] ?></td>
                                    <td><?= $sh['email'] ?></td>
                                    <?php
                                    $fetch_order_items = fetchOtherdetailsCol2($con, 'order_items', 'order_id', $sh['Id'], 'item_vendor_id', $v__user__id);

                                    $item_names = [];
                                    $item_quantity = [];
                                    $item__state = [];
                                    while ($show = mysqli_fetch_assoc($fetch_order_items)) {
                                        $cut_title = substr($show['item_name'], 0, 30) . ' x ' . $show['item_quantity'];
                                        $item_quantity[] = $show['item_quantity'] . "<br>";
                                        $item_names[]  = ($cut_title) . "<br>";
                                        $item__state[] = $show['status'];
                                    }

                                    ?>
                                    <td><?= join('* ', $item_names); ?></td>
                                    <td><?= join('* ', $item_quantity) ?></td>
                                    <td><?php
                                        $fetch_vendor_data = fetchOtherdetails($con, 'vendor', 'Id', $v__user__id);
                                        $vendor_name = mysqli_fetch_assoc($fetch_vendor_data)['name'] . "<br>";

                                        echo $vendor_name;
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
                                            <a href="javascript:void(0)" class="delete-btn">
                                                <span class="material-symbols-outlined">
                                                    delete_forever
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