<?php 
include_once 'include/config.php';
if ( !isSet( $_SESSION['clientId'] ) )
{
	header('Location: client_login.php');
}
?>


<!DOCTYPE html>

<html lang="en">

    <!--head-->
    <head>
        <title>Deliccio | My Account</title>
        <meta charset="utf-8">
        <?php
        include_once 'include/header.php';
        ?>
    </head>
    
    <!--body-->
        <body id="page2">
            
            <div class="body6">
                <div class="body1">
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
                            <ul id="menu">
                                <li ><a href="index.php">Restaurant</a></li>
                                        <li class="active"><a href="cuisine.php">Cuisine</a></li>
                                        <li><a href="beverages.php">Beverages</a></li>
                                        <li><a href="dessert.php">Dessert</a></li>';
                                
                            </ul>
                      </nav>
                    </header>
                        <article id="content">
                        <div class="wrap">
                            <section class="cols">
                                <div class="box">
                                    <div align="center">
                                        <?php 
                                            $obj = new clsclient();
                                            $obj->id = $_SESSION["clientId"];
                                            $obj->Find_Client();
                                        ?>
                    <br><br>
<form  method="post" id="commentForm" class="" action="updateClientProcess.php">
    <h1>Customer Details</h1>
<br>
<br>
<br>
    <label for="name">NAME: </label></br>
	<input type="text" id="name" name="name" value="<?php echo $obj->name; ?>" minlength="1" required/>
	</br>
	</br>
	
	<label for="name">EMAIL: </label></br>
	<input type="email" id="email" name="email" value="<?php echo $obj->email; ?>" minlength="1"/>
	</br>
	</br>
	<label for="name">Phone Number: </label><br>
        <input type="tel" id="phone_no" title="Phone number with 7-9 and remaing 9 digit with 0-9" pattern="[7-9]{1}[0-9]{9}" value="<?php $obj->phone_no; ?>" name="phone_no" size="10"/>
                    
	<!--<input type="tel" id="phone_no" name="phone_no" value="<?php $obj->phone_no; ?>" minlength="1"/>-->
	</br>
	</br>
	<label for="name">Password: </label></br>
	<input type="password" id="passwd" name="passwd"  minlength="1"/>
	</br>
	</br>
        <label for="name">Address: </label></br>
        <input type="text" id="address" name="address" value="<?php echo $obj->address; ?>" minlength="1"/>
	</br>
	</br>
        <input type="submit" name="submit" id="submit" >
	<!--//<button id="submit">Submit</button>-->
</form>

							
                                    </div>
                                </div>
                            </section>
                           <!-- <div align="center"><form id="form_login"><!--form content here--></form></div>-->
                    
                        </div>
                </div>
              </div>
                    <!-- / header -->
                    <div class="body3">
                <div class="body4">
                    <div class="main">
                        <!-- footer -->
                    
                        <?php
                                include_once 'include/footer.php';
                        ?>
                        <!-- / footer -->
                    </div>
                </div>
            </div>    
        
            <script>Cufon.now();</script>
        </body>

</html>
