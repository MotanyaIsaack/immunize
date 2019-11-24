<?php
        include_once('./header.php');
        include_once('../database/connection.php');

        $noChild = $conn->query("SELECT * FROM tbl_child")->num_rows;
        $noNurses = $conn->query("SELECT * FROM tbl_users WHERE role_id=4")->num_rows;
        $noFathers = $conn->query("SELECT * FROM tbl_users WHERE role_id=1")->num_rows;
        $noMothers = $conn->query("SELECT * FROM tbl_users WHERE role_id=2")->num_rows;
        $noGuardians = $conn->query("SELECT * FROM tbl_users WHERE role_id=3")->num_rows;

    ?>
    <!-- Main Container -->
    <main id="main-container">

        <!-- Page Content -->
        <div class="content">
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">DASHBOARD</small></h3>
                    
                </div>
                <div class="block-content">
                <div class="row js-appear-enabled animated fadeIn" data-toggle="appear">
                        <!-- Row #1 -->
                        <div class="col-6 col-xl-3">
                            <a class="block block-rounded block-bordered block-link-shadow" href="javascript:void(0)">
                                <div class="block-content block-content-full clearfix">
                                    <div class="float-right mt-15 d-none d-sm-block">
                                        <i class="si si-bag fa-2x text-primary-light"></i>
                                    </div>
                                    <div class="font-size-h3 font-w600 text-primary js-count-to-enabled" data-toggle="countTo" data-speed="1000" data-to="<?=$noNurses?>"><?=$noNurses?></div>
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Nurses</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-xl-3">
                            <a class="block block-rounded block-bordered block-link-shadow" href="javascript:void(0)">
                                <div class="block-content block-content-full clearfix">
                                    <div class="float-right mt-15 d-none d-sm-block">
                                        <i class="si si-wallet fa-2x text-earth-light"></i>
                                    </div>
                                    <div class="font-size-h3 font-w600 text-earth"><span data-toggle="countTo" data-speed="1000" data-to="<?=$noMothers?>" class="js-count-to-enabled"><?=$noMothers?></span></div>
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Mothers</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-xl-3">
                            <a class="block block-rounded block-bordered block-link-shadow" href="javascript:void(0)">
                                <div class="block-content block-content-full clearfix">
                                    <div class="float-right mt-15 d-none d-sm-block">
                                        <i class="si si-envelope-open fa-2x text-elegance-light"></i>
                                    </div>
                                    <div class="font-size-h3 font-w600 text-elegance js-count-to-enabled" data-toggle="countTo" data-speed="1000" data-to="<?=$noFathers?>"><?=$noFathers?></div>
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Fathers</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-xl-3">
                            <a class="block block-rounded block-bordered block-link-shadow" href="javascript:void(0)">
                                <div class="block-content block-content-full clearfix">
                                    <div class="float-right mt-15 d-none d-sm-block">
                                        <i class="si si-users fa-2x text-pulse"></i>
                                    </div>
                                    <div class="font-size-h3 font-w600 text-pulse js-count-to-enabled" data-toggle="countTo" data-speed="1000" data-to="<?=$noChild?>"><?=$noChild?></div>
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Children</div>
                                </div>
                            </a>
                        </div>
                        <!-- END Row #1 -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END Page Content -->

    </main>
    <!-- END Main Container -->

    
    <?php
        include_once('./footer.php');
    ?>