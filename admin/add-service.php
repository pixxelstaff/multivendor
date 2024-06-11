<?php
session_start();
if (!isset($_SESSION['email'])) {
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
    <title>
        (add - service) || Lanotte - saloon dashboard
    </title>
    <?php include('include/links.php');

    // including htmlpurifier;
    require('../htmlpurifier/HTMLPurifier.kses.php');

    $config = HTMLPurifier_Config::createDefault();

    // Optional: customize configuration

    $purifier = new HTMLPurifier($config);

    ?>
    <link rel="stylesheet" href="../assets/css/script.css">
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
                    <h3 class="page-head">add-service</h3>
                    <h6 class="brd-crumbs"><a href="index.php">Dashboard</a>/<a href="">add-service</a></h6>
                </div>
                <form action="" method="post" enctype="multipart/form-data" id="service-form">
                    <div class="row p-2">
                        <div class="col-lg-9 col-md-12 col-sm-12 data-column">
                            <div class="col-12 p-inp-div d-flex flex-column p-2">
                                <label for="" class="p-inp-label">Name</label>
                                <input type="text" name="title" class="p-inp-field" placeholder="enter your title here" id="">
                            </div>
                            <div class="col-12 p-inp-div d-flex flex-column p-2">
                                <label for="" class="p-inp-label">description</label>
                                <textarea id="des-editor" name="service_description" class="w-100 p-inp-field" rows="10"></textarea>
                            </div>
                            <div class="col-12 d-flex flex-wrap  multi-row-div">
                                <div class="col-lg-6 col-md-6 col-sm-12 p-inp-div d-flex flex-column p-2">
                                    <label for="" class="p-inp-label">price</label>
                                    <input type="text" name="regular_price" class="p-inp-field" placeholder="regular price" id="">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 p-inp-div d-flex flex-column p-2">
                                    <label for="" class="p-inp-label">sale price</label>
                                    <input type="text" name="sale_price" class="p-inp-field" placeholder="sale price" id="">
                                </div>
                            </div>
                            <div class="col-12 d-flex flex-wrap multi-row-div">
                                <div class="col-lg-6 col-md-6 col-sm-12 p-inp-div d-flex flex-column p-2">
                                    <label for="" class="p-inp-label">type</label>
                                    <select name="service-type" id="" class="p-inp-field">
                                        <option value="">select service type</option>
                                        <option value="basic">basic</option>
                                        <option value="standard">standard</option>
                                        <option value="premium">premium</option>

                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 p-inp-div d-flex flex-column p-2">
                                    <label for="" class="p-inp-label">Availability</label>
                                    <select name="available" id="" class="p-inp-field">
                                        <option value="1">service available</option>
                                        <option value="0">service unavaialable</option>
                                    </select>

                                </div>

                            </div>
                            <div class="col-12 d-flex flex-wrap multi-row-div">
                                <div class="col-lg-6 col-md-6 col-sm-12 p-inp-div d-flex flex-column p-2">
                                    <label for="" class="p-inp-label">start-date</label>
                                    <input type="date" name="service-start" class="p-inp-field" placeholder="regular price" id="" min='<?= date('Y-m-d') ?>'>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 p-inp-div d-flex flex-column p-2">
                                    <label for="" class="p-inp-label">end-date</label>
                                    <input type="date" name="service-end" class="p-inp-field" placeholder="sale price" id="" min='<?= date('Y-m-d') ?>'>
                                </div>

                            </div>
                            <div class="col-12 p-2">
                                <div class="col-12 complex-product-info d-flex flex-wrap p-2 align-items-center">
                                    <p class="cmp-p">in case when you want to provide specific timings for your service. </p>
                                </div>
                            </div>
                            <div class="col-12 d-flex flex-wrap multi-row-div">
                                <div class="col-lg-4 col-md-6 col-sm-12 p-inp-div d-flex flex-column p-2">
                                    <label for="" class="p-inp-label">starting time (optional)</label>
                                    <input type="time" name="service-time-start" class="p-inp-field" placeholder="starting time" id="">
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 p-inp-div d-flex flex-column p-2">
                                    <label for="" class="p-inp-label">closing time (optional)</label>
                                    <input type="time" name="service-time-end" class="p-inp-field" placeholder="ending time" id="">
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12 p-inp-div d-flex flex-column p-2">
                                    <label for="" class="p-inp-label">slot</label>
                                    <select name="slot" id="slot-selector" class="p-inp-field">
                                        <option value="">service slot</option>
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                    <input type="hidden" name="slot_days" id="slot_days_inp">
                                    <input type="hidden" name="slot_days_data" id="slot_days_data">
                                </div>
                            </div>
                            <div class="col-12 p-inp-div flex-column p-2 d-none align-items-start" id="slot-wrapper">
                                <!-- <label for="" class="p-inp-label">Select slot days</label>
                                <div class="col-12 d-flex gap-1 flex-wrap" id="days-wrapper">
                                    <div class="slot-days">
                                        <input type="checkbox" name="slotdays[]" value="saturday" id="saturday" hidden>
                                        <label for="saturday">saturday</label>
                                    </div>
                                    <div class="slot-days">
                                        <input type="checkbox" name="slotdays[]" value="sunday" id="sunday" hidden>
                                        <label for="sunday">sunday</label>
                                    </div>
                                    <div class="slot-days">
                                        <input type="checkbox" name="slotdays[]" value="monday" id="monday" hidden>
                                        <label for="monday">monday</label>
                                    </div>
                                    <div class="slot-days">
                                        <input type="checkbox" name="slotdays[]" value="tuesday" id="tuesday" hidden>
                                        <label for="tuesday">tuesday</label>
                                    </div>
                                    <div class="slot-days">
                                        <input type="checkbox" name="slotdays[]" value="wednesday" id="wednesday" hidden>
                                        <label for="wednesday">wednesday</label>
                                    </div>
                                    <div class="slot-days">
                                        <input type="checkbox" name="slotdays[]" value="thursday" id="thursday" hidden>
                                        <label for="thursday">thursday</label>
                                    </div>
                                    <div class="slot-days">
                                        <input type="checkbox" name="slotdays[]" value="friday" id="friday" hidden>
                                        <label for="friday">friday</label>
                                    </div>
                                </div>

                                <a href="#" class="make-slot action-btn">Make slot</a>

                                <div class="slots-p col-12">
                                    <div class="slot-box w-100">
                                        <div class="slot-head d-flex justify-content-between p-inp-field">
                                            <span>sunday slot - click here</span>
                                            <a href="javascript:void(0)" class="add-slot-btn">
                                                <span class="material-symbols-outlined">
                                                    add
                                                </span>
                                            </a>
                                        </div>
                                        <div class="slot-body w-100">
                                            <div class="sot-field-wrlapper col-12 d-flex flex-wrap my-2">

                                                <div class="col-lg-4 col-md-4 col-sm-12 p-1">
                                                    <label for="" class="p-inp-label">slot start time</label>
                                                    <input type="time" name="slot-time[]" class="p-inp-field" placeholder="start time" id="">
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-12 p-1">
                                                    <label for="" class="p-inp-label">slot end time</label>
                                                    <input type="time" name="slot-end-time[]" class="p-inp-field" placeholder="end time" id="">
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-12 p-1">
                                                    <label for="" class="p-inp-label">person per slot</label>
                                                    <input type="text" name="person[]" class="p-inp-field" placeholder="no of person " id="">
                                                </div>
                                                <a href="javascript:void(0)" class="remove-slot-row">
                                                    <span class="material-symbols-outlined">
                                                        remove
                                                    </span>
                                                </a>

                                            </div>



                                        </div>
                                    </div>
                                </div> -->


                            </div>
                            <div class="col-12 d-flex flex-wrap multi-row-div">
                                <div class="col-lg-6 col-md-6 col-sm-12 p-inp-div d-flex flex-column p-2">
                                    <label for="" class="p-inp-label">city</label>
                                    <select name="service-city" id="ar-city" class="p-inp-field">
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
                                <div class="col-lg-6 col-md-6 col-sm-12 p-inp-div d-flex flex-column p-2">
                                    <label for="" class="p-inp-label">area</label>
                                    <select name="service-area" id="area-select" class="p-inp-field">
                                        <option value="">select area</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 d-flex flex-wrap multi-row-div">
                                <div class="col-lg-6 col-md-6 col-sm-12 p-inp-div d-flex flex-column p-2">
                                    <label for="" class="p-inp-label">category</label>
                                    <select name="service-category" id="" class="p-inp-field">
                                        <option value="">select category</option>
                                        <option value="0">parent category</option>
                                        <?php
                                        $fetchCategories = fetchAllData($con, 'service_category');
                                        while ($sh = mysqli_fetch_assoc($fetchCategories)) {
                                        ?>
                                            <option value="<?= $sh['Id'] ?>"><?= $sh['name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 p-inp-div d-flex flex-column p-2">
                                    <label for="" class="p-inp-label">Validity</label>
                                    <input type="text" name="validity" class="p-inp-field" placeholder="validity" id="">
                                </div>
                                <div class="col-12 p-inp-div d-flex flex-column p-2">
                                    <label for="" class="p-inp-label">location</label>
                                    <input type="text" name="location" class="p-inp-field" placeholder="Enter your service location" id="">
                                </div>
                            </div>

                            <div class="col-12 p-2" id="attr-parent"> </div>
                            <div class="col-12 p-2">
                                <div class="col-12 complex-product-info d-flex flex-wrap p-2 align-items-center">
                                    <div class="col-6 d-flex justify-content-start">
                                        <p class="p-type-info">services</p>
                                    </div>
                                    <div class="col-6 complex-action d-flex  gap-1 align-items-center">
                                        <a href="javascript:void(0)" class="action-btn" id="add-service">add service</a>
                                    </div>

                                </div>
                            </div>
                            <!-- //here services will append -->



                            <div class="col-12 p-inp-div d-flex flex-column p-2">
                                <label for="" class="p-inp-label">product-Excerpt</label>
                                <textarea id="des-editor" class="w-100 p-inp-field" rows="6" name="excerpt"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12 media-column">
                            <div class="sticky-col w-100">
                                <!-- featured image -->
                                <div class="featured-image-wrapper w-100 d-inline-block">
                                    <div class="product-featured-div">
                                        <img src="" alt="" class="featured-img d-none">
                                        <a href="javascript:void(0)" class="remove-f-image d-none">
                                            <span class="material-symbols-outlined">
                                                close
                                            </span>
                                        </a>
                                    </div>
                                    <label for="upload-f-image" class="upd-label">upload image</label>
                                    <input type="file" name="featured-image" id="upload-f-image" hidden>
                                </div>
                                <!-- gallery images -->
                                <div class="galler-image-wrapper w-100 d-inline-block">
                                    <div class="gallery-image-parent d-flex flex-wrap"></div>
                                    <input type="file" name="m_image[]" id="upload-gallery-image" multiple hidden>
                                    <label for="upload-gallery-image" class="upd-label text-dark">Add gallery image</label>
                                </div>
                                <!-- tags div -->
                                <div class="products-tags-wrapper w-100 d-inline-block">
                                    <h6 class="sec-head p-inp-label">Tags</h6>
                                    <div class="tags-parent d-flex flex-column">
                                        <input type="text" name="" id="tagsInp" placeholder="enter tags here" class="p-inp-field">
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
                                <div class="col-12 video-progress"></div>
                                <!-- submit btn -->
                                <input type="submit" value="upload service" name="sub" id="submit-btn" class="sub-btn">
                            </div>
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
            <a href="add-service.php" class="close-btn" id="pop-close-btn">
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
    <script src="../assets/js/add-file.js"></script>
    <script src="../assets/js/service.js"></script>
    <script src="../assets/js/fetcharea.js"></script>



</body>

</html>

<?php
$date = date('d-m-Y');
function uploadSingleFile($fileName, $fileType, $fileSize, $fileTmpName, $uploadDirectory)
{
    if ($fileName != '') {
        $allowedTypes = array('image/jpeg', 'image/jpg', 'image/png', 'image/webp');
        $maxFileSize = 1048576; // 1 MB in bytes
        // Check file type and size
        if (in_array($fileType, $allowedTypes) && $fileSize <= $maxFileSize) {
            $unique__file = rand(1, 100000) . "-" . $fileName;
            $destination = $uploadDirectory . $unique__file;
            if (move_uploaded_file($fileTmpName, $destination)) {
                return $unique__file;
            } else {
?>
                <script>
                    alert('Error uploading file <?= $fileName ?>.\n');
                    window.location.href = ''
                </script>
            <?php
                exit();
            }
        } else {
            ?>
            <script>
                alert('Invalid file type or file size exceeds 1 MB for file: <?= $fileName ?>.\n');
                window.location.href = ''
            </script>
            <?php
            exit();
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sub'])) {
    if (!empty($_POST['title']) && !empty($_POST['service_description']) && !empty($_POST['regular_price']) && $_POST['service-category'] != '' && !empty($_POST['service'])  && !empty($_POST['validity'])) {
        $title = mine_sanitize_string($_POST['title']);
        $des = $purifier->purify($_POST['service_description']);
        $sanitize_description = mine_sanitize_string($_POST['service_description'], true);
        $price = mine_sanitize_string($_POST['regular_price']);
        $sale_price = mine_sanitize_string($_POST['sale_price']);
        $category = mine_sanitize_string($_POST['service-category']);
        $service_type = mine_sanitize_string($_POST['service-type']);
        $available = mine_sanitize_string($_POST['available']);
        $startDate = mine_sanitize_string($_POST['service-start']);
        $endDate = mine_sanitize_string($_POST['service-end']);
        $start_time = mine_sanitize_string($_POST['service-time-start']);
        $end_time = mine_sanitize_string($_POST['service-time-end']);
        $slot = mine_sanitize_string($_POST['slot']);
        $slot_days = $_POST['slot_days'];
        $slot_days_data = $_POST['slot_days_data'];
        $city = mine_sanitize_string($_POST['service-city']);
        $area = mine_sanitize_string($_POST['service-area']);
        $category = mine_sanitize_string($_POST['service-category']);
        $location = mine_sanitize_string($_POST['location']);
        $validity = mine_sanitize_string($_POST['validity']);
        $serviceData = [];
        // $serviceDes = '';
        $excerpt = mine_sanitize_string($_POST['excerpt']);
        $tags = mine_sanitize_string($_POST['tags']);
        $uploadPath = '../images/uploadimg/';
        $uplaodVideoPath = '../video/';

        if (is_array($_POST['service'])) {
            foreach ($_POST['service'] as $index => $val) {
                if (!empty($val)) {
                    $serviceData[] = array(
                        'name' => mine_sanitize_string($val),
                        'description' => mine_sanitize_string($_POST['service_des'][$index])
                    );
                } else {
            ?>
                    <script>
                        alert('adding service is compulsory');
                        window.location.href = '';
                    </script>
                    <?php
                }
            }
        } else {
            alerting('service data is not proper', 'add-service.php');
        }
        $service = json_encode($serviceData);

        $userId = $viewed = '0';
        $status = '1';


        if ($price > $sale_price) {

            //featured image code here

            if (isset($_FILES['featured-image']) && $_FILES['featured-image']['error'] === UPLOAD_ERR_OK) {
                $featured_image = $_FILES['featured-image']['name'];
                $tmp_featured_image = $_FILES['featured-image']['tmp_name'];
                $featured_image_size = $_FILES['featured-image']['size'];
                $featured_image_type = $_FILES['featured-image']['type'];
                $img = uploadSingleFile($featured_image, $featured_image_type, $featured_image_size, $tmp_featured_image, $uploadPath);
            } else {
                $img = '';
            }
            //gallery image code here

            if (count($_FILES['m_image']['name']) > 0) {
                foreach ($_FILES['m_image']['name'] as $key => $galleryImg) {
                    $name = $_FILES['m_image']['name'][$key];
                    $g__tmp__name = $_FILES['m_image']['tmp_name'][$key];
                    $g__img__size = $_FILES['m_image']['size'][$key];
                    $g__img__type = $_FILES['m_image']['type'][$key];
                    $gall_img_arr[] = uploadSingleFile($name, $g__img__type, $g__img__size, $g__tmp__name, $uploadPath);
                    $galImg = implode(',', $gall_img_arr);
                }
            } else {
                $galImg = '';
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
                $video_name = '';
            }

            $qry = "INSERT INTO `service`( `name`, `description`, `price`, `sale_price`, `service_type`, `available`,`start_date`,`end_date`,`start_time`, `end_time`,`slot`, `city`, `area`, `category`,`location`, `services_data`, `excerpt`, `featured_image`, `gallery_images`,`video`,`tags`,`validity`,`user_id`,`status`,`viewed`,`date`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $prepare_qry = mysqli_prepare($con, $qry);
            mysqli_stmt_bind_param($prepare_qry, 'ssssssssssssssssssssssssss', $title, $sanitize_description, $price, $sale_price, $service_type, $available, $startDate, $endDate, $start_time, $end_time, $slot, $city, $area, $category, $location, $service, $excerpt, $img, $galImg, $video_name, $tags, $validity, $userId, $status,$viewed, $date);
            if (mysqli_stmt_execute($prepare_qry)) {
                if (!empty($slot) && $slot == 1) {
                    $query = "SELECT LAST_INSERT_ID()";
                    $result = mysqli_query($con, $query);
                    $insertId = mysqli_fetch_array($result)[0];

                    if (!empty($slot_days) && !empty($slot_days_data)) {

                        $insert_slot_data = mysqli_prepare($con, "INSERT INTO `service_slot`( `slot_days`, `slot_data`, `service_id`) VALUES (?,?,?)");
                        mysqli_stmt_bind_param($insert_slot_data, 'sss', $slot_days, $slot_days_data, $insertId);
                        if (mysqli_stmt_execute($insert_slot_data)) {
                    ?>
                            <script>
                                window.location.href = '?screen=<?= base64_encode('success') ?>&msg=<?= base64_encode('the service is added successfully and the slot are also saved now it is ready to sell and buy') ?>';
                            </script>
                        <?php
                        } else {
                        ?>
                            <script>
                                window.location.href = '?screen=<?= base64_encode('success') ?>&msg=<?= base64_encode('the service is added successfully but the service slot where unable to upload') ?>';
                            </script>
                    <?php
                        }
                    }
                } else {
                    ?>
                    <script>
                        window.location.href = '?screen=<?= base64_encode('success') ?>&msg=<?= base64_encode('the service is added successfully now it is ready to sell and buy') ?>';
                    </script>
                <?php

                }
            } else {
                ?>
                <script>
                    alert('something went wrong');
                    window.location.href = '';
                </script>
            <?php
            }
        } else {
            ?>
            <script>
                alert('sale price should less than regular pricing ');
                window.location.href = '';
            </script>
        <?php
        }
    } else {
        ?>
        <script>
            alert('complete the details');
            window.location.href = '';
        </script>
    <?php
    }
} else {
    echo "something went wrong";
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
    } elseif (base64_decode($_GET['screen']) == 'error') {
    ?>
        <script>
            let errorWrap = document.querySelector('.error-message-container');
            errorWrap.classList.remove('d-none');
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
