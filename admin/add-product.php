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

    <link rel="stylesheet" href="../assets/css/script.css">
    <link rel="stylesheet" href="../assets/css/dashboard__responsive.css">
    <!-- <link rel="stylesheet" href="../ckeditor/contents.css"> -->
    <title>
        (add - product) || Lanotte - saloon dashboard
    </title>
    <?php include('include/links.php');
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
                    <h3 class="page-head">add-product</h3>
                    <h6 class="brd-crumbs"><a href="index.php">Dashboard</a>/<a href="">add-product</a></h6>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row p-2">
                        <div class="col-lg-9 col-md-12 col-sm-12 data-column">
                            <div class="col-12 p-inp-div d-flex flex-column p-2">
                                <label for="" class="p-inp-label">Name</label>
                                <input type="text" name="title" class="p-inp-field" placeholder="enter your title here" id="">
                            </div>
                            <div class="col-12 p-inp-div d-flex flex-column p-2">
                                <label for="" class="p-inp-label">description</label>
                                <textarea id="des-editor" name="product_description" class="w-100 p-inp-field" rows="10"></textarea>
                            </div>
                            <div class="col-12 d-flex flex-wrap  multi-row-div">
                                <div class="col-lg-6 col-md-6 col-sm-12  p-inp-div d-flex flex-column p-2">
                                    <label for="" class="p-inp-label">price</label>
                                    <input type="text" name="regular_price" class="p-inp-field" placeholder="regular price" id="">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12  p-inp-div d-flex flex-column p-2">
                                    <label for="" class="p-inp-label">sale price</label>
                                    <input type="text" name="sale_price" class="p-inp-field" placeholder="sale price" id="">
                                </div>
                            </div>
                            <div class="col-12 d-flex flex-wrap multi-row-div">
                                <div class="col-lg-6 col-md-6 col-sm-12 p-inp-div d-flex flex-column p-2">
                                    <label for="" class="p-inp-label">category</label>
                                    <select name="product-category" id="" class="p-inp-field w-100">
                                        <option value="">select category</option>
                                        <?php
                                        $opt = fetchAllData($con, 'category');
                                        while ($sh = mysqli_fetch_assoc($opt)) {
                                            echo "<option value =" . $sh['Id'] . ">" . dec_function($sh['name']) . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 p-inp-div d-flex flex-column p-2">
                                    <label for="" class="p-inp-label">Availability</label>
                                    <select name="stock" id="" class="p-inp-field w-100">
                                        <option value="1">In stock</option>
                                        <option value="0">Out of stock</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-12 d-flex flex-wrap multi-row-div">
                                <div class="col-lg-6 col-md-6 col-sm-12 p-inp-div d-flex flex-column p-2">
                                    <label for="" class="p-inp-label">Quantity</label>
                                    <input type="text" name="quantity" class="p-inp-field" placeholder="product quantity" id="">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 p-inp-div d-flex flex-column p-2">
                                    <label for="" class="p-inp-label">stock keeping unit (sku)</label>
                                    <input type="text" name="sku" class="p-inp-field" placeholder="sku number" id="">
                                </div>
                            </div>
                            <div class="col-12 d-flex flex-wrap multi-row-div">
                                <div class="col-lg-4 col-md-4 col-sm-12 p-inp-div d-flex flex-column p-2">
                                    <label for="" class="p-inp-label">length</label>
                                    <input type="text" name="length" id="" class="p-inp-field" placeholder="in cm">
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 p-inp-div d-flex flex-column p-2">
                                    <label for="" class="p-inp-label">width</label>
                                    <input type="text" name="width" id="" class="p-inp-field" placeholder="in cm">
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 p-inp-div d-flex flex-column p-2">
                                    <label for="" class="p-inp-label">height</label>
                                    <input type="text" name="height" id="" class="p-inp-field" placeholder="in cm">
                                </div>

                            </div>

                            <div class="col-12 d-flex flex-wrap multi-row-div">
                                <div class="col-lg-4 col-md-4 col-sm-12 p-inp-div d-flex align-items-center p-2 gap-2">
                                    <input type="radio" name="type" class="p-type-radio" id="p-type-inp1" value="simple" checked hidden>
                                    <label for="p-type-inp1" class="c-radio active-radio"></label>
                                    <p class="product-type-p">simple product</p>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 p-inp-div d-flex align-items-center p-2 gap-2">
                                    <input type="radio" name="type" class="p-type-radio" id="p-type-inp2" value="attribute" hidden>
                                    <label for="p-type-inp2" class="c-radio"></label>
                                    <p class="product-type-p">attribute product</p>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 p-inp-div d-flex  align-items-center p-2 gap-2">
                                    <input type="radio" name="type" class="p-type-radio" id="p-type-inp3" value="variation" hidden>
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
                            </div>
                            <div class="col-12 p-2" id="var-parent"></div>
                            <div class="col-12 p-inp-div d-flex flex-column p-2">
                                <label for="" class="p-inp-label">product-Excerpt</label>
                                <textarea id="des-editor" class="w-100 p-inp-field" rows="6" name="exercept"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12 media-column">
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
                            <!-- submit btn -->
                            <input type="submit" value="upload product" name="sub" id="submit-btn" class="sub-btn">
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
            <a href="add-product.php" class="close-btn" id="pop-close-btn">
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
    <script src="../assets/js/add-file.js"></script>



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
    $vendor_id = $featured = $viewed = '0';
    $status = '1';
  
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
                $img = '';
            }
            //gallery upload image here
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
            $productQ = "INSERT INTO `product`(`name`, `description`, `price`, `sale_price`, `quantity`, `category`, `sku`, `vendor_id`, `product_type`, `featured_image`, `gallery_image`, `tags`, `dimensions`, `excerpt`,`stock`,`featured`,`viewed`, `date`, `approve`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?)";

            // Prepare the statement
            $productQ__p = mysqli_prepare($con, $productQ);

            // Bind parameters
            mysqli_stmt_bind_param($productQ__p, "sssssssssssssssssss", $title, $sanitize_description, $price, $sale_price, $quantity, $category, $sku, $vendor_id, $p_type, $img, $galImg, $tags, $dimension, $exercept, $stock,$featured,$viewed, $date, $status);
            //executing insert query
            if (mysqli_stmt_execute($productQ__p)) {
                $query = "SELECT LAST_INSERT_ID()";
                $result = mysqli_query($con, $query);
                $insertId = mysqli_fetch_array($result)[0];
                //checking attribute is present
                if ($p_type == 'attribute' || $p_type == 'variation') {
                    //inserting attributes
                    $insert_attr = mysqli_prepare($con, "INSERT INTO `product_attributes`(`attribute`, `attribute_value`, `product_id`) VALUES(?,?,?)");
                    mysqli_stmt_bind_param($insert_attr, 'sss', $attr_name, $attr_value, $insertId);
                    //executing attributes
                    if (mysqli_stmt_execute($insert_attr)) {
                        //variation if starts here
                        if ($p_type == 'variation') {
                            $insert_variation = mysqli_prepare($con, "INSERT INTO `product_variations`( `variations`, `product_id`) VALUES (?,?)");
                            mysqli_stmt_bind_param($insert_variation, 'ss', $actualVariationData, $insertId);
                            if (mysqli_stmt_execute($insert_variation)) {
?>
                                <script>
                                    window.location.href = '?screen=<?= base64_encode('success') ?>&msg= <?= base64_encode('the product is uploaded successfully with attributes and variations ') ?>';
                                </script>
                            <?php
                            }
                        }
                        //variation if starts here
                        else {
                            ?>
                            <script>
                                window.location.href = '?screen=<?= base64_encode('success') ?>&msg=<?= base64_encode('the products is uploaded succesfully with the attributes') ?>';
                            </script>
                    <?php
                        }
                        //variation else ends here
                    }
                }
                //checking attribute if ends here
                else {
                    ?>
                    <script>
                        window.location.href = '?screen=<?= base64_encode('success') ?>&msg=<?= base64_encode('the product is successfully upload and  ready to start sells') ?>';
                    </script>
        <?php
                }
                //checking attribute else ends here
            }


            //query for uploading simple products

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
