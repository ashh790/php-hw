<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        Name:
        <input type="text" name="name"><br>

        Password:
        <input type="password" name="pass"><br>

        Confirm Password:
        <input type="password" name="cpass"><br>

        Email:
        <input type="email" name="email"><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>

<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    $password = $_POST["pass"];
    $confirmpassword = $_POST["cpass"];
    $email = $_POST["email"];

    if (empty($name) || empty($password) || empty($confirmpassword) || empty($email)) {
        echo "<script>alert('Fields are compulsory');</script>";
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Email is incorrect');</script>";
    }
    elseif ($password != $confirmpassword) {
        echo "<script>alert('Passwords do not match');</script>";
    }
    else {
        echo "<script>alert('Submitted');</script>";
    }
}

?>