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
    <!-- <link rel="stylesheet" href="../ckeditor/contents.css"> -->

    <?php include('include/links.php');

    // including htmlpurifier;
    require('../htmlpurifier/HTMLPurifier.kses.php');

    $config = HTMLPurifier_Config::createDefault();

    // Optional: customize configuration

    $purifier = new HTMLPurifier($config);

    if (isset($_GET['id'])) {
        $id = base64_decode($_GET['id']);
        $data = fetchOtherdetails($con, 'service', 'Id', $id);
        while ($sh = mysqli_fetch_assoc($data)) {
            $name = dec_function($sh['name']);
            $des = dec_function($sh['description']);
            $price = dec_function($sh['price']);
            $sale_price = dec_function($sh['sale_price']);
            $category = dec_function($sh['category']);
            $available = dec_function($sh['available']);
            $start_date = dec_function($sh['start_date']);
            $end_date = dec_function($sh['end_date']);
            $start_time = dec_function($sh['start_time']);
            $end_time = dec_function($sh['end_time']);
            $city = dec_function($sh['city']);
            $area = dec_function($sh['area']);
            $type = dec_function($sh['service_type']);
            $location = dec_function($sh['location']);
            $serviceData = json_decode($sh['services_data'], true);
            $excerpt = dec_function($sh['excerpt']);
            $image = $sh['featured_image'];
            $gallery_images = $sh['gallery_images'];
            $vendor_video =  dec_function($sh['video']);
            $tags = dec_function($sh['tags']);
            $validity = dec_function($sh['validity']);
            $slot = dec_function($sh['slot']);
        }
        if ($slot == '1') {
            $fetchSlots = fetchOtherdetails($con, 'service_slot', 'service_id', $id);

            if (mysqli_num_rows($fetchSlots) > 0) {
                while ($sl = mysqli_fetch_assoc($fetchSlots)) {
                    $slot_id = $sl['Id'];
                    $slot_days = $sl['slot_days'];
                    $slot_days_data = $sl['slot_data'];
                }
                $decoded_slot_days = json_decode($slot_days, true);
                $decoded_slot_days_data = json_decode($slot_days_data, true);
            }
        } else {
            $slot_days = '';
            $slot_days_data = '';
        }
    } else {
    ?>
        <script>
            alert('id doesnot found');
            window.location.href = 'service.php';
        </script>

    <?php
    }

    ?>
    <link rel="stylesheet" href="../assets/css/script.css">
    <title>
        (update - service) || <?= $name ?>
    </title>
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
                <div class="col-12 d-flex justify-content-between p-2 brd__crumbs">
                    <h3 class="page-head">update-service</h3>
                    <h6 class="brd-crumbs"><a href="index.php">Dashboard</a>/<a href="">update-service</a>/
                        <a href="javascript:void(0)"><?= substr($name, 0, 15) . '...' ?></a>
                    </h6>
                </div>
                <form action="" method="post" enctype="multipart/form-data" id="service-form">
                    <div class="row p-2">
                        <div class="col-lg-9 col-md-12 col-sm-12 data-column">
                            <div class="col-12 p-inp-div d-flex flex-column p-2">
                                <label for="" class="p-inp-label">Name</label>
                                <input type="text" name="title" class="p-inp-field" value="<?= $name ?>" placeholder="enter your title here" id="">
                            </div>
                            <div class="col-12 p-inp-div d-flex flex-column p-2">
                                <label for="" class="p-inp-label">description</label>
                                <textarea id="des-editor" name="service_description" class="w-100 p-inp-field" rows="10"><?= $des ?></textarea>
                            </div>
                            <div class="col-12 d-flex flex-wrap  multi-row-div">
                                <div class="col-lg-6 col-md-6 col-sm-12  p-inp-div d-flex flex-column p-2">
                                    <label for="" class="p-inp-label">price</label>
                                    <input type="text" name="regular_price" class="p-inp-field" placeholder="regular price" value="<?= $price ?>" id="">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12  p-inp-div d-flex flex-column p-2">
                                    <label for="" class="p-inp-label">sale price</label>
                                    <input type="text" name="sale_price" class="p-inp-field" placeholder="sale price" value="<?= $sale_price ?>" id="">
                                </div>
                            </div>
                            <div class="col-12 d-flex flex-wrap multi-row-div">
                                <div class="col-lg-6 col-md-6 col-sm-12  p-inp-div d-flex flex-column p-2">
                                    <label for="" class="p-inp-label">type</label>
                                    <select name="service-type" id="" class="p-inp-field">
                                        <option value="">select service type</option>
                                        <option value="basic" <?= $type == 'basic' ? 'selected' : '' ?>>basic</option>
                                        <option value="standard" <?= $type == 'standard' ? 'selected' : '' ?>>standard</option>
                                        <option value="premium" <?= $type == 'premium' ? 'selected' : '' ?>>premium</option>

                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 p-inp-div d-flex flex-column p-2">
                                    <label for="" class="p-inp-label">Availability </label>
                                    <select name="available" id="" class="p-inp-field">
                                        <option value="1" <?= $available == '1' ? 'selected' : '' ?>>service available</option>
                                        <option value="0" <?= $available == '0' ? 'selected' : '' ?>>service unavaialable</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-12 d-flex flex-wrap multi-row-div">
                                <div class="col-lg-6 col-md-6 col-sm-12  p-inp-div d-flex flex-column p-2">
                                    <label for="" class="p-inp-label">start-date</label>
                                    <input type="date" name="service-start" class="p-inp-field" value="<?= $start_date ?>" placeholder="regular price" id="">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12  p-inp-div d-flex flex-column p-2">
                                    <label for="" class="p-inp-label">end-date</label>
                                    <input type="date" name="service-end" class="p-inp-field" value="<?= $end_date ?>" placeholder="sale price" id="">
                                </div>
                            </div>
                            <div class="col-12 p-2">
                                <div class="col-12 complex-product-info d-flex flex-wrap p-2 align-items-center">
                                    <p class="cmp-p">in case when you want to provide specific timings for your service. </p>
                                </div>
                            </div>
                            <div class="col-12 d-flex flex-wrap multi-row-div">
                                <div class="col-lg-4 col-md-6 col-sm-12  p-inp-div d-flex flex-column p-2">
                                    <label for="" class="p-inp-label">starting time (optional)</label>
                                    <input type="time" name="service-time-start" value="<?= $start_time ?>" class="p-inp-field" placeholder="starting time" id="">
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12  p-inp-div d-flex flex-column p-2">
                                    <label for="" class="p-inp-label">closing time (optional)</label>
                                    <input type="time" name="service-time-end" value="<?= $end_time ?>" class="p-inp-field" placeholder="ending time" id="">
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12  p-inp-div d-flex flex-column p-2">
                                    <label for="" class="p-inp-label">slot</label>
                                    <select name="slot" id="slot-selector" class="p-inp-field">
                                        <option value="">service slot </option>
                                        <option value="1" <?= $slot == '1' ? 'selected' : '' ?>>Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <input type="hidden" name="slot_days" id="slot_days_inp">
                                    <input type="hidden" name="slot_days_data" id="slot_days_data">
                                </div>

                            </div>
                            <div class="col-12 p-inp-div flex-column p-2 <?= $slot == '1' ? 'd-flex' : 'd-none' ?> align-items-start" id="slot-wrapper">

                                <?php
                                if ($slot == '1') {
                                ?>
                                    <!-- slot code starts here -->
                                    <label for="" class="p-inp-label">Select slot days</label>
                                    <?php

                                    $days_collection = [
                                        "saturday",
                                        "sunday",
                                        "monday",
                                        "tuesday",
                                        "wednesday",
                                        "thursday",
                                        "friday",
                                    ];

                                    ?>

                                    <div class="col-12 d-flex gap-1 flex-wrap mb-1" id="days-wrapper">
                                        <?php
                                        foreach ($days_collection as $value) {
                                        ?>
                                            <div class="slot-days">
                                                <input type="checkbox" name="slotdays[]" value="<?= $value ?>" id="<?= $value ?>" <?= in_array($value, $decoded_slot_days) ? 'checked' : '' ?> class="days-checkbox" hidden>
                                                <label for="<?= $value ?>" class=" <?= in_array($value, $decoded_slot_days) ? 'checked-label' : '' ?>"><?= $value ?></label>
                                            </div>
                                        <?php
                                        }
                                        ?>

                                    </div>

                                    <a href="javascript:void(0)" class="make-slot action-btn" id="make-slot">Make slot</a>

                                    <div class="slots-p col-12">
                                        <?php
                                        // print_r($decoded_slot_days_data);
                                        //parent array
                                        foreach ($decoded_slot_days_data as $dataKey => $data) {

                                            foreach ($data as $subKey => $subData) {

                                                $dy_id = $subKey . '-' . $dataKey;

                                        ?>
                                                <div class="slot-box w-100">
                                                    <div class="slot-head d-flex justify-content-between p-inp-field" data-body-id="<?= $dy_id ?>">
                                                        <span><?= $subKey ?> slot - click here</span>
                                                        <a href="javascript:void(0)" class="add-slot-btn" data-day-name="<?= $subKey ?>" data-append-div="<?= $dy_id ?>">
                                                            <span class="material-symbols-outlined">
                                                                add
                                                            </span>
                                                        </a>
                                                    </div>
                                                    <div class="slot-body w-100" id="<?= $dy_id ?>" show-body="true">
                                                        <!-- slot body which contains fields -->
                                                        <?php
                                                        foreach ($subData as $innerKey => $innerData) {
                                                        ?>
                                                            <div class="slot-field-wrapper col-12 d-flex flex-wrap my-2 <?= $subKey . '-row' ?> " id="<?= $subKey . '-slot-' . $innerKey ?>">

                                                                <div class="col-lg-4 col-md-4 col-sm-12 p-1">
                                                                    <label for="" class="p-inp-label">slot start time</label>
                                                                    <input type="time" name="<?= $subKey . '-start-time[]' ?>" class="p-inp-field <?= $subKey . '-start-time' ?>" placeholder="start time" id="" value="<?= $innerData['startTime'] ?>">
                                                                </div>
                                                                <div class="col-lg-4 col-md-4 col-sm-12 p-1">
                                                                    <label for="" class="p-inp-label">slot end time</label>
                                                                    <input type="time" name="<?= $subKey . '-end-time[]' ?>" class="p-inp-field <?= $subKey . '-end-time' ?>" placeholder="end time" id="" value="<?= $innerData['endTime'] ?>">
                                                                </div>
                                                                <div class="col-lg-4 col-md-4 col-sm-12 p-1">
                                                                    <label for="" class="p-inp-label">person per slot</label>
                                                                    <input type="text" name="<?= $subKey . '-person[]' ?>" class="p-inp-field <?= $subKey . '-person' ?>" placeholder="no of person " id="" value="<?= $innerData['person'] ?>">
                                                                </div>
                                                                <a href="javascript:void(0)" class="remove-slot-row" data-id="<?= $subKey . '-slot-' . $innerKey ?>">
                                                                    <span class="material-symbols-outlined">
                                                                        remove
                                                                    </span>
                                                                </a>

                                                            </div>



                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>

                                <?php
                                }

                                ?>






                            </div>
                            <div class="col-12 d-flex flex-wrap multi-row-div">
                                <div class="col-lg-6 col-md-6 col-sm-12  p-inp-div d-flex flex-column p-2">
                                    <label for="" class="p-inp-label">city</label>
                                    <select name="service-city" id="ar-city" class="p-inp-field">
                                        <option value="">select city</option>
                                        <?php
                                        $fetchCity = fetchAllData($con, 'city');
                                        while ($sh = mysqli_fetch_assoc($fetchCity)) {
                                        ?>
                                            <option value="<?= $sh['Id'] ?>" <?= $sh['Id'] == $city ? 'selected' : '' ?>><?= $sh['name']  ?></option>

                                        <?php
                                        }
                                        ?>

                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12  p-inp-div d-flex flex-column p-2">
                                    <label for="" class="p-inp-label">area</label>
                                    <select name="service-area" id="area-select" class="p-inp-field">
                                        <option value="">select area</option>
                                        <?php
                                        $fetcharea = fetchAllData($con, 'area');
                                        while ($sh = mysqli_fetch_assoc($fetcharea)) {
                                        ?>
                                            <option value="<?= $sh['Id'] ?>" <?= $sh['Id'] == $area ? 'selected' : '' ?>><?= $sh['name']  ?></option>

                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 d-flex flex-wrap multi-row-div">
                                <div class="col-lg-6 col-md-6 col-sm-12 p-inp-div d-flex flex-column p-2">
                                    <label for="" class="p-inp-label">category</label>
                                    <select name="service-category" id="" class="p-inp-field">
                                        <option value="">select category</option>
                                        <option value="0" <?= $category == '0' ? 'selected' : '' ?>>parent category</option>
                                        <?php
                                        $fetchCategories = fetchAllData($con, 'service_category');
                                        while ($sh = mysqli_fetch_assoc($fetchCategories)) {
                                        ?>
                                            <option value="<?= $sh['Id'] ?>" <?= $sh['Id'] == $category ? 'selected' : '' ?>><?= $sh['name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 p-inp-div d-flex flex-column p-2">
                                    <label for="" class="p-inp-label">Validity</label>
                                    <input type="text" name="validity" value="<?= $validity ?>" class="p-inp-field" placeholder="coupon validity" id="">
                                </div>
                                <div class="col-12 p-inp-div d-flex flex-column p-2">
                                    <label for="" class="p-inp-label">particular Address</label>
                                    <input type="text" name="location" value="<?= $location ?>" class="p-inp-field" placeholder="Enter your service location" id="">
                                </div>
                            </div>

                            <div class="col-12 p-2" id="attr-parent">
                                <?php
                                foreach ($serviceData as $ind => $val) {
                                ?>
                                    <div class="attribute-wrapper p-0 col-12" id="attribute-<?= $ind + 1 ?>">
                                        <div class="attribute-head col-12" data-id="attribute-f-div-<?= $ind + 1 ?>">
                                            <span class="attribute-head-name">
                                                <?= dec_function($val['name']) ?>
                                            </span>
                                            <div class="d-flex align-items-center gap-2">
                                                <a href="javascript:void(0)" class="text-white remove-attr-box" data-attr-id="attribute-<?= $ind + 1 ?>">remove</a>
                                                <span class="material-symbols-outlined attr-direction">
                                                    expand_more
                                                </span>
                                            </div>
                                        </div>
                                        <div class="attribute-field-div col-12" id="attribute-f-div-<?= $ind + 1 ?>">
                                            <input type="text" name="service[]" placeholder="attribute-name" value="<?= dec_function($val['name']) ?>" class="p-inp-field attr-name">
                                            <textarea name="service_des[]" id="" class="w-100 p-inp-field attribute-val-area" rows="4" placeholder="Enter service values"><?= dec_function($val['description']) ?></textarea>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="col-12 p-2">
                                <div class="col-12 complex-product-info d-flex flex-wrap p-2 align-items-center">
                                    <div class="col-6 d-flex justify-content-start">
                                        <p class="p-type-info">services</p>
                                    </div>
                                    <div class="col-6 complex-action d-flex justify-content-end gap-1 align-items-center">
                                        <a href="javascript:void(0)" class="action-btn" id="add-service">add service</a>
                                    </div>

                                </div>
                            </div>

                            <div class="col-12 p-inp-div d-flex flex-column p-2">
                                <label for="" class="p-inp-label">product-Excerpt</label>
                                <textarea id="des-editor" class="w-100 p-inp-field" rows="6" name="excerpt"><?= $excerpt ?></textarea>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12 media-column">
                            <!-- featured image -->
                            <div class="featured-image-wrapper w-100 d-inline-block">
                                <div class="product-featured-div">
                                    <img src="../images/uploadimg/<?php echo !empty($image) ? $image : 'down.webp' ?>" alt="" class="featured-img">
                                    <a href="javascript:void(0)" class="remove-f-image">
                                        <span class="material-symbols-outlined">
                                            close
                                        </span>
                                    </a>
                                </div>
                                <label for="upload-f-image" class="upd-label">upload image</label>
                                <input type="file" name="featured-image" id="upload-f-image" value="" hidden>
                                <input type="text" name="uploaded_featured_image" value="<?= $image; ?>" id="uploaded_featured_image" hidden>
                            </div>
                            <!-- gallery images -->
                            <div class="galler-image-wrapper w-100 d-inline-block">
                                <div class="gallery-image-parent d-flex flex-wrap"></div>
                                <input type="file" name="m_image[]" id="upload-gallery-image" value="" multiple hidden>
                                <input type="text" name="uploaded_gallery_images" value="<?= $gallery_images ?>" id="uploaded_gallery_images" hidden>
                                <label for="upload-gallery-image" class="upd-label text-dark">Add gallery image</label>
                            </div>
                            <!-- tags div -->
                            <div class="products-tags-wrapper w-100 d-inline-block">
                                <h6 class="sec-head p-inp-label">Tags</h6>
                                <div class="tags-parent d-flex flex-column">
                                    <input type="text" name="" id="tagsInp" value="<?= $tags ?>" placeholder="enter tags here" class="p-inp-field">
                                    <input type="text" name="tags" id="tags-val-holder" hidden>
                                    <div class="tags-div"> </div>
                                </div>
                            </div>
                            <!-- add video div -->
                            <div class="col-12 video-wrapper">
                                <h6 class="sec-head p-inp-label">Add video</h6>
                                <div class="video-parent d-flex flex-wrap"></div>
                                <input type="file" name="video_file" id="upload-video" hidden>
                                <label for="upload-video" class="upd-label text-dark">Add vendor video</label>
                            </div>
                            <div class="col-12 video-progress">

                                <?php
                                if ($vendor_video != '') {
                                ?>
                                    <div class="progress-div">
                                        <div class="progress-icon-div">
                                            <span class="material-symbols-outlined">
                                                video_file
                                            </span>
                                        </div>
                                        <div class="progress-content-div">
                                            <p><?= $vendor_video ?> </p>

                                            <div class="progress-bar-p">
                                                <div class="progress-bar-c w-100"></div>
                                            </div>

                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <!-- submit btn -->
                            <input type="submit" value="update service" name="sub" id="submit-btn" class="sub-btn">
                        </div>
                    </div>
                </form>



            </div>



            <?php include('include/footer.php') ?>


            <!-- footer here -->
        </div>
    </main>

    <div class="success-wrapper">
             <div class="success-message-container d-none">
            <div class="success-gif">
                <img src="../images/dashboard-img/success.gif" alt="">
            </div>
            <p class="pop-message"><?= isset($_GET['msg']) ? base64_decode($_GET['msg']) : ''; ?> </p>
            <div class="d-flex justify-content-center mb-0"><a href="service.php" class="approve-btn px-4 mb-3">ok</a></div>
            <a href="service.php" class="close-btn" id="pop-close-btn">
                <span class="material-symbols-outlined">
                    close
                </span>
            </a>
        </div>
        <div class="error-message-container d-none">
            <div class="success-gif">
                <img src="../images/dashboard-img/cross.gif" alt="">
            </div>
            <p class="pop-message"><?= isset($_GET['msg']) ? base64_decode($_GET['msg']) : ''; ?> </p>
            <a href="category.php" class="close-btn" id="pop-close-btn">
                <span class="material-symbols-outlined">
                    close
                </span>
            </a>
        </div>
    </div>




    <!--   Core JS Files   -->
    <script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#des-editor'), {
                ckfinder: {
                    uploadUrl: '../ajax/upload.php'
                },
                fontSize: {
                    items: [
                        'tiny', 'small', 'normal', 'big', 'huge' // Predefined sizes
                    ]
                },
                fontFamily: {
                    items: [
                        'Arial, sans-serif', 'Georgia, serif', 'Courier New, monospace' // Predefined fonts
                    ]
                }
            })
            .then((editor) => {
                window.editor = editor
            })
            .catch(error => {
                console.error(error);
            });
    </script>



    <?php include('include/script.php') ?>
    <script src="../assets/js/product.js"></script>
    <script src="../assets/js/add-product.js"></script>
    <script src="../assets/js/update-file.js"></script>
    <script src="../assets/js/service.js"></script>
    <script src="../assets/js/fetcharea.js"></script>
    <script src="../assets/js/update-service.js"></script>


</body>

</html>

<?php
$date = date('d-m-Y');
function uploadSingleFile($fileName, $fileType, $fileSize, $fileTmpName, $uploadDirectory)
{
    $allowedTypes = array('image/jpeg', 'image/jpg', 'image/png', 'image/webp');
    $maxFileSize = 1048576; // 1 MB in bytes
    // Check file type and size
    if (in_array($fileType, $allowedTypes) && $fileSize <= $maxFileSize) {
        $unique__file = rand(1, 100000) . "-" . $fileName;
        $destination = $uploadDirectory . $unique__file;
        if (move_uploaded_file($fileTmpName, $destination)) {
            return $unique__file;
        } else {
            echo "Error uploading file ";
            // exit();
        }
    } else {
        echo "Invalid file type or file size exceeds 1 MB for file";
        // exit();
    }
}



if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sub'])) {
    if (!empty($_POST['title']) && !empty($_POST['service_description']) && !empty($_POST['regular_price']) && !empty($_POST['service']) && $_POST['service-category'] != '') {
        $upd_title = mine_sanitize_string($_POST['title']);
        $upd_des = $purifier->purify($_POST['service_description']);
        $upd_sanitize_description = mine_sanitize_string($_POST['service_description'], true);
        $upd_price = mine_sanitize_string($_POST['regular_price']);
        $upd_sale_price = mine_sanitize_string($_POST['sale_price']);
        $upd_category = mine_sanitize_string($_POST['service-category']);
        $upd_available = mine_sanitize_string($_POST['available']);
        $upd_start_date = mine_sanitize_string($_POST['service-start']);
        $upd_end_date = mine_sanitize_string($_POST['service-end']);
        $upd_start_time = mine_sanitize_string($_POST['service-time-start']);
        $upd_end_time = mine_sanitize_string($_POST['service-time-end']);
        $upd_city = mine_sanitize_string($_POST['service-city']);
        $upd_area = mine_sanitize_string($_POST['service-area']);
        $upd_type = mine_sanitize_string($_POST['service-type']);
        $upd_location = mine_sanitize_string($_POST['location']);
        $upd_validity = mine_sanitize_string($_POST['validity']);
        $upd_slot = mine_sanitize_string($_POST['slot']);
        $upd_slot_days = $_POST['slot_days'];
        $upd_slot_days_data = $_POST['slot_days_data'];
         $status = $viewed = '0';
        $upd_serviceData = [];
        
        // $serviceDes = '';
        $upd_excerpt = mine_sanitize_string($_POST['excerpt']);
        $upd_tags = mine_sanitize_string($_POST['tags']);
        $uploadPath = '../images/uploadimg/';
        $uplaodVideoPath = '../video/';

        //previous uploaded images
        $prev_featured_image = $_POST['uploaded_featured_image'];
        $prev_gallery_image = trim($_POST['uploaded_gallery_images'], ',');


        foreach ($_POST['service'] as $index => $val) {
            if (!empty($val)) {
                $upd_serviceData[] = array(
                    'name' => mine_sanitize_string($val),
                    'description' => mine_sanitize_string($_POST['service_des'][$index])
                );
            } else {
                alerting('adding service is compulsory', 'update-service.php');
                exit();
            }
        }
        $upd_service = json_encode($upd_serviceData);

        if ($price > $sale_price) {

            //featured image code here

            if (isset($_FILES['featured-image']) && $_FILES['featured-image']['error'] === UPLOAD_ERR_OK) {
                $featured_image = $_FILES['featured-image']['name'];
                $tmp_featured_image = $_FILES['featured-image']['tmp_name'];
                $featured_image_size = $_FILES['featured-image']['size'];
                $featured_image_type = $_FILES['featured-image']['type'];
                $img = uploadSingleFile($featured_image, $featured_image_type, $featured_image_size, $tmp_featured_image, $uploadPath);
            } else {
                // Handle case where no file is uploaded
                $img = $prev_featured_image;
            }
            //gallery image code here


            if (isset($_FILES['m_image']) && !empty($_FILES['m_image']['name'][0])) {
                foreach ($_FILES['m_image']['name'] as $key => $galleryImg) {
                    $name = $_FILES['m_image']['name'][$key];
                    $g__tmp__name = $_FILES['m_image']['tmp_name'][$key];
                    $g__img__size = $_FILES['m_image']['size'][$key];
                    $g__img__type = $_FILES['m_image']['type'][$key];
                    $gall_img_arr[] = uploadSingleFile($name, $g__img__type, $g__img__size, $g__tmp__name, $uploadPath);
                    $updateImg = implode(',', $gall_img_arr);
                    if (!empty($prev_gallery_image)) {
                        $galImg = $prev_gallery_image . ',' . implode(',', $gall_img_arr);
                    } else {
                        $galImg = implode(',', $gall_img_arr);
                    }
                }
            } else {
                $galImg = $prev_gallery_image;
            }


            if (isset($_FILES['video_file']) && $_FILES['video_file']['error'] === UPLOAD_ERR_OK) {
                $video_name = mine_sanitize_string($_FILES['video_file']['name']);
                $video_tmp_name = $_FILES['video_file']['tmp_name'];
                $video_size = $_FILES['video_file']['size'];
                $video_type = $_FILES['video_file']['type'];
                $unique__file = rand(1, 100000) . "-" . $video_name;
                $destination = $uplaodVideoPath . $unique__file;
                if (move_uploaded_file($video_tmp_name, $destination)) {
                    $video_name = $unique__file;
                } else {
                    $video_name = '';
                    $message = 'Error uploading file ' . $video_name;
                    alerting($message, 'add-service.php');
                    exit();
                }
            } else {
                $video_name = $vendor_video;
            }

            $qry = "UPDATE `service` SET `name`= ?,`description`=?,`price`=?,`sale_price`=?,`service_type`=?,`available`=?,`start_date`=?,`end_date`=?,`start_time`=?,`end_time`=?,`slot`=?,`city`=?,`area`=?,`category`=?,`location`=?,`services_data`=?,`excerpt`=?,`featured_image`=?,`gallery_images`=?,`video` = ?,`tags`=?,`validity`=?,`status`=?,`viewed`=?,`date`=? WHERE `Id` = ? ";

            $prepare_qry = mysqli_prepare($con, $qry);
            mysqli_stmt_bind_param($prepare_qry, 'ssssssssssssssssssssssssss', $upd_title, $upd_sanitize_description, $upd_price, $upd_sale_price, $upd_type, $upd_available, $upd_start_date, $upd_end_date, $upd_start_time, $upd_end_time, $upd_slot, $upd_city, $upd_area, $upd_category, $location, $upd_service, $upd_excerpt, $img, $galImg, $video_name, $upd_tags, $upd_validity,$viewed,$status, $date, $id);
            if (mysqli_stmt_execute($prepare_qry)) {

                if ($upd_slot == '1') {

                    $d_days = json_decode($upd_slot_days, true);
                    $d_days_data = json_decode($upd_slot_days_data, true);

                    $php__encode__days = json_encode($d_days);
                    $php__encode__slot_data =  json_encode($d_days_data);

                    $fetchExitingSlot = fetchOtherdetails($con, 'service_slot', 'service_id', $id);

                    if (mysqli_num_rows($fetchExitingSlot) > 0) {
                        $update_service_slot = mysqli_prepare($con, "UPDATE `service_slot` SET `slot_days` = ?, `slot_data` = ? WHERE `service_id` = ?");
                    } else {
                        $update_service_slot = mysqli_prepare($con, "INSERT INTO `service_slot`(`slot_days`, `slot_data`, `service_id`) VALUES(?, ?, ?)");
                    }

                   

                    // Bind the parameters
                    mysqli_stmt_bind_param($update_service_slot, 'sss', $php__encode__days, $php__encode__slot_data, $id);

                    // Execute the statement and check for errors
                    if (mysqli_stmt_execute($update_service_slot)) {
?>
                        <script>
                            window.location.href = '?id=<?= base64_encode($id) ?>&screen=<?= base64_encode('success') ?>&msg=<?= base64_encode('The service is updated successfully and the slots are also updated.') ?>';
                        </script>
                    <?php
                    } else {
                        // Fetch the error message
                        $error_msg = mysqli_stmt_error($update_service_slot);
                    ?>
                        <script>
                            alert('Error: <?= addslashes($error_msg) ?>');
                        </script>
                    <?php
                    }

                    // Close the statement
                    mysqli_stmt_close($update_service_slot);
                } else {

                    ?>
                    <script>
                        window.location.href = '?id=<?= base64_encode($id) ?>&screen=<?= base64_encode('success') ?>&msg=<?= base64_encode('the service is updated successfully go and check the service') ?>';
                    </script>
        <?php
                    // Handle the else case if necessary
                }
            } else {
                alerting('something went wrong', 'update-service.php');
            }
        } else {
            alerting('sale price should less than regular pricing', 'update-service.php');
        }
    } else {

        ?>
        <script>
            alert('complete the details');
            window.location.href = '';
        </script>
    <?php
    }
}








if (isset($_GET['screen'])) {
    if (base64_decode($_GET['screen']) == 'success') {
    ?>
        <script>
            let sucWrap = document.querySelector('.success-message-container');
            sucWrap.classList.remove('d-none');
            let wrap = document.querySelector('.success-wrapper');
            wrap.style.display = 'flex';
            setTimeout(() => {
                wrap.style.opacity = '1';
                wrap.style.transform = 'scale(1)'
            }, 50)
        </script>
<?php
    }
}
