<?php
session_start();
include_once 'submit/dbh.sub.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head  >
        <meta charset="utf-8">
        <title>Homepage</title>
        <link rel="stylesheet" href="./css/homepage.css" type="text/css">
       
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
       <style>
 #button_quote{
    float: center;
    width: 10vw;
    border: 0;
    margin-top: 10px;
    background: #34495e;
    color: #fff;
    padding: 12px 50px;
    border-radius: 20px;
    cursor: pointer;
    transition: 0.5s;
}
.quote2{
    display:block;
    position:relative;
    width:50%;
    margin:5rem auto;
    
    padding:0.5rem;
    font-size:1.5rem;
    font-style:italic;
    line-height:1.5rem;
    font-family:'Times',serif;
    color:#ddd;
}
#author{
    display:block;
    line-height:1.2;
    font-style:normal;
   font-size:0.8em;
    color:#28292c;
    
}
.register_form_text {
    display: block;
    width: 30vw;
    box-sizing: border-box;
    border: 0;
    margin: 20px;
    background: #111;
    padding: 20px 20px;
    outline: none;
    color: #ddd;
    transition: 0.5s;
    border-radius: 5px;
}

.register_form_text:hover{
    box-shadow: 0 2px 10px 4px #34495e;
}
.profile_pic{
    height:40px;
    width:40px;
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
             {echo" <li class='menu_item'>
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
        <div class="homepage_section">
            <h1>HOMEPAGE</h1>
            
            <div class="border_line"></div>

            
            <div class="quote_section">
                <div class="quote">
                    <p>
                        One of the many lessons that one learns in prison is, that things are what they are and will be what they will be.
                    </p>
                    <span>
                        Oscar Wilde
                    </span>
                </div>
                <div class="quote">
                    <p>
                        Money will determine whether the accused goes to prison or walks out of the courtroom a free man.
                    </p>
                    <span>
                        Johnnie Cochran
                    </span>
                </div>
                <div class="quote">
                    <p>
                        Today is the day to break free from the prison of the person you know yourself to be and step into a self you have yet to know. Will it be comfortable? No, but do it anyway.
                    </p>
                    <span>
                        Debbie Ford
                    </span>
                </div>

                
                <div class="quote2">
                 <div id="quote">
                Don't forget: life is a race, if you don't run fast, you'll get trampled
                 </div>
            <div id="author">
                Author
            </div>
                <button class="contact_btn" id="button_quote">Random quote</button>

                <script src="script3.js"></script>

            </div>

           

            </div>
             
          
            <div class="gallery_container">
                <div class="gallery_images">
                    <a href="images/img-1.png" class="img-1">
                        <i class="icon-expand"></i>
                    </a>
                    <a href="images/img-2.jpg" class="img-2">
                        <i class="icon-expand"></i>
                    </a>
                    <a href="images/img-3.jpg" class="img-3">
                        <i class="icon-expand"></i>
                    </a>
                    <a href="images/img-4.jpg" class="img-4">
                        <i class="icon-expand"></i>
                    </a>
                    <a href="images/img-5.jpg" class="img-5">
                        <i class="icon-expand"></i>
                    </a>
                    <a href="images/img-6.jpg" class="img-6">
                        <i class="icon-expand"></i>
                    </a>
                    <a href="images/img-7.jpg" class="img-7">
                        <i class="icon-expand"></i>
                    </a>
                    <a href="images/img-8.jpg" class="img-8">
                        <i class="icon-expand"></i>
                    </a>
                </div>
            </div>
        

   <h2 id="h2_latest_videos">Latest prison vlog videos:</h2>         
<div class="rss_section">

<?php


$url="https://www.youtube.com/feeds/videos.xml?channel_id=UCzmkeda2XiYpETOP5MjotrQ";
$xml=simplexml_load_file($url);

for($i=0;$i<10;$i++){

echo "<div class=video_box>";

$id=$xml->entry[$i]->id;
//$id=str_replace("https://www.youtube.com/watch?v=","",$id);
$title=$xml->entry[$i]->title;
$name=$xml->entry[$i]->author->name;
$uri=$xml->entry[$i]->author->uri;
$link=$xml->entry[$i]->link;
$published=$xml->entry[$i]->published;
//accesam nodurile din xml file

echo "<h4 class='video_title'>".$title."</h4><br>";

echo "<p>".$name.",published at: ".$published."</p>";

//echo "<a href='https://www.youtube.com/watch?v=".$id."'>video link</a><br>";

echo "<a href=".$uri.">link</a><br>";


echo "</div>";
}



?>

</div>

<div id="comments">

<?php


 // echo "<p>ok</p>";  

$sql="SELECT * FROM comments;";
$result=mysqli_query($conn,$sql);
$resultCheck=mysqli_fetch_assoc($result);

if($resultCheck >0 ){

    while($row=mysqli_fetch_assoc($result)){
        echo  "<h3> Comment: ".$row['msg']." ,</h3>   <br><p>by ".$row['author']."</p><br>";
    }
}


if(isset($_SESSION["userName"]))
{
    echo "<form class='register_form' action='submit/comment.sub.php' method='post'>
    <label  >post your comment:</label>
            <input type='text' name='author' class='register_form_text' placeholder='your name' />
            <input type='text' name='message' class='register_form_text' placeholder='your comment' />
            
            <button type='submit' name='submit_comment' id='button_quote'> Submit </button>

    </form>";

}


?>


</div>


</div>
            <div class="social_menu">
                <div class="media_button">
                    <a href="https://www.facebook.com/thedark.archer.5/">
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