<?php
session_start();

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
            <h1>CONTACT US</h1>
            <form class="contact_form" method="post" action="mail_handler.php">
                <div class="border_line"></div>
                <label >name:</label>
                <input type="text" name="name" class="contact_form_text" placeholder="your name">
                <label >email:</label>
                <input type="email" name="email" class="contact_form_text" placeholder="your email" >
                
                
                <label >subject:</label>
                <input type="number" name="subject" class="contact_form_text" placeholder="your phone" >
                <label >message::</label>
                <textarea class="contact_form_text" name="message" placeholder="Your Message"></textarea>         
                <button type="submit" name="submit" value="send" class="contact_btn"> SEND</button>
            
                  
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