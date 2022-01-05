<?php
include 'header.php';
include 'admin/conn.php';
?>
<div class="container">
    <br>
    <div class="card">
        <div class="card-body">
            <b>Subjects</b>
            <?php
            $stdID = $_SESSION['USERID'];
            $qry2 = "select * from tbl_faculty where faculty_id = '$stdID'";
            $ds2 = mysqli_query($con, $qry2);
            while ($row2 = $ds2->fetch_array()) {
                $subID = $row2['subject_id']; 

                $sub = explode(",", $row2['subject_id']);
                $s = $row2['subject_id']; ?>
                <?php
                $qry3 = "select * from tbl_subject where subject_id in ($s)";
                $ds3 = mysqli_query($con, $qry3);
                while ($row3 = $ds3->fetch_array()) {
                    echo "<br>" . $row3["name"];
                }
                // for($i=0;$i<mysqli_num_rows($ds3);$i++){
                // } 
                ?>

                <h4 class="card-title"><b>Name :-</b><?php echo $row2['firstname'] . " " . $row2['lastname']; ?></h4>
            <?php } ?>
        </div>
    </div>
    </br>
    <div class="card-deck">
        <table class="table table-borderd">
            <thead>
                <h2>Student Result</h2>
                <tr>
                    <td>Student Name</td>
                    <td>Subject Name</td>
                    <td>Standard Name</td>
                    <td>Exam Date</td>
                    <td>Topic</td>
                    <td>Marks</td>

                </tr>
            </thead>
            <tbody>
                <?php
                $stdID = $subID;
                $qry = "select * from tbl_result join tbl_student on tbl_result.student_id = tbl_student.student_id join tbl_subject on tbl_result.subject_id=tbl_subject.subject_id join tbl_standards on tbl_result.standard_id=tbl_standards.standard_id where tbl_result.subject_id='$stdID'";
                $ds = mysqli_query($con, $qry);
                if(mysqli_num_rows($ds)>0){
                while ($row = $ds->fetch_array()) {
                ?>
                    <tr>
                        <td><?php echo $row['firstname']." ".$row['lastname'] ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['standard_name']; ?></td>
                        <td><?php echo $row['exam_date_time']; ?></td>
                        <td><?php echo $row['exam_topic']; ?></td>
                        <td><?php echo $row['marks']; ?></td>


                    </tr>
                <?php }}else{ ?>
                <tr><td colspan="5">No Data Found.</td></tr>
                <?php } ?>
            </tbody>
        </table>



    </div>

</div>

<?php
include 'footer.php';
?>