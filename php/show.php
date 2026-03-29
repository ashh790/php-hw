<?php
include 'db.php';
$result=$conn->query("select * from emp");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1" cellpadding="12" cellspacing="3" >
        <tr>
            <td>ID</td>
            <td>NAME</td>
            <td>ADDRESS</td>
        </tr>
</body>
</html>
<?php
while($row=$result->fetch_assoc()){?>
<tr>
    <td><?php echo $row["id"]?></td>
    <td><?php echo $row["name"]?></td>
    <td><?php echo $row["address"]?></td>   
</tr>
<?php }?>