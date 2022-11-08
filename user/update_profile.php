<?php
extract($_POST);
if (isset($update)) {

    $query = "update user set name='$n',deparment_id='$dept',gender='$gen',semester='$sem' where email='" . $_SESSION['user'] . "'";

//$query="insert into user values('','$n','$e','$pass','$mob','$gen','$hob','$imageName','$dob',now())";
    mysqli_query($conn, $query);



    $err = "<font color='blue'>Profie updated successfully !!</font>";
}


//select old datad
//check user alereay exists or not
$sql = mysqli_query($conn, "select * from user where email='" . $_SESSION['user'] . "'");
$res = mysqli_fetch_assoc($sql);
?>
<h2 align="center">Update Your Profile</h2>
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
<form method="post">
    <table class="table table-bordered">
        <Tr>
            <Td colspan="2"><?php echo @$err; ?></Td>
        </Tr>

        <tr>
            <td>Enter Your name</td>
            <Td><input class="form-control" value="<?php echo $res['name']; ?>"  type="text" name="n"/></td>
        </tr>
        <tr>
            <td>Enter Your email </td>
            <Td><input class="form-control" type="email" readonly="true" value="<?php echo $res['email']; ?>"  name="e"/></td>
        </tr>

        <!--
                <tr>
                    <td>Enter Your Mobile </td>
                    <Td><input class="form-control" type="text" value="<?php echo $res['mobile']; ?>"  name="mob"/></td>
                </tr>-->

        <tr>
            <td>Select Your Gender</td>
            <Td>
                Male<input type="radio" <?php
                if ($res['gender'] == "m") {
                    echo "checked";
                }
                ?> name="gen" value="m"/>
                Female<input type="radio" <?php
                if ($res['gender'] == "f") {
                    echo "checked";
                }
                ?> name="gen" value="f"/>
            </td>
        </tr>

<!--        <tr>
            <td>Choose Your hobbies</td>
            <Td>
        <?php
        $arrr = explode(",", $res['hobbies']);
        ?>


                Reading<input value="reading" <?php
        if (in_array("reading", $arrr)) {
            echo "checked";
        }
        ?> type="checkbox" name="hob[]"/>
                Singing<input value="singin" <?php
        if (in_array("singin", $arrr)) {
            echo "checked";
        }
        ?> type="checkbox" name="hob[]"/>
                Playing<input value="playing" <?php
        if (in_array("playing", $arrr)) {
            echo "checked";
        }
        ?> type="checkbox" name="hob[]"/>
            </td>
        </tr>-->


<!--        <tr>
            <td>Enter Your DOB</td>
        <?php
        $arrr1 = explode("-", $res['dob']);
        ?>
            <Td>
                <select class="form-control" style="width:100px;float:left" name="yy">
                    <option value="">Year</option>
        <?php
        for ($i = 1950; $i <= 2016; $i++) {
            ?>
                                                        <option <?php
            if ($arrr1[0] == $i) {
                echo "selected";
            }
            ?>><?php echo $i; ?></option>
        <?php }
        ?>

                </select>

                <select class="form-control" style="width:100px;float:left" name="mm">
                    <option value="">Month</option>
        <?php
        for ($i = 1; $i <= 12; $i++) {
            ?>
                                                        <option <?php
            if ($arrr1[1] == $i) {
                echo "selected";
            }
            ?>><?php echo $i; ?></option>
        <?php }
        ?>
                    }
                    ?>

                </select>


                <select class="form-control" style="width:100px;float:left" name="dd">
                    <option value="">Date</option>
        <?php
        for ($i = 1; $i <= 31; $i++) {
            ?>
                                                        <option <?php
            if ($arrr1[2] == $i) {
                echo "selected";
            }
            ?>><?php echo $i; ?></option>
        <?php }
        ?>
                    }
                    ?>

                </select>

            </td>
        </tr>-->
        <tr>
            <td>Enter Your department</td>
            <td>
                <select name="dept" class="form-control" required>
                    <?php
                    $result = mysqli_query($conn, "select * from department");
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <option value="<?php echo $row['department_id'] ?>"><?php echo $row['department_name'] ?></option>
                    <?php } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Select Your Semester</td>
            <Td><select name="sem" class="form-control" required>

                    <option>i</option>
                    <option>ii</option>
                    <option>summer</option>

                </select>
            </td>
        </tr>
        <tr>


            <Td colspan="2" align="center">
                <input type="submit" class="btn btn-success" value="Update My Profile" name="update"/>
                <input type="reset" class="btn btn-danger" value="Reset"/>

            </td>
        </tr>
    </table>
</form>
