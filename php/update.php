<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
</head>
<body>

<form method="POST">
    ID:
    <input type="number" name="id"><br>

    Name:
    <input type="text" name="name"><br>

    <button type="submit">Submit</button>
</form>

</body>
</html>

<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $id = $_POST["id"];
    $name = $_POST["name"];

    if (empty($id) || empty($name)) {
        echo "<script>alert('All fields are required');</script>";
    } else {

        $sql = $conn->prepare("UPDATE emp SET name=? WHERE id=?");
        $sql->bind_param('si', $name, $id);

        if ($sql->execute()) {
            echo "<script>alert('Data Updated Successfully');</script>";
        } else {
            echo "<script>alert('Update Failed');</script>";
        }
    }
}
?>