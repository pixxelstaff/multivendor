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
    <title>
        approve products || lanoote - saloon
    </title>
    <?php include('include/links.php');
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 10;
    $offset = ($page - 1) * $limit;
    $qry = mysqli_query($con, "SELECT * FROM `product` WHERE `approve` = '0' AND `trash` != '$tr_status'");
    $count = mysqli_num_rows($qry);
    if (!is_numeric($page) || empty($page)) {
    ?>
        <script>
            alert('error');
            window.location.href = 'approve-products.php';
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
                            <select name="action_select" class="product-sort w-100" id='act-select'>
                                <option value="">Action</option>
                                <option value="-1">Move to trash</option>
                                <option value="11">Approve</option>
                            </select>
                            <input type="hidden" name="sub_data" value="sub">
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
                                            Type

                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex gap-2 align-items-center">
                                            Category

                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex gap-2 align-items-center">
                                            Store

                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex gap-2 align-items-center">
                                            Price

                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex gap-2 align-items-center">
                                            Quantity

                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex gap-2 align-items-center">
                                            Vendor

                                        </div>
                                    </th>
                                    <th>Approve</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $status = '0';
                                $result_count = '';
                                $sno = 0 + $offset;
                                $main_qry = "SELECT * FROM `product` WHERE `approve` = ? AND `trash` != ?   ORDER BY `Id` DESC  LIMIT $limit OFFSET $offset";
                                $main_qry_prepare = mysqli_prepare($con, $main_qry);
                                mysqli_stmt_bind_param($main_qry_prepare, 'ss', $status, $tr_status);
                                if (mysqli_stmt_execute($main_qry_prepare)) {
                                    $result = mysqli_stmt_get_result($main_qry_prepare);
                                    $result_count = mysqli_num_rows($result);
                                    if ($result_count > 0) {
                                        while ($show = mysqli_fetch_assoc($result)) {
                                            $sno++;
                                ?>
                                            <tr class="<?= $show['viewed'] == '0' ? 'un-viewed' : '' ?>">
                                                <td><input type="checkbox" name="productId[]" value="<?= $show['id'] ?>" class="mini-checkbox"></td>
                                                <td><?= $sno ?></td>
                                                <td>
                                                    <img src="../images/uploadimg/<?= $show['featured_image']  ?>" class="product-td-img" alt="image here">
                                                </td>
                                                <td><?= dec_function(substr($show['name'], 0, 15)) ?>...

                                                </td>
                                                <td><?= $show['product_type'] ?></td>
                                                <td><?php
                                                    $category = fetchOtherdetails($con, 'category', 'Id', $show['category']);
                                                    while ($name = mysqli_fetch_assoc($category)) {
                                                        echo $name['name'];
                                                    }

                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($show['vendor_id'] != 0) {
                                                        $vendor = fetchOtherdetails($con, 'vendor', 'Id', $show['vendor_id']);
                                                        echo mysqli_fetch_assoc($vendor)['business'];
                                                    } else {
                                                        echo "admin";
                                                    }

                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if (!empty($show['sale_price'])) {
                                                    ?>
                                                        <span class="table-sell-price"><?= $show['price'] ?></span> <?= $show['sale_price'] ?>
                                                    <?php
                                                    } else {
                                                        echo  $show['price'];
                                                    }
                                                    ?>

                                                </td>
                                                <td><?= $show['quantity'] ?></td>
                                                <td>
                                                    <?php
                                                    if ($show['vendor_id'] != '0') {
                                                        $vendor = fetchOtherdetails($con, 'vendor', 'Id', $show['vendor_id']);
                                                        echo mysqli_fetch_assoc($vendor)['name'];
                                                    } else {
                                                        echo "Admin";
                                                    }

                                                    ?>
                                                </td>
                                                <td>
                                                    <a href="?page=<?= $page ?>&product-id=<?= base64_encode($show['id']) ?>" class="approve-btn">approve</a>
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
                                        window.location.href = 'approve-products.php';
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
    <div class="success-wrapper">
        <div class="success-message-container d-none">
            <div class="success-gif">
                <img src="../images/dashboard-img/success.gif" alt="">
            </div>
            <p class="pop-message"><?= isset($_GET['msg']) ? base64_decode($_GET['msg']) : ''; ?> </p>
            <a href="approve-products.php?page=<?= $page ?>" class="close-btn" id="pop-close-btn">
                <span class="material-symbols-outlined">
                    close
                </span>
            </a>
        </div>
        <div class="error-message-container d-none">
            <div class="success-gif">
                <img src="../images/dashboard-img/cross.gif" alt="">
            </div>
            <p class="pop-message"><?= isset($_GET['msg']) ? base64_decode($_GET['msg']) : ''; ?> </p>
            <a href="category.php" class="close-btn" id="pop-close-btn">
                <span class="material-symbols-outlined">
                    close
                </span>
            </a>
        </div>
    </div>



    <!--   Core JS Files   -->
    <?php include('include/script.php') ?>
    <script src="../assets/js/action.js"></script>

    <!-- <script src="../assets/js/product.js"></script> -->
    <!--  <script src="../assets/js/category.js"></script> -->

    <?php
    if (isset($_GET['product-id'])) {
        $date = date('d-m-Y');
        $upd_viewed = '0';
        $p__id = base64_decode($_GET['product-id']);
        $p__approve = '1';
        $qry = fetchOtherdetails($con, 'product', 'id', $p__id);
        if (mysqli_num_rows($qry) > 0) {
            $upd_Qry = "UPDATE `product` SET `approve` = ?,`viewed` = ?,`date` = ? WHERE `id` = ?";
            $upd_Qry_p = mysqli_prepare($con, $upd_Qry);
            mysqli_stmt_bind_param($upd_Qry_p, 'ssss', $p__approve, $upd_viewed, $date, $p__id);
            if (mysqli_stmt_execute($upd_Qry_p)) {
    ?>
                <script>
                    window.location.href = '?page=<?= $page ?>&pop=success&msg=<?= base64_encode('the product is approved successfully and user can buy and order it') ?>';
                </script>
            <?php
            } else {
            ?>
                <script>
                    alert('something went wrong');
                    window.location.href = '?page=<?= $page ?>';
                </script>
            <?php
            }
        } else {
            ?>
            <script>
                alert('the product u are trying to approve is not available');
                window.location.href = '?page=<?= $page ?>';
            </script>
        <?php
        }
    }

    if (isset($_GET['pop'])) {

        if ($_GET['pop'] == "success") {


        ?>
            <script>
                let sucWrap = document.querySelector('.success-message-container');
                sucWrap.classList.remove('d-none');
                let wrap = document.querySelector('.success-wrapper');
                wrap.style.display = 'flex';
                setTimeout(() => {
                    wrap.style.opacity = '1';
                    wrap.style.transform = 'scale(1)'
                }, 50)
            </script>
    <?php
        }
    }


    ?>






</body>

</html>


<?php


//action code starts here

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['sub_data'])) {
        $error = '';
        if (!empty($_POST['action_select']) && !empty($_POST['productId'])) {
            $product_ids = $_POST['productId'];
            if (is_array($product_ids)) {

                foreach ($product_ids as $sng__product_id) {
                    $productData = fetchOtherdetails($con, 'product', 'id', $sng__product_id);
                    if (mysqli_num_rows($productData) > 0) {

                        //ten items
                        if ($_POST['action_select'] == '-1') {
                            $trash_product = mysqli_prepare($con, "UPDATE `product` SET `trash` = ? WHERE `id` = ? ");
                            mysqli_stmt_bind_param($trash_product, 'ss', $tr_status, $sng__product_id);
                            if (mysqli_stmt_execute($trash_product)) {
                                $suc__msg = 'successfully trash the unapprove products';
                            } else {
                                $suc__msg = '';
                                $error = 'something went wrong';
                            };
                        } elseif ($_POST['action_select'] == '11') {
                            $appr = '1';
                            $appr_product = mysqli_prepare($con, "UPDATE `product` SET `approve` = ? WHERE `id` = ? ");
                            mysqli_stmt_bind_param($appr_product, 'ss', $appr, $sng__product_id);
                            if (mysqli_stmt_execute($appr_product)) {
                                $suc__msg = 'successfully approve the products';
                            } else {
                                $suc__msg = '';
                                $error = 'something went wrong';
                            };
                        }
                    } else {
                    }
                }
            } else {
                alerting('something went wrong', 'approve-products.php?page=' . $page);
            }
        } else {
            alerting('please select at least one product', 'approve-products.php?page=' . $page);
        }
    } else {
        alerting('something went wrong', 'approve-products.php?page=' . $page);
    }
}

if (!empty($suc__msg)) {
    alerting($suc__msg, 'approve-products.php?page=' . $page);
} elseif (!empty($error)) {
    alerting($error, 'approve-products.php?page=' . $page);
}
