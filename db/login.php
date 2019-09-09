<?php

session_start();



include 'db.php';
 if($_SERVER['REQUEST_METHOD']=='POST')
           {    
     
            login($link);
     
     
           }




function login($link){
    
 $name = $_POST['username'];
 $pass = $_POST['password'];
    
    $sql = "SELECT * FROM USER WHERE username ='$name' and password='$pass'" ;
    
    $result =  $link->query($sql);
    
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    
    $id =  $row['id'];
    
    
    
    $_SESSION["userid"] = $id;


    
    if($row['username']==$name && $row ['password']== $pass){
        
        
        
         header("location:../home/home.html");
    }
    
    else
    {
        
        echo "username and password didnt match";
    }
    
    
    
    

      
    
}



?>