<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('location:login.php');
}
$limit = 4;
$country_page = isset($_GET['country']) ? $_GET['country'] : '1';
$city_page = isset($_GET['city']) ? $_GET['city'] : '1';
$area_page =  isset($_GET['area']) ? $_GET['area'] : '1';

//offsets
$country_offset = ($country_page - 1) * $limit;
$city_offset = ($city_page - 1) * $limit;
$area_offset = ($area_page - 1) * $limit;
$date = date('d-m-Y');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        location || lanoote - saloon
    </title>
    <?php include('include/links.php') ?>
    <link rel="stylesheet" href="../assets/css/script.css">
    <!-- cdn for datatables -->
    <?php $adminId = '1'; ?>
    <style>
        .error {

            color: red;

        }
    </style>

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
                <!-- breadcrumbs div -->
                <div class="col-12 d-flex justify-content-between p-2 brd__crumbs">
                    <h3 class="page-head">Location</h3>
                    <h6 class="brd-crumbs">
                        <a href="index.php" class="brd-crumbs-active ">Dashboard</a>/
                        <a href="javascript:void(0)">Location</a>
                    </h6>
                </div>
                <div class="col-12 location-page-container p-4 my-2">
                    <h4 class="text-center page-head mt-1 mb-4">Country data</h4>
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-sm-12 my-4">
                            <div class="country-form location-form col-12 p-2">
                                <form action="" method="post" id="shah">
                                    <div class="col-12 p-inp-div d-flex flex-column ">
                                        <label for="" class="p-inp-label">country name</label>
                                        <input type="text" name="cn_country_name" class="p-inp-field" placeholder="country name" id="country-name">
                                    </div>
                                    <div class="col-12 p-inp-div d-flex flex-column ">
                                        <label for="" class="p-inp-label">country code</label>
                                        <input type="text" name="cn_country_code" class="p-inp-field" placeholder="country code" id="country-code">
                                        <input type="hidden" name="upd_country_key" value="" id="country-key">
                                    </div>
                                    <div class="col-12 d-flex justify-content-start">
                                        <input type="submit" value="add country" name='cn_country_form' id="country_sub_btn" class="sub-btn w-auto">
                                    </div>
                                </form>

                                <?php
                                if (isset($_POST['cn_country_form'])) {
                                    if ($_POST['cn_country_name'] != '' && $_POST['cn_country_code'] != '') {
                                        $name = mine_sanitize_string($_POST['cn_country_name']);
                                        $code = mine_sanitize_string($_POST['cn_country_code']);

                                        $check_duplication = fetchOtherdetails($con, 'country', 'country', $name);
                                        if (mysqli_num_rows($check_duplication) == 0) {
                                            $insert_data = mysqli_prepare($con, "INSERT INTO `country`( `country`, `country_code`) VALUES (?,?)");
                                            mysqli_stmt_bind_param($insert_data, 'ss', $name, $code);
                                            if (mysqli_stmt_execute($insert_data)) {
                                                alerting('country added successfully', 'location.php');
                                            } else {
                                                alerting('failed to add country', 'location.php');
                                            }
                                        } else {
                                            alerting('the country name is already present', 'location.php');
                                        }
                                    } else {
                                        alerting('Enter complete information', 'location.php');
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12 col-sm-12 my-4">
                            <div class="col-12  justify-content-start align-items-end gap-2 d-flex mt-0 action-select other-type-filter">
                                <div class="filter-inp-div">
                                    <select name="" id="" class="product-sort w-100">
                                        <option value="">Action</option>
                                        <option value="">Move to trash</option>
                                        <option value="">Delete permenantly</option>
                                        <option value="">Approve </option>
                                    </select>
                                </div>

                                <div class="filter-inp-div">
                                    <input type="text" placeholder="search category" class="search-products w-100">
                                </div>

                            </div>
                            <div class="col-12 table-responsive product-wrapper py-0">

                                <table class=" product-table w-100 mt-0 ">
                                    <thead>
                                        <tr>

                                            <th><input type="checkbox" name="countryId[]" id=""></th>
                                            <th>sno</th>
                                            <th>country name</th>
                                            <th>country code</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $cn_sno = 0;
                                        $country_total_result = mysqli_num_rows(fetchAllData($con, 'country'));
                                        $country_data = fetchLimitedDataWithOffset($con, 'country', 'Id', $limit, $country_offset);
                                        while ($cn = mysqli_fetch_assoc($country_data)) {
                                            $cn_sno++;
                                        ?>
                                            <tr>
                                                <td><input type="checkbox" name="countryId[]" value="<?= $cn['Id'] ?>" id=""></td>
                                                <td><?= $cn_sno + $country_offset ?></td>
                                                <td><?= dec_function($cn['country']) ?></td>
                                                <td><?= dec_function($cn['country_code']) ?></td>
                                                <td>
                                                    <div class="action-button-div">
                                                        <a href="javascript:void(0)" class="edit-btn edit-pop country-edit-btn" data-action-id="<?= $cn['Id'] ?>">
                                                            <span class="material-symbols-outlined">
                                                                edit
                                                            </span>
                                                        </a>

                                                        <a href="?delete-country=<?= $cn['Id'] ?>" class="delete-btn">
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
                            <div class="col-12 custom-pagination-wrapper d-flex justify-content-between my-2 px-1 align-items-center ">

                                <?php
                                $total__result = ceil($country_total_result / $limit);
                                if ($total__result < $country_page) {
                                ?>
                                    <script>
                                        window.location.href = 'location.php?country=<?= $total__result  ?>&city=<?= $city_page ?>&area=<?= $area_page ?>'
                                    </script>
                                <?php
                                }
                                $startNo = 1 + $country_offset;
                                $rangeNo = min(($country_page * $limit), $country_total_result);
                                ?>

                                <div class="col-12 cus-pagination  d-flex ">
                                    <div class="page-num-wrapper d-flex gap-2">
                                        <?php
                                        if ($country_page > 1) {
                                        ?>
                                            <a href="?country=<?= $country_page -  1 ?>&city=<?= $city_page ?>&area=<?= $area_page ?>" class="page-btn page-prev">
                                                <span class="material-symbols-outlined">
                                                    arrow_back
                                                </span>
                                            </a>

                                        <?php
                                        }
                                        if ($country_page > 2) {
                                        ?>
                                            <a href="?country=1&city=<?= $city_page ?>&area=<?= $area_page ?>" class="page-btn">1</a>
                                            <?php
                                            ?>
                                            <a href="javascript:void(0)" class="page-btn page-dots">
                                                <span class="material-symbols-outlined">
                                                    page_control
                                                </span>
                                            </a>

                                        <?php
                                        }

                                        for ($i = $country_page -  1; $i <= $country_page + 1; $i++) {
                                            if ($i < 1) {
                                                continue;
                                            } else if ($i > $total__result) {
                                                continue;
                                            }
                                        ?>
                                            <a href="?country=<?= $i ?>&city=<?= $city_page ?>&area=<?= $area_page ?>" class="page-btn <?= $i == $country_page ? 'active-page' : '' ?>"><?= $i ?></a>
                                        <?php
                                        }

                                        ?>

                                        <?php
                                        if ($country_page < $total__result - 1) {
                                            if ($country_page < $total__result - 2) {
                                        ?>
                                                <a href="javascript:void(0)" class="page-btn page-dots">
                                                    <span class="material-symbols-outlined">
                                                        page_control
                                                    </span>
                                                </a>
                                            <?php
                                            }
                                            ?>
                                            <a href="?country=<?= $total__result  ?>&city=<?= $city_page ?>&area=<?= $city_page ?>" class="page-btn"><?= $total__result ?>
                                            </a>


                                        <?php
                                        }
                                        if ($country_page < $total__result) {
                                        ?>
                                            <a href="?country=<?= $country_page +  1 ?>&city=<?= $city_page ?>&area=<?= $area_page ?>" class="page-btn page-next">
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

                    </div>






                    <!-- footer here -->
                </div>
                <!-- country ends here -->
                <!-- city  starts here -->
                <div class="col-12 location-page-container p-4 my-2">
                    <h4 class="text-center page-head mt-1 mb-4">City data</h4>
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-sm-12 my-4">
                            <div class="country-form location-form col-12 p-2">
                                <form action="" method="post" id="shahh">
                                    <div class="col-12 p-inp-div d-flex flex-column ">
                                        <label for="" class="p-inp-label">country</label>
                                        <select name="ci_country_id" id="country-data" class="p-inp-field">
                                            <option value="">select country</option>
                                            <?php
                                            $fetchCountry = fetchAllData($con, 'country');
                                            while ($sh = mysqli_fetch_assoc($fetchCountry)) {
                                            ?>
                                                <option value="<?= $sh['Id'] ?>"><?= $sh['country']  ?></option>

                                            <?php
                                            }
                                            ?>


                                        </select>
                                    </div>
                                    <div class="col-12 p-inp-div d-flex flex-column ">
                                        <label for="" class="p-inp-label">city name</label>
                                        <input type="text" name="ci_city_name" class="p-inp-field" placeholder="city name" id="city-name">
                                        <input type="hidden" name="city-key" value="" id="city-key">
                                    </div>
                                    <div class="col-12 d-flex justify-content-start">
                                        <input type="submit" value="add city" class="sub-btn w-auto" name="ci_city_form" id="city_sub_btn">
                                    </div>
                                </form>
                            </div>
                            <?php
                            if (isset($_POST['ci_city_form'])) {
                                if ($_POST['ci_city_name'] != '' && $_POST['ci_country_id'] != '') {
                                    $name = mine_sanitize_string($_POST['ci_city_name']);
                                    $country_id = mine_sanitize_string($_POST['ci_country_id']);

                                    $check_duplication = fetchOtherdetails($con, 'city', 'name', $name);
                                    if (mysqli_num_rows($check_duplication) == 0 ) {
                                        $insert_data = mysqli_prepare($con, "INSERT INTO `city`( `name`, `country_id`) VALUES (?,?)");
                                        mysqli_stmt_bind_param($insert_data, 'ss', $name, $country_id);
                                        if (mysqli_stmt_execute($insert_data)) {
                                            alerting('city added successfully', 'location.php');
                                        } else {
                                            alerting('failed to add city', 'location.php');
                                        }
                                    } else {
                                        alerting('the city name is already present', 'location.php');
                                    }
                                } else {
                                    alerting('Enter complete information', 'location.php');
                                }
                            }
                            ?>
                        </div>
                        <div class="col-lg-8 col-md-12 col-sm-12 my-4">
                            <div class="col-12  justify-content-start align-items-end gap-2 d-flex mt-0 action-select other-type-filter">
                                <div class="filter-inp-div">
                                    <select name="" id="" class="product-sort w-100">
                                        <option value="">Action</option>
                                        <option value="">Move to trash</option>
                                        <option value="">Delete permenantly</option>
                                        <option value="">Approve </option>
                                    </select>
                                </div>

                                <div class="filter-inp-div">
                                    <input type="text" placeholder="search category" class="search-products w-100">
                                </div>

                            </div>
                            <div class="col-12 table-responsive product-wrapper py-0">

                                <table class=" product-table w-100 mt-0 ">
                                    <thead>
                                        <tr>

                                            <th><input type="checkbox" name="cityId[]" id=""></th>
                                            <th>sno</th>
                                            <th>country name</th>
                                            <th>city name</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $ci_sno = 0 + $city_offset;
                                        $city_total_result = mysqli_num_rows(fetchAllData($con, 'city'));
                                        $city_data = fetchLimitedDataWithOffset($con, 'city', 'Id', $limit, $city_offset);
                                        while ($ci = mysqli_fetch_assoc($city_data)) {
                                            $ci_sno++;
                                        ?>
                                            <tr>
                                                <td><input type="checkbox" name="cityId[]" value="<?= $ci['Id'] ?>" id=""></td>
                                                <td><?= $ci_sno ?></td>
                                                <td><?php
                                                    $fet_con_data = fetchOtherdetails($con, 'country', 'Id', $ci['country_id']);
                                                    echo mysqli_fetch_assoc($fet_con_data)['country'];
                                                    ?></td>
                                                <td><?= dec_function($ci['name']) ?></td>
                                                <td>
                                                    <div class="action-button-div">
                                                        <a href="javascript:void(0)" class="edit-btn edit-pop upd-city-data" data-action-id="<?= $ci['Id'] ?>">
                                                            <span class="material-symbols-outlined">
                                                                edit
                                                            </span>
                                                        </a>

                                                        <a href="?delete-city=<?= $ci['Id'] ?>" class="delete-btn">
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
                            <div class="col-12 custom-pagination-wrapper d-flex justify-content-between my-2 px-1 align-items-center ">

                                <?php
                                $total__result = ceil($city_total_result / $limit);
                                if ($total__result < $city_page) {
                                ?>
                                    <script>
                                        window.location.href = 'location.php?country=<?= $country_page  ?>&city=<?= $total__result ?>&area=<?= $area_page ?>'
                                    </script>
                                <?php
                                }
                                $startNo = 1 + $city_offset;
                                $rangeNo = min(($city_page * $limit), $city_total_result);
                                ?>

                                <div class="col-12 cus-pagination  d-flex ">
                                    <div class="page-num-wrapper d-flex gap-2">
                                        <?php
                                        if ($city_page > 1) {
                                        ?>
                                            <a href="?country=<?= $country_page  ?>&city=<?= $city_page -  1 ?>&area=<?= $area_page ?>" class="page-btn page-prev">
                                                <span class="material-symbols-outlined">
                                                    arrow_back
                                                </span>
                                            </a>

                                        <?php
                                        }
                                        if ($city_page > 2) {
                                        ?>
                                            <a href="?country=<?= $country_page ?>&city=1&area=<?= $area_page ?>" class="page-btn">1</a>
                                            <a href="javascript:void(0)" class="page-btn page-dots">
                                                <span class="material-symbols-outlined">
                                                    page_control
                                                </span>
                                            </a>
                                        <?php

                                        }

                                        for ($i = $city_page -  1; $i <= $city_page + 1; $i++) {
                                            if ($i < 1) {
                                                continue;
                                            } else if ($i > $total__result) {
                                                continue;
                                            }
                                        ?>
                                            <a href="?country=<?= $country_page ?>&city=<?= $i ?>&area=<?= $area_page ?>" class="page-btn <?= $i == $city_page ? 'active-page' : '' ?>"><?= $i ?></a>
                                        <?php
                                        }

                                        ?>

                                        <?php
                                        if ($city_page < $total__result - 1) {
                                            if ($city_page < $total__result - 2) {
                                        ?>
                                                <a href="javascript:void(0)" class="page-btn page-dots">
                                                    <span class="material-symbols-outlined">
                                                        page_control
                                                    </span>
                                                </a>
                                            <?php
                                            }
                                            ?>
                                            <a href="?country=<?= $country_page  ?>&city=<?= $total__result ?>&area=<?= $area_page ?>" class="page-btn"><?= $total__result ?>
                                            </a>


                                        <?php
                                        }
                                        if ($city_page < $total__result) {
                                        ?>
                                            <a href="?country=<?= $country_page  ?>&city=<?= $city_page +  1 ?>&area=<?= $area_page ?>" class="page-btn page-next">
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

                    </div>
                </div>
                <!-- area  starts here -->
                <div class="col-12 location-page-container p-4 my-2">
                    <h4 class="text-center page-head mt-1 mb-4">Area data</h4>
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-sm-12 my-4">
                            <div class="country-form location-form col-12 p-2">
                                <form action="" method="post" id="shahhh">
                                    <div class="col-12 p-inp-div d-flex flex-column ">
                                        <label for="" class="p-inp-label">city</label>
                                        <select name="ai_city_id" id="areaCityData" class="p-inp-field">
                                            <option value="">select city</option>
                                            <?php
                                            $fetchCity = fetchAllData($con, 'city');
                                            while ($sh = mysqli_fetch_assoc($fetchCity)) {
                                            ?>
                                                <option value="<?= $sh['Id'] ?>"><?= $sh['name']  ?></option>

                                            <?php
                                            }
                                            ?>

                                        </select>
                                    </div>
                                    <div class="col-12 p-inp-div d-flex flex-column ">
                                        <label for="" class="p-inp-label">area name</label>
                                        <input type="text" name="ai_area_name" class="p-inp-field" placeholder="area name" id="area-name">
                                        <input type="hidden" name="upd_area_key" class="p-inp-field" placeholder="area name" id="area-key">

                                    </div>
                                    <div class="col-12 d-flex justify-content-start">
                                        <input type="submit" value="add area" class="sub-btn w-auto" name="ai_area_form" id="area_sub_btn">
                                    </div>
                                </form>
                            </div>
                            <?php
                            if (isset($_POST['ai_area_form'])) {
                                if ($_POST['ai_area_name'] != '' && $_POST['ai_city_id'] != '') {
                                    $name = mine_sanitize_string($_POST['ai_area_name']);
                                    $city_id = mine_sanitize_string($_POST['ai_city_id']);
                                    $check_duplication = fetchOtherdetails($con, 'area', 'name', $name);
                                    if (mysqli_num_rows($check_duplication) == 0) {
                                        $insert_data = mysqli_prepare($con, "INSERT INTO `area`( `name`, `city_id`) VALUES (?,?)");
                                        mysqli_stmt_bind_param($insert_data, 'ss', $name, $city_id);
                                        if (mysqli_stmt_execute($insert_data)) {
                                            alerting('area added successfully', 'location.php');
                                        } else {
                                            alerting('failed to add area', 'location.php');
                                        }
                                    } else {
                                        alerting('the area name is already present', 'location.php');
                                    }
                                } else {
                                    alerting('Enter complete information', 'location.php');
                                }
                            }
                            ?>

                        </div>
                        <div class="col-lg-8 col-md-12 col-sm-12 my-4">
                            <div class="col-12  justify-content-start align-items-end gap-2 d-flex mt-0 action-select other-type-filter">
                                <div class="filter-inp-div">
                                    <select name="" id="" class="product-sort w-100">
                                        <option value="">Action</option>
                                        <option value="">Move to trash</option>
                                        <option value="">Delete permenantly</option>
                                        <option value="">Approve </option>
                                    </select>
                                </div>

                                <div class="filter-inp-div">
                                    <input type="text" placeholder="search category" class="search-products w-100">
                                </div>

                            </div>
                            <div class="col-12 table-responsive product-wrapper py-0">
                                <table class=" product-table w-100 mt-0 ">
                                    <thead>
                                        <tr>

                                            <th><input type="checkbox" name="areaId[]" id=""></th>
                                            <th>sno</th>
                                            <th>city name</th>
                                            <th>area name</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $ai_sno = 0 + $area_offset;
                                        $area_total_result = mysqli_num_rows(fetchAllData($con, 'area'));
                                        $area_data = fetchLimitedDataWithOffset($con, 'area', 'Id', $limit, $area_offset);
                                        while ($ai = mysqli_fetch_assoc($area_data)) {
                                            $ai_sno++;
                                        ?>
                                            <tr>
                                                <td><input type="checkbox" name="cityId[]" value="<?= $ai['Id'] ?>" id=""></td>
                                                <td><?= $ai_sno ?></td>
                                                <td><?php
                                                    $fet_city_data = fetchOtherdetails($con, 'city', 'Id', $ai['city_id']);
                                                    echo mysqli_fetch_assoc($fet_city_data)['name'];
                                                    ?></td>
                                                <td><?= dec_function($ai['name']) ?></td>
                                                <td>
                                                    <div class="action-button-div">
                                                        <a href="javascript:void(0)" class="edit-btn edit-pop area-edit-btn" data-action-id="<?= $ai['Id'] ?>">
                                                            <span class="material-symbols-outlined">
                                                                edit
                                                            </span>
                                                        </a>

                                                        <a href="?delete-city=<?= $ai['Id'] ?>" class="delete-btn">
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
                            <div class="col-12 custom-pagination-wrapper d-flex justify-content-between my-2 px-1 align-items-center ">

                                <?php
                                $total__result = ceil($area_total_result / $limit);
                                if ($total__result < $area_page) {
                                ?>
                                    <script>
                                        window.location.href = 'location.php?country=<?= $country_page  ?>&city=<?= $city_page ?>&area=<?= $total__result ?>'
                                    </script>
                                <?php
                                }
                                $startNo = 1 + $area_offset;
                                $rangeNo = min(($area_page * $limit), $area_total_result);
                                ?>

                                <div class="col-12 cus-pagination  d-flex ">
                                    <div class="page-num-wrapper d-flex gap-2">
                                        <?php
                                        if ($area_page > 1) {
                                        ?>
                                            <a href="?country=<?= $country_page  ?>&city=<?= $city_page ?>&area=<?= $area_page -  1  ?>" class="page-btn page-prev">
                                                <span class="material-symbols-outlined">
                                                    arrow_back
                                                </span>
                                            </a>

                                        <?php
                                        }
                                        if ($area_page > 2) {
                                        ?>
                                            <a href="?country=<?= $country_page ?>&city=<?= $city_page ?>&area=1" class="page-btn">1</a>
                                            <a href="javascript:void(0)" class="page-btn page-dots">
                                                <span class="material-symbols-outlined">
                                                    page_control
                                                </span>
                                            </a>
                                        <?php

                                        }

                                        for ($i = $area_page -  1; $i <= $area_page + 1; $i++) {
                                            if ($i < 1) {
                                                continue;
                                            } else if ($i > $total__result) {
                                                continue;
                                            }
                                        ?>
                                            <a href="?country=<?= $country_page ?>&city=<?= $city_page ?>&area=<?= $i ?>" class="page-btn <?= $i == $area_page ? 'active-page' : '' ?>"><?= $i ?></a>
                                        <?php
                                        }

                                        ?>

                                        <?php
                                        if ($area_page < $total__result - 1) {
                                            if ($area_page < $total__result - 2) {
                                        ?>
                                                <a href="javascript:void(0)" class="page-btn page-dots">
                                                    <span class="material-symbols-outlined">
                                                        page_control
                                                    </span>
                                                </a>
                                            <?php
                                            }
                                            ?>
                                            <a href="?country=<?= $country_page  ?>&city=<?= $city_page ?>&area=<?= $total__result ?>" class="page-btn"><?= $total__result ?>
                                            </a>


                                        <?php
                                        }
                                        if ($area_page < $total__result) {
                                        ?>
                                            <a href="?country=<?= $country_page  ?>&city=<?= $city_page ?>&area=<?= $area_page  +  1 ?>" class="page-btn page-next">
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

                    </div>
                </div>

                <?php include('include/footer.php') ?>
    </main>



    <!--   Core JS Files   -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"></script>
    <script src="../assets/js/location.js"></script>
    <?php include('include/script.php') ?>

    <script>
        $(document).ready(function() {

            $("#shah").validate({

                rules: {

                    cn_country_name: "required",
                    cn_country_code: "required",
                },
                messages: {

                    cn_country_name: "put country name",
                    cn_country_code: "put country code",
                }

            })

            $("#shahh").validate({

                rules: {

                    ci_country_id: "required",
                    ci_city_name: "required",
                },
                messages: {

                    ci_country_id: "select country",
                    ci_city_name: "put city name",
                }

            })
            
            $("#shahhh").validate({

                rules: {

                    ai_city_id: "required",
                    ai_area_name: "required",
                },
                messages: {

                    ai_city_id: "select city",
                    ai_area_name: "put area name",
                }

            })
        });

    </script>


</body>

</html>


<?php
