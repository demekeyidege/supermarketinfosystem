<?php 
    require_once('./config/dbconfig.php'); 
    $db = new operationss();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Product Registration</title>
</head>
<body class="bg-dark">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2> Product Registration Form </h2>
                    </div>
                        <?php $db->Store_Record(); ?>
                        <div class="card-body">
                            <form method="POST">
                                Product_ID: <input type="text" name="ProductID" placeholder=" ProductID" class="form-control mb-2" required>
                               Product_Name: <input type="text" name="ProductName" placeholder="Product Name" class="form-control mb-2" required>
                               Measurement: <input type="text" name="Measurement" placeholder="Measurement" class="form-control mb-2" required>
                               
                              <br> Quantity: <input type="number" name="Quantity" placeholder="Quantity" class="form-control mb-2" required>
                              Unitprice: <input type="text" name="UnitPrice" placeholder="UnitPrice" class="form-control mb-2" required>
                               
                              <br> ExpiryDate: <input type="date" name="ExpiryDate" placeholder="ExpiryDate" class="form-control mb-2" required>
                        </div>
                    <div class="card-footer">
                            <button class="btn btn-success" name="btn_save"> Save </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>