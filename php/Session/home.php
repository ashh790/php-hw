<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $age = $_POST["age"];
    $salary = $_POST["salary"];
    $email = $_POST["email"];

    $roq = $conn->prepare("INSERT INTO employee (name, age, salary, email) VALUES (?, ?, ?, ?)");
    $roq->bind_param("sids", $name, $age, $salary, $email);

    if ($roq->execute()) {
        header("Location: home.php");
        exit();
    } else {
        echo "Insert error: " . $roq->error;
    }
}

// Fetch employee records
$result = $conn->query("SELECT * FROM employee");
?>

<!doctype html>
<html lang="en">
<head>
    <title>Home | Employee List</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    />
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow mb-4">
        <div class="card-header bg-dark text-white">
            <h3 class="mb-0">
                Hello, <?php echo isset($_SESSION["name"]) ? htmlspecialchars($_SESSION["name"]) : "Ash"; ?>
            </h3>
        </div>
    </div>

    <!-- Insert Form -->
    <div class="card shadow mb-4">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Add Employee</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="">
                <div class="row mb-3">
                    <div class="col-md-3">
                        <input type="text" name="name" class="form-control" placeholder="Enter name" required>
                    </div>
                    <div class="col-md-2">
                        <input type="number" name="age" class="form-control" placeholder="Enter age" required>
                    </div>
                    <div class="col-md-2">
                        <input type="number" step="0.01" name="salary" class="form-control" placeholder="Enter salary" required>
                    </div>
                    <div class="col-md-3">
                        <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-success w-100">Insert</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Employee Table -->
    <div class="card shadow">
        <div class="card-header bg-secondary text-white">
            <h4 class="mb-0">Employee List</h4>
        </div>
        <div class="card-body">
            <?php if ($result && $result->num_rows > 0) { ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Salary</th>
                                <th>Email</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row["id"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["name"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["age"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["salary"]); ?></td>
                                    <td><?php echo htmlspecialchars($row["email"]); ?></td>
                                    <td>
                                        <a href="updatee.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                    </td>
                                    <td>
                                        <a href="deletee.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } else { ?>
                <div class="alert alert-warning mb-0">No employee records found.</div>
            <?php } ?>
        </div>
    </div>

</div>

</body>
</html>