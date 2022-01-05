<?php
include 'header.php';
include 'admin/conn.php';
?>
<br/>

<div class="row">
    <div class="col-md-4">

    </div>
    <div class="col-md-4 card" style="padding: 10px;">
        <h2>Sign In</h2>

        <form method="post">

            <div class="form-group">
                <label for="email">User Type:</label>
                <select class="form-control" name="type">
                    <option value="0">--Select Type--</option>
                    <option value="1">Faculty</option>
                    <option value="2">Student</option>

                </select>
            </div>

            <div class="form-group" required>
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>
            <div class="form-group" required>
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
            </div>
            <button type="submit" name="btnSave" class="btn btn-primary">Sign In</button>
        </form>
    </div>
    <div class="col-md-4">
    </div>

</div>
<br>
<script>
    $(document).ready(function() {


        $('#email').on("change", function() {

            ValidateEmail();
        });




        function ValidateEmail() {
            if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email.value)) {
                return (true)
            }
            alert("You have entered an invalid email address!")
            $("#email").focus();
            return (false)
        }
    });
</script>
<?php
include 'footer.php';
?>

<?php

if (isset($_POST['btnSave'])) {
    $email = $_POST['email'];
    $pass = $_POST['pswd'];
    $type = $_POST['type'];

    if ($type == "2") {
        $qry = "select * from tbl_student where email='$email' and phone='$pass'";
        $ans = mysqli_query($con, $qry);
        while ($data = $ans->fetch_array()) {
            $_SESSION['USERID'] = $data['student_id'];
            $_SESSION['USERNAME'] = $email;
            $_SESSION['TYPE'] = "2";
            echo "<script>location.href='dashboard.php';</script>";
        }
    } else {
        $pass = md5($pass);
        $qry = "select * from tbl_faculty where email='$email' and password='$pass'";
        $ans = mysqli_query($con, $qry);
        while ($data = $ans->fetch_array()) {
            $_SESSION['USERID'] = $data['faculty_id'];
            $_SESSION['USERNAME'] = $email;
            $_SESSION['TYPE'] = "1";
            echo "<script>location.href='dashboard_faculty.php';</script>";
        }
    }
}
?>