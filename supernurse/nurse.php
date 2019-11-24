<?php
        include_once('./header.php');
    ?>
    <!-- Main Container -->
    <main id="main-container">

        <!-- Page Content -->
        <div class="content">
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title font-size-lg">ADD NURSE</h3>
                </div>
                <div class="block-content">
                <div class="col-sm-8 col-md-10 col-xl-10">
                    <form id="form_addchild" class="js-validation-bootstrap" action="./scripts/supernurse.php?function=addNurse" method="post">
                        <div class="form-group row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="col-form-label" for="firstname">Firstname</label>
                                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="col-form-label" for="othername">Lastname</label>
                                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="col-form-label" for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="col-form-label" for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="col-form-label" for="sirname">Password</label>
                                    <input type="text" class="form-control" id="password" name="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="col-form-label" for="phonenumber">Phone Number</label>
                                    <input type="text" class="form-control" id="phonenumber" name="phonenumber" placeholder="Phone Number">
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
                        <button type="submit" id="addchild" name="addnurse" class="btn btn-alt-primary">
                            <i class="fa fa-check mr-5"></i> Add Nurse
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
                        'url':'./scripts/supernurse.php?function=addNurse',
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