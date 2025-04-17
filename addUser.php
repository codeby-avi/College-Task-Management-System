<?php

    session_start();
    if($_SESSION['role']!="principal")
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
    
    if(!$conn = mysqli_connect ($db_hostname,$db_username,$db_password,$db_name))
    {
    echo "Connection Failed: ".mysqli_connect_error();
    exit;
    }

    $username=$_POST['username'];
    $password=$_POST['password'];
    $contact=$_POST['contact'];

    $addUserQuery="insert into users(username,pass,contact,role) values ('$username','$password','$contact','staff')";
    // echo $addUserQuery;
    $result = mysqli_query($conn,$addUserQuery);
    if(!$result)
    {
        echo "Error". mysqli_connect_error();
    }
    else
    {
        echo "<script type='text/javascript'>
            window.location.replace('http://localhost/ctms/principalDashboard.php');
            </script>";
    }

?>
