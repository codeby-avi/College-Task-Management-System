<?php
    session_start();

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










    $taskTitle = $_POST['taskTitle'];
    $taskDesc = $_POST['taskDesc'];
    $taskStartDate = $_POST['taskStartDate'];
    $taskDueDate = $_POST['taskDueDate'];

    $assignedTo = $_POST['assignedTo'];
    $titleQuery = "insert into clerktasks (task_title,task_desc,start_date,due_date,assigned_to) values ('$taskTitle','$taskDesc','$taskStartDate','$taskDueDate','$assignedTo')";

    $result = mysqli_query($conn,$titleQuery);
    if(!$result)
    {
        echo mysqli_error($conn);
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
?>