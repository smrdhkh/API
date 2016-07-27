<?php 
include_once 'include/config.php';

// $_SESSION['clientId']=1;
if ( !isSet( $_SESSION['clientId'] ) ) {
	header('Location:client_login.php');
}	
if ( !isSet($_POST['name']) )
{
	header("Location: updateClient.php");
}
if ( !isSet($_POST['email']) )
{
	header("Location: updateClient.php");
}
if ( !isSet($_POST['phone_no']) )
{
	header("Location: updateClient.php");
}
//echo $_POST['name'].$_POST['passwd'].$_POST['email'].$_POST['phone_no'];
$obj = new clsclient();
$obj->id = $_SESSION["clientId"];
$obj->name=$_POST['name'];
$obj->phone_no=$_POST['phone_no'];
$obj->email=$_POST['email'];
$obj->address=$_POST['address'];
$obj->pwd=$_POST['passwd'];

echo $obj->name;
echo $obj->email;

//$object=new clscon();
//$link=$object->db_connect();
//$qry="select * from tb_client where email='$obj->email' and not(id=$obj->id)";
// $qry="select * from tb_client where email='$obj->email'";
//$res=  mysqli_query($link,$qry);
//$n=  mysqli_num_rows($res);
//if($n==1)
//{ 
    $r=$obj->Update_Client();
//    $r=$obj->Update_Client();
    //exit();
    header( 'Location: index.php' );
//}
//else 
//{
//     echo '<script language="javascript">';
//     echo 'alert("User already exists.Try a different email...")';
//     echo '</script>';
//     header("Location:updateClient.php");
//             
//}
//     $object->db_close();
    ?>