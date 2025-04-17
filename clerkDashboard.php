<?php

session_start();
    if($_SESSION['role']!="clerk")
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

    $query = "Select username from users";
    $roles = mysqli_query($conn,$query);

    

?>














<!DOCTYPE html>
<html lang="en" style="height:100vh">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Managemnet</title>
    <link rel="stylesheet" href="css/clerkDash.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src="https://your-site-or-cdn.com/fontawesome/v5.15.4/js/all.js" data-auto-a11y="true" ></script>


    <style>
        .mainTable tbody
        {
            height:100%;
            overflow-y:auto;
        }
        .mainTable 
        {
            height:100%;
        }
        .mainWindow
        {
            display: flex;
            height: calc(100vh - 90px);
        }
    </style>
</head>
<body>
                                                    <!-- NAVBAR -->
    <nav>
        <h1>Task Managemnet</h1>
        <ul>
            <a href="logout.php"><li><div class="logout_button"><a href="logout.php">Logout</a></div></li></a>
        </ul>
    </nav>



                                                        <!-- WHITEBAR -->
    <div class="whiteBar">

    </div>

                                                        <!-- MAINWINDOW -->


<div class="mainWindow">

    <div id="popWindow" class="pop">
        <form action="checkStatus.php"method="post">
            <input name="taskId" placeholder="Enter Task ID" class="inputTaskInfo" type="text" required>
            <input id="checkStatusSubmit" type="submit" />
        </form>
    </div>  
        
    <div id="updatePopWindow" class="updatePop">
        <form action="updateStatus.php"method="post" enctype="multipart/form-data">
            <input name="taskId" placeholder="Enter Task ID" class="inputTaskInfo" type="text" required>
            <input name="taskStatus" placeholder="Enter the status" class="inputTaskInfo"type="text" required>
            <!-- <input class="inputTaskInfo" type="file" name="file"> -->
            <input name="taskInfo" placeholder="Enter Note About The Last Update " class="inputTaskInfo" type="text">
            <input class="updateStatusSubmit" id="updateStatusSubmit" id="checkStatusSubmit" type="submit" />
        </form>
    </div>
                                                  <!-- SIDEPANEL -->
    <div class="sidePanel">
        <div class="panelMenu firstPanelMenu" id="profileMenu">
            <i class='far fa-id-badge' style='font-size:24px;margin-right:9px;color: aliceblue;'></i>
            <h2>PROFILE</h2>
        </div>
        <div class="panelMenu" id="addTaskMenu">
            <i class='far fa-edit' style='font-size:21px; margin-right:9px;color: aliceblue;'></i>
            <h2>ADD TASK</h2>
        </div>
        <div class="panelMenu" id="allTasksMenu">
            <i class='far fa-list-alt' style='font-size:23px; margin-right:9px;color: aliceblue;'></i>
            <h2>ALL TASKS</h2>
        </div>
        <div class="panelMenu" id="updateStatusMenu">
            <i class='fas fa-sync-alt' style='font-size:24px;margin-right:9px;color: aliceblue;'></i>  
            <h2>UPDATE STATUS</h2>
        </div> 
        <div class="panelMenu" id="checkStatusMenu">
             <i class='fas fa-tasks' style='font-size:24px;margin-right:9px;color: aliceblue;'></i>    
             <h2>TASK ENQUIRY</h2>
        </div>        
    </div>

                                        <!-- BORDER BETWEEN SIDEPANEL AND RIGHT WINDOW -->
    <div class="border">

    </div>


                                                    <!-- RIGHT WINDOW -->
    <div class="rightWindow">


                                                    <!-- PROFILE WINDOW  -->
        <div class="profile" id="profileWindow">
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


                                                    <!-- ADD TASK WINDOW  -->
        <div class="addTask" id="addTaskWindow">
           <form action="addTask.php" id="taskInfo" method="post">


               <div class="taskTitle taskInput">
                    <h2>Title</h2>
                    <input type="text" placeholder="Enter Title" name="taskTitle" required>
               </div>

               <div class="taskDesc taskInput">
                   <h2>Description</h2>
                   <textarea  rows="4" cols="50" name="taskDesc" form="taskInfo" required >
                   </textarea>
               </div>

               <div class="taskStartDate taskInput">
                   <h2>Start-Date</h2>
                   <input type="date" name="taskStartDate" required>
               </div>


               <div class="taskDueDate taskInput">
                   <h2>Due-Date</h2>
                   <input type="date" name="taskDueDate" required>
               </div>


               <div class="taskAssignedTo taskInput">
                   <h2>Assign To</h2>
                    <select name="assignedTo" id="select" required>
                    <option value="">choose
                            <?php
                                while($roleArray=mysqli_fetch_array($roles))
                                {
                                    echo "<option value= '" .$roleArray['username'] ."'>" .$roleArray['username'] . "</option>";
                                }


                                
                            ?>
                            
                        
                    </select>

               </div>
               <div class="submitButton">
                    <input type="submit" value="Add Task">
               </div>
               
           </form>
        </div>


                                                        <!-- ALL TASKS  -->

        <div class="allTasks" id="allTasksWindow">
            <table class="mainTable">
                <tbody>
                <tr style="height:30px; background-color: #6205ed">
                    <th style="width:90px">Task ID</th>
                    <th style="width:150px">Titlt</th>
                    <th class="descHead">Description</th>
                    <th style="width:87px;font-size:1rem">Start Date</th>
                    <th style="width:87px;font-size:1rem">Due Date</th>
                    <th>Assigned To</th>
                    <th>Status</th>
                    <th>Delete</th>
                </tr>


                <?php

                    $query1 = "Select * from clerkTasks order by task_id desc";
                    $tasks = mysqli_query($conn,$query1);

                    while($taskArray = mysqli_fetch_assoc($tasks))
                    {
                        echo 
                        "<tr class=taskRow>
                        <td>";?><?php echo $taskArray['task_id']; echo"</td>"; $taskId=$taskArray['task_id'];?>

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

                        <?php
                            echo '<td>
                                <a href="deleteTask.php?taskId='.$taskId.'"><button>Delete</button></a>
                            </td>';
                        ?>

                        <?php echo "</tr>";
                    }
                


                ?>

                                        <!-- CHECK STATUS WINDOW -->
     
                


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

        <div id="checkStatusWindow" class="checkStatus" >


        </div>
        

    </div>
