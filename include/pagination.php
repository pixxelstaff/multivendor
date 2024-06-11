<div class="col-12 pagination-wrap d-flex justify-content-end mt-4 py-2">
            <div class="col-4 pagination-box d-flex gap-2 justify-content-end">
              <?php
              if ($page > 1) {
              ?>
                <a href="?page=<?= $page - 1 ?><?= "&view=" . $view ?>" class="page-btn page-prev">
                  <span class="material-symbols-outlined">
                    arrow_back
                  </span>
                </a>
              <?php
              }
              if ($page > 2) {
              ?> <a href="?page=1<?= "&view=" . $view ?>" class="page-btn">1</a> <?php
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
                ?> <a href="?page=<?= $i ?><?= "&view=" . $view ?>
                                " class="page-btn <?php echo $page == $i ?  'active-page' : '' ?> "><?= $i ?></a> <?php

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
                ?> <a href="?page=<?= $totalPage ?><?= "&view=" . $view ?>" class="page-btn"><?= $totalPage ?></a> <?php
                                                                                                                                                            }


                                                                                                                                                            if ($page < $totalPage) {
                                                                                                                                                              ?>
                <a href="?page=<?= $page + 1 ?><?= "&view=" . $view ?>" class="page-btn page-next">
                  <span class="material-symbols-outlined">
                    arrow_forward
                  </span>
                </a>
              <?php
                                                                                                                                                            }
              ?>

            </div>
          </div>