<?php
session_start();
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


                                    // FETCHING THE FIELDS FROM LOGIN FORM 
$name = $_POST['name'];
$password = $_POST['pass'];



                                    // CHECKING FOR THE USER IN THE DATABASE 
$query = "SELECT * FROM users where BINARY username='$name' AND BINARY pass='$password'";

$result = mysqli_query($conn,$query);
if(!$result)
{
    echo "Error: ".mysqli_error($conn);
    exit;
}
else 
{
    $row = mysqli_fetch_assoc($result);
    if($row)
    {
        $_SESSION["username"] = $name;
        $_SESSION["userid"]=$row['user_id'];
        $_SESSION["contact"]=$row['contact'];
        if($row['role']=="clerk")
        {
            $_SESSION["role"] = "clerk";
            echo "<script type='text/javascript'>
            window.location.replace('http://localhost/ctms/clerkDashboard.php');
            </script>";
        }
        elseif($row['role']=="principal")
        {
            $_SESSION["role"] = "principal";
            echo "<script>
            window.location.replace('http://localhost/ctms/principalDashboard.php');
            </script>";
        }
        elseif($row['role']=="staff")
        {
            $_SESSION["role"] = "staff";
            echo "<script>
            window.location.replace('http://localhost/ctms/staffDashboard.php');
            </script>";
        }
        
    }
    else
    {
        echo "<script>
        window.alert('Login Failed, Please Enter Valid Credentials');
        window.location.replace('http://localhost/ctms/index.html');
        </script>";
    }
}

?>