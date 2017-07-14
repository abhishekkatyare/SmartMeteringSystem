<?php
    $servername = "localhost";
    $username = "id1863335_root";
    $password = "abhishek";
    $dbname = "id1863335_arduino";
   
    if((filter_input(INPUT_GET,"name")||filter_input(INPUT_GET,"email")||filter_input(INPUT_GET,"meterno")
            ||filter_input(INPUT_GET,"uname")||filter_input(INPUT_GET,"pass")||filter_input(INPUT_GET,"rpass")||
            filter_input(INPUT_GET,"sans")||filter_input(INPUT_GET,"sques"))==NULL) {
        header("Location:index.php?msg=setup&update=All Field are compulsory");
    }
    elseif(filter_input(INPUT_GET,"pass")!=filter_input(INPUT_GET,"rpass")){
        header("Location:index.php?msg=setup&update=Password does not match");
    }
    else{
        $flag="none";
    }
    if($flag=="none"){
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        if(filter_input(INPUT_GET, "acctype")=== "Consumer"){
            $sql = "SELECT * FROM register ";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                header("Location:index.php?msg=sconsumer&update=Device is already Registered");
            }
            else {
                if($_GET){
                    if($_GET['pass']==$_GET['rpass']){
                        $sql = "INSERT INTO register (name,email,meterno,uname,pass,securityans,securityques)
                                VALUES ('" .$_GET['name']. "','" .$_GET['email']. "','" .$_GET['meterno']. "','" .$_GET['uname']. "','"
                                .$_GET['pass']. "','" .$_GET['sans']. "','" .$_GET['sques']. "')";
                        if ($conn->query($sql) === TRUE) {
                            //header("Location:index.php?register=Device Registered Sucessfully");
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }
                }
                mysqli_close($conn);
                header("Location:index.php?msg=sconsumer&update=Device is Registered Sucessfully");
            }
        }
        else {
            if(filter_input_array(INPUT_GET)){
                if($_GET['pass']==$_GET['rpass']){
                    $sql = "INSERT INTO admin (empno,name,uname,pass,email,securityques,securityans)
                            VALUES ('" .$_GET['meterno']. "','" .$_GET['name']. "','" .$_GET['uname']. "','" .$_GET['pass']. "','"
                            .$_GET['email']. "','" .$_GET['sques']. "','" .$_GET['sans']. "')";
                    if ($conn->query($sql) === TRUE) {
                        //header("Location:index.php?register=Device Registered Sucessfully");
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                }
            }
            mysqli_close($conn);
            header("Location:index.php?msg=sadmin&update=Admin Account Created Successfully");
        }
        mysqli_close($conn);
    }
?>