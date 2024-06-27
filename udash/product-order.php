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
                        <h6 class="brd-crumbs "><a href="index.php" class="brd-crumbs-active">Dashboard</a>/<a href="orders.php" class="brd-crumbs-active">orders</a>/<a href="index.php">product list</a>/</h6>
                    </div>



                    <!-- filter options -->
                    <div class="col-12  p-2 justify-content-start align-items-end gap-2 d-flex mt-4 other-type-filter">
                        <div class="filter-inp-div">
                            <label for="">Action**</label>
                            <select name="action_select" class="product-sort w-100" id='act-select'>
                                <option value="">Action</option>
                                <option value="-1">Move to trash</option>
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
                                    <th><input type="checkbox" name="all" id="all_check"></th>
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
                                <tr class="">
                                    <td><input type="checkbox" class="mini-checkbox" name="productitem[]" value=""></td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td></td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>-</td>

                                    <td>
                                        <a href="javascript:void(0)" class="order-success">-</a>
                                    </td>
                                    <td>
                                        <div class="action-button-div">
                                            <a href="javascript:void(0)" class="eye-btn" data-item-id=''>
                                                <span class="material-symbols-outlined ">
                                                    visibility
                                                </span>
                                            </a>

                                        </div>
                                    </td>
                                </tr>






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

                    if ($page > $totalPage) {
                    ?>
                        <script>
                            window.location.href = '?page=<?= $totalPage ?>'
                        </script>
                    <?php
                    }
                    ?>
                    <div class="col-12 custom-pagination-wrapper d-flex justify-content-between my-2 px-4 align-items-center">
                        <div class="col-lg-4 col-md-6 col-sm-12 pagination-message">
                            showing ( <span class="show-product-num"><?= $startNo ?></span> to <span class="total-product-num"><?= $rangeNo; ?></span> products )
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12 cus-pagination d-flex justify-content-end">
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