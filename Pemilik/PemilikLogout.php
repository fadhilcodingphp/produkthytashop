<?php
require 'PemilikFunction.php';

session_destroy();
echo "<script>alert('Anda telah Logout' </script>";
echo "<script>location = 'PemilikLogin.php' </script>";
