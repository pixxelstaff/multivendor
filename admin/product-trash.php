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
        Lanotte - saloon dashboard
    </title>
    <?php include('include/links.php') ?>
    <link rel="stylesheet" href="../assets/css/order-action.css">

    <!-- cdn for datatables -->
    <?php
    $view = isset($_GET['view']) ? $_GET['view'] : 'list';
    $limit = $view == 'list' ? 10 : 12;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($page - 1) * $limit;
    $stat = '1';
    $fetch_count_qry = mysqli_prepare($con, "SELECT * FROM `product` WHERE `trash` = ?");
    mysqli_stmt_bind_param($fetch_count_qry, 's', $trash_status);
    mysqli_stmt_execute($fetch_count_qry);
    $count_result = mysqli_stmt_get_result($fetch_count_qry);
    $count = mysqli_num_rows($count_result);
    ?>
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
                        <h3 class="page-head">Product-List</h3>
                        <h6 class="brd-crumbs"><a href="index.php">Dashboard</a>/<a href="">product</a></h6>
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
                    <?php
                    $showproducts = "SELECT * FROM `product` WHERE  `trash` = ? ORDER BY `id` DESC LIMIT $limit OFFSET $offset";
                    $showproducts__prepare = mysqli_prepare($con, $showproducts);
                    mysqli_stmt_bind_param($showproducts__prepare, 's', $trash_status);
                    if (mysqli_stmt_execute($showproducts__prepare)) {
                        $p__result = mysqli_stmt_get_result($showproducts__prepare);
                        $res_count = mysqli_num_rows($p__result);

                        if ($view == 'list') {

                    ?>
                            <div class="col-12 table-responsive product-wrapper">
                                <table class=" product-table w-100">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" name="" id="all_check"></th>
                                            <th>sno</th>
                                            <th>image</th>
                                            <th>Name</th>
                                            <th>Code</th>
                                            <th>Category</th>
                                            <th> Store</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $serialNo = 0 + $offset;
                                        while ($sh = mysqli_fetch_assoc($p__result)) {
                                            $serialNo++;
                                        ?>
                                            <tr class="<?= $sh['viewed'] == '0' ? 'un-viewed' : '' ?>">
                                                <td><input type="checkbox" name="pId[]" value="<?= $sh['id'] ?>" class="mini-checkbox"></td>
                                                <td><?= $serialNo; ?></td>
                                                <td>
                                                    <img src="../images/uploadimg/<?= !empty($sh['featured_image']) ? $sh['featured_image'] : 'down.webp' ?>" class="product-td-img" alt="image here">
                                                </td>
                                                <td><?= substr(dec_function($sh['name']), 0, 15) ?></td>
                                                <td><?= $sh['product_type'] ?></td>
                                                <td><?php
                                                    $category = fetchOtherdetails($con, 'category', 'Id', $sh['category']);
                                                    while ($name = mysqli_fetch_assoc($category)) {
                                                        echo $name['name'];
                                                    }

                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $vendor = fetchOtherdetails($con, 'vendor', 'Id', $sh['vendor_id']);
                                                    if (mysqli_num_rows($vendor) > 0) {
                                                        echo mysqli_fetch_assoc($vendor)['business'];
                                                    } else {
                                                        echo "no storename";
                                                    }
                                                    ?>
                                                </td>
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
                                                <td><?= $sh['quantity']; ?></td>
                                                <td>
                                                    <?php
                                                    if ($sh['approve'] != 0) {
                                                    ?>
                                                        <div class="action-button-div">
                                                              <a href="../product.php?id=<?= $sh['id'] ?>" class="eye-btn">
                                                                <span class="material-symbols-outlined ">
                                                                    visibility
                                                                </span>
                                                            </a>
                                                            <?php
                                                            if ($sh['vendor_id'] == '0') {
                                                            ?>
                                                                <a href="update-product-trash.php?id=<?= base64_encode($sh['id']) ?>" class="edit-btn edit-pop">
                                                                    <span class="material-symbols-outlined">
                                                                        edit
                                                                    </span>
                                                                </a>

                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    <?php
                                                    } else {
                                                    ?> <a href="javascript:void(0)" class="approve-btn bg-danger">un-approved</a> <?php
                                                                                                                                }
                                                                                                                                    ?>

                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="col-12 d-flex  flex-wrap grid-template">
                                <?php
                                while ($sh = mysqli_fetch_assoc($p__result)) {
                                ?>
                                    <div class="col-lg-3 col-md-6 col-sm-12 product-div">
                                        <div class="col-12 product-inner-div">
                                            <div class="product-images-div">
                                                <img src="../images/uploadimg/<?= !empty($sh['featured_image']) ? $sh['featured_image'] : 'down.webp' ?>" alt="">
                                                <?php
                                                $galleryimg = explode(',', $sh['gallery_image']);
                                                $hoverImg = $galleryimg[0];
                                                if (!empty($hoverImg)) {
                                                ?>
                                                    <img src="../images/uploadimg/<?= $galleryimg[0]  ?>" class="p-second-image" alt="">

                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <a href="product-detail.php?id=<?= base64_encode($sh['id']) ?>">
                                                <h4 class="product-title">
                                                    <?= $sh['name'] ?>
                                                </h4>
                                            </a>
                                            <p class="product-price">
                                                <?php
                                                if (!empty($sh['sale_price'])) {
                                                ?>
                                                    <span class="table-sell-price">$<?= $sh['price'] ?></span> <?= $sh['sale_price'] ?>
                                                <?php
                                                } else {
                                                    echo  '$' . $sh['price'];
                                                }
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>



                            </div>
                    <?php
                        }

                        //execute the statement
                    }
                    ?>

                    <!-- grid view column -->


                    <!-- pagination and information -->
                    <?php
                    $totalPage = ceil($count / $limit);
                    $startNo = 1 + $offset;
                    $rangeNo = min(($page * $limit), $count);

                    if ($page > $totalPage && $totalPage > 0) {
                    ?>
                        <script>
                            window.location = 'product-trash.php?page=<?= $totalPage ?>&view=<?= $view ?>'
                        </script>
                    <?php
                    }
                    ?>
                    <div class="col-12 custom-pagination-wrapper d-flex justify-content-between my-2 px-4 align-items-center">
                        <div class="col-lg-4 col-md-4 col-sm-12 pagination-message">
                            showing ( <span class="show-product-num"><?= $startNo ?></span> to <span class="total-product-num"><?= $rangeNo; ?></span> products )
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 cus-pagination d-flex">
                            <div class="page-num-wrapper d-flex gap-2">
                                <?php
                                if ($page > 1) {
                                ?>
                                    <a href="?page=<?= $page - 1 ?><?= "&view=" . (isset($_GET['view']) ? $_GET['view'] : 'list') ?>" class="page-btn page-prev">
                                        <span class="material-symbols-outlined">
                                            arrow_back
                                        </span>
                                    </a>
                                <?php
                                }
                                if ($page > 2) {
                                ?> <a href="?page=1<?= "&view=" . (isset($_GET['view']) ? $_GET['view'] : 'list') ?>" class="page-btn">1</a> <?php
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
                                    ?> <a href="?page=<?= $i ?><?= "&view=" . (isset($_GET['view']) ? $_GET['view'] : 'list') ?>
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
                                    ?> <a href="?page=<?= $totalPage ?><?= "&view=" . (isset($_GET['view']) ? $_GET['view'] : 'list') ?>" class="page-btn"><?= $totalPage ?></a> <?php
                                                                                                                                                                                }


                                                                                                                                                                                if ($page < $totalPage) {
                                                                                                                                                                                    ?>
                                    <a href="?page=<?= $page + 1 ?><?= "&view=" . (isset($_GET['view']) ? $_GET['view'] : 'list') ?>" class="page-btn page-next">
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

</body>

</html>

<?php

//action code starts here

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['sub_data'])) {
        $error = '';
        if (!empty($_POST['action_select']) && !empty($_POST['pId'])) {
            $product_ids = $_POST['pId'];
            if (is_array($product_ids)) {
                if ($_POST['action_select'] == '1') {
                    foreach ($product_ids as $sng__product_id) {
                        $productData = fetchOtherdetails($con, 'product', 'id', $sng__product_id);
                        if (mysqli_num_rows($productData) > 0) {
                            $trash_bck = '';
                            $trash_order = mysqli_prepare($con, "UPDATE `product` SET `trash` = ? WHERE `Id` = ? ");
                            mysqli_stmt_bind_param($trash_order, 'ss', $trash_bck, $sng__product_id);
                            if (mysqli_stmt_execute($trash_order)) {
                                $suc__msg = 'successfully trash back the products';
                            } else {
                                $suc__msg = '';
                                $error = 'something went wrong';
                            };
                        } else {
                            $suc__msg = '';
                            $error = 'there is a product with invalid id';
                        }
                    }
                } elseif ($_POST['action_select'] == '-11') {
                    foreach ($product_ids as $sng__product_id) {
                        $productData = fetchOtherdetailsCol2($con, 'product', 'id', $sng__product_id, 'vendor_id', '0');
                        if (mysqli_num_rows($productData) > 0) {
                            while ($pd = mysqli_fetch_assoc($productData)) {
                                $prdId = $pd['id'];
                                $productType = $pd['product_type'];
                            }
                            $productOrderItemState = [];
                            $pOitem_qry = mysqli_prepare($con, "SELECT * FROM `order_items` WHERE `item_id` = ? ");
                            mysqli_stmt_bind_param($pOitem_qry, 's', $prdId);
                            if (mysqli_stmt_execute($pOitem_qry)) {
                                $p_item_result = mysqli_stmt_get_result($pOitem_qry);
                                if (mysqli_num_rows($p_item_result) > 0) {
                                    while ($itm = mysqli_fetch_assoc($p_item_result)) {
                                        $productOrderItemState[] = $itm['status'];
                                    }
                                    $unqItemStatus = array_unique($productOrderItemState);

                                    if (count($unqItemStatus) == 1 && in_array('1', $unqItemStatus)) {
                                        if ($productType == 'attribute' || $productType == 'variation') {

                                            $del_attr = deleteData($con, 'product_attributes', 'product_id', $prdId);
                                            if ($del_attr) {
                                                $suc__msg .= "successfully delete the attributes";
                                            } else {
                                                $suc__msg = '';
                                                $error = "something went wrong while deleting attributes";
                                                exit();
                                            }

                                            if ($productType == 'variation') {
                                                $del_variation = deleteData($con, 'product_variations', 'product_id', $prdId);
                                                if ($del_variation) {
                                                    $suc__msg .= "and successfully delete the variation";
                                                } else {
                                                    $suc__msg = '';
                                                    $error = "something went wrong while deleting variation";
                                                    exit();
                                                }
                                            }
                                        }
                                        $del_qry = deleteData($con, 'product', 'id', $prdId);
                                        if ($del_qry) {
                                            $suc__msg .= ' and successfully delete the product';
                                        } else {
                                            $suc__msg = '';
                                            $error = 'unable to delete the product';
                                        }
                                    } else {
                                        $suc__msg = '';
                                        $error = 'product cannot delete until there delivery and order completion';
                                    }
                                } else {
                                    if ($productType == 'attribute' || $productType == 'variation') {

                                        $del_attr = deleteData($con, 'product_attributes', 'product_id', $prdId);
                                        if ($del_attr) {
                                            $suc__msg .= "successfully delete the attributes";
                                        } else {
                                            $suc__msg = '';
                                            $error = "something went wrong while deleting attributes";
                                            exit();
                                        }

                                        if ($productType == 'variation') {
                                            $del_variation = deleteData($con, 'product_variations', 'product_id', $prdId);
                                            if ($del_variation) {
                                                $suc__msg .= "and successfully delete the variation";
                                            } else {
                                                $suc__msg = '';
                                                $error = "something went wrong while deleting variation";
                                                exit();
                                            }
                                        }
                                    }
                                    $del_qry = deleteData($con, 'product', 'id', $prdId);
                                    if ($del_qry) {
                                        $suc__msg .= ' and successfully delete the product';
                                    } else {
                                        $suc__msg = '';
                                        $error = 'unable to delete the product';
                                    }
                                }
                            } else {
                                $suc__msg = '';
                                $error = 'something went wrong';
                            }
                        } else {
                            $suc__msg = '';
                            $error = 'only the product uploaded by admin can be deleted';
                        }
                    }
                }
            } else {
                alerting('something went wrong', 'product-trash.php?page=' . $page . '&view=' . $view);
            }
        } else {
            alerting('please select at least one product', 'product-trash.php?page=' . $page . '&view=' . $view);
        }
    } else {
        alerting('something went wrong', 'product-trash.php?page=' . $page . '&view=' . $view);
    }
}

if (!empty($suc__msg)) {
    alerting($suc__msg, 'product-trash.php?page=' . $page . '&view=' . $view);
} elseif (!empty($error)) {
    alerting($error, 'product-trash.php?page=' . $page . '&view=' . $view);
}
