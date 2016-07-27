<?php 
include '/include/header.php';


if(isset($_REQUEST["lid"]))
{
    unset($_SESSION["clientId"]);
    unset($_SESSION["cart"]);
}

 if(isset($_POST["btnsave"]))
 {
     $obj=new clsclient();
     
     $f=$_POST["uf"];
     $l=$_POST["ul"];
     $arr=array($f,$l);
     $obj->name=  implode(" ",$arr);
     //echo $obj->name;
     $obj->pwd=$_POST["p"];
     $obj->email=$_POST["e"];
     $obj->address=$_POST["ad"];
     $obj->phone_no=$_POST["ph"];
     
     $object=new clscon();
     $link=$object->db_connect();
     $qry="select * from tb_client where email='$obj->email'";
     $res=  mysqli_query($link,$qry);
     $n=  mysqli_num_rows($res);
     if($n==0)
     {
        if($obj->Save_Client()==TRUE)
        {
            echo '<script language="javascript">';
            echo 'alert("Sign Up Successful")';
            echo '</script>';
        }
        else
        {
            echo '<script language="javascript">';
            echo 'alert("Sign Up Unsuccessful")';
            echo '</script>';
        }
     }
     else 
     {
        echo '<script language="javascript">';
        echo 'alert("User already exists.Try a different email...")';
        echo '</script>';
     }
     $object->db_close();
 }

?>

<html lang="en">

    <head>
    <title>Deliccio</title>
    <meta charset="utf-8">
    </head>


    <body id="page1">
    <div class="body6">
      <div class="body1">
        <div class="body5">
          <div class="main">
            <!-- header -->
            <header>
              <h1><a href="index.php" id="logo">Deliccio Fresh Fast Tasty</a></h1>
                                       <nav>
                                <ul id="top_nav">
                                    <li><a href="client_signup.php"><font color="white" face="verdana">Sign up</font></a></li>
                                </ul>
                            </nav>

             <nav>
                <ul id="top_nav">
                    <?php
                        if(!isset($_SESSION["clientId"]))
                        {
                           echo'<li><a href="client_login.php"><font color="white" face="verdana">Login</font></a></li>';
                        }
                        else
                        {
                            echo'<li><a href="index.php?lid=1"><font color="white" face="verdana">Logout</font></a></li>';
                           // unset($_SESSION["clientId"]);
                        }
                    ?>
                  <!--  <li><a href="#"><img src="images/icon_2.gif" alt=""></a></li>
                  <li class="end"><a href="contacts.php"><img src="images/icon_3.gif" alt=""></a></li>
                --></ul>

              </nav>

              <nav>
                <ul id="menu">
                  <li class="active"><a href="index.php">Restaurant</a></li>
                  <li><a href="cuisine.php">Cuisine</a></li>
                  <li><a href="beverages.php">Beverages</a></li>
                  <li><a href="dessert.php">Dessert</a></li>
                 <!-- <li><a href="contacts.php">Contacts</a></li>-->
                </ul>
              </nav>
            </header>
            <!-- / header -->
            
            </div>
        </div>

          <!--main thing-->
          <img src='images/Welcome-Sticky-Note.png' height='350' width='700' alt='Oops!!!Sorry.'>
          <a href="index.php">
              <img src='images/arrow.jpg' height='250' width='300' alt="Proceed to Home Page" onmouseover="display(this)">
          </a>
          
          <!--  <footer>-->
                    <?php
                    include '/include/footer.php';
                    ?>
                <!-- {%FOOTER_LINK} -->
                
              </div>
            </div>
          </div>

          <script>Cufon.now();</script>
    </body>

</html>



