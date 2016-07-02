 <?php 

      $servername = "";
      $username = "";
      $password = "";
      $dbname = "";

 $connect = mysqli_connect($servername, $username, $password, $dbname); 
 $sql = "SELECT * FROM users INNER JOIN Paste_Bin ON users.oauth_uid = Paste_Bin.uid ORDER BY Paste_Bin.id DESC";  
 $result = mysqli_query($connect, $sql);  
 ?>  
 

                          <?php  
                          if(mysqli_num_rows($result) > 0)  
                          {  
                               while($row = mysqli_fetch_array($result))  
                               {  
                          ?>  
                          <div id="P-Entry">
                              <div id="P-EntryInfo">
                              <img class="Small-Av" src="<?php echo $row["picture"];?>">
                                 <h2 class="P-Name"><?php echo $row["fname"];?></h2>
                                 <h3 class="P-Date"><?php echo $row["date"]; ?></h3> 
                               </div> 
                               <p class="P-Meassage"><?php echo $row["text"]; ?></p>
                               
                          </div>  
                          <?php  
                               }  
                          }  
?>  

 
