<?php

if(isset($_POST["submit_comment"])){
   // echo 'ok';

   $message=$_POST["message"];
   //$author=$_GET["userName"];
$author=$_POST["author"];
   require_once 'dbh.sub.php';
   require_once 'functions.sub.php';

   if(empty($message)){
       header("location:../homepage.php?error3=emptyinput");
       exit();

   }
/*if($_SESSION["userName"]!==$author){
    header("location:../homepage.php?error3=wrongname");
    exit(); 
}*/
   createComment($conn,$author,$message);

}else{
    header("location:../homepage.php");
    exit();
}


?>