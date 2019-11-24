    <?php
        include_once('./header.php');
    ?>
    <!-- Main Container -->
    <main id="main-container">

        <!-- Page Content -->
        <div class="content">
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title font-size-lg">ADD CHILD</h3>
                </div>
                <div class="block-content">
                <div class="col-sm-8 col-md-10 col-xl-10">
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
                    <form id="form_addchild" class="js-validation-bootstrap" action="./scripts/parent.php?function=addChild" method="post">
                        <div class="form-group row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="col-form-label" for="sirname">Sirname</label>
                                    <input type="text" class="form-control" id="sirname" name="sirname" placeholder="Sirname">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="col-form-label" for="firstname">Firstname</label>
                                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="col-form-label" for="othername">Othername</label>
                                    <input type="text" class="form-control" id="othername" name="othername" placeholder="Othername">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="col-form-label" for="dob">Date Of Birth</label>
                                    <input type="text" class="form-control" id="dob" name="dob" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="col-form-label" for="gender">Gender</label>
                                    <select class="form-control" id="gender" name="gender">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="col-form-label" for="bloodgroup">Bloodgroup</label>
                                    <input type="bloodgroup" class="form-control" id="bloodgroup" name="bloodgroup" placeholder="Bloodgroup">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row col-4">
                        <button type="submit" id="addchild" name="addchild" class="btn btn-alt-primary">
                            <i class="fa fa-check mr-5"></i> Add Child
                        </button>
                        </div>
                        <div class="form-group row">
                           
                        </div>
                        <div class="form-group row">
                            
                        </div>
                        <div class="form-group row gutters-tiny">
                            <div class="col-4 mb-10 ml-300">
                            <!-- <input type="submit" value="Sign Up" id="signup" name="signup" class="btn btn-block btn-hero btn-noborder btn-rounded btn-alt-success"><i class="si si-user-follow mr-10"></i>  -->
                                
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
        <!-- END Page Content -->

    </main>
    <!-- END Main Container -->
    <!-- <script src="../assets/js/core/jquery.min.js"></script> -->
    <!-- <script src="../assets/js/core/bootstrap.bundle.min.js"></script> -->
     
    <?php
        include_once('./footer.php');
    ?>

    <script>
        $(document).ready(function(){
            $(function() {
                const picker = $("#dob").datepicker();
            });
            $('#addchild').on('click',function(event){
                    event.preventDefault();
                    const form = $("#form_addchild");
                    const data = form.serializeArray();
                    $.ajax({
                        'url':'./scripts/parent.php?function=addChild',
                        'method':'POST',
                        'dataType':'json',
                        'data':data,
                        'success':function(result){
                            Codebase.helpers('notify', {
                                align: 'right',             // 'right', 'left', 'center'
                                from: 'top',                // 'top', 'bottom'
                                type: result.msg,               // 'info', 'success', 'warning', 'danger'
                                icon: 'fa fa-info mr-5',    // Icon class
                                message: result.data,
                                timer: 500
                            });
                            form[0].reset();
                        }
                    })
            });
        });
    </script>

   
   

</body>
</html>