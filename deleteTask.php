<?php

    session_start();
    if(!($_SESSION['role']=="staff"|| $_SESSION['role']=="clerk"||$_SESSION['role']=="principal"))
    {
        echo "<script type='text/javascript'>
            window.location.replace('http://localhost/ctms/index.html');
            </script>"; 
    }




    $db_hostname = "127.0.0.1";
    $db_username = "root";
    $db_password = "";
    $db_name = "taskmanager";
    
                                        // ESTABLISHING CONNECTION WITH DATABSE 
    
    if(!$conn = mysqli_connect ($db_hostname,$db_username,$db_password,$db_name)) //CONNECTION
    {
    echo "Connection Failed: ".mysqli_connect_error();
    exit;
    }

    if(isset($_GET['taskId']))
    {
        $taskId=$_GET['taskId'];
        $deleteQuery="delete from clerktasks where task_id=$taskId";
        $result = mysqli_query($conn,$deleteQuery);
        if(!$result)
        {
            echo "Error deleting the task: ".mysqli_connect_error();
        }


        if($_SESSION['role']=="clerk")
        {
            echo "<script type='text/javascript'>
            window.location.replace('http://localhost/ctms/clerkDashboard.php');
            </script>";
        }
        if($_SESSION['role']=="principal")
        {
            echo "<script type='text/javascript'>
            window.location.replace('http://localhost/ctms/principalDashboard.php');
            </script>";
        }
        if($_SESSION['role']=="staff")
        {
            echo "<script type='text/javascript'>
            window.location.replace('http://localhost/ctms/staffDashboard.php');
            </script>";
        }
    }


?>
