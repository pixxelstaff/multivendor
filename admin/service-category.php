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
    <title>
        categorty || lanoote - saloon
    </title>
    <?php include('include/links.php') ?>
    <!-- cdn for datatables -->
    <?php $adminId = '1'; ?>

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
                    <h3 class="page-head">Category</h3>
                    <h6 class="brd-crumbs">
                        <a href="index.php" class="brd-crumbs-active ">Dashboard</a>/
                        <a href="product.php" class="brd-crumbs-active ">product</a>/
                        <a href="javascript:void(0)">Category</a>
                    </h6>
                </div>
                <!-- category form -->
                <div class="col-12 d-flex justify-content-center">
                    <div class="category-container">
                        <form class="form" action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="email">Category name</label>
                                <input required="" name="name" id="email" type="text">
                            </div>
                            <div class="form-group">
                                <label for="email">Select parent Category</label>
                                <select name="p_cat" id="">
                                    <option value="">select category</option>
                                    <option value="0">parent category</option>
                                    <?php
                                    $category = fetchAllData($con, 'service_category');
                                    while ($sh = mysqli_fetch_assoc($category)) {
                                        echo "<option value=" . $sh['Id'] . ">" . $sh['name'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email">Category image</label>
                                <input name="p_cat_img" id="email" type="file">
                            </div>
                            <div class="form-group">
                                <label for="textarea">Description</label>
                                <textarea required="" cols="50" rows="10" id="textarea" name="p_des"></textarea>
                            </div>
                            <form class="form">

                                <button type="submit" name="i_sub" class="form-submit-btn">Submit</button>
                            </form>
                    </div>
                </div>
                <!-- action div -->
                <div class="col-12  p-2 justify-content-start align-items-end gap-2 d-flex mt-4 other-type-filter">
                    <div class="filter-inp-div">
                        <label for="">Action**</label>
                        <select name="" id="" class="product-sort w-100">
                            <option value="">Action</option>
                            <option value="">Move to trash</option>
                            <option value="">Delete permenantly</option>
                        </select>
                    </div>

                    <div class="filter-inp-div">
                        <label for="">search**</label>
                        <input type="text" placeholder="search category" class="search-products w-100">
                    </div>

                </div>

                <div class="col-12 table-responsive product-wrapper ">
                    <h2 class="text-center page-head mt-1 mb-4">Category list</h2>
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
                                <th>Name </th>
                                <th>Parent-category</th>
                                <th>image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count_category = fetchAllData($con, 'service_category');
                            $count = mysqli_num_rows($count_category);
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $limit = 10;
                            $offset = ($page - 1) * $limit;
                            $totalPage = ceil($count / $limit);
                            $s_no = 0;
                            $list_q = "SELECT * FROM `service_category` ORDER BY `Id` DESC LIMIT $limit OFFSET $offset";
                            $list_q_p = mysqli_prepare($con, $list_q);
                            if (mysqli_stmt_execute($list_q_p)) {
                                $result = mysqli_stmt_get_result($list_q_p);
                                while ($sh = mysqli_fetch_assoc($result)) {
                                    $s_no++;
                            ?>
                                    <tr>
                                        <td><input type="checkbox" name="cbox[]" value="<?= $sh['Id'] ?>" id=""></td>
                                        <td><?= $s_no; ?></td>
                                        <td><?php $str = dec_function($sh['name']);
                                            echo $str;  ?></td>
                                        <!-- parent category name; -->
                                        <td>
                                            <?php
                                            $name = fetchOtherdetails($con, 'service_category', 'Id', $sh['parentId']);
                                            if (mysqli_num_rows($name) > 0) {
                                                while ($show = mysqli_fetch_assoc($name)) {
                                                    echo $show['name'];
                                                }
                                            } else {
                                                echo "-";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <img src="../images/uploadimg/<?= !empty($sh['image']) ? $sh['image'] : 'down.webp' ?>" class="product-td-img" alt="image here">
                                        </td>
                                        <td>
                                            <div class="action-button-div">
                                                <a href="javascript:void(0)" class="eye-btn eye-pop" data-category-page='service' data-action-id="<?= $sh['Id'] ?>">
                                                    <span class="material-symbols-outlined ">
                                                        visibility
                                                    </span>
                                                </a>
                                                <a href="javascript:void(0)" class="edit-btn edit-pop" data-category-page='service' data-action-id="<?= $sh['Id'] ?>">
                                                    <span class="material-symbols-outlined">
                                                        edit
                                                    </span>
                                                </a>
                                                <a href="?delete-id=<?= base64_encode($sh['Id']) ?>" class="delete-btn delete-pop" data-action-id="<?= $sh['Id'] ?>">
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
                <div class="col-12 custom-pagination-wrapper d-flex justify-content-between my-2 px-4 align-items-center">
                    <div class="col-lg-4 col-md-6 col-sm-12 pagination-message">
                        <?php
                        $startNo = 1 + $offset;
                        $rangeNo = min(($page * $limit), $count);
                        ?>
                        showing <span class="show-product-num">(<?= $startNo ?> to <?= $rangeNo ?>)</span> Out of <span class="total-product-num"><?= $count; ?></span> categories
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
                                ?> <a href="?page=<?= $i ?>" class="page-btn <?php echo $page == $i ?  'active-page' : '' ?> "><?= $i ?></a> <?php

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
            </div>



            <?php include('include/footer.php') ?>


            <!-- footer here -->
        </div>
    </main>
    <div class="popup-wrapper">
        <div class="popop-content-wrapper">
            <!-- preview category -->
            <div class="category-container d-none" id="view-form">
                <form class="form">
                    <div class="form-group">
                        <label for="email">Category name</label>
                        <input required="" value="Electronics" id="view-category-name" type="text" disabled>
                    </div>
                    <div class="form-group">
                        <label for="email">Parent Category</label>
                        <select name="" id="view-parent-category" disabled>
                            <option value="">select category</option>
                            <!-- <option value="" selected>No parent</option> -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Category image</label>
                        <div class="cat-img">
                            <img src="../images/dashboard-img/p-2.jpg" id="view-category-image" width="80px" alt="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="textarea">Descriptiom</label>
                        <textarea required="" cols="50" rows="10" id="category-description" name="textarea" disabled>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Totam quos quia omnis corporis suscipit numquam. Facilis harum distinctio </textarea>
                    </div>

                </form>
            </div>
            <div class="category-container d-none" id="edit-form">
                <form class="form" action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="email">Category name</label>
                        <input name="upd__name" id="upd__name" type="text">
                        <input name="upd__Id" id="upd__Id" type="hidden">
                    </div>
                    <div class="form-group">
                        <label for="email"> parent Category</label>
                        <select name="upd__p__cat" id="upd__p__cat">
                            <option value="">select category</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Category Image (leave empty if don't want to update)</label>
                        <input name="upd__image" id="upd__image" type="file">
                        <input type="hidden" name="previous_image" value="" id="prev_image">
                    </div>
                    <div class="form-group">
                        <label for="textarea">Description</label>
                        <textarea cols="50" rows="10" id="upd__des" name="upd__des"></textarea>
                    </div>

                    <button type="submit" name="upd_submit" class="form-submit-btn">Update</button>
                </form>
            </div>
            <a href="javascript:void(0)" class="close-btn">
                <span class="material-symbols-outlined">
                    close
                </span>
            </a>
        </div>
    </div>
    <div class="success-wrapper">
        <div class="success-message-container d-none">
            <div class="success-gif">
                <img src="../images/dashboard-img/success.gif" alt="">
            </div>
            <p class="pop-message">the category is uploaded successfully.now u can upload service with using these category </p>
            <a href="service-category.php" class="close-btn" id="pop-close-btn">
                <span class="material-symbols-outlined">
                    close
                </span>
            </a>
        </div>
        <div class="error-message-container d-none">
            <div class="success-gif">
                <img src="../images/dashboard-img/cross.gif" alt="">
            </div>
            <p class="pop-message">the category name (<?= base64_decode($_GET['cat']); ?>) is already present try another name or add other category </p>
            <a href="service-category.php" class="close-btn" id="pop-close-btn">
                <span class="material-symbols-outlined">
                    close
                </span>
            </a>
        </div>
    </div>
    </div>

    <!--   Core JS Files   -->
    <?php include('include/script.php') ?>
    <script src="../assets/js/product.js"></script>
    <script src="../assets/js/category.js"></script>



</body>

</html>


<?php
$date = date('d-m-Y');

//for inserting the data?
$allowed_types = array("image/png", "image/jpeg", "image/jpg", "image/webp");
if (isset($_POST['i_sub']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['name']) && $_POST['p_cat'] != '') {
        $image_name = '';

        if ($_FILES['p_cat_img']['error'] === UPLOAD_ERR_OK) {
            $image = $_FILES['p_cat_img']['name'];
            $tmp_image = $_FILES['p_cat_img']['tmp_name'];
            $type = $_FILES['p_cat_img']['type'];
            $size = $_FILES['p_cat_img']['size'];


            if (in_array($type, $allowed_types)) {
                if ($size < 1048576) { // 1 MB (1024 * 1024 bytes)
                    $rand = rand(1, 100000);
                    $image_name = $rand . '-' . $image;
                    $path = '../images/uploadimg/' . $image_name;
                } else {
                    $error_message = "Image size should be less than 1 MB.";
                }
            } else {
                $error_message = "Image type should be PNG, JPEG, JPG, or WEBP.";
            }
        }

        if (empty($error_message)) {
            //defining variables
            $name = mine_sanitize_string($_POST['name']);
            $parentCategory = mine_sanitize_string($_POST['p_cat']);
            $des = mine_sanitize_string($_POST['p_des']);
            //here we will insertdata some thing
            $selQ = fetchOtherdetails($con, 'service_category', 'name', $name);
            if (mysqli_num_rows($selQ) == 0) {
                $insert_Q = "INSERT INTO `service_category`(`name`,`parentId`,`description`,`image`,`user`,`date`) VALUES(?,?,?,?,?,?)";
                $insert_Q_P = mysqli_prepare($con, $insert_Q);
                mysqli_stmt_bind_param($insert_Q_P, 'ssssss', $name, $parentCategory, $des, $image_name, $user__id, $date);
                if (mysqli_stmt_execute($insert_Q_P)) {
                    move_uploaded_file($tmp_image, $path);
?>
                    <script>
                        window.location.href = "?result=success&cat=<?= base64_encode($name); ?>"
                    </script>
                <?php
                } else {

                    echo "<script>alert('something went wrong'); window.location.href = '';</script>";
                }
            } else {
                ?>
                <script>
                    window.location.href = "?result=error&cat=<?= base64_encode($name); ?>"
                </script>
        <?php
            }
        } else {
            echo "<script>alert('$error_message'); window.location.href = '';</script>";
        }
    } else {
        echo "<script>alert('category name and parent category are compulsory to fill.'); window.location.href = '';</script>";
    }
}

if (isset($_POST['upd_submit']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = mine_sanitize_string($_POST['upd__Id']);
    $name = mine_sanitize_string($_POST['upd__name']);
    $category = mine_sanitize_string($_POST['upd__p__cat']);
    $previousImg = $_POST['previous_image'];
    $updImage = $_FILES['upd__image'];
    $des = mine_sanitize_string($_POST['upd__des']);
    $upd_image = '';
    if (!empty($name) && $category != '') {
        if ($_FILES['upd__image']['error'] === UPLOAD_ERR_OK && isset($_FILES['upd__image']['name'])) {
            $image = $_FILES['upd__image']['name'];
            $upd_tmp_image = $_FILES['upd__image']['tmp_name'];
            $type = $_FILES['upd__image']['type'];
            $size = $_FILES['upd__image']['size'];

            if (in_array($type, $allowed_types)) {
                if ($size < 1048576) { // 1 MB (1024 * 1024 bytes)
                    $rand = rand(1, 100000);
                    $upd_image = $rand . '-' . $image;
                    $path = '../images/uploadimg/' . $upd_image;
                    move_uploaded_file($upd_tmp_image, $path);
                } else {
                    echo "<script>alert('Image size should be less than 1 MB.'); window.location.href='';</script>";
                }
            } else {
                echo "<script>alert('Image type should be PNG, JPEG, JPG, or WEBP.'); window.location.href='';</script>";
            }
        } else {
            $upd_image = $previousImg;
        }

        $updateQ = "UPDATE `service_category` SET `name`  = ? , `parentId` = ? , `description` = ? , `image` = ? , `user` = ? ,`date` = ? WHERE `Id` = ?";

        $updateQ__prepare = mysqli_prepare($con, $updateQ);

        mysqli_stmt_bind_param($updateQ__prepare, 'sssssss', $name, $category, $des, $upd_image, $user__id, $date, $id);

        if (mysqli_stmt_execute($updateQ__prepare)) {
            echo "<script>alert('your category is updated.'); window.location.href='';</script>";
        }
    } else {
        echo "<script>alert('please enter complete info'); window.location.href='';</script>";
    }
}



if (isset($_GET['result'])) {
    if ($_GET['result'] === 'success') {
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
    } elseif ($_GET['result'] === 'error') {
    ?>
        <script>
            let wrap = document.querySelector('.success-wrapper');
            let errorWrap = document.querySelector('.error-message-container');
            errorWrap.classList.remove('d-none');
            wrap.style.display = 'flex';
            setTimeout(() => {
                wrap.style.opacity = '1';
                wrap.style.transform = 'scale(1)'
            }, 50)
        </script>
    <?php
    }
}


if (isset($_GET['delete-id'])) {
    $del__id = base64_decode($_GET['delete-id']);
    $deleteQ = mysqli_prepare($con, "DELETE FROM `service_category` WHERE `Id` =?");
    mysqli_stmt_bind_param($deleteQ, 's', $del__id);
    if (mysqli_stmt_execute($deleteQ)) {
    ?> <script>
            alert("the data is deleted succeefully");
            window.location.href = 'service-category.php';
        </script> <?php
                }
            }
