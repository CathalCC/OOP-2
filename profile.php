<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<?php
session_start();
    $_SESSION;
    
    include("Connector.php");
    include("Functions.php");
    
     $user_data = check_login($connect);
    
   //Redirects user if they reached this page without being logged in somehow
   if(!isset($_SESSION['id'])){
     header("Location: Register.php");
   }
     
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Profile</title>
        <link rel='stylesheet'  href='css.css'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    </head>
    <body class ="text">
      <div class="container">
          <div class = "pimage">
          <a href = "https://www.nuigalway.ie/media/marketingcommssite/NUICollarge.jpg"><img src="https://www.nuigalway.ie/media/marketingcommssite/NUICollarge.jpg" alt = "NUIG Logo" width = 500></a>
          </div>
          <div class = "profile">
              
      <div class="header">
        <h1 class = "title">Details of logged in user.</h1>
      </div>
        <!--
        These first three lines are simple echos of the data of the currently
        logged in user
        -->
        First name: <?php echo $user_data['fName']; ?><br>
        Surname: <?php echo $user_data['surname']; ?><br>
        Student ID: <?php echo $user_data['studentID']; ?><br>
        
        <!--
        This chunk of PHP recognizes what subjects and modules the user is enrolled in
        and prints them out line by line
        -->
        <?php
        if(!empty($user_data['sub1']) && !empty($user_data['sub2']) && !empty($user_data['sub3'])){
        echo "Subject 1: ".$user_data['sub1'].", Module 1: ".$user_data['coremod1'].", Module 2: ".$user_data['coremod2'].", Module 3: ".$user_data['coremod3'];
        //As it is possible the user will not be enrolled in this module
        //even while studying the corresponding subject, this if statement is
        //used to determine if this line will be printed. The same is done
        //for subsequent optional modules.
        if(!empty($user_data['optmod1'])){
            echo " Module 4: ".$user_data['optmod1'];
            }
        ?>
        <br>
        <?php
        echo "Subject 2: ".$user_data['sub2'].", Module 1: ".$user_data['coremod4'].", Module 2: ".$user_data['coremod5'].", Module 3: ".$user_data['coremod6'];
        if(!empty($user_data['optmod2'])){
            echo ", Module 4: ".$user_data['optmod2'];
            }
        ?>
        <br>
        <?php
        echo "Subject 3: ".$user_data['sub3'].", Module 1: ".$user_data['coremod7'].", Module 2: ".$user_data['coremod8'].", Module 3 ".$user_data['coremod9'];
        if(!empty($user_data['optmod3'])){
            echo ", Module 4: ".$user_data['optmod3'];
            }
        }
        //It is possible to enter this page before the student has
        //chosen their subjects, and this statement is used for that event
        else{
            echo "Subjects not yet chosen.";
        }
        ?>
        <br>
      </div>
        <a class = "homepagebutton" href = "index.php">Return to main page.</a>
      </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>
