<?php
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
			<li><a href="index.php?msg=signin&error=" >Sign In</a></li>
                        <li>Set Up Device
                            <ul>
                                <li><a href="index.php?msg=sconsumer&error=">Consumer</a></li>
                                <li><a href="index.php?msg=sadmin&error=">Admin</a></li>
                            </ul>
                        </li>
		</ul>
	</div>
	<div id="Pulse">
	</div>
	<div id="Bill">
            <?php
                if($_GET){
                    if($_GET['msg']=="signin"){
                        echo '<center><form id="Inputdate" action="signin.php" method="GET">
                            <table id="Table">
                                <tr>
                                    <td> <label>Account Type<font color="red">*</font></label> </td>			
                                    <td> 
                                        <select name="acctype"> 
                                            <option value="Consumer">Consumer</option>
                                            <option value="Admin">Admin</option> 
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td> <label>Username<font size=2%></font><font color="red">*</font></label> </td>			
                                    <td> <input name="uname" type="text"/> </td>
                                </tr>	
                                <tr>
                                    <td> <label>Password <font size=2%></font><font color="red">*</font></label> </td>			
                                    <td> <input name="pass" type="password"/> </td>
                                </tr>	
                                <tr>
                                    <td><font color="red">' .filter_input(INPUT_GET, 'update'). '</font></td>
                                </tr>	
                                <tr>
                                    <td></td>    
                                    <td align="right"> <button  name="submit" type="submit">Sign In</button> </td>			
                                </tr>	
                            </table>
                        </form></center>';
                    }
                    elseif($_GET['msg']=="sconsumer"){
                        echo '<center><form id="Inputdate" action="setup.php" method="GET">
                            <table id="Table">
                                <tr>
                                    <td> <label>Account Type<font color="red">*</font></label> </td>			
                                    <td> 
                                        <select name="acctype"> 
                                            <option value="Consumer">Consumer</option> 
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td> <label>Name<font size=2%></font><font color="red">*</font></label> </td>			
                                    <td> <input name="name" type="text"/> </td>
                                </tr>	
                                <tr>
                                    <td> <label>Username<font size=2%></font><font color="red">*</font></label> </td>			
                                    <td> <input name="uname" type="text"/> </td>
                                </tr>	
                                <tr>
                                    <td> <label>Password <font size=2%></font><font color="red">*</font></label> </td>			
                                    <td> <input name="pass" type="password"/> </td>
                                </tr>
                                <tr>
                                    <td> <label>Re-Password <font size=2%></font><font color="red">*</font></label> </td>			
                                    <td> <input name="rpass" type="password"/> </td>
                                </tr>
                                <tr>
                                    <td> <label>Email <font size=2%></font><font color="red">*</font></label> </td>			
                                    <td> <input name="email" type="email"/> </td>
                                </tr>
                                <tr>
                                    <td> <label>MeterNo. <font size=2%></font><font color="red">*</font></label> </td>			
                                    <td> <input name="meterno" type="number"/> </td>
                                </tr>	
                                <tr>
                                    <td> <label>Security Question <font size=2%></font><font color="red">*</font></label> </td>			
                                    <td> 
                                        <select name="sques"> 
                                            <option value="Your NickName?">Your NickName?</option>
                                            <option value="Your childhood Friend">Your childhood Friend?</option> 
                                            <option value="Your Favrouite color">Your Favrouite color?</option> 
                                            <option value="Your birth city">Your birth city?</option> 
                                            <option value="Your Favourite Colour">Your Favourite Colour?</option> 
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td> <label>Security Answer<font size=2%></font><font color="red">*</font></label> </td>			
                                    <td> <input name="sans" type="text"/> </td>
                                </tr>
                                <tr>
                                    <td><font color="red">' . filter_input(INPUT_GET, 'update'). '</font></td>
                                    <td align="right"> <button  name="submit" type="submit">Set Up New Device</button> </td>			
                                </tr>	
                            </table>
                        </form></center>';
                    }
                    elseif($_GET['msg']=="sadmin"){
                        echo '<center><form id="Inputdate" action="setup.php" method="GET">
                            <table id="Table">
                                <tr>
                                    <td> <label>Account Type<font color="red">*</font></label> </td>			
                                    <td> 
                                        <select name="acctype"> 
                                            <option value="Admin">Admin</option> 
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td> <label>Employee No.<font size=2%></font><font color="red">*</font></label> </td>			
                                    <td> <input name="meterno" type="number"/> </td>
                                </tr>	
                                <tr>
                                    <td> <label>Name<font size=2%></font><font color="red">*</font></label> </td>			
                                    <td> <input name="name" type="text"/> </td>
                                </tr>	
                                <tr>
                                    <td> <label>Username<font size=2%></font><font color="red">*</font></label> </td>			
                                    <td> <input name="uname" type="text"/> </td>
                                </tr>	
                                <tr>
                                    <td> <label>Password <font size=2%></font><font color="red">*</font></label> </td>			
                                    <td> <input name="pass" type="password"/> </td>
                                </tr>
                                <tr>
                                    <td> <label>Re-Password <font size=2%></font><font color="red">*</font></label> </td>			
                                    <td> <input name="rpass" type="password"/> </td>
                                </tr>
                                <tr>
                                    <td> <label>Email <font size=2%></font><font color="red">*</font></label> </td>			
                                    <td> <input name="email" type="email"/> </td>
                                </tr>
                                <tr>
                                    <td> <label>Security Question <font size=2%></font><font color="red">*</font></label> </td>			
                                    <td> 
                                        <select name="sques"> 
                                            <option value="Your NickName?">Your NickName?</option>
                                            <option value="Your childhood Friend">Your childhood Friend?</option> 
                                            <option value="Your Favrouite color">Your Favrouite color?</option> 
                                            <option value="Your birth city">Your birth city?</option> 
                                            <option value="Your Favourite Colour">Your Favourite Colour?</option> 
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td> <label>Security Answer<font size=2%></font><font color="red">*</font></label> </td>			
                                    <td> <input name="sans" type="text"/> </td>
                                </tr>
                                <tr>
                                    <td><font color="red">' . filter_input(INPUT_GET, 'update'). '</font></td>
                                    <td align="right"> <button  name="submit" type="submit">Sign Up</button> </td>			
                                </tr>	
                            </table>
                        </form></center>';
                    }
                }
            ?>
	</div>
	<div id="Footer" align="center">
             &copy;Abhishek Katyare and Friends
	</div>
</div>
</body>
</html>