<?php 
    require_once('./config/dbconfig.php'); 
    $db = new operations();
    $db->update();
    $id = $_GET['U_ID'];
    $result = $db->get_record($id);
    $data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Update cust.</title>
</head>
<body class="bg-dark">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2> Update Customer Record </h2>
                    </div>
                        <?php $db->Store_Record(); ?>
                        <div class="card-body">
                            <form method="POST">
                                <input type="hidden" name="CustomerID" value="<?php echo $data['CustomerID']; ?>">
                                Name: <input type="text" name="Name" placeholder="Name" class="form-control mb-2" required value="<?php echo $data['Name']; ?>">
                                TIN: <input type="text" name="TIN" placeholder="TIN" class="form-control mb-2" required value="<?php echo $data['TIN']; ?>">	
                                <br>Mobile:<input type="phone" name="Mobile" placeholder="Mobile" class="form-control mb-2" required value="<?php echo $data['Mobile']; ?>">
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