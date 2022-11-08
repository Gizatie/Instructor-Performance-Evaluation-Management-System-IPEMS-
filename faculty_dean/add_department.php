<?php
error_reporting(1);
include('../dbconfig.php');
extract($_POST);
if (isset($save)) {
    $q = mysqli_query($conn, "select * from department where department_name='$department'");
    $r = mysqli_num_rows($q);
    if ($r) {
        $err = "<font color='red'>This department already exists!.</font>";
    } else {
        $query = "INSERT INTO department (department_name) values('$department')";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        $err = "<font color='green'>New department Successfully Added.</font>";
    }
}
?>
<h1 class="page-header">Add Department</h1>
<div class="col-lg-4" style="margin:15px;">
    <form method="post">
        <div class="control-group form-group">
            <div class="controls">
                <label><?php echo @$err; ?></label>
            </div>
        </div>

        <div class="control-group form-group">
            <div class="controls">
                <label>Department:</label>
                <input type="text"  name="department" value="<?php echo @$department; ?>" class="form-control" required>
            </div>
        </div>

        <div class="control-group form-group">
            <div class="controls">
                <input type="submit" class="btn btn-success" name="save" value="Add New Department">
            </div>
        </div>
    </form>
</div>