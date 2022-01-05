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
      $qry2 = "select * from tbl_student join tbl_standards on tbl_student.standard_id=tbl_standards.standard_id where student_id = '$stdID'";
      $ds2 = mysqli_query($con, $qry2);
      while ($row2 = $ds2->fetch_array()) {
        $sub = explode(",", $row2['subject_id']);
        $s = $row2['subject_id'];
        $qry3= "select * from tbl_subject where subject_id in ($s)";
        $ds3 = mysqli_query($con, $qry3);
        while ($row3 = $ds3->fetch_array()) {
           echo "<br>".$row3["name"];
        }
        // for($i=0;$i<mysqli_num_rows($ds3);$i++){
        // } 
      ?>
      
        <h4 class="card-title"><b>Name :-</b><?php echo $row2['firstname'] . " " . $row2['lastname']; ?></h4>
        <p class="card-text"><b>Standard :</b><?php echo $row2['standard_name']; ?></p>
      <?php } ?>
    </div>
  </div>
  </br>
  <div class="card-deck">

    <?php
    $stdID = $_SESSION['USERID'];
    $qry = "select * from tbl_lectures join tbl_subject on tbl_lectures.subject_id=tbl_subject.subject_id  where stream_id in (select stream_id from tbl_student where student_id = '$stdID') order by tbl_lectures.lecture_start asc";
    $ds = mysqli_query($con, $qry);
    while ($row = $ds->fetch_array()) {


      $qry4 = "select * from tbl_subject where subject_id in ($s)";
      $ds4 = mysqli_query($con, $qry4);
      while ($row4 = $ds4->fetch_array()) {
       
        if($row4['subject_id']==$row['subject_id'])
{
    ?>

      <div class="card bg-warning">
        <div class="card-body text-center">
          <p class="card-text"><b>Subject:- <?php echo $row4['name']; ?></b></p>
          <p class="card-text">Lecture Day :- <?php
                                              $nameOfDay = date('l', strtotime($row['lecture_start']));
                                              echo $nameOfDay;
                                              ?></p>
          <p class="card-text">Start Time:- <?php

                                            echo $row['lecture_start']; ?></p>
          <p class="card-text">End Time:- <?php echo $row['lecture_end']; ?></p>
          <p class="card-text"><a href='<?php echo $row['lecture_link']; ?>'>Lecture Link</a></p>
        </div>
      </div>

    <?php }}} ?>
  </div>

</div>

<?php
include 'footer.php';
?>