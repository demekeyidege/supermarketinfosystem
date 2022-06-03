<?php 

    
    require_once('./config/dbconfig.php');
    $db = new dbconfig();

    class Category extends dbconfig
    {
        // Insert Record in the Database
        public function Store_Record()
        {
            global $db;
            if(isset($_POST['btn_save']))
            {
                $CategoryID = $db->check($_POST['CategoryID']);
                $CategoryName = $db->check($_POST['Categoryname']);
                $CategoryDescription = $db->check($_POST['CategoryDescription']);
                if($this->insert_record($CategoryID,$Categoryname,$CategoryDescription))
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
        function insert_record($a,$b,$c)
        {
            global $db;
            $query = "insert into categorys (CategoryID,Categoryname, CategoryDescription) values('$a','$b','$c')";
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
            $query = "select * from categorys";
            $result = mysqli_query($db->connection,$query);
            return $result;
        }

        // Get Particular Record
        public function get_record($CategoryID)
        {
            global $db;
            $sql = "select * from categorys where CategoryID='$CategoryID'";
            $data = mysqli_query($db->connection,$sql);
            return $data;

        }

        // Update Record
        public function update()
        {
            global $db;

            if(isset($_POST['btn_update']))
            {
                $CategoryID = $_POST['CategoryID'];
                $CategoryName = $db->check($_POST['Categoryname']);
                $CategoryDescription = $db->check($_POST['CategoryDescription']);

                if($this->update_record($CategoryID,$Categoryname,$CategoryDescription ))
                {
                    $this->set_messsage('<div class="alert alert-success"> Your Record Has Been Updated : )</div>');
                    header("location:viewCategory.php");
                }
                else
                {   
                    $this->set_messsage('<div class="alert alert-success"> Something Wrong : )</div>');
                }

               
            }
        }

        // Update Function 2
        public function update_record($CategoryID,$Categoryname,$CategoryDescription)
        {
            global $db;
            $sql = "update categorys set Name='$Categoryname', CategoryDescription='$CategoryDescription' where CategoryID='$CategoryID'";
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
        public function Delete_Record($CategoryID)
        {
            global $db;
            $query = "delete from categorys where CategoryID='$CategoryID'";
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
