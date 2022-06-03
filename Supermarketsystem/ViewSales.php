<?php 
    
    require_once('./config/dbconfig.php'); 
    $db = new Sales();
    $result=$db->view_record();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>View Sales</title>
</head>
<body class="bg-dark">

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="text-center text-dark">==== Sales Records ====</h2>
                    </div>
                    <div class="card-body">
                        <?php
                              $db->display_message(); 
                              $db->display_message();
                        ?>
                        <table class="table table-bordered">
                            <tr>
                                <td style="width: 10%"> InvoiceNo </td>
                                <td style="width: 10%"> SalesDate </td>
                                <td style="width: 20%"> SalesQuantity </td>
                                <td style="width: 20%"> SalesUnitPrice </td>
                            </tr>
                            <tr>
                                <?php 
                                    while($data = mysqli_fetch_assoc($result))
                                    {
                                ?>
                                    <td><?php echo $data['InvoiceNo'] ?></td>
                                    <td><?php echo $data['SalesDate'] ?></td>
                                    <td><?php echo $data['SalesQuantity'] ?></td>
                                    <td><?php echo $data['SalesUnitPrice'] ?></td>
				    <td><a href="Registersales.php?InvoiceNo=<?php echo $data['InvoiceNo'] ?>" class="btn btn-success">Register Sales</a></td>
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