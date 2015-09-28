<html>
    <head>
        <meta charset="UTF-8">
        <title>BLOOD DONATION</title>
    </head>
    <body> 
       
        <center>
        <?php
        if(isset($_GET['flag']))
        {
            echo "<h3>";
         echo "login failed incorrect username or password";   
         echo "</h3>";
        }
            ?>
    
        <form name="login" action="loginaction.php" method="POST">
            <table border="0">                
                <tbody>
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
                </tbody>
            </table>
            <input type="submit" value="login" name="login" />
            
        </form>
        <a href="registration.php">Are you new user?</a>
    </body>
        
</center>
</html>