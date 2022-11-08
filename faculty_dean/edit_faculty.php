<?php
extract($_POST);
if (isset($save)) {

    mysqli_query($conn, "update department set department_name='$n' where department_id='" . $_GET['id'] . "'");

    $err = "<font color='green'>Department updated</font>";
}

$con = mysqli_query($conn, "select * from department where department_id='" . $_GET['id'] . "'");

$res = mysqli_fetch_assoc($con);
?>


<h1 class="page-header">Update  Department</h1>
<div class="col-lg-8" style="margin:15px;">
    <form method="post">

        <div class="control-group form-group">
            <div class="controls">
                <label><?php echo @$err; ?></label>
            </div>
        </div>

        <div class="control-group form-group">
            <div class="controls">
                <label>Name:</label>
                <input type="text" value="<?php echo @$res['department_name']; ?>" name="n" class="form-control" required>
            </div>
        </div>

        <div class="control-group form-group">
            <div class="controls">
                <input type="submit" class="btn btn-success" name="save" value="Update  Department">
            </div>
        </div>
    </form>


</div>