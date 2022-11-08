<?php
include 'dbconfig.php';
$result = mysqli_query($conn, "select *from feedback");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Webslesson Tutorial | Datatables Jquery Plugin with Php MySql and Bootstrap</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
        <!--
                <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"/>
                <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css"/>-->

    </head>
    <body>
        <br /><br />
        <div class="container">
            <h3 align="center">Datatables Jquery Plugin with Php MySql and Bootstrap</h3>
            <br />
            <div class="table-responsive">
                <table id="employee_data" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Address</td>
                            <td>Gender</td>
                            <td>Designation</td>
                            <td>Age</td>
                        </tr>
                    </thead>
                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                        echo '
                               <tr>
                                    <td>' . $row["id"] . '</td>
                                    <td>' . $row["Q1"] . '</td>
                                    <td>' . $row["Q2"] . '</td>
                                    <td>' . $row["Q3"] . '</td>
                                    <td>' . $row["Q4"] . '</td>
                               </tr>
                               ';
                    }
                    ?>
                </table>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                $('#employee_data').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
            });
        </script>


<!--        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"/>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"/>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"/>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"/>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"/>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"/>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"/>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"/>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"/>-->
    </body>
</html>
