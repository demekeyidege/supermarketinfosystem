<?php 
    
    require_once('./config/dbconfig.php'); 
    $db = new operations();
    $result=$db->view_record();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>View customer</title>
</head>
<body class="bg-dark">

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="text-center text-dark"> Customer Informations</h2>
                    </div>
                    <div class="card-body">
                        <?php
                              $db->display_message(); 
                              $db->display_message();
                        ?>
                        <table class="table table-bordered">
                            <tr>
                                <td style="width: 10%"> CustomerID </td>
                                <td style="width: 10%"> Name </td>
                                <td style="width: 20%"> TIN </td>
                                <td style="width: 20%"> Mobile </td>
                                <td style="width: 20" colspan="2">Operations</td>
                            </tr>
                            <tr>
                                <?php 
                                    while($data = mysqli_fetch_assoc($result))
                                    {
                                ?>
                                    <td><?php echo $data['CustomerID'] ?></td>
                                    <td><?php echo $data['Name'] ?></td>
                                    <td><?php echo $data['TIN'] ?></td>
                                    <td><?php echo $data['Mobile'] ?></td>
                                    <td><a href="editCustomer.php?U_ID=<?php echo $data['CustomerID'] ?>" class="btn btn-success">Edit</a></td>
                                    <td><a href="delCustomer.php?D_ID=<?php echo $data['CustomerID'] ?>" class="btn btn-danger">Del</a></td>
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