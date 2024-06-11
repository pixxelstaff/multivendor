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
    <!-- cdn for datatables -->
    <?php
    $view = isset($_GET['view']) ? $_GET['view'] : 'list';
    $limit = $view == 'list' ? 10 : 12;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($page - 1) * $limit;
    $stat = '1';
    $fetch_count_qry = mysqli_prepare($con, "SELECT * FROM `product` WHERE `approve` = ? AND `trash` != ?");
    mysqli_stmt_bind_param($fetch_count_qry, 'ss', $stat, $trash_status);
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

                    <div class="col-12 product-grid d-flex flex-wrap p-2">
                        <div class="col-lg-6 col-md-12 col-sm-12 d-flex flex-wrap align-items-end ">
                            <div class="col-lg-6 col-md-12 col-sm-12 filter-inp-div p-1">
                                <select name="action_select" class="product-sort w-100" id='act-select'>
                                    <option value="">Action</option>
                                    <option value="-1">Move to trash</option>
                                </select>
                                <input type="hidden" name="sub_data" value="sub">
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 search-div filter-inp-div d-flex flex-column p-1">
                                <input type="text" placeholder="search products" class="search-products w-100">
                                <div class="col-12 search-result-popup ">
                                    <div class="col-12 s-product-div">
                                        <div class="product-img-div">
                                            <img src="../images/dashboard-img/p-2.jpg" alt="image">
                                        </div>
                                        <div class="product-list-content">
                                            <h6>The secrum serum</h6>
                                            <p>Store:<span>big store</span></p>
                                            <a href="javascript:void(0)">$182 - $189</a>
                                        </div>
                                    </div>
                                    <div class="col-12 s-product-div">
                                        <div class="product-img-div">
                                            <img src="../images/dashboard-img/p-3.jpg" alt="image">
                                        </div>
                                        <div class="product-list-content">
                                            <h6>The secrum serum</h6>
                                            <p>Store:<span>big store</span></p>
                                            <a href="javascript:void(0)">$182 - $189</a>
                                        </div>
                                    </div>
                                    <div class="col-12 s-product-div">
                                        <div class="product-img-div">
                                            <img src="../images/dashboard-img/p-4.jpg" alt="image">
                                        </div>
                                        <div class="product-list-content">
                                            <h6>The secrum serum</h6>
                                            <p>Store:<span>big store</span></p>
                                            <a href="javascript:void(0)">$182 - $189</a>
                                        </div>
                                    </div>
                                    <div class="col-12 s-product-div">
                                        <div class="product-img-div">
                                            <img src="../images/dashboard-img/p-5.jpg" alt="image">
                                        </div>
                                        <div class="product-list-content">
                                            <h6>The secrum serum</h6>
                                            <p>Store:<span>big store</span></p>
                                            <a href="javascript:void(0)">$182 - $189</a>
                                        </div>
                                    </div>
                                    <div class="col-12 s-product-div">
                                        <div class="product-img-div">
                                            <img src="../images/dashboard-img/p-6.jpg" alt="image">
                                        </div>
                                        <div class="product-list-content">
                                            <h6>The secrum serum</h6>
                                            <p>Store:<span>big store</span></p>
                                            <a href="javascript:void(0)">$182 - $189</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12 filter-div d-flex gap-3 justify-content-end align-items-center">
                            <a href="?view=grid" class="filter-btn <?php echo  $view == 'grid' ? 'active-btn' : '' ?>">
                                <span class="material-symbols-outlined">
                                    grid_view
                                </span>
                            </a>
                            <a href="?view=list" class="filter-btn <?php echo  $view == 'list' ? 'active-btn' : '' ?>">
                                <span class="material-symbols-outlined">
                                    view_list
                                </span>
                            </a>
                            <a href="javascript:void(0)" class="filter-btn filter-toggle">
                                <span class="material-symbols-outlined">
                                    tune
                                </span>
                            </a>
                            <select name="" id="sort-select" class="product-sort">
                                <option value="">sort by</option>
                                <option value="">sort by (A-Z)</option>
                                <option value="">sort by (Z-A)</option>
                                <option value="">sort by latest</option>
                            </select>
                        </div>
                    </div>
                    <!-- filter options -->
                    <div class="w-100 filter-options">
                        <div class="col-12  p-2  gap-2 d-flex filter-opt-div">
                            <div class="filter-inp-div">
                                <label for="">filter by category</label>
                                <select name="" id="" class="product-sort w-100">
                                    <option value="">select category</option>
                                </select>
                            </div>
                            <div class="filter-inp-div">
                                <label for="">filter by Vendor</label>
                                <select name="" id="" class="product-sort w-100">
                                    <option value="">select store</option>
                                </select>
                            </div>
                            <div class="filter-inp-div">
                                <label for="">filter by Price</label>
                                <input type="text" placeholder="enter amount less than or equal" class="search-products w-100">
                            </div>
                            <div class="filter-inp-div">
                                <label for="">filter by quantity</label>
                                <select name="" id="" class="product-sort w-100">
                                    <option value="">select quantity</option>
                                </select>
                            </div>
                            <div class="filter-inp-div">
                                <button class="the-filter-btn">Filter</button>
                            </div>
                        </div>
                    </div>
                    <?php
                    $showproducts = "SELECT * FROM `product` WHERE `approve` = ? AND `trash` != ? ORDER BY `id` DESC LIMIT $limit OFFSET $offset";
                    $showproducts__prepare = mysqli_prepare($con, $showproducts);
                    mysqli_stmt_bind_param($showproducts__prepare, 'ss', $stat, $trash_status);
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
                                                    <div class="action-button-div">
                                                        <a href="../product.php?id=<?= $sh['id'] ?>" class="eye-btn">
                                                            <span class="material-symbols-outlined ">
                                                                visibility
                                                            </span>
                                                        </a>
                                                        <?php
                                                        if ($sh['vendor_id'] == '0') {
                                                        ?>
                                                            <a href="update-product.php?id=<?= base64_encode($sh['id']) ?>" class="edit-btn edit-pop">
                                                                <span class="material-symbols-outlined">
                                                                    edit
                                                                </span>
                                                            </a>

                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
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
                            window.location = 'product.php?page=<?= $totalPage ?>&view=<?= $view ?>'
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

                foreach ($product_ids as $sng__product_id) {
                    $productData = fetchOtherdetails($con, 'product', 'id', $sng__product_id);
                    if (mysqli_num_rows($productData) > 0) {
                        while ($ord = mysqli_fetch_assoc($productData)) {
                            $product__sts = $ord['approve'];
                        }

                        if ($product__sts == '1') {
                            //ten items

                            $trash_order = mysqli_prepare($con, "UPDATE `product` SET `trash` = ? WHERE `id` = ? ");
                            mysqli_stmt_bind_param($trash_order, 'ss', $trash_status, $sng__product_id);
                            if (mysqli_stmt_execute($trash_order)) {
                                $suc__msg = 'successfully trash the products';
                            } else {
                                $suc__msg = '';
                                $error = 'something went wrong';
                            };
                        } else {
                            $suc__msg = '';
                            $error = 'some of the product cannot be trash until they are not approve';
                        }
                    }
                }
            } else {
                alerting('something went wrong', 'product.php?page=' . $page . '&view=' . $view);
            }
        } else {
            alerting('please select at least one product', 'product.php?page=' . $page . '&view=' . $view);
        }
    } else {
        alerting('something went wrong', 'product.php?page=' . $page . '&view=' . $view);
    }
}

if (!empty($suc__msg)) {
    alerting($suc__msg, 'product.php?page=' . $page . '&view=' . $view);
} elseif (!empty($error)) {
    alerting($error, 'product.php?page=' . $page . '&view=' . $view);
}
