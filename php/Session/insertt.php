<?php
include 'db.php';
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $product_id=$_POST["product_id"];
    $product_name=$_POST["product_name"];
    $quantity=$_POST["quantity"];

    $sql=$conn->prepare("insert into product values(?,?,?)");
    $sql->bind_param('iss',$product_id,$product_name,$quantity);
    if($sql->execute()){
        echo "Inserted";
    }else{
        echo "Not Inserted";
    }
    }
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome User</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow p-4" style="width: 400px;">
        
        <h3 class="text-center mb-4">Add Product</h3>

        <form method="POST">

            <div class="mb-3">
                <label class="form-label">Product_id</label>
                <input type="text" name="product_id" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Product_name</label>
                <input type="text" name="product_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Quantity</label>
                <input type="text" name="quantity" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-dark w-100">Submit</button>

        </form>

    </div>
</div>

</body>
</html>