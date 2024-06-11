<?php
$unviewed = fetchOtherdetails($con, 'vendor', 'viewed', '0');
$unviewed_vendor = fetchOtherdetailsCol3($con, 'vendor', 'viewed', '0', 'approved', '1', 'trash', '');
$unviewed_suspended_vendor = fetchOtherdetailsCol3($con, 'vendor', 'viewed', '0', 'approved', '-2', 'trash', '');
$unviewed_terminated_vendor = fetchOtherdetailsCol3($con, 'vendor', 'viewed', '0', 'approved', '-1', 'trash', '');
$unviewed_un_approve_vendor = fetchOtherdetailsCol2($con, 'vendor', 'viewed', '0', 'approved', '0');
$unviewed_trash_vendor = fetchOtherdetailsCol2($con, 'vendor', 'viewed', '0', 'trash', '-1');

//for orders



$unviewed_orders = fetchOtherdetails($con, 'order', 'viewed', '0');
$un_viewed_trashed_orders = fetchCol2DetailsWithNot($con, 'order', 'viewed', '0', 'trash', '-1');
$unviewd_product_order = fetchCol3DetailsWithNot($con, 'order_items', 'item_type', 'product', 'admin_view', '0', 'admin_trash', '-1');
$unviewd_service_order = fetchCol3DetailsWithNot($con, 'order_items', 'item_type', 'service', 'admin_view', '0', 'admin_trash', '-1');

// for products

$unviewed_products = fetchOtherdetails($con, 'product', 'viewed', '0');
$total_unviewed_approve_products =  fetchOtherdetailsCol2($con, 'product', 'viewed', '0', 'approve', '1');
$total_unapprove_unviewed_products = fetchCol3DetailsWithNot($con, 'product', 'viewed', '0', 'approve', '0','trash','-1');
$total_unapprove_p = fetchCol2DetailsWithNot($con, 'product', 'approve', '0','trash','-1');
$total_trash_product = fetchOtherdetails($con, 'product', 'trash', '-1');

//for service
$unviewed_services = fetchOtherdetails($con, 'service', 'viewed', '0');
$total_unviewed_approve_service =  fetchOtherdetailsCol2($con, 'service', 'viewed', '0', 'status', '1');
$total_unapprove_unviewed_service = fetchCol3DetailsWithNot($con, 'service', 'viewed', '0', 'trash', '','status','1');
$total_trash_service = fetchOtherdetails($con, 'service', 'trash', '-1');


?>



