<?php
session_start();
if (!isset($_SESSION['email']) || !isset($_GET['id'])) {
    header('location:login.php');
} 
$decoded_id = base64_decode($_GET['id']);


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

    <?php
    $fetch__vendor__data = fetchOtherdetails($con, 'vendor', 'id', $decoded_id);

    if (mysqli_num_rows($fetch__vendor__data) > 0) {
        $viewed = '1';
        $upd__v__data = mysqli_prepare($con, "UPDATE `vendor` SET `viewed`= ? WHERE `Id` = ?");
        mysqli_stmt_bind_param($upd__v__data, 'ss', $viewed, $decoded_id);
        mysqli_stmt_execute($upd__v__data);
    } else {
        alerting('invalid id', 'vendor-list.php');
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
            <div class="col-12 p-2 rounded bg-white">
                <h2 class="dash-head">Vendor profile</h2>
            </div>

            <div class="col-12 main-profile-div p-4 mt-4 bg-white rounded overflow-hidden">
                <div class="banner-div col-12">
                    <div class="vendor-profile-pic">
                        <img src="../images/dashboard-img/sal.png" alt="">
                    </div>
                    <div class="map-div w-100 p-0">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d57675.49282374098!2d68.34884445!3d25.3807559!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2s!4v1708446542311!5m2!1sen!2s" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-12 main-info">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <h4>muhammad shayan</h4>
                            <p>shayani99@gmail.com</p>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 d-flex justify-content-end align-items-center">
                            <a href="javascript:void(0)" class="send-message-btn"><i class="fa-regular fa-comment-dots"></i> </a>
                        </div>
                    </div>
                </div>
                <div class="vendor-analytical-div col-12 mt-4 p-2">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="str-head">store overview</h2>
                            <p class="str-p">see vendor details</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div id="areaChart"></div>
                        </div>
                        <div class="col-lg-4">
                            <div class="w-100 d-flex icon-box-row">
                                <div class="icon-box-wrapper">
                                    <div class="icon-box">
                                        <i class="fa-solid fa-box"></i>
                                    </div>
                                    <h6>Total Products</h6>
                                    <p class="analytical_num">7346$</p>
                                </div>
                                <div class="icon-box-wrapper">
                                    <div class="icon-box">
                                        <i class="fa-solid fa-credit-card"></i>
                                    </div>
                                    <h6>Total Sales</h6>
                                    <p class="analytical_num">7346$</p>
                                </div>
                            </div>
                            <div class="w-100 d-flex icon-box-row">
                                <div class="icon-box-wrapper">
                                    <div class="icon-box">
                                        <i class="fa-solid fa-boxes-packing"></i>
                                    </div>
                                    <h6>Total Refund</h6>
                                    <p class="analytical_num">7346$</p>
                                </div>
                                <div class="icon-box-wrapper">
                                    <div class="icon-box">
                                        <i class="fa-solid fa-star-half-stroke"></i>
                                    </div>
                                    <h6>Vendor rating</h6>
                                    <p class="analytical_num">7346$</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="vendor-tabs-btn-div col-12 mt-4">
                    <ul class="tabs-ul">
                        <li><a href="javascript:void(0)" class="tabs-anc " data-id='info-tab'>Information</a></li>
                        <li><a href="javascript:void(0)" class="tabs-anc" data-id="about-tab">Bio</a></li>
                        <li><a href="javascript:void(0)" class="tabs-anc" data-id="contact-tab">Contact details</a></li>
                        <li><a href="javascript:void(0)" class="tabs-anc active-anc" data-id="services-tab">Services</a></li>
                    </ul>
                </div>
                <div class="vendor-tabs-div col-12 mt-4">
                    <div class="vendor-tab col-12 d-none" id="info-tab">
                        <div class="w-100 d-flex field-parent">
                            <div class="field-box">
                                <label for="">Business name</label>
                                <input type="text" value="Lanotte" disabled>
                            </div>
                            <div class="field-box">
                                <label for="">Owner name</label>
                                <input type="text" value="muhammad shayan" disabled>
                            </div>
                            <div class="field-box">
                                <label for="">Total Service</label>
                                <input type="text" value="34 services" disabled>
                            </div>

                        </div>
                        <div class="w-100 d-flex field-parent">
                            <div class="field-box">
                                <label for="">Indetification-num</label>
                                <input type="text" value="41302-1875474-1" disabled>
                            </div>
                            <div class="field-box">
                                <label for="">Email</label>
                                <input type="text" value="muhammadfurqan8@gmai.com" disabled>
                            </div>
                            <div class="field-box">
                                <label for="">Contact-num</label>
                                <input type="text" value="0313726237" disabled>
                            </div>
                        </div>
                        <div class="w-100 d-flex field-parent">
                            <div class="field-box">
                                <label for="">Phonenumber</label>
                                <input type="text" value="03167253625" disabled>
                            </div>
                            <div class="field-box">
                                <label for="">Address</label>
                                <input type="text" value="Office # 404-406, 9th Floor, Dawood Mart Autoban, Latifabad Unit # 3 Latifabad Unit 3 Latifabad, Hyderabad, Sindh, Pakistan" disabled>
                            </div>
                            <div class="field-box">
                                <label for="">City</label>
                                <input type="text" value="Hyderabad" disabled>
                            </div>
                        </div>
                        <div class="w-100 d-flex field-parent">
                            <div class="field-box">
                                <label for="">Country</label>
                                <input type="text" value="Pakistan" disabled>
                            </div>
                            <div class="field-box">
                                <label for="">Zipcode</label>
                                <input type="text" value="71000" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="vendor-tab col-12 d-none" id="about-tab">
                        <label for="" class="tab-label">About Lanotte</label>
                        <textarea name="" id="" rows="10" class="w-100 cus-text-area" disabled>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat, eum voluptates. Qui, corrupti! Nulla aperiam veritatis, accusantium ea explicabo neque assumenda architecto nisi nobis. Nulla fugit unde impedit odit eius.</textarea>
                    </div>
                    <div class="vendor-tab col-12 d-none" id="contact-tab">
                        <div class="w-100 d-flex field-parent">
                            <div class="field-box">
                                <label for="">Email</label>
                                <input type="text" value="muhammadfurqan8@gmai.com" disabled>
                            </div>
                            <div class="field-box">
                                <label for="">Contact-num</label>
                                <input type="text" value="0313726237" disabled>
                            </div>
                            <div class="field-box">
                                <label for="">Phonenumber</label>
                                <input type="text" value="03167253625" disabled>
                            </div>
                        </div>
                        <div class="w-100 d-flex field-parent">

                            <div class="field-box">
                                <label for="">Address</label>
                                <input type="text" value="Office # 404-406, 9th Floor, Dawood Mart Autoban, Latifabad Unit # 3 Latifabad Unit 3 Latifabad, Hyderabad, Sindh, Pakistan" disabled>
                            </div>
                            <div class="field-box">
                                <label for="">zipcode</label>
                                <input type="text" value="71000" disabled>
                            </div>
                        </div>

                    </div>
                    <div class="vendor-tab col-12  active-vendor-tab" id="services-tab">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-12 product-div">
                                <div class="col-12 product-inner-div">
                                    <div class="product-images-div">
                                        <img src="../images/dashboard-img/p-1.jpg" alt="">
                                        <img src="../images/dashboard-img/pd.jpg" class="p-second-image" alt="">
                                    </div>
                                    <a href="">
                                        <h4 class="product-title">
                                            zeo the best skin care prodcut
                                        </h4>
                                    </a>
                                    <p class="product-price">
                                        <span class="currency">$</span>
                                        65
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 product-div">
                                <div class="col-12 product-inner-div">
                                    <div class="product-images-div">
                                        <img src="../images/dashboard-img/p-2.jpg" alt="">
                                        <img src="../images/dashboard-img/pd.jpg" class="p-second-image" alt="">
                                    </div>
                                    <a href="">
                                        <h4 class="product-title">
                                            zeo the best skin care prodcut
                                        </h4>
                                    </a>
                                    <p class="product-price">
                                        <span class="currency">$</span>
                                        65
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 product-div">
                                <div class="col-12 product-inner-div">
                                    <div class="product-images-div">
                                        <img src="../images/dashboard-img/p-3.jpg" alt="">
                                        <img src="../images/dashboard-img/pd.jpg" class="p-second-image" alt="">
                                    </div>
                                    <a href="">
                                        <h4 class="product-title">
                                            zeo the best skin care prodcut
                                        </h4>
                                    </a>
                                    <p class="product-price">
                                        <span class="currency">$</span>
                                        65
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 product-div">
                                <div class="col-12 product-inner-div">
                                    <div class="product-images-div">
                                        <img src="../images/dashboard-img/p-4.jpg" alt="">
                                        <img src="../images/dashboard-img/pd.jpg" class="p-second-image" alt="">
                                    </div>
                                    <a href="">
                                        <h4 class="product-title">
                                            zeo the best skin care prodcut
                                        </h4>
                                    </a>
                                    <p class="product-price">
                                        <span class="currency">$</span>
                                        65
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 product-div">
                                <div class="col-12 product-inner-div">
                                    <div class="product-images-div">
                                        <img src="../images/dashboard-img/p-5.jpg" alt="">
                                        <img src="../images/dashboard-img/pd.jpg" class="p-second-image" alt="">
                                    </div>
                                    <a href="">
                                        <h4 class="product-title">
                                            zeo the best skin care prodcut
                                        </h4>
                                    </a>
                                    <p class="product-price">
                                        <span class="currency">$</span>
                                        65
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 product-div">
                                <div class="col-12 product-inner-div">
                                    <div class="product-images-div">
                                        <img src="../images/dashboard-img/p-6.jpg" alt="">
                                        <img src="../images/dashboard-img/pd.jpg" class="p-second-image" alt="">
                                    </div>
                                    <a href="">
                                        <h4 class="product-title">
                                            zeo the best skin care prodcut
                                        </h4>
                                    </a>
                                    <p class="product-price">
                                        <span class="currency">$</span>
                                        65
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 product-div">
                                <div class="col-12 product-inner-div">
                                    <div class="product-images-div">
                                        <img src="../images/dashboard-img/p-1.jpg" alt="">
                                        <img src="../images/dashboard-img/pd.jpg" class="p-second-image" alt="">
                                    </div>
                                    <a href="">
                                        <h4 class="product-title">
                                            zeo the best skin care prodcut
                                        </h4>
                                    </a>
                                    <p class="product-price">
                                        <span class="currency">$</span>
                                        65
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 product-div">
                                <div class="col-12 product-inner-div">
                                    <div class="product-images-div">
                                        <img src="../images/dashboard-img/p-2.jpg" alt="">
                                        <img src="../images/dashboard-img/pd.jpg" class="p-second-image" alt="">
                                    </div>
                                    <a href="">
                                        <h4 class="product-title">
                                            zeo the best skin care prodcut
                                        </h4>
                                    </a>
                                    <p class="product-price">
                                        <span class="currency">$</span>
                                        65
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 product-div">
                                <div class="col-12 product-inner-div">
                                    <div class="product-images-div">
                                        <img src="../images/dashboard-img/p-3.jpg" alt="">
                                        <img src="../images/dashboard-img/pd.jpg" class="p-second-image" alt="">
                                    </div>
                                    <a href="">
                                        <h4 class="product-title">
                                            zeo the best skin care prodcut
                                        </h4>
                                    </a>
                                    <p class="product-price">
                                        <span class="currency">$</span>
                                        65
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 product-div">
                                <div class="col-12 product-inner-div">
                                    <div class="product-images-div">
                                        <img src="../images/dashboard-img/p-4.jpg" alt="">
                                        <img src="../images/dashboard-img/pd.jpg" class="p-second-image" alt="">
                                    </div>
                                    <a href="">
                                        <h4 class="product-title">
                                            zeo the best skin care prodcut
                                        </h4>
                                    </a>
                                    <p class="product-price">
                                        <span class="currency">$</span>
                                        65
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 product-div">
                                <div class="col-12 product-inner-div">
                                    <div class="product-images-div">
                                        <img src="../images/dashboard-img/p-5.jpg" alt="">
                                        <img src="../images/dashboard-img/pd.jpg" class="p-second-image" alt="">
                                    </div>
                                    <a href="">
                                        <h4 class="product-title">
                                            zeo the best skin care prodcut
                                        </h4>
                                    </a>
                                    <p class="product-price">
                                        <span class="currency">$</span>
                                        65
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 product-div">
                                <div class="col-12 product-inner-div">
                                    <div class="product-images-div">
                                        <img src="../images/dashboard-img/p-6.jpg" alt="">
                                        <img src="../images/dashboard-img/pd.jpg" class="p-second-image" alt="">
                                    </div>
                                    <a href="">
                                        <h4 class="product-title">
                                            zeo the best skin care prodcut
                                        </h4>
                                    </a>
                                    <p class="product-price">
                                        <span class="currency">$</span>
                                        65
                                    </p>
                                </div>
                            </div>


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


</body>

</html>