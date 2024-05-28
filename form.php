<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
     extract($_POST);

     $conn=mysqli_connect("localhost","root","","");

     if($conn==false){
        die("Error" . mysqli_connect_error($conn));
        exit();
     }

     $createdb="CREATE DATABASE IF NOT EXISTS help;";
     if(!mysqli_query($conn,$createdb)){
        echo "Error" . mysqli_error($conn);
        exit();
     }
     $select="USE help";
     mysqli_query($conn,$select);

     $createtable="CREATE TABLE IF NOT EXISTS helpp(

        Name VARCHAR(250),
        email VARCHAR(250),
        phone BIGINT(11),
        comments VARCHAR(250));";
     
     
     if(!mysqli_query($conn,$createtable)){
        echo "Error" . mysqli_error($conn);
        exit();
     }


     $sql="INSERT INTO helpp(Name,email,phone,comments) VALUES('$name','$email','$phone','$com')";

     if(mysqli_query($conn,$sql)){
        echo "<h1>You're comments are noted ThankYou!!!!</h1>";
     }
     else{
        echo "Error". mysqli_error($conn);
     }


mysqli_close($conn);


?>

</body>
</html>