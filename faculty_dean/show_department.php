<script type="text/javascript">
    function deletes(id)
    {
        a = confirm('Are You Sure To Remove This Record ?')
        if (a)
        {
            window.location.href = 'delete_faculty.php?id=' + id;
        }
    }
</script>
<h1>List of Teachers</h1>
<table id = 'example' class='table table-responsive table-bordered table-striped table-hover' style=margin:15px;>
    <thead>
        <tr>

            <th>S.No</th>
            <th>Department ID</th>
            <th>Department Name</th>
            <th>Edit Department</th>
            <th>Delete Department</th>

    </thead>
    <?php
    $i = 1;
    $que = mysqli_query($conn, "select * from department");

    while ($row = mysqli_fetch_array($que)) {
        echo "<tr>";
        echo "<td>" . $i . "</td>";
        echo "<td>" . $row['department_id'] . "</td>";
        echo "<td>" . $row['department_name'] . "</td>";

        echo "<td class='text-center'><a href='dashboard.php?id=$row[department_id]&info=edit_faculty'><span class='glyphicon glyphicon-pencil'style=color:green;></span></a></td>";


        echo "<td class='text-center'><a href='#' onclick='deletes($row[department_id])'><span class='glyphicon glyphicon-remove' style=color:red;></span></a></td>";
        echo "</tr>";
        $i++;
    }
    ?>