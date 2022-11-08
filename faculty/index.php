<?php
session_start();
include('../dbconfig.php');
error_reporting(1);

$user = $_SESSION['faculty_login'];
if ($user == "") {
    header('location:../index.php');
}
$sql = mysqli_query($conn, "select * from faculty where email='$user' ");
$users = mysqli_fetch_assoc($sql);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>Instructor Efficiency System</title>




        <!--Bootstrap Core CSS-->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <!--<link type="text/css" href="css/theme.css" rel="stylesheet">-->

        <!-- Custom styles for this template -->
        <link href="../css/dashboard.css" rel="stylesheet">


        <!--MetisMenu CSS-->
        <link href="../css/metisMenu.min.css" rel="stylesheet">


        <!--Custom CSS-->
        <link href="../css/sb-admin-2.css" rel="stylesheet">


        <!--Custom Fonts-->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">


    </head>

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
        #more_info h4 > a{
            color: blue;
        }
        #more_info h4 > a:hover,#more_info h4 > a:focus{
            text-decoration: none;
        }
    </style>


    <style type="text/css">
        .container-fluid {
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
            margin-top: 200px;
        }
        .navbar-inverse .navbar-nav>li>a {
            color: #ffffff;
        }
        .navbar-inverse .navbar-nav>li{
            margin-right: 30px;
        }
    </style>
    <style type="text/css">

        a{
            color:white;
            text-decoration: none;
        }
        .sidebar a{
            color: #6666ff;
            font-weight: bold;
        }
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
            background-color: #3333ff;
            color: white;
        }
        #more_info h4 > a{
            color: blue;
        }
        #more_info h4 > a:hover,#more_info h4 > a:focus{
            text-decoration: none;
        }
        .sidebar {
            z-index: 1;
            position: absolute;
            width: 250px;
            margin-top: 0px;
            background-color:#666666 ;

        }

    </style>
    <body>

            <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: #0063DC">
                <img src="../images/eff.png" alt="site log goes here." height="150" width="100%">
                <div class="container">
	                <div class="navbar-header">
		                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			                <span class="sr-only">Toggle navigation</span>
			                <span class="icon-bar"></span>
			                <span class="icon-bar"></span>
			                <span class="icon-bar"></span>
		                </button>
		                <a class="navbar-brand" href="dashboard.php"><font color="white">Instructor Efficiency System</font></a>
	                </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">

                            <li><a href="index.php?page=update_password"><span class="glyphicon glyphicon-lock"></span> Update Password</a></li>
                            <li><a href="index.php?page=update_password"><span class="glyphicon glyphicon-user"></span> Peer</a></li>
                            <li><a href="index.php?page=update_profile"><span class="glyphicon glyphicon-asterisk"></span> Update Profile</a></li>
                            <li><a href="index.php?page=feedback"><span class="glyphicon glyphicon-thumbs-up"></span> Efficiency</a></li>
                            <li><a href="index.php?page=feedback"><span class="glyphicon glyphicon-baby-formula"></span> <?php echo $users['Name']; ?></a></li>
                            <li><a href="logout.php"  style="color:#FFFFFF"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                        </ul>

                    </div>
                </div>
            </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <li class="active"><a href="index.php">Dashboard <span class="sr-only">(current)</span></a></li>
                        <!-- find users' image if image not found then show dummy image -->

                        <!-- check users profile image -->
                        <?php
                        $q = mysqli_query($conn, "select image from user where email='" . $_SESSION['user'] . "'");
                        $row = mysqli_fetch_assoc($q);
                        if ($row['image'] == "") {
                            ?>
                            <li><a href="#"><img style="border-radius:50px" src="../images/person.jpg" width="100" height="100" alt="not found"/></a></li>
                            <?php
                        } else {
                            ?>
                            <li><a href="#"><img style="border-radius:50px" src="../images/<?php echo $_SESSION['user']; ?>/<?php echo $row['image']; ?>" width="100" height="100" alt="not found"/></a></li>
                            <?php
                        }
                        ?>



                        <li><a href="index.php?page=update_password"><span class="glyphicon glyphicon-user"></span> Update Password</a></li>
                        <li><a href="index.php?page=update_profile"><span class="glyphicon glyphicon-asterisk"></span> Update Profile</a></li>
                        <li><a href="index.php?page=feedback"><span class="glyphicon glyphicon-thumbs-down"></span> Efficiency</a></li>

                    </ul>


                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <!-- container-->
                    <?php
                    @$page = $_GET['page'];
                    if ($page != "") {
                        if ($page == "update_password") {
                            include('update_password.php');
                        }

                        if ($page == "update_profile") {
                            include('update_profile.php');
                        }
                        if ($page == "feedback") {
                            include('feedback_average.php');
                        }
                    } else {
                        ?>




                        <h1 class="page-header">Developers</h1>

                        <div class="row placeholders">
                            <div class="col-xs-6 col-sm-3 placeholder">
                                <img src="../images/person.jpg" width="100" height="100" class="img-responsive" alt="Generic placeholder thumbnail">
                                <h4>Label</h4>
                                <span class="text-muted">Something else</span>
                            </div>
                            <div class="col-xs-6 col-sm-3 placeholder">
                                <img src="../images/person.jpg" width="100" height="100" class="img-responsive" alt="Generic placeholder thumbnail">
                                <h4>Label</h4>
                                <span class="text-muted">Something else</span>
                            </div>
                            <div class="col-xs-6 col-sm-3 placeholder">
                                <img src="../images/person.jpg" width="100" height="100" class="img-responsive" alt="Generic placeholder thumbnail">
                                <h4>Label</h4>
                                <span class="text-muted">Something else</span>
                            </div>

                            <div class="col-xs-6 col-sm-3 placeholder">
                                <img src="../images/person.jpg" width="100" height="100" class="img-responsive" alt="Generic placeholder thumbnail">
                                <h4>Label</h4>
                                <span class="text-muted">Something else</span>
                            </div>
                        </div>
                    <?php } ?>


                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!--         Placed at the end of the document so the pages load faster
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
                <script>window.jQuery || document.write('<script src="../js/vendor/jquery.min.js"><\/script>')</script>
                <script src="../js/bootstrap.min.js"></script>
                 Just to make our placeholder images work. Don't actually copy the next line!
                <script src="../js/vendor/holder.min.js"></script>
                 IE10 viewport hack for Surface/desktop Windows 8 bug
                <script src="../js/ie10-viewport-bug-workaround.js"></script>-->

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
                $("#example").DataTable({
                    "lengthMenu": [2, 3, 4, 5, 10, 25, 50, "All"]
                });
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
