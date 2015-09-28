<?php
session_start();
$id=$_SESSION['id'];
//echo $id."<br>";
$con=  mysql_connect('localhost','root','')or die("unable to connect");
  
mysql_select_db("donation");
$s="select * from register where fkid='$id'";
$ss=mysql_query($s);
$col=  mysql_fetch_array($ss);

$ls=  mysql_query("select * from login where id=$id");
$row= mysql_fetch_array($ls);
//echo $col[0] ."<br>";
//echo $col[1]."<br>";

//echo $row[2];

?>
<div align='right'>
            
            <a href="s.php">search</a>&nbsp&nbsp;
             
              <a href="logout.php">Logout</a>
        </div>
<center>
    <h3>Update your Register</h3>
<form action="updating.php?fkid=<?php $col[7]?>" method="POST">

<table>
    <tr>
        <td> Name</td>
        <td>:</td>
        <td><input type="text" name="name" value="<?php echo $col[1]?>" size="15" /></td>
    </tr>
    <tr>          
        <td>Address</td>
        <td>:</td>
        <td>        
            
            <textarea name="address" rows="4" cols="20"><?php echo $col['address']?></textarea>
            
            </td>
    </tr>
    <tr>
                        <td>District</td>
                        <td>:</td>
                        <td>
                            <select name="district" value="<?php echo $col[3]?>">
                                <option>---select---</option>
                                <?php
                                    
                                $ss=  mysql_query("select * from district");
                                  $district=$_GET["district"];                             
                                while($disresult = mysql_fetch_row($ss))
                                {
                                 ?>
                                
                                                       
                                
                                  <option value=<?php 
                                echo'"' . $disresult[0] . '"';
                                        if($district == $disresult[1])
                                        {
                                           echo 'selected="selected" '; 
                                        }
                                        ?>
                                        > <?php echo $disresult[1]; ?></option>
                                  
                                <?php }?>
                        </select>
                           </td>
                    </tr>
                    
                    <tr>
        <td>Contact</td>
        <td>:</td>
        <td><input type="text" name="phone" value="<?php echo $col[5]?>" size="15" /></td>
</tr>


    <tr>
        <td>password</td>
        <td>:</td>
        <td><input type="text" name="pass" value="<?php echo $row[2]?>" size="15" /></td>
</tr>

<tr><td> <input type="submit" value="update" id="update" /></td><td></td>
                    <td><input type="reset" value="reset" name="reset"  id="update"/></td></tr>
</table>
</form>
</center>