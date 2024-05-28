<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <style>
        table{
            border:2px solid black;
            border-collapse:collapse;
        }
        td,th{
            border:1px solid black;
            padding:8px;
        }
        h1{
            padding:10%;
            font-weight:bolder;
            font-size:40px;
        }
        div{
            background-color:black;
            width:50%;
            color:white;
            border-radius:40px;
            cursor:pointer;
            transition:background-color 0.8s;
            
        }
        div:hover{
            background-color:white;
            color:black;
            width:50%;
            border-radius:40px;
            
        }
    </style>
</head>
<body>
    <center>
        <?php 
            extract($_POST);    

           if($firstname==""){
            echo "<center><div><h1>FirstName cannot be empty !!!</h1></div></center>";
            exit();
           }


            $conn = mysqli_connect("localhost", "root", "", "");

            if ($conn === false) {
                die("Error: Could not connect. " . mysqli_connect_error());
            }

            $createdb = "CREATE DATABASE IF NOT EXISTS final;";
            if (!mysqli_query($conn, $createdb)) {
                echo "Error: " . mysqli_error($conn);
            }

            $select = "USE final;";
            mysqli_query($conn, $select);

            $createtable = "CREATE TABLE IF NOT EXISTS finale (
               firstname VARCHAR(300),
               lastname VARCHAR(300),
               email VARCHAR(300),
               phone BIGINT(11),
               username VARCHAR(300))";

            if (!mysqli_query($conn, $createtable)) {
                echo "Error creating table: " . mysqli_error($conn);
            }
            $em="SELECT * FROM finale WHERE email='$email'";
            $result=mysqli_query($conn,$em); 
            if(mysqli_num_rows($result)>0){
                echo "Email id Already exists !!";
                exit();
            }
            else{$checkusr="SELECT * FROM finale WHERE username='$username'";
                $result=mysqli_query($conn,$checkusr);

                if(mysqli_num_rows($result)>0){
                    echo "Username already exists!!";
                    exit();
                }
                else{
                    $sql = "INSERT INTO finale (firstname,lastname,email,phone,username) VALUES ('$firstname','$lastname','$email','$phone','$username')";
                    if(mysqli_query($conn, $sql)){
                        echo "<h1>Application Sent successfully!</h1>";
                        echo "<h2>You will informed about by your email-id: '$email' </h2>";
                        
                        $sqli = "SELECT * FROM finale";
                    $result =mysqli_query($conn,$sqli);
                    
                    if ($result->num_rows > 0) {
                      // output data of each row
                      echo "<table><tr><th>Name</th>";
                      echo "<th>Email</th>";
                      echo "<th>Phone Number</th>";
                      echo "<th>Username</th></tr>";
                      while($row = $result->fetch_assoc()) {
                        
                       echo "<tr><td>".$row["firstname"]."-".$row["lastname"]."</td>";
                       echo "<td>".$row["email"]."</td>";
                       echo "<td>".$row["phone"]."</td>";
                       echo "<td>".$row["username"]."</td></tr>";
                       }
                        
                        
                        echo "</table><br>";
                      }
                     else {
                      echo "0 results";
                    }
                        header("refresh:10;url=./index.html");
        
                    } else {
                        echo "Sorry, there was an error: " . mysqli_error($conn);
                    }
                }

            }
           
    
            


           mysqli_close($conn);
        ?>
    </center>
</body>
</html>
