<?php
    session_start();
    // session_destroy();
    if (!isset($_SESSION['role_id'])) {
        switch ($_SESSION['role_id']) {
            default:
                header("Location: ../auth/login.php");
                break;
        }
    }

?>