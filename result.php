<?php
include 'header.php';
include 'admin/conn.php';
?>

<div class="container">
  <h3>Result</h3>

  <table class="table table-borderd">
    <thead>
      <tr>
        <td>Subject Name</td>
        <td>Standard Name</td>
        <td>Exam Date</td>
        <td>Topic</td>
        <td>Marks</td>

      </tr>
    </thead>
    <tbody>
      <?php
      $stdID = $_SESSION['USERID'];
      $qry = "select * from tbl_result join tbl_subject on tbl_result.subject_id=tbl_subject.subject_id join tbl_standards on tbl_result.standard_id=tbl_standards.standard_id where student_id='$stdID'";
      $ds = mysqli_query($con, $qry);
      while ($row = $ds->fetch_array()) {
      ?>
        <tr>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['standard_name']; ?></td>
          <td><?php echo $row['exam_date_time']; ?></td>
          <td><?php echo $row['exam_topic']; ?></td>
          <td><?php echo $row['marks']; ?></td>


        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<?php
include 'footer.php';
?>