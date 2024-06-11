<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('location:login.php');
}

$trash = '-1';

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
        Trashed - vendor || multiVendor
    </title>
    <?php include('include/links.php');


    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 10;
    $offset = ($page - 1) * $limit;
    $qry = mysqli_query($con, "SELECT * FROM `vendor` WHERE `trash` = '-1'");
    $count = mysqli_num_rows($qry);

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
                        <h3 class="page-head">trash-list</h3>
                        <h6 class="brd-crumbs brd-crumbs-active"><a href="index.php">Dashboard</a>/<a href="">vendors-list</a></h6>
                    </div>



                    <!-- filter options -->
                    <div class="col-12  p-2 justify-content-start align-items-end gap-2 d-flex mt-4 other-type-filter">
                        <div class="filter-inp-div">
                            <label for="">Action**</label>
                            <select name="action_select" class="product-sort  w-100" id='act-select'>
                                <option value="">Action</option>
                                <option value="1">trash back</option>
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
                                        sno
                                    </th>
                                    <th>
                                        name
                                    </th>
                                    <th>
                                        email
                                    </th>
                                    <th>
                                        phone
                                    </th>
                                    <th>
                                        cnic
                                    </th>
                                    <th>
                                        business name
                                    </th>
                                    <th>
                                        country
                                    </th>
                                    <th>
                                        city
                                    </th>
                                    <th>
                                        zipcode
                                    </th>
                                    <th>
                                        address
                                    </th>
                                    <th>
                                        account status
                                    </th>
                                    <th>Action</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $result_count = '';
                                $data = mysqli_prepare($con, "SELECT * FROM `vendor` WHERE  `trash` = ? ORDER BY `Id` DESC LIMIT $limit OFFSET $offset");
                                mysqli_stmt_bind_param($data, 's', $trash);
                                if (mysqli_stmt_execute($data)) {
                                    $result = mysqli_stmt_get_result($data);
                                    $result_count = mysqli_num_rows($result);
                                    if (mysqli_num_rows($result) > 0) {
                                        $sno = 0;
                                        while ($sh = mysqli_fetch_assoc($result)) {
                                            $sno++;
                                ?>
                                            <tr class="<?= $sh['viewed'] == '0' ? 'un-viewed' : '' ?>">
                                                <td><input type="checkbox" class="mini-checkbox" name="vendorId[]" value="<?= $sh['Id'] ?>" id=""></td>
                                                <td><?= $sno; ?></td>
                                                <td><?= $sh['name'] ?></td>
                                                <td><?= $sh['email'] ?></td>
                                                <td><?= $sh['phone'] ?></td>
                                                <td><?= $sh['cnic'] ?></td>
                                                <td><?= $sh['business'] ?></td>
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
                                                <td><?= $sh['zipcode'] ?></td>
                                                <td><?= $sh['address'] ?></td>
                                                <td>

                                                    <?php
                                                    if ($sh['approved'] == '1') {
                                                    ?> <a href="javascript:void(0)" class="approve-btn">approved</a> <?php
                                                                                                                    } elseif ($sh['approved'] == '-1') {
                                                                                                                        ?> <a href="javascript:void(0)" class="approve-btn bg-danger">terminated</a> <?php
                                                                                                                                                                                                    } elseif ($sh['approved'] == '-2') {
                                                                                                                                                                                                        ?> <a href="javascript:void(0)" class="approve-btn bg-warning">suspended</a> <?php
                                                                                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                                                                                        ?> <a href="javascript:void(0)" class="approve-btn bg-info">unapproved</a> <?php
                                                                                                                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                                                                                                                    ?>

                                                </td>

                                                <td>
                                                    <div class="action-button-div">
                                                        <a href="vendor-profile.php?id=<?= base64_encode($sh['Id']) ?>" class="eye-btn">
                                                            <span class="material-symbols-outlined ">
                                                                visibility
                                                            </span>
                                                        </a>

                                                        <a href="javascript:void(0)" data-vendor-id=<?= $sh['Id'] ?> class="delete-btn del-vendor-btn">
                                                            <span class="material-symbols-outlined">
                                                                delete_forever
                                                            </span>
                                                        </a>
                                                    </div>
                                                </td>


                                            </tr>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="100">no data is present</td>

                                        </tr>

                                <?php
                                    }
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>






                    <!-- pagination and information -->
                    <?php
                    $totalPage = ceil($count / $limit);
                    if ($page > $totalPage && $page != 1) {
                    ?> <script>
                            window.location = 'vendor-trash.php?page=<?= $totalPage ?>'
                        </script> <?php
                                }
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
                    <?php
                                }
                    ?>

                </div>
            </form>


            <?php include('include/footer.php') ?>


            <!-- footer here -->
        </div>
    </main>


    <div class="delete-confirmation">
        <div class="delete-overlay-div"></div>
        <div class="confirmation-box">
            <div class="warn-img d-flex col-12 justify-content-center">
                <img src="../images/dashboard-img/warn.png" alt="">
            </div>
            <p class="text-center p-4">are you sure that you want to delete the vendor? <span class="analytics-msg"></span></p>
            <div class="col-12 d-flex justify-content-center align-items-center gap-3 btn-div">
                <button id="confirm_deletion" class="acc_sts_btn bg-success">confirm</button>
                <button id="cancel_deletion" class="acc_sts_btn">cancel</button>
            </div>
            <div class="ver-loader">
                <div class="load"></div>
            </div>
            <!-- <div class="loader-div"><div class="loader"></div></div> -->

        </div>

    </div>

    <!--   Core JS Files   -->
    <?php include('include/script.php') ?>
    <script src="../assets/js/product.js"></script>
    <script src="../assets/js/vendor_state.js"></script>
    <script src="../assets/js/action.js"></script>
    <!-- approve code here -->



</body>

</html>

<?php




if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['sub_data'])) {
        $trash_back = '';
        $trash_error = '';
        $vw = '0';
        if (!empty($_POST['action_select']) && !empty($_POST['vendorId'])) {
            $vendor__ids = $_POST['vendorId'];
            if (is_array($vendor__ids)) {
                foreach ($vendor__ids as $vendor_id) {
                    $vendorData = fetchOtherdetails($con, 'vendor', 'Id', $vendor_id);
                    if (mysqli_num_rows($vendorData) > 0) {
                        $vendor_trash = mysqli_prepare($con, "UPDATE `vendor` SET `trash` = ?,`viewed`=? WHERE `Id` = ?");
                        mysqli_stmt_bind_param($vendor_trash, 'sss', $trash_back, $vw, $vendor_id);
                        if (mysqli_stmt_execute($vendor_trash)) {
                            $trash_error = '';
                            $suc__msg = "successfully move vendor from trash";
                        } else {
                            $suc__msg = '';
                            $trash_error = "something went wrong";
                        }
                    }
                }
            } else {
                alerting('something went wrong', 'vendor-trash.php?page=' . $page);
            }
        } else {
            alerting('please select atleast one', 'vendor-trash.php?page=' . $page);
        }
    } else {
        alerting('something went wrong', 'vendor-trash.php?page=' . $page);
    }
}

if (!empty($suc__msg)) {
    alerting($suc__msg, 'vendor-trash.php?page=' . $page);
} elseif (!empty($trash_error)) {
    alerting($trash_error, 'vendor-trash.php?page=' . $page);
}
