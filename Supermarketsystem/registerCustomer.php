<?php 
    require_once('./config/dbconfig.php'); 
    $db = new operations();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>=== Please Register customer ===</title>
</head>
<body class="bg-dark">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2>Please Register Your Customer</h2>
                    </div>
                        <?php $db->Store_Record(); ?>
                        <div class="card-body">
                            <form method="POST">
                               Customer_ID: <input type="text" name="CustomerID" placeholder=" CustomerID" class="form-control mb-2" required>
                               Name: <input type="text" name="Name" placeholder="Name" class="form-control mb-2" required>
                               TIN: <input type="number" name="TIN" placeholder="TIN" class="form-control mb-2" required>
                               
                              <br> Mobile: <input type="number" name="Mobile" placeholder=" Mobile" class="form-control mb-2" required>
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