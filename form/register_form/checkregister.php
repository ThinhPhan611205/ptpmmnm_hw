<?php
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $confirm_pass = $_POST['confirm_pass'];
    $email = $_POST['gmail'];
    if($pass == $confirm_pass){
        echo "<font> Thank ".$username.", please confirm registration in your email: ".$email."</font>";
    }else{
        echo"Incorect confirm password!!!";
    }

?>