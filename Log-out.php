<?php
session_start();
    $_SESSION;
    
    //This simple log-out function just changes the ID of the logged in user
    //from the current session to be unset and redirects the user to the register page,
    //logging them out.
    if(isset($_SESSION['id'])){
        unset($_SESSION['id']);
    }
    
    header("Location: Register.php")

?>



