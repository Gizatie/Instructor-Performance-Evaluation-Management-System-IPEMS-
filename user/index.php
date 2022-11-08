<?php
session_start();
include('../dbconfig.php');
$user = $_SESSION['user'];
if (empty($_SESSION['user'])) {
    header('location:../index.php');
}
$sql = mysqli_query($conn, "select * from user where email='$user' ");
$users = mysqli_fetch_assoc($sql);
//print_r($users);
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

        <!-- Bootstrap core CSS -->
        <link href="../css/bootstrap_1.css" rel="stylesheet">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="../css/dashboard.css" rel="stylesheet">

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="../js/ie-emulation-modes-warning.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: #0063DC">
            <img src="../images/eff.png" alt="site log goes here." height="150" width="100%">
            <div class="container">

                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">

                        <li><a href="index.php?page=update_password"><span class="glyphicon glyphicon-lock"></span> Update Password</a></li>
                        <li><a href="index.php?page=update_profile"><span class="glyphicon glyphicon-asterisk"></span> Update Profile</a></li>
                        <li><a href="index.php?page=feedback"><span class="glyphicon glyphicon-thumbs-up"></span> Efficiency</a></li>
                        <li><a href="index.php?page=feedback"><span class="glyphicon glyphicon-baby-formula"></span> <?php echo $users['name']; ?></a></li>
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
                            include('give_feedback.php');
                        }
                    } else {
                        ?>

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
                                background-color: #337ab7;
                            }
                            #more_info h4 > a{
                                color: blue;
                            }
                            #more_info h4 > a:hover,#more_info h4 > a:focus{
                                text-decoration: none;
                            }
                        </style>


                        <h1 class="page-header">Developers</h1>
                        <style type="text/css">
                            .container-fluid {
                                padding-right: 15px;
                                padding-left: 15px;
                                margin-right: auto;
                                margin-left: auto;
                                margin-top: 150px;
                            }
                            .navbar-inverse .navbar-nav>li>a {
                                color: #ffffff;
                            }
                            .navbar-inverse .navbar-nav>li{
                                margin-right: 30px;
                            }
                        </style>






                        <div class="row placeholders">
                            <div class="col-xs-6 col-sm-3 placeholder">
                                <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="100" height="100" class="img-responsive" alt="Generic placeholder thumbnail">
                                <h4>Label</h4>
                                <span class="text-muted">Something else</span>
                            </div>
                            <div class="col-xs-6 col-sm-3 placeholder">
                                <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="100" height="100" class="img-responsive" alt="Generic placeholder thumbnail">
                                <h4>Label</h4>
                                <span class="text-muted">Something else</span>
                            </div>
                            <div class="col-xs-6 col-sm-3 placeholder">
                                <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="100" height="100" class="img-responsive" alt="Generic placeholder thumbnail">
                                <h4>Label</h4>
                                <span class="text-muted">Something else</span>
                            </div>
                            <div class="col-xs-6 col-sm-3 placeholder">
                                <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="100" height="100" class="img-responsive" alt="Generic placeholder thumbnail">
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
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../js/vendor/jquery.min.js"><\/script>')</script>
        <script src="../js/bootstrap.min.js"></script>
        <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
        <script src="../js/vendor/holder.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="../js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>
