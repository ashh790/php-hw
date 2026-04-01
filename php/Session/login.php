<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST["name"]);
    $pass = trim($_POST["password"]);

    $sql = $conn->prepare("SELECT password FROM user WHERE name = ?");
    $sql->bind_param("s", $name);
    $sql->execute();
    $sql->store_result();

    if ($sql->num_rows > 0) {
        $sql->bind_result($hashedPassword);
        $sql->fetch();

        if (password_verify($pass, $hashedPassword)) {
            $_SESSION["name"] = $name;
            header("Location: home.php");
            exit();
        } else {
            echo "Wrong password";
        }
    } else {
        echo "User not found";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome User</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow p-4" style="width: 400px;">
        
        <h3 class="text-center mb-4">Login</h3>

        <form method="POST">

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-dark w-100">Login</button>

        </form>

    </div>
</div>

</body>
</html>