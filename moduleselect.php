<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<?php
session_start();
    
    include("Connector.php");
    include("Functions.php");
    
    $user_data = check_login($connect);
    
   //This is an event which occurs if the user is not logged in.
   if(!isset($_SESSION['id'])){
     header("Location: Register.php");
   }
   
   //This code was intended to send the user's chosen modules to their user data.
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $opt1 = $_POST['opt1'];
        $opt2 = $_POST['opt2'];
        
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Module select</title>
        <script>
            //This code was intended to ensure the user only chose two of the
            //three optional modules made available to them.
            validatecount(){
                    var checkbox = document.getElementsByName("module");  
                    var checked = 0;  
                    for(var i = 0; i < checkbox.length; i++)  
                    {  
                        if(checkbox[i].checked)  
                            checked++;  
                    }  
                    if(checked > 2 || checked < 2)  
                    {  
                        alert("You must choose 2 optional subjects.");  
                        return false;  
                    }  
                            }
        </script>
        <link rel='stylesheet'  href='css.css'>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet"> 
    </head>
    <body class = "text">
        <div class = "container">
        <form method = "POST" class = "form" onsubmit="validatecount()")>
                <p>
                    <h1>
                        Select your optional modules.
                    </h1>
                </p>
                <fieldset class = "check">
                    <input type = "checkbox" name = "module" value = "<?php echo $user_data['optmod1']?>"mod1
                    <input type = "checkbox" name = "module" value = "<?php echo $user_data['optmod2']?>"mod2
                    <input type = "checkbox" name = "module" value = "<?php echo $user_data['optmod3']?>"mod3
                </fieldset>
                    </div>
    </body>
</html>
