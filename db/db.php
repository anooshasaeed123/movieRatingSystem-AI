<?php

    
    $mysql_host = 'localhost';
$mysql_user ='root';
$mysql_pass = NULL;
$mysql_db = 'movies';
    
    
 $link = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);


    
      mysqli_select_db( $link,$mysql_db);
    





     
 




?>