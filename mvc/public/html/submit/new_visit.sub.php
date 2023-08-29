<?php
session_start();

?>

<?php

if(isset($_POST["button_visit"])){
    /*//echo 'ok';
    if(isset($_SESSION['userName']))
               { $user=$_SESSION['userName'];
                  echo $user;  
              }

              */
   $nature="";
   $duration="";
   $name=$_SESSION['userName'];
   $detained_name=$_POST["detained_name"];
   $relationship=$_POST["relationship"];
  $day=$_POST["day"];
  $month=$_POST["month"];
  $year=$_POST["year"];
$possible_objects=$_POST["possible_objects"];
$witness_list=$_POST["witness_list"];

if($day=="day"){
    $day="";
}
 if($month=="month"){
    $month="";
}
if($year=="year"){
    $year="";
}



   if(isset($_POST["family_meeting"])){
   $family_meeting=$_POST["family_meeting"];
   $nature="family_meeting";
}
else  if(isset($_POST["legal_planning_meeting"])){
    $legal_planning_meeting=$_POST["legal_planning_meeting"];
    $nature="legal_planning_meeting";
 }
 else  if(isset($_POST["casual_meeting"])){
    $casual_meeting=$_POST["casual_meeting"];
    $nature="casual_meeting";
 }

 if(isset($_POST["30_minutes"])){
    
    $duration="30_minutes";
 }
 else  if(isset($_POST["60_minutes"])){
    $duration="60_minutes";
  }
  else  if(isset($_POST["90_minutes"])){
    $duration="90_minutes";
  }

//echo $name.$detained_name.$relationship.$nature.$date.$duration.$possible_objects.$witness_list;
require_once 'dbh.sub.php';
require_once 'functions.sub.php';

   if(empty($name)||empty($detained_name)||empty($relationship)||empty($nature)||empty($duration)||empty($day)||empty($month)||empty($year)||empty($possible_objects)||empty($witness_list)){
       header("location:../new_visit.php?error4=emptyinputs");
       exit();

   }
  /* if(nameExists($conn,$name)==false){
    header("location:../new_visit.php?error4=insertUsername");
    exit();

   }
   */

   if(detainedExists($conn,$detained_name) ==false){
    header("location:../new_visit.php?error4=detainedNotExist");
    exit();

}
$date=$day."-".$month."-".$year;
createVisit($conn,$name,$detained_name,$relationship,$nature,$duration,$date,$possible_objects,$witness_list);
}