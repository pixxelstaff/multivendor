<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=divice-width, initial-scale=1" />
    <title>Shop || (shopping)</title>
    <?php include('include/links.php'); ?>
    <link rel="stylesheet" href="assets/css/shop-page.css">
    <?php
    $prd_sts = '1';
    $productLimit =  12;
    $main_product_qry = mysqli_prepare($con, "SELECT COUNT(*) AS 'prd_count' FROM `product` WHERE `approve` = ?");
    mysqli_stmt_bind_param($main_product_qry, 's', $prd_sts);
    if (mysqli_stmt_execute($main_product_qry)) {
        $count_res = mysqli_stmt_get_result($main_product_qry);
        $totalProductNo = mysqli_fetch_assoc($count_res)['prd_count'];
    }
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $totalPage = ceil($totalProductNo / $productLimit);
    if (!is_numeric($page) || $page < 1 || $page > $totalPage) {
    ?>
        <script>
            window.location.href = '404.php'
        </script>
    <?php
    }
    $offset = $productLimit * ($page - 1);
    $view = isset($_GET['view']) ? $_GET['view'] : 'grid';
    ?>
</head>

<body>
    <?php include('include/header.php'); ?>

    <div class="shop-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="sh-crumbs d-flex justify-content-center align-items-center">
                        <a href="index.php">
                            <i class="fa-solid fa-house"></i>
                        </a> > <a href="">Shop</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid shop-grid">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12 shop-filter-col">
                    <div class="filter-wrapper col-12">
                        <div class="filter-head col-12" data-id='search-filter'>
                            <span class="filter-label"> search product</span>
                            <a href="javascript:void(0)"><i class="fa-solid fa-angle-down"></i></a>
                        </div>
                        <div class="filter-body col-12" id="search-filter">
                            <div class="col-12 d-flex search-box">
                                <form action="" method="post" class="w-100">
                                    <input type="search" name="" class="filter-field" id="" placeholder="search product here">
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="filter-wrapper col-12 mt-4">
                        <div class="filter-head col-12" data-id='type-filter'>
                            <span class="filter-label"> Filter by product type</span>
                            <a href="javascript:void(0)"><i class="fa-solid fa-angle-down"></i></a>
                        </div>
                        <div class="filter-body col-12" id="type-filter">
                            <div class="col-12 d-flex category-div">
                                <input type="checkbox" name="type[]" id="cat-01">
                                <label for="cat-01">simple</label>
                            </div>
                            <div class="col-12 d-flex category-div">
                                <input type="checkbox" name="type[]" id="cat-01">
                                <label for="cat-01">attribute</label>
                            </div>
                            <div class="col-12 d-flex category-div">
                                <input type="checkbox" name="type[]" id="cat-01">
                                <label for="cat-01">variation</label>
                            </div>
                        </div>

                    </div>
                    <div class="filter-wrapper col-12 mt-4">
                        <div class="filter-head col-12" data-id='category-filter'>
                            <span class="filter-label"> Filter by category</span>
                            <a href="javascript:void(0)" class="filters-head" data-id="category-filter"><i class="fa-solid fa-angle-down"></i></a>
                        </div>
                        <div class="filter-body col-12 " id="category-filter">
                            <div class="col-12 d-flex category-div">
                                <input type="checkbox" name="category[]" id="cat-01">
                                <label for="cat-01">electronics</label>
                            </div>
                            <div class="col-12 d-flex category-div">
                                <input type="checkbox" name="category[]" id="cat-01">
                                <label for="cat-01">appliances</label>
                            </div>
                            <div class="col-12 d-flex category-div">
                                <input type="checkbox" name="category[]" id="cat-01">
                                <label for="cat-01">shirts</label>
                            </div>
                            <div class="col-12 d-flex category-div">
                                <input type="checkbox" name="category[]" id="cat-01">
                                <label for="cat-01">grocery</label>
                            </div>
                            <div class="col-12 d-flex category-div">
                                <input type="checkbox" name="category[]" id="cat-01">
                                <label for="cat-01">lighting</label>
                            </div>
                            <div class="col-12 d-flex category-div">
                                <input type="checkbox" name="category[]" id="cat-01">
                                <label for="cat-01">technology</label>
                            </div>
                            <div class="col-12 d-flex category-div">
                                <input type="checkbox" name="category[]" id="cat-01">
                                <label for="cat-01">real state</label>
                            </div>
                            <div class="col-12 d-flex category-div">
                                <input type="checkbox" name="category[]" id="cat-01">
                                <label for="cat-01">telecommunication</label>
                            </div>

                        </div>

                    </div>
                    <!-- <div class="filter-wrapper col-12 mt-4">
            <div class="filter-head col-12" data-id='search-filter'>
              <span class="filter-label"> Filter by Tags</span>
              <a href="javascript:void(0)"><i class="fa-solid fa-angle-down"></i></a>
            </div>
            <div class="filter-body col-12 mt-2" id="category-filter">
              <div class="col-12 d-flex tags-div flex-wrap">
                <a href="">cheap</a>
                <a href="">electronics</a>
                <a href="">tech product</a>
                <a href="">luxuxry products</a>
                <a href="">trending</a>
                <a href="">lastest</a>
                <a href="">shirt products</a>
                <a href="">men wear</a>
                <a href="">popular</a>
              </div>

            </div>
          </div> -->

                </div>
                <div class="col-lg-9 col-md-12 col-sm-12 shop-filter-col">
                    <div class="col-12 extra-opts d-flex justify-content-between align-items-center">
                        <div class="col-3 sort-wrapper">
                            <select name="" id="">
                                <option value="">select value</option>
                                <option value="">sort by (A to Z)</option>
                                <option value="">sort by (Z to A)</option>
                                <option value="">low to high price</option>
                                <option value="">high to low price</option>
                                <option value="">sort by ascending</option>
                                <option value="">sort by descending</option>
                            </select>
                        </div>
                        <div class="col-2 d-flex icons-box justify-content-end">
                            <a href="?<?= isset($_GET['page']) ? 'page=' . $_GET['page'] . '&' : ""  ?>view=list" class="<?= $view == 'list' ? 'active-icon-anc' : '' ?>">
                                <span class="material-symbols-outlined">
                                    view_list
                                </span>
                            </a>
                            <a href="?<?= isset($_GET['page']) ? 'page=' . $_GET['page'] . '&' : ""  ?>view=grid" class="<?= $view == 'grid' ? 'active-icon-anc' : '' ?>">
                                <span class="material-symbols-outlined">
                                    grid_view
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        //code for product fetching
                        $products = mysqli_prepare($con, "SELECT * FROM `product` WHERE `approve` = ?  ORDER BY `id` DESC LIMIT $productLimit OFFSET $offset");
                        mysqli_stmt_bind_param($products, 's', $prd_sts);
                        if (mysqli_stmt_execute($products)) {
                            $p__response = mysqli_stmt_get_result($products);
                            if (mysqli_num_rows($p__response) > 0) {
                                while ($prd = mysqli_fetch_assoc($p__response)) {
                                    $prd_id = $prd['id'];
                                    $prd_title = dec_function($prd['name']);
                                    $prd_type = $prd['product_type'];
                                    $prd_price = $prd['price'];
                                    $prd_sale_price = $prd['sale_price'];
                                    $prd_category = explode(',', $prd['category']);
                                    $prd_featured_image = $prd['featured_image'];
                                    if (!empty($prd['gallery_image'])) {
                                        $prd_gallery_image =  explode(',', $prd['gallery_image'])[0];
                                    } else {
                                        $prd_gallery_image = '';
                                    }

                        ?>
                                    <div class="col-lg-4 col-md-6 col-sm-12 product-wrapper">
                                        <div class="image-wrapper">
                                            <!-- image 1 data -->
                                            <!-- checking there is image or not -->
                                            <img src="images/uploadimg/<?= !empty($prd_featured_image) ? $prd_featured_image : 'down.webp' ?>" alt="" class="<?= !empty($prd_gallery_image) ? 'product-img1' : '' ?>">
                                            <!-- checking gallery image is present or not -->
                                            <?php
                                            $id__rand = rand(1, 1000000);
                                            if (!empty($prd_gallery_image)) {
                                            ?>
                                                <img src="images/uploadimg/<?= $prd_gallery_image ?>" alt="" class="product-img2">
                                            <?php
                                            }
                                            if ($prd['product_type'] == 'attribute' || $prd['product_type'] == 'variation') {
                                            ?>
                                                <a href="product.php?id=<?= $prd_id ?>" class="product-action-btn">
                                                    select options
                                                </a>
                                            <?php
                                            } else {
                                                $id__rand = rand(1, 100000);
                                            ?>
                                                <!-- //taking it as product quantity holder -->
                                                <span class="d-none" id="<?= $prd_id . '-' . $id__rand ?>">1</span>
                                                <a href="javascript:void(0)" class="product-action-btn " data-product-id='<?= $prd_id ?>' data-product-type='<?= $prd_type ?>' data-q-id=<?= $prd_id . '-' . $id__rand ?>>add to cart</a>
                                            <?php
                                            }
                                            ?>

                                        </div>
                                        <h6 class="product-title"><a class="norm-anc" href="product.php?id=<?= $prd_id ?>"><?= $prd_title ?></a></h6>
                                        <p class="product-category">
                                            <?php
                                            foreach ($prd_category as $cat_val) {
                                                $fetch__category = fetchOtherdetails($con, 'category', 'Id', $cat_val);
                                                echo "<a class='norm-anc' href='shop.php?category-id=$cat_val'>" . mysqli_fetch_assoc($fetch__category)['name'] . "</a>";
                                            }
                                            ?>
                                        </p>
                                        <div class="product-rating-div" data-rating='3.5'>
                                            <a href="javascript:void(0)" class="rating-icon"><i class="fa-solid fa-star"></i></a>
                                            <a href="javascript:void(0)" class="rating-icon"><i class="fa-solid fa-star"></i></a>
                                            <a href="javascript:void(0)" class="rating-icon"><i class="fa-solid fa-star"></i></a>
                                            <a href="javascript:void(0)" class="rating-icon"><i class="fa-solid fa-star"></i></a>
                                            <a href="javascript:void(0)" class="rating-icon"><i class="fa-solid fa-star"></i></a>
                                        </div>
                                        <!-- half star -->
                                        <p class="product-price">
                                            <?php
                                            if ($prd['product_type'] != 'variation') {
                                                if (!empty($prd_sale_price)) {
                                            ?>
                                                    <span class="cross-val"> <?= $prd_price . 'pkr'; ?></span>
                                                    <span class="p_actaul_price"><?= $prd_sale_price . 'pkr'; ?></span>
                                                <?php
                                                } else { ?> <span class="p_actaul_price"><?= $prd_price . 'pkr'; ?></span> <?php }
                                                                                                                    } else {
                                                                                                                        $fetch_variation_data = fetchOtherdetails($con, 'product_variations', 'product_id', $prd_id);
                                                                                                                        while ($sh_var = mysqli_fetch_assoc($fetch_variation_data)) {
                                                                                                                            $variation_data =  json_decode($sh_var['variations'], true);
                                                                                                                            $variation_product_price = array_column($variation_data, 'variation_price');
                                                                                                                            $variation_product_sale_price = array_column($variation_data, 'variation_sale_price');

                                                                                                                            if (count($variation_product_price) > 1) {
                                                                                                                                $min_var_price = min($variation_product_price);
                                                                                                                                $max_var_price = max($variation_product_price);
                                                                                                                                //searching there index also so that we get there corresponding index 
                                                                                                                                $min_pr_indx = array_search($min_var_price, $variation_product_price);
                                                                                                                                $max_pr_indx = array_search($max_var_price, $variation_product_price);
                                                                                                                                if (!empty($variation_product_sale_price[$min_pr_indx])) {
                                                                                                                                    $filter_min_price = $variation_product_sale_price[$min_pr_indx];
                                                                                                                                } else {
                                                                                                                                    $filter_min_price = $min_var_price;
                                                                                                                                }
                                                                                                                                // for max values
                                                                                                                                if (!empty($variation_product_sale_price[$max_pr_indx])) {
                                                                                                                                    $filter_max_price = $variation_product_sale_price[$max_pr_indx];
                                                                                                                                } else {
                                                                                                                                    $filter_max_price = $min_var_price;
                                                                                                                                }

                                                                                                                                echo $filter_min_price . 'pkr' . ' - ' . $filter_max_price . 'pkr';
                                                                                                                            } else {
                                                                                                                                if (!empty($variation_product_sale_price[0])) {
                                                                                                                            ?>
                                                            <span class="cross-val"><?= $variation_product_price[0] ?>pkr</span>
                                                            <span class="p_actaul_price"><?= $variation_product_sale_price[0] ?>pkr</span>
                                                        <?php
                                                                                                                                } else {
                                                        ?>
                                                            <span class="p_actaul_price"><?= $variation_product_price[0] ?>pkr</span>
                                            <?php
                                                                                                                                }
                                                                                                                            }
                                                                                                                        }
                                                                                                                    } ?>
                                        </p>
                                    </div>
                                <?php
                                }
                            } else {
                                ?> <h2>no product is upload yet</h2> <?php
                                                                    }
                                                                }
                                                                        ?>





                    </div>
                    <?php include('include/pagination.php'); ?>

                </div>
            </div>
        </div>
    </div>
    </div>
    <?php include('include/footer.php'); ?>
    <div id="multiVendor-toast" class="m-toast"></div>

    <?php include('include/cartsection.php'); ?>
    <?php include('include/script.php'); ?>

    <script src="assets/js/index.js"></script>


</body>

</html>