<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "arduino";
    $error="";
    $sql="";
    if(filter_input(INPUT_GET, "uname")==NULL||filter_input(INPUT_GET, "pass")==NULL){
        header("Location:index.php?msg=signin&update=Username or Password cannot be Empty");
    }
    else {
        $flag="none";
    }
    if($flag=="none"){
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        if(filter_input(INPUT_GET, "acctype")=== "Consumer"){
            $sql = "SELECT uname,pass FROM register ";
        } elseif(filter_input(INPUT_GET, "acctype")=== "Admin") {
            $sql = "SELECT uname,pass FROM admin";
        }
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while($row =mysqli_fetch_assoc($result)) {
                if( (filter_input(INPUT_GET, 'uname') === $row['uname']) && (filter_input(INPUT_GET, 'pass') === $row['pass']) ){
                    echo $row['uname'].$row['pass'];
                    $error="none";
                    break;
                }   
            }
        } 
        else {
            mysqli_close($conn);
            header("Location:index.php?msg=signin&update=The Device is not Registered");
        }
        mysqli_close($conn);
        if($error=="none"){
            session_start();
            $_SESSION['uname']= filter_input(INPUT_GET, "uname");
            $_SESSION['pass']= filter_input(INPUT_GET, "pass");
            $_SESSION['acctype']=filter_input(INPUT_GET, "acctype");
            header("Location:home.php");
        }
        else {
            header("Location:index.php?msg=signin&update=UserID or Password is Incorrect");
        }
    }
?>