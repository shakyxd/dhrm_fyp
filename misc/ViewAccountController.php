<?php
    include('userAccount.php');
    class viewAccountController
    {
        public function __construct()
        {
            $this->filter_lists();
        }
        
        public function lists_accounts()
        {

            $userAccount = new userAccount();
            $result_check = mysqli_num_rows($userAccount->dblists_accounts());
            $result = $userAccount->dblists_accounts();
            if($result_check > 0)
            {
                
                while($row = mysqli_fetch_assoc($result))
                {
                    if($row['deactivated'] == 0)                                                                                                                                                                                                                                                                                                                                                                                                                       
                    {
                        echo "<tr><td>" . $row['accountID'] . "</td><td>".$row['username']. "</td><td>"."Active" ."</td><td>".
                        "<button type='button' class='tableButton' onclick=window.location.href='ManageAccountDetailsPageUI.php?edit=$_GET[edit]&edit12=$row[user]'>Account Details</button>"." "."<button type='button' class='tableButton' onclick=window.location.href='suspendUserController.php?edit=$_GET[edit]&edit13=$row[accountID]' style='background-color: red'>Suspend</button>"."</td></tr>";
                    }
                    else
                    {
                        echo "<tr><td>" . $row['accountID'] . "</td><td>" . $row['username']. "</td><td>" ."Suspended". "</td><td>" . "<button type='button' class='tableButton' onclick=window.location.href='ManageAccountDetailsPageUI.php?edit=$_GET[edit]&edit12=$row[user]'>Account Details</button>"." "."<button type='button' class='tableButton' onclick=window.location.href='activateUserController.php?edit=$_GET[edit]&edit13=$row[accountID]' style='background-color: green'>Activate</button>"."</td></tr>";
                    }
                }
            }
        }

        public function filter_lists()
        {
            if(isset($_POST['search']))
            {
                $userAccount = new userAccount();

                $valueToSearch = $_POST['valueToSearch'];
                $result = $userAccount->dbfilter_accounts($valueToSearch);
                $result_check = mysqli_num_rows($result);
                if($result_check > 0)
                {
                    while($row = mysqli_fetch_assoc($result))
                    {
                        if($row['deactivated'] == 0)
                        {
                            echo "<tr><td>" . $row['accountID'] . "</td><td>".$row['user']. "</td><td>"."Active" ."</td><td>". "<button type='button' class='tableButton' onclick=window.location.href='ManageAccountDetailsPageUI.php?edit=$_GET[edit]&edit12=$row[user]'>Account Details</button>"." "."<button type='button' class='tableButton' onclick=window.location.href='suspendUserController.php?edit=$_GET[edit]&edit13=$row[accountID]' style='background-color: red'>Suspend</button>"."</td></tr>";
                        }
                        else
                        {
                            echo "<tr><td>" . $row['accountID'] . "</td><td>" . $row['user']. "</td><td>" ."Suspended". "</td><td>" . "<button type='button' class='tableButton' onclick=window.location.href='ManageAccountDetailsPageUI.php?edit=$_GET[edit]&edit12=$row[user]'>Account Details</button>"." "."<button type='button' class='tableButton' onclick=window.location.href='activateUserController.php?edit=$_GET[edit]&edit13=$row[accountID]' style='background-color: green'>Activate</button>"."</td></tr>";
                        }
                    }
                }
            }
            else
            {
                $this->lists_accounts();
            }
        }   
    }
    $view_accounts = new viewAccountController();

?>