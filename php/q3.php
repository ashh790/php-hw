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
    <input type="text" name="Name"><br>

    Age:
    <input type="text" name="Age"><br>

   Gender:
   <select name ="Gender">
    <option value ="Male">Male</option>
    <option value ="Female">FeMale</option>
    <option value ="Other">other</option>
</select>

    <button type="submit" value="Submit">Submit</button><br>
</form>
</body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $Name = $_POST["Name"];
    $Age = $_POST["Age"];
    $Gender = $_POST["Gender"];

   echo "Hello,$Name.you are $Age years old and identity as $Gender";
}
?>