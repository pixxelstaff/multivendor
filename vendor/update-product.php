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
    <title>
        (update - product) || Lanotte - saloon dashboard
    </title>
    <?php include('include/links.php');

    if (isset($_GET['id'])) {
        if (is_numeric(base64_decode($_GET['id']))) {
            $id = base64_decode($_GET['id']);
            $productData = fetchOtherdetails($con, 'product', 'id', $id);
            if (mysqli_num_rows($productData) > 0) {
                while ($dis = mysqli_fetch_assoc($productData)) {
                    $p__name = stripcslashes($dis['name']);
                    $p__des = dec_function($dis['description']);
                    $p__price = $dis['price'];
                    $p__sale_price = $dis['sale_price'];
                    $p__category = $dis['category'];
                    $p__stock = $dis['stock'];
                    $p__quantity = $dis['quantity'];
                    $p__sku = $dis['sku'];
                    $p__dimensions =  explode(',', $dis['dimensions']);
                    $p__type = $dis['product_type'];
                    $p__exercept = dec_function($dis['excerpt']);
                    $p_feature_img = $dis['featured_image'];
                    $p_gallery_img = trim($dis['gallery_image'], ',');
                    $p__tags = $dis['tags'];
                }
            } else {
    ?>
                <script>
                    alert('Invalid product');
                    window.location.href = 'product.php';
                </script>
            <?php
            }
        } else {
            ?>
            <script>
                alert('the product id is not proper to proceed');
                window.location.href = 'product.php';
            </script>
        <?php
        }
    } else {
        ?>
        <script>
            window.location.href = 'product.php';
        </script>
    <?php
    }

    // including htmlpurifier
    require('../htmlpurifier/HTMLPurifier.kses.php');

    $config = HTMLPurifier_Config::createDefault();

    // Optional: customize configuration

    $purifier = new HTMLPurifier($config);

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
                <div class="col-12 d-flex justify-content-between p-2 brd__crumbs">
                    <h3 class="page-head">update-product</h3>
                    <h6 class="brd-crumbs"><a href="index.php">Dashboard</a>/<a href="">update-product</a></h6>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row p-2">
                        <div class="col-lg-9 col-md-12 col-sm-12 data-column">
                            <div class="col-12 p-inp-div d-flex flex-column p-2">
                                <label for="" class="p-inp-label">Name</label>
                                <input type="text" name="title" class="p-inp-field" placeholder="enter your title here" id="" value="<?= $p__name ?>">
                            </div>
                            <div class="col-12 p-inp-div d-flex flex-column p-2">
                                <label for="" class="p-inp-label">description</label>
                                <textarea id="des-editor" name="product_description" class="w-100 p-inp-field" rows="10"><?= $p__des ?></textarea>
                            </div>
                            <div class="col-12 d-flex flex-wrap  multi-row-div">
                                <div class="col-lg-6 col-md-6 col-sm-12 p-inp-div d-flex flex-column p-2">
                                    <label for="" class="p-inp-label">price</label>
                                    <input type="text" name="regular_price" class="p-inp-field" placeholder="regular price" value="<?= $p__price ?>" id="">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 p-inp-div d-flex flex-column p-2">
                                    <label for="" class="p-inp-label">sale price</label>
                                    <input type="text" name="sale_price" class="p-inp-field" placeholder="sale price" value="<?= $p__sale_price ?>" id="">
                                </div>
                            </div>
                            <div class="col-12 d-flex flex-wrap multi-row-div">
                                <div class="col-lg-6 col-md-6 col-sm-12 p-inp-div d-flex flex-column p-2">
                                    <label for="" class="p-inp-label">category</label>
                                    <select name="product-category" id="" class="p-inp-field">
                                        <option value="">select category</option>
                                        <?php
                                        $opt = fetchAllData($con, 'category');
                                        while ($sh = mysqli_fetch_assoc($opt)) {
                                            $selected = $sh['Id'] == $p__category ? 'selected' : '';
                                            echo "<option value =" . $sh['Id'] . " $selected >" . stripslashes($sh['name']) . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 p-inp-div d-flex flex-column p-2">
                                    <label for="" class="p-inp-label">Availability</label>
                                    <select name="stock" id="" class="p-inp-field">
                                        <?php
                                        $available = $p__stock == '1' ? 'selected' : '';
                                        $unavailable = $p__stock != '1' ? 'selected' : '';
                                        ?>
                                        <option value="1" <?= $available ?>>In stock</option>
                                        <option value="0" <?= $unavailable ?>>Out of stock</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-12 d-flex flex-wrap multi-row-div">
                                <div class="col-lg-6 col-md-6 col-sm-12 p-inp-div d-flex flex-column p-2">
                                    <label for="" class="p-inp-label">Quantity</label>
                                    <input type="text" name="quantity" class="p-inp-field" placeholder="product quantity" value="<?= $p__quantity ?>" id="">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 p-inp-div d-flex flex-column p-2">
                                    <label for="" class="p-inp-label">stock keeping unit (sku)</label>
                                    <input type="text" name="sku" class="p-inp-field" placeholder="sku number" value="<?= $p__sku ?>" id="">
                                </div>
                            </div>
                            <div class="col-12 d-flex flex-wrap multi-row-div">
                                <div class="col-lg-4 col-md-4 col-sm-12 p-inp-div d-flex flex-column p-2">
                                    <label for="" class="p-inp-label">length</label>
                                    <input type="text" name="length" id="" class="p-inp-field" value="<?= $p__dimensions[0] ?>" placeholder="in cm">
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 p-inp-div d-flex flex-column p-2">
                                    <label for="" class="p-inp-label">width</label>
                                    <input type="text" name="width" id="" class="p-inp-field" value="<?= $p__dimensions[1] ?>" placeholder="in cm">
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 p-inp-div d-flex flex-column p-2">
                                    <label for="" class="p-inp-label">height</label>
                                    <input type="text" name="height" id="" class="p-inp-field" value="<?= $p__dimensions[2] ?>" placeholder="in cm">
                                </div>

                            </div>

                            <div class="col-12 d-flex flex-wrap multi-row-div">
                                <div class="col-lg-4 col-md-4 col-sm-12 p-inp-div d-flex align-items-center p-2 gap-2">
                                    <input type="radio" name="type" class="p-type-radio" id="p-type-inp1" value="simple" <?php echo $p__type == 'simple' ? 'checked' : ''; ?> hidden>
                                    <label for="p-type-inp1" class="c-radio active-radio"></label>
                                    <p class="product-type-p">simple product</p>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 p-inp-div d-flex align-items-center p-2 gap-2">
                                    <input type="radio" name="type" class="p-type-radio" id="p-type-inp2" value="attribute" <?php echo $p__type == 'attribute' ? 'checked' : ''; ?> hidden>
                                    <label for="p-type-inp2" class="c-radio"></label>
                                    <p class="product-type-p">attribute product</p>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 p-inp-div d-flex  align-items-center p-2 gap-2">
                                    <input type="radio" name="type" class="p-type-radio" id="p-type-inp3" value="variation" <?php echo $p__type == 'variation' ? 'checked' : ''; ?> hidden>
                                    <label for="p-type-inp3" class="c-radio"></label>
                                    <p class="product-type-p">variable product</p>
                                </div>

                            </div>
                            <div class="col-12 p-2">
                                <div class="col-12 complex-product-info d-flex flex-wrap p-2 align-items-center">
                                    <div class="col-6 d-flex justify-content-start">
                                        <p class="p-type-info">simple product</p>
                                    </div>
                                    <div class="col-6 complex-action d-flex justify-content-end gap-1 align-items-center"> </div>

                                </div>
                            </div>
                            <div class="col-12 p-2" id="attr-parent">
                                <?php
                                if ($p__type == 'attribute' || $p__type == 'variation') {
                                ?>
                                    <label for="" class="p-inp-label attr-label">Attribute</label>
                                    <?php
                                    $attr = fetchOtherdetails($con, 'product_attributes', 'product_id', $id);
                                    while ($att = mysqli_fetch_assoc($attr)) {
                                        $attr_names =  json_decode($att['attribute'], true);
                                        $attr_values =  json_decode($att['attribute_value'], true);
                                        for ($i = 0; $i < count($attr_names); $i++) {
                                    ?>
                                            <div class="attribute-wrapper p-0 col-12" id="attribute-<?= $i ?>">
                                                <div class="attribute-head col-12" data-id="attribute-f-div-<?= $i ?>">
                                                    <span class="attribute-head-name">
                                                        <?= $attr_names[$i] ?>
                                                    </span>
                                                    <div class="d-flex align-items-center gap-2">
                                                        <a href="javascript:void(0)" class="text-white remove-attr-box" data-attr-id="attribute-<?= $i ?>">remove</a>
                                                        <span class="material-symbols-outlined attr-direction">
                                                            expand_more
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="attribute-field-div col-12" id="attribute-f-div-<?= $i ?>">
                                                    <input type="text" name="attributeName[]" placeholder="attribute-name" id="" class="p-inp-field attr-name" value=" <?= $attr_names[$i] ?>">
                                                    <textarea name="attributeVal[]" id="" class="w-100 p-inp-field attribute-val-area" rows="10" placeholder="Enter attribute values separate values by (|)"> <?= $attr_values[$i] ?></textarea>
                                                </div>
                                            </div>
                                <?php
                                        }
                                    }
                                }
                                ?>



                            </div>
                            <div class="col-12 p-2" id="var-parent">
                                <?php
                                if ($p__type == 'variation') {
                                ?> <label for="" class="p-inp-label attr-label">Variations</label> <?php
                                                                                                    $vari = fetchOtherdetails($con, 'product_variations', 'product_id', $id);
                                                                                                    while ($vr = mysqli_fetch_assoc($vari)) {
                                                                                                        $var_arr = json_decode($vr['variations'], true);
                                                                                                        foreach ($var_arr as $key => $vari_val) {
                                                                                                    ?>
                                            <div class="variation-wrapper col-12 p-0" id="variation-<?= $key + 1 ?>">
                                                <div class="variation-head col-12" data-id="var-div-<?= $key + 1 ?>">
                                                    <span class="variation-head-name">
                                                        <?= dec_function($vari_val['variation_name']) ?>
                                                    </span>
                                                    <input type='hidden' name='variation_name[]' value=' <?= dec_function($vari_val['variation_name']) ?>'>
                                                    <div class="d-flex align-items-center gap-1">
                                                        <a href="javascript:void(0)" class="remove-variation text-white" data-var-id='variation-<?= $key + 1 ?>'>remove</a>
                                                        <span class="material-symbols-outlined attr-direction">
                                                            expand_more
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="variable-product-field-div col-12" id="var-div-<?= $key + 1 ?>">
                                                    <div class="col-12 d-flex flex-wrap small-column">
                                                        <div class="col-lg-6 col-md-6 col-sm-12 p-inp-div d-flex flex-column p-2">
                                                            <label for="" class="p-inp-label">price</label>
                                                            <input type="text" name="var_regular_price[]" class="p-inp-field" placeholder="regular price" value=" <?= dec_function($vari_val['variation_price']) ?>" id="">
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-12 p-inp-div d-flex flex-column p-2">
                                                            <label for="" class="p-inp-label">sale price</label>
                                                            <input type="text" name="var_sale_price[]" class="p-inp-field" placeholder="sale price" value=" <?= dec_function($vari_val['variation_sale_price']) ?>" id="">
                                                        </div>

                                                    </div>
                                                    <div class="col-12 d-flex flex-wrap small-column">
                                                        <div class="col-lg-4 col-md-4 col-sm-12 p-inp-div d-flex flex-column p-2">
                                                            <label for="" class="p-inp-label">length</label>
                                                            <input type="text" name="var_p_width[]" id="" placeholder="in cm" value=" <?= dec_function($vari_val['variation_length']) ?>" class="p-inp-field">
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-12 p-inp-div d-flex flex-column p-2">
                                                            <label for="" class="p-inp-label">width</label>
                                                            <input type="text" name="var_p_length[]" id="" placeholder="in cm" class="p-inp-field" value=" <?= dec_function($vari_val['variation_width']) ?>">
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-12 p-inp-div d-flex flex-column p-2">
                                                            <label for="" class="p-inp-label">height</label>
                                                            <input type="text" name="var_p_height[]" id="" placeholder="in cm" class="p-inp-field" value=" <?= dec_function($vari_val['variation_height']) ?>">
                                                        </div>

                                                    </div>
                                                    <div class="col-12 d-flex flex-wrap small-column">
                                                        <div class="col-lg-4 col-md-4 col-sm-12 p-inp-div d-flex flex-column p-2">
                                                            <label for="" class="p-inp-label">Quantity</label>
                                                            <input type="text" name="var_p_quantity[]" class="p-inp-field" placeholder="Quantity" id="" value=" <?= dec_function($vari_val['variation_quantity']) ?>">
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-12 p-inp-div d-flex flex-column p-2">
                                                            <label for="" class="p-inp-label">Sku (optional)</label>
                                                            <input type="text" name="var_p_sku[]" class="p-inp-field" placeholder="ege-0986" id="" value=" <?= dec_function($vari_val['variation_sku']) ?>">
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-12 p-inp-div d-flex flex-column p-2">
                                                            <label for="" class="p-inp-label">stock</label>
                                                            <select name="var_p_stock[]" id="" class="p-inp-field">
                                                                <option value="1" <?php echo dec_function($vari_val['variation_stock']) == '1' ? 'selected' : '';  ?>>In stock</option>
                                                                <option value="0" <?php echo dec_function($vari_val['variation_stock']) != '1' ? 'selected' : '';  ?>>Out of stock</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 p-inp-div d-flex flex-column p-2">
                                                        <label for="" class="p-inp-label">Excerpt</label>
                                                        <textarea id="des-editor" name="var_p_exercept[]" class="w-100 p-inp-field" rows="6"><?= dec_function($vari_val['variation_exercept']) ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                <?php
                                                                                                        }
                                                                                                    }
                                                                                                }
                                ?>

                            </div>
                            <div class="col-12 p-inp-div d-flex flex-column p-2">
                                <label for="" class="p-inp-label">product-Excerpt</label>
                                <textarea id="des-editor" class="w-100 p-inp-field" rows="6" name="exercept"><?= dec_function($p__exercept) ?></textarea>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12 media-column">
                            <!-- featured image -->
                            <div class="featured-image-wrapper w-100 d-inline-block">
                                <div class="product-featured-div">
                                    <img src="../images/uploadimg/<?php echo !empty($p_feature_img) ? $p_feature_img : 'down.webp' ?>" alt="" class="featured-img">
                                    <a href="javascript:void(0)" class="remove-f-image">
                                        <span class="material-symbols-outlined">
                                            close
                                        </span>
                                    </a>
                                </div>
                                <label for="upload-f-image" class="upd-label">upload image</label>
                                <input type="file" name="featured-image" id="upload-f-image" hidden>
                                <input type="text" name="uploaded_featured_image" value="<?= $p_feature_img ?>" id="uploaded_featured_image" hidden>
                            </div>
                            <!-- gallery images -->
                            <div class="galler-image-wrapper w-100 d-inline-block">
                                <div class="gallery-image-parent d-flex flex-wrap"></div>
                                <input type="file" name="m_image[]" id="upload-gallery-image" multiple hidden>
                                <input type="text" name="uploaded_gallery_images" value="<?= $p_gallery_img ?>" id="uploaded_gallery_images" hidden>
                                <label for="upload-gallery-image" class="upd-label text-dark">Add gallery image</label>
                            </div>
                            <!-- tags div -->
                            <div class="products-tags-wrapper w-100 d-inline-block">
                                <h6 class="sec-head p-inp-label">Tags</h6>
                                <div class="tags-parent d-flex flex-column">
                                    <input type="text" name="" id="tagsInp" value="<?= $p__tags ?>" placeholder="enter tags here" class="p-inp-field">
                                    <input type="text" name="tags" id="tags-val-holder" hidden>
                                    <div class="tags-div"> </div>
                                </div>
                            </div>
                            <!-- submit btn -->
                            <input type="submit" value="update product" name="sub" id="submit-btn" class="sub-btn">
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
            echo "<script>alert('Error uploading file $fileName.\n');window.location.href=''</script>";
        }
    } else {
        echo "<script>alert('Invalid file type or file size exceeds 1 MB for file: $fileName.\n');window.location.href=''</script>";
    }
}

