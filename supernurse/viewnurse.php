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
           const view_child_table = $("#tbl_viewchild").DataTable({
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
            $("#tbl_viewchild").on('click','#action',function(event){
                const that = event.target;
                const action = $(this).data('value');
                 const url = (action == "suspend" ? 
                    "http://localhost/Projects/Fredah/vaccine/supernurse/scripts/supernurse.php?function=suspendNurse":
                    "http://localhost/Projects/Fredah/vaccine/supernurse/scripts/supernurse.php?function=unsuspendNurse");
                $('#tbl_viewchild #action').data('row',that.closest('tr'));
                const row_data = view_child_table.row($(that).data('row')).data();
                const data = JSON.stringify(row_data);
                $.ajax({
                    'url':url,
                    'method':'POST',
                    'data':row_data,
                    'success':function(result){
                        const data = JSON.parse(result)
                        // console.log(data.msg);
                        
                        Codebase.helpers('notify', {
                                align: 'right',             // 'right', 'left', 'center'
                                from: 'top',                // 'top', 'bottom'
                                type: data.msg,               // 'info', 'success', 'warning', 'danger'
                                icon: 'fa fa-info mr-5',    // Icon class
                                message: data.data,
                                timer: 500
                        });
                        view_child_table.ajax.reload(); 
                    }
                });
            });
        });
    </script>

    

    

    
    