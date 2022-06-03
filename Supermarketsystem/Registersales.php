<?php 
    require_once('./config/dbconfig.php'); 
    $db = new Sales();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Add Sales</title>
</head>
<body class="bg-dark">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2>==== Add Sales ==== </h2>
                    </div>
                        <?php $db->Store_Record(); ?>
                        <div class="card-body">
                            <form method="POST">
                                InvoiceNo:<input type="number" name="InvoiceNo" placeholder=" InvoiceNo" class="form-control mb-2">
                                SalesDate: <input type="date" name="SalesDate" placeholder=" SalesDate" class="form-control mb-2"  >
                                SalesQuantity: <input type="number" name="SalesQuantity" placeholder=" SalesQuantity" class="form-control mb-2">
                                SalesUnitPrice: <input type="text" name="SalesUnitPrice" placeholder=" SalesUnitPrice" class="form-control mb-2">
                        </div>
                    <div class="card-footer">
                            <button class="btn btn-success" name="btn_update">Register Sales</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>