if (isset($_POST['sub']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = mine_sanitize_string($_POST['title']);
    $description = $purifier->purify($_POST['product_description']);
    $sanitize_description = mine_sanitize_string($_POST['product_description'], true);
    $price = mine_sanitize_string($_POST['regular_price']);
    $sale_price = mine_sanitize_string($_POST['sale_price']);
    $quantity = mine_sanitize_string($_POST['quantity']);
    $sku = mine_sanitize_string($_POST['sku']);
    $length = mine_sanitize_string($_POST['length']);
    $width = mine_sanitize_string($_POST['width']);
    $height = mine_sanitize_string($_POST['height']);
    $dimension = implode(',', [$length, $width, $height]);
    $category = $_POST['product-category'];
    $stock = mine_sanitize_string($_POST['stock']);
    $p_type = mine_sanitize_string($_POST['type']);
    $vendor_id = $v__user__id;
    $status = $viewed =  '0';
    if ($p_type == 'attribute' || $p_type == 'variation') {
        //attribute starts here
        // foreach starts here and validating it
        foreach ($_POST['attributeName'] as $ind => $name) {
            if (empty($_POST['attributeName'][$ind]) || empty($_POST['attributeVal'][$ind])) {
                echo "<script>alert('please fill attr box completely');window.location.href=''</script>";
                exit();
            }
            $sanitize_attr_name = [];
            $sanitize_attr_value = [];
            // foreach starts here
            foreach ($_POST['attributeName'] as $key => $value) {
                $sanitize_attr_name[] = mine_sanitize_string($_POST['attributeName'][$key]);
                $sanitize_attr_value[] = mine_sanitize_string($_POST['attributeVal'][$key]);
            }

            $attr_name = json_encode($sanitize_attr_name);
            $attr_value = json_encode($sanitize_attr_value);
            echo $attr_name;
            echo $attr_value;

            // variation if starts here
            if ($p_type == 'variation') {
                $variationName = $_POST['variation_name'];
                $varPrice = $_POST['var_regular_price'];
                $varSalePrice = $_POST['var_sale_price'];
                $varLength = $_POST['var_p_width'];
                $varWidth = $_POST['var_p_length'];
                $varHeight = $_POST['var_p_height'];
                $varQuantity = $_POST['var_p_quantity'];
                $varSku = $_POST['var_p_sku'];
                $varStock = $_POST['var_p_stock'];
                $varExercept = $_POST['var_p_exercept'];

                $variation_data = [];
                foreach ($variationName as $key => $value) {
                    $variation_data[] = array(
                        'variation_name' => mine_sanitize_string($variationName[$key]),
                        'variation_price' => mine_sanitize_string($varPrice[$key]),
                        'variation_sale_price' => mine_sanitize_string($varSalePrice[$key]),
                        'variation_length' => mine_sanitize_string($varLength[$key]),
                        'variation_width' => mine_sanitize_string($varWidth[$key]),
                        'variation_height' => mine_sanitize_string($varHeight[$key]),
                        'variation_quantity' => mine_sanitize_string($varQuantity[$key]),
                        'variation_sku' => mine_sanitize_string($varSku[$key]),
                        'variation_stock' => mine_sanitize_string($varStock[$key]),
                        'variation_exercept' => mine_sanitize_string($varExercept[$key]),
                    );
                }
                $actualVariationData = json_encode($variation_data, true);
                echo $actualVariationData;

                //validating  varaition datadata

                if (isset($_POST['variation_name'])) {
                    foreach ($_POST['variation_name'] as $index => $val) {
                        if (!empty($val) && !empty($_POST['var_regular_price'][$index])) {
                            if ($_POST['var_regular_price'][$index] < $_POST['var_sale_price'][$index]) {
                                echo "<script>alert('sale price should less than actual price in variation box');window.location.href=''</script>";
                                exit();
                            }
                        } else {
                            echo "<script>alert('please fill variation data completely');window.location.href=''</script>";
                            exit();
                        }
                    }
                } else {
                    echo "<script>alert('variations are not added');window.location.href=''</script>";
                    exit();
                }
                // variation ends here
            }
        }


        //attribute ends hete
    }
    $exercept = mine_sanitize_string($_POST['exercept']);
    $uploadPath = '../images/uploadimg/';
    $tags = mine_sanitize_string($_POST['tags']);
    //previous uploaded images
    $prev_featured_image = $_POST['uploaded_featured_image'];
    $prev_gallery_image = trim($_POST['uploaded_gallery_images'], ',');

    if (!empty($title) && !empty($sanitize_description) && !empty($price) && !empty($category)) {


        if ($price > $sale_price) {

            //featured image code here

            if (isset($_FILES['featured-image']) && $_FILES['featured-image']['error'] === UPLOAD_ERR_OK) {
                $featured_image = $_FILES['featured-image']['name'];
                $tmp_featured_image = $_FILES['featured-image']['tmp_name'];
                $featured_image_size = $_FILES['featured-image']['size'];
                $featured_image_type = $_FILES['featured-image']['type'];
                $img = uploadSingleFile($featured_image, $featured_image_type, $featured_image_size, $tmp_featured_image, $uploadPath);
            } else {
                $img = $prev_featured_image;
            }
            //gallery upload image here
            if (count($_FILES['m_image']['name']) > 0) {
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

            //query for uploading  products ***********/

            $productQ = "UPDATE `product` SET `name` = ?, `description` = ?, `price` = ?, `sale_price` = ?, `quantity` = ?, `category` = ?, `sku` = ?, `vendor_id` = ?, `product_type` = ?, `featured_image` = ?, `gallery_image` = ?, `tags` = ?, `dimensions` = ?, `excerpt` = ?, `viewed` = ?, `date` = ?, `approve` = ? WHERE `id` = ?";


            // Prepare the statement
            $productQ__p = mysqli_prepare($con, $productQ);

            // Bind parameters
            mysqli_stmt_bind_param($productQ__p, "ssssssssssssssssss", $title, $sanitize_description, $price, $sale_price, $quantity, $category, $sku, $vendor_id, $p_type, $img, $galImg, $tags, $dimension, $exercept,$viewed, $date,$status, $id);
            //executing insert query
            if (mysqli_stmt_execute($productQ__p)) {
                //checking attribute is present
                if ($p_type == 'attribute' || $p_type == 'variation') {
                    //inserting attributes
                    $attributeCheck = fetchOtherdetails($con, 'product_attributes', 'product_id', $id);
                    if (mysqli_num_rows($attributeCheck) > 0) {
                        $upd_attr = mysqli_prepare($con, "UPDATE `product_attributes` SET `attribute` = ?, `attribute_value` = ? WHERE `product_id` = ?");
                    } else {
                        $upd_attr = mysqli_prepare($con, "INSERT INTO `product_attributes`(`attribute`, `attribute_value`, `product_id`) VALUES(?,?,?)");
                    }

                    mysqli_stmt_bind_param($upd_attr, 'sss', $attr_name, $attr_value, $id);
                    //executing attributes
                    if (mysqli_stmt_execute($upd_attr)) {
                        //variation if starts here
                        if ($p_type == 'variation') {
                            $variation_check = fetchOtherdetails($con, 'product_variations', 'product_id', $id);
                            if (mysqli_num_rows($variation_check) > 0) {
                                $update_variation = mysqli_prepare($con, "UPDATE `product_variations` SET `variations` = ? WHERE `product_id` = ?");
                            } else {
                                $update_variation = mysqli_prepare($con, "INSERT INTO `product_variations`( `variations`, `product_id`) VALUES (?,?)");
                            }

                            mysqli_stmt_bind_param($update_variation, 'ss', $actualVariationData, $id);
                            if (mysqli_stmt_execute($update_variation)) {
?>
                                <script>
                                    window.location.href = '?id=<?= base64_encode($id) ?>&screen=<?= base64_encode('success') ?>&msg= <?= base64_encode('the product ' . $p__name . ' is updated and attribute are also saved and variation are also saved.go and check the product is updated as per your action') ?>';
                                </script>
                            <?php
                            }
                        }
                        //variation if starts here
                        else {
                            $variation_check = fetchOtherdetails($con, 'product_variations', 'product_id', $id);
                            if (mysqli_num_rows($variation_check) > 0) {
                                $del_qry  = mysqli_prepare($con, "DELETE FROM `product_variations` WHERE `product_id` = ?");
                                mysqli_stmt_bind_param($del_qry, 's', $id);
                                mysqli_stmt_execute($del_qry);
                            }
                            ?>
                            <script>
                                window.location.href = '?id=<?= base64_encode($id) ?>&screen=<?= base64_encode('success') ?>&msg=<?= base64_encode('the product ' . $p__name . ' is updated and attribute are also saved.go and check the product is updated as per your action') ?>';
                            </script>
                    <?php
                        }
                        //variation else ends here
                    }
                }
                //checking attribute if ends here
                else {
                    //for attribute
                    $attributeCheck = fetchOtherdetails($con, 'product_attributes', 'product_id', $id);
                    if (mysqli_num_rows($attributeCheck) > 0) {
                        $del_attr_qry  = mysqli_prepare($con, "DELETE FROM `product_attributes` WHERE `product_id` = ?");
                        mysqli_stmt_bind_param($del_attr_qry, 's', $id);
                        mysqli_stmt_execute($del_attr_qry);
                    }
                    //for variation
                    $variation_check = fetchOtherdetails($con, 'product_variations', 'product_id', $id);
                    if (mysqli_num_rows($variation_check) > 0) {
                        $del_qry  = mysqli_prepare($con, "DELETE FROM `product_variations` WHERE `product_id` = ?");
                        mysqli_stmt_bind_param($del_qry, 's', $id);
                        mysqli_stmt_execute($del_qry);
                    }
                    ?>
                    <script>
                        window.location.href = '?id=<?= base64_encode($id) ?>&screen=<?= base64_encode('success') ?>&msg=<?= base64_encode('the product ' . $p__name . ' is updated go and check the product is updated as per your action') ?>';
                    </script>
        <?php
                }
                //checking attribute else ends here
            }




            //query for uploading ends here products ***********/




        } else {
            echo "<script>alert('sale price should less than regular price');window.location.href=''</script>";
        }
    } else {
        echo "<script>alert('title,description,price,category are important to enter');window.location.href=''</script>";
    }
    //isset sub close bracket
}

//this is isset screen 


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
