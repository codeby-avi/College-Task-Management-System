<?php
session_start();
unset($_SESSION["role"]);
echo "<script>
        window.location.replace('http://localhost/ctms/index.html');
        </script>";
?>