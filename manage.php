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
<link rel="stylesheet" href="css\button.css" type="text/css">
<body>
<div id="Main">
	<div id="Header"> 
        <h1>Arduino Smart Metering<br>(LT I Res 1-Phase)</h1>
        </div>
	<div id="Menu">
            <ul>
                <li ><a href="logout.php"><font id="Logout">LOGOUT<br><?php echo $_SESSION['uname']."(".$_SESSION['acctype'].")"; ?></font></a></li>
                <li><a href="about.php">ABOUT</a></li>
                <?php 
                    if($_SESSION['acctype']==="Consumer"){
                        echo '<li><a href="usage.php" >USAGE</a></li>';
                    }
                    else{
                        echo '<li><a href="manage.php" ><b id="active">MANAGE</b></a></li>';
                    }
                ?>
                <li class="active"><a href="home.php">HOME</a></li>
            </ul>
        </div>
        <div id="Pulse" align="right">
            <?php 
                $conn = mysqli_connect($servername, $username, $password, $dbname);
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                $sql = "SELECT meterno,name FROM register";
                $result = mysqli_query($conn, $sql);
                echo '<br><br><br><table id="Table">
                <tr>
                <td>Meter<br> No.</td>
                <td>Customer<br> Name</td>
                </tr>';
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo "<td>".$row['meterno']."</td>";
                        echo "<td>".$row['name']."</td>";
                        echo '</tr>';
                        }     
                    $error="none";
                }
                else {
                    mysqli_close($conn);
                    //echo 'index page<br> device not registered';
                    header("Location:index.php");
                }
                echo '</table>';
                mysqli_close($conn);
                if($error!="none"){
                    echo 'error present';
                    header("Location:index.php");
                }


            ?>
	</div>
    <div id="Bill" align="left">
            <?php 
                $conn = mysqli_connect($servername, $username, $password, $dbname);
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                $month=date('M');
                $year=date('Y');
                switch ($month) {
                case "Jan": 
                    $date1= $year."-01-01";
                    $date2= $year."-01-31";
                    if($date1<date('Y-m-d')){
                        if($date2>date('Y-m-d')){
                            $date2= date('Y-m-d');
                        }
                        $error="none";
                    }else{
                    $error="*Month not started yet";    
                    }
                    break;
                case "Feb":
                    $date1= $year."-02-01";
                    $date2= $year."-02-28";
                    if($date1<date('Y-m-d')){
                        if($date2>date('Y-m-d')){
                            $date2= date('Y-m-d');
                        }
                        $error="none";
                    }else{
                    $error="*Month not started yet";    
                    }
                    break;
                case "Mar":
                    $date1= $year."-03-01";
                    $date2= $year."-03-31";
                    if($date1<date('Y-m-d')){
                        if($date2>date('Y-m-d')){
                            $date2= date('Y-m-d');
                        }
                        $error="none";
                    }else{
                    $error="*Month not started yet";    
                    }
                    break;
                case "Apr":
                    $date1= $year."-04-01";
                    $date2= $year."-04-30";
                    if($date1<date('Y-m-d')){
                        if($date2>date('Y-m-d')){
                            $date2= date('Y-m-d');
                        }
                        $error="none";
                    }else{
                    $error="*Month not started yet";    
                    }
                    break;
                case "May":
                    $date1= $year."-05-01";
                    $date2= $year."-05-31";
                    if($date1<date('Y-m-d')){
                        if($date2>date('Y-m-d')){
                            $date2= date('Y-m-d');
                        }
                        $error="none";
                    }else{
                    $error="*Month not started yet";    
                    }
                    break;
                case "Jun":
                    $date1= $year."-06-01";
                    $date2= $year."-06-30";
                    if($date1<date('Y-m-d')){
                        if($date2>date('Y-m-d')){
                            $date2= date('Y-m-d');
                        }
                        $error="none";
                    }else{
                    $error="*Month not started yet";    
                    }
                    break;
                case "Jul":
                    $date1= $year."-07-01";
                    $date2= $year."-07-31";
                    if($date1<date('Y-m-d')){
                        if($date2>date('Y-m-d')){
                            $date2= date('Y-m-d');
                        }
                        $error="none";
                    }else{
                    $error="*Month not started yet";    
                    }
                    break;
                case "Aug":
                    $date1= $year."-08-01";
                    $date2= $year."-08-31";
                    if($date1<date('Y-m-d')){
                        if($date2>date('Y-m-d')){
                            $date2= date('Y-m-d');
                        }
                        $error="none";
                    }else{
                    $error="*Month not started yet";    
                    }
                    break;
                case "Sept":
                    $date1= $year."-09-01";
                    $date2= $year."-09-30";
                    if($date1<date('Y-m-d')){
                        if($date2>date('Y-m-d')){
                            $date2= date('Y-m-d');
                        }
                        $error="none";
                    }else{
                    $error="*Month not started yet";    
                    }
                    break;
                case "Oct":
                    $date1= $year."-10-01";
                    $date2= $year."-10-31";
                    if($date1<date('Y-m-d')){
                        if($date2>date('Y-m-d')){
                            $date2= date('Y-m-d');
                        }
                        $error="none";
                    }else{
                    $error="*Month not started yet";    
                    }
                    break;
                case "Nov":
                    $date1= $year."-11-01";
                    $date2= $year."-11-30";
                    if($date1<date('Y-m-d')){
                        if($date2>date('Y-m-d')){
                            $date2= date('Y-m-d');
                        }
                        $error="none";
                    }else{
                    $error="*Month not started yet";    
                    }
                    break;
                case "Dec":
                    $date1= $year."-12-01";
                    $date2= $year."-12-31";
                    if($date1<date('Y-m-d')){
                        if($date2>date('Y-m-d')){
                            $date2= date('Y-m-d');
                        }
                        $error="none";
                    }else{
                    $error="*Month not started yet";    
                    }
                    break;
                default :
                    $error="";
                    break;
            }
                $sql = "SELECT count(led) FROM control WHERE currenttimestamp >= ('" .($date1) ." 00:00:00') AND currenttimestamp <=  ('" . ($date2) . " 23:59:59')";
                $result = mysqli_query($conn, $sql);
                echo '<br><br><br><table id="Table">
                <tr>
                <td>Current Month Bill<br> ('.$month.':'.$date1.' to '.$date2.' )</td>
                </tr>';
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $count=$row["count(led)"];
                        $totalPulse =$count;
                         /* @var $totalUnit type */
                        $totalUnit=(1/3200)*$totalPulse;
                        if ($totalUnit >= 0 && $totalUnit <= 100) {
                            $price = 2.98;
                        } elseif ($totalUnit >= 101 && $totalUnit <= 300) {
                            $price = 6.73;
                        } elseif ($totalUnit >= 301 && $totalUnit <= 500) {
                            $price = 9.69;
                        } elseif ($totalUnit >= 501 && $totalUnit <= 1000) {
                            $price = 11.17;
                        } else {
                            $price = 12.45;
                        }
                        /* @var $totalBill type */
                        $totalBill=$totalUnit*$price;
                        $fixedCharges = 59.50;
                        $wheelingcharges = ($totalUnit*1.21) ;
                        $eneryduty =($totalBill+$fixedCharges+$wheelingcharges)*0.16;
                        $totalCharges= ($totalUnit*$price)+$fixedCharges+$eneryduty+$wheelingcharges;
                        echo '<tr>';
                        echo "<td>Rs. ".ceil($totalCharges)."</td>";
                        echo '</tr>';
                    }     
                    $error="none";  
                }
                else {
                    mysqli_close($conn);
                    //echo 'index page<br> device not registered';
                    header("Location:index.php");
                }
                echo '</table>';
                mysqli_close($conn);
                if($error!="none"){
                    echo 'error present';
                    header("Location:index.php");
                }


            ?>
	</div>
	<div id="Footer" align="center">
            &copy;Abhishek Katyare and Friends
	</div>
</div>
</body>
</html>