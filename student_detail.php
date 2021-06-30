<?php
include("config/conn.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?=URL?>bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=URL?>css/data_table.css">
    <link rel="stylesheet" href="<?=URL?>css/style.css">

</head>

<body>

    <div class="container mt-4 main_container">
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <div class="flex">
                <div class="col-sm-12 col-md-6">
                    <div class="application_name">
                        <h4>Enrollment App</h4>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="add_student">
                        <a href="<?=URL?>index.php"> <button class="btn btn-secondary">New student</button></a>
                    </div>
                </div>
            </div>
            <thead>
                <tr>
                    <th>SNo.</th>
                    <th>Student Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>class</th>
                    <th>Marks(%)</th>
                    <th>Edit</th>
                </tr>
            </thead>

            <tbody>
                <?php
                $sql = "SELECT * FROM `user_detail`";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <tr id="table_data">


                            <td><?= $row['id'] ?></td>
                            <td><?= $row['student_name'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['phone'] ?></td>
                            <td><?= $row['class'] ?></td>
                            <td><?= $row['marks'] ?></td>
                            <td>
                                <a href="<?= URL ?>index.php?id=<?= $row['id']; ?>"><button class="btn btn-danger">Edit</button></a>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal<?= $row['id'] ?>">View</button>
                            </td>
                            <div class="modal fade" id="exampleModal<?= $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><?= $row['student_name'];
                                                                                            ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Name: <?= $row['student_name'] ?></p>
                                            <p>Email: <?= $row['email'] ?></p>
                                            <p>Phone: <?= $row['phone'] ?></p>
                                            <p>Class: <?= $row['class'] . "th" ?></p>
                                            <p>Marks: <?= $row['marks'] . "%" ?></p>
                                            <p>Address: <?= $row['address'] ?></p>
                                            <p>State: <?= $row['state'] ?></p>
                                            <p>City: <?= $row['city'] ?></p>
                                            <p>Registered On: <?= date('d-m-Y h:i:s', $row['date']) ?> </p>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>


                <?php

                    }
                }
                ?>




            </tbody>

        </table>


       



    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?=URL?>bootstrap/js/bootstrap.min.js"></script>


    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>


</body>

</html>