<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0 text-center" href=" index.php " target="_blank">
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
        <a class="nav-link page-link dp-parent" href="javascript:void(0)" data-id="order-p">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <span class="material-symbols-outlined">
              inventory
            </span>
          </div>
          <span class="nav-link-text ms-1">Orders</span>
          <span class="material-symbols-outlined ex-more">
            expand_more
          </span>
        </a>
      </li>
      <div class="sidebar-dropDown" id="order-p">
        <ul>
          <li>
            <a href='product-order.php' class="sub-anc">
              <span class="material-symbols-outlined">
                view_in_ar
              </span>
              product order
            </a>
          </li>
          <li>
            <a href='service-order.php' class="sub-anc">
              <span class="material-symbols-outlined">
                assignment
              </span>
              Service order
            </a>
          </li>
        </ul>
      </div>
      <li class="nav-item">
        <a class="nav-link page-link " href="profile.php" data-id="user-p">
          <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <span class="material-symbols-outlined">
              account_circle
            </span>
          </div>
          <span class="nav-link-text ms-1">User</span>
        </a>
      </li>
    </ul>
  </div>

</aside>