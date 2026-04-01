<?php
include 'db.php';                //fetch querry code

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = $conn->prepare("SELECT * FROM employee WHERE id=?");
    $sql->bind_param("i", $id);
    
    if ($sql->execute()) {
        $user = $sql->get_result()->fetch_assoc();
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];                              //update querry code
    $salary = $_POST["salary"];
    $age = $_POST["age"];
    $email = $_POST["email"];

    $sql = $conn->prepare("UPDATE employee SET name=?, salary=?, age=?, email=? WHERE id=?");
    $sql->bind_param("sdisi", $name, $salary, $age, $email, $id);

    if ($sql->execute()) {
        header("Location: home.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow p-4" style="width: 400px;">
        
        <h3 class="text-center mb-4">Update Employee</h3>

        <form method="POST">

            <div class="mb-3">
                <label class="form-label">Employee Name</label>
                <input type="text" name="name" value="<?= $user["name"] ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Employee Age</label>
                <input type="number" name="age" value="<?= $user["age"] ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Employee Salary</label>
                <input type="number" step="0.01" name="salary" value="<?= $user["salary"] ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Employee Email</label>
                <input type="email" name="email" value="<?= $user["email"] ?>" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-dark w-100">Submit</button>

        </form>

    </div>
</div>

</body>
</html>