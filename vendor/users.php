<?php
session_start();
if (!isset($_SESSION['vendor_email'])) {  header('location:login.php');} ?>
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
                <div class="col-12 d-flex justify-content-between p-2">
                    <h3 class="page-head">Orders</h3>
                    <h6 class="brd-crumbs brd-crumbs-active"><a href="index.php">Dashboard</a>/<a href="">orders</a></h6>
                </div>



                <!-- filter options -->
                <div class="col-12  p-2 justify-content-start align-items-end gap-2 d-flex mt-4">
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
                                        <div class="arrow-div d-flex flex-column gap-0">
                                            <span class="material-symbols-outlined table-up">
                                                expand_less
                                            </span>
                                            <span class="material-symbols-outlined">
                                                keyboard_arrow_down
                                            </span>
                                        </div>
                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex gap-2 align-items-center">
                                        name
                                        <div class="arrow-div d-flex flex-column gap-0">
                                            <span class="material-symbols-outlined table-up">
                                                expand_less
                                            </span>
                                            <span class="material-symbols-outlined">
                                                keyboard_arrow_down
                                            </span>
                                        </div>
                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex gap-2 align-items-center">
                                        email
                                        <div class="arrow-div d-flex flex-column gap-0">
                                            <span class="material-symbols-outlined table-up">
                                                expand_less
                                            </span>
                                            <span class="material-symbols-outlined">
                                                keyboard_arrow_down
                                            </span>
                                        </div>
                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex gap-2 align-items-center">
                                        phone
                                        <div class="arrow-div d-flex flex-column gap-0">
                                            <span class="material-symbols-outlined table-up">
                                                expand_less
                                            </span>
                                            <span class="material-symbols-outlined">
                                                keyboard_arrow_down
                                            </span>
                                        </div>
                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex gap-2 align-items-center">
                                        C.N.I.C
                                        <div class="arrow-div d-flex flex-column gap-0">
                                            <span class="material-symbols-outlined table-up">
                                                expand_less
                                            </span>
                                            <span class="material-symbols-outlined">
                                                keyboard_arrow_down
                                            </span>
                                        </div>
                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex gap-2 align-items-center">
                                    Business Name
                                        <div class="arrow-div d-flex flex-column gap-0">
                                            <span class="material-symbols-outlined table-up">
                                                expand_less
                                            </span>
                                            <span class="material-symbols-outlined">
                                                keyboard_arrow_down
                                            </span>
                                        </div>
                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex gap-2 align-items-center">
                                    Country
                                        <div class="arrow-div d-flex flex-column gap-0">
                                            <span class="material-symbols-outlined table-up">
                                                expand_less
                                            </span>
                                            <span class="material-symbols-outlined">
                                                keyboard_arrow_down
                                            </span>
                                        </div>
                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex gap-2 align-items-center">
                                    City
                                        <div class="arrow-div d-flex flex-column gap-0">
                                            <span class="material-symbols-outlined table-up">
                                                expand_less
                                            </span>
                                            <span class="material-symbols-outlined">
                                                keyboard_arrow_down
                                            </span>
                                        </div>
                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex gap-2 align-items-center">
                                        zipcode
                                        <div class="arrow-div d-flex flex-column gap-0">
                                            <span class="material-symbols-outlined table-up">
                                                expand_less
                                            </span>
                                            <span class="material-symbols-outlined">
                                                keyboard_arrow_down
                                            </span>
                                        </div>
                                    </div>
                                </th>
                                <th>
                                    <div class="d-flex gap-2 align-items-center">
                                        address
                                        <div class="arrow-div d-flex flex-column gap-0">
                                            <span class="material-symbols-outlined table-up">
                                                expand_less
                                            </span>
                                            <span class="material-symbols-outlined">
                                                keyboard_arrow_down
                                            </span>
                                        </div>
                                    </div>
                                </th>
                               
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>1</td>
                                <td>palestine</td>
                                <td>ak@gmail.com</td>
                                <td>0319000654</td>
                                <td>41403-1127789-5</td>
                                <td>Bigstore</td>
                                <td>Pakistan</td>
                                <td>Karachi</td>
                                <td>71500</td>
                                <td>autobhan near pk roll point,hyderabad</td>
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

                            <tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>1</td>

                                <td>palestine</td>
                                <td>ak@gmail.com</td>
                                <td>0319000654</td>
                                <td>41403-1127789-5</td>
                                <td>Bigstore</td>
                                <td>Pakistan</td>
                                <td>Karachi</td>
                                <td>71500</td>
                                <td>autobhan near pk roll point,hyderabad</td>
                            
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
                            <tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>1</td>

                                <td>palestine</td>
                                <td>ak@gmail.com</td>
                                <td>0319000654</td>
                                <td>41403-1127789-5</td>
                                <td>Bigstore</td>
                                <td>Pakistan</td>
                                <td>Karachi</td>
                                <td>71500</td>
                                <td>autobhan near pk roll point,hyderabad</td>
                            
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
                            <tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>1</td>

                                <td>palestine</td>
                                <td>ak@gmail.com</td>
                                <td>0319000654</td>
                                <td>41403-1127789-5</td>
                                <td>Bigstore</td>
                                <td>Pakistan</td>
                                <td>Karachi</td>
                                <td>71500</td>
                                <td>autobhan near pk roll point,hyderabad</td>
                            
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
                            <tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>1</td>

                                <td>palestine</td>
                                <td>ak@gmail.com</td>
                                <td>0319000654</td>
                                <td>41403-1127789-5</td>
                                <td>Bigstore</td>
                                <td>Pakistan</td>
                                <td>Karachi</td>
                                <td>71500</td>
                                <td>autobhan near pk roll point,hyderabad</td>
                            
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
                            <tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>1</td>

                                <td>palestine</td>
                                <td>ak@gmail.com</td>
                                <td>0319000654</td>
                                <td>41403-1127789-5</td>
                                <td>Bigstore</td>
                                <td>Pakistan</td>
                                <td>Karachi</td>
                                <td>71500</td>
                                <td>autobhan near pk roll point,hyderabad</td>
                            
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
                            <tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>1</td>

                                <td>palestine</td>
                                <td>ak@gmail.com</td>
                                <td>0319000654</td>
                                <td>41403-1127789-5</td>
                                <td>Bigstore</td>
                                <td>Pakistan</td>
                                <td>Karachi</td>
                                <td>71500</td>
                                <td>autobhan near pk roll point,hyderabad</td>
                            
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
                            <tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>1</td>

                                <td>palestine</td>
                                <td>ak@gmail.com</td>
                                <td>0319000654</td>
                                <td>41403-1127789-5</td>
                                <td>Bigstore</td>
                                <td>Pakistan</td>
                                <td>Karachi</td>
                                <td>71500</td>
                                <td>autobhan near pk roll point,hyderabad</td>
                            
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
                            <tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>1</td>

                                <td>palestine</td>
                                <td>ak@gmail.com</td>
                                <td>0319000654</td>
                                <td>41403-1127789-5</td>
                                <td>Bigstore</td>
                                <td>Pakistan</td>
                                <td>Karachi</td>
                                <td>71500</td>
                                <td>autobhan near pk roll point,hyderabad</td>
                            
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
                            <tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>1</td>

                                <td>palestine</td>
                                <td>ak@gmail.com</td>
                                <td>0319000654</td>
                                <td>41403-1127789-5</td>
                                <td>Bigstore</td>
                                <td>Pakistan</td>
                                <td>Karachi</td>
                                <td>71500</td>
                                <td>autobhan near pk roll point,hyderabad</td>
                            
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
                            <tr>
                                <td><input type="checkbox" name="" id=""></td>
                                <td>1</td>

                                <td>palestine</td>
                                <td>ak@gmail.com</td>
                                <td>0319000654</td>
                                <td>41403-1127789-5</td>
                                <td>Bigstore</td>
                                <td>Pakistan</td>
                                <td>Karachi</td>
                                <td>71500</td>
                                <td>autobhan near pk roll point,hyderabad</td>
                            
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
                        </tbody>
                    </table>
                </div>




                <!-- grid view column -->


                <!-- pagination and information -->
                <div class="col-12 custom-pagination-wrapper d-flex justify-content-between my-2 px-4 align-items-center">
                    <div class="col-4 pagination-message">
                        showing ( <span class="show-product-num">12</span> Out of <span class="total-product-num">120</span> products )
                    </div>
                    <div class="col-4 cus-pagination d-flex justify-content-end">
                        <div class="page-num-wrapper d-flex gap-2">
                            <a href="javascript:void(0)" class="page-btn page-prev">
                                <span class="material-symbols-outlined">
                                    arrow_back
                                </span>
                            </a>
                            <a href="javascript:void(0)" class="page-btn">1</a>
                            <a href="javascript:void(0)" class="page-btn page-dots">
                                <span class="material-symbols-outlined">
                                    page_control
                                </span>
                            </a>
                            <a href="javascript:void(0)" class="page-btn">2</a>
                            <a href="javascript:void(0)" class="page-btn">3</a>
                            <a href="javascript:void(0)" class="page-btn">4</a>
                            <a href="javascript:void(0)" class="page-btn page-dots">
                                <span class="material-symbols-outlined">
                                    page_control
                                </span>
                            </a>
                            <a href="javascript:void(0)" class="page-btn">10</a>
                            <a href="javascript:void(0)" class="page-btn page-next">
                                <span class="material-symbols-outlined">
                                    arrow_forward
                                </span>
                            </a>
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