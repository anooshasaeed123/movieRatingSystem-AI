<?php


include 'db.php';
 if($_SERVER['REQUEST_METHOD']=='POST')
           {    
     
            login($link);
     
     
           }




function login($link){
    
    
    $name = $_POST['uname'];
    $pass1 = $_POST['pass1'];
     $pass2 = $_POST['pass2'];
    
    
 
      if($pass1==$pass2){ 
       $sql =  "INSERT INTO user (username,password) VALUES('$name','$pass1')";
    
          $result =  $link->query($sql);
          
          echo "done";
          
      }
    
    else{
        
        echo"pass didnt match";
    }
   
 
      
    
}



?>