<?php
session_start();
if (!isset($_SESSION['vendor_email'])) {
    header('location:login.php');
} ?>
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
            $data = fetchOtherdetails($con, 'product', 'id', $id);
            $assoc_data = mysqli_fetch_assoc($data);
            //later we will fixed it?
            // while($sng__p__data = mysqli_fetch_assoc($data)){
            //     $sng__p__id = $sng__p__data['id'];
            //     $sng__p__name = $sng__p__data['name'];
            // }
            $category = fetchOtherdetails($con, 'category', 'Id', $assoc_data['category']);
            $category_name = mysqli_fetch_assoc($category)['name'];
            
            $vendor = fetchOtherdetails($con, 'vendor', 'Id', $assoc_data['vendor_id']);
            $vendor__data = mysqli_fetch_assoc($vendor);
        } else {
    ?> <script>
                alert("id is not proper");
                window.location.href = 'product.php'
            </script>
        <?php
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

<body class="g-sidenav-show bg-gray-100">
    <div class="min-height-300  position-absolute w-100 overlay-div"></div>
    <?php include('include/sidebar.php') ?>

    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <?php include('include/navbar.php') ?>
        <!-- End Navbar -->
        <div class="container-fluid p-4">
            <div class="col-12 p-2 rounded bg-white">
                <div class="col-12 d-flex justify-content-between p-2">
                    <h3 class="page-head">Product-details</h3>
                    <h6 class="brd-crumbs">
                        <a href="index.php" class="brd-crumbs-active ">Dashboard</a>/
                        <a href="product.php" class="brd-crumbs-active ">product</a>/
                        <a href="javascript:void(0)"><?= dec_function($assoc_data['name']) ?></a>
                    </h6>
                </div>
                <div class="sng-prodcut-layout col-12 p-2">
                    <div class="d-flex flex-wrap">
                        <div class="col-lg-4 text-center product-slider-wrapper">
                            <div class="col-12" id="product-slider">
                                <div class="owl-carousel owl-theme">
                                    <?php
                                    $image = $assoc_data['featured_image'];
                                    $gallery_image =  !empty($assoc_data['gallery_image']) ? explode(',', $assoc_data['gallery_image']) : [];

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
                            <h2 class="sng-product-title"><?= dec_function($assoc_data['name']) ?></h2>
                            <h4 class="sng-prodcut-price">
                            <?php
                                                    if (!empty($assoc_data['sale_price'])) {
                                                    ?>
                                                        <span class="cross-price"><?= '$' . $assoc_data['price'] ?></span> <?= '$' . $assoc_data['sale_price'] ?>
                                                    <?php
                                                    } else {
                                                        echo  '$' . $assoc_data['price'];
                                                    }
                                                    ?>
                            </h4>
                            <p class="sng-product-exercept">
                                <?= $assoc_data['excerpt'] ?>
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
                                <li><label for="">Category :</label> <?= $category_name;  ?></li>
                                <li><label for="">Sku-unit :</label> <?= $assoc_data['sku'] ?></li>
                                <li><label for="">Quantity :</label> <?= $assoc_data['quantity'] ?></li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 product-main-data p-2">
                    <div class="vendor-tabs-btn-div col-12 mt-4">
                        <ul class="tabs-ul justify-content-center">
                            <li><a href="javascript:void(0)" class="tabs-anc active-anc" data-id='info-tab'>Description</a></li>
                            <li><a href="javascript:void(0)" class="tabs-anc" data-id="about-tab">Information</a></li>
                            <li><a href="javascript:void(0)" class="tabs-anc" data-id="contact-tab">Reviews </a></li>
                            <li><a href="javascript:void(0)" class="tabs-anc " data-id="services-tab">About store</a></li>
                        </ul>
                    </div>
                    <div class="vendor-tabs-div col-12 mt-4">
                        <div class="vendor-tab col-12 active-vendor-tab description-div" id="info-tab">
                            <?php
                            $des = stripcslashes($assoc_data['description']);
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
                                            <td><?= $assoc_data['name'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>product-Id</td>
                                            <td><?= $assoc_data['id'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Product-Type</td>
                                            <td><?= $assoc_data['product_type'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Product-Attribute</td>
                                            <td>
                                                <?php

                                                if ($assoc_data['product_type'] == 'attribute' || $assoc_data['product_type'] == 'variation') {
                                                    $attr = fetchOtherdetails($con, 'product_attributes', 'product_id', $assoc_data['id']);
                                                    $attr_opt =  json_decode(mysqli_fetch_assoc($attr)['attribute'], true);
                                                    echo implode(', ', $attr_opt);
                                                } else {
                                                    echo "no attributes";
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Product-variations</td>
                                            <td>
                                                <?php

                                                if ($assoc_data['product_type'] == 'variation') {
                                                    $var = fetchOtherdetails($con, 'product_variations', 'product_id', $assoc_data['id']);
                                                    $variations =  json_decode(mysqli_fetch_assoc($var)['variations'], true);
                                                    $var_name = '';
                                                    foreach ($variations as  $value) {
                                                        $var_name .= $value['variation_name'] . ",";
                                                    }
                                                    echo trim($var_name, ',');
                                                } else {
                                                    echo "no variations";
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Category</td>
                                            <td><?= $category_name; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Sub Category</td>
                                            <td>no-category</td>
                                        </tr>
                                        <tr>
                                            <td>Vendor</td>
                                            <td>bigstore</td>
                                        </tr>
                                        <tr>
                                            <td>Brand</td>
                                            <td>no-brand</td>
                                        </tr>
                                        <tr>
                                            <td>SKU</td>
                                            <td><?= $assoc_data['sku'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Minimum Qty</td>
                                            <td>05</td>
                                        </tr>
                                        <tr>
                                            <td>Quantity</td>
                                            <td><?= $assoc_data['quantity'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tax</td>
                                            <td>18</td>
                                        </tr>
                                        <tr>
                                            <td>Price</td>
                                            <td><?php
                                                if (!empty($assoc_data['sale_price'])) {
                                                ?>
                                                    <span class="table-sell-price"><?= $assoc_data['price'] ?></span> <?= $assoc_data['sale_price'] ?>

                                                <?php
                                                } else {
                                                    echo $assoc_data['price'];
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td><?php echo $assoc_data['approve'] == 1 ? 'active' : 'not approved' ?></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="vendor-tab col-12 d-none" id="contact-tab">
                            <p class="msg text-center">there are no attributes</p>

                        </div>
                        <div class="vendor-tab col-12 d-none" id="services-tab">
                            <div class="row">
                                <h2 class="store-head"><?= $vendor__data['business'] ?></h2>

                                <p class="store-des">This store is owned by vendor(<?= $vendor__data['name'] ?>) with sales of more than 40000 and sold 154 products till today</p>
                                <h2 class="store-head">Store-products</h2>
                            </div>
                            <div class="row">

                                <?php
                                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                                $limit = 10;
                                $count = '';
                                $offset = ($page - 1) * $limit;
                                //we are selecting other products rather than the product we are viewing ok?
                                $select_store_products = "SELECT * FROM `product` WHERE `vendor_id` = ? AND `id` != ? ORDER BY `id` DESC LIMIT $limit OFFSET $offset";
                                $prepare_select_store_products = mysqli_prepare($con, $select_store_products);
                                mysqli_stmt_bind_param($prepare_select_store_products, 'ss', $assoc_data['vendor_id'], $assoc_data['id']);
                                if (mysqli_stmt_execute($prepare_select_store_products)) {
                                    $result = mysqli_stmt_get_result($prepare_select_store_products);
                                    $count = mysqli_num_rows($result);
                                    while ($sh = mysqli_fetch_assoc($result)) {
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
                                                    if($sh['approve']=='0'){   ?><span class="dash-p-tag">unapproved</span> <?php }  ?>
                                                    ?>
                                                </div>
                                                <a href="?id=<?= base64_encode($sh['id']) ?>">
                                                    <h4 class="product-title">
                                                        <?= $sh['name'] ?>
                                                    </h4>
                                                </a>
                                                <p class="product-price">
                                                    <?php
                                                    if (!empty($sh['sale_price'])) {
                                                    ?>
                                                        <span class="table-sell-price"><?= '$' . $sh['price'] ?></span> <?= '$' . $sh['sale_price'] ?>
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
                                }

                                ?>


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