<?php
    include_once('./header.php')
?>
    <body>
    <div id="page-container" class="main-content">

<!-- Main Container -->
<main id="main-container">

    <!-- Page Content -->
    <div class="bg-gd-lake">
        <div class="hero-static content content-full bg-white invisible" data-toggle="appear">
            <!-- Header -->
            <div class="py-30 px-5 text-center">
                <a class="link-effect font-w700" href="./login.php">
                    <i class="si si-fire"></i>
                    <span class="font-size-xl text-primary-dark">Immunize</span>
                </a>
                <h1 class="h2 font-w700 mt-50 mb-10">Don’t worry, we’ve got your back</h1>
                <h2 class="h4 font-w400 text-muted mb-0">Please enter your email</h2>
            </div>
            <!-- END Header -->

            <!-- Reminder Form -->
            <div class="row justify-content-center px-5">
                <div class="col-sm-8 col-md-6 col-xl-4">
                    <!-- jQuery Validation functionality is initialized with .js-validation-reminder class in js/pages/op_auth_reminder.min.js which was auto compiled from _es6/pages/op_auth_reminder.js -->
                    <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                    <form class="js-validation-reminder" action="be_pages_auth_all.html" method="post">
                        <div class="form-group row">
                            <div class="col-12">
                                <div class="form-material floating">
                                    <input type="email" class="form-control" id="email" name="email">
                                    <label for="email">Email</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row gutters-tiny">
                            <div class="col-12 mb-10">
                                <button type="submit" class="btn btn-block btn-hero btn-noborder btn-rounded btn-alt-success">
                                    <i class="si si-user-follow mr-10"></i> Change Password
                                </button>
                            </div>
                            <div class="col-6">
                                <a class="btn btn-block btn-noborder btn-rounded btn-alt-secondary" href="#" data-toggle="modal" data-target="#modal-terms">
                                    <i class="fa fa-warning text-muted mr-10"></i> Read Terms
                                </a>
                            </div>
                            <div class="col-6">
                                <a class="btn btn-block btn-noborder btn-rounded btn-alt-secondary" href="op_auth_signin.html">
                                    <i class="si si-login text-muted mr-10"></i> Sign In
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END Reminder Form -->
        </div>
    </div>
    <!-- END Page Content -->

</main>
<!-- END Main Container -->
</div>
<!-- END Page Container -->

        <!--
            Codebase JS Core

            Vital libraries and plugins used in all pages. You can choose to not include this file if you would like
            to handle those dependencies through webpack. Please check out assets/_es6/main/bootstrap.js for more info.

            If you like, you could also include them separately directly from the assets/js/core folder in the following
            order. That can come in handy if you would like to include a few of them (eg jQuery) from a CDN.

            assets/js/core/jquery.min.js
            assets/js/core/bootstrap.bundle.min.js
            assets/js/core/simplebar.min.js
            assets/js/core/jquery-scrollLock.min.js
            assets/js/core/jquery.appear.min.js
            assets/js/core/jquery.countTo.min.js
            assets/js/core/js.cookie.min.js
        -->
<?php
include_once('./footer.php')
?>