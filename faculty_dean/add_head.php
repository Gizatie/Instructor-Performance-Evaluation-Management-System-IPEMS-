<?php
error_reporting(1);
include('../dbconfig.php');
extract($_POST);
if (isset($save)) {
    $q = mysqli_query($conn, "select * from admin where user='$email' and pass=$password");
    $r = mysqli_num_rows($q);
    if ($r) {
        $err = "<font color='red'>This head already exists!.</font>";
    } else {
        $query = "INSERT INTO admin values('','$dept','$Name','$Last','$email','$password')";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if ($result) {
            $err = "<font color='green'>New Head Successfully Added.</font>";
        }
    }
}
?>
<h1 class="page-header">Add Department Head</h1>
<div class="col-lg-4" style="margin:15px;">
    <form method="post">
        <div class="control-group form-group">
            <div class="controls">
                <label><?php echo @$err; ?></label>
            </div>
        </div>

        <div class="control-group form-group">
            <div class="controls">
                <label>First Name:</label>
                <input type="text"  name="Name" value="<?php echo @$Name; ?>" class="form-control" placeholder="Head First Name"required>
            </div>
        </div>
        <div class="control-group form-group">
            <div class="controls">
                <label>Last Name:</label>
                <input type="text"  name="Last" value="<?php echo @$Last; ?>" class="form-control" placeholder="Head Last Name"required>
            </div>
        </div>
        <div class="control-group form-group">
            <div class="controls">
                <label>Email:</label>
                <input type="text"  name="email" value="<?php echo @$email; ?>" class="form-control" placeholder="Head Email Address"required>
            </div>
        </div>
        <div class="control-group form-group">
            <div class="controls">
                <label>Password:</label>
                <input type="password"  name="password" value="<?php echo @$password; ?>" class="form-control" placeholder="Head Password"required>
            </div>
        </div>
        <div class="control-group form-group">
            <div class="controls">
                <select name="dept" class="form-control" required>
                    <?php
                    $result = mysqli_query($conn, "select * from department");
                    while ($row = mysqli_fetch_array($result)) {
                        ?>
                        <option value="<?php echo $row['department_id'] ?>"><?php echo $row['department_name'] ?></option>
                    <?php } ?>
                </select>  </div>
        </div>

        <div class="control-group form-group">
            <div class="controls">
                <input type="submit" class="btn btn-lg btn-success" name="save" value="Add Head">
            </div>
        </div>
    </form>
</div>