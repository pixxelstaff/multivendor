<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('location:login.php');
}
$tr_status = '-1';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <link rel="stylesheet" href="../assets/css/order-action.css">

    <title>
        approve products || lanoote - saloon
    </title>
    <?php include('include/links.php');
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 10;
    $offset = ($page - 1) * $limit;
    $qry = mysqli_query($con, "SELECT * FROM `service` WHERE  `trash` = '$tr_status'");
    $count = mysqli_num_rows($qry);
    if (!is_numeric($page) || empty($page)) {
    ?>
        <script>
            alert('error');
            window.location.href = 'service-trash.php';
        </script>
    <?php
    }
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
                    <div class="col-12 d-flex justify-content-between brd__crumbs p-2">
                        <h3 class="page-head">Approve product</h3>
                        <h6 class="brd-crumbs">
                            <a href="index.php" class="brd-crumbs-active ">Dashboard</a>/
                            <a href="product.php" class="brd-crumbs-active ">product</a>/
                            <a href="javascript:void(0)">Approve product</a>
                        </h6>
                    </div>

                    <div class="col-12  p-2 justify-content-start align-items-end gap-2 d-flex mt-4 other-type-filter">
                        <div class="filter-inp-div">
                            <label for="">Action**</label>
                            <input type="hidden" name="sub_data" value="sub">
                            <select name="action_select" class="product-sort w-100" id='act-select'>
                                <option value="">Action</option>
                                <option value="1">Trash Back</option>
                                <option value="-11">permenant delete</option>
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
                                        <div class="d-flex gap-2 align-items-center">
                                            sno

                                        </div>
                                    </th>
                                    <th>image</th>
                                    <th>
                                        <div class="d-flex gap-2 align-items-center">
                                            Name

                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex gap-2 align-items-center">
                                            Category

                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex gap-2 align-items-center">
                                            Price

                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex gap-2 align-items-center">
                                            services
                                        </div>
                                    </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $status = '0';
                                $result_count = '';
                                $sno = 0 + $offset;
                                $main_qry = "SELECT * FROM `service` WHERE  `trash` = ?   ORDER BY `Id` DESC  LIMIT $limit OFFSET $offset";
                                $main_qry_prepare = mysqli_prepare($con, $main_qry);
                                mysqli_stmt_bind_param($main_qry_prepare, 's', $tr_status);
                                if (mysqli_stmt_execute($main_qry_prepare)) {
                                    $result = mysqli_stmt_get_result($main_qry_prepare);
                                    $result_count = mysqli_num_rows($result);
                                    if ($result_count > 0) {
                                        while ($sh = mysqli_fetch_assoc($result)) {
                                            $sno++;
                                ?>
                                            <tr>
                                                <td><input type="checkbox" class="mini-checkbox" name="serviceId[]" value="<?= $sh['Id'] ?>"></td>
                                                <td><?= $sno; ?></td>
                                                <td>
                                                    <img src="../images/uploadimg/<?= !empty($sh['featured_image']) ? $sh['featured_image'] : 'down.webp' ?>" class="product-td-img" alt="image here">
                                                </td>
                                                <td><?= dec_function(substr($sh['name'], 0, 15)) ?>...</td>
                                                <td>
                                                    <?php
                                                    if (!empty($sh['category'])) {
                                                        $ser__cat = fetchOtherdetails($con, 'service_category', 'Id', $sh['category']);
                                                        echo mysqli_fetch_assoc($ser__cat)['name'];
                                                    } else {
                                                        echo "uncategorized";
                                                    }

                                                    ?></td>
                                                <td>
                                                    <?php
                                                    if (!empty($sh['sale_price'])) {
                                                    ?>
                                                        <span class="table-sell-price"><?= $sh['price'] ?></span> <?= $sh['sale_price'] ?>
                                                    <?php
                                                    } else {
                                                        echo  $sh['price'];
                                                    }
                                                    ?>

                                                </td>
                                                <td>

                                                    <?php
                                                    $service = json_decode($sh['services_data'], true);
                                                    $service_name = '';
                                                    foreach ($service as $value) {
                                                        $service_name .= $value['name'] . ',';
                                                    }
                                                    echo trim(substr($service_name, 0, 25), ',');

                                                    ?>

                                                </td>
                                                <td>
                                                    <?php
                                                    if ($sh['status'] == '1') {

                                                    ?>
                                                        <div class="action-button-div">

                                                             <a href="../service.php?id=<?= $sh['Id'] ?>" class="eye-btn">
                                                                <span class="material-symbols-outlined ">
                                                                    visibility
                                                                </span>
                                                            </a>


                                                            <?php
                                                        } else {
                                                            if ($sh['status'] == '0') {
                                                            ?>
                                                                <a href="javascript:void(0)" class="approve-btn">un-approved</a>
                                                            <?php
                                                            } elseif ($sh['status'] == '-2') {
                                                            ?>
                                                                <a href="javascript:void(0)" class="approve-btn bg-danger">dis-approved</a>
                                                        <?php
                                                            }
                                                        }
                                                        ?>


                                                </td>
                                            </tr>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="100">no data is found</td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <script>
                                        window.location.href = 'service-trash.php';
                                    </script>
                                <?php
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                    <!-- pagination and information -->
                    <?php
                    $totalPage = ceil($count / $limit);
                    $startNo = 1 + $offset;
                    $rangeNo = min(($page * $limit), $count);
                    if ($result_count != 0) {
                    ?>
                        <div class="col-12 custom-pagination-wrapper d-flex justify-content-between my-2 px-4 align-items-center">
                            <div class="col-4 pagination-message">
                                <?php

                                ?>
                                showing ( <span class="show-product-num"><?= $startNo ?></span> to <span class="total-product-num"><?= $rangeNo; ?></span> products )
                            </div>
                            <div class="col-4 cus-pagination d-flex justify-content-end">
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
                    <?php
                    }
                    ?>
                </div>
            </form>


            <?php include('include/footer.php') ?>


            <!-- footer here -->
        </div>
    </main>




    <!--   Core JS Files   -->
    <?php include('include/script.php') ?>
    <script src="../assets/js/action.js"></script>

    <div class="delete-confirmation">
        <div class="delete-overlay-div"></div>
        <div class="confirmation-box">
            <div class="warn-img d-flex col-12 justify-content-center">
                <img src="../images/dashboard-img/warning-gif.gif" alt="">
            </div>
            <p class="text-center p-4">are you sure that you want to delete the data by confirming it? the selected data will be deleted and all the related data will also remove</p>
            <div class="col-12 d-flex justify-content-center align-items-center gap-3 btn-div">
                <button id="permenant_deletion_confirmation" class="acc_sts_btn bg-success">confirm</button>
                <button id="cancel_deletion" class="acc_sts_btn">cancel</button>
            </div>
        </div>

    </div>

    <!-- <script src="../assets/js/product.js"></script> -->
    <!--  <script src="../assets/js/category.js"></script> -->











</body>

</html>


<?php


//action code starts here

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['sub_data'])) {
        $error = '';
        if (!empty($_POST['action_select']) && !empty($_POST['serviceId'])) {
            $service_ids = $_POST['serviceId'];
            if (is_array($service_ids)) {
                if ($_POST['action_select'] == '1') {
                    foreach ($service_ids as $sng__service_id) {
                        $serviceData = fetchOtherdetails($con, 'service', 'Id', $sng__service_id);
                        if (mysqli_num_rows($serviceData) > 0) {
                            $trash_bck = '';
                            $trash_order = mysqli_prepare($con, "UPDATE `service` SET `trash` = ? WHERE `Id` = ? ");
                            mysqli_stmt_bind_param($trash_order, 'ss', $trash_bck, $sng__service_id);
                            if (mysqli_stmt_execute($trash_order)) {
                                $suc__msg = 'successfully trash back the services';
                            } else {
                                $suc__msg = '';
                                $error = 'something went wrong';
                            };
                        } else {
                            $suc__msg = '';
                            $error = 'there is a service with invalid id';
                        }
                    }
                } elseif ($_POST['action_select'] == '-11') {
                    foreach ($service_ids as $sng__service_id) {
                        $serviceData = fetchOtherdetailsCol2($con, 'service', 'Id', $sng__service_id, 'user_id', '0');
                        if (mysqli_num_rows($serviceData) > 0) {
                            while ($ser = mysqli_fetch_assoc($serviceData)) {
                                $serId = $ser['Id'];
                                $serSlot = $ser['slot'];
                            }
                            $serviceOrderItemState = [];
                            $pOitem_qry = mysqli_prepare($con, "SELECT * FROM `order_items` WHERE `item_id` = ? ");
                            mysqli_stmt_bind_param($pOitem_qry, 's', $serId);
                            if (mysqli_stmt_execute($pOitem_qry)) {
                                $p_item_result = mysqli_stmt_get_result($pOitem_qry);
                                if (mysqli_num_rows($p_item_result) > 0) {
                                    while ($itm = mysqli_fetch_assoc($p_item_result)) {
                                        $serviceOrderItemState[] = $itm['status'];
                                    }
                                    $unqItemStatus = array_unique($serviceOrderItemState);

                                    if (count($unqItemStatus) == 1 && in_array('1', $unqItemStatus)) {
                                        $del_qry = deleteData($con, 'service', 'Id', $serId);
                                        

                                        if ($del_qry) {
                                            $suc__msg .= ' and successfully delete the service';
                                        } else {
                                            $suc__msg = '';
                                            $error = 'unable to delete the service';
                                        }
                                        if ($serSlot == '1') {
                                            $del_slots = deleteData($con, 'service_slot', 'service_id', $serId);
                                            if($del_slots){
                                                $suc__msg .= " and also deleted the slots";
                                            }else{
                                                $suc__msg = '';
                                                $error = 'unable to delete the slots';
                                            }
                                        }
                                    } else {
                                        $suc__msg = '';
                                        $error = 'cannot delete the service until it is active by user and completely availed';
                                    }
                                } else {

                                    $del_qry = deleteData($con, 'service', 'Id', $serId);
                                    if ($del_qry) {
                                        $suc__msg = ' successfully delete the service';
                                    } else {
                                        $suc__msg = '';
                                        $error = 'unable to delete the service';
                                    }
                                    if ($serSlot == '1') {
                                        $del_slots = deleteData($con, 'service_slot', 'service_id', $serId);
                                        if($del_slots){
                                            $suc__msg .= " and also deleted the slots";
                                        }else{
                                            $suc__msg = '';
                                            $error = 'unable to delete the slots';
                                        }
                                    }
                                }
                            } else {
                                $suc__msg = '';
                                $error = 'something went wrong';
                            }
                        } else {
                            $suc__msg = '';
                            $error = 'only the service uploaded by admin can be deleted';
                        }
                    }
                }
            } else {
                alerting('something went wrong', 'service-trash.php?page=' . $page);
            }
        } else {
            alerting('please select at least one service', 'service-trash.php?page=' . $page);
        }
    } else {
        alerting('something went wrong', 'service-trash.php?page=' . $page);
    }
}

if (!empty($suc__msg)) {
    alerting($suc__msg, 'service-trash.php?page=' . $page);
} elseif (!empty($error)) {
    alerting($error, 'service-trash.php?page=' . $page);
}
