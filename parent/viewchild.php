    <?php
        include_once('./header.php');
    ?>
    <!-- Main Container -->
    <main id="main-container">

        <!-- Page Content -->
        <div class="content">
            <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">VIEW CHILD</h3>
                    
                </div>
                <div class="block-content">
                <table id="tbl_viewchild" class="table table-bordered table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 5%">#</th>
                            <th>Name</th>
                            <th class="d-none d-sm-table-cell text-center">DOB</th>
                            <th class="d-none d-sm-table-cell text-center" style="width: 10%;">Gender</th>
                            <th class="text-center" style="width: 10%;">Bloodgroup</th>
                            <th class="text-center" style="width: 20%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Isaack Motanya</td>
                            <td>09/09/1998</td>
                            <td>Male</td>
                            <td>A+</td>
                            <td>Delete</td>
                        </tr>
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
                    'url': 'http://localhost/Projects/Fredah/vaccine/parent/scripts/parent.php?function=listChildren',
                    'dataSrc': ''
                },
                "columns": [
                    {data: "number"},
                    {data: "child_name"},
                    {data: "dob"},
                    {data: "gender"},
                    {data: "blood-group"},
                    {data: "actions"}
                ],
                "columnDefs": [
                    { className: "text-center", "targets": [ 0 ] },
                    { className: "text-center", "targets": [ 2 ] },
                    { className: "text-center", "targets": [ 3 ] },
                    { className: "text-center", "targets": [ 4 ] },
                    { className: "text-center", "targets": [ 5 ] },
                ]
            });
            
        });
    </script>

    

    

    
    