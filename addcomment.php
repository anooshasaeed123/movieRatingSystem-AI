
<?php
include 'db/thankyou.php';
include "db/db.php";


$id1 = $_GET["id"];

echo $id1;



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
    

    

</head>
<body>
<h1 style="text-align: center; color: green;">RATE YOUR MOVIE</h1>
<br/>
<div class="col-sm-3">
    <?php
     $sql = "SELECT * FROM movietable WHERE movie_id ='$id1'" ;
    
    $result =  $link->query($sql);
    
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    
    echo $row['Name'];
    
    ?>
    
    
</div>
<div class="col-sm-6">
<h2>Enter your comment here:</h2>
<form action="db/thankyou.php" method="Post">
                <textarea id="post" name="comment" rows="8" cols="73" style="resize:none" placeholder="Enter comment here!"></textarea>
                <br>
                <br>
                <input type="submit"  name="send" value="click" onclick="" name="commentsubmit" class="btn btn-primary btn-block"/>
                
                <input type="hidden" name="test" value="<?php print $var; ?>"/>
            </form>
           
			</div>
<div class="col-sm-3"></div>
</body>
</html>







?>