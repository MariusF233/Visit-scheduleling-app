

<?php

function emptyInputRegister($name,$email,$password,$password_repeat){

    $result=false;
    if(empty($name)||empty($email)||empty($password)||empty($password_repeat)){
     $result=true;

    }
    else{
        $result=false;
    }
    return $result;
}
/*function invalidName($name){

    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/"),$name)
    {

     $result=true;

    }
    else{
        $result=false;
    }
    return $result;
}
*/
function invalidEmail($email){

    $result=false;
    if(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {

     $result=true;

    }
    else{
        $result=false;
    }
    return $result;
}
function passwordMatch($password,$password_repeat){

    $result=false;
    if($password!==$password_repeat)
    {

     $result=true;

    }
    else{
        $result=false;
    }
    return $result;
}

function nameExists($conn,$name){

    $sql="SELECT * FROM users WHERE usersName= ?;";
    $statement=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($statement,$sql))
    {

        header("location:../register.php?error=statementFailed");
        exit();
    }
    mysqli_stmt_bind_param($statement,"s",$name);
    mysqli_stmt_execute($statement);

    $resultData=mysqli_stmt_get_result($statement);
    if($row = mysqli_fetch_assoc($resultData)){
return $row;

    }
else{
    $result=false;
    return $result;
}
mysqli_stmt_close($statement);
}


function createUser($conn,$name,$email,$password){
    //createVisit_new_user($conn,$name,'Radu','tutor','family_meeting','30_minutes','01-01-2022','hh','hh');
    $sql="INSERT INTO users (usersName,usersEmail,usersPassword) VALUES (?,?,?);";
    $statement=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($statement,$sql))
    {

        header("location:../register.php?error=statementFailed");
        exit();
    }
    $hashedPassword=password_hash($password,PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($statement,"sss",$name,$email,$hashedPassword);
    mysqli_stmt_execute($statement);


mysqli_stmt_close($statement);



$sql2="INSERT INTO visits (name_visitor,detained_name,relationship,nature,duration,meeting_date,possible_objects,witness_list) VALUES (?,'Radu','relative','casual_meeting','90_minutes','01-01-2022','vv','vv');";
$statement2=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($statement2,$sql2))
{

    header("location:../register.php?error=statementFailed");
    exit();
}


mysqli_stmt_bind_param($statement2,"s",$name);
mysqli_stmt_execute($statement2);


mysqli_stmt_close($statement2);




header("location:../register.php?error=none");
exit();
}

function emptyInputLogin($name,$password,){

    $result=false;
    if(empty($name)||empty($password)){
     $result=true;

    }
    else{
        $result=false;
    }
    return $result;
}
function loginUser($conn,$name,$password){
    
    $nameExists=nameExists($conn,$name);

    if($nameExists==false){
        header("location:../login.php?error=wrongName");
      exit();

    }

    $hashedPassword=$nameExists["usersPassword"];
    $checkPassword=password_verify($password,$hashedPassword);
    //nu se poate unhash password,folosim doar password_verify

    if($checkPassword===false){
        header("location:../login.php?error=wrongPassword");
        exit();
    }
    else if($checkPassword==true){
        session_start();
         
        
        $_SESSION["userName"]=$nameExists["usersName"];
       
        header("location:../homepage.php");
        exit();
    }
}

function emptyInputDelete($name){
    $result=false;
    if(empty($name)){
     $result=true;

    }
    else{
        $result=false;
    }
    return $result;
}

function deleteUser($conn,$nameDelete){
    $admin="admin";
if($nameDelete!==$admin){
    $sql="DELETE FROM users WHERE usersName=?;";
    $statement=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($statement,$sql))
    {

        header("location:../admin_page.php?error2=statementFailed");
        exit();
    }
    

    mysqli_stmt_bind_param($statement,"s",$nameDelete);
    mysqli_stmt_execute($statement);


mysqli_stmt_close($statement);


$sql2="DELETE FROM visits WHERE name_visitor=?;";
$statement2=mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($statement2,$sql2))
{

    header("location:../admin_page.php?error2=statementFailed");
    exit();
}


mysqli_stmt_bind_param($statement2,"s",$nameDelete);
mysqli_stmt_execute($statement2);


mysqli_stmt_close($statement2);



header("location:../admin_page.php?error2=none");
exit();
}
else{
    header("location:../admin_page.php?error2=deleteAdmin");
    exit();
}
}


