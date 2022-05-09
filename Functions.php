<?php

//This function is used on each webpage in order to check if a user is logged in and
//which user it is that is logged in
function check_login($connect){
    
    if(isset($_SESSION["id"])){
        $id = $_SESSION["id"];
        //limit 1 is set at the end here in order to ensure there are no errors
        //with attempting to select more students than wanted in the log-in process
        //in theory this should not be possible due to each ID being unique, but
        //it was kept as a precaution all the same.
        $query = "select * from students where id = '$id' limit 1";
        $result = mysqli_query($connect, $query);
        if($result && mysqli_num_rows($result) > 0){
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }
}
?>

