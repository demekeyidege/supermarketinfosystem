<?php 
    require_once('./config/dbconfig.php'); 
    $db = new Category();
    $db->update();
    $CategoryID = $_GET['CategoryID'];
    $result = $db->get_record($CategoryID);
    $data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Add Category</title>
</head>
<body class="bg-dark">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2>====Add Category==== </h2>
                    </div>
                        <?php $db->Store_record(); ?>
                        <div class="card-body">
                            <form method="POST">
                                CategoryID:<input type="number" name="CategoryID" placeholder=" CategoryID" class="form-control mb-2">
                                CategoryName: <input type="text" name="Categoryname" placeholder=" Categoryname" class="form-control mb-2"  >
                                CategoryDescription: <input type="text" name="CategoryDescription" placeholder=" CategoryDescription" class="form-control mb-2">
                        </div>
                    <div class="card-footer">
                            <button class="btn btn-success" name="btn_update"> Add Category </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>