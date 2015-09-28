<?php
$bb=$_POST['blood'];

 $con = mysql_connect('localhost', 'root', '')or die("unable to connect");

  mysql_select_db("donation");
  $ss=  mysql_query("select * from register where blood='$bb'");
  
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
         while($result = mysql_fetch_array($ss))
     {
       ?>
    <tbody>
        <tr>
            <td><?php echo $result[1]?></td>
           <td><?php echo $result[2]?></td>
           <td><?php echo $result[3]?></td>
           <td><?php echo $result[4]?></td>
           <td><?php echo $result[5]?></td>
           <td><?php echo $result[6]?></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
     

       
       
       
      
   


