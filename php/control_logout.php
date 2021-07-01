<?php
session_start();
session_destroy();
header("location: ../screens/login.php");
exit();
