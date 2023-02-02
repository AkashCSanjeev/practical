<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include('dbconfig.php');

    if(isset($_POST["insert"])){
        $title = $_POST["title"];
        $price = $_POST["price"];
        $genera = $_POST["genera"];
        $input = $_POST["input"];
       $sql= "INSERT INTO `CD` (`CID`, `title`, `price`, `genera`) VALUES (NULL, '$title', '$price', '$genera')";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "suceesful";
        }
    }

    if(isset($_POST["get"])){
 
       $sql= "SELECT * FROM `Artist`,`Produce`,`CD` WHERE Artist.AID = Produce.AID AND CD.CID=Produce.CID AND Artist.Aname='$input'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                echo "". $row["title"]."    ".$row["price"]."    ".$row["genera"];
                echo "<br>";
            }
        }
    }
    
    
    
    
    ?>
</body>
</html>