<?php 
include '/include/header.php';



if(isset($_REQUEST["lid"])==1)
{
    session_unset();

//    unset($_SESSION["clientId"]);
//   for($i=0;$i<1000;$i++)
//    {
//        if(isset($_SESSION["cart.$i"]))
//        {
//                unset($_SESSION["cart".$i]);
//    
//        }
//    
//    }
}

?>

<title>Deliccio | Beverages</title>	
    </head>
	<body id="page3">
            <div class="body6">
		<div class="body1">
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
                        //unset($_SESSION["clientId"]);
                    }
                
                    if(isset($_SESSION["clientId"]))
                    {
                     
                        echo '    
                                <li>
                                    <form method="post" action="cart.php">
                                        <button id="viewCart" name="viewCart">View Cart</button>
                                    </form>
                                 </li>
                                 
                                </ul>';   
                    }
                    	?>	
          </nav>
          
            <nav>
                                    <ul id="menu">
					<li ><a href="index.php">Restaurant</a></li>
					<li><a href="cuisine.php">Cuisine</a></li>
                                        <li class="active"><a href="beverages.php">Beverages</a></li>
                                         <li><a href="dessert.php">Dessert</a></li>							<!-- <li><a href="contacts.html">Contacts</a></li>-->
                                    </ul>
				</nav>
                            </header>
			<!-- / header -->
			<!-- content -->
			<article id="content">
                            <div class="wrap">
				<section class="cols">
                                    <div class="box">
					<div>
					<h2>Did You <span>Know</span></h2>
					<figure><img src="images/page3_image1.jpg" alt="" ></figure>
					<p class="pad_bot1">LASSI is a popular tradtional youghurt-based drink which originates from Punjab,India.Sweetened with honey ,it is used while performing religious rituals.</p>
					</div>
                                    </div>
				</section>
				<section class="cols pad_left1">
                                    <div class="box">
					<div>
                                            <h2 class="letter_spacing">Dellicio<span> Beverage</span></h2>
						<ul class="list1 pad_bot1">
                                                    <?php
                                                    include_once 'include/config.php';
                                                    $obj=new clscon();
                                                    $link=$obj->db_connect();
                                                    
                                                    $qry="select * from tb_item where category='Beverage'";
                                                    $res=  mysqli_query($link,$qry);
                                                    
                                                    while($r=mysqli_fetch_row($res))
                                                    {
                                                        echo '<li>'.$r[1].'</li><br>'; 
                                                    }
                                                    
                                                    $obj->db_close();
                                                    ?>
						</ul>
					</div>
                                    </div>
				</section>
				<section class="cols pad_left1">
                                    <div class="box">
					<div>
					<h2>Day's<span> Drink</span></h2>
					<figure><img src="images/page3_image2.jpg" alt="" ></figure>
					<p class="pad_bot1">"The King of Fruits", Mango <i> 'Mangifera Indica' </i> is one of the most popular,nutritionally rich fruits with unique flavor and taste and is often labeled as 'super fruit'.
					</div>
                                    </div>
				</section>
                            </div>
			</article>
                    </div>
		</div>
            </div>
            <div class="body2">
		<div class="main">
                    <article id="content2">
			<div class="wrapper">
                            <section class="pad_left1">
				<div class="wrapper">
                                    <div class="cols">
                                    <h2>Alcohol Delivery</h2>
                                    </div>  
                                    <div class="col3 pad_left1">
                                    <h2>Beverages</h2>
                                    </div>
				</div>
				<div class="line1">
				<div class="wrapper line2">
                                    <div class="cols">
					<div class="wrapper pad_bot1">
                                            <figure class="pad_bot1"><img src="images/page3_img4.jpg" alt=""></figure>
                                            There's no man,woman or child on this earth who deosn't like a tasty beverage. 
					</div>
                                    </div>
				<div class="cols pad_left1">
                                    <div class="col2">
					<ul class="price">
                                            <?php     
                                            $obj=new clscon();
                                          $link=$obj->db_connect();
                                                    
                                            $qry="select * from tb_item where category='Beverage'"; 
                                            $res=  mysqli_query($link,$qry);
                                            $n=  mysqli_num_rows($res);
                                            $i=0;
                                            while($r=mysqli_fetch_row($res))
                                            {
                                                $i++;
                                                if($i<=$n/2)
                                                {
                                                    echo "<li>";      
                                                    echo $r[1];
                                                    echo "<span>$r[3]</span></li>";
                                                    echo '<li><a href="cart.php?bid='.$r[0].'"> Buy</a></li><br>';
                                                }
                                                    
                                            }
                                                    
                                          $obj->db_close();
                                            ?>
					</ul>
                                    </div>
				</div>
				<div class="col2 pad_left1">
                                    <ul class="price">
                                        <?php     
                                            $obj=new clscon();
                                            $link=$obj->db_connect();
                                                    
                                            $qry="select * from tb_item where category='Beverage'";
                                            $res=  mysqli_query($link,$qry);
                                            $n=  mysqli_num_rows($res);
                                            $i=0;
                                            while($r=mysqli_fetch_row($res))
                                            {
                                                $i++;
                                                if($i>$n/2)
                                                {
                                                    echo "<li>";      
                                                    echo $r[1];
                                                    echo "<span>$r[3]</span></li>";
                                                    echo '<li><a href="cart.php?bid='.$r[0].'"> Buy</a></li><br>';
                                                }
//                                                    echo '<li>'.$r[0].'........'.
//                                                        ''.
//                                                            ''.
//                                                        '</form'.
//                                                        '</span></li><br>';
                                            }
                                                    
                                            $obj->db_close();
                                        ?>
                            </div>
			</div>
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