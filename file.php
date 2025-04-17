<!DOCTYPE html>
<html lang="en">
  <head>
    <title>upload</title>
  </head>
    <body>

        <?php
            if(isset($_FILES['userfile'])){
                //  echo "<pre>";
                //  print_r($_FILES);
                //  echo "</pre>";
                $file_name = $_FILES['userfile']['name'];
                $file_size = $_FILES['userfile']['size'];
                $file_tmp = $_FILES['userfile']['tmp_name'];
                $file_type = $_FILES['userfile']['type'];
                $taskid= $_POST['taskid'].".pdf";
                move_uploaded_file($file_tmp,"files/".$taskid);
            }
            

        ?>
       
            <form action = "" method = "POST" enctype = "multipart/form-data">
                <input type = "file" name = "userfile" accept="application/pdf" />
                <input type = "text" name = "taskid" />
                <!-- <input type = "file" name = "userfile" accept="application/pdf" /> -->
                <input type = "submit" value="Upload"/>
            </form>

    </body>
</html> 