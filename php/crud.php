<?php
include 'db.php';

// INSERT
if (isset($_POST['insert'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $address = $_POST['address'];

    if (empty($id) || empty($name) || empty($address)) {
        echo "<script>alert('All fields are required for Insert');</script>";
    } else {
        $sql = $conn->prepare("INSERT INTO emp (id, name, address) VALUES (?, ?, ?)");
        $sql->bind_param("iss", $id, $name, $address);

        if ($sql->execute()) {
            echo "<script>alert('Data Inserted Successfully');</script>";
        } else {
            echo "<script>alert('Insert Failed');</script>";
        }
    }
}

// UPDATE
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];

    if (empty($id) || empty($name)) {
        echo "<script>alert('ID and Name are required for Update');</script>";
    } else {
        $sql = $conn->prepare("UPDATE emp SET name=? WHERE id=?");
        $sql->bind_param("si", $name, $id);

        if ($sql->execute()) {
            echo "<script>alert('Data Updated Successfully');</script>";
        } else {
            echo "<script>alert('Update Failed');</script>";
        }
    }
}

// DELETE
if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    if (empty($id)) {
        echo "<script>alert('ID is required for Delete');</script>";
    } else {
        $sql = $conn->prepare("DELETE FROM emp WHERE id=?");
        $sql->bind_param("i", $id);

        if ($sql->execute()) {
            echo "<script>alert('Data Deleted Successfully');</script>";
        } else {
            echo "<script>alert('Delete Failed');</script>";
        }
    }
}

// SHOW
$result = $conn->query("SELECT * FROM emp");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single CRUD Operation</title>
</head>
<body>

    <h2>CRUD Operation</h2>

    <form method="POST">
        ID:
        <input type="number" name="id"><br><br>

        Name:
        <input type="text" name="name"><br><br>

        Address:
        <input type="text" name="address"><br><br>

        <button type="submit" name="insert">Insert</button>
        <button type="submit" name="update">Update</button>
        <button type="submit" name="delete">Delete</button>
    </form>

    <br><br>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>ADDRESS</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["name"]; ?></td>
                <td><?php echo $row["address"]; ?></td>
            </tr>
        <?php } ?>
    </table>

</body>
</html>