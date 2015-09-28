
<html>
    <head>
        <title>search</title>
    </head>
    <body>
        
          
            
        <div align='right'>

            <a href="adminhome.php">Home</a>&nbsp&nbsp

            <a href="logout.php">Logout</a>
        </div>
        
    <center>
         
        
        <form name="search" action="adminsearch.php" method="GET">

            <table>
                <tr>

                    <td>Blood Group</td>
                    <td>:</td>
                    <td><select name="blood">
                            <option value="0">---select---</option>

                            <?php
                            $con = mysql_connect('localhost', 'root', '')or die("unable to connect");
                            mysql_select_db("donation");

                            $ss = mysql_query("select * from blood_group");
                            //$drop1 = $_REQUEST['id'];
                            $blood_grp = $_GET["blood"];
                            while ($result = mysql_fetch_row($ss)) {
                                ?>                             

                                <option value=<?php
                                echo '"' . $result[0] . '"';
                                if ($blood_grp == $result[0]) {
                                    echo ' selected = "select" ';
                                }
                                ?> > 
                                            <?php echo $result[1]; ?>
                                </option>
                            <?php } ?>
                        </select></td>
                <tr>
                    <td>District</td>
                    <td>:</td>
                    <td><select name="district">
                            <option value="0">---select---</option>
                            <?php
                            $ss = mysql_query("select * from district");
                            $district = $_GET["district"];
                            while ($result = mysql_fetch_row($ss)) {
                                ?>
                                <option value=<?php
                                echo '"' . $result[0] . '"';
                                if ($district == $result[0]) {
                                    echo ' selected = "select" ';
                                }
                                ?> > 
                                    <?php echo $result[1]; ?></option>
                            <?php } ?>
                        </select></td>
                </tr>
                <td><input type="submit" value="search" name="search" /></td>


            </table>
        </form>

    </body>

    <?php
    $blood = "";
    $where = "";
    if (isset($_GET['blood'])) {
        $blood = $_GET["blood"];
        if ($blood !== "0") {
            $where = "Where A.blood ='" . $blood . "'";
        }
    }
    $district = "";

    if (isset($_GET['district'])) {
        $district = $_GET["district"];

        if ($district != "0") {
            if (strlen($where) > 3) {
                $where = $where . " AND ";
            } else {
                $where = " Where ";
            }
            $where = $where . "A.district='" . $district . "'";
        }
    }
    // echo "<h1>" . $where . "</h1>";
    $count = 10;



    if (isset($_GET['page'])) {

        $page = $_GET["page"] * 10;

        //echo $page;
    } else {
        $page = 0;
    }

    $s = "select A.fkid,A.name,A.address,B.district,A.gender,A.phone,C.blood_group from register A inner join district B on A.district=b.id inner join blood_group C on A.blood=C.id " . $where . " limit $page,$count";
    
    $ss = mysql_query($s);
    ?>


    <table border="1" bgcolor="">
        <thead>
            <tr>

                <th>Name</th>
                <th>Address</th>
                <th>District</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>Blood</th>


            </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                while ($result = mysql_fetch_array($ss)) {// MYSQLI_ASSOC))
                    ?>
                    <td><?php echo $result['name'] ?></td>
                    <td><?php echo $result['address'] ?></td>
                    <td><?php echo $result['district'] ?></td>
                    <td><?php echo $result['gender'] ?></td>
                    <td><?php echo $result['phone'] ?></td>
                    <td><?php echo $result['blood_group'] ?></td>
                    <td><a href="delete.php?id=<?php echo $result['fkid'] ?>" onClick="return confirm('Are You Sure')">delete</a></td>
                </tr>
                
            <?php }
              if(isset($_GET['flag']))
        {
            echo "<h3>";
         echo "deleted";   
         echo "</h3>";
        }
        
       ?>
        </tbody>
    </table>
    
</center>
</html>    


<!--*************************** divide page-->
<?php
$c="select count(*)as num from register";
$cc=mysql_query($c);
$count= mysql_fetch_array($cc);
//echo $count['num']."records count";

echo "<br>";
$totalpages=floor($count['num']/10);
//echo $totalpages."page count";
//echo "<h1>" . $page . "</h2>";


?>
<center>
    <?php
    if($page>0)
    {
        
         ?>
    
    <a href="adminsearch.php?page=<?php echo (($page / 10) - 1 )  ?>" >Previous</a>
        
        <?php
    }   
    
     //********************************************    
    if((($page / 10) + 1)<= $totalpages)
            {
        
             
            ?>
    
     <a href="adminsearch.php?page=<?php echo (($page / 10) + 1 ) ?> ">Next</a> 
            <?php } ?>
    
    
</center>