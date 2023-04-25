<?php
session_start();
session_unset();
session_destroy();
// echo "this is the logout page here";

header('location: login.php');


?>