</div>


                                        <!-- JAVASCRIPT  -->
<script>



                                    // TO DISPLAY PROFILE ON CLICK 
    document.getElementById("profileMenu").addEventListener("click", function() 
    {
        document.getElementById("profileWindow").style.display="block";
        document.getElementById("addTaskWindow").style.display="none";
        document.getElementById("checkStatusWindow").style.display="none";
        document.getElementById("allTasksWindow").style.display="none";
        // document.getElementsByTagName("BODY")[0].style.height="100%"
        document.getElementById("popWindow").style.display="none"
        document.getElementById("updatePopWindow").style.display="none";
    });


                                    // TO DISPLAY ADD TASK ON CLICK 
    document.getElementById("addTaskMenu").addEventListener("click", function() 
    {
        document.getElementById("profileWindow").style.display="none";
        document.getElementById("addTaskWindow").style.display="block";
        document.getElementById("checkStatusWindow").style.display="none";
        document.getElementById("allTasksWindow").style.display="none";
        document.getElementsByTagName("BODY")[0].style.height="100vh"
        document.getElementById("popWindow").style.display="none"
        document.getElementById("updatePopWindow").style.display="none";
    });

                                        // TO DISPLAY ALL TASKS ON CLICK 
    document.getElementById("allTasksMenu").addEventListener("click", function() 
    {
        document.getElementById("profileWindow").style.display="none";
        document.getElementById("addTaskWindow").style.display="none";
        document.getElementById("checkStatusWindow").style.display="none";
        document.getElementById("allTasksWindow").style.display="block";
        document.getElementsByTagName("BODY")[0].style.height="100%"
        document.getElementById("popWindow").style.display="none"
        document.getElementById("updatePopWindow").style.display="none";
    });

                                        //TO DISPLAY CHECK STATUS ON CLICK
     document.getElementById("checkStatusMenu").addEventListener("click", function() 
    {   
        // document.getElementById("profileWindow").style.display="none";
        // document.getElementById("addTaskWindow").style.display="none";
        // document.getElementById("allTasksWindow").style.display="none";
        // document.getElementById("checkStatusWindow").style.display="block";
        // // document.getElementsByTagName("BODY")[0].style.height="100%";
        // document.getElementsByTagName("html")[0].style.height="100vh"
        // document.getElementsByTagName("BODY")[0].style.height="100%"
        // document.getElementsByClassName("mainWindow")[0].style.height="100%";
        // document.getElementsByClassName("rightWindow")[0].style.height="100%";
        document.getElementById("popWindow").style.display="block";
        document.getElementById("updatePopWindow").style.display="none";

    });
    document.getElementById("updateStatusMenu").addEventListener("click", function()
    {
        // document.getElementById("profileWindow").style.display="none";
        // document.getElementById("addTaskWindow").style.display="none";
        // document.getElementById("checkStatusWindow").style.display="none";
        // document.getElementById("allTasksWindow").style.display="none";
        // document.getElementsByTagName("BODY")[0].style.height="100%";
        document.getElementById("popWindow").style.display="none";
        document.getElementById("updatePopWindow").style.display="block";
    });                                

    let rows = document.getElementsByClassName("taskRow");
    let rowlen = rows.length;
    


</script>

</body>
</html>