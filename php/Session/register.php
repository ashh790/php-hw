<?php
include 'db.php';
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $name=$_POST["name"];
    $email=$_POST["email"];
    $password=password_hash($_POST["password"],PASSWORD_DEFAULT);

    $sql=$conn->prepare("insert into user values(?,?,?)");
    $sql->bind_param('sss',$name,$email,$password);
    if($sql->execute()){
        header("Location:login.php");
    }
}
?>
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
    <input type="text" name="name"><br><br>

    Email:
    <input type="password" name="email"><br><br>

    Password:
    <input type="password" name="pass"><br><br>

    <button type="submit">Submit</button>
</form>
</body>
</html>