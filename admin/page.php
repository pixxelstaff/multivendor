<?php
                            $country_total_result = ceil($country_total_result / $limit);
                            if ($country_total_result < $country_page) {
                            ?>
                                <script>
                                    window.location.href = 'location.php?page=<?= $country_total_result  ?>'
                                </script>
                            <?php
                            }
                            $startNo = 1 + $country_offset;
                            $rangeNo = min(($country_offset * $limit), $country_total_result);
                            ?>
                            <div class="col-12 custom-pagination-wrapper d-flex justify-content-end my-2 px-4 align-items-center">
                                <div class="col-4 cus-pagination d-flex justify-content-end">
                                    <div class="page-num-wrapper d-flex gap-2">
                                        <?php
                                        if ($country_page > 1) {
                                        ?>
                                            <a href="?country=<?= $country_page - 1 ?>&city=<?= $city_page ?>&area=<?= $area_page ?>" class="page-btn page-prev">
                                                <span class="material-symbols-outlined">
                                                    arrow_back
                                                </span>
                                            </a>
                                        <?php
                                        }
                                        if ($country_page > 2) {
                                        ?> <a href="?country=1&city=<?= $city_page ?>&area=<?= $area_page ?>" class="page-btn">1</a> <?php
                                                                                                                                        if ($country_page > 3) {   ?>
                                                <a href="javascript:void(0)" class="page-btn page-dots">
                                                    <span class="material-symbols-outlined">
                                                        page_control
                                                    </span>
                                                </a>
                                            <?php
                                                                                                                                        }
                                                                                                                                    }

                                                                                                                                    for ($i = $country_page - 1; $i <= $country_page + 1; $i++) {
                                                                                                                                        if ($i < 1) {
                                                                                                                                            continue;
                                                                                                                                        }
                                                                                                                                        if ($i > $country_total_result) {
                                                                                                                                            continue;
                                                                                                                                        }
                                            ?> <a href="?country=<?= $i ?>&city=<?= $city_page ?>&area=<?= $area_page ?>
                                " class="page-btn <?php echo $country_page == $i ?  'active-page' : '' ?> "><?= $i ?></a> <?php

                                                                                                                                    }
                                                                                                                            ?>


                                        <?php
                                        if ($country_page < $country_total_result - 1) {
                                            if ($country_page < $country_total_result - 2) {
                                        ?>
                                                <a href="javascript:void(0)" class="page-btn page-dots">
                                                    <span class="material-symbols-outlined">
                                                        page_control
                                                    </span>
                                                </a>
                                            <?Php
                                            }
                                            ?> <a href="?country-<?= $country_total_result ?>&city=<?= $city_page ?>&area=<?= $area_page ?>"><?= $country_total_result ?></a> <?php
                                                                                                                                                                                                            }


                                                                                                                                                                                                            if ($country_page < $country_total_result) {
                                                                                                                                                                                                                ?>
                                            <a href="?country=<?= $page - 1 ?>&city=<?= $city_page ?>&area=<?= $area_page ?>" class="page-btn page-next">
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