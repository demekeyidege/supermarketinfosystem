<?php 

    require_once('./config/dbconfig.php');
    $db = new operations();
    
    if(isset($_GET['CustomerID']))
    {
        global $db;
        $CustomerID = $_GET['CustomerID'];

        if($db->Delete_Record($CustomerID))
        {
            $db->set_messsage('<div class="alert alert-danger">  Your Customer Record Has Been Deleted </div>');
            header("location:viewCustomer.php");
        }
        else
        {
            $db->set_messsage('<div class="alert alert-danger">  Something Went Wrong </div>'); 
        }
    }


?>