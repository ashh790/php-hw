<form method="POST">
    Name:
    <input type="text" name="Name"><br><br>

    Address:
    <input type="text" name="Address"><br><br>

    Salary:
    <input type="number" name="Salary"><br><br>

    <input type="submit" value="Submit">
</form>

<?php
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $Name = $_POST["Name"];
    $Address = $_POST["Address"];
    $Salary = $_POST["Salary"];

    echo "Name: " . $Name . "<br>";
    echo "Address: " . $Address . "<br>";
    echo "Salary: " . $Salary . "<br>";
}
?>