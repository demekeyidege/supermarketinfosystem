<?php 

    require_once('./config/dbconfig.php');
    $db = new operationss();
    
    if(isset($_GET['ProductID']))
    {
        global $db;
        $ProductID = $_GET['ProductID'];

        if($db->Delete_Record($ProductID))
        {
            $db->set_messsage('<div class="alert alert-danger">  Your Product Record Has Been Deleted </div>');
            header("location:viewProduct.php");
        }
        else
        {
            $db->set_messsage('<div class="alert alert-danger">  Something Went Wrong </div>'); 
        }
    }


?>