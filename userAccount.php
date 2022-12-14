<?php

    class userAccount
    {
        public function validateLogin($user, $password)
        {
            //read from database 
            $mysqli = new mysqli('localhost','root','','fyp');
            $query = "SELECT * from accounts where username = '$user'";
            $result = $mysqli->query($query);
            $rows = mysqli_num_rows($result);
        
                
            if ( $rows > 0 )
            {
                // debug
                //echo "<script>alert('User Exists')</script>";
    
                $data = $result->fetch_assoc();
    
                if ( $data['password'] === $password )
                {
                    return true;
                }
    
                // debug
                //echo "<script>alert('Wrong Password')</script>";
    
                return false;
            } 
    
            // debug
            //echo "<script>alert('No such user')</script>";
    
            return false;
    
        }
    
        public function getUserProfile($user)
        {
            //read from database 
            $query = "SELECT * FROM accounts JOIN profiles ON accounts.profileID=profiles.profileID  where accounts.username = '$user' limit 1";
            $result = mysqli_query(mysqli_connect('localhost','root','','fyp'), $query);
    
            return $result;
        }

        public function validateUserSuspended($user)
        {
            $query = "SELECT * from accounts where username = '$user' and deactivated=1";
            $result = mysqli_query(mysqli_connect('localhost','root','','fyp'), $query);
            $rows = mysqli_num_rows($result);

            if($rows > 0)
            {
                return true;
            }
            else
            {
                return false;
            }

        }

        
        public function insert($profileID, $user, $lastName, $firstName)
        {
            $query = "INSERT into accounts (profileID, username) values ('$profileID', '$user')";
            $result = mysqli_query(mysqli_connect('localhost','root','','fyp'), $query); 

            return $result;
        }

        //check duplicate user
        public function Validateuser($user)
        {
            $query = "SELECT username from accounts where username='$user'";
            $result = mysqli_num_rows(mysqli_query(mysqli_connect('localhost','root','','fyp'), $query)); 

            if($result > 0)
            {
                return false;
            }
            else
            {
                return true;
            }
        }

        //select everything from database to list the accounts from sql
        public function dblists_accounts()
        {
            $query = "SELECT * FROM accounts;";
            $result = mysqli_query(mysqli_connect('localhost','root','','fyp'), $query);

            return $result;
        }

        //select everything from database to list the user details from sql with restaurant account code id
        public function dblists_account_details_with_name($user)
        {
            $query = "SELECT * FROM accounts where username='$user';";
            $result = mysqli_query(mysqli_connect('localhost','root','','fyp'), $query);

            return $result;
        }

        //filter by user input
        public function dbfilter_accounts($user)
        {
            $query = "SELECT * from accounts where username like '%".$user."%'";
            $result = mysqli_query(mysqli_connect('localhost','root','','fyp'), $query);

            return $result;
        }

        //update user account details
        public function dbSQLQuery_update_account($user, $profileID, $password) #syntax error cause this would depend on sqlquery
        {
            $mysqli = new mysqli('localhost','root','','fyp');
            $query = "UPDATE accounts set profileID='$profileID', password='$password' where user='$user'";
            $result= $mysqli->query($query);
            return $mysqli->affected_rows;
            
        }

        //activate account
        public function dbSQLQuery_activate()
        {   
            $id=$_GET['edit13'];

            $query = "UPDATE userAccount set userSuspended=0 where accountID='$id'";
            $result = mysqli_query(mysqli_connect('localhost','root','','fyp'), $query);

            return $result;

        }

        //suspend account
        public function dbSQLQuery_suspend()
        {   
            $id=$_GET['edit13'];

            $query = "UPDATE accounts set userSuspended=1 where accountID='$id'";
            $result = mysqli_query(mysqli_connect('localhost','root','','fyp'), $query);

            return $result;

        }
    }
?>