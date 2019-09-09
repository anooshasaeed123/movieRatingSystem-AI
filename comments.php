<?php
include "db/db.php";
include "db/thankyou.php";


if(isset($_GET["id"])){
    $_SESSION['$id2']=$_GET['id'];
    $id1= $_SESSION['$id2'];
    $_SESSION["movieid"] = $id1;
 }
//$id1 = $_GET["id"];


//$_SESSION["movieid"] = $id1;



?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Rate it!</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.js"></script>
    <!-- Custom styles for this template -->
    <link href="./css/main.css" rel="stylesheet">
    <script type="text/javascript">
    </script>
    
    
    <style>
        body{
            
          background-color: black;
           

background-size:100%;
        
        
        }
    
        .font{
            
            color: azure;
        }
    
    img.center {
    display: block;
    margin: 0 auto;
}
    .button {background-color: #555555;} 
    
    
    </style>
    

</head>
<body>
<h1 class ="font"style="text-align: center; ">RATE YOUR MOVIE</h1>
<br/>
<div class="col-sm-3">
    
     

</div>
<div class="col-sm-6">
 <?php
     $sql = "SELECT * FROM movietable WHERE movie_id ='$id1'" ;
    
    $result =  $link->query($sql);
    
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    
    ?>
    
   <h1 class="font" style="text-align: center; "> <?php echo $row['Name']; ?></h1>
    <img class="center" align="middle" src="home/images/<?php echo $row['imageurl'];?>"  height="400" width="600">   
 
   <h3  style="text-align: center; " class="font">
     <?php echo $row['movieinfo'];?>
   </h3>
    
   
    
<h2 class="font">Enter your comment here:</h2>

<form action="comments.php" method="Post" >
                <textarea id="post" name="comment" rows="8" cols="73" style="resize:none" placeholder="Enter comment here!"></textarea>
                <br>
                <br>
                <input type="hidden" name="pk" value="<?php echo $id1; ?>">
                <button class="button" name='submit' onclick="" type="submit">click</button>
                
            </form>
          
   <h3 class="font"> your calculated rating is <?php
        
       echo $total."<br><br>";
        
          //  getcomments($link,$movie);
        
        
        ?>
        
        </h3>
    

             
   
			</div>
<div class="col-sm-3"></div>
</body>
</html>







