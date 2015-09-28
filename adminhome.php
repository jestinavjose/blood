<html>
    <head>
        <title>BLOOD DONATION</title>
    </head>
    <body>
    <center>
        <div align='right'>
            
           
             <a href="adminsearch.php">Search</a>&nbsp&nbsp
              <a href="logout.php">Logout</a>
        </div>
        <h2>Admin Home</h2>
        <?php
                                $con = mysql_connect('localhost', 'root', '')or die("unable to connect");

                                mysql_select_db("donation");
                               
                                
        $a= mysql_query("select count(*) as total from register");
        ?>
        <br>
        <h3>Total Users:<?php $aa=  mysql_fetch_array($a); 
       echo $aa["total"];
       echo "</h3>";
       ?> 
        
           <table  style="width:25%;float:left;
    position: absolute;
    top: 150px;
    left: 500px;
    width: 200px;
    height: 100px;
     ">
               
               <thead>
                   <tr>
                       <th>Blood group</th>
                       <th>Total</th>
                   </tr>
               </thead>
               <tbody>
                  
                       <?php 
                       $a= mysql_query("Select blood_group,count(*) from blood_group inner join register on blood_group.id=register.blood group by blood_group");
                                          
                      while($aa= mysql_fetch_row($a))
                      {
                      ?>
                        
                   <tr>
                       <td><?php echo $aa[0];?></td> 
                        <td><?php echo $aa[1];?></td>
                       <?php }?>
                   </tr> 
                      
               
               </tbody>
           </table>
           
           <table  style="width:25%;float:right;
    position: absolute;
    top: 150px;
    right: 500px;
    width: 200px;
    height: 100px;
     ">
               
               <thead>
                   <tr>
                       <th>District</th>
                       <th>Total</th>
                   </tr>
               </thead>
               <tbody>
                  
                       <?php 
                       $a= mysql_query("Select district.district,count(*) from district inner join register on district.id=register.district group by district");
                                          
                      while($aa= mysql_fetch_row($a))
                      {
                      ?>
                        
                   <tr>
                       <td><?php echo $aa[0];?></td> 
                        <td><?php echo $aa[1];?></td>
                       <?php }?>
                   </tr> 
                      
               
               </tbody>
               
               
               
               
              
           </table>

           </div>
    </center>
    </body>
</html>
    



<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


               
               