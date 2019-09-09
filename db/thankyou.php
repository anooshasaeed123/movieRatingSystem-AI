<style>


    .comment{
        
        width: 800px;
        background-color:gray;
            
        padding: 20px;
        margin-bottom: 4px;
        border-radius: 4px;
    }
    
    .comment p{
        font-family: sans-serif;
        font-size: 14px;
        line-height: 16px;
        color: #282828;
        font-weight: 100;
    }
</style>
<?php
error_reporting(0);
include 'db.php';
session_start();
//$id1 = $_GET["id"];




function prediction($sum,$poscomlength){
    
    
    
      $prediction = $sum/ $poscomlength;
    $prediction = round($prediction, 10);
       $prediction =  number_format($prediction, 10);
   
    
    
    return $prediction;
    
  
}

function rating($link,$movie,$user){
    
      
$u_comment = $_POST["comment"];
    
   
    
  

      $sumpos =  filterneg($u_comment);
     $sumneg =  filterpos($u_comment);
    

    
      $poscomlength =  str_word_count($u_comment);
    
    $totallen = $sumpos + $sumneg;
    
 
    
  
    
      $prediction = prediction($sumneg,$totallen);
    

    
     $negativepred = bayes($prediction);
  
     
    
     
    
      $prediction= prediction($sumpos,$totallen);
     $positivepred =  bayes($prediction);
    

 
     
   

     if($negativepred>$positivepred){
         
         
         $result =  0;
     }
    elseif($negativepred==$positivepred){
        $result = 2;
    } 
    
    
    elseif($negativepred<$positivepred) {
        $result = 1;
    }
    return $result;
    
   }

function setcomment($link,$movie,$user,$type){
    
    
  $name = $_POST['comment'];
     
    

    
    $sql = "INSERT INTO comments (movie_id,user_id,comment,Reviewtype) VALUES ('$movie','$user','$name','$type')" ;
    
    $result =  $link->query($sql);
    
  
    
    
    
    
}

function getcomments($link,$movie){
    
    $sql= "SELECT * FROM comments where  movie_id ='$movie' ";
    
      $result =  $link->query($sql);
     
    while($row= mysqli_fetch_array($result,MYSQLI_ASSOC)){
    
     echo "<div class='comment'><p>";   
        echo  "Anonymous: ";
    echo $row['comment']."<br><br>";
        echo "</p></div>";
     
        
      
    }
    
}

function rat($link,$movie,$user,$type){
    
     $sql= "SELECT * FROM comments where  movie_id ='$movie' and reviewtype = '$type' ";
    $result =  $link->query($sql);
        while($row= mysqli_fetch_array($result,MYSQLI_ASSOC)){
            
            
            $com[] = $row['comment'];
     
        
    
    }
    
    $str = join(" ",$com);
    
       return $str;
   
  
}



function filterneg($comm){
$str = $comm;
   
    
    
      $array = array(
    "bad" => 0, "worst" =>0, "boring" => 0, "lame"=>0, "embarrassing"=> 0, "hate"=>0,"awful"=>0,"cheap"=>0,"ridiculous"=>0,"poor"=>0,"waste"=>0, 
);
    
   
    
    $mystring = $str;
$findme   = "don't";
    
$pos = strpos($mystring, $findme);
 $found= 0;

if ($pos === false) {
    
} 
    
    else {
 
    
   $len =   str_word_count($str);
 $pieces = preg_split("/[\s,.]+/", $str);
  
   
    $arraylen = sizeof($array);
 
   
     for($i=$pos;$i<$len;$i++){
         
        
        
       
                   
        if (array_key_exists($pieces[$i], $array)) {

            
          $found=2;
            break;
       
            
          }
         
     
        
        
        
    
        
    }
    
    
  
}
    
    
    
    
    
   
   
    
   
   
    
   
$piece = preg_split("/[\s,.]+/", $str);
    foreach ($piece as &$value) {
        
        if (array_key_exists($value, $array)) {

            
        $array["$value"]++;
       
            
    
            
        
     }
      
        
    }
    
    
 
    
    $prediction = 1;
    settype($prediction, "float");
    
    $sum = 0;
 
    
   foreach ($array as &$value) {
        
       
       $sum = $sum + $value;
    
     
       
       

      
       
 }
    
    return $sum-$found;
   
    
    
 
   
    
    
}

function filterpos($com){
    



 $str = $com;  
    
      $array = array(
    "good" => 0, "great" =>0, "awesome" => 0, "woah"=>0,"love"=>0,"amazing"=>0,"excellent"=>0,"epic"=>0,"exceptional"=>0,"best"=>0,"marvelous"=>0,"satisfactory"=>0,"superb"=>0,"wonderful"=>0,"commendable"=>0,"splendid"=>0, "prodigious"=>0, "like"=>0, 
);
    

    
$found= 0;
 $mystring = $str;
$findme   = "don't";
    
$pos = strpos($mystring, $findme);


if ($pos === false) {
    goto x;
} 
    
 else {
 
    
   $len =   str_word_count($str);
 $pieces = preg_split("/[\s,.]+/", $str);
  
   
    $arraylen = sizeof($array);
 
   
     for($i=$pos;$i<$len;$i++){
         
        
        
        
          
                   
        if (array_key_exists($pieces[$i], $array)) {

          
          $found=2;
            break;
       
            
          }
         
     
        
        
        
    
        
    }
    
    
  
}
    
    
    
 x:    $piece = preg_split("/[\s,.]+/", $str);
    
     $poscomlength =  str_word_count($str);
    
   
    
    

    foreach ($piece as &$value) {
        
        if (array_key_exists($value, $array)) {

            
        $array["$value"]++;
       
            
    
            
        
     }
      
        
    }
    
    
    
    $prediction = 1;
    settype($prediction, "float");
    
    $sum = 0;
    foreach ($array as &$value) {
        
       $sum = $sum + $value;
     
       
       
    ;
       
       
 }
     
  
   
    return $sum-$found;
    
}

function bayes($prediction){
    
    
    $baye = ($prediction * (0.33));

  $baye =  number_format($baye, 15);
    
    return $baye;
    
}


function totalrat($rat){
    
    $totalrat=3;
    if($rat==1){
        
                
  $totalrat= $totalrat + 1;
          
        
    }
    
    elseif($rat==0) {
        
          $totalrat= $totalrat - 1;
     
    }
    
    elseif($rat==2){
        
        $totalrat=3;
    }
    return $totalrat;
    
    
}

 if($_SERVER['REQUEST_METHOD']=='POST')
           {    
    //trainning set  negative
        // $type = 0;
     
        $id1 = $_POST['pk'];
     $user =   $_SESSION["userid"];
   $movie = $_SESSION["movieid"];
     
        /* $comm = rat($link,$movie,$user,$type);
     
       $prediction =  filterneg($comm);
     $negativepred = bayes($prediction);
       echo "Negative prediction: ".$negativepred."<br>";
     //trainning set positive
     $type = 1;
     
       $comm = rat($link,$movie,$user,$type);
     
       $prediction =  filterpos($comm);
     $positivepred =  bayes($prediction);
      echo "Positive prediction: ". $positivepred;
     
    // echo max($negativepred,$positivepred);
 echo "-";
     if($negativepred>$positivepred){
         
         
         echo 0;
     }
     else echo 1;
     
     
     */   
     $rat =  rating($link,$movie,$user);
     
     
     setcomment($link,$movie,$user,$rat);
     
     $total = totalrat($rat);
     
    

    


           
     
     
              
           } 



 

 
?>

