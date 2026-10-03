<?php
include "db.php";

if (isset($_POST['add'])) {

    $name = $_POST['name'];
    $course = $_POST['course'];
    $year = $_POST['year_level'];
    $email = $_POST['email'];

    $stmt = $conn->prepare(
        "INSERT INTO students (name, course, year_level, email)
         VALUES (?, ?, ?, ?)"
    );

    $stmt->bind_param(
        "ssis",
        $name,
        $course,
        $year,
        $email
    );

    $stmt->execute();

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>Add Student</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-body">

            <h3 class="mb-4">Add Student</h3>

            <form method="POST">

                <div class="mb-3">

                    <label>Name</label>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        required
                    >

                </div>

                <div class="mb-3">

                    <label>Course</label>

                    <input
                        type="text"
                        name="course"
                        class="form-control"
                        required
                    >

                </div>

                <div class="mb-3">

                    <label>Year Level</label>

                    <select
                        name="year_level"
                        class="form-select"
                        required
                    >

                        <option value="">Select Year</option>
                        <option value="1">1st Year</option>
                        <option value="2">2nd Year</option>
                        <option value="3">3rd Year</option>
                        <option value="4">4th Year</option>

                    </select>

                </div>

                <div class="mb-3">

                    <label>Email</label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                    >

                </div>

                <button
                    type="submit"
                    name="add"
                    class="btn btn-primary"
                >
                    Add Student
                </button>

                <a
                    href="index.php"
                    class="btn btn-secondary"
                >
                    Back
                </a>

            </form>

        </div>

    </div>

</div>

</body>
</html>