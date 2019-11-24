    <?php
        include_once('./header.php');
        include_once('../database/connection.php');

        $noChild = $conn->query("SELECT * FROM tbl_child WHERE user_id=".$_SESSION['user_id']."")->num_rows;

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
                                        <i class="si si-users fa-2x text-pulse"></i>
                                    </div>
                                    <div class="font-size-h3 font-w600 text-pulse js-count-to-enabled" data-toggle="countTo" data-speed="1000" data-to="2"><?=$noChild?></div>
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