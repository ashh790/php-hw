<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="GET">
    Email:
    <input type="email" name="email"><br>

    Password:
    <input type="Password" name="pass"><br>
    Are you Subscibed?
    <input type="checkbox" name="subscribed" value ="Yes"><br>
    <button type ="Submit">Submit</button>
    
</body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"] === "GET"){
    $email = $_GET["email"];
    $password = $_GET["pass"];
    $subscribe =isset($_GET["subscribed"])?"Subscribed":"Not Subscribed";

   echo "Thankyou for signing up $email You have Sucessfully $subscribe to the Newslatter";
}
?>