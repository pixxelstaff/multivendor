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
        Lanotte - saloon dashboard
    </title>
    <?php include('include/links.php') ?>
    <!-- cdn for datatables -->
    <?php
    // $id = isset($_GET['id']) ? base64_decode($_GET['id']) :
    if (isset($_GET['id'])) {
        $id = base64_decode($_GET['id']);
        if (is_numeric($id)) {
            $data = fetchOtherdetails($con, 'service', 'Id', $id);
            while( $assoc_data = mysqli_fetch_assoc($data)){
                $name = $assoc_data['name'];
                $des = $assoc_data['description'];
                $price = $assoc_data['price'];
                $sale_price = $assoc_data['sale_price'];
                $category = $assoc_data['category'];
                $tags = $assoc_data['tags'];
                $excerpt = $assoc_data['excerpt'];
                $image = $assoc_data['featured_image'];
                 $gallery_image =  !empty($assoc_data['gallery_images']) ? explode(',', $assoc_data['gallery_images']) : [];
                 $service = json_decode($assoc_data['services_data'], true);
            }
            // $assoc_data = mysqli_fetch_assoc($data);
        } else {
    ?> <script>
                alert("id is not proper");
                window.location.href = 'product.php'
            </script> <?php
                    }
                } else {
                        ?>
        <script>
            window.location.href = 'product.php'
        </script>
    <?php
                }
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
                <div class="col-12 d-flex justify-content-between p-2">
                    <h3 class="page-head">service-details</h3>
                    <h6 class="brd-crumbs">
                        <a href="index.php" class="brd-crumbs-active ">Dashboard</a>/
                        <a href="product.php" class="brd-crumbs-active ">service</a>/
                        <a href="javascript:void(0)"><?= dec_function($name) ?></a>
                    </h6>
                </div>
                <div class="sng-prodcut-layout col-12 p-2">
                    <div class="d-flex flex-wrap">
                        <div class="col-lg-4 text-center product-slider-wrapper">
                            <div class="col-12" id="product-slider">
                                <div class="owl-carousel owl-theme">
                                    <?php
                                   
                                    if (!empty($image) || count($gallery_image) > 0) {
                                    ?>
                                        <div class="item prodcut-image-item">
                                            <img src="../images/uploadimg/<?= $image ?>" alt="">
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="item prodcut-image-item">
                                            <img src="../images/uploadimg/down.webp" alt="">
                                        </div>
                                    <?php
                                    }

                                    foreach ($gallery_image as $img) {
                                    ?>
                                        <div class="item prodcut-image-item">
                                            <img src="../images/uploadimg/<?= $img ?>" alt="">
                                        </div>
                                    <?php
                                    }

                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 product-info-wrapper">
                            <h2 class="sng-product-title"><?= dec_function($name) ?></h2>
                            <h4 class="sng-prodcut-price">
                                <?php
                                if ($sale_price) {
                                ?>
                                   
                                    <span style="text-decoration:line-through"> <span class="currency">$</span> <?= $price ?></span>
                                    <span class="currency">$</span> <?= $sale_price ?>
                                <?php
                                } else {
                                ?>
                                    <span class="currency">$</span><?= $price ?>
                                <?php
                                }
                                ?>


                            </h4>
                            <p class="sng-product-exercept">
                                <?= $excerpt ?>
                            </p>
                            <div class="product-rating-div col-12 d-flex gap-2 my-2 align-items-center">
                                <div class="product-star d-flex">
                                    <span class="star-icon"><i class="fa-solid fa-star"></i></span>
                                    <span class="star-icon"><i class="fa-solid fa-star"></i></span>
                                    <span class="star-icon"><i class="fa-solid fa-star"></i></span>
                                    <span class="star-icon"><i class="fa-solid fa-star"></i></span>
                                    <span class="star-icon"><i class="fa-solid fa-star"></i></span>
                                </div>
                                <span class="review-num">(3.6) 1.7k reviews</span>
                            </div>
                            <ul class="imp-info w-100 d-flex flex-column">
                                <li><label for="">Category :</label> <?= $category;  ?></li>
                                <li><label for="">tags :</label> <?= $tags ?></li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 product-main-data p-2">
                    <div class="vendor-tabs-btn-div col-12 mt-4">
                        <ul class="tabs-ul justify-content-center">
                            <li><a href="javascript:void(0)" class="tabs-anc active-anc" data-id='info-tab'>Description</a></li>
                            <li><a href="javascript:void(0)" class="tabs-anc" data-id="about-tab">services</a></li>
                            <li><a href="javascript:void(0)" class="tabs-anc" data-id="contact-tab">Reviews </a></li>
                        </ul>
                    </div>
                    <div class="vendor-tabs-div col-12 mt-4">
                        <div class="vendor-tab col-12 active-vendor-tab description-div" id="info-tab">
                            <?php
                            $des = stripcslashes($des);
                            $decode_des =  html_entity_decode($des);
                            echo $decode_des;
                            ?>
                        </div>
                        <div class="vendor-tab col-12 d-none" id="about-tab">
                            <div class="col-12 table-responsive p-4">
                                <table class="info-table w-100">
                                    <tbody>
                                        <tr>
                                            <td>Product</td>
                                            <td>description</td>
                                        </tr>
                                        <?php
                                        foreach ($service as $data) {
                                        ?>
                                            <tr>
                                                <td><?= $data['name'] ?></td>
                                                <td><?= $data['description'] ?></td>
                                            </tr>
                                        <?php
                                        }
                                        ?>



                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="vendor-tab col-12 d-none" id="contact-tab">
                            <p class="msg text-center">there are no attributes</p>

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

    <script>
        $('#product-slider .owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        })
    </script>

</body>

</html>