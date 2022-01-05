<?php
include 'header.php';
include 'admin/conn.php';
?>
<div class="container">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-6">
                <h1 class="page-header">
                    <?php
                    if (isset($_GET['stuId'])) {
                        echo 'Update Lecture';
                    } else {
                        echo "Add New Result";
                    }
                    ?>
                </h1>
            </div>
        </div>
        <div class="container">
            <form method="POST">

                <div class="form-group">
                    <h4>Stream:</h4>
                    <select required name="stream" id="stream" class="form-control">
                        <option disabled selected>-- Select Stream --</option>
                        <?php
                        // Using database connection file here
                        $records = mysqli_query($con, "SELECT * From tbl_stream");  // Use select query here 
                        while ($data = mysqli_fetch_array($records)) {
                            echo "<option value='" . $data['stream_id'] . "'>" . $data['name'] . "</option>";  // displaying data in option menu
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <h4>Standard</h4>
                    <select required name="standard" id="standard" class="form-control">
                        <option disabled selected>-- Select Standard --</option>
                        <!-- <?php
                                // Using database connection file here
                                $record = mysqli_query($con, "SELECT * From tbl_standards");  // Use select query here 
                                while ($datas = mysqli_fetch_array($record)) {
                                    echo "<option value='" . $datas['standard_id'] . "'>" . $datas['standard_name'] . "</option>";  // displaying data in option menu
                                }
                                ?> -->
                    </select>
                </div>
                <div class="form-group">
                    <h4>Subject:</h4>
                    <select required name="subject" id="subject" class="form-control">
                    </select>
                </div>

                <div class="form-group">
                    <h4>Exam Date</h4>
                    <input type="datetime-local" name="exam_date" placeholder="Enter Exam Date" class="form-control" required />
                </div>

                <div class="form-group">
                    <h4>Exam Topic</h4>
                    <input type="text" name="topic" placeholder="Enter Exam Topic" class="form-control" required />
                </div>

                <div class="form-group">
                    <h4>Students</h4>
                    <select required name="students" id="students" class="form-control">
                    </select>
                </div>

                <div class="form-group">
                    <h4>Marks</h4>
                    <input type="text" maxlength="3" id="marks" name="marks" placeholder="Enter Exam Marks" class="form-control" required />
                </div>
                <div class="form-group">
                    <input type="submit" name="btnsave" value="Save" class="btn btn-primary" />
                </div>
            </form>
            <hr>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {


        $('#marks').on("change", function() {

            if ($("#marks").val() > 100) {
                alert("Please enter mark less than 100");
                $("#marks").focus();
            }
        });

        $('#stream').on("change", function() {

            var streamid = $('#stream').val();
            var xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function() {

                if (this.readyState == 4 && this.status == 200) {
                    $('#standard').empty();
                    $('#standard').append(xhttp.responseText);
                    //alert(xhttp.responseText);
                    //alert();
                    //location.reload();
                }
            };
            xhttp.open("GET", "admin/api/get_standard_from_stream.php?stream_id=" + streamid, true);
            xhttp.send();



            //alert($('#stream').val());
        });





        $('#facultystream').on("change", function() {

            var streamid = $('#facultystream').val();
            var xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function() {

                if (this.readyState == 4 && this.status == 200) {
                    $('#subject').empty();
                    $('#subject').append(xhttp.responseText);
                    //location.reload();
                }
            };
            xhttp.open("GET", "admin/api/get_subject_from_stream.php?stream_id=" + streamid, true);
            xhttp.send();



            //alert($('#stream').val());
        });


        $('#standard').on("change", function() {

            var pagePathName = window.location.pathname;
            var pageName = pagePathName.substring(pagePathName.lastIndexOf("/") + 1);

            var streamid = $('#standard').val();
            var xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function() {

                if (this.readyState == 4 && this.status == 200) {
                    $('#subject').empty();
                    $('#subject').append(xhttp.responseText);

                    getStudents(streamid);
                    //alert(xhttp.responseText);
                    //alert();
                    //location.reload();
                }
            };
            if (pageName == "add_lecture.php" || pageName == "add_result.php") {
                xhttp.open("GET", "admin/api/get_faculty_from_subject.php?subject_id=" + streamid, true);
            } else {
                xhttp.open("GET", "admin/api/get_subject_from_stream_and_standard.php?standard_id=" + streamid, true);
            }

            xhttp.send();
            //alert($('#stream').val());
        });
        //alert($('#stream').val());

        function getStudents(stdid) {

            var xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function() {

                if (this.readyState == 4 && this.status == 200) {
                    $('#students').empty();
                    $('#students').append(xhttp.responseText);
                    //alert(xhttp.responseText);
                    //alert();
                    //location.reload();
                }
            };
            xhttp.open("GET", "admin/api/get_students.php?standard_id=" + stdid, true);


            xhttp.send();

        }


        $('#subject').on("change", function() {

            var streamid = $('#subject').val();
            var xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function() {

                if (this.readyState == 4 && this.status == 200) {
                    $('#faculty').empty();
                    $('#faculty').append(xhttp.responseText);
                    //location.reload();
                }
            };
            xhttp.open("GET", "admin/api/get_faculty_subject.php?subject_id=" + streamid, true);
            xhttp.send();



            //alert($('#stream').val());
        });



    });
</script>
<?php
include 'footer.php';


if (isset($_POST['btnsave'])) {

    $stream = $_POST['stream'];
    $standard = $_POST['standard'];
    $subject = $_POST['subject'];
    $topic = $_POST['topic'];
    $students = $_POST['students'];
    $marks = $_POST['marks'];
    $date = $_POST['exam_date'];


    /* $sub = array();
    if (is_array($_POST['subjects'])) {
        foreach ($_POST['subjects'] as $value) {
            array_push($sub, $value);
        }
    }

    $subjects = implode(',', $sub);*/
    $qry = "INSERT INTO `tbl_result`(`stream_id`, `standard_id`, `subject_id`, `exam_date_time`, `exam_topic`, `student_id`, `marks`)
     VALUES ('$stream','$standard','$subject','$date','$topic','$students','$marks')";
    mysqli_query($con, $qry);
    // else {
    //     $value = $_POST['subjects'];
    //     echo $value;
    // }
}
?>