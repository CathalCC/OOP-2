<?php
//Beginning session and calling on Connector.php and Functions.php
//in order to communicate with the database
session_start();
    $_SESSION;
    
    include("Connector.php");
    include("Functions.php");
    
    //Code to send the user's input to the database
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $studentid = $_POST['studentid'];
        $password = $_POST['password'];
        
        //The code below is used to recognize which user is logged in
        //and to return an error if the user's input cannot be found in the
        //database
        if(!empty($studentid) && !empty($password)){
            $query = "SELECT * FROM `students` WHERE studentID = '$studentid' limit 1";
            $result = mysqli_query($connect, $query);
            if($result){
                //This is a snippet of Javascript which will be called on if
                //the user fails to correctly enter their log-in information
                echo "<script>"
                ."alert('User data not recognized');"
                        ."</script>";
                if($result && mysqli_num_rows($result) > 0){
                    $user_data = mysqli_fetch_assoc($result);
                    if($user_data['password'] === $password){
                        //This sets the data of the user that is currently
                        //logged in, completing the log in process and
                        //redirecting the user to the main page.
                        $_SESSION['id'] = $user_data['id'];
                        echo $user_data['id'];
                        echo $user_data['password'];
                        echo $user_data['fName'];
                        echo $user_data['surname'];
                        echo $user_data['studentID'];
                        header("Location: index.php");
                    
                    }
                }
            }
        }
    }
?>
<html>
    <head>
        <title>Log-in</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel='stylesheet'  href='css.css'>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet"> 
    </head>
    <body class = "text">
        <div class = "containerform">
            <!--
            This page is a simple form post form from here, the user's input
            is accepted and posted to the database
            -->
            <form class = "form" method = "POST" id = "signin">
                <a href = "https://www.nuigalway.ie/media/marketingcommssite/NUICollarge.jpg"><img src="https://www.nuigalway.ie/media/marketingcommssite/NUICollarge.jpg" alt = "NUIG Logo" width = 250></a>
                 <h1 class = "formtitle">
                    Sign in
                 </h1>
                <p class = "forminstruct">
                    Enter your student ID and password to sign into your account.
                </p>
                    <input class = "inputfield" name = "studentid" placeholder = "Student ID">
                    <br>
                    <br>
                    <input class = "inputfield" type = "password" name = "password" placeholder = "Password">
                    <br>
                    <br>
                    <input type="submit" class ="formbutton" value = "Submit">
                    <div>
                        <p class = "formtext">
                            <a href ="Register.php" id = "register">If you don't have an account
                            you can register for one by clicking here.
                            </a>
                        </p>
                    </div>
            </form>
        </div>
    </body>
</html>