<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0 text-center" href="index.php " target="_blank">
      <img src="../assets/bootstrap/img/logo.webp" class="navbar-brand-img h-100" alt="main_logo">
      <!-- <span class="ms-1 font-weight-bold">Argon Dashboard 2</span> -->
    </a>
  </div>
  <hr class="horizontal dark mt-0">
  <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link page-link" href="index.php">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <span class="material-symbols-outlined">
              dashboard
            </span>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link page-link" href="analytics.php">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <span class="material-symbols-outlined">
              bar_chart
            </span>
          </div>
          <span class="nav-link-text ms-1">Analytics</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link page-link dp-parent" href="javascript:void(0)" data-id="vendor-dp-p">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <span class="material-symbols-outlined">
              storefront
            </span>
          </div>
          <span class="nav-link-text ms-1">Vendor
            <?php
            if (mysqli_num_rows($unviewed_products) > 0) {
            ?>
              <sup class="side-sub"> <?= mysqli_num_rows($unviewed) ?> </sup>
            <?php
            }
            ?>

            <span class="material-symbols-outlined ex-more">
              expand_more
            </span>
        </a>
      </li>
      <div class="sidebar-dropDown" id="vendor-dp-p">
        <ul>
          <li>
            <a href='vendor-list.php' class="sub-anc">
              <span class="material-symbols-outlined">
                list_alt
              </span>
              <span>Vendor list </span>

              <?php
              if (mysqli_num_rows($unviewed_vendor) > 0) {
              ?>
                <sup class="side-mini-sub"> <?= mysqli_num_rows($unviewed_vendor) ?> </sup>
              <?php
              }
              ?>

            </a>
          </li>
          <li>
            <a href='suspended.php' class="sub-anc">
              <span class="material-symbols-outlined">
                unpublished
              </span>

              <span>suspended vendor <?php
                                      if (mysqli_num_rows($unviewed_suspended_vendor) > 0) {
                                      ?>
                  <sup class="side-mini-sub bg-warning"> <?= mysqli_num_rows($unviewed_suspended_vendor) ?> </sup>
                <?php
                                      }
                ?></span>

            </a>
          </li>
          <li>
            <a href='terminated.php' class="sub-anc">
              <span class="material-symbols-outlined">
                account_circle_off
              </span>


              <span>terminated <?php
                                if (mysqli_num_rows($unviewed_terminated_vendor) > 0) {
                                ?>
                  <sup class="side-mini-sub bg-danger"> <?= mysqli_num_rows($unviewed_terminated_vendor) ?> </sup>
                <?php
                                }
                ?> </span>

            </a>
          </li>

          <li>
            <a href='app-vendor.php' class="sub-anc">
              <span class="material-symbols-outlined">
                verified
              </span>
              <span>vendor approve <?php
                                    if (mysqli_num_rows($unviewed_un_approve_vendor) > 0) {
                                    ?>
                  <sup class="side-mini-sub bg-success"> <?= mysqli_num_rows($unviewed_un_approve_vendor) ?> </sup>
                <?php
                                    }
                ?> </span>


            </a>
          </li>

          <li>
            <a href='vendor-trash.php' class="sub-anc">
              <span class="material-symbols-outlined">
                delete
              </span>
              <span>Trash <?php
                          if (mysqli_num_rows($unviewed_trash_vendor) > 0) {
                          ?>
                  <sup class="side-mini-sub bg-dark "> <?= mysqli_num_rows($unviewed_trash_vendor) ?> </sup>
                <?php
                          }
                ?> </span>


            </a>
          </li>
        </ul>
      </div>
      <li class="nav-item">
        <a class="nav-link page-link dp-parent" href="javascript:void(0)" data-id="product-p">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <span class="material-symbols-outlined">
              deployed_code
            </span>
          </div>
          <span class="nav-link-text ms-1">product
            <?php
            if (mysqli_num_rows($unviewed_products) > 0) {
            ?>
              <sup class="side-sub"> <?= mysqli_num_rows($unviewed_products) ?> </sup>
            <?php
            }
            ?>
          </span>
          <span class="material-symbols-outlined ex-more">
            expand_more
          </span>
        </a>
      </li>
      <div class="sidebar-dropDown" id="product-p">
        <ul>
          <li>
            <a href='product.php' class="sub-anc">
              <span class="material-symbols-outlined">
                list_alt
              </span>
              <span>
                Product
                <?php
                if (mysqli_num_rows($total_unviewed_approve_products) > 0) {
                ?>
                  <sup class="side-mini-sub bg-success"> <?= mysqli_num_rows($total_unviewed_approve_products) ?> </sup>
                <?php
                }
                ?>
              </span>
            </a>
          </li>
          <li>
            <a href='add-product.php' class="sub-anc">
              <span class="material-symbols-outlined">
                package_2
              </span>
              add product

            </a>
          </li>
          <li>
            <a href='category.php' class="sub-anc">
              <span class="material-symbols-outlined">
                grid_view
              </span>
              category
            </a>
          </li>
          <li>
            <a href='approve-products.php' class="sub-anc">
              <span class="material-symbols-outlined">
                verified_user
              </span>
              <?php
              if (mysqli_num_rows($total_unapprove_unviewed_products) > 0) {
              ?>
                <span> Approve product
                  <sup class="side-mini-sub bg-success"> <?= mysqli_num_rows($total_unapprove_unviewed_products) ?> </sup>
                </span>
              <?php
              } else {
              ?>
                <span> Approve product ( <?= mysqli_num_rows($total_unapprove_p) ?> )</span>

              <?php
              }
              ?>

              <span>


              </span>
            </a>
          </li>
          <li>
            <a href='product-trash.php' class="sub-anc">
              <span class="material-symbols-outlined">
                delete
              </span>
              trash (<?= mysqli_num_rows($total_trash_product)  ?>)
            </a>
          </li>
        </ul>
      </div>
      <li class="nav-item">
        <a class="nav-link page-link dp-parent" href="javascript:void(0)" data-id="services">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <span class="material-symbols-outlined">
              settings_b_roll
            </span>
          </div>
          <span class="nav-link-text ms-1">Service

          <?php
                if (mysqli_num_rows($unviewed_services) > 0) {
                ?>
                  <sup class="side-mini-sub"> <?= mysqli_num_rows($unviewed_services) ?> </sup>
                <?php
                }
                ?>
          </span>
          <span class="material-symbols-outlined ex-more">
            expand_more
          </span>
        </a>
      </li>
      <div class="sidebar-dropDown" id="services">
        <ul>
          <li>
            <a href='service.php' class="sub-anc">
              <span class="material-symbols-outlined">
                list_alt
              </span>
              services
              <?php
                if (mysqli_num_rows($total_unviewed_approve_service) > 0) {
                ?>
                  <sup class="side-mini-sub bg-success"> <?= mysqli_num_rows($total_unviewed_approve_service) ?> </sup>
                <?php
                }
                ?>
            </a>
          </li>
          <li>
            <a href='add-service.php' class="sub-anc">
              <span class="material-symbols-outlined">
                trackpad_input
              </span>
              Add Service
            </a>
          </li>
          <li>
            <a href='service-category.php' class="sub-anc">
              <span class="material-symbols-outlined">
                grid_view
              </span>
              category
            </a>
          </li>
          <li>
            <a href='approve-services.php' class="sub-anc">
              <span class="material-symbols-outlined">
                verified_user
              </span>
             

              <span>
              Approve service
              <?php
                if (mysqli_num_rows($total_unapprove_unviewed_service) > 0) {
                ?>
                  <sup class="side-mini-sub bg-success"> <?= mysqli_num_rows($total_unapprove_unviewed_service) ?> </sup>
                <?php
                }
                ?>
              </span>
            </a>
          </li>
          <li>
            <a href='service-trash.php' class="sub-anc">
              <span class="material-symbols-outlined">
                delete
              </span>
              trash <?= mysqli_num_rows($total_trash_service) > 0 ? "(".mysqli_num_rows($total_trash_service).")" : '' ?>
            </a>
          </li>
        </ul>
      </div>
      <li class="nav-item">
        <a class="nav-link page-link dp-parent" href="javascript:void(0)" data-id="location">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <span class="material-symbols-outlined">
              location_on
            </span>
          </div>
          <span class="nav-link-text ms-1">Location</span>
          <span class="material-symbols-outlined ex-more">
            expand_more
          </span>
        </a>
      </li>
      <div class="sidebar-dropDown" id="location">
        <ul>
          <li>
            <a href='location.php' class="sub-anc">
              <span class="material-symbols-outlined">
                add_location_alt
              </span>
              Location
            </a>
          </li>

        </ul>
      </div>
      <li class="nav-item">
        <a class="nav-link page-link dp-parent" href="javascript:void(0)" data-id="order-p">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <span class="material-symbols-outlined">
              inventory
            </span>
          </div>

          <span class="nav-link-text ms-1">Orders <?php
                                                  if (mysqli_num_rows($unviewed_orders) > 0) {
                                                  ?>
              <sup class="side-sub"> <?= mysqli_num_rows($unviewed_orders) ?> </sup>
            <?php
                                                  }
            ?> </span>


          <span class="material-symbols-outlined ex-more">
            expand_more
          </span>
        </a>
      </li>
      <div class="sidebar-dropDown" id="order-p">
        <ul>
          <li>
            <a href='orders.php' class="sub-anc">
              <span class="material-symbols-outlined">
                list_alt
              </span>

              <span>
                Orders
                <?php
                if (mysqli_num_rows($un_viewed_trashed_orders) > 0) {
                ?>
                  <sup class="side-mini-sub bg-success"> <?= mysqli_num_rows($un_viewed_trashed_orders) ?> </sup>
                <?php
                }
                ?>
              </span>
            </a>
          </li>
          <li>
            <a href='product-orders.php' class="sub-anc">
              <span class="material-symbols-outlined">
                view_in_ar
              </span>
              <span>
                Product order
                <?php
                if (mysqli_num_rows($unviewd_product_order) > 0) {
                ?>
                  <sup class="side-mini-sub bg-success"> <?= mysqli_num_rows($unviewd_product_order) ?> </sup>
                <?php
                }
                ?>
              </span>
            </a>
          </li>
          <li>
            <a href='services-orders.php' class="sub-anc">
              <span class="material-symbols-outlined">
                assignment
              </span>
              <span>
                Service order
                <?php
                if (mysqli_num_rows($unviewd_service_order) > 0) {
                ?>
                  <sup class="side-mini-sub bg-success"> <?= mysqli_num_rows($unviewd_service_order) ?> </sup>
                <?php
                }
                ?>
              </span>
            </a>
          </li>
          <li>
            <a href='order-action.php' class="sub-anc">
              <span class="material-symbols-outlined">
                pending_actions
              </span>
              order action
            </a>
          </li>
          <li>
            <a href='item-trash.php' class="sub-anc">
              <span class="material-symbols-outlined">
                restore_from_trash
              </span>
              Trash items
            </a>
          </li>
          <li>
            <a href='order-trash.php' class="sub-anc">
              <span class="material-symbols-outlined">
                delete
              </span>
              trash
            </a>
          </li>
        </ul>
      </div>
      <li class="nav-item">
        <a class="nav-link page-link dp-parent" href="javascript:void(0)" data-id="user-p">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <span class="material-symbols-outlined">
              account_circle
            </span>
          </div>
          <span class="nav-link-text ms-1">User</span>
          <span class="material-symbols-outlined ex-more">
            expand_more
          </span>
        </a>
      </li>
      <div class="sidebar-dropDown" id="user-p">
        <ul>
          <li>
            <a href='users.php' class="sub-anc">
              <span class="material-symbols-outlined">
                list_alt
              </span>

              user
            </a>
          </li>
        </ul>
      </div>


    </ul>
  </div>

</aside>