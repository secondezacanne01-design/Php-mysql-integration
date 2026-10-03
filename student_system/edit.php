<?php
include "db.php";

$id = $_GET['id'];

$result = $conn->query(
    "SELECT * FROM students WHERE id = $id"
);

$student = $result->fetch_assoc();

if (isset($_POST['update'])) {

    $name = $_POST['name'];
    $course = $_POST['course'];
    $year = $_POST['year_level'];
    $email = $_POST['email'];

    $stmt = $conn->prepare(
        "UPDATE students
         SET name=?, course=?, year_level=?, email=?
         WHERE id=?"
    );

    $stmt->bind_param(
        "ssisi",
        $name,
        $course,
        $year,
        $email,
        $id
    );

    $stmt->execute();

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>Edit Student</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-body">

            <h3 class="mb-4">Edit Student</h3>

            <form method="POST">

                <div class="mb-3">

                    <label>Name</label>

                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        value="<?php echo htmlspecialchars($student['name']); ?>"
                        required
                    >

                </div>

                <div class="mb-3">

                    <label>Course</label>

                    <input
                        type="text"
                        name="course"
                        class="form-control"
                        value="<?php echo htmlspecialchars($student['course']); ?>"
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

                        <option value="1" <?php if ($student['year_level'] == 1) echo "selected"; ?>>
                            1st Year
                        </option>

                        <option value="2" <?php if ($student['year_level'] == 2) echo "selected"; ?>>
                            2nd Year
                        </option>

                        <option value="3" <?php if ($student['year_level'] == 3) echo "selected"; ?>>
                            3rd Year
                        </option>

                        <option value="4" <?php if ($student['year_level'] == 4) echo "selected"; ?>>
                            4th Year
                        </option>

                    </select>

                </div>

                <div class="mb-3">

                    <label>Email</label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        value="<?php echo htmlspecialchars($student['email']); ?>"
                    >

                </div>

                <button
                    type="submit"
                    name="update"
                    class="btn btn-success"
                >
                    Update
                </button>

                <a
                    href="index.php"
                    class="btn btn-secondary"
                >
                    Cancel
                </a>

            </form>

        </div>

    </div>

</div>

</body>
</html>