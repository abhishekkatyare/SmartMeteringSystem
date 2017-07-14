<?php
$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "arduino";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT securityques,securityans FROM register ";
    if(filter_input_array(INPUT_GET)){
        if(filter_input(INPUT_GET, "npass")== filter_input(INPUT_GET, "nrpass")){
        $sql1 = "update register set pass='".filter_input(INPUT_GET, "npass")."' where securityans='". filter_input(INPUT_GET,"sans")."'";
        if (mysqli_query($conn, $sql1)) {
            echo "Record updated successfully";
        }
        else {
            echo "Error updating record: " . mysqli_error($conn);
        }
        }
    }
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $secques=$row['securityques'];
        $secans=$row['securityans'];
        mysqli_close($conn);
    } else {
        mysqli_close($conn);
        //echo 'index page device not registered';
        //header("Location:index.php");
    }    
?>
<html>
<title>Smart Metering Systems</title>
<link rel="stylesheet" href="css/text.css" type="text/css">
<link rel="stylesheet" href="css/menu.css" type="text/css">
<body>
<div id="Main">
	<div id="Header"> 
        <h1>Arduino Smart Metering<br>(LT I Res 1-Phase)</h1>
        </div>
	<div id="Menu">
		<ul>
                    <li><a href="forgotPass.php?update=" >Forgot Password</a></li>
                    <li><a href="index.php?msg=signin&error=" >Sign In</a></li>
                    <li ><a href="index.php?msg=setup&error=">Set Up Device</a></li>
		</ul>
	</div>
	<div id="Pulse">
	</div>
	<div id="Bill">
            <?php
                if(filter_input_array(INPUT_GET)){
                    if(filter_input(INPUT_GET, "sans")){
                        if($secans===filter_input(INPUT_GET, "sans")){
                            echo '<center><form id="Inputdate" action="forgotpass.php" method="GET">
                            <table id="Table">
                                <tr>
                                    <td> <label>New Password<font size=2%></font><font color="red">*</font></label> </td>			
                                    <td> <input name="npass" type="password"/>
                                </tr>	
                                <tr>
                                    <td> <label>Retype Password<font size=2%></font><font color="red">*</font></label> </td>			
                                    <td> <input name="nrpass" type="password"/> </td>
                                </tr>	
                                <tr>
                                    <td><font color="red">' .filter_input(INPUT_GET, 'update'). '</font></td>
                                </tr>	
                                <tr>
                                    <td></td>
                                    <td align="right"> <button  name="submit" type="submit">Submit</button> </td>			
                                </tr>	
                            </table>
                        </form></center>';
                            
                        }else{
                            header("Location:forgotpass.php?update=Input Correct Answer");
                        }
                    }
                     else {
                         echo '<center><form id="Inputdate" action="forgotpass.php" method="GET">
                        <table id="Table">
                            <tr>
                                <td> <label>Security Question<font size=2%></font><font color="red">*</font></label> </td>			
                                <td> <label>';echo $secques.'?</label></td>
                            </tr>	
                            <tr>
                                <td> <label>Seecurity Answer<font size=2%></font><font color="red">*</font></label> </td>			
                                <td> <input name="sans" type="text"/> </td>
                            </tr>	
                            <tr>
                                <td><font color="red">' .filter_input(INPUT_GET, 'update'). '</font></td>
                            </tr>	
                            <tr>
                                <td></td>
                                <td align="right"> <button  name="submit" type="submit">Submit</button> </td>			
                            </tr>	
                        </table>
                    </form></center>';
                     }
                }
                            
            ?>
	</div>
	<div id="Footer">
	</div>
</div>
</body>
</html>