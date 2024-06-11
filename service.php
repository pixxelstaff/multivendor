<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=divice-width, initial-scale=1" />
    <?php include('include/links.php'); ?>
    <link rel="stylesheet" href="assets/css/single-product-page.css">
    <?php
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $service_id = $_GET['id'];
        $fetchServiceData = fetchOtherdetails($con, 'service', 'Id', $service_id);
        while ($sh_service = mysqli_fetch_assoc($fetchServiceData)) {
            $service_title = $sh_service['name'];
            $service_des = $sh_service['description'];
            $service_price = $sh_service['price'];
            $service_sale_price = $sh_service['sale_price'];
            $service_category = $sh_service['category'];
            $service_available = $sh_service['available'];
            $service_start_date = $sh_service['start_date'];
            $service_end_date = $sh_service['end_date'];
            $service_location = $sh_service['location'];
            $service_data = $sh_service['services_data'];
            $service_excerpt = $sh_service['excerpt'];
            $service_featured_image = $sh_service['featured_image'];
            $service_gallery_images = $sh_service['gallery_images'];
            $service_video = $sh_service['video'];
            $service_vendor_id = $sh_service['user_id'];
            $service_date = $sh_service['date'];
            $service_slot = $sh_service['slot'];
        }
        $viewed = '1';
		$v__s__qry = mysqli_prepare($con,"UPDATE `service` SET `viewed`=? WHERE `id` = ?");
		mysqli_stmt_bind_param($v__s__qry,'ss',$viewed,$service_id);
		mysqli_stmt_execute($v__s__qry);
    } else {
        alerting('service id is required', 'my-service.php');
    }
    ?>
    <title>service || <?= $service_title ?></title>
</head>

