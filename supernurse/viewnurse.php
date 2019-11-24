<?php
        include_once('./header.php');
    ?>
    <!-- Main Container -->
    <main id="main-container">

        <!-- Page Content -->
        <div class="content">
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">VIEW NURSE</h3>
                    
                </div>
                <div class="block-content">
                <table id="tbl_viewchild" class="table table-bordered table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 5%">#</th>
                            <th>Name</th>
                            <th class="d-none d-sm-table-cell text-center">Username</th>
                            <th class="d-none d-sm-table-cell text-center" style="width: 10%;">Email</th>
                            <th class="d-none d-sm-table-cell text-center" style="width: 10%;">Phonenumber</th>
                            <th class="text-center" style="width: 10%;">Bloodgroup</th>
                            <th class="text-center" style="width: 20%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

                </div>
            </div>
        </div>
        <!-- END Page Content -->

    </main>
    <!-- END Main Container -->

    <?php
        include_once('./footer.php');
    ?>

    <script>
        $(document).ready(function(){
            $("#tbl_viewchild").DataTable({
                "paging": false,
                "ordering": false,
                "ajax": {
                    'url': 'http://localhost/Projects/Fredah/vaccine/supernurse/scripts/supernurse.php?function=listNurses',
                    'dataSrc': ''
                },
                "columns": [
                    {data: "number"},
                    {data: "fullname"},
                    {data: "username"},
                    {data: "email"},
                    {data: "phonenumber"},
                    {data: "bloodgroup"},
                    {data: "actions"}
                ],
                "columnDefs": [
                    { className: "text-center", "targets": [ 0 ] },
                    { className: "text-center", "targets": [ 2 ] },
                    { className: "text-center", "targets": [ 3 ] },
                    { className: "text-center", "targets": [ 4 ] },
                    { className: "text-center", "targets": [ 5 ] },
                    { className: "text-center", "targets": [ 6 ] }
                ]
            });
            
        });
    </script>

    

    

    
    