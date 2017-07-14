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
    $query="";
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

<?php
    $error="";
    $year=date("Y");
    if (filter_input_array(INPUT_POST)) {
        if(filter_input(INPUT_POST,"month")){
            switch (filter_input(INPUT_POST,"month")) {
                case "JAN": 
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
                case "FEB":
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
                case "MAR":
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
                case "APR":
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
                case "MAY":
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
                case "JUN":
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
                case "JUL":
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
                case "AUG":
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
                case "SEPT":
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
                case "OCT":
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
                case "NOV":
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
                case "DEC":
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
        }
        elseif(filter_input(INPUT_POST, 'fdate')=="" || filter_input(INPUT_POST, 'edate')==""){
            $error="*Date can't be blank";
        }            
        elseif(filter_input(INPUT_POST, 'fdate')>date('Y-m-d') || filter_input(INPUT_POST, 'edate')>date('Y-m-d')){            
            $error="*System can check reading only till today";
        }
        else{
          $error="none";
        }
    }
?>
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
            <li><a href="about.php">ABOUT</a></li>
            <?php 
                        if($_SESSION['acctype']==="Consumer"){
                            echo '<li><a href="usage.php" ><b id="active">USAGE</b></a></li>';
                        }
                        else{
                            echo '<li><a href="manage.php" ><b id="active">MANAGE</b></a></li>';
                        }
                    ?>
            <li ><a href="home.php">HOME</a></li>
        </ul>
    </div>
    <div id="Pulse">
        <?php
            if(filter_input_array(INPUT_POST)&&($error=="none")){
                $servername = "localhost";
                $username = "id1863335_root";
                $password = "abhishek";
                $dbname = "id1863335_arduino";
                if(filter_input(INPUT_POST,"month")){
                    $startdate=$date1;
                    $enddate=$date2;
                }else{
                    $startdate=date_format(date_create($_POST['fdate']),"Y-m-d");
                    $enddate= date_format(date_create($_POST['edate']),"Y-m-d");
                }
                echo '<table id="Table">';
                if($startdate=== $enddate){
                    echo "<tr><th>Hours(X : 00 to 59)</th><th>Blinks</th></tr>";
                } 
                else {
                    echo "<tr><th>Dates</th><th>Blinks</th></tr>";
                }
                
                class TableRows extends RecursiveIteratorIterator { 
                    function __construct($it) { 
                        parent::__construct($it, self::LEAVES_ONLY); 
                    }
                    function current() {
                        return "<td>" . parent::current(). "</td>";
                    }
                    function beginChildren() { 
                        echo "<tr>"; 
                    } 
                    function endChildren() { 
                        echo "</tr>" . "\n";
                    } 
                } 
                try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    if($startdate=== $enddate){
                        $query = "SELECT HOUR(currenttimestamp) AS 'Hours', COUNT(led)
                            FROM control
                            WHERE currenttimestamp >= ('" . ($startdate) . " 00:00:00') 
                            AND currenttimestamp <=  ('" . ($enddate) . " 23:59:59')
                            GROUP BY HOUR(currenttimestamp)";
                    } else {
                        $query = "SELECT CAST(currenttimestamp AS DATE),COUNT(currenttimestamp) 
                                FROM control 
                                WHERE currenttimestamp >= ('" . ($startdate) . " 00:00:00') AND currenttimestamp <= ('" . ($enddate) . " 23:59:59') 
                                GROUP BY CAST(currenttimestamp AS DATE)";    
                    }
                    $stmt = $conn->prepare($query);
                    $stmt->execute();
                    // set the resulting array to associative
                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
                    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
                        echo $v;
                    }
                }
                catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                $conn = null;
                echo "</table>";
            }
            elseif($error!="none"){
                echo '<center><form id="Inputdate" action="usage.php" method="POST">
                    <table id="Table">
                        <tr>
                            <td><h3>Monthly Bill</h3></td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="month" value="JAN">JAN</td>
                            <td><input type="radio" name="month" value="FEB">FEB</td>
                            <td><input type="radio" name="month" value="MAR">MAR</td>
                        </tr>	
                        <tr>
                            <td><input type="radio" name="month" value="APR">APR</td>
                            <td><input type="radio" name="month" value="MAY">MAY</td>
                            <td><input type="radio" name="month" value="JUN">JUN</td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="month" value="JUL">JUL</td>
                            <td><input type="radio" name="month" value="AUG">AUG</td>
                            <td><input type="radio" name="month" value="SEPT">SEPT</td>
                            
                        </tr>
                        <tr>
                            <td><input type="radio" name="month" value="OCT">OCT</td>
                            <td><input type="radio" name="month" value="NOV">NOV</td>
                            <td><input type="radio" name="month" value="DEC">DEC</td>
                        </tr>
                        <tr>
                            <td><font color="RED">'.$error.'</font></td><td></td>
                            <td><button name="submit" type="submit">Submit</button></td>
                        </tr>
                        
                    </table>
                </form></center>';
                  
            }
        ?>
    </div>
    <div id="Bill">
	<?php
            if(filter_input_array(INPUT_POST)&&($error=="none")){
                if(filter_input(INPUT_POST,"month")){
                    $startdate=$date1; 
                    $enddate=$date2;
                }else{
                    $startdate=date_format(date_create(filter_input(INPUT_POST, 'fdate')),"Y-m-d");
                    $enddate= date_format(date_create(filter_input(INPUT_POST, 'edate')),"Y-m-d");
                }
                $conn = mysqli_connect($servername, $username, $password, $dbname);
				if (!$conn) {
					die("Connection failed: " . mysqli_connect_error());
				}
                $sql = "SELECT count(led) FROM control WHERE currenttimestamp >= ('" .($startdate) ." 00:00:00') AND currenttimestamp <=  ('" . ($enddate) . " 23:59:59')";
                $result = mysqli_query($conn, $sql);
                $oddrow = true;
                $count=0;
                if($row = mysqli_fetch_assoc($result)){
                    $count=$row["count(led)"];
                }
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
                echo '<center><table id="Table">';
                echo '<tr><td ><i><b><i>Bill Duration</i></td><td>' . $startdate . ' to	' . $enddate . '</i></b></td></tr></table>';
                echo '<br><table id="Table"><tr><td></td><td  align="center">Rs.Ps.</td></tr>';
                echo '<tr><td ><i>Fixed Charges</i></td><td align="center">' . $fixedCharges . '</td></tr>';
                echo '<tr><td ><i>Total Unit</i></td><td align="center">' . $totalUnit . '</td></tr>';
                echo '<tr><td ><i>Electricity Charges</i></td><td align="center">' . $totalUnit*$price . '</td></tr>';
                echo '<tr><td><i>Energy Duty  (16%)</i></td><td align="center">' . $eneryduty . '</td></tr>';
                echo '<tr><td><i>Wheeling Charges </i>(1.18/Unit)</td><td align="center">' . $wheelingcharges . '</td></tr>';
                echo '<tr><td><i>Total Pulses</i></td><td align="center">' . $totalPulse . '</td></tr>';
                echo '<tr><td><i>Total Reading</i></td><td align="center">' . $totalUnit . '</td></tr>';
                echo '<tr><td><i><h2>Rounded Bill</h2></i></td><td align="center"><h2>' . ceil($totalCharges) . ' Rs.Ps.</h2></td></tr>';
                echo '<tr><td></td><td><button onclick="window.print();">Print me</button>
                </td></table></center>';
            }
            elseif($error!="none"){
                echo '<center><form id="Inputdate" action="usage.php" method="POST">
                    
                    <table id="Table">
                        <tr>
                            <td> <label>From Date<font size=2%></font><font color="red">*</font></label> </td>			
                            <td> <input name="fdate" type="date"/> </td>
                        </tr>	
                        <tr>
                            <td> <label>To Date <font size=2%></font><font color="red">*</font></label> </td>			
                            <td> <input name="edate" type="date"/> </td>
                        </tr>	
                        <tr>
                            <td><font color="red">' .$error. '</font></td>
                            <td align="right"> <button  name="submit" type="submit">Submit</button> </td>			
                        </tr>	
                    </table>
                </form></center>';
                  
            }
        ?>
    </div>
    <div id="Footer" align="center">
        &copy;Abhishek Katyare and Friends
    </div>
</div>
</body>
</html>