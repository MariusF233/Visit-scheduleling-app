<?php
session_start();
include_once 'submit/dbh.sub.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Contact</title>
        <link rel="stylesheet" href="./css/contact_style.css" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            .profile_pic{
    height:45px;
    width:45px;
    border-radius:50px;
    margin-left:370px;
}
        </style>
    </head>
    <body>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:700,600" rel="stylesheet" type="text/css">
        <nav class="navPanel">
            <ul class="menu_items">
                <li class="menu_item">
                    <a id="a1" href="homepage.php">
                        <h5>HOMEPAGE</h5>
                    </a>
                </li>
                
               
                <?php
    
    $adminName="admin";
    if(isset($_SESSION["userName"]))
    {
        echo" <li class='menu_item'>
                        <a href='new_visit.php'>
                            <h5>NEW VISIT</h5>
                        </a>
                    </li> ";
        echo "<li class='menu_item'><a href='my_visits.php'> <h5>MY VISITS</h5> </a> </li>";
                
        echo "<li class='menu_item'><a href='submit/logout.sub.php'> <h5>LOGOUT</h5> </a> </li>";
    
         if($_SESSION["userName"]==$adminName)
    {
       echo "<li class='menu_item'><a href='admin_page.php'> <h5>ADMIN PAGE</h5> </a> </li>";
      
    }
       }
       else
       {
        echo "<li class='menu_item'><a href='register.php'> <h5>REGISTER</h5> </a> </li>";
             
           echo "<li class='menu_item'><a href='login.php'> <h5>LOGIN</h5> </a> </li>";
    

    }
   
   ?>
                <li class="menu_item">
                    <a href="contact.php">
                        <h5>CONTACT US</h5>
                    </a>
                </li>

                <li class="menu_item">
                <a href="userguide_schollarly.html">
                    <h5>USER GUIDE</h5>
                </a>
            </li>
            <li class="menu_item">
                <a href="report_schollarly.html">
                    <h5>REPORT SCHOLLARLY</h5>
                </a>
            </li>
            
            </ul>
        </nav>
        <div class="contact_section">

           <form class='contact_form' action="submit/admin_page.sub.php" method="post">
           
            <h1>YOUR VISITS:</h1>
           

<?php
 if(isset($_SESSION['userName']))
 { $user=$_SESSION['userName'];
    
} 

$sql="SELECT * FROM visits WHERE name_visitor='".$user."';";
$result=mysqli_query($conn,$sql);
$resultCheck=mysqli_fetch_assoc($result);

if($resultCheck >0 ){

    while($row=mysqli_fetch_assoc($result)){
       
        echo  "<h5> ID: ".$row['visitId']." ,    Name: ".$row['name_visitor']." , detained name: ".$row['detained_name']." , relationship: ".$row['relationship'].
        " , nature: ".$row['nature']." , duration ".$row['duration']." , meeting date: ".$row['meeting_date']." , possible objects: ".$row['possible_objects']." , witness list: ".$row['witness_list']."</h5><br>";
    }
}

?>

<label >delete visit:</label>
           <input type="text" name="DeleteVisitId_user" class="register_form_text" placeholder="ID of visit you want to delete" />
             
            
           <div> 
           <button type="submit" name="submit_delete_visit_user" class="register_btn"> Delete </button>
           
           
           <button type="submit" name="download_user_visits" class="register_btn"> Download your visits</button>
  </div>
           <?php
if(isset($_GET["error7"])){
       if($_GET["error7"]=="emptyinput"){
           echo "<h3>Empty field!</h3>";
       }
       else if($_GET["error7"]=="visitNotExist")
       {
        echo "<h3>Visit doesnt exist!</h3>";
       } 

    }
  //  $id++;
  //  echo $id;
?>
</form>

        </div>
            <div class="social_menu">
                <div class="media_button">
                    <a href="#">
                        <img src="css/images/image8.png" alt="image8">
                    </a>
                </div>
                <div class="media_button">
                    <a href="#">
                        <img src="css/images/image7.png" alt="image7">
                    </a>
                </div>
                <div class="media_button">
                    <a href="#">
                        <img src="css/images/image9.png" alt="image9">
                    </a>
                </div>
                <div class="media_button">
                    <a href="#">
                        <img src="css/images/image10.png" alt="image10">
                    </a>
                </div>
            </div>
        
    </body>
</html>