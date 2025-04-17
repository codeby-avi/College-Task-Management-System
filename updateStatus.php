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


    $username = $_SESSION['username'];
    // echo $username;
    $query= "Select * from clerktasks where assigned_to='$username' order by task_id desc";
    // echo$query;
    if(!$tasks = mysqli_query($conn,$query))
    {
        echo "failed";
    }

                                            // FOR UPLOADING THE FILE 

    if(isset($_FILES['userfile'])){
        //  echo "<pre>";
        //  print_r($_FILES);
        //  echo "</pre>";
        $file_name = $_FILES['userfile']['name'];
        $file_size = $_FILES['userfile']['size'];
        $file_tmp = $_FILES['userfile']['tmp_name'];
        $file_type = $_FILES['userfile']['type'];
        $taskid= $_POST['taskId'].".pdf";
        move_uploaded_file($file_tmp,"files/".$taskid);
    }




                                                // FOR UPDATING THE TASK 

    $taskId = $_POST['taskId'];
    $taskStatus = $_POST['taskStatus'];
    $taskInfo = "select * from taskinfo where task_id = '$taskId'";
    $taskInfoResult = mysqli_query($conn,$taskInfo);
    $taskInfoRows = mysqli_num_rows($taskInfoResult);
    $taskInfo = $_POST['taskInfo'];
    $fetchAssignTo = "select assigned_to from clerktasks where task_id = $taskId";
    $checkTaskInfoQuery= "select * from taskinfo where task_id='$taskId'";
    // echo $checkTaskInfoQuery;   
    $fetchAssignToResult = mysqli_query($conn,$fetchAssignTo);
    $num_rows = mysqli_num_rows($fetchAssignToResult);
    // echo $num_rows;
    if ($num_rows==0)
    {
        echo "No Task Found Having This Task ID";
    }
    else
    {
        // while($assignedToArray = mysqli_fetch_assoc($fetchAssignToResult))
        // {
        //     $assignedTo = $assignedToArray['assigned_to']
        // } 
        $nameAssigned = mysqli_fetch_array($fetchAssignToResult);
        // echo $nameAssigned['assigned_to'];
        // echo $username;
        if ($nameAssigned['assigned_to']!=$username)
        {
            echo "This task is not assigned to you";
        }
        else
        {
            $taskStatus = $_POST['taskStatus'];
            $query = "update clerktasks set status='$taskStatus' where task_id=$taskId";
            // echo $query;
            $result = mysqli_query($conn,$query);
            if(!$result)
                {
                    echo mysqli_error($conn);
                }
            if ($taskInfoRows==0)
            {
                $insertTaskInfo="insert into taskinfo values('$taskId','$taskInfo','$taskStatus')";
                // echo $insertTaskInfo;
                $insertTaskInfoResult = mysqli_query($conn,$insertTaskInfo);
                if(!$insertTaskInfoResult)
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
                if($_SESSION['role']=="staff")
                {
                    echo "<script type='text/javascript'>
                    window.location.replace('http://localhost/ctms/staffDashboard.php');
                    </script>";
                }
            }
            else
            {
                $updateTaskInfo = "update taskinfo set task_info = '$taskInfo', status = '$taskStatus' where task_id='$taskId'";
                $updateTaskInfo = mysqli_query($conn,$updateTaskInfo);
                if(!$updateTaskInfo)
                {
                    echo mysqli_error($conn);
                }
                if($_SESSION['role']=="clerk")
                {
                    echo "<script type='text/javascript'>
                    window.location.replace('http://localhost/ctms/clerkDashboard.php');
                    </script>";
                }
                if($_SESSION['role']=="staff")
                {
                    echo "<script type='text/javascript'>
                    window.location.replace('http://localhost/ctms/staffDashboard.php');
                    </script>";
                }
            }
        }
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
    // echo "<script type='text/javascript'>
    //         window.location.replace('http://localhost/staffDashboard.php');
    //         </script>";


?>
