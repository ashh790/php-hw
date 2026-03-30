<?php

session_start();

include 'db.php';
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $name=$_POST["name"];
    $pass=$_POST["pass"];

    $sql=$conn->prepare("select password from user where name=?");
    $sql->bind_param('ss',$name);
    $sql->execute();
    $sql->store_result();
    $sql->bind_result($password);
    if($sql->fetch()&&password_verify($pass,$password)){
        $_SESSION["name"]=$name;
        header("Location:home.php");
    }
    else{
        echo"Invalid Credentials";
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