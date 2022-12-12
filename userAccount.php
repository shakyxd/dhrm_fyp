<?php

    class userAccount
    {
        public function validateLogin($username, $password)
        {
            //read from database 
            $mysqli = new mysqli('localhost', 'root', '','fyp');
            $query = "select * from userAccount where username = '$username'";
            $result = $mysqli->query($query);
            $rows = mysqli_num_rows($result);
            
    
            // debug
            //echo "<script>alert('$username')</script>";
            //echo "<script>alert('$password')</script>";
    
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
    
        public function getUserProfile($username)
        {
            //read from database 
            $query = "SELECT * FROM userAccount JOIN userProfile ON userAccount.profileID=userProfile.profileID  where userAccount.username = '$username' limit 1";
            $result = mysqli_query(mysqli_connect('localhost', 'root', '','fyp'), $query);
    
            return $result;
        }

        public function validateUserSuspended($username)
        {
            $query = "select * from userAccount where username = '$username' and userSuspended=1";
            $result = mysqli_query(mysqli_connect('localhost', 'root', '','fyp'), $query);
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

        
        public function insert($profileID, $username, $lastName, $firstName)
        {
            $query = "insert into userAccount (profileID, username, lastName, firstName) values ('$profileID', '$username', '$lastName', '$firstName')";
            $result = mysqli_query(mysqli_connect('localhost', 'root', '', ), $query); 

            return $result;
        }

        //check duplicate username
        public function ValidateUsername($username)
        {
            $query = "select username from userAccount where username='$username'";
            $result = mysqli_num_rows(mysqli_query(mysqli_connect('localhost', 'root', '','fyp'), $query)); 

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
            $result = mysqli_query(mysqli_connect('localhost', 'root', '', 'fyp'), $query);

            return $result;
        }

        //select everything from database to list the user details from sql with restaurant account code id
        public function dblists_account_details_with_name($username)
        {
            $query = "SELECT * FROM userAccount where username='$username';";
            $result = mysqli_query(mysqli_connect('localhost', 'root', '', 'fyp'), $query);

            return $result;
        }

        //filter by username input
        public function dbfilter_accounts($username)
        {
            $query = "select * from userAccount where username like '%".$username."%'";
            $result = mysqli_query(mysqli_connect('localhost', 'root', '', 'fyp'), $query);

            return $result;
        }

        //update user account details
        public function dbSQLQuery_update_account($username, $firstName, $profileID, $lastName, $contactNumber, $email, $remarks, $password) #syntax error cause this would depend on sqlquery
        {
            $mysqli = new mysqli('localhost', 'root', '', 'fyp');
            $query = "update userAccount set firstName='$firstName', profileID='$profileID', lastName='$lastName', contactNumber='$contactNumber', email='$email', remarks='$remarks', password='$password' where username='$username'";
            $result= $mysqli->query($query);
            return $mysqli->affected_rows;
            
        }

        //activate account
        public function dbSQLQuery_activate()
        {   
            $id=$_GET['edit13'];

            $query = "update userAccount set accountID='$id', userSuspended=0 where accountID='$id'";
            $result = mysqli_query(mysqli_connect("localhost", "root", "","fyp"), $query);

            return $result;

        }

        //suspend account
        public function dbSQLQuery_suspend()
        {   
            $id=$_GET['edit13'];

            $query = "update userAccount set accountID='$id', userSuspended=1 where accountID='$id'";
            $result = mysqli_query(mysqli_connect("localhost", "root", "", "fyp"), $query);

            return $result;

        }
    }
?>