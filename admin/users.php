<?php
session_start();
if (!isset($_SESSION['email'])) {  header('location:login.php');} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        user -  Multivendor dashboard
    </title>
    <?php include('include/links.php') ?>
    <!-- cdn for datatables -->

    <?php
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 10;
    $offset = ($page - 1) * $limit;
    $qry = fetchAllData($con, 'user');
    $count = mysqli_num_rows($qry);

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
            <div class="col-12 p-2 rounded bg-white">
                <div class="col-12 d-flex justify-content-between p-2 brd__crumbs">
                    <h3 class="page-head">users</h3>
                    <h6 class="brd-crumbs brd-crumbs-active"><a href="index.php">Dashboard</a>/<a href="">users</a></h6>
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
                                        name
                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex gap-2 align-items-center">
                                        email
                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex gap-2 align-items-center">
                                        phone
                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex gap-2 align-items-center">
                                        gender
                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex gap-2 align-items-center">
                                        Country
                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex gap-2 align-items-center">
                                        City
                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex gap-2 align-items-center">
                                        zipcode
                                    </div>
                                </th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sno = 0;
                            $result_count = '';
                            $users = mysqli_prepare($con, "SELECT * FROM `user` ORDER BY `Id` DESC LIMIT $limit OFFSET $offset");
                            if (mysqli_stmt_execute($users)) {
                                $result = mysqli_stmt_get_result($users);
                                $result_count = mysqli_num_rows($result);
                                while ($sh = mysqli_fetch_assoc($result)) {
                                    $sno++;
                            ?>
                                    <tr>
                                        <td><input type="checkbox" name="user[]" value="<?= $sh['Id'] ?>" id=""></td>
                                        <td><?= $sno ?></td>
                                        <td><?= $sh['name'] ?></td>
                                        <td><?= $sh['email'] ?></td>
                                        <td><?= $sh['phone'] ?></td>
                                        <td><?= $sh['gender'] ?></td>
                                        <td>
                                            <?php $country = fetchOtherdetails($con, 'country', 'Id', $sh['country']);
                                            echo mysqli_fetch_assoc($country)['country'];
                                            ?>
                                        </td>
                                        <td>
                                            <?php $country = fetchOtherdetails($con, 'city', 'Id', $sh['city']);
                                            echo mysqli_fetch_assoc($country)['name'];
                                            ?>
                                        </td>
                                        <td><?= $sh['zip_code'] ?></td>
                                        <td>
                                            <div class="action-button-div">
                                                <a href="javascript:void(0)" class="eye-btn">
                                                    <span class="material-symbols-outlined ">
                                                        visibility
                                                    </span>
                                                </a>
                                                <a href="?delete-id=<?= $sh['Id']?>" class="delete-btn">
                                                    <span class="material-symbols-outlined">
                                                        delete_forever
                                                    </span>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                            <?php
                                }
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
                if ($result_count != 0) {
                ?>
                    <div class="col-12 custom-pagination-wrapper d-flex justify-content-between my-2 px-4 align-items-center">
                        <div class="col-lg-4 col-md-6 col-sm-12 pagination-message">
                            <?php

                            ?>
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
                <?php
                }
                ?>

            <!-- </div> -->


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