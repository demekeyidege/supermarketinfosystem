<?php 

    
    require_once('./config/dbconfig.php');
    $db = new dbconfig();

    class Sales extends dbconfig
    {
        // Insert Record in the Database
        public function Store_Record()
        {
            global $db;
            if(isset($_POST['btn_save']))
            {
                $InvoiceNo = $db->check($_POST['InvoiceNo']);
                $SalesDate = $db->check($_POST['SalesDate']);
                $SalesQuantity = $db->check($_POST['SalesQuantity']);
                $SalesUnitPrice = $db->check($_POST['SalesUnitPrice']);
		

                if($this->insert_record($InvoiceNo,$SalesDate,$SalesQuantity,$SalesUnitPrice))
                {
                    echo '<div class="alert alert-success"> Your Sales Record Has Been Saved :) </div>';
                }
                else
                {
                    echo '<div class="alert alert-danger"> Failed </div>';
                }
            }
        }

        // Insert Record in the Database Using Query    
        function insert_record($a,$b,$c,$d)
        {
            global $db;
            $query = "insert into sales (InvoiceNo,SalesDate, SalesQuantity,SalesUnitPrice) values('$a','$b','$c','$d')";
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
            $query = "select * from sales";
            $result = mysqli_query($db->connection,$query);
            return $result;
        }

        // Get Particular Record
        public function get_record($InvoiceNo)
        {
            global $db;
            $sql = "select * from sales where InvoiceNo='$InvoiceNo'";
            $data = mysqli_query($db->connection,$sql);
            return $data;

        }

        // Update Record
        public function update()
        {
            global $db;

            if(isset($_POST['btn_update']))
            {
                $InvoiceNo = $db->check($_POST['InvoiceNo']);
                $SalesDate = $db->check($_POST['SalesDate']);
                $SalesQuantity = $db->check($_POST['SalesQuantity']);
                $SalesUnitPrice = $db->check($_POST['SalesUnitPrice']);

                if($this->update_record($InvoiceNo,$SalesDate,$SalesQuantity,$SalesUnitPrice ))
                {
                    $this->set_messsage('<div class="alert alert-success"> Your Record Has Been Updated : )</div>');
                    header("location:viewSales.php");
                }
                else
                {   
                    $this->set_messsage('<div class="alert alert-success"> Something Went Wrong : )</div>');
                }

               
            }
        }

        // Update Function 2
        public function update_record($InvoiceNo,$SalesDate,$SalesQuantity,$SalesUnitPrice)
        {
            global $db;
            $sql = "update sales set InvoiceNo='$InvoiceNo', SalesDate='$SalesDate', SalesQuantity='$SalesQuantity', SalesUnitPrice='$SalesUnitPrice', where InvoiceNo='$InvoiceNo'";
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
        public function Delete_Record($InvoiceNo)
        {
            global $db;
            $query = "delete from sales where InvoiceNo='$InvoiceNo'";
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

