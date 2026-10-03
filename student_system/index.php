<?php
include "db.php";

$result = $conn->query("SELECT * FROM students ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>

    <title>Student Record System</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-body">

            <div class="d-flex justify-content-between mb-3">

                <h3>Student Records</h3>

                <a href="add.php" class="btn btn-primary">
                    Add Student
                </a>

            </div>

            <table class="table table-bordered">

                <thead class="table-primary">

                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Year</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>

                </thead>

                <tbody>

                <?php while ($row = $result->fetch_assoc()) { ?>

                    <tr>

                        <td>
                            <?php echo $row['id']; ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($row['name']); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($row['course']); ?>
                        </td>

                        <td>
                            <?php echo $row['year_level']; ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($row['email']); ?>
                        </td>

                        <td>

                            <a
                                href="edit.php?id=<?php echo $row['id']; ?>"
                                class="btn btn-warning btn-sm"
                            >
                                Edit
                            </a>

                            <a
                                href="delete.php?id=<?php echo $row['id']; ?>"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Delete this student?')"
                            >
                                Delete
                            </a>

                        </td>

                    </tr>

                <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>