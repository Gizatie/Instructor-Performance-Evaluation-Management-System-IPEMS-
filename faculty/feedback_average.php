<form method="post">
    <table class="table table-hover">
        <tr>
            <?php
            $name = "";
            $average;
            $count = 0;
            $num_of_student = 0;
            $user_email = $_SESSION['faculty_login'];
            $user_id = $_SESSION['faculty_id'];
            $x = mysqli_query($conn, "select * from faculty where email='$user_email'");
            $e = mysqli_fetch_array($x);
            $name = $e['Name'];
            ?>

            <th> <?php echo $name . ", you can see your effiecny result below:"; ?></th>
            <td>
                <select name="faculty" class="form-control">
                    <?php
                    $sql = mysqli_query($conn, "select * from faculty where email='$user_email'");
                    while ($r = mysqli_fetch_array($sql)) {
                        echo "<option value='" . $r['id'] . "'>" . $r['Name'] . "</option>";
                        $user_id = $r['id'];
                    }
                    ?>
                </select>
            </td>
            <td><input name="sub" type="submit" value="Check Average" class="btn btn-lg btn-success"/></td>
        </tr>
    </table>
</form>
<hr style="border:2px solid green"/>
<div class="table-responsive">
<table class="table table-bordered table-striped table-responsive" id="example" style="text-align: center">

    <thead>

        <tr class="bg-success">
            <th>Sr.No</th>
            <th>Student Year</th>
            <th>Q1</th>
            <th>Q2</th>
            <th>Q3</th>
            <th>Q4</th>
            <th>Q5</th>
            <th>Q6</th>
            <th>Q7</th>
            <th>Q8</th>
            <th>Q9</th>
            <th>Q10</th>
            <th>Q11</th>
            <th>Q12</th>
            <th>Sum</th>
            <th>Average</th>
            <th>More</th>
<!--            <th>Quest13</th>
            <th>Quest14</th>-->
        </tr>
    </thead>
    <?php
    $r = mysqli_query($conn, "select * from feedback where faculty_id='$user_id'");
    $x = 0;
    $av = 0;
    $avsum = 0;
    $sum = 0;
    while ($row = mysqli_fetch_array($r)) {
        $x++;
        ?>
        <tr>
            <td><?php echo $x ?></td>
            <td><?php echo "Year_" . $row["batch"] ?></td>
            <td><?php
                echo $row["Q1"];
                $av += $row["Q1"];
                ?></td>
            <td><?php
                echo $row["Q2"];
                $av += $row["Q2"];
                ?></td>
            <td><?php
                echo $row["Q3"];
                $av += $row["Q3"];
                ?></td>
            <td><?php
                echo $row["Q4"];
                $av += $row["Q4"];
                ?></td>
            <td><?php
                echo $row["Q5"];
                $av += $row["Q5"];
                ?></td>
            <td><?php
                echo $row["Q6"];
                $av += $row["Q6"];
                ?></td>
            <td><?php
                echo $row["Q7"];
                $av += $row["Q7"];
                ?></td>
            <td><?php
                echo $row["Q8"];
                $av += $row["Q8"];
                ?></td>
            <td><?php
                echo $row["Q9"];
                $av += $row["Q9"];
                ?></td>
            <td><?php
                echo $row["Q10"];
                $av += $row["Q10"];
                ?></td>
            <td><?php
                echo $row["Q11"];
                $av += $row["Q11"];
                ?></td>
            <td><?php
                echo $row["Q12"];
                $av += $row["Q12"];
                ?></td>
            <td><?php
                echo $av;
                $sum += $av;
                ?></td>
            <td><?php
                $av = round($av / 12, 2);
                echo $av;
                $avsum += $av;
                ?></td>
            <td><a data-toggle="modal" href="#myModal-<?php echo $x; ?>">More</a></td>

        </tr>


        <div id ="myModal-<?php echo $x; ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content ">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss ="modal">&times;</button>
                        <h4 class="modal-title">What a student liked and disliked about this course.</h4>
                    </div>
                    <div class="modal-body">


                        <h4 class="bg-success text-success" style="padding:10px;border-radius: 6px;">What S/he liked</h4>
                        <p><?php echo $row["Q14"]; ?></p>

                        <h4 class="bg-danger text-danger"style="padding:10px;border-radius: 6px;">What S/he liked</h4>
                        <p><?php echo $row["Q14"]; ?></p></div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>



        <?php
        $av = 0;
    }
    ?></table></div>
<table class="table table-striped  table-bordered">
    <thead>
        <tr>
            <th colspan="16"></th>
            <th>Sum</th>
            <th>Average</th>
        </tr>
    </thead>
    <tr><td colspan="16">ድምር</td><td><?php echo $sum; ?></td><td><span style="color: blue; "><b><?php echo $avsum; ?></b></span></td></tr>
    <tr><td colspan="16">Maximum Possible Mark</td><td><?php echo $x * 60; ?></td><td><font color="blue"><b><?php echo $x * 5; ?></b></font></td></tr>
    <tr><td colspan="16">Percentage Score (%)</td><td><?php echo round($sum / ($x * 60) * 100, 1) . " %"; ?></td><td><font color="blue"><b><?php echo round($avsum / ($x * 5) * 100, 1) . " %"; ?></b></font></td></tr>

</table>
<div class="row">

    <div class="col-lg-12 col-md-4 col-sm-8 col-xs-12" id="more_info">
        <h4> <a href="#col2Content" data-toggle="collapse">More Info</a></h4>
        <div id="col2Content" class="panel-collapse collapse ">
            <table class="table table-responsive table-striped table-bordered">
                <thead>

                    <tr class="bg-success">
                        <th>Q#</th>
                        <th>Content</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="bg-success">Q1</td>
                        <td>Teacher provided the course outline having weekly content plan with list of required text book</td>
                    </tr>
                    <tr>
                        <td class="bg-success">Q2</td>
                        <td>Course objectives,learning outcomes and grading criteria are clear to me</td>
                    </tr>
                    <tr>
                        <td class="bg-success">Q3</td>
                        <td>Course integrates theoretical course concepts with the real world examples</td>
                    </tr>
                    <tr>
                        <td class="bg-success">Q4</td>
                        <td>Teacher is punctual,arrives on time and leaves on time</td>
                    </tr>
                    <tr>
                        <td class="bg-success">Q5</td>
                        <td>Teacher is good at stimulating the interest in the course content</td>
                    </tr>
                    <tr>
                        <td>Q6</td>
                        <td> Teacher is good at explaining the subject matter</td>
                    </tr>
                    <tr>
                        <td>Q7</td>
                        <td>Teacher's presentation was clear,loud ad easy to understand</td>
                    </tr>
                    <tr>
                        <td>Q8</td>
                        <td>Teacher is good at using innovative teaching methods/ways</td>
                    </tr>
                    <tr>
                        <td>Q9</td>
                        <td>Teacher is available and helpful during counseling hours</td>
                    </tr>
                    <tr>
                        <td>Q10</td>
                        <td>Teacher has competed the whole course as per course outline</td>
                    </tr>
                    <tr>
                        <td>Q11</td>
                        <td>Teacher was always fair and impartial in the assessment.</td>
                    </tr>
                    <tr>
                        <td>Q12</td>
                        <td>Assessments conducted are clearly connected to maximize learining objectives</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    #col2Content {

    }

    .collapse {
        display: block;
    }
    .collapse {
        display: none;
    }
</style>

