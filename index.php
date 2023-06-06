<?php
$title = "ALL STUDENTS";
include "includes/header.php";
include("dbconn.php");
?>


<table class="table table-bordered table-striped table-hover">
    <div id="box1">
        <h2>ALL STUDENTS</h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">ADD STUDENT</button>
    </div>
    <thead>
        <tr>
            <th>ID</th>
            <th>STUDENT ID</th>
            <th>FIRSTNAME</th>
            <th>LASTNAME</th>
            <th>MATICULATION NUMBER</th>
            <th>UPDATE</th>
            <th>DELETE</th>
        </tr>
    </thead>

    <tbody>

        <?php
        // Read data from database
        $query = "select * from student_management";

        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("Fetching Data Failed" . mysqli_error($conn));
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['student_id']; ?></td>
                    <td><?php echo $row['firstname']; ?></td>
                    <td><?php echo $row['lastname']; ?></td>
                    <td><?php echo $row['matric_no']; ?></td>
                    <td><a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">UPDATE</a></td>
                    <td><a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">DELETE</a></td>
                </tr>
        <?php
            }
        }
        ?>
    </tbody>
</table>

<?php

if (isset($_GET['add_student'])) {
    echo "<h6>" . $_GET['add_student'] . "</h6>";
}

?>

<?php

if (isset($_GET['update_msg'])) {
    echo "<h6>" . $_GET['update_msg'] . "</h6>";
}

?>

<?php

if (isset($_GET['delete_data'])) {
    echo "<h6>" . $_GET['delete_data'] . "</h6>";
}

?>




<form action="add_student.php" method="post">

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">ADD STUDENT</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h6 style="color: red; text-align:left;">Please input all data in Block Letters!</h6>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">STUDENT ID</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="student_id">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">FIRSTNAME</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="firstname">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">LASTNAME</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="lastname">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">MATRICULATION NUMBER</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="matric_no">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
                    <input type="submit" class="btn btn-success" name="add_student" value="ADD">
                </div>
            </div>
        </div>
    </div>
</form>

<?php include "includes/footer.php"; ?>