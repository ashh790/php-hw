<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST">
        ID:
        <input type="number" name="id"><br>
        Name:
        <input type="text" name="name"><br>
       Address:
        <input type="text" name="address"><br>
        <button type="submit">Submit</button>
</form>
</body>
</html>
<?php
include 'db.php';
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $id=$_POST["id"];
    $name=$_POST["name"];
    $address=$_POST["address"];

    $sql=$conn->prepare("insert into emp values(?,?,?)");
    $sql->bind_param('iss',$id,$name,$address);
    if($sql->execute()){
        echo "Inserted";
    }else{
        echo "Not Inserted";
    }
    }
    ?>
    echo "<script>alert('Data Inserted')</script>";