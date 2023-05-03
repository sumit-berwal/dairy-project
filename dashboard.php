<?php

include 'authentication/user_authentication.php';
include_once 'common_files/header.php';

if(!empty($_SESSION['message'])){ ?>

<h2 class="success"><?php echo $_SESSION['message'];  ?></h2>
<?php
}

// echo $_SESSION['users']['id'];




include_once 'common_files/footer.php';
?>