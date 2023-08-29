<?php
session_start();
include_once 'submit/dbh.sub.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>New_visit</title>
        <link rel="stylesheet" href="./css/new_visit_style.css" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
       { echo "<li class='menu_item'><a href='register.php'> <h5>REGISTER</h5> </a> </li>";
             
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
        
        <div class="new_visit_section">
            <h1>NEW VISIT</h1>
            <form class="new_visit_form" action="submit/new_visit.sub.php" method="post" >
                <div class="border_line"></div>
                
                <label > detained name:</label>
                <?php
               /* if(isset($_SESSION['userName']))
               { $user=$_SESSION['userName'];
                  echo $user;  
              } */ 
                ?>
                <input
                    type="text"
                    name="detained_name"
                    class="new_visit_form_text"
                    placeholder="detained name"
                >
                <div class="meeting_data">
                    <div class="select_area">
                        <label >Your relationship with the detained:</label>
                        <select name="relationship">
                            <option value="">Your relation to the detained</option>
                            <option value="relative">relative</option>
                            <option value="tutor">tutor</option>
                            <option value="lawyer">lawyer</option>
                            <option value="friend">friend</option>
                        </select>
                    </div>
                    <div class="nature_area">
                        <label>Nature of the meeting:</label>
                        <div>
                            <input type="radio" name="family_meeting" value="family_meeting">
                            <label >Family meeting</label>
                        </div>
                        <div>
                            <input type="radio" name="legal_planning_meeting" value="legal_planning_meeting">
                            <label >Legal planning meeting</label>
                        </div>
                        <div>
                            <input type="radio" name="casual_meeting" value="casual_meeting">
                            <label >Casual meeting</label>
                        </div>
                    </div>
                </div>
                <h4>Select visit date:</h4>
                <div class="meeting_time">
                    <div class="select_time_area">
                        <div class="time_cell">
                            <label >day:</label>
                           
                            <select name="day">
                            <option>day</option>
                            <?php
                            for($i=1;$i<=31;$i++){
                                echo "<option>".$i."</option>";
                            }

                           ?>

                                
                            </select>
                        </div>
                        <div class="time_cell">
                            <label >month:</label>
                            
                              <select name="month">
                              <option>month</option>
                            <?php
                            $months=['Ian','Feb','Mar','Apr','Mai','Iun','Iul','Aug','Sep','Oct','Nov','Dec'];
                            foreach($months as $month){
                                echo "<option>".$month."</option>";
                            }
                            
                            
                            ?>
                          
                               ]                           
                            </select>
                        </div>
                        <div class="time_cell">
                            <label >year:</label>
                            <select name="year">
                               <option>year</option>
                                <?php
                                for($i=2021;$i<=2023;$i++){
                                    echo "<option>".$i."</option>";
                                }
                                
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="duration_area">
                        <label>Select meeting duration:</label>
                        <div>
                            <input type="radio" name="30_minutes" value="30_minutes">
                            <label >30 minutes</label>
                        </div>
                        <div>
                            <input type="radio" name="60_minutes" value="60_minutes">
                            <label >60 minutes</label>
                        </div>
                        <div>
                            <input type="radio" name="90_minutes" value="90_minutes">
                            <label >90 minutes</label>
                        </div>
                    </div>
                </div>
                <div>
                    <h4>Possible objects given to the detained:</h4>
                    <textarea name="possible_objects" class="new_visit_form_text" placeholder="object list"></textarea>
                </div>
                <div>
                    <h4>Witnesses at the meeting:</h4>
                    <textarea  name="witness_list" class="new_visit_form_text" placeholder="witness list"></textarea>
                </div>
              
              
                <button type="submit" name="button_visit" class="submit_btn"> Submit</button>
            
            
                <?php
   
   if(isset($_GET["error4"])){
       if($_GET["error4"]=="emptyinputs"){
           echo "<h3>Empty fields!</h3>";
       }
       else if($_GET["error4"]=="detainedNotExist")
       {
        echo "<h3>Detained doesnt exist!</h3>";
       }
       else if ($_GET["error4"]=="statementFailed")
       {
        echo "<h3>Statement failed</h3>";
       }
       else if($_GET["error4"]=="none")
       {
        echo "<h3>Visit created!</h3>";
       }
      
   }
   
   ?>
</form>



           
        </div>
        <footer>
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
        </footer>
    </body>
</html>
