


<?php
    session_start();
    if($_SESSION['role']!="staff")
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


?>




<!DOCTYPE html>
<html lang="en" style="height:100vh">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Managemnet</title>
    <link rel="stylesheet" href="css/staffDashboard.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="https://your-site-or-cdn.com/fontawesome/v5.15.4/js/all.js" data-auto-a11y="true" ></script>
</head>
<body>
                                                    <!-- NAVBAR -->
    <nav>
        <h1>Task Managemnet</h1>
        <ul>
            <li><div class="logout_button"><a href="logout.php">Logout</a></div></li>
        </ul>
    </nav>



                                                        <!-- WHITEBAR -->
    <div class="whiteBar">

    </div>

                                                        <!-- MAINWINDOW -->


<div class="mainWindow">


    <div id="popWindow" class="pop">
        <form action="updateStatus.php"method="post" enctype="multipart/form-data">
            <input name="taskId" placeholder="Enter Task ID" class="inputTaskInfo" type="text" required >
            <input name="taskStatus" placeholder="Enter the status" class="inputTaskInfo"type="text" required>
            <input class="inputTaskInfo" type="file" name="userfile" accept="application/pdf" >
            <input name="taskInfo" placeholder="Enter Note About The Last Update " class="inputTaskInfo" type="text">
            <input class="updateStatusSubmit" id="updateStatusSubmit" id="checkStatusSubmit" type="submit" />
        </form>
    </div>

                                                        <!-- SIDEPANEL -->
    <div style="height:100" class="sidePanel">
        <div class="panelMenu firstPanelMenu" id="profileMenu">
             <i class='far fa-id-badge' style='font-size: 24px;margin-right: 9px;color: aliceblue;'></i>
            <h2>PROFILE</h2>
        </div>
        <div class="panelMenu" id="allTasksMenu">
             <i class='far fa-list-alt' style='font-size:23px ; margin-right: 9px;color: aliceblue;'></i>  
            <h2>MY TASKS</h2>
        </div>
        <div class="panelMenu" id="updateTasksMenu">
             <i class='fas fa-sync-alt' style='font-size:24px;margin-right: 9px;color: aliceblue;'></i>    
            <h2>UPDATE TASK</h2>
        </div>
    </div>

                                        <!-- BORDER BETWEEN SIDEPANEL AND RIGHT WINDOW -->
    <div class="border">

    </div>


                                                            <!-- RIGHT WINDOW -->



                                                            <!-- PROFILE WINDOW  -->
    <div class="rightWindow">
        <div class="profile" id="profileWindow" style= "background-color:rgb(155 21 239)">
                <div class="profilePicContainer">
                    <div class="photo">

                    </div>
                </div>


                <div class="userInfo">
                    <div class="name userDetails"><h1>Name :-  &nbsp;<?php  echo $_SESSION['username']; ?> </h1></div>
                    <div class="userID userDetails"><h1>User ID :- &nbsp; <?php echo $_SESSION['userid']; ?></h1></div>
                    <div class="contact userDetails"><h1>Contact Number :- &nbsp; <?php echo $_SESSION['contact']; ?></h1></div>
                </div>
        </div>
                                            <!-- PROFILE WINDOW ENDS -->


                                            <!-- MY TASKS WINDOW  -->

        <div class="allTasks" id="allTasksWindow">
            <table>
                <tbody>
                <tr style="height:30px;background-color: #6205ed;">
                    <th style="width:90px">Task ID</th>
                    <th style="width:150px">Title</th>
                    <th class="descHead">Description</th>
                    <th style="width:87px;font-size:1rem">Start Date</th>
                    <th style="width:87px;font-size:1rem">Due Date</th>
                    <th>Assigned To</th>
                    <th>Status</th>
                </tr>


                <?php

                    // $query1 = "Select * from clerkTasks";
                    // $tasks = mysqli_query($conn,$query1);

                    while($taskArray = mysqli_fetch_assoc($tasks))
                    {
                        echo 
                        "<tr class=taskRow>
                        <td id=task_id>";?><?php echo $taskArray['task_id']; echo"</td>";?>

                        <?php   
                            echo "<td>";?><?php echo $taskArray['task_title'];  echo"</td>";
                        ?>
                        <?php   
                            echo "<td class=taskDescription>";?><?php echo $taskArray['task_desc'];  echo"</td>";
                        ?>

                        <?php   
                            echo "<td style=font-size:13px>";?><?php echo $taskArray['start_date'];  echo"</td>";
                        ?>

                        <?php   
                            echo "<td style=font-size:13px>";?><?php echo $taskArray['due_date'];  echo"</td>";
                        ?>
                        <?php   
                            echo "<td>";?><?php echo $taskArray['assigned_to'];  echo"</td>";
                        ?>
                        <?php   
                            echo "<td>";?><?php echo $taskArray['status'];  echo"</td>";
                        ?>

                        <?php echo "</tr>";
                    }
                


                ?>




                <!-- <tr class="firstRow">
                    <td>1</td>
                    <td>adi</td>
                    <td>avi</td>
                    <td>12323</td>
                    <td>tanu</td>
                </tr> -->
                </tbody>
                
            </table>

        </div>







    </div>
</div>


<script>



                                    // TO DISPLAY PROFILE ON CLICK 
    document.getElementById("profileMenu").addEventListener("click", function() 
    {
        document.getElementById("profileWindow").style.display="block";
        document.getElementById("allTasksWindow").style.display="none";
        // document.getElementsByTagName("BODY")[0].style.height="100%"
        document.getElementById("popWindow").style.display="none"
    });


                                    // TO DISPLAY MY TASKS ON CLICK 
    document.getElementById("allTasksMenu").addEventListener("click", function() 
    {
        document.getElementById("profileWindow").style.display="none";
        document.getElementById("allTasksWindow").style.display="block";
        document.getElementsByTagName("BODY")[0].style.height="100%"    //MAIN 
        document.getElementById("popWindow").style.display="none";
    });
                                    // TO CHECK STATUS 
    document.getElementById("updateTasksMenu").addEventListener("click", function() 
    {
        // document.getElementById("profileWindow").style.display="none";
        // document.getElementById("allTasksWindow").style.display="none";
        // document.getElementById("updateTasksWindow").style.display="none";
        // document.getElementsByTagName("html")[0].style.height="100vh";
        // document.getElementsByTagName("BODY")[0].style.height="100%";  //MAIN 
        document.getElementById("popWindow").style.display="block";
    });


                                    // TO DISPLAY TASK INFO 
    
    // document.getElementById("task_id").addEventListener("click", function() 
    // {
    //     var tdElem = document.getElementById ( "task_id" );
    //     var tdText = tdElem.innerHTML;
    //     console.log(tdText);
    //     // document.getElementsByTagName("BODY")[0].style.height="100%"
    // });

    let rows = document.getElementsByClassName("taskRow");
    let rowlen = rows.length;
    


</script>
</body>
</html>