<body>
    <?php include('include/header.php'); ?>

    <div class="container-fluid mt-4 pt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <h2 class="sng-service-title"><?= $service_title ?></h2>
                    <p class="service-meta-info">
                        <a href="javascript:void(0)">
                            <?php
                            if ($service_category != '') {
                                $fetch_category = fetchOtherdetails($con, 'service_category', 'Id', $service_category);
                                if (mysqli_num_rows($fetch_category) > 0) {
                                    echo mysqli_fetch_assoc($fetch_category)['name'];
                                } else {
                                    echo "un-categorized";
                                }
                            } else {
                                echo "un-categorized";
                            } ?>
                        </a>
                        -
                        <a href="javascript:void(0)">
                            <span class="material-symbols-outlined">
                                calendar_month
                            </span>
                            - <?= $service_date ?>
                        </a>
                    </p>
                    <div class="col-12 sng-service-images" id="sng-service-slider">
                        <div class="owl-carousel owl-theme">

                            <div class="item service-slide">
                                <img src="images/uploadimg/<?= !empty($service_featured_image) ? $service_featured_image : 'down.webp' ?>" alt="" srcset="">
                            </div>
                            <?php
                            if (!empty($service_gallery_images)) {
                                $exploded_gallery_images = explode(',', $service_gallery_images);
                                foreach ($exploded_gallery_images  as $exp_val) {
                            ?>
                                    <div class="item service-slide">
                                        <img src="images/uploadimg/<?= $exp_val ?>" alt="" srcset="">
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-12 sng-service-tabs">
                        <!-- tabs section starts here -->
                        <div class="row">
                            <!-- tabs buttons here -->
                            <div class="col-12 info-navigation">
                                <ul class="info-nav-ul">
                                    <li class="active-info-li" data-id="additional-info-section">Service</li>
                                    <li data-id="description-section">description</li>
                                    <li data-id="product-review">Reviews</li>
                                    <?php
                                    if ($service_vendor_id != '0') {
                                    ?>
                                        <li data-id="vendor-info">Vendor</li>
                                    <?php
                                    }
                                    ?>

                                </ul>
                            </div>

                            <div class="col-12 tab-box additional-info table-responsive " id="additional-info-section">
                                <table class="info-table w-100">
                                    <?php
                                    $decoded_service_data = json_decode($service_data, true);
                                    foreach ($decoded_service_data as $sr_data) {
                                    ?>
                                        <tr>
                                            <td class="wi-30"><?= $sr_data['name'] ?></td>
                                            <td class="wi-70"><?= $sr_data['description']  ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </table>
                            </div>

                            <div class="col-12 tab-box info-box description-div d-none" id="description-section">
                                <?= dec_function($service_des) ?>
                            </div>

                            <div class="col-12 tab-box product-review-system d-none" id="product-review">
                                <div class="col-12 product-review">
                                    <div class="rev-wrapper d-flex flex-wrap">
                                        <div class="col-lg-2 col-md-4 col-sm-12 reviewer-image d-flex align-items-start justify-content-center py-2">
                                            <div class="reviewer-image-div">
                                                <img src="images/dashboard-img/p-1.jpg" alt="">
                                            </div>

                                        </div>
                                        <div class="col-lg-10 col-md-8 col-sm-12 d-flex flex-column">
                                            <div class="product-rating-div justify-content-start" data-rating='5'>
                                                <a href="javascript:void(0)" class="rating-icon"><i class="fa-solid fa-star"></i></a>
                                                <a href="javascript:void(0)" class="rating-icon"><i class="fa-solid fa-star"></i></a>
                                                <a href="javascript:void(0)" class="rating-icon"><i class="fa-solid fa-star"></i></a>
                                                <a href="javascript:void(0)" class="rating-icon"><i class="fa-solid fa-star"></i></a>
                                                <a href="javascript:void(0)" class="rating-icon"><i class="fa-solid fa-star"></i></a>
                                            </div>
                                            <h2 class="review-title">brilliant product</h2>
                                            <p class="reviewer-details"><span class="">anas</span> on <span class="review-date">06 apr 2024</span></p>
                                            <p class="review-description">
                                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis odit in eius enim placeat fuga doloribus corrupti possimus ea est nemo obcaecati temporibus asperiores iste recusandae, magni modi error labore?
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 d-flex my-4 justify-content-center">
                                    <a href="javascript:void(0)" class="load-reviews-btn product-btn">Load more
                                        <span class="review-loader d-none"></span>

                                    </a>
                                </div>

                                <div class="write-product-review col-12">
                                    <h2>Add a review</h2>
                                    <form action="" method="post">
                                        <div class="col-12 d-flex review-field-wrapper">
                                            <div class="review-field-div">
                                                <input type="text" name="reviewer" placeholder="name">
                                            </div>
                                            <div class="review-field-div">
                                                <input type="text" name="reviewer" placeholder="email">
                                            </div>
                                        </div>
                                        <div class="col-12  d-flex review-field-wrapper">
                                            <div class="review-field-div">
                                                <div class="review-rating-div">
                                                    <a href="javascript:void(0)" data-rating-val='1' class="rate-icon"><i class="fa-solid fa-star"></i></a>
                                                    <a href="javascript:void(0)" data-rating-val='2' class="rate-icon"><i class="fa-solid fa-star"></i></a>
                                                    <a href="javascript:void(0)" data-rating-val='3' class="rate-icon"><i class="fa-solid fa-star"></i></a>
                                                    <a href="javascript:void(0)" data-rating-val='4' class="rate-icon"><i class="fa-solid fa-star"></i></a>
                                                    <a href="javascript:void(0)" data-rating-val='5' class="rate-icon"><i class="fa-solid fa-star"></i></a>
                                                </div>
                                                <input type="hidden" name="rating" id="p-rating-num">
                                            </div>
                                        </div>
                                        <div class="col-12  d-flex review-field-wrapper">
                                            <div class="review-field-div">
                                                <input type="text" name="title" placeholder="review-title">
                                            </div>
                                        </div>
                                        <div class="col-12  d-flex review-field-wrapper">
                                            <div class="review-field-div">
                                                <textarea name="" id="" class="w-100 mt-4" rows="10" placeholder="review here"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12  d-flex review-field-wrapper">
                                            <input type="submit" value="submit" class="product-btn">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <?php
                            if ($service_vendor_id != '0') {
                            ?>
                                <div class="col-12 tab-box vendor-section d-none" id="vendor-info">
                                    <?php
                                    //fetching vendor data


                                    $fetchVendorData = fetchOtherdetails($con, 'vendor', 'Id', $service_vendor_id);
                                    $vendorName = mysqli_fetch_assoc($fetchVendorData)['name'];
                                    $countVendorProducts = mysqli_query($con, "SELECT COUNT(*) AS `vpcount` FROM `product` WHERE `vendor_id` = '$service_vendor_id'");
                                    $pcts = mysqli_fetch_assoc($countVendorProducts)['vpcount'];
                                    //counting vendor servuce
                                    $countVendorService = mysqli_query($con, "SELECT COUNT(*) AS `vscount` FROM `service` WHERE `user_id` = '$service_vendor_id'");
                                    $scts = mysqli_fetch_assoc($countVendorService)['vscount'];


                                    ?>
                                    <h6 class="ven-label">Sold by</h6>
                                    <h2 class="vendor-name"><?= $vendorName ?></h2>
                                    <div class="vendor-info-wrapper d-flex justify-content-center table-responsive">
                                        <table class="w-100 info-table">
                                            <thead>
                                                <tr>
                                                    <th>Total products</th>
                                                    <th>Total services</th>
                                                    <th>Average Rating</th>
                                                    <th>Total revenue</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?= $pcts ?></td>
                                                    <td><?= $scts ?></td>
                                                    <td>-</td>
                                                    <td>-</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>


                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 p-2 sng-side-box-parent">
                    <div class="col-12 sng-side-box">
                        <h4 class="service-price">
                            <?php
                            if (!empty($service_sale_price)) {
                            ?> <span class="cross-val-ser"> <?=  $service_price.'pkr' ?></span> <?php
                                                                                                echo   $service_sale_price.'pkr';
                                                                                            } else {
                                                                                                echo $service_price.'pkr';
                                                                                            }
                                                                                                ?>
                        </h4>
                        <?php
                        if (!empty($service_excerpt) || $service_excerpt = '') {
                        ?>
                            <p class="service-execept"><?= $service_excerpt ?></p>
                        <?php
                        }
                        ?>
                        <p class="service-availabilty">
                            <span class="material-symbols-outlined p-ser-icon">
                                schedule
                            </span>

                            <span class="service-dates service-d-01"><?= $service_start_date ?></span>
                            To
                            <span class="service-dates service-d-02"><?= $service_end_date  ?></span>
                        </p>
                        <p class="service-location">
                            <span class="material-symbols-outlined p-ser-icon">
                                location_on
                            </span>
                            <span class="ser-location">
                                <?= $service_location ?>
                            </span>
                        </p>
                        <?php
                        if ($service_slot == '1') {
                            $fetchSlotData = fetchOtherdetails($con, 'service_slot', 'service_id', $service_id);
                            while ($sh = mysqli_fetch_assoc($fetchSlotData)) {
                                $slot_id = $sh['Id'];
                                $slot_days = json_decode($sh['slot_days'], true);
                                $slot_data = json_decode($sh['slot_data'], true);
                            }

                        ?>
                            <div class="select-slot-div d-flex flex-column gap-2 p-1 mt-1">
                                <label for="" class="select-labels">select days</label>
                                <select name="" id="slot-days" class="product-opts" data-slot-id=<?= $slot_id  ?>>
                                    <option value="">select days</option>
                                    <?php
                                    foreach ($slot_days as $key => $value) {
                                    ?>
                                        <option value="<?= $value ?>"><?= $value ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="select-slot-div d-flex flex-column gap-2 p-1 mt-1">
                                <label for="" class="select-labels">select slot time</label>
                                <select name="" id="slot-time" class="product-opts">
                                    <option value="">select time</option>
                                </select>
                            </div>
                        <?php
                        }

                        ?>

                        <button class="sng-service-btn s-add-cart" data-service-id='<?= $service_id  ?>' <?php
                                                                                                            if ($service_slot == '1') {
                                                                                                            ?> data-slot=<?= $service_slot == '1'  ?> <?php
                                                                                                                                                    }
                                                                                                                                                        ?>> Add To Cart</button>


                    </div>
                    <?php
                    if ($service_video != '') {
                    ?>
                        <div class="col-12 video-box">
                            <h6 class="sng-service-title mt-4">Service related video</h6>
                            <video muted width="100%" height="250px" controls autoplay loop>
                                <source src="video/<?= $service_video ?>" type="video/mp4">
                            </video>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4>Other services</h4>
                </div>
                <div class="col-12 mt-2" id="single-service-page-slide">
                    <div class="owl-carousel owl-theme">

                        <?php
                        $fetchRandomQuery = "SELECT * FROM `service`  WHERE `category` = ? AND `Id` != ? UNION SELECT * FROM `service`  WHERE `category` != ?  ORDER BY RAND() LIMIT 12";
                        $prepare_fetchRandomQuery = mysqli_prepare($con, $fetchRandomQuery);
                        mysqli_stmt_bind_param($prepare_fetchRandomQuery, 'sss', $service_category, $service_id, $service_category);
                        if (mysqli_stmt_execute($prepare_fetchRandomQuery)) {
                            $random__results = mysqli_stmt_get_result($prepare_fetchRandomQuery);
                            while ($ser__data = mysqli_fetch_assoc($random__results)) {
                        ?>
                                <div class="col-12 p-1 item">
                                    <div class="col-12 service-grid">
                                        <div class="service-featured-image">
                                            <img src="images/uploadimg/<?= !empty($ser__data['featured_image']) ? $ser__data['featured_image'] : 'down.webp'; ?>" alt="image here">
                                        </div>
                                        <div class="service-content d-flex w-100 flex-column">
                                            <h2 class="service-title">
                                                <a href="service.php?id=<?= $ser__data['Id']  ?>"><?= $ser__data['name']  ?></a>
                                            </h2>
                                            <p class="aval-p">Available : <span><?= convertDateFormat($ser__data['start_date']) . ' To ' . convertDateFormat($ser__data['end_date']) ?></span></p>
                                            <ul class="service-ul">
                                                <?php
                                                $the__ser__list = json_decode($ser__data['services_data'], true);
                                                foreach ($the__ser__list as  $ser__val) {
                                                ?>
                                                    <li>
                                                        <span class="material-symbols-outlined sevice-icon">
                                                            done_all
                                                        </span>
                                                        <?= $ser__val['name'] ?>
                                                    </li>
                                                <?php
                                                }
                                                ?>


                                            </ul>
                                            <div class="service-btn d-flex w-100s">
                                                <?php
                                                if (count($the__ser__list) > 3) {
                                                ?> <a href='javascript:void(0)' class="exp-btn" data-expand='true'>expand</a>
                                                <?php
                                                }
                                                ?>

                                                <a href='javascript:void(0)' class="s-add-cart" data-service-id='<?= $ser__data['Id']  ?>'>
                                                    <span class="material-symbols-outlined">
                                                        local_mall
                                                    </span>
                                                    Add to cart
                                                </a>
                                            </div>
                                        </div>
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
    <?php include('include/footer.php'); ?>


    <div id="multiVendor-toast" class="m-toast"></div>

    <?php include('include/cartsection.php'); ?>

    <?php include('include/script.php'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script src="assets/js/index.js"></script>
    <script src="assets/js/fetchSlot.js"></script>

    <?php
    // if ($service_video != '') {
    ?>
    <!-- <script src="assets/js/service-video.js"></script>

        <div class="video-popup-container">
            <div class="v-overlay-div"></div>
            <div class="mega-video-div">
                <video controls muted width="100%" height="100%" id="mega-pop-video">
                    <source src="video/" type="video/mp4">
                </video>
            </div>
            <a href="javascript:void(0);" class="close_pop_video" id="close_video_popup">
                <span class="material-symbols-outlined">
                    close
                </span>
            </a>
        </div> -->

    <?php
    // }


    ?>



</body>

</html>