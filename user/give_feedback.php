<?php
extract($_POST);
if (isset($sub)) {
    $user = $_SESSION['user'];

    $sql = mysqli_query($conn, "select * from feedback where student_id='$user' and faculty_id='$faculty' and department_id='$_SESSION[department]'")or die(mysqli_error($conn));
    $r = mysqli_num_rows($sql);

    if ($r == true) {
        echo "<h2 style='color:red'>You already submitted efficiency result to this Instructor</h2>";
    } else {
        $query = "insert into feedback values('','$user','$_SESSION[batch]','$_SESSION[department]','$faculty', '$quest1', '$quest2', '$quest3', '$quest4', '$quest5', '$quest6', '$quest7', '$quest8', '$quest9', '$quest10', '$quest11', '$quest12', '$quest13', '$quest14', now())";

        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if ($res) {
            echo "<h2 style = 'color:green'>Thank you </h2>";
        }
    }
}
?>
<form method="post">
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
    <fieldset>
        <center><h2>Student's Form</h2></center><br>

        <fieldset>



            <h3>Please give your answer about the following question by circling the given grade on the scale:</h3>


            <button type="button" class="btn btn-success btn-lg"><strong>5 በጣም እስማማለሁ</strong></button>
            <button type="button" class="btn btn-warning btn-lg"><strong>4 እስማማለሁ</strong></button>
            <button type="button" class="btn btn-danger btn-lg"><strong>3 በከፊል እስማማለሁ</strong></button>
            <button type="button"  class="btn btn-info btn-lg"> <strong> 2 አልስማማም</strong></button>
            <button type="button" class="btn btn-danger btn-lg "><strong>1 በጣም አልስማማም</strong></button><br>

            <table class="table table-bordered table-striped" style="margin-top:50px">
                <tr>

                    <th> Choose Instructor:</th>
                    <td>
                        <select name="faculty" class="form-control">
                            <?php
                            $m = "select * from faculty inner join course on faculty.id = course.teacher_id and course.department_id = faculty.department_id and course.batch_id = '$_SESSION[batch]]' and faculty.department_id = '$_SESSION[department]'";
                            $some = mysqli_query($conn, $m);
                            while ($row = mysqli_fetch_array($some)) {
                                echo "<option value = '" . $row['id'] . "'>" . $row['Name'] . "</option>";
                            }
                            ?>
                        </select>
                    </td>

                </tr>

            </table>


            <h3>1-Course Material</h3>
            <table class="table table-bordered">
                <tr>
                    <td><b>1:</b> Teacher provided the course outline having weekly content plan with list of  required text book:</td>
                    <td><input type="radio" name="quest1" value="5" required> 5
                        <input type="radio" name="quest1" value="4">4
                        <input type="radio" name="quest1" value="3"> 3
                        <input type="radio" name=" quest1" value="2">2
                        <input type="radio" name="quest1" value="1">1</td>
                </tr>

                <tr>
                    <td><b>2:</b>Course objectives,learning outcomes and grading criteria are clear to me:</td>
                    <td><input type="radio" name="quest2" value="5" required>5
                        <input type="radio" name="quest2" value="4">4
                        <input type="radio" name="quest2" value="3">3
                        <input type="radio" name=" quest2" value="2">2
                        <input type="radio" name="quest2" value="1">1</td>
                </tr>

                <tr>
                    <td>
                        <b>3:</b>Course integrates throretical course concepts with the real world examples:</td>
                    <td>
                        <input type="radio" name="quest3" value="5" required> 5
                        <input type="radio" name="quest3" value="4">4
                        <input type="radio" name="quest3" value="3"> 3
                        <input type="radio" name="quest3" value="2">2
                        <input type="radio" name="quest3" value="1">1</td>
                </tr>
            </table>

            <h3>2-Class Teaching</h3>
            <table  class="table table-bordered" >
                <Td><b>4:</b> Teacher is punctual,arrives on time and leaves on time:</td>
                <td> <input type="radio" name="quest4" value="5" required> 5
                    <input type="radio" name="quest4" value="4">4
                    <input type="radio" name="quest4" value="3"> 3
                    <input type="radio" name="quest4" value="2">2
                    <input type="radio" name="quest4" value="1">1
                </td>

                <tr>
                    <td>
                        <b>5:</b> Teacher is good at stimulating the interest in the course content:</td>
                    <td>
                        <input type="radio" name="quest5" value="5" required> 5
                        <input type="radio" name="quest5" value="4">4
                        <input type="radio" name="quest5" value="3"> 3
                        <input type="radio" name="quest5" value="2">2
                        <input type="radio" name="quest5" value="1">1</td>
                </tr>
                <tr>
                    <td><b>6:</b> Teacher is good at explaining the subject matter:</td>
                    <td>
                        <input type="radio" name="quest6" value="5" required> 5
                        <input type="radio" name="quest6" value="4">4
                        <input type="radio" name="quest6" value="3"> 3
                        <input type="radio" name=" quest6" value="2">2
                        <input type="radio" name="quest6" value="1">1</td>
                </tr>

                <tr><td>
                        <b>7:</b> Teacher's presentation was clear,loud ad easy to understand:</td>
                    <td> <input type="radio" name="quest7" value="5" required> 5
                        <input type="radio" name="quest7" value="4">4
                        <input type="radio" name="quest7" value="3"> 3
                        <input type="radio" name="quest7" value="2">2
                        <input type="radio" name="quest7" value="1">1</td>
                <tr>
                    <td>
                        <b>8:</b> Teacher is good at using innovative teaching methods/ways:</td><td>
                        <input type="radio" name="quest8" value="5" required> 5
                        <input type="radio" name="quest8" value="4">4
                        <input type="radio" name="quest8" value="3">3
                        <input type="radio" name="quest8" value="2">2
                        <input type="radio" name="quest8" value="1">1</td>
                </tr>
                <tr>
                    <td>
                        <b>9:</b> Teacher is available and helpful during counseling hours:</td>
                    <td><input type="radio" name="quest9" value="5" required>5
                        <input type="radio" name="quest9" value="4">4
                        <input type="radio" name="quest9" value="3"> 3
                        <input type="radio" name="quest9" value="2">2
                        <input type="radio" name="quest9" value="1">1</td>
                </tr>
                <tr>
                    <td>
                        <b>10:</b> Teacher has competed the whole course as per course outline:</td>
                    <td>
                        <input type="radio" name="quest10" value="5" required> 5
                        <input type="radio" name="quest10" value="4">4
                        <input type="radio" name="quest10" value="3"> 3
                        <input type="radio" name="quest10" value="2">2
                        <input type="radio" name="quest10" value="1">1</td>
                </tr>
            </table>

            <h3>3-Class Assessment</h3>
            <table  class="table table-bordered" >
                <tr>
                    <td><b>11:</b>Teacher was always fair and impartial:</td>
                    <td>
                        <input type="radio" name="quest11" value="5" required> 5
                        <input type="radio" name="quest11" value="4">4
                        <input type="radio" name="quest11" value="3"> 3
                        <input type="radio" name="quest11" value="2">2
                        <input type="radio" name="quest11" value="1">1</td>
                </tr>
                <tr>
                    <td><b>12:</b>Assessments conducted are clearly connected to maximize learining objectives:</td>
                    <Td>
                        <input type="radio" name="quest12" value="5" required> 5
                        <input type="radio" name="quest12" value="4">4
                        <input type="radio" name="quest12" value="3"> 3
                        <input type="radio" name="quest12" value="2">2
                        <input type="radio" name="quest12" value="1">1</td>
                </tr>
            </table>

            <b>13:</b>What I liked about the course:<br><br>
            <center>
                <textarea name="quest13" rows="5" cols="60" id="comments" style="font-family:sans - serif;
                          font-size:1.2em;
                          ">

                </textarea></center><br><br>
            <b>14:</b>Why I disliked about the course:<br><br>
            <center>
                <textarea name="quest14" rows="5" cols="60" id="comments" style="font-family:sans - serif;
                          font-size:1.2em;
                          ">

                </textarea></center>

            <p align="center"><button type="submit" style="font-size:12pt;
                                      width: 120px;
                                      color:white;
                                      background-color:rgb(0, 100, 0);
                                      border-radius: 7px;
                                      padding:7px" name="sub">Submit</button></p>


            </form>
        </fieldset>


<!--<a href="transport.html"><p align="right"><button type="Button"style="font-size:7pt;
    color:white;
    background-color:green;
    border:2px solid #336600;padding:7px">Next</button></p></a>
    <a href = "About.php"><p align = "right"><button type = "Button" style = "font-size:7pt;color:white;background-color:green;border:2px solid #336600;padding:7px">Back</button></p></a> -->

        </div><!--close content_item-->
        </div><!--close content-->

        </div><!--close site_content-->


        </div><!--close main-->
</form>
<center>