<?php 
include '/include/header.php';
if(isset($_GET["lid"])==1)
{
    session_unset();
//    unset($_SESSION["clientId"]);
//    for($i=0;$i<1000;$i++)
//    {
//        if(isset($_SESSION["cart.$i"]))
//        {
//                unset($_SESSION["cart".$i]);
//    
//        }
//    
//    }
//    
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
                                 <?php
                                if(isset($_SESSION["clientId"]))
                                echo'<li><a href="updateClient.php"><font color="white" face="verdana">My Account</font></a></li>';
                              
                            ?>
                                <li><a href="client_signup.php"><font color="white" face="verdana">Sign up</font></a></li>
                            
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
        <!-- content -->
        <article id="content">
<!--          <div class="slider_bg">
            <div class="slider">-->
              <ul class="items">
                <li> <img src="images/img1.jpg" alt="">

                </li>

              </ul>

          <div class="wrap">
            <section class="cols">
              <div class="box">
                <div>
                  <h2>Welcome <span>to Us!</span></h2>
                  <figure><img src="images/page1_img1.jpg" alt="" ></figure>
                  <p class="pad_bot1">The best food you can get just by clicking button and choosing the best you can from dishes by best chef\'s accross the globe on their best. <!--   <a href="#" class="button1">Read More</a> </div>
             --> </div>
            </section>
            <section class="cols pad_left1">
              <div class="box">
                <div>
                  <h2>About <span>Us</span></h2>
                  <figure><img src="images/page1_img2.jpg" alt="" ></figure>
                  <p class="pad_bot1">Providing the perfect service you can get with the best beverages even free home delivery and cash on delivery with a smile on your face.</p>
                <!--  <a href="#" class="button1">Read More</a> </div>
            -->  </div>
            </section>
            <section class="cols pad_left1">
              <div class="box">
                <div>
                  <h2>Our <span>Services</span></h2>
                  <figure><img src="images/page1_img3.jpg" alt="" ></figure>
                  <ul class="list1 pad_bot1">
                    <li>Come sit and enjoy meal</li>
                    <li>Organize parties</li>
                    <li>Order online</li>
                    <li>Sea Side view with nature on its best.</li>
                  </ul>
               <!--   <a href="#" class="button1">Read More</a> </div>
             --> </div>
            </section>
          </div>
        </article>
      </div>
    </div>
  </div>
</div>
<div class="body2">
  <div class="main">
    <article id="content2">
      <div class="wrapper">
        <section class="col1 pad_left1">
          <h2>Upcoming Events</h2>
          <div class="wrapper">
            <div class="cols">
              <div class="wrapper pad_bot2">
                <figure class="left marg_right1"><img src="images/page1_img4.jpg" alt=""></figure>
                <p> <a href="#">20.07. South Indian Day</a><br>
                 South Indian cuisine servered whole day along with patar. </p>
              </div>
              <div class="wrapper">
                <figure class="left marg_right1"><img src="images/page1_img5.jpg" alt=""></figure>
                <p> <a href="#">18.07. Italiian Cisine</a><br>
                 Pasta, Garlic Bread with garlic mayonize all with home made base. </p>
              </div>
            </div>
            <div class="cols pad_left1">
              <div class="wrapper pad_bot2">
                <figure class="left marg_right1"><img src="images/page1_img6.jpg" alt=""></figure>
                <p> <a href="#">11.07. Fast Food Day</a><br>
                  Burger, Noodles and Diet Coldrinks served along with basel. </p>
              </div>
              <div class="wrapper">
                <figure class="left marg_right1"><img src="images/page1_img7.jpg" alt=""></figure>
                <p> <a href="#">09.07. Punjabi Food Day</a> <br>
                  Punjabi Thali, Lasssi, Amritsari Kulche all served with desi ghee. </p>
              </div>
            </div>
          </div>
        </section>
        <section class="col2 pad_left1">
          <h2>Testimonials</h2>
          <ul class="testimonials">
            <li> <span>1</span>
              <p> “Eat healthy be healthy.” <img src="images/signature1.jpg" alt=""> </p>
            </li>
            <li> <span>2</span>
              <p> “Live life king size.” <img src="images/signature2.jpg" alt=""> </p>
            </li>
            <li> <span>3</span>
              <p> “Eat to live not live to eat.”<br>
                <img src="images/signature3.jpg" alt=""> </p>
            </li>
          </ul>
        </section>
      </div>
    </article>
    <!-- / content -->
  </div>
</div>
<div class="body3">
  <div class="body4">
    <div class="main">
      <!-- footer -->
      <footer>
          <?php
	  include '/include/footer.php';
          ?>
	  
        <!-- {%FOOTER_LINK} -->
      </footer>
      <!-- / footer -->
    </div>
  </div>
</div>
<script>Cufon.now();</script>
</body>
</html>

