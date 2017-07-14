<?php
    session_start();
    $servername = "localhost";
    $username = "id1863335_root";
    $password = "abhishek";
    $dbname = "id1863335_arduino";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if($_SESSION['acctype']=== "Consumer"){
            $sql = "SELECT uname,pass FROM register ";
        } elseif($_SESSION['acctype']=== "Admin") {
            $sql = "SELECT uname,pass FROM admin";
        }
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                if( ($_SESSION['uname'] === $row['uname']) && $_SESSION['pass'] === $row['pass']) {
                    $error="none";
                    break;
                }     
            }
        }
    else {
        mysqli_close($conn);
        //echo 'index page<br> device not registered';
        header("Location:index.php");
    }
    mysqli_close($conn);
    if($error!="none"){
        //echo 'error present';
        header("Location:index.php");
    }
?>
<html>
<title>LT Energy Bill</title>
<link rel="stylesheet" href="css/text.css" type="text/css">
<link rel="stylesheet" href="css/menu.css" type="text/css">
<body>
<div id="Main">
	<div id="Header"> 
        <h1>Arduino Smart Metering<br>(LT I Res 1-Phase)</h1>
        </div>
	<div id="Menu">
		<ul>
                    <li ><a href="logout.php"><font id="Logout">LOGOUT<br><?php echo $_SESSION['uname']."(".$_SESSION['acctype'].")"; ?></font></a></li>
                    <li class="active"><a href="about.php"><b id="active">ABOUT</b></a></li>
                    <?php 
                        if($_SESSION['acctype']==="Consumer"){
                            echo '<li><a href="usage.php" >USAGE</a></li>';
                        }
                        else{
                            echo '<li><a href="manage.php" >MANAGE</a></li>';
                        }
                    ?>
                    <li ><a href="home.php">HOME</a></li>
		</ul>
	</div>
	<div id="Pulse" align="center">
            <table id="Table">
                <tr>
                    <td></td>
                    <td><h3>References</h3></td>
                </tr>
                <tr>
                    <td>1</td>
                    <td><a href=https://www.google.co.in/>www.google.co.in</a></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td><a href=https://www.arduino.cc/en/Tutorial/HomePage>www.arduino.cc/en/Tutorial/HomePage</a></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td><a href=https://www.arduino.cc/en/Reference/HomePage>www.arduino.cc/en/Reference/HomePage</a></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td><a href=http://arduino-info.wikispaces.com/ArduinoPower>arduino-info.wikispaces.com/ArduinoPower</a></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td><a href=http://www.wikihow.com/Calculate-Wattage>www.wikihow.com/Calculate-Wattage</a></td>
                </tr>
                <tr>
                    <td>6</td>
                    <td><a href=https://amtek.wordpress.com/2014/05/04/control-arduino-through-internet-on-windows>amtek.wordpress.com/2014/05/04/control-arduino-through-internet-on-windows</a></td>
                </tr>
                <tr>
                    <td>7</td>
                    <td><a href=http://www.rotwang.co.uk/projects/meter.html>www.rotwang.co.uk/projects/meter.html</a></td>
                </tr>
                <tr>
                    <td>8</td>
                    <td><a href=http://forum.arduino.cc/index.php?topic=320990.0>forum.arduino.cc/index.php?topic=320990.0</a></td>
                </tr>
                <tr>
                    <td>9</td>
                    <td><a href=https://www.allaboutcircuits.com/technical-articles/using-interrupts-on-arduino/>www.allaboutcircuits.com/technical-articles/using-interrupts-on-arduino</a></td>
                </tr>
                <tr>
                    <td>10</td>
                    <td><a href=https://www.digikey.com/en/articles/techzone/2012/sep/light-sensors-an-overview>www.digikey.com/en/articles/techzone/2012/sep/light-sensors-an-overview</a></td>
                </tr>
                <tr>
                    <td>11</td>
                    <td><a href=http://www.instructables.com/id/LEDs-as-light-sensors/>www.instructables.com/id/LEDs-as-light-sensors/</a></td>
                </tr>
                <tr>
                    <td>12</td>
                    <td><a href=http://jeelabs.org/2012/03/18/detecting-a-blinking-led/>jeelabs.org/2012/03/18/detecting-a-blinking-led/</a></td>
                </tr>
                </tr>
                
            </table>
	</div>
	<div id="Bill" align="center">
            <table id="Table">
                <td></td><td><b>Our Team</b></td>
                <tr>
                    <td><image id="ProfilePic" src="Image/ak.jpg"></td>
                    <td><b>Abhishek Katyare</b><br>
                        <i>Coding and Designing</i><br>
                        <a href="mailto:abhishekkatyare@gmail.com">abhishekkatyare@gmail.com</a>
                    </td>
                </tr>
                <tr>
                    <td><image id="ProfilePic" src="Image/sk.jpg"></td>
                    <td><b>Shireen Khan</b><br>
                        <i>Designing and Testing</i><br>
                        <a href="mailto:shireenkhan6596@gmail.com">shireenkhan6596@gmail.com</a>
                    </td>
                </tr>
                <tr>
                    <td><image id="ProfilePic" src="Image/as.jpg"></td>
                    <td><b>Alisha Shaikh</b><br>
                        <i>Data Requirement and Deployment</i><br>
                        <a href="mailto:alisha2habib@gmail.com">alisha2habib@gmail.com</a>
                    </td>
                </tr>
                <tr>
                    <td><image id="ProfilePic" src="Image/js.jpg"></td>
                    <td><b>Junaid Shaikh</b><br>
                        <i>Requirement Gathering and Deployment</i>
                        <a href="mailto:junaidshailkh888@gmail.com">junaidshailkh888@gmail.com</a>
                    
                    </td>
                    
                </tr>
            </table>
	</div>
	<div id="Footer" align="center">
            &copy;Abhishek Katyare and Friends
	</div>
</div>
</body>
</html>