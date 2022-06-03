<?php 

    
    require_once('./config/dbconfig.php');
    $db = new dbconfig();

    class operationss extends dbconfig
    {
        // Insert Record in the Database
        public function Store_Record()
        {
            global $db;
            if(isset($_POST['btn_save']))
            {
                $ProductID = $db->check($_POST['ProductID']);
                $ProductName = $db->check($_POST['ProductName']);
                $Measurement = $db->check($_POST['Measurement']);
                $Quantity = $db->check($_POST['Quantity']);
		        $UnitPrice = $db->check($_POST['UnitPrice']);
		        $ExpiryDate = $db->check($_POST['ExpiryDate']);

                if($this->insert_record($ProductID,$ProductName,$Measurement,$Quantity,$UnitPrice,$ExpiryDate))
                {
                    echo '<div class="alert alert-success"> Your Product Record Has Been Saved :) </div>';
                }
                else
                {
                    echo '<div class="alert alert-danger"> Failed </div>';
                }
            }
        }

        // Insert Record in the Database Using Query    
        function insert_record($a,$b,$c,$d,$e,$f)
        {
            global $db;
            $query = "insert into products (ProductID,ProductName, Measurement,Quantity,UnitPrice,ExpiryDate) values('$a','$b','$c','$d','$e','$f')";
            $result = mysqli_query($db->connection,$query);

            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }


        // View Database Record
        public function view_record()
        {
            global $db;
            $query = "select * from products";
            $result = mysqli_query($db->connection,$query);
            return $result;
        }

        // Get Particular Record
        public function get_record($ProductID)
        {
            global $db;
            $sql = "select * from products where ProductID='$ProductID'";
            $data = mysqli_query($db->connection,$sql);
            return $data;

        }

        // Update Record
        public function update()
        {
            global $db;

            if(isset($_POST['btn_update']))
            {
                $ProductID = $db->check($_POST['ProductID']);
                $ProductName = $db->check($_POST['ProductName']);
                $Measurement = $db->check($_POST['Measurement']);
                $Quantity = $db->check($_POST['Quantity']);
                $UnitPrice = $db->check($_POST['UnitPrice']);
	         	$ExpiryDate = $db->check($_POST['ExpiryDate']);

                if($this->update_record($ProductID,$ProductName,$Measurement,$Quantity,$UnitPrice,$ExpiryDate ))
                {
                    $this->set_messsage('<div class="alert alert-success"> Your Record Has Been Updated : )</div>');
                    header("location:viewProduct.php");
                }
                else
                {   
                    $this->set_messsage('<div class="alert alert-success"> Something Went Wrong : )</div>');
                }

               
            }
        }

        // Update Function 2
        public function update_record($ProductID,$ProductName,$Measurement,$Quantity,$UnitPrice,$ExpiryDate)
        {
            global $db;
            $sql = "update products set ProductID='$ProductID', ProductName='$ProductName', Measurement='$Measurement', Quantity='$Quantity', UnitPrice='$UnitPrice', ExpiryDate='$ExpiryDate' where ProductID='$ProductID'";
            $result = mysqli_query($db->connection,$sql);
            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }



        // Set Session Message
        public function set_messsage($msg)
        {
            if(!empty($msg))
            {
                $_SESSION['Message']=$msg;
            }
            else
            {
                $msg = "";
            }
        }

        // Display Session Message
        public function display_message()
        {
            if(isset($_SESSION['Message']))
            {
                echo $_SESSION['Message'];
                unset($_SESSION['Message']);
            }
        }

        // Delete Record
        public function Delete_Record($ProductID)
        {
            global $db;
            $query = "delete from products where ProductID='$ProductID'";
            $result = mysqli_query($db->connection,$query);
            if($result)
            {
                return true;
            }
            else
            {
                return false;
            }
        }

      

    }




?>

