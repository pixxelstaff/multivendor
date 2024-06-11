<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=divice-width, initial-scale=1" />
  <title>HOME</title>
  <?php include('include/links.php'); ?>

</head>

<body>
  <?php include('include/header.php'); ?>

  <div class="container-fluid p-0" id="banner">
    <div class="owl-carousel owl-theme">
      <div class="item slides-div">
        <img src="images/dashboard-img/banner-3.jpg" alt="">
      </div>
      <div class="item slides-div">
        <img src="images/dashboard-img/banner-2.webp" alt="">
      </div>
      <div class="item slides-div">
        <img src="images/dashboard-img/banner-4.jpg" alt="">
      </div>
      <div class="item slides-div">
        <img src="images/dashboard-img/banner-5.jpg" alt="">
      </div>


    </div>
  </div>
  <!-- /*category div*/ -->
  <div class="container-fluid cat-slider">
    <div class="container">
      <div class="row">
        <div class="col-12" id="category-slider">
          <div class="owl-carousel owl-theme">

            <?php
            $categoryinfo = "SELECT * FROM `category` ORDER BY `Id` DESC LIMIT 10";
            $categoryinfo_p = mysqli_prepare($con, $categoryinfo);

            // Bind parameters and execute the statement
            mysqli_stmt_execute($categoryinfo_p);

            // Get the result set
            $categoryData = mysqli_stmt_get_result($categoryinfo_p);

            while ($catShow = mysqli_fetch_assoc($categoryData)) {
            ?>
              <div class="item category-wrapper">
                <div class="category-image">
                  <img src="images/uploadimg/<?= $catShow['image']; ?>" alt="">
                </div>
                <p class="cat-title"><?= $catShow['name'] ?> <span class="category-p-count">(12)</span></p>
              </div>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- important data div -->
  <!--<div class="container-fluid icon-wrapper">-->
  <!--  <div class="container">-->
  <!--    <div class="row">-->

  <!--      <div class="col-lg-3 col-md-6 col-sm-12 my-4 d-flex flex-wrap gap-1">-->
  <!--        <div class="col-3 icon-div d-flex align-items-start justify-content-center">-->
  <!--          <span class="material-symbols-outlined">-->
  <!--            credit_card-->
  <!--          </span>-->
  <!--        </div>-->
  <!--        <div class="col-8 icon-text">-->
  <!--          <h6>Payment and delivery</h6>-->
  <!--          <p>Delivered,when you receive</p>-->
  <!--        </div>-->
  <!--      </div>-->

  <!--      <div class="col-lg-3 col-md-6 col-sm-12 my-4 d-flex flex-wrap gap-1">-->
  <!--        <div class="col-3 icon-div d-flex align-items-start justify-content-center">-->
  <!--          <span class="material-symbols-outlined">-->
  <!--            support_agent-->
  <!--          </span>-->
  <!--        </div>-->
  <!--        <div class="col-8 icon-text">-->
  <!--          <h6>Support 24/7</h6>-->
  <!--          <p>Shop with an expert</p>-->
  <!--        </div>-->
  <!--      </div>-->

  <!--      <div class="col-lg-3 col-md-6 col-sm-12 my-4 d-flex flex-wrap gap-1">-->
  <!--        <div class="col-3 icon-div d-flex align-items-start justify-content-center">-->
  <!--          <span class="material-symbols-outlined">-->
  <!--            local_shipping-->
  <!--          </span>-->
  <!--        </div>-->
  <!--        <div class="col-8 icon-text">-->
  <!--          <h6>Free shipping</h6>-->
  <!--          <p>From all order over %100</p>-->
  <!--        </div>-->
  <!--      </div>-->

  <!--      <div class="col-lg-3 col-md-6 col-sm-12 my-4 d-flex flex-wrap gap-1">-->
  <!--        <div class="col-3 icon-div d-flex align-items-start justify-content-center">-->
  <!--          <span class="material-symbols-outlined">-->
  <!--            deployed_code_update-->
  <!--          </span>-->
  <!--        </div>-->
  <!--        <div class="col-8 icon-text">-->
  <!--          <h6>Return product</h6>-->
  <!--          <p>Retail,a return process</p>-->
  <!--        </div>-->
  <!--      </div>-->

  <!--    </div>-->

  <!--  </div>-->
  <!--</div>-->
  <!-- product div starts here -->
  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col-12 my-4">
          <h2 class="featured-heading">
            Latest Products
          </h2>
        </div>
        <?php
        //code for product fetching
        $prd_sts = '1';
        $productLimit =  12;
        $products = mysqli_prepare($con, "SELECT * FROM `product` WHERE `approve` = ?  ORDER BY `id` DESC LIMIT $productLimit");
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
              <div class="col-lg-3 col-md-6 col-sm-12 product-wrapper">
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
                  ?>
                    <span class="d-none" id="<?= $prd_id . '-' . $id__rand ?>">1</span>
                    <a href="javascript:void(0)" class="product-action-btn" data-product-id='<?= $prd_id ?>' data-product-type='<?= $prd_type ?>' data-q-id=<?= $prd_id . '-' . $id__rand ?>>add to cart </a>
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
                      <span class="cross-val"> <?=   $prd_price ?>pkr</span>
                      <span class="p_actaul_price"><?=   $prd_sale_price; ?>pkr</span>
                    <?php
                    } else { ?> <span class="p_actaul_price"><?=   $prd_price; ?>pkr</span> <?php }
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

                                                                                                echo   $filter_min_price . 'pkr  - ' .   $filter_max_price.'pkr';
                                                                                              } else {
                                                                                                if (!empty($variation_product_sale_price[0])) {
                                                                                              ?>
                          <span class="cross-val">$<?= $variation_product_price[0] ?></span>
                          <span class="p_actaul_price">$<?= $variation_product_sale_price[0] ?></span>
                        <?php
                                                                                                } else {
                        ?>
                          <span class="p_actaul_price">$<?= $variation_product_price[0] ?></span>
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
    </div>
  </div>

  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col-12 my-4">
          <h2 class="featured-heading">
            Latest Services
          </h2>
        </div>
        <?php

        $ser_sts = '1';
        $serviceLimit =  9;
        $services = mysqli_prepare($con, "SELECT * FROM `service` WHERE `status` = ?  ORDER BY `Id` DESC LIMIT $serviceLimit");
        mysqli_stmt_bind_param($services, 's', $ser_sts);
        if (mysqli_stmt_execute($services)) {
          $s__response = mysqli_stmt_get_result($services);
          while ($ser__data = mysqli_fetch_assoc($s__response)) {
        ?>
            <div class="col-lg-4 col-md-6 col-sm-12 ">
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

                    if ($ser__data['slot'] != '1') {
                    ?>
                      <a href='javascript:void(0)' class="s-add-cart" data-service-id='<?= $ser__data['Id']  ?>'>
                        <span class="material-symbols-outlined">
                          local_mall
                        </span>
                        Add to cart
                      </a>
                    <?php
                    } else {
                    ?>
                      <a href='service.php?id=<?= $ser__data['Id'] ?>' class="s-add-cart">
                        Select options
                      </a>
                    <?php
                    }
                    ?>


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


  <?php include('include/footer.php'); ?>


  <div id="multiVendor-toast" class="m-toast"></div>
  <!-- /*this is code for cart*/ -->


  <?php include('include/cartsection.php'); ?>
  <?php include('include/script.php'); ?>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


  <script src="assets/js/index.js"></script>



</body>

</html>