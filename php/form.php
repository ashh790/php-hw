<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Check</title>
</head>
<body>

<form method="POST">
    Password:
    <input type="password" name="pass"><br><br>

    Confirm Password:
    <input type="password" name="cpass"><br><br>

    <button type="submit">Submit</button>
</form>

</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST['pass'];
    $cpassword = $_POST['cpass'];

    if (empty($password) || empty($cpassword)) {
        echo "<script>alert('Please fill both password fields');</script>";
    }
    elseif ($password == $cpassword) {
        echo "<script>alert('Passwords match. Form submitted successfully');</script>";
    }
    else {
        echo "<script>alert('Passwords do not match');</script>";
    }
}
?>