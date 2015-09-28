 <!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php

if(!isset($_SESSION['user']))
{
   // header('location:index.php');

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>BLOOD DONATION</title>
    </head>
    <body>
        <div align='right'>
            
            <a href="u.php">Update</a>&nbsp&nbsp
             <a href="s.php">Search</a>&nbsp&nbsp
              <a href="logout.php">Logout</a>
        </div>
    <center>
        <h3>Register form</h3>
        <form name="reg" action="reg.php" method="POST">
            <table border="0">                
                <tbody>
                    <tr>
                        <td>Name</td>
                        <td>:</td>
                        <td><input type="text" name="name" value="" size="15" /></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>:</td>
                        <td><textarea name="address" rows="4" cols="20">
                            </textarea></td>
                    </tr>
                    <tr>
                        <td>District</td>
                        <td>:</td>
                        <td><select name="district">
                                <option>---select---</option>
                                <?php
                                $con = mysql_connect('localhost', 'root', '')or die("unable to connect");

                                mysql_select_db("donation");
                                $ss=  mysql_query("select * from district");
                                                               
                                while($result = mysql_fetch_row($ss))
                                {
                                ?>
                                
                                
                                <option value="<?php echo $result[0]?>"> <?php echo $result[1]; ?></option>
                                <?php }?>
                        </select></td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>:</td>
                        <td><input type="radio" name="gender" value="male" />Male</td>
                        <td><input type="radio" name="gender" value="female" />Female</td>
                    </tr>
                    <tr>
                        <td>Contact</td>
                        <td>:</td>
                        <td><input type="text" name="phone" value="" size="15" /></td>
                    </tr>
                    <tr>
                        <td>Blood group</td>
                        <td>:</td>
                        <td><select name="blood">
                                <option>---select---</option>
                                <?php
                                $con = mysql_connect('localhost', 'root', '')or die("unable to connect");

                                mysql_select_db("donation");
                                $ss=  mysql_query("select * from blood_group");
                                                               
                                while($result = mysql_fetch_row($ss))
                                {
                                ?>
                                
                                
                                <option value="<?php echo $result[0]?>"> <?php echo $result[1]; ?></option>
                                <?php }?>
                            </select></td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td>:</td>
                        <td><input type="text" name="user" value="" size="15" /></td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>:</td>
                        <td><input type="password" name="pass" value="" size="15" /></td>
                    </tr>
                    <tr>
                        <td> <input type="submit" value="Save" name="save" /></td>
                        <td></td>
                        
                    </tr>
                                    </tbody>
            </table>
            

        </form>
    </center>  
    </body>
</html>
<?php }?>