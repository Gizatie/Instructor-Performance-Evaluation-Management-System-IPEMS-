<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location:index.php');
}
include('../dbconfig.php');
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Admin Dashboard</title>

        <!--Bootstrap Core CSS-->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <!--<link type="text/css" href="css/theme.css" rel="stylesheet">-->




        <!--MetisMenu CSS-->
        <link href="../css/metisMenu.min.css" rel="stylesheet">


        <!--Custom CSS-->
        <link href="../css/sb-admin-2.css" rel="stylesheet">


        <!--Custom Fonts-->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">




    </head>
    <style type="text/css">


        .nav>li>a:hover {
            text-decoration: none;
            background-color: #a9cbde;
            color: white;
        }
        table td >a{
            color: lightseagreen;
        }
        table td >a:hover{
            text-decoration: none;
            color: blue;
        }
        .sidebar ul li a.active {
            background-color: #337ab7;
        }
        .navbar-default sidebar{
	        background-color: black;
        }
        #more_info h4 > a{
            color: blue;
        }
        #more_info h4 > a:hover,#more_info h4 > a:focus{
            text-decoration: none;
        }
    </style>
    <body>

        <div id="wrapper">
            <!--<h1>Header logo goes here.</h1>-->
            <img src="../images/eff.png" alt="site log goes here." height="150" width="100%">
            <!-- Navigation -->

            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <!--                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <a class="navbar-brand" href="dashboard.php">Instructor Efficiency System</a>
                                </div>-->
                <style type="text/css">

                    a{
                        color:white;
                        text-decoration: none;
                    }
                    .nav>li>a:hover {
                        text-decoration: none;
                        background-color: #a9cbde;
                        color: white;
                    }

                    .sidebar ul li a.active {
                        background-color: #337ab7;
                    }
                </style>
                <!-- /.navbar-header -->
                <style>
                    .navbar-top-links li:last-child {
                        margin-right: 100px;
                    }
                    .navbar-default {
                        background-color: #473a82;
                        border-color: #e7e7e7;
                    }
                    .navbar-top-links {
                        margin-right: 100px;
                    }
                    .navbar-top-links li {
                        margin-right: 15px;
                    }

                    .col-lg-12 {
                        width: 100%;

                    }
                </style>

                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a href="dashboard.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user fa-fw"></i>Department <i class="fa fa-caret-down"></i></a>
                        <ul class="dropdown-menu dropdown-user">
                            <li class="dropdown">
                                <a href="dashboard.php?info=add_department"><i class="fa fa-plus fa-fw"></i> Add department</a>
                            </li>
                            <li>
                                <a href="dashboard.php?info=show_department"><i class="fa fa-eye"></i> Manage Department</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user fa-fw"></i>Head  <i class="fa fa-caret-down"></i></a>
                        <ul class="dropdown-menu dropdown-user">
                            <li class="dropdown">
                                <a href="dashboard.php?info=add_head"><i class="fa fa-plus fa-fw"></i> Add Head</a>
                            </li>

                        </ul>
                        <!-- /.nav-second-level -->
                    </li>



                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user fa-fw"></i>Efficiency <i class="fa fa-caret-down"></i></a>
                        <ul class="dropdown-menu dropdown-user">
                            <!--                            <li class="dropdown">
                                                            <a href="dashboard.php?info=feedback"><i class="fa fa-plus fa-fw"></i> Efficiency</a>
                                                        </li>-->
                            <li>
                                <a href="dashboard.php?info=feedback_average"><i class="fa fa-eye"></i> Department Efficiency </a>
                            </li>

	                        <li>
                                <a href="dashboard.php?info=feedback_average"><i class="fa fa-eye"></i> Teacher Efficiency </a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

                    <!-- /.dropdown -->
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $_SESSION['user']; ?>
                            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">

                            <li><a href="dashboard.php?info=update_password"><i class="fa fa-gear fa-fw"></i>Change Password</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>

                    <!-- /.dropdown -->
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="dashboard.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>

                            <li>
                                <a href="#"><i class="fa fa-user fa-fw"></i>Department<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="dashboard.php?info=add_department"><i class="fa fa-plus fa-fw"></i> Add department</a>
                                    </li>
                                    <li>
                                        <a href="dashboard.php?info=show_department"><i class="fa fa-eye"></i> Manage Department</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-user fa-fw"></i>Heads<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="dashboard.php?info=add_head"><i class="fa fa-plus fa-fw"></i> Add Head</a>
                                    </li>

                                </ul>
                                <!-- /.nav-second-level -->
                            </li>

                            <!-- feedback-->
                            <li>
                                <a href="#"><i class="fa fa-user fa-book"></i>Efficiency<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">

                                    <!--<li><a href="dashboard.php?info=feedback"><i class="fa fa-eye"></i> Efficiency</a></li>-->
                                    <li><a href="dashboard.php?info=feedback_average"><i class="fa fa-eye"></i> Efficiency Average</a></li>


                                </ul>
                            </li>
                            <!--feedback end-->



                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">

                        <?php
                        @$id = $_GET['id'];
                        @$info = $_GET['info'];
                        if ($info != "") {
                            if ($info == "add_faculty") {
                                include('add_faculty.php');
                            } elseif ($info == "show_department") {
                                include('show_department.php');
                            } elseif ($info == "edit_faculty") {
                                include('edit_faculty.php');
                            } elseif ($info == "display_student") {
                                include('display_student.php');
                            } elseif ($info == "contact") {
                                include('contact.php');
                            } elseif ($info == "feedback") {
                                include('feedback.php');
                            } elseif ($info == "feedback_average") {
                                include('feedback_average.php');
                            } else if ($info == "update_password") {
                                include('update_password.php');
                            } else if ($info == "add_department") {
                                include('add_department.php');
                            } else if ($info == "add_head") {
                                include('add_head.php');
                            }
                        } else {
                            include('dashboard_home.php');
                        }
                        ?>

                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <script src="../jQuery/jQuery-2.1.4.min.js"></script>
        <!--<script src="../js/jquery.min.js"></script>-->
        <!-- Bootstrap 3.3.5 -->
        <script src="../js/bootstrap.min.js"></script>
        <!--<script src="../plugins/select2/select2.full.min.js"></script>-->

        <!--<script src="../js/app.min.js"></script>-->
        <!-- AdminLTE for demo purposes -->
        <!--<script src="../js/demo.js"></script>-->
        <script src="../datatables/jquery.dataTables.min.js"></script>
        <script src="../datatables/dataTables.bootstrap.min.js"></script>

        <script>
            $(function () {
                $("#example").DataTable();
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false
                });
            });
        </script>
        <!--<script src="../css/bootstrap.min.js"></script>-->

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../css/metisMenu.min.js"></script>


        <!-- Custom Theme JavaScript -->
        <script src="../css/sb-admin-2.js"></script>

    </body>

</html>
