<html>
    <head>
        <title>search</title>
    </head>
    <body>
        <div align='right'>

            <a href="u.php">Update</a>&nbsp&nbsp

            <a href="logout.php">Logout</a>
        </div>
    <center>
        <form name="search" action="s.php" method="GET">

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
                            $blood = $_GET["blood"];
                            while ($bresult = mysql_fetch_row($ss)) {
                                ?>                              

                                <option value=<?php
                                echo '"' . $bresult[0] . '"';
                                if ($blood == $bresult[0]) {
                                    echo ' selected = "select" ';
                                }
                                ?> >
                                            <?php echo $bresult[1]; ?>
                                </option>
                            <?php } ?>
                        </select></td>
                <tr>
                    <td>District</td>
                    <td>:</td>
                    <td><select name="district" id="district">
                            <option value="0">---select---</option>
                            <?php
                            $ss = mysql_query("select * from district");
                            $district = $_GET["district"];
                            
                            while ($disresult = mysql_fetch_row($ss)) {
                                ?>


                                <option value=<?php
                                echo'"' . $disresult[0] . '"';
                                if ($district == $disresult[0]) {
                                    echo 'selected="selected" ';
                                }
                                ?>
                                        > <?php echo $disresult[1]; ?></option>
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

        if ($district != "0") {//all chaged here
            if (strlen($where) > 3) {
                $where = $where . " AND ";
            } else {
                $where = " Where ";
            }
            $where = $where . "A.district='" . $district . "'";
        }
    }
   // echo "<h1>" . $where . "</h1>";

    $s = "select A.name,A.address,B.district,A.gender,A.phone,C.blood_group from register A inner join district B on A.district=b.id inner join blood_group C on A.blood=C.id " . $where;
   
    $ss = mysql_query($s);
   
    ?>
    <table border="1">
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

        <?php
        while ($result = mysql_fetch_array($ss)) {
          
            ?>

            <tbody>
                <tr>
                    <td><?php echo $result['name'] ?></td>
                    <td><?php echo $result['address'] ?></td>
                    <td><?php echo $result['district'] ?></td>
                    <td><?php echo $result['gender'] ?></td>
                    <td><?php echo $result['phone'] ?></td>
                    <td><?php echo $result['blood_group'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</center>
</html>