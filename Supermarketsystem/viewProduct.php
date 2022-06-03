<?php 
    
    require_once('./config/dbconfig.php'); 
    $db = new operationss();
    $result=$db->view_record();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>View Product</title>
</head>
<body class="bg-dark">

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="text-center text-dark"> Product Records</h2>
                    </div>
                    <div class="card-body">
                        <?php
                              $db->display_message(); 
                              $db->display_message();
                        ?>
                        <table class="table table-bordered">
                            <tr>
                                <td style="width: 10%"> ProductID </td>
                                <td style="width: 10%"> ProductName </td>
                                <td style="width: 20%"> Measurement </td>
                                <td style="width: 20%"> Quantity</td>
                                <td style="width: 20%"> UnitPrice </td>
				             <td style="width: 20%"> ExpiryDate</td>
                            </tr>
                            <tr>
                                <?php 
                                    while($data = mysqli_fetch_assoc($result))
                                    {
                                ?>
                                    <td><?php echo $data['ProductID'] ?></td>
                                    <td><?php echo $data['ProductName'] ?></td>
                                    <td><?php echo $data['Measurement'] ?></td>
                                    <td><?php echo $data['Quantity'] ?></td>
                                    <td><?php echo $data['UnitPrice'] ?></td>
				                    <td><?php echo $data['EXpiryDate'] ?></td>
                            </tr>
                            <?php
                                    }
                                ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>