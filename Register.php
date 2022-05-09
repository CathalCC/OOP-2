<?php
session_start();
    
    include("Connector.php");
    include("Functions.php");
    
    //This code takes the user's inputs and assigns them to PHP variables which can
    //be used in the process of registering the user's info to the database
    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $fname = $_POST['fname'];
        $surname = $_POST['surname'];
        $studentid = $_POST['studentid'];
        $password = $_POST['password'];
        
        //This code first checks to make sure that there has been some input,
        //and once that is recognized the user's inputs are registered to their
        //counterparts in the SQL database, in addition to a randomly generated
        //unique ID which will be used in other pages to identify which user is
        //logged in
        //In the SQL database, the ID is set to auto-increment, which ensures
        //that the user ID will be unique, even though this code alone leaves
        //some room for overlap
        if(!empty($fname) && !empty($surname) && !empty($studentid) && !empty($password)){
            $id = rand(0, 10000);
            $query = "INSERT INTO `students`(`id`, `studentID`, `password`, `fName`, `surname`) VALUES ('$id','$studentid','$password','$fname','$surname')";
            mysqli_query($connect, $query);
            
            header("Location: Log-in.php");
        }
    }
?>
<html>
    <head>
        <title>Register</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel='stylesheet'  href='css.css'>
        <!--
        The font linked to here will continue to be linked to throughout the 
        site, as we could not find a built in font that appealed to us, so we
        went for this one from looking online.
        -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet"> 
        <script>
        //This Javascript function is used to check if there is an error
        //in the user's attempt to register and to return the appropriate
        //error message if that is the case. This function will be called on
        //when the user's input is submitted.
       function validate()
            {
                console.log("fname="+document.form.fname.value);
                if (document.form.fname.value === "")
                {
                    alert("You must enter your name.");
                    return false;
                }
                if (document.form.surname.value === "")
                {
                    alert("You must enter your surname.");
                    return false;
                }
                console.log("id="+document.form.studentid.value);
                if (document.form.studentid.value.length !== 8)
                {
                    alert("Student ID must be 8 characters long.");
                    return false;
                }
                if (document.form.password.value !== document.form.pass2.value)
                {
                    alert("Passwords must match.");
                    return false;
                }
                return true;
            }
        </script>
    </head>
    <body class = "text">
        <div class="containerform">
            <form name = "form" class = "form" method="POST" onsubmit = "return validate()">
                <a href = "https://www.nuigalway.ie/media/marketingcommssite/NUICollarge.jpg"><img src="https://www.nuigalway.ie/media/marketingcommssite/NUICollarge.jpg" alt = "NUIG Logo" width = 250></a>
                <h1 class = "formtitle">
                    Register
                </h1>
                <p class = "forminstruct">Please fill in this form to create an account</p>
                <input class = "inputfield" name = "fname" placeholder = "First Name">
                <br>
                <br>
                <input class = "inputfield" name = "surname" placeholder = "Surname">
                <br>
                <br>
                <input class = "inputfield" name = "studentid" placeholder = "Student ID">
                <br>
                <br>
                <input class = "inputfield" name = "password" type = "password" placeholder = "Password">
                <br>
                <br>
                <input class = "inputfield" name = "pass2" type = "password" placeholder = "Repeat Password">
                <br>
                <br>
                <input type="submit" class ="formbutton" value = "Submit">
                <br>
                <br>
            </form>
            <a href ="Log-in.php">
                    Already have an account? Click here to sign in.
            </a>
        </div>
    </body>
</html>
