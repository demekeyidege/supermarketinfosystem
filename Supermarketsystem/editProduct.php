<?php 
    require_once('./config/dbconfig.php'); 
    $db = new operationss();
    $db->update();
    $ISBN = $_GET['U_ID'];
    $result = $db->get_record($ISBN);
    $data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Update Product Information </title>
</head>
<body class="bg-dark">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2> Update Product Information </h2>
                    </div>
                        <?php $db->Store_record(); ?>
                        <div class="card-body">
                            <form method="POST">
                                ProductID:<input type="number" name="ProductID" placeholder=" ProductID" class="form-control mb-2" required value="<?php echo $data['ProductID']; ?>">
                                ProductName: <input type="text" name="ProductName" placeholder=" ProductName" class="form-control mb-2" required value="<?php echo $data['ProductName']; ?>">
                                Measurement: <input type="text" name="Measurement" placeholder=" Measurement" class="form-control mb-2" required value="<?php echo $data['Measurement']; ?>">
                                Quantity: <input type="number" name="Quantity" placeholder=" Quantity" class="form-control mb-2" required value="<?php echo $data['Quantity']; ?>">	
                                UnitPrice: <input type="number" name="UnitPrice" placeholder=" UnitPrice" class="form-control mb-2" required value="<?php echo $data['UnitPrice']; ?>">
				ExpiryDate: <input type="text" name="ExpiryDate" placeholder="ExpiryDate" class="form-control mb-2" required value="<?php echo $data['ExpiryDate']; ?>">
                        </div>
                    <div class="card-footer">
                            <button class="btn btn-success" name="btn_update"> Update </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>