<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    class clsclient       //class for the tb_client
    {
        public $id,$name,$pwd,$email,$phone_no,$address;

        public function Save_Client()      //function for inserting new client in the tb_client
        {
            $con= new clscon();
            $link=$con->db_connect();
            
            
            //$x= md5($this->pwd);
            $p=md5($this->pwd);
            //echo $p;
            $qry="Call insclient('$this->name','$p','$this->email','$this->address','$this->phone_no')";  //call to stored procedure
            $res=mysqli_query($link,$qry);
            if(mysqli_affected_rows($link))
            {
                $con->db_close();
                return TRUE;
            }
            else 
            {
                $con->db_close();
                return FALSE;
            }
        }
        
        public function Update_Client()       //function for updating a client in the tb_client
        {
            $con= new clscon();
            $link=$con->db_connect();
            $p=md5($this->pwd);

            
 //   echo $this->name;
            $qry="Call updclient($this->id,'$this->name','$p','$this->email','$this->phone_no','$this->address')";   //call to stored procedure
           
            $res=mysqli_query($link,$qry);
            if(mysqli_affected_rows($link))
            {
                $con->db_close();
                return TRUE;
            }
            else 
            {
                $con->db_close();
                return FALSE;
            }
        }
        
        public function Delete_Client()       //function for deleting a client from the tb_client
        {
            $con= new clscon();
            $link=$con->db_connect();
            $qry="Call delclient($this->id)";   //call to stored procedure
            $res=mysqli_query($link,$qry);
            if(mysqli_affected_rows($link))
            {
                $con->db_close();
                return TRUE;
            }
            else 
            {
                $con->db_close();
                return FALSE;
            }
        }
        
        public function Display_Client()       //function for dispalying clients of the tb_client
        {
            $con= new clscon();
            $link=$con->db_connect();
            $qry="Call dispclient()";   //call to stored procedure
            $res=mysqli_query($link,$qry);
            $i=0;
            while($r=mysqli_fetch_row($res))
            {
                $arr[$i]=$r;
                $i++;
            }
            $con->db_close();
            return $arr;
        }
        
        public function Find_Client()         ////function for finding a client from the tb_client
        {
            $con= new clscon();
            $link=$con->db_connect();
            $qry="Call findclient($this->id)";   //call to stored procedure
            $res=mysqli_query($link,$qry);
            if(mysqli_num_rows($res)>0)
            {
                $r=mysqli_fetch_row($res);
                $this->id=$r[0];
                $this->name=$r[1];
                $this->pwd=$r[2];
                $this->email=$r[3];
                $this->address=$r[4];
                $this->phone_no=$r[5];
            }
            $con->db_close();
        }
        
        public function Login_Client()
        {
            $con=new clscon();
            $link=$con->db_connect();

        
            //$pass='$this->pwd';
          //  echo $pass;
           $x=  md5($this->pwd);
            //echo $x;
            $qry="Call loginclient('$this->email','$x',@ret)";
            $res=  mysqli_query($link, $qry);
            $qry1="select @ret";
            $res1=  mysqli_query($link,$qry1);
            
            $r=  mysqli_fetch_row($res1);
            $d=$r[0];
            //echo $d;
            
            if($d==-1)
            {
                $str="Wrong Email";
            }
            if($d==-2)
            {
                $str="Wrong Password";
            }
            if($d==1)
            {
                $str="Logged in";
            }
            
            $con->db_close();
            return $str;
            
        }
    }
?>
