    <?php
        include_once('./header.php');
    ?>
    <body>
        <div id="page-container" class="main-content">

            <!-- Main Container -->
            <main id="main-container">

                <!-- Page Content -->
                <div class="bg-gd-dusk">
                    <div class="hero-static content content-full bg-white invisible" data-toggle="appear">
                        <!-- Header -->
                        <div class="py-30 px-5 text-center">
                            <a class="link-effect font-w700" href="login.php">
                                <i class="si si-fire"></i>
                                <span class="font-size-xl text-primary-dark">Immunize</span>
                            </a>
                            <h1 class="h2 font-w700 mt-50 mb-10">Welcome</h1>
                            <h2 class="h4 font-w400 text-muted mb-0">Please sign up</h2>
                        </div>
                        <!-- END Header -->

                        <!-- Sign In Form -->
                        <div class="row justify-content-center px-5">
                            <div class="col-sm-8 col-md-6 col-xl-4">
                                <?php echo (isset($_SESSION['message']) ? 
                                '
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    <strong>'.$_SESSION["message"].'
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                '
                                 : '');
                                 unset($_SESSION["message"]);?>
                                <!-- jQuery Validation functionality is initialized with .js-validation-signin class in js/pages/op_auth_signin.min.js which was auto compiled from _es6/pages/op_auth_signin.js -->
                                <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->
                                <form class="js-validation-signin" action="./scripts/processSignup.php" method="post">
                                    <div class="form-group row">
                                        <div class="col-6">
                                            <div class="form-material floating">
                                                <input type="text" class="form-control" id="firstname" name="firstname">
                                                <label for="firstname">First Name</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-material floating">
                                                <input type="text" class="form-control" id="lastname" name="lastname">
                                                <label for="lastname">Last Name</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-6">
                                            <div class="form-material floating">
                                                <input type="number" class="form-control" id="phonenumber" name="phonenumber">
                                                <label for="phonenumber">Phone Number</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-material floating">
                                                <input type="email" class="form-control" id="email" name="email">
                                                <label for="email">Email</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-6">
                                            <div class="form-material floating">
                                                <input type="username" class="form-control" id="username" name="username">
                                                <label for="username">Username</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-material floating">
                                                <input type="password" class="form-control" id="password" name="password">
                                                <label for="password">Password</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-6">
                                            <div class="form-material floating">
                                                <input type="bloodgroup" class="form-control" id="bloodgroup" name="bloodgroup">
                                                <label for="bloodgroup">Bloodgroup</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-material floating">
                                            <select class="form-control" id="role" name="role">
                                                    <option value="0">Role</option>
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row gutters-tiny">
                                        <div class="col-12 mb-10">
                                        <!-- <input type="submit" value="Sign Up" id="signup" name="signup" class="btn btn-block btn-hero btn-noborder btn-rounded btn-alt-success"><i class="si si-user-follow mr-10"></i>  -->
                                            <button type="submit" id="signup" name="signup" class="btn btn-block btn-hero btn-noborder btn-rounded btn-alt-success">
                                                <i class="si si-user-follow mr-10"></i> Sign Up
                                            </button>
                                        </div>
                                        <div class="col-6">
                                            <a class="btn btn-block btn-noborder btn-rounded btn-alt-secondary" href="./forgotPassword.php">
                                                <i class="fa fa-warning text-muted mr-10"></i> Forgot Password
                                            </a>
                                        </div>
                                        <div class="col-6">
                                            <a class="btn btn-block btn-noborder btn-rounded btn-alt-secondary" href="./login.php">
                                                <i class="si si-login text-muted mr-10"></i> Sign In
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- END Sign In Form -->
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
        <script src="../assets/js/core/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $.ajax({
                    'url': 'http://localhost/Projects/Fredah/vaccine/auth/scripts/processSignup.php?function=getRoles',
                    'method': 'GET',
                    'dataType': 'json',
                    'success' : function(result){
                        const res = result.result;
                        $('#role').empty();
                        $.each(res,function(i,d){
                            $('#role').append('<option value="' + d.role_id + '">' + d.role_name + '</option>');

                        })
                        
                    }

                });
            });
        </script>
    <?php
    include_once('./footer.php')
    ?>