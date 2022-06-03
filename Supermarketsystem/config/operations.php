<?php 

    
    require_once('./config/dbconfig.php');
    $db = new dbconfig();

    class operations extends dbconfig
    {
        // Insert Record in the Database
        public function Store_Record()
        {
            global $db;
            if(isset($_POST['btn_save']))
            {
                $CustomerID = $db->check($_POST['CustomerID']);
                $Name = $db->check($_POST['Name']);
                $TIN = $db->check($_POST['TIN']);
                $Mobile = $db->check($_POST['Mobile']);

                if($this->insert_record($CustomerID,$Name,$TIN,$Mobile))
                {
                    echo '<div class="alert alert-success"> Your Customer information Has Been Saved :) </div>';
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
            $query = "insert into customers (CustomerID,Name, TIN,Mobile) values('$a','$b','$c','$d')";
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
            $query = "select * from customers";
            $result = mysqli_query($db->connection,$query);
            return $result;
        }

        // Get Particular Record
        public function get_record($CutomerID)
        {
            global $db;
            $sql = "select * from customers where ID='$CutomerID'";
            $data = mysqli_query($db->connection,$sql);
            return $data;

        }

        // Update Record
        public function update()
        {
            global $db;

            if(isset($_POST['btn_update']))
            {
                $CustomerID = $_POST['CustomerID'];
                $Name = $db->check($_POST['Name']);
                $TIN = $db->check($_POST['TIN']);
                $Mobile = $db->check($_POST['Mobile']);

                if($this->update_record($CustomerID,$Name,$TIN,$Mobile ))
                {
                    $this->set_messsage('<div class="alert alert-success"> Your Record Has Been Updated : )</div>');
                    header("location:viewCustomer.php");
                }
                else
                {   
                    $this->set_messsage('<div class="alert alert-success"> Something Wrong : )</div>');
                }

               
            }
        }

        // Update Function 2
        public function update_record($CustomerID,$Name,$TIN,$Mobile)
        {
            global $db;
            $sql = "update customers set Name='$Name', TIN='$TIN', Mobile='$Mobile' where ID='$CustomerID'";
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
        public function Delete_Record($CustomerID)
        {
            global $db;
            $query = "delete from customers where CustomerID='$CustomerID'";
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






