<?php
    session_start();
    if($_SESSION['role']!="clerk" and $_SESSION['role']!="principal")
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


    $username = $_SESSION['username'];
    // echo $username;
    $query= "Select * from clerktasks where assigned_to='$username' order by task_id desc";
    // echo$query;
    if(!$tasks = mysqli_query($conn,$query))
    {
        echo "failed";
    }

    $taskId = $_POST['taskId'];
    $taskInfo = "select * from taskinfo where task_id = '$taskId'";
    $taskInfoResult = mysqli_query($conn,$taskInfo);
    $taskInfoResultRows = mysqli_num_rows($taskInfoResult);
    if (!$taskInfoResult)
    {
        echo mysqli_error($conn);
    }
    if ($taskInfoResultRows==0)
    {
        echo "";
    }
    $taskInfoRow = mysqli_fetch_array($taskInfoResult);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Info</title>
    <link rel="stylesheet" href="css/checkSta.css">
</head>
<body>
    <table>
        <tbody>
            
            
            <tr style="height:30px; background-color: #9b15ef">
                <th style="width:250px">Task ID</th>
                <th style="width:650px">Task Info</th>
                <th style="width:250px">Status</th>
                <th style="width:250px">File</th>
            </tr>

            <?php
            if($taskInfoResultRows!=0)
            {
                $taskId = $_POST['taskId'];
                echo 
                "<tr class=taskRow>
                <td>";?><?php echo $taskInfoRow['task_id'];
                echo "</td>";?>

                <?php
                echo "<td>";?><?php echo $taskInfoRow['task_info']; echo "</td>";?>


                <?php
                echo "<td>";?><?php echo $taskInfoRow['status']; echo "</td>";?>


                                            <!-- FOR DOWNLOADING THE FILE  -->
                <?php
                echo "<td>";?><?php echo "<a href=";?> <?php $ur = "/files/".$taskId.".pdf"; echo "' ".$ur."'>File </a> </td>";
            }
            ?>

        </tbody>
    </table>
</body>
</html>
