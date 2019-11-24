<?php
        include_once('./header.php');
        include_once('../database/connection.php');

        $sql = "SELECT * FROM tbl_users JOIN tbl_roles ON tbl_users.role_id=tbl_roles.role_id WHERE user_id=".$_SESSION['user_id']."";
        $results = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
        
    ?>
    <!-- Main Container -->
    <main id="main-container">

        <!-- Page Content -->
        <div class="content">
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">PROFILE</small></h3>
                </div>
                <div class="block-content">
                <div class="row js-appear-enabled animated fadeIn" data-toggle="appear">
                <form id="form_addchild" class="js-validation-bootstrap col-12" action="" method="post">
                        <div class="form-group row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="col-form-label" for="othername">Fullname</label>
                                    <input type="text" class="form-control" id="othername" name="othername" value="<?=$_SESSION['fullname']?>" disabled>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="col-form-label" for="dob">Email</label>
                                    <input type="text" class="form-control" value="<?= $results[0]['email']?>" disabled>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="col-form-label" for="gender">Phone Number</label>
                                    <input type="text" class="form-control" value="<?= $results[0]['phonenumber']?>" disabled>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="col-form-label" for="bloodgroup">Bloodgroup</label>
                                    <input type="bloodgroup" class="form-control" id="bloodgroup" name="bloodgroup" value="<?= $results[0]['bloodgroup']?>" disabled>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- END Page Content -->

    </main>
    <!-- END Main Container -->

    
    <?php
        include_once('./footer.php');
    ?>