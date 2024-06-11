<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=divice-width, initial-scale=1" />
  <title>Service || (shopping)</title>
  <?php include('include/links.php'); ?>
  <link rel="stylesheet" href="assets/css/shop-page.css">
  <?php
  $ser_sts = '1';
  $serviceLimit =  9;
  $main_service_qry = mysqli_prepare($con, "SELECT COUNT(*) AS 'ser_count' FROM `service` WHERE `status` = ?");
  mysqli_stmt_bind_param($main_service_qry, 's', $ser_sts);
  if (mysqli_stmt_execute($main_service_qry)) {
    $count_res = mysqli_stmt_get_result($main_service_qry);
    $totalServiceNo = mysqli_fetch_assoc($count_res)['ser_count'];
  }
  $page = isset($_GET['page']) ? $_GET['page'] : 1;
  $totalPage = ceil($totalServiceNo / $serviceLimit);
  if (!is_numeric($page) || $page < 1 || $page > $totalPage) {
  ?>
    <script>
      window.location.href = '404.php'
    </script>
  <?php
  }
  $offset = $serviceLimit * ($page - 1);
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
            </a> > <a href="">service</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid shop-grid">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-12 col-sm-12">
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
              <a href="javascript:void(0)"><i class="fa-solid fa-angle-down"></i></a>
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


        </div>
        <div class="col-lg-9 col-md-12 col-sm-12">
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


            $services = mysqli_prepare($con, "SELECT * FROM `service` WHERE `status` = ?  ORDER BY `Id` DESC LIMIT $serviceLimit OFFSET $offset");
            mysqli_stmt_bind_param($services, 's', $ser_sts);
            if (mysqli_stmt_execute($services)) {
              $s__response = mysqli_stmt_get_result($services);
              while ($ser__data = mysqli_fetch_assoc($s__response)) {
            ?>
                <div class="col-lg-4 col-md-6 col-sm-12 p-1">
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
                            select option
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
          <?php include('include/pagination.php'); ?>

        </div>


      </div>
    </div>
  </div>

  <div id="multiVendor-toast" class="m-toast"></div>


  <?php include('include/footer.php'); ?>
  <?php include('include/cartsection.php'); ?>

  <?php include('include/script.php'); ?>

  <script src="assets/js/index.js"></script>


</body>

</html>