function showUsers($conn){

   $html='';
    $sql="SELECT * FROM users;";
$result=mysqli_query($conn,$sql);
$resultCheck=mysqli_fetch_assoc($result);

if($resultCheck >0 ){
    while($row=mysqli_fetch_assoc($result)){
        $html .= $row['usersId']."  ".$row['usersName']." ".$row['usersEmail']."<br>";
    }
}

return $html;

}
function createComment($conn,$author,$message){

    $sql="INSERT INTO comments (author,msg) VALUES (?,?);";
    $statement=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($statement,$sql))
    {

        header("location:../homepage.php?error=statementFailed");
        exit();
    }
   

    mysqli_stmt_bind_param($statement,"ss",$author,$message);
    mysqli_stmt_execute($statement);


mysqli_stmt_close($statement);
header("location:../homepage.php?error3=none");
exit();

}

function detainedExists($conn,$detained_name){

    $sql="SELECT * FROM detained WHERE detained_name= ?;";
    //daca pun ? in loc de nume tabel,da statement failed
    $statement=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($statement,$sql))
    {

        header("location:../register.php?error=statementFailed");
        exit();
    }
    mysqli_stmt_bind_param($statement,"s",$detained_name);
    mysqli_stmt_execute($statement);

    $resultData=mysqli_stmt_get_result($statement);
    if($row = mysqli_fetch_assoc($resultData)){
return $row;

    }
else{
    $result=false;
    return $result;
}
mysqli_stmt_close($statement);

}
function createVisit($conn,$name,$detained_name,$relationship,$nature,$duration,$date,$possible_objects,$witness_list){

    $sql="INSERT INTO visits (name_visitor,detained_name,relationship,nature,duration,meeting_date,possible_objects,witness_list) VALUES (?,?,?,?,?,?,?,?);";
    $statement=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($statement,$sql))
    {

        header("location:../new_visit.php?error4=statementFailed");
        exit();
    }
   

    mysqli_stmt_bind_param($statement,"ssssssss",$name,$detained_name,$relationship,$nature,$duration,$date,$possible_objects,$witness_list);
    mysqli_stmt_execute($statement);


mysqli_stmt_close($statement);
header("location:../new_visit.php?error4=none");
exit();

}
/*function createVisit_new_user($conn,$name,$detained_name,$relationship,$nature,$duration,$date,$possible_objects,$witness_list){

    $sql="INSERT INTO visits (name_visitor,detained_name,relationship,nature,duration,meeting_date,possible_objects,witness_list) VALUES (?,?,?,?,?,?,?,?);";
    $statement=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($statement,$sql))
    {

        header("location:../new_visit.php?error4=statementFailed");
        exit();
    }
   

    mysqli_stmt_bind_param($statement,"ssssssss",$name,$detained_name,$relationship,$nature,$duration,$date,$possible_objects,$witness_list);
    mysqli_stmt_execute($statement);


mysqli_stmt_close($statement);

exit();

}
*/
function visitExists($conn,$DeleteVisitId){
    $sql="SELECT * FROM visits WHERE visitId= ?;";
    //daca pun ? in loc de nume tabel,da statement failed
    $statement=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($statement,$sql))
    {

        header("location:../register.php?error5=statementFailed");
        exit();
    }
    mysqli_stmt_bind_param($statement,"s",$DeleteVisitId);
    mysqli_stmt_execute($statement);

    $resultData=mysqli_stmt_get_result($statement);
    if($row = mysqli_fetch_assoc($resultData)){
return $row;

    }
else{
    $result=false;
    return $result;
}
mysqli_stmt_close($statement);
 
}
function deleteVisit($conn,$DeleteVisitId){
    $sql="DELETE FROM visits WHERE visitId=?;";
    $statement=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($statement,$sql))
    {

        header("location:../admin_page.php?error5=statementFailed");
        exit();
    }
    

    mysqli_stmt_bind_param($statement,"s",$DeleteVisitId);
    mysqli_stmt_execute($statement);


mysqli_stmt_close($statement);
header("location:../admin_page.php?error5=none");
exit();
}
function deleteVisit_user($conn,$DeleteVisitId){
    $sql="DELETE FROM visits WHERE visitId=?;";
    $statement=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($statement,$sql))
    {

        header("location:../my_visits.php?error7=statementFailed");
        exit();
    }
    

    mysqli_stmt_bind_param($statement,"s",$DeleteVisitId);
    mysqli_stmt_execute($statement);


mysqli_stmt_close($statement);
header("location:../my_visits.php?error7=none");
exit();
